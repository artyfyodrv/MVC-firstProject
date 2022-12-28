<?php

namespace App\Controllers;

use App\Entities\User;
use App\Kernel\Connections\MySQLConnection;
use App\Kernel\LoginValidation;

class LoginController
{
    static function login()
    {
        $title = "Авторизация";

        include_once __DIR__ . "/../Views/login.php";
    }

    static function loginSuccess()
    {
        $errorsLogin = [];
        $user = new User();

        $objValidations = new LoginValidation();
        $errorsLogin = $objValidations->validateForms($user);

        if (empty($errorsLogin)) {
            header('Location: cabinet');
            exit();
        }


        include_once __DIR__ . "/../Views/login.php";
    }
}