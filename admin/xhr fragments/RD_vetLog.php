<?php
    require_once "../../lib/config.php";
    require_once "../../lib/pdo.php";
?>


<?php
try
{
    $stmt = $pdo->query
    ('SELECT 
    AnimalVetLog.id AS vet_log_id,
    AnimalVetLog.animal_id,
    animals.name AS animal_name,
    animals.species AS animal_species,
    AnimalVetLog.proposed_food,
    AnimalVetLog.proposed_food_kilogram,
    AnimalVetLog.log_date,
    AnimalVetLog.detail
    FROM 
    AnimalVetLog
    JOIN 
    animals ON AnimalVetLog.animal_id = animals.id
    ORDER BY 
    AnimalVetLog.log_date DESC
    ');
    $vetLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    echo "Erreur: " . $e->getMessage();
    die();
}

?>

<ul class="list-container">
    <?php foreach($vetLogs as $vetLog): ?>
    <li class="read-list">
        <div><?= htmlspecialchars($vetLog['animal_name']) ?></div>
        <div><?= $vetLog['log_date'] ?></div>
        <div><a href="r_vetLog.php?param=r_vetLog&edit_id=<?= $vetLog['vet_log_id']; ?>">voir plus</a></div>
        <div><a href="?param=<?= urlencode('rd_vetLog') ?>&delete_id=<?php echo $vetLog['vet_log_id']; ?>" onclick="return confirm('Suprimmer?')">suppr</a></div>
    </li>
    <?php endforeach; ?>
</ul>