<?php

namespace App\Kernel\Connections;

use     Error;
use Exception;
use mysqli;
use Throwable;

/**
 * Создание подключения к базе данных на Singleton
 */
class MySQLConnection
{
    private mysqli $connection;
    private static ?MySQLConnection $_instance = null;
    private string $host = "mysql";
    private string $username = "local";
    private string $password = "local";
    private string $database = "db";

    private function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        } catch (Error|Exception|Throwable $t) {
            print_r($t);
        }

        if (mysqli_connect_error()) {
            trigger_error("Ошибка подключения MySQL: " . mysqli_connect_error());
        }
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    public static function getInstance(): MySQLConnection
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __clone()
    {
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }
}