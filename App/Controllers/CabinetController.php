<?php

namespace App\Controllers;

class CabinetController
{
    static function cabinet(): void
    {
     $title = "Личный кабинет";

     include_once __DIR__ . "/../Views/cabinet.php";
    }

    static function loginSuccess(): void
    {
        $errors = [];


    }
}