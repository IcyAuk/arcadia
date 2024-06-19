<?php
    require_once "../../lib/config.php";
    require_once "../../lib/pdo.php";
?>


<?php
try
{
    $stmt = $pdo->query("SELECT id, habitat_id, name, species, description, imagePath FROM animals");
    $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    echo "Erreur: " . $e->getMessage();
    die();
}

?>

<ul class="list-container">
    <?php foreach($animals as $animal): ?>
    <li class="read-list">
        <div><?= $animal['name'] ?></div>
        <div><a href="u_animal.php?param=u_service&edit_id=<?= $animal['id']; ?>">edit</a></div>
        <div><a href="?param=rud_animal&delete_id=<?php echo $animal['id']; ?>" onclick="return confirm('Suprimmer?')">suppr</a></div>
    </li>
    <?php endforeach; ?>
</ul>