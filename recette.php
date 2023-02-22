<?php

include('templates/header.php');
include('lib/recipe.php');

// récupère l'index de la recette
$id = ($_GET['id']);


// Requête sécurisée 

$pdo = new PDO('mysql:dbname=cuisinea;host=localhost;charset=utf8mb4', 'root', '');

$id = (int)$_GET['id'];
$query = $pdo->prepare("SELECT * FROM recipes WHERE id = :identifiant"); // on met ':identifiant' à la place de $id
$query->bindParam(':identifiant', $id, PDO::PARAM_INT);// ici on protège la requête : remplace moi 'indentifiant' par $id dans la requête 
$query->execute();
$recipe = $query->fetch();

?>


<!-- Recipe -->

<div class="row">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="uploads/recipes/<?php echo $recipe['image'] ?>" class="d-block mx-lg-auto img-fluid" alt="<?php echo $recipe['title'] ?>" width="500"
            loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3"> <?php echo $recipe['title'] ?></h1>
            <p class="lead"> <?php echo $recipe['description'] ?> </p>
        </div>
    </div>
</div>


<!-- Footer  -->

<?php include('templates/footer.php'); ?>