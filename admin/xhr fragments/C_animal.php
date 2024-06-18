<?php
    require_once "../../lib/config.php";
    require_once "../../lib/pdo.php";
?>

<?php
try
{
    $stmt = $pdo->query("SELECT id, name FROM habitats");
    $habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    echo "Erreur: " . $e->getMessage();
    die();
}

?>


<form method="post" action="dashboard.php" class="list-container" enctype="multipart/form-data">
    <label for="name">nom</label>
    <input type="text" name="name" id="name" required>
    
    <label for="species">race</label>
    <input type="text" name="species" id="species" required>

    <label for="habitat">habitat</label>
    <select name="habitat" required>
        <?php foreach($habitats as $habitat): ?>
        <option value="<?= $habitat["id"] ?>"><?= $habitat["name"] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="description">description</label>
    <textarea name="description" id="description"></textarea>

    <label for="image">Upload Image</label>
    <input type="file" name="image" id="image">

    <input type="hidden" name="c_animal" value="c_animal">
    <input type="submit" value="confirmer">
</form>
