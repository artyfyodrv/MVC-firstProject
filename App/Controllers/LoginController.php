<?php

namespace App\Controllers;

use App\Entities\User;
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
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $user->getLogin();
            $_SESSION['username'] = $user->getName();

        } else {

            include_once __DIR__ . "/../Views/login.php";
        }
    }
        static function logOut()
        {
            session_destroy();
            header('Location: http://127.0.0.1:8080');

    }
}