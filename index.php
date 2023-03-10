<?php

    include('templates/header.php');
    include('lib/recipe.php');
    require_once('lib/tools.php');
    // require_once('lib/pdo.php');

    $recipes = getRecipes($pdo, _HOME_RECIPES_LIMIT_);
?>


<!-- Hero section -->

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="assets/images/hero_homepage.jpg" class="d-block mx-lg-auto img-fluid rounded" alt="Logo Cuisinea" width="400" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Cuisinea <br> Recettes de cuisine</h1>
            <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="recettes.php"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Voir nos recettes</button></a>
            </div>
        </div>
    </div>


<!-- Recipes -->

    <div class="row pt-5">
        <?php
            foreach ($recipes as $key => $recipe) {
                include('templates/recipe_partial.php');
                } 
            ?>
    </div>


<!-- Footer  -->

    <?php include('templates/footer.php'); ?>