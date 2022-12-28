<?php

namespace App\Controllers;

use App\Kernel\Connections\MySQLConnection;

class IndexController
{
    static function index(): void
    {
        $title = "Главная";

        $connect = MySQLConnection::getInstance();
        $result = $connect->getConnection()
            ->query("SELECT * FROM users u;")->fetch_assoc();

        $user = $result['user_name'];

        include_once __DIR__ . "/../Views/index.php";
    }
}