<?php
    include_once "template/header.php";
?>

<section>
    <div class="hero-fullimg">
        <div class="hero-text">
            <h1>Grand avec un Grand G</h1>
            <p>Arcadia est le plus grand zoo de Bretagne et est l'idyille des animaux depuis 1960.</p>
            <p>Il y a de la place pour nos animaux, et il y en a pour vous.</p>
        </div>
    </div>
</section>

<!-- SECTION ANIMALS -->
    <section class="section-contained background-green1">
        <div class="hero">
            <div class="row">

                <div class="hero-text">
                    <h2>Des animaux ravis de vous voir!</h2>
                    <p class="align-left">Que ce soient nos giraffes, nos toucans, ou nos alligators... Chez Arcadia, nos vets prennent soin de nos animaux.</p>
                    <p class="align-left">Et ça les rend heureux.</p>
                </div>
                <div class="hero-image">
                    <img src="/assets/img/stock_giraffe.webp" alt="">
                </div>
            </div>
        </div>
    </section>

<!-- SECTION HABIATS -->
    <section class="section-contained background-black">
        <div class="hero">
            <div class="row">
                <div class="hero-image order-1">
                    <img src="/assets/img/stock_jungle.jpg" alt="">
                </div>
                <div class="hero-text">
                    <h2>Une vraie diversité à visiter...</h2>
                    <p class="align-left">Arcadia a de vastes savanes, jungles et marais. Des guides et un train sont là pour immortaliser l’expérience.</p>
                    <p class="align-left"> Nos habitats sont à vous couper le souffle.</p>
                </div>
            </div>
            <div class="button-row order-1">
                <a class="button" href="">Voir les habitats</a>
                <a class="button" href="">Voir les services</a>
            </div>
        </div>
    </section>

<!-- SECTION NOURRITURE -->
<section class="section-contained background-green2">
        <div class="hero">
            <div class="row">

                <div class="hero-text">
                    <h2>Et à déguster.</h2>
                    <p class="align-left">Des plats végétariens ou carnivores, de plusieurs cultures.</p>
                    <p class="align-left"> Nos plats sont à couper votre jeune.</p>
                </div>
                <div class="hero-image">
                    <img src="/assets/img/stock_meal.jpg" alt="">
                </div>
            </div>
            <div class="button-row">
                <a class="button button-black" href="">Voir les services</a>
            </div>
        </div>
    </section>

<!-- SECTION COMMENTAIRES -->

<section class="section-contained background-green1 column">
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
            <a class="button button-black" href="">Voir les commentaires</a>
        </div>
    </section>

<?php
    include_once "template/footer.php";
?>