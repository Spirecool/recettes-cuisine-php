<?php

require_once('templates/header.php');
require_once('lib/recipe.php');
require_once('lib/tools.php');

if(isset($_POST['saveRecipe'])) {

    $res = saveRecipe($pdo, $_POST['category'], $_POST['title'], $_POST['category'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'],null);
    var_dump($res);

}


?>


<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <h1> Ajouter/Supprimer une recette </h1>
</div>


<form method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <!-- le FOR et L'ID font le lien entre le champ et l'input -->
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description">Description</label>
        <textarea name="description" id="description" col="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="ingredients">Ingrédients</label>
        <textarea name="ingredients" id="ingredients" col="30" rows="7" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="instructions">Instructions</label>
        <textarea name="instructions" id="instructions" col="30" rows="7" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Catégorie</label>
        <select name="category" id="category" class="form-select">
            <option value="1"> Entrée </option>
            <option value="2"> Plat </option>
            <option value="3"> Dessert </option>
        </select>
    </div>

    <div class="mb-3">
        <label for="file" class="form-label"> Image </label>
        <input type="file" name="file" id="file">
    </div>
    
    <input type="submit" value="Enregistrer" name="saveRecipe" class="btn btn-primary">

</form>



<!-- Footer  -->

<?php require_once('templates/footer.php'); ?>