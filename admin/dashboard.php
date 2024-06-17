<!-- EVERYTHING HAPPENS HERE -->
<!-- DASHBOARD IS THE HUB OF ALL XHR REQUESTS -->
<!-- THIS PAGE DISPLAYS XHR FRAGMENTS -->

<?php require_once "./template/header.php" ?>

<div id="container" class="container column">
        <h1>Bienvenue, <?= $_SESSION['user_name']; ?></h1>
</div>

<?php require_once "./template/footer.php" ?>