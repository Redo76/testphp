<?php
session_start();

include_once('variables.php');
include_once('config/mysql.php');

// Vérification du formulaire soumis
if (!isset($_POST['id']) || !isset($_POST['title']) || !isset($_POST['recipe'])){
    echo 'Il manque des informations';
    return;
}

$id = $_POST['id'];
$title = $_POST['title'];
$recipe = $_POST['recipe'];

$sqlUpdate = 'UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :recipe_id' ;


$updateRecipe = $mysqlClient -> prepare($sqlUpdate);
$updateRecipe -> execute([
    'title' => $title,
    'recipe' => $recipe,
    'recipe_id' => $id,
]);
?>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php include_once('header.php'); ?>
            <h1>Recette modifiée avec succès !</h1>
    </div>
    <?php include_once('footer.php'); ?>
</body>

