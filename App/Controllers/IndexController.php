<?php

namespace App\Controllers;

class IndexController
{
    static function index(): void
    {
        $title = "Главная";

        include_once __DIR__ . "/../Views/index.php";
    }
}