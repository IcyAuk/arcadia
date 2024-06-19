<?php
require_once "./template/header.php";

if (!isset($_GET['edit_id'])) {
    header("Location: dashboard.php");
    exit();
}

$edit_id = $_GET['edit_id'];

try {
    $stmt = $pdo->prepare("SELECT id, habitat_id, name, species, description, imagePath FROM animals WHERE id = :id");
    $stmt->bindParam(':id', $edit_id, PDO::PARAM_INT);
    $stmt->execute();
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$animal) {
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
    <form class="list-container" method="post" action="#" enctype="multipart/form-data">
        <input type="hidden" name="animal_id" value="<?= $animal['id'] ?>">

        <label for="name">titre</label>
        <input type="text" name="name" id="name" value="<?= $animal['name'] ?>" required>

        <label for="description">description</label>
        <textarea name="description" id="description" required><?= $animal['description'] ?></textarea>

        <label for="image">image</label>
        <?php if (!empty($animal['imagePath'])): ?>
            <img src="<?= $animal['imagePath'] ?>" alt="animal Image" style="max-width: 300px;">
        <?php else: ?>
            <p>pas d'image</p>
        <?php endif; ?>
        <br>
        <label for="new_image">Changer l'image</label>
        <input type="file" name="new_image" id="new_image">

        <input type="hidden" name="u_animal" value="u_animal">
        <input type="submit" name="update" value="Update">
    </form>

</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['u_animal']) && $_POST['u_animal'] === 'u_animal') {
        // Process form data and update database
        $animal_id = $_POST['animal_id'];
        $name = $_POST['name'];
        $habitat_id = $_POST['habitat_id'];
        $species = $_POST['species'];
        $description = $_POST['description'];
        $oldPath = $animal['imagePath'];

        // bad image handler. don't forget to replace it with the real function
        if ($_FILES['new_image']['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['new_image']['tmp_name'];
            $new_image_path = "../uploads/" . $_FILES['new_image']['name'];
            move_uploaded_file($tmp_name, $new_image_path);
        } else {
            $new_image_path = $oldPath;
        }
        //working cr U d code. abstract it to pdo later.
        try {
            $update_stmt = $pdo->prepare("UPDATE animals SET habitat_id = :habitat_id ,name = :name, species = :species, description = :description, imagePath = :imagePath WHERE id = :id");
            $update_stmt->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
            $update_stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $update_stmt->bindParam(':species', $species, PDO::PARAM_STR);
            $update_stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $update_stmt->bindParam(':imagePath', $new_image_path, PDO::PARAM_STR);
            $update_stmt->bindParam(':id', $animal_id, PDO::PARAM_INT);
            $update_stmt->execute();

            header("Location: dashboard.php");
            exit();
        } catch (PDOException $e) {
            echo "Error updating service: " . $e->getMessage();
            die();
        }
    } else {
        echo "Invalid request";
    }
}

require_once "./template/footer.php"; ?>