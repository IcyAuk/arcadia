<?php
    require_once "../../lib/config.php";
    require_once "../../lib/pdo.php";
?>


<?php
try
{
    $stmt = $pdo->query("SELECT id, name FROM staff WHERE role != 'admin'");
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
        <div><a href="?delete_id=<?php echo $staff['id']; ?>" onclick="return confirm('Suprimmer?')">suppr</a></div>
    </li>
    <?php endforeach; ?>
</ul>