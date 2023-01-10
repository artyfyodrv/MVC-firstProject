<?php include_once "head.php"; ?>

<div class="container mt-4">
    <h1>Авторизация</h1>
    <form action="/login" method="POST">
        <label>Логин</label>
        <input type="text" class="form-control" name="login" id="login" placeholder="Enter Login">
        <label>Пароль</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Login">
        <button type="submit" class="btn btn-success">Завершить</button>
    </form>
</div>
    <h1><?php if (empty($errorsLogin) && $_SERVER['REQUEST_METHOD'] === "POST") {
        echo "Авторизация успешна";
        } else {
            if (!empty($errorsLogin)) {
                foreach ($errorsLogin as $value) {
                    echo "$value<br>";
                }
            }
        } ?></h1>

<?php include_once "footer.php"; ?>