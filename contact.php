<?php include_once "template/header.php"; ?>

<!-- FORM SECTION -->
<section class="section-contained background-green2 column rounded text-white">
    <form class="section-form" action="#">

            <legend>Nous contacter</legend>
        
        <fieldset>
            <label for="email">Adresse email</label>
            <input class="input-text" type="email" name="email" id="email" required>
        </fieldset>
        
        <fieldset>
            <label for="contact-object">Objet</label>
            <input class="input-text" type="text" name="contact-subject" id="contact-subject" required>
        </fieldset>
        
        <fieldset>
            <label for="contact-content">Message</label>
            <textarea class="input-text text-area" rows="10" name="contact-content" id="contact-content" required></textarea>
        </fieldset>
        
        <fieldset>
            <input class="input-submit" type="submit" value="Confirmer">
        </fieldset>
    </form>
</section>

<?php include_once "template/footer.php"; ?>