<?php include_once "template/header.php";

$sql = "SELECT
            h.id, h.name AS habitat_name,
            h.description AS habitat_description,
            h.imagePath AS habitat_image, 
            a.id AS animal_id,
            a.name AS animal_name,
            a.species AS animal_species,
            a.description AS animal_description,
            a.imagePath AS animal_image
        FROM habitats h
        LEFT JOIN animals a ON h.id = a.habitat_id
        ORDER BY h.id";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- HABITAT SECTION-->
<section id="habitat-section" class="section-container column">
    <h2>Les Habitats</h2>
    <article>
        <div class="hero-container">
            <div class="container-row row-justify-start row-gap">
                <?php foreach ($habitats as $habitat): ?>
                <a class="button-wrapper habitat-button" href="habitat_detail.php?id=<?= $habitat['id'] ?>">
                    <div class="container-col col-square bg-cover" style="background: linear-gradient(to bottom, black, transparent), url(<?= $habitat['habitat_image'] ?>); background-repeat: no-repeat; background-size: cover;">
                        <div class="col-header">
                            <h2><?= htmlspecialchars($habitat['habitat_name']) ?></h2>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </article>
</section>

<?php include_once "template/footer.php"; ?>