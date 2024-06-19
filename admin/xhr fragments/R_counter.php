<?php
    require_once "../../lib/config.php";
    require_once "../../lib/pdo.php";
?>


<?php
try
{
    $stmt = $pdo->query("SELECT 
    animals.id AS animal_id,
    animals.name,
    animals.species,
    animals.description,
    animals.imagePath,
    animalImpressionCounter.counter
    FROM 
    animals
    LEFT JOIN 
    animalImpressionCounter ON animals.id = animalImpressionCounter.animal_id
    ORDER BY 
    animals.name ASC
    ");
    $counters = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    echo "Erreur: " . $e->getMessage();
    die();
}

?>

<ul class="list-container">
    <?php foreach($counters as $counter): ?>
    <li class="read-list">
        <div><?= $counter['name'] ?></div>
        <div><?= $counter['species'] ?></div>
        <div><?= $counter['counter'] ?></div>
    </li>
    <?php endforeach; ?>
</ul>