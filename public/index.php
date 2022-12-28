<?php

use App\Kernel\Routers;

include __DIR__ . "/../vendor/autoload.php";

session_start();

Routers::getInstance();