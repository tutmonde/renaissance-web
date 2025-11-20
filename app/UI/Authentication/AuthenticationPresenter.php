<?php

declare(strict_types=1);

namespace App\UI\Authentication;

use Nette;

use App\UI\Presenter;

final class AuthenticationPresenter extends Presenter
{
    public function renderLogin()
    {
        if ($this->getHttpRequest()->getMethod() === 'POST')
        {
            try {
                $this->getUser()->login($this->getHttpRequest()->getPost('email'), $this->getHttpRequest()->getPost('password'));
                $this->redirect('Home:default');
            } catch (AuthenticationException $e) {
                $this->flashMessage('Ошибка: ' . $e->getMessage(), 'error');
                $this->redirect('this');
            }
        }
    }

    public function renderLogout()
    {
        $this->getUser()->logout();
        $this->redirect('Home:default');
    }
}
