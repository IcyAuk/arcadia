<?php include_once "template/header.php"; ?>

<?php

    $_SESSION = array();
    session_destroy();
    header("Location: home.php");
    exit;

?>

<?php include_once "template/footer.php"; ?>