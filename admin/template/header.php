<?php
    session_start();
    require_once "../lib/config.php";
    require_once "../lib/pdo.php";

    if(!isset($_SESSION["user_name"])) {
        header("Location:../home.php");
        exit();
    }

/*
    THIS HEADER WILL DISPLAY DIFFERENT TABS DEPENDING
    ON THE ROLE OF THE LOGGED-IN STAFF MEMBER
    VET, MOD, or ADMIN
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="./style/admin-style.css">
    <script defer src="./script/script.js"></script>
</head>

<body class="body-container">
    <header class="body-col col-header border border-rounder">

        <a href="../home.php" class="header-navbar-row header-brand border-brand">ARCADIA</a>
        <button id="navbar-button" class="border-rounded">≡</button>

        <ul class="header-navbar-col">
        <?php if (isset($_SESSION["user_name"])): ?>
            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/rd_staff.php">RD Staff</li>
            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/rd_vet.php">RD Vet</li>
            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/c_staff.php">C Staff</li>

            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/rud_comment.php">RUD Comments</li>


            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/rud_service.php">RUD Service</li>
            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/c_service.php">C Service</li>

            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/rud_habitat.php">RUD habitat</li>
            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/c_habitat.php">C habitat</li>

            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/rud_animal.php">RUD animal</li>
            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/c_animal.php">C animal</li>

            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/rd_dietlog.php">RD Diet Log</li>
            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/c_dietlog.php">C Diet Log</li>

            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/rd_vetlog.php">RD Vet Log</li>
            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/c_vetlog.php">C Vet Log</li>

            <li class="header-navbar-row border-rounded" data-url="./xhr fragments/R_counter.php">Impression Counter</li>
        <?php endif; ?>
        </ul>
        
        <div class="header-navbar-col">
            <a href="./u_schedule.php" class="header-navbar-row border-rounded">horaires</a>
        </div>
    </header>

    <main class="body-col col-main border border-rounder">

