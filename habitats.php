<?php include_once "template/header.php"; ?>

<!-- HABITAT SECTION-->
<section id=habitat-section class="section-container column">
    <h2>Les Habitats</h2>
    <article>
        <div class="hero-container">
            <div class="container-row row-justify-start row-gap">
                <!--LOOP THROUGH START-->
                <button class="button-wrapper habitat-button" type="button">
                    <div
                        class="container-col col-square bg-cover"
                        style=" background: linear-gradient(to bottom, black, transparent),
                                                url(../assets/img/stock_jungle.jpg);
                                    background-repeat: no-repeat;
                                    background-size: cover;">
                        <div class="col-header">
                            <h2>Jungle</h2>
                        </div>
                    </div>
                </button>
                <button class="button-wrapper habitat-button" type="button">
                    <div
                        class="container-col col-square bg-cover"
                        style=" background: linear-gradient(to bottom, black, transparent),
                                                url(../assets/img/stock_jungle.jpg);
                                    background-repeat: no-repeat;
                                    background-size: cover;">
                        <div class="col-header">
                            <h2>Jungle</h2>
                        </div>
                    </div>
                </button>
                <button class="button-wrapper habitat-button" type="button">
                    <div
                        class="container-col col-square bg-cover"
                        style=" background: linear-gradient(to bottom, black, transparent),
                                                url(../assets/img/stock_jungle.jpg);
                                    background-repeat: no-repeat;
                                    background-size: cover;">
                        <div class="col-header">
                            <h2>Jungle</h2>
                        </div>
                    </div>
                </button>
                <!--LOOP THROUGH END-->
            </div>
    </article>
</section>

<!-- MODAL : HABITAT DETAIL AND ANIMAL LIST -->
<!-- ANIMAL LIST LEADS TO INDIVIDUAL PAGE -->
<!-- not a true modal.-->

<section id="modal-section" class="section-container column modal hidden">

    <h2>Habitat</h2>

    <!--habitat detail article-->
    <article>
        <div class="hero-container border">
            <div class="container-col">
                <h2>Jungle</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dicta aliquam enim explicabo accusamus deleniti laudantium? Est alias iste nihil, dignissimos impedit, ullam autem aut minima fuga repellat cumque vero nemo tenetur omnis incidunt at iusto dolor totam voluptatibus adipisci eveniet numquam sint unde similique! Delectus eum aut magnam excepturi iure, eos neque minima rem ut. Voluptate facere corrupti assumenda.</p>
            </div>
            <div class="container-col container-col-img">
                <img src="../assets/img/stock_jungle.jpg" alt="hero-image">
            </div>
        </div>
    </article>

    <button class="back-button" type="button">Back to Habitats</button>

    <!--animal list-->
    <article>
        <div class="hero-container">
            <div class="container-row row-justify-start row-gap">
                <!--LOOP THROUGH START-->
                <button class="button-wrapper" type="button">
                    <div
                        class="container-col col-square bg-cover"
                        style=" background: linear-gradient(to bottom, black, transparent),
                                            url(../assets/img/stock_dog_300x300.jpg);
                                background-repeat: no-repeat;
                                background-size: cover;"
                    >
                        <div class="col-header">
                            <h2>Annihilator</h2>
                        </div>
                    </div>
                </button>
                <button class="button-wrapper" type="button">
                    <div
                        class="container-col col-square bg-cover"
                        style=" background: linear-gradient(to bottom, black, transparent),
                                            url(../assets/img/stock_dragon_300x300.jpg);
                                background-repeat: no-repeat;
                                background-size: cover;"
                    >
                        <div class="col-header">
                            <h2>Cupcake</h2>
                        </div>
                    </div>
                </button>
                <!--LOOP THROUGH END-->
            </div>
    </article>

    <button class="back-button" type="button">Back to Habitats</button>
</section>

<?php include_once "template/footer.php"; ?>