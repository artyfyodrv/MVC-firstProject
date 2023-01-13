<?php

namespace App\Controllers;

use App\Entities\User;
use App\Kernel\Connections\MySQLConnection;

class CabinetController
{
    static function cabinet()
    {

     $title = "Личный кабинет";

        $user = new User();
        $login = $_SESSION['login'];


        $connect = MySQLConnection::getInstance();
        $result = $connect->getConnection()
            ->query("SELECT user_name, email FROM users WHERE login='$login'");
        $row = mysqli_fetch_array($result);

        // запись в сессию данных с бд
        $_SESSION['username'] = $row["user_name"];
        $_SESSION['email'] = $row["email"];

     include_once __DIR__ . "/../Views/cabinet.php";


    }
}