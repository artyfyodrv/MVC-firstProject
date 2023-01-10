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

        // прием данных с user
        $bdlogin = $user->getLogin();
        $bdpass = $user->getPassword();
        $bdemail = $user->getEmail();
        $bdname = $user->getName();

        // запись в бд если нет ошибок в $errors
        if (empty($errors))
        {
            $connect = MySQLConnection::getInstance();
            $connect->getConnection()
                ->query("INSERT INTO users(`login`, `password`, `email`, `user_name`)
                            VALUE ('$bdlogin', '$bdpass', '$bdemail', '$bdname');");
        }

        include_once __DIR__ . "/../Views/registration.php";
    }
}