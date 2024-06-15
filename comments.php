<?php include_once "template/header.php"; ?>

<!-- REVIEWS SECTION -->
<!--warning spaghetti code-->
<section class="section-contained background-green1 column rounded">
    <div class="hero-text">
        <h2>Les avis de nos clients</h2>
    </div>
    <!-- CYCLED-THROUGH COMMENT DIV START-->
        <div class="comment-div">
            <div class="comment-rating">
                <h2 class="comment-note">5</h2>
                <h2 class="comment-total">/5</h2>
            </div>
            <div class="comment-text">
                <h2 class="comment-title">John Smith</h2>
                <p class="comment-content">Ce zoo est épatant. Ma fille a adoré ce qu'il y avait dans la jungle.</p>
            </div>
        </div>
        <div class="comment-div">
            <div class="comment-rating">
                <h2 class="comment-note">4</h2>
                <h2 class="comment-total">/5</h2>
            </div>
            <div class="comment-text">
                <h2 class="comment-title">John Smith</h2>
                <p class="comment-content">Ce zoo est épatant. Ma fille a adoré ce qu'il y avait dans la jungle.</p>
            </div>
        </div>
        <div class="comment-div">
            <div class="comment-rating">
                <h2 class="comment-note">4</h2>
                <h2 class="comment-total">/5</h2>
            </div>
            <div class="comment-text">
                <h2 class="comment-title">John Smith</h2>
                <p class="comment-content">Ce zoo est épatant. Ma fille a adoré ce qu'il y avait dans la jungle.</p>
            </div>
        </div>
    <!-- CYCLED-THROUGH COMMENT DIV END-->
        <div class="button-row">
            <a class="button button-black" href="">Voir plus</a>
        </div>
</section>

<!-- FORM SECTION -->
<section class="section-contained background-green2 column rounded text-white">
    <form class="section-form" action="#">

            <legend>Laissez un commentaire</legend>
        
        <fieldset>
            <label for="username">Nom</label>
            <input class="input-text" type="text" name="username" id="username" maxlength="30" required>
        </fieldset>
        
        <fieldset>
            <label for="rating">Note</label>
            <input type="number" name="rating" id="rating" min="1" max="5" step="1" required>
        </fieldset>
        
        <fieldset>
            <label for="comment-content">Comment</label>
            <textarea class="input-text text-area" rows="10" name="comment-content" id="comment-content" required></textarea>
        </fieldset>
        <fieldset>
            <input class="input-submit" type="submit" value="Confirmer">
        </fieldset>
    </form>
</section>



<?php include_once "template/footer.php"; ?>