<?php

$errors = [];

$errors['numZero'] = 'равно ноль';
$errors['error2'] = 'ошибка 2';

if (empty($errors)) {
    echo "array is empty";
} else {
    foreach ($errors as $key => $value) {
        echo "$key => $value\n";
    }
}

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title><?= $title ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная</a>
            </li>
            <?php if (!empty($_SESSION['auth'])) { ?>
                <li class="logout">
                    <a class="nav-link" href="/logout">Выход</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="/registration">Регистрация</a>
                </li>
                <li class="auth">
                    <a class="nav-link" href="/login">Авторизация</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
