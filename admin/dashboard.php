<!-- EVERYTHING HAPPENS HERE -->
<!-- DASHBOARD IS THE HUB OF ALL XHR REQUESTS -->
<!-- THIS PAGE DISPLAYS XHR FRAGMENTS -->

<!-- FOR SOME REASON DASHBOARD IS THE PAGE THAT RECEIVES ALL THE GETS AND POSTS -->
<!-- MUST FIND A WAY TO WORK WITH THAT -->

<?php require_once "./template/header.php";

//CHECK POST, THEN CHECK WHO SENT THE POST METHOD
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["c_staff"])) {
                createStaff($pdo, $_POST["name"], $_POST["email"], $_POST["password"], $_POST["role"]);
        }
        if (isset($_POST["c_service"])) {
                createService($pdo, $_POST["title"], $_POST["description"], $_FILES["image"]);
        }
        if (isset($_POST["c_habitat"])) {
                createHabitat($pdo, $_POST["name"], $_POST["description"], $_FILES["image"]);
        }
        if (isset($_POST["c_animal"])) {
                createAnimal($pdo, $_POST["name"], $_POST["species"], $_POST["habitat"],$_POST["description"], $_FILES["image"]);
        }
        if (isset($_POST["c_dietlog"])) {
                createDietLog($pdo, $_POST["animal_id"],$_POST["food"], $_POST["kilo"]);
        }
        if (isset($_POST["c_vetlog"])) {
                createVetLog($pdo, $_SESSION['user_id'], $_POST["animal_id"], $_POST["proposed_food"],$_POST["proposed_food_kilogram"],$_POST["detail"]);
        }
}


if (isset($_GET['delete_id']) && isset($_GET['param'])) {
        $deleteId = filter_var($_GET['delete_id'], FILTER_SANITIZE_NUMBER_INT);
        $param = htmlspecialchars($_GET['param']);

        if ($param === 'rud_service') {
                deleteService($pdo, $deleteId);
        }
        if ($param === 'rud_habitat') {
                deleteHabitat($pdo, $deleteId);
        }
        if ($param === 'rud_animal') {
                deleteAnimal($pdo, $deleteId);
        }
        if ($param === 'rd_dietLog') {
                deleteDietLog($pdo, $deleteId);
        }
        if ($param === 'rd_vetLog') {
                deleteVetLog($pdo, $deleteId);
        }
        elseif ($param === 'rd_staff') {
                deleteStaff($pdo, $deleteId);
        }
}
?>



<div id="container" class="container column">
        <h1>Bienvenue, <?= $_SESSION['user_name']; ?></h1>
</div>

<?php require_once "./template/footer.php" ?>