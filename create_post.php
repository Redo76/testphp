<?php
session_start();

include_once('variables.php');
include_once('config/mysql.php');

// Vérification du formulaire soumis
if (!isset($_POST['title']) || !isset($_POST['recipe'])){
    echo 'Il faut un titre et une recette pour soumettre le formulaire.';
    return;
}

$title = $_POST['title'];
$recipe = $_POST['recipe'];

// Faire l'insertion en base

$sqlInsert = 'INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)';

$insertRecipe = $mysqlClient -> prepare($sqlInsert);
$insertRecipe -> execute([
    'title' => $title,
    'recipe' => $recipe,
    'is_enabled' => 1,
    'author' => $_SESSION['LOGGED_USER'],
]);
?>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php include_once('header.php'); ?>
            <h1>Recette ajoutée avec succès !</h1>
            <div class="card">
                <div class="card-body">
                    <h2><?php echo($title) ?></h2>
                    <p class="card-text"><b>Email</b> : <?= $_SESSION['LOGGED_USER']?></p>
                    <p class="card-text"><b>Recette</b> : <?= $recipe ?></p>  
                </div>

            </div>
    </div>
    <?php include_once('footer.php'); ?>
</body>
