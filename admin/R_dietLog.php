<?php
require_once "./template/header.php";

if (!isset($_GET['edit_id'])) {
    header("Location: dashboard.php");
    exit();
}

$edit_id = $_GET['edit_id'];

try {
    $stmt = $pdo->prepare
    ('SELECT 
    AnimalDietLog.id AS diet_log_id,
    AnimalDietLog.animal_id,
    animals.name AS animal_name,
    animals.species AS animal_species,
    AnimalDietLog.food,
    AnimalDietLog.food_kilogram,
    AnimalDietLog.log_date
    FROM 
    AnimalDietLog
    JOIN 
    animals ON AnimalDietLog.animal_id = animals.id
    WHERE AnimalDietLog.id = :id
    ');
    $stmt->bindParam(':id', $edit_id, PDO::PARAM_INT);
    $stmt->execute();
    $dietLog = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$dietLog) {
        // if no service of this id is found, die
        echo "service manquant";
        die();
    }
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
    die();
}
?>

<div id="container" class="container column">
    <ul class="list-container">
        <li class="read-list">
            <div> <?= $dietLog['log_date'] ?></div>
        </li>
        <li class="read-list">
            <div><?= $dietLog['animal_name'] ?></div>
        </li>
        <li class="read-list">
            <div><?= $dietLog['animal_species'] ?></div>
        </li>
        <li class="read-list">
            <div> <?= $dietLog['food'] ?></div>
        </li>
        <li class="read-list">
            <div> <?= $dietLog['food_kilogram'] ?></div>
        </li>
        
    </ul>

</div>

<?php require_once "./template/footer.php"; ?>