<?php
try {
    $stmt = $pdo->prepare('SELECT day, ouverture, fermeture FROM schedule ORDER BY FIELD(day, "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche")');

    $stmt->execute();

    $scheduleRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
    die();
}
?>

</main>
    <footer>
        <div class="section-contained column">
            <div class="row-header">Nos horaires</div>
            <?php foreach ($scheduleRows as $row): ?>
                <div class="row schedule-row">
                    <div class="schedule-day"><?= ucfirst($row['day']) ?></div>
                    <div class="schedule-opening-hour"><?= $row['ouverture'] ?></div>
                    <div class="schedule-cloding-hour"><?= $row['fermeture'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </footer>
</body>
</html>