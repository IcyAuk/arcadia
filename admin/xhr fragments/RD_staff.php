<?php
    require_once "../../lib/config.php";
    require_once "../../lib/pdo.php";
?>


<?php
try
{
    $stmt = $pdo->query("SELECT id, name, email FROM staff WHERE role = 'mod'");
    $staffMembers = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    echo "Erreur: " . $e->getMessage();
    die();
}

?>

<ul class="list-container">
    <?php foreach($staffMembers as $staff): ?>
    <li class="read-list">
        <div><?= $staff['name'] ?></div>
        <div><?= $staff['email'] ?></div>
        <div><a href="?param=<?= urlencode('rd_staff') ?>&delete_id=<?php echo $staff['id']; ?>" onclick="return confirm('Suprimmer?')">suppr</a></div>
    </li>
    <?php endforeach; ?>
</ul>