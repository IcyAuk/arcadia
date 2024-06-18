<!-- EVERYTHING HAPPENS HERE -->
<!-- DASHBOARD IS THE HUB OF ALL XHR REQUESTS -->
<!-- THIS PAGE DISPLAYS XHR FRAGMENTS -->

<!-- FOR SOME REASON DASHBOARD IS THE PAGE THAT RECEIVES ALL THE GETS AND POSTS -->
<!-- MUST FIND A WAY TO WORK WITH THAT -->

<?php require_once "./template/header.php" ;

//CHECK POST, THEN CHECK WHO SENT THE POST METHOD
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["c_staff"]))
        {
                createStaff($pdo, $_POST["name"], $_POST["email"], $_POST["password"], $_POST["role"]);
        }
        if(isset($_POST["c_service"]))
        {
                createService($pdo, $_POST["title"], $_POST["description"], $_FILES["image"]);
        }
}

if (isset($_GET['delete_id']))
{
        deleteStaff($pdo, $_GET['delete_id']);
}

?>



<div id="container" class="container column">
        <h1>Bienvenue, <?= $_SESSION['user_name']; ?></h1>
</div>

<?php require_once "./template/footer.php" ?>

