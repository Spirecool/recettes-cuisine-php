<?php

    require_once('templates/header.php');
    require_once('lib/recipe.php');
    require_once('lib/tools.php');
    // require_once('lib/pdo.php');

    $recipes = getRecipes($pdo);

?>


<!-- Hero section -->

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <h1> Liste des recettes </h1>
</div>


<!-- Recipes -->

<div class="row">
    <?php
    foreach ($recipes as $key => $recipe) {
        include('templates/recipe_partial.php');
    }
    ?>
</div>


<!-- Footer  -->

<?php include('templates/footer.php'); ?>