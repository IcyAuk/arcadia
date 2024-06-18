<?php
    require_once "../../lib/config.php";
    require_once "../../lib/pdo.php";
?>


<?php
try
{
    $stmt = $pdo->query("SELECT id, title, description, imagePath FROM services");
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    echo "Erreur: " . $e->getMessage();
    die();
}

?>

<ul class="list-container">
    <?php foreach($services as $service): ?>
    <li class="read-list">
        <div><?= $service['title'] ?></div>
        <div><a href="?param=<?= urlencode('rud_service') ?>&delete_id=<?php echo $service['id']; ?>" onclick="return confirm('Suprimmer?')">suppr</a></div>
    </li>
    <?php endforeach; ?>
</ul>