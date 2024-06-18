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

    <label for="food">nourriture</label>
    <input type="text" name="food" id="food">

    <label for="kilo">kilograme de nourriture</label>
    <input type="number" name="kilo" id="kilo">


    <input type="hidden" name="c_dietlog" value="c_dietlog">
    <input type="submit" value="confirmer">
</form>
