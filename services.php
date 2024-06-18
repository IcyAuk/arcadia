<?php include_once "template/header.php"; ?>

<?php
try
{
    $stmt = $pdo->prepare("SELECT title, description, imagePath FROM services");
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e){
    echo "Erreur: ". $e->getMessage();
    die();
}
?>


<section class="section-container column">
    <h2>Nos Services</h2>
    <!--CYCLE-THROUGH START-->
    <?php foreach($services as $service): ?>
    <article>
        <div class="hero-container border">
            <div class="container-col">
                <h2><?= htmlspecialchars($service['title']) ?></h2>
                <p><?= htmlspecialchars($service['description']) ?></p>
            </div>
            <div class="container-col container-col-img">
                <img src=" <?= htmlspecialchars($service['imagePath']) ?> " alt="hero-image">
            </div>
        </div>
    </article>
    <?php endforeach; ?>
    <!--CYCLE-THROUGH END-->
</section>

<?php include_once "template/footer.php"; ?>