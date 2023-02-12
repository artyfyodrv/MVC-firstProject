<?php

namespace App\Kernel;

use App\Controllers\CabinetController;
use App\Entities\User;
use App\Kernel\Connections\MySQLConnection;

class CabinetValidations
{

    protected ?array $validateError = null;


    public function validateForms($password, $newpassword, $passconfirm): ?array
    {

            $this->changePassword($password, $newpassword, $passconfirm);


        return $this->validateError;
    }

    protected function changePassword(string $password, string $newpassword, string $passconfirm): void
    {
        $username = $_SESSION['username'];

        $connect = MySQLConnection::getInstance();
            $result = $connect->getConnection()
                ->query("SELECT password FROM users WHERE user_name='$username'");
        $numrows = mysqli_fetch_array($result);
        $bdpassword = $numrows['password'];


        if (empty($password)) {
            $this->validateError[] = 'Введите ваш пароль';
        }
        if (empty($newpassword)) {
            $this->validateError[] = 'Поле нового пароля не может быть пустым';
        }
        if (empty ($passconfirm)) {
            $this->validateError[] = 'Введите повторно новый пароль';
        }
        if ($newpassword !== $passconfirm ) {
            $this->validateError[] = 'Новые пароли не совпадают';
        }
        if (!$password == password_verify($password, $bdpassword)) {
            $this->validateError[] = 'Старый пароль не совпадает';
        } else {
            var_dump($password);
        }

    }


}