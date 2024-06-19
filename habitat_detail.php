<?php
include_once "template/header.php";

if (isset($_GET['id'])) {
    $habitat_id = $_GET['id'];
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
            WHERE h.id = :habitat_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
    $stmt->execute();
    $habitat = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($habitat) { ?>
    <section id=habitat-section class="section-container column">
        <article>
            <div class="hero-container border">
                <div class="container-col">
                    <h2><?= $habitat['habitat_name'] ?></h2>
                    <p> <?= $habitat['habitat_description'] ?></p>
                </div>
                <div class="container-col container-col-img">
                    <img src="<?= $habitat['habitat_image'] ?>" alt="hero-image">
                </div>
            </div>
        </article>

        <article>
                <div class="hero-container">
                    <div class="container-row row-justify-start row-gap">
                        <!-- LOOP THROUGH ANIMALS START -->
                        <?php
                        $sql_animals = "SELECT * FROM animals WHERE habitat_id = :habitat_id";
                        $stmt_animals = $pdo->prepare($sql_animals);
                        $stmt_animals->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
                        $stmt_animals->execute();
                        $animals = $stmt_animals->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($animals as $animal) {
                        ?>
                            <button class="button-wrapper" type="button">
                                <div class="container-col col-square bg-cover"
                                    style="background: linear-gradient(to bottom, black, transparent),
                                            url(<?= $animal['imagePath'] ?>);
                                            background-repeat: no-repeat;
                                            background-size: cover;">
                                    <div class="col-header">
                                        <h2><?= $animal['name'] ?></h2>
                                    </div>
                                </div>
                            </button>
                        <?php
                        }
                        ?>
                        <!-- LOOP THROUGH ANIMALS END -->
                    </div>
                </div>
            </article>
    </section>

    <?php } else {
        header("Location: home.php");
    }
} 
else
{
    header("Location: home.php");
}

include_once "template/footer.php";
?>