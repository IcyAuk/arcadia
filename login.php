<?php include_once "template/header.php"; ?>

<!-- FORM SECTION -->
<section class="section-contained background-green1 column rounded text-white">
    <form class="section-form" action="#">

            <legend>Connexion</legend>
        
        <fieldset>
            <label for="login-username">Nom</label>
            <input class="input-text" type="text" name="login-username" id="login-username" required>
        </fieldset>
        
        <fieldset>
            <label for="login-pw">Mot de passe</label>
            <input class="input-text" name="login-pw" id="login-pw" required></input>
        </fieldset>
        <fieldset>
            <input class="input-submit" type="submit" value="Confirmer">
        </fieldset>
    </form>
</section>

<?php include_once "template/footer.php"; ?>