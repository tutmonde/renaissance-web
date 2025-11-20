<?php

declare(strict_types=1);

namespace App\UI;

use Nette;
use Nette\Database\Explorer;

use App\Auth\User;

class Presenter extends Nette\Application\UI\Presenter
{
    public function __construct(private Explorer $database) {
        parent::__construct();
    }

    public function beforeRender()
    {
        bdump($this->getUser());
        if ($this->getUser()->isLoggedIn()) {
            $this->template->userObj = new User($this->database, $this->getUser()->getId());
        }
    }
}
