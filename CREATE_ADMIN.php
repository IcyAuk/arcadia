<!--
CREATE FIRST ADMIN
DELETE THIS PHP FILE AFTER SUCCESSFULLY USING IT.
-->

<?php include_once "template/header.php"; ?>

<!-- FORM SECTION -->
<section class="section-contained column rounded">
    <form method="post" class="section-form" action="#">

            <legend>créer un admin</legend>
        
        <fieldset>
            <label for="register-username">Nom</label>
            <input class="input-text" type="text" name="register-username" id="register-username" required>
        </fieldset>

        <fieldset>
            <label for="register-email">Email</label>
            <input class="input-text" type="email" name="register-email" id="register-email" required>
        </fieldset>
        
        <fieldset>
            <label for="register-pw">Mot de passe</label>
            <input class="input-text" type="password" name="register-pw" id="register-pw" required></input>
        </fieldset>

        <fieldset>
            <input class="input-submit" type="submit" value="Confirmer">
        </fieldset>
    </form>
</section>


<?php include_once "template/footer.php"; ?>

<?php

// createAdmin()
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST['register-username'];
    $email = $_POST['register-email'];
    $password = $_POST['register-pw'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare
    (
        'INSERT INTO staff (name, email, password, role) VALUES (?,?,?,?)'
    );
    if($stmt->execute([$username, $email, $hashed_password, "admin"])){
        echo "ADMIN CREATED";
    }
    
}

?>