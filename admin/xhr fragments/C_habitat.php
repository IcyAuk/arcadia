<form method="post" action="dashboard.php" class="list-container" enctype="multipart/form-data">
    <label for="name">nom</label>
    <input type="text" name="name" id="name" required>

    <label for="description">description</label>
    <textarea name="description" id="description"></textarea>

    <label for="image">Upload Image</label>
    <input type="file" name="image" id="image">

    <input type="hidden" name="c_habitat" value="c_habitat">
    <input type="submit" value="confirmer">
</form>
