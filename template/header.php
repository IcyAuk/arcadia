<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/container-style.css">
    <link rel="stylesheet" href="../style/maximum-priority.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script defer src="../script/navbar.js"></script>
    <script defer src="../script/script.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
<?php require "lib/config.php"; ?>
<?php require "lib/pdo.php"; ?>

    <header>
        <nav class="navbar">
            <a href="../home.php"><div class="brand-title">Arcadia</div></a>
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="navbar-links">
                <ul>
                    <li><a href="../home.php">Accueil</a></li>
                    <li><a href="../services.php">Services</a></li>
                    <li><a href="../habitats.php">Habitats</a></li>
                    <li><a href="../contact.php">Nous contacter</a></li>
                    <?php if(isset($_SESSION["user_email"])){ ?>
                    <li><a href="../admin/dashboard.php">Dashboard</a></li>
                    <?php } ?>
                </ul>
            </div>

                <?php if(isset($_SESSION["user_email"])){ ?>

                    <a href="../logout.php" class="login-button">Déconnexion</a>

                <?php } else { ?>

                    <a href="../login.php" class="login-button">Connexion</a>

                <?php } ?>
        </nav>
    </header>
    <main>