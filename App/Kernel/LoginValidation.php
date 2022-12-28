<?php

namespace App\Kernel;


use App\Entities\User;
use App\Kernel\Connections\MySQLConnection;

class LoginValidation
{

    protected ?array $validateError = null;

    public function validateForms(User $user): ?array
    {
        $this->checkForm($user->getLogin(), $user->getPassword());

        return $this->validateError;
    }
    protected function checkForm(string $login, string $password): void
    {
        $connect = MySQLConnection::getInstance();
        $result = $connect->getConnection()
            ->query("SELECT * FROM users WHERE login='$login' and password='$password'");
        $numrows = mysqli_num_rows($result);


        if (empty($login)) {
            $this->validateError[] = 'Поле "Логин" не может быть пустым';

        }

        if (empty($password)) {
            $this->validateError[] = 'Поле "Пароль" не может быть пустым';
        }

        if ($numrows != 1) {
            $this->validateError[] = 'Неверный логин или пароль';
        }

    }
}