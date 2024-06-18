<form method="post" action="dashboard.php" class="list-container" enctype="multipart/form-data">
    <label for="title">titre</label>
    <input type="text" name="title" id="title" required>

    <label for="description">description</label>
    <textarea name="description" id="description"></textarea>

    <label for="image">Upload Image</label>
    <input type="file" name="image" id="image">

    <input type="hidden" name="c_service" value="c_service">
    <input type="submit" value="confirmer">
</form>
