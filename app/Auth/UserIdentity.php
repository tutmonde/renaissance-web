<?php

declare(strict_types=1);

namespace App\Auth;

use Nette;
use Nette\Security\IIdentity;
use Nette\Database\Explorer;

use App\Auth\User;

class UserIdentity implements IIdentity 
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRoles(): Array
    {
        return ['user'];
    }
}