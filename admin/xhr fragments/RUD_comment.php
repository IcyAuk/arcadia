<?php
    require_once "../../lib/config.php";
    require_once "../../lib/pdo.php";
?>


<?php
try
{
    $stmt = $pdo->query("SELECT id, visitor_username, comment FROM comments WHERE status =");
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    echo "Erreur: " . $e->getMessage();
    die();
}

?>

<ul class="list-container">
    <?php foreach($comments as $comment): ?>
    <li class="read-list">
        <div><?= $comment['visitor_username'] ?></div>
        <div><?= $comment['name'] ?></div>
        <div><a href="u_comment.php?param=u_comment&edit_id=<?= $comment['id']; ?>">edit</a></div>
        <div><a href="?param=<?= urlencode('rud_comment') ?>&delete_id=<?php echo $comment['id']; ?>" onclick="return confirm('Suprimmer?')">suppr</a></div>
    </li>
    <?php endforeach; ?>
</ul>