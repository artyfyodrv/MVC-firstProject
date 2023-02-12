<?php

use App\Kernel\Connections\MySQLConnection;

include __DIR__ . "/../vendor/autoload.php";

class Migrations
{
    private ?mysqli $db = null;

    public function __construct()
    {
        $this->db = MySQLConnection::getInstance()->getConnection();
    }

    public function run()
    {
        $this->db->query(
            'CREATE TABLE IF NOT EXISTS `users`
                                (
                                    `id`        int PRIMARY KEY AUTO_INCREMENT,
                                    `login`     varchar(50)  NOT NULL UNIQUE,
                                    `password`  varchar(100) NOT NULL,
                                    `email`     varchar(50)  NOT NULL UNIQUE,
                                    `user_name` varchar(50)  NOT NULL
                                ) DEFAULT CHARSET = utf8;'
        );
    }
}

$migrate = new Migrations();
$migrate->run();
