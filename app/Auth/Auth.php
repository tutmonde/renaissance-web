<?php
declare(strict_types=1);

namespace App\Auth;

use Nette;
use Nette\Security\IAuthenticator;
use Nette\Security\Identity;
use Nette\Security\AuthenticationException;
use Nette\Database\Explorer;
use Nette\Database\Table\Selection;

use App\Auth\User;
use App\Auth\UserIdentity;

final class Auth implements IAuthenticator
{
    use Nette\SmartObject;

    private Explorer $db;

    public function __construct(Explorer $db)
    {
        $this->db = $db;
    }

    public function authenticate($args)
    {
        [$email, $password] = $args;

        if (strpos($email, "@") !== false) {
            [$login, $domain] = explode("@", $email, 2);
        } else {
            throw new AuthenticationException("Invalid email");
        }

        $row = $this->db
            ->table('user')
            ->where('login', $login)
            ->where('domain', $domain)
            ->fetch();

        // obfuscation
        if(!$row) 
            throw new AuthenticationException("Invalid email or password");

        // don't worry about md5, it automatically generates an passwd for usr
        if(hash_equals($row->passwd, md5($password))) {
            return new UserIdentity($row->id);
        } else { 
            throw new AuthenticationException("Invalid email or password");
        }
    }
}