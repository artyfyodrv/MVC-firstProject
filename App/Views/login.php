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

<h2><?= $login ?? ''; ?></h2>
<h2><?= $password ?? ''; ?> </h2>

<?php include_once "footer.php"; ?>