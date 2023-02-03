<?php include_once "head.php"; ?>
    <div class="container mt-4">
        <form action="/registration" method="POST">
        <h1>Регистрация</h1>
            <label>Имя пользователя</label>
            <input type="text" class="form-control" name="name" id="'name" placeholder="Enter Username">
            <label>Электронная почта</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
            <label>Логин</label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Enter Login">
            <label>Пароль</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Login">
            <label>Подтверждение пароля</label>
            <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"
                   placeholder="Enter Login"><br>
            <button type="submit" class="btn btn-success">Завершить</button>
            <h1><?php if (empty($errors) && $_SERVER['REQUEST_METHOD'] === "POST") {
                    echo "Регистрация успешна";
                } else {
                    if (!empty($errors)) {
                        foreach ($errors as $value) {
                            echo "$value<br>";
                        }
                    }
                } ?></h1>
    </div>
<?php include_once "footer.php"; ?>