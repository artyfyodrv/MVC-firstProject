<?php

namespace App\Kernel;


use App\Entities\User;
use App\Kernel\Connections\MySQLConnection;
use http\Params;

class LoginValidation
{

    protected ?array $validateError = null;

    public function validateForms(User $user): ?array
    {
        $this->checkLogin($user->getLogin(), $user->getPassword());

        return $this->validateError;
    }

    protected function checkLogin(string $login, string $password): void
    {

        $connect = MySQLConnection::getInstance();
        $result = $connect->getConnection()
            ->query("SELECT password FROM users WHERE login='$login' ");
        $row = mysqli_fetch_array($result);

        if (empty($row)) {
            $this->validateError[] = 'Неверный пароль';

            return;
        }

        $bdpassword = $row['password'];


        if (empty($login)) {
            $this->validateError[] = 'Поле "Логин" не может быть пустым';
        }

        if (empty($password))
        {
            $this->validateError[] = 'Поле "Пароль" не может быть пустым';
        }

        if (!$password == password_verify($password, $bdpassword))
        {
            $this->validateError[] = 'Неверный пароль';
        }

    }
}