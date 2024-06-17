<form method="post" action="dashboard.php" class="list-container">
    <label for="email">email</label>
    <input type="email" name="email">

    <label for="name">nom</label>
    <input type="text" name="name">
    
    <label for="password">mot de passe</label>
    <input type="text" name="password"> <!-- IN CASE HIDING THE PASSWORD IS NOT NECESSARY -->

    <label for="role">rôle</label>
    <select name="role">
        <option value="vet">Vet</option>
        <option value="mod">Mod</option>
    </select>

    <input type="hidden" name="c_staff" value="c_staff">
    <input type="submit" value="confirmer">
</form>