<?php

namespace App\Controllers;

use App\Entities\User;
use App\Kernel\Connections\MySQLConnection;
use App\Kernel\Validations;

class RegController
{
    static function reg()
    {
        $title = "Регистрация";

        include_once __DIR__ . "/../Views/registration.php";
    }

    static function regSuccess()
    {
//        $config = parse_ini_file('config.ini');
//        print_r($config['name']);
//
        $errors = [];
        $title = '';

        $user = new User();

        $objValidations = new Validations();
        $errors = $objValidations->validatesForms($user);

        $login = $user->getLogin();
        $p = $user->getPassword();
        $e = $user->getEmail();
        $n = $user->getName();

        if (empty($errors)) {
            $connect = MySQLConnection::getInstance();
            $connect->getConnection()
                ->query("INSERT INTO users(`login`, `password`, `email`, `user_name`)
                            VALUE ('$login', '$p', '$e', '$n');");
        }

        include_once __DIR__ . "/../Views/registration.php";
    }
}