<?php

include('templates/header.php');
include('lib/recipe.php');

// récupère l'index de la recette
$id = ($_GET['id']);


?>


<!-- Recipe -->

<div class="row">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="uploads/recipes/<?php echo $recipes[$id]['image'] ?>" class="d-block mx-lg-auto img-fluid" alt="<?php echo $recipes[$id]['titre'] ?>" width="500"
            loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3"> <?php echo $recipes[$id]['titre'] ?></h1>
            <p class="lead"> <?php echo $recipes[$id]['description'] ?> </p>
        </div>
    </div>
</div>


<!-- Footer  -->

<?php include('templates/footer.php'); ?>