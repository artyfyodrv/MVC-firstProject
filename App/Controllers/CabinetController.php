<?php

namespace App\Controllers;

use App\Entities\User;
use App\Kernel\CabinetValidations;
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
            ->query("SELECT user_name, email, password FROM users WHERE login='$login'");
        $row = mysqli_fetch_array($result);

        // запись в сессию данных с бд
        $_SESSION['username'] = $row["user_name"];
        $_SESSION['email'] = $row["email"];

        include_once __DIR__ . "/../Views/cabinet.php";


    }

    public function changePassword()
    {

        $errorsCabinet = [];

        $objValidations = new CabinetValidations();

        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $passconfirm = $_POST['passconfirm'];
        $username = $_SESSION['username'];

        $errorsCabinet = $objValidations->validateForms($password, $newpassword, $passconfirm,);

        if (empty($errorsCabinet)) {
            $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $connect = MySQLConnection::getInstance();
            $result = $connect->getConnection()
                ->query("UPDATE users SET password='$newpassword' WHERE user_name='$username'");
        }

        var_dump($errorsCabinet) ;
        var_dump($password);


        include_once __DIR__ . "/../Views/cabinet.php";
    }
}