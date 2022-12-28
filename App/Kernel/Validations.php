<?php

namespace App\Kernel;


use App\Entities\User;

class Validations
{
    protected ?array $validationErrors = null;

    public function validatesForms(User $user): ?array
    {
        $this->checksPasswordConfirm($user->getPassword(), $user->getPasswordConfirm());
        $this->checksLogin($user->getLogin());
        $this->checksName($user->getName());
        $this->checkEmail($user->getEmail());

        return $this->validationErrors;
    }

    protected function checksPasswordConfirm(string $password, string $passwordConfirm): void
    {
        if ($password !== $passwordConfirm) {
            $this->validationErrors[] = "Пароль не совпадает";
        }
    }

    protected function checksLogin(string $login): void
    {
        if (empty($login)) {
            $this->validationErrors[] = 'заполните поля логин';
        }

    }

    protected function checksName(string $name): void
    {
        if (empty($name)) {
            $this->validationErrors[] = 'заполните поле имя пользователя';
        }
    }

    protected function checkEmail(string $email): void
    {
        if (empty($email)) {
            $this->validationErrors[] = 'заполните поле email';
        }
    }
}