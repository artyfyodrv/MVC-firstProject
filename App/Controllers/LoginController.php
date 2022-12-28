<?php

namespace App\Controllers;

class LoginController
{
    static function login()
    {
        $title = "Авторизация";

        include_once __DIR__ . "/../Views/login.php";
    }

    static function loginSuccess()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        include_once __DIR__ . "/../Views/login.php";
    }
}