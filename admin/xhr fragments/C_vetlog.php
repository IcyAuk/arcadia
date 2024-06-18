<?php
    require_once "../../lib/config.php";
    require_once "../../lib/pdo.php";
?>

<?php
try
{
    $stmt = $pdo->query("SELECT id, name, species FROM animals");
    $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    echo "Erreur: " . $e->getMessage();
    die();
}

?>


<form method="post" action="dashboard.php" class="list-container">
    <label for="animal_id">l'animal en question</label>
    <select name="animal_id" required>
        <?php foreach($animals as $animal): ?>
        <option value="<?= $animal["id"] ?>"><?= $animal["name"]?></option>
        <?php endforeach; ?>
    </select>

    <label for="proposed_food" required>nourriture proposée</label>
    <input type="text" name="proposed_food" id="proposed_food">

    <label for="proposed_food_kilogram" required>kilograme de nourriture proposé</label>
    <input type="number" name="proposed_food_kilogram" id="proposed_food_kilogram">

    <label for="detail" required>détail (facultatif)</label>
    <textarea name="detail" id="detail"></textarea>

    <input type="hidden" name="c_vetlog" value="c_vetlog">
    <input type="submit" value="confirmer">
</form>
