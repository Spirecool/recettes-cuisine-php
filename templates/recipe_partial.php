<div class="col-md-4">
    <div class="card">
        <img src="<?php echo _RECIPES_IMG_PATH_ . $recipe['image']; ?>" class="card-img-top" alt="<?php echo $recipe['titre']; ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $recipe['titre'] ?></h5>
            <p class="card-text"><?php echo $recipe['description'] ?></p>
            <a href="recette.php?id=<?=$key?>" class="btn btn-primary">Voir la recette</a>
        </div>
    </div>
</div>