<?php

include('templates/header.php');
include('lib/recipe.php');
require_once('lib/tools.php');

// récupère l'index de la recette
$id = ($_GET['id']);


// Requête sécurisée 

$pdo = new PDO('mysql:dbname=cuisinea;host=localhost;charset=utf8mb4', 'root', '');

$id = (int)$_GET['id'];
$query = $pdo->prepare("SELECT * FROM recipes WHERE id = :identifiant"); // on met ':identifiant' à la place de $id
$query->bindParam(':identifiant', $id, PDO::PARAM_INT); // ici on protège la requête : remplace moi 'indentifiant' par $id dans la requête 
$query->execute();
$recipe = $query->fetch();

// on affiche une image par défaut si elle est NULL en BDD

if ($recipe['image'] === null) {
    $imagePath = _ASSETS_IMG_PATH_ . 'recipe_default.jpg';
} else {
    $imagePath = _RECIPES_IMG_PATH_ . $recipe['image'];
}

// Ingrédients, les affiche les uns en dessous des autres
$ingredients = linesToArray($recipe['ingredients']);


?>


<!-- Recipe -->

<div class="row">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="<?php echo $imagePath ?>" class="d-block mx-lg-auto img-fluid" alt="<?php echo $recipe['title'] ?>" width="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3"> <?php echo $recipe['title'] ?></h1>
            <p class="lead"> <?php echo $recipe['description'] ?> </p>
        </div>
    </div>
</div>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <h2> Ingrédients </h2>
    <ul class="list-group">
            <?php foreach ($ingredients as $key => $ingredient) { ?>
                <li class="list-group-item">
                    <?php echo $ingredient ?>
                </li>
            <?php } ?>
    </ul>
</div>


<!-- Footer  -->

<?php require_once('templates/footer.php'); ?>