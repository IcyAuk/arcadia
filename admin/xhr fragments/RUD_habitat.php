<?php
    require_once "../../lib/config.php";
    require_once "../../lib/pdo.php";
?>


<?php
try
{
    $stmt = $pdo->query("SELECT id, name, description, imagePath FROM habitats");
    $habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    echo "Erreur: " . $e->getMessage();
    die();
}

?>

<ul class="list-container">
    <?php foreach($habitats as $habitat): ?>
    <li class="read-list">
        <div><?= $habitat['name'] ?></div>
        <div><a href="u_habitat.php?param=u_habitat&edit_id=<?= $habitat['id']; ?>">edit</a></div>
        <div><a href="?param=<?= urlencode('rud_habitat') ?>&delete_id=<?php echo $habitat['id']; ?>" onclick="return confirm('Suprimmer?')">suppr</a></div>
    </li>
    <?php endforeach; ?>
</ul>