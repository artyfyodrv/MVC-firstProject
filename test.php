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
