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
    <form class="list-container" method="post" action="#" enctype="multipart/form-data">
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['u_service']) && $_POST['u_service'] === 'u_service') {
        // Process form data and update database
        $service_id = $_POST['service_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $oldPath = $service['imagePath'];

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
            $update_stmt = $pdo->prepare("UPDATE services SET title = :title, description = :description, imagePath = :imagePath WHERE id = :id");
            $update_stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $update_stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $update_stmt->bindParam(':imagePath', $new_image_path, PDO::PARAM_STR);
            $update_stmt->bindParam(':id', $service_id, PDO::PARAM_INT);
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