<?php

namespace App\Kernel;

use App\Controllers\CabinetController;
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\RegController;

class Routers
{
    static function getInstance(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            switch (explode('?', $_SERVER['REQUEST_URI'])[0]) {
                case "/":
                    IndexController::index();
                    break;
                case "/registration":
                    RegController::reg();
                    break;
                case "/login":
                    LoginController::login();
                    break;
                case "/cabinet":
                    CabinetController::cabinet();
                    break;
                case "/logout":
                    LoginController::logOut();
                    break;
                default:
                    echo "404";
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
            switch ($_SERVER['REQUEST_URI']) {
                case "/registration":
                    RegController::regSuccess();
                    break;
                case "/login":
                    LoginController::loginSuccess();
                    break;
                case "/cabinet":
                    CabinetController::changePassword();
                    break;
                default:
                    echo "405";
            }
        }
    }
}