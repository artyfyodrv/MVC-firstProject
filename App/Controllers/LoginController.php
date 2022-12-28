<?php

namespace App\Controllers;

use App\Entities\User;
use App\Kernel\Connections\MySQLConnection;

class LoginController
{
    static function login()
    {
        $title = "Авторизация";

        include_once __DIR__ . "/../Views/login.php";
    }

    static function loginSuccess()
    {

        $user = new User();

        $bdlogin = $user->getLogin();
        $bdpass = $user->getPassword();

        $connect = MySQLConnection::getInstance();
        $result = $connect->getConnection()
            ->query("SELECT * FROM users WHERE login='$bdlogin' and password='$bdpass'");

        $numrows = mysqli_num_rows($result);

        if ($numrows !=1)
        {
            echo "Пользователь $bdlogin не найден";
        } else {
            echo "Пользовать $bdlogin найден";
        }

        var_dump($numrows);
        var_dump($result);

        include_once __DIR__ . "/../Views/login.php";
    }
}