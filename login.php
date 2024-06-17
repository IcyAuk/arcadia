<?php include_once "template/header.php"; ?>

<!-- FORM SECTION -->
<section class="section-contained background-green1 column rounded text-white">
    <form method="post" class="section-form" action="login.php">

        <legend>Connexion</legend>

        <fieldset>
            <label for="login-email">email</label>
            <input class="input-text" type="email" name="login-email" id="login-email" required>
        </fieldset>

        <fieldset>
            <label for="login-pw">Mot de passe</label>
            <input class="input-text" type="password" name="login-pw" id="login-pw" required></input>
        </fieldset>
        <fieldset>
            <input class="input-submit" type="submit" value="Confirmer">
        </fieldset>
    </form>
</section>

<?php
//verifyLogin
if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
            $email = filter_input(INPUT_POST, "login-email", FILTER_SANITIZE_EMAIL);
            $password = $_POST["login-pw"];

            //machine will look for that email, then for matching password
            $stmt = $pdo->prepare('SELECT id, email, name, password FROM staff WHERE email = ?');
            $stmt->execute([$email]);
            $staff = $stmt->fetch();

            if ($staff && password_verify($password, $staff['password'])) {
                // Password is correct, start a session
                $_SESSION['user_id'] = $staff['id'];
                $_SESSION['user_email'] = $staff['email'];
                $_SESSION['user_name'] = $staff['name'];
                header("Location:admin/dashboard.php");
            } else {
                echo "Invalid email or password.";
            }
}
?>

<?php include_once "template/footer.php";?>