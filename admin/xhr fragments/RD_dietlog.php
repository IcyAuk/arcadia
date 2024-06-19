<?php
    require_once "../../lib/config.php";
    require_once "../../lib/pdo.php";
?>


<?php
try
{
    $stmt = $pdo->query
    ('SELECT 
    AnimalDietLog.id AS diet_log_id,
    AnimalDietLog.animal_id,
    animals.name AS animal_name,
    animals.species AS animal_species,
    AnimalDietLog.food,
    AnimalDietLog.food_kilogram,
    AnimalDietLog.log_date
    FROM 
    AnimalDietLog
    JOIN 
    animals ON AnimalDietLog.animal_id = animals.id
    ORDER BY 
    AnimalDietLog.log_date DESC
    ');
    $dietLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    echo "Erreur: " . $e->getMessage();
    die();
}

?>

<ul class="list-container">
    <?php foreach($dietLogs as $dietLog): ?>
    <li class="read-list">
        <div><?= htmlspecialchars($dietLog['animal_name']) ?></div>
        <div><?= $dietLog['log_date'] ?></div>
        <div><a href="r_dietLog.php?param=r_dietLog&edit_id=<?= $dietLog['diet_log_id']; ?>">voir plus</a></div>
        <div><a href="?param=<?= urlencode('rd_dietLog') ?>&delete_id=<?php echo $dietLog['diet_log_id']; ?>" onclick="return confirm('Suprimmer?')">suppr</a></div>
    </li>
    <?php endforeach; ?>
</ul>