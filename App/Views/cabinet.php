<title> <?php $title ?> </title>
<?php include_once "head.php" ?>
<?php
    if (!empty($_SESSION['auth'])) { ?>
        <div class="content-user" style="text-align: center">
            <h4>Добро пожаловать<br> </h4><h1><?php echo $_SESSION['username']; ?></h1><br></h4>
        </div>
        <div class="content-settings" style="text-align: right; float:right; " >
            <div class="passchangetext" style="text-align: center;"> <h4>Смена пароля: </h4>
        </div>
            <div class="input-settings" style="width: 400px; margin-right: 30px;">
                <form action="/cabinet" method="POST">
                <input type="text" class="form-control" name="password" id="password" placeholder="Введите ваш пароль"> <br>
                <input type="text" class="form-control" name="newpassword" id="newpassword" placeholder="Введите новый пароль"> <br>
                <input type="text" class="form-control" name="passconfirm" id="passconfirm" placeholder="Подтвердите новый пароль"> <br>
                <button type="submit" class="btn btn-success" style="float: left; width: 400px;">Сменить пароль</button>
                </form>
            </div>
            <?php if (empty($errorsCabinet) && $_SERVER['REQUEST_METHOD'] === 'POST') {
                echo 'Смена пароля успешна';
            } else {
                if (!empty($errorsCabinet)) {
                    foreach ($errorsCabinet as $value) {
                        echo "$value<br>";
                    }
                }
            } ?>
        </div>
    <?php } ?>



<?php include_once "footer.php" ?>
