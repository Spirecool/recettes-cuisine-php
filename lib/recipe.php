<?php


function getRecipeById(PDO $pdo,int $id)
{
    $query = $pdo->prepare("SELECT * FROM recipes WHERE id = :identifiant"); // on met ':identifiant' à la place de $id
    $query->bindParam(':identifiant', $id, PDO::PARAM_INT); // ici on protège la requête : remplace moi 'indentifiant' par $id dans la requête 
    $query->execute();
    return $query->fetch();
}


// function getRecipeImage(string $image) {
//     if ($image === null) {
//         return _ASSETS_IMG_PATH_.'recipe_default.jpg';
//     } else {
//         return _RECIPES_IMG_PATH_.$image;
//     }
// }
