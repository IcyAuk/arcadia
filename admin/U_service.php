<?php
require_once "./template/header.php";

if (!isset($_GET['edit_id'])) {
    header("Location: dashboard.php");
    exit();
}

$edit_id = $_GET['edit_id'];

try {
    $stmt = $pdo->prepare("SELECT id, title, description, imagePath FROM services WHERE id = :id");
    $stmt->bindParam(':id', $edit_id, PDO::PARAM_INT);
    $stmt->execute();
    $service = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$service) {
        // if no service of this id is found, die
        echo "service manquant";
        die();
    }
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
    die();
}
?>

<div id="container" class="container column">
<h1>Edit Service</h1>
    <form class="list-container" method="post" action="lib/update_service.php" enctype="multipart/form-data">
        <input type="hidden" name="service_id" value="<?= $service['id'] ?>">

        <label for="title">titre</label>
        <input type="text" name="title" id="title" value="<?= $service['title'] ?>" required>

        <label for="description">description</label>
        <textarea name="description" id="description" required><?= $service['description'] ?></textarea>

        <label for="image">image</label>
        <?php if (!empty($service['imagePath'])): ?>
            <img src="<?= $service['imagePath'] ?>" alt="Service Image" style="max-width: 300px;">
        <?php else: ?>
            <p>pas d'image</p>
        <?php endif; ?>
        <br>
        <label for="new_image">Changer l'image</label>
        <input type="file" name="new_image" id="new_image">

        <input type="hidden" name="u_service" value="u_service">
        <input type="submit" name="update" value="Update">
    </form>

</div>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
}

require_once "./template/footer.php"; ?>