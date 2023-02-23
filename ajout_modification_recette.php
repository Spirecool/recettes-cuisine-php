<?php

require_once('templates/header.php');
require_once('lib/recipe.php');
require_once('lib/tools.php');
require_once('lib/category.php');

$errors = [];
$messages = []; // ici on défini le tableau $messages
$recipe =  [
    'title' => '',
    'description' => '',
    'ingredients' => '',
    'instructions' => '',
    'category_id' => '',
];

$categories = getCategories($pdo);

if (isset($_POST['saveRecipe'])) {

    // on teste si un fichier a été envoyé
    if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
        $checkImage = getimagesize($_FILES['file']['tmp_name']);

        if ($checkImage !== false) {
            // Si c'est une image, on traite
            $fileName = uniqid() . '-' . slugify($_FILES['file']['name']); // on met un identifiant unique avant le nom du fichier, pour le rendre unique (uniqid)
            // Pour faire un clean du nom de fichier, permet de faire des remplacements dans un nom (slugify), fonction est dans tools.php
            move_uploaded_file($_FILES['file']['tmp_name'], _RECIPES_IMG_PATH_ . $fileName); // Déplace notre fichier temporaire vers un autre endroit
        } else {
            // Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit être une image';
        }
    }

    // Insertion en BDD = $res

    if(!$errors) { // si pas d'erreur, alors on sauvegarde en BDD
        $res = saveRecipe($pdo, $_POST['category'], $_POST['title'], $_POST['category'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], $fileName);

        if ($res) {
            $messages[] = 'La recette a bien été sauvegardée'; // ici on créé un nouvel élément dans le tableau $messages
        } else {
            $errors[] = 'La recette n\'a pas été sauvegardée';
        }
    }

    $recipe = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'ingredients' => $_POST['ingredients'],
        'instructions' => $_POST['instructions'],
        'category_id' => $_POST['category_id'],
    ];
    
}


?>


<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <h1> Ajouter/Supprimer une recette </h1>
</div>

<?php foreach ($messages as $message) { ?>
    <div class="alert alert-success">
        <?php echo $message ?>
    </div>
<?php } ?>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger">
        <?php echo $error ?>
    </div>
<?php } ?>


<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <!-- le FOR et L'ID font le lien entre le champ et l'input -->
        <label for="title" class="form-label"">Titre</label>
        <input type="text" name="title" id="title" class="form-control" value="<?=$recipe['title'] ;?>">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control"><?=$recipe['description'] ;?></textarea>
    </div>
    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredients</label>
        <textarea name="ingredients" id="ingredients" cols="30" rows="5" class="form-control"><?=$recipe['ingredients'] ;?></textarea>
    </div>
    <div class="mb-3">
        <label for="instructions" class="form-label">Instructions</label>
        <textarea name="instructions" id="instructions" cols="30" rows="5" class="form-control"><?=$recipe['instructions'] ;?></textarea>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Catégorie</label>
        <select name="category" id="category" class="form-select">

            <?php foreach ($categories as $category) { ?>
                <option value="<?=$category['id']; ?>" <?php if ($recipe['category_id'] == $category['id']) { echo 'selected="selected"'; } ?>><?=$category['name'];?></option>
            <?php } ?>

        </select>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Image</label>
        <input type="file" name="file" id="file">
    </div>
    <input type="submit" value="Enregistrer" name="saveRecipe" class="btn btn-primary">


</form>



<!-- Footer  -->

<?php require_once('templates/footer.php'); ?>