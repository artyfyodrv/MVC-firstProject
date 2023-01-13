<?php

include_once "head.php" ?>
<?php
    if (!empty($_SESSION['auth'])) {
        echo "Добро пожаловать: " . $_SESSION['username'];
        echo "Ваша почта: " . $_SESSION['email'];
    } else {
        echo "NE HELLO";
    }?>
    <div class="container mt-4"?
            <div style="text-align: center;"><label>Личный кабинет</label></div>
    </div>

<?php include_once "footer.php" ?>
