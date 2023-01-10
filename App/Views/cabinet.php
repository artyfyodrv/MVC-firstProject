<?php include_once "head.php" ?>
<?php
    if (!empty($_SESSION['auth'])) {
        echo "HELLO";
    } else {
        echo "NE HELLO";
    }?>
<?php include_once "footer.php" ?>
