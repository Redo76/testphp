<?php
include_once('variables.php');

foreach ($recipes as $key => $recipe) {
    if ($_GET['id'] === $recipe['recipe_id']) {
        $currentRecipe = $recipe;
        break;
    }
}
?>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php include_once('header.php'); ?>
            <h1>Mettre à jour</h1>
            <form action="./update_post.php" method="POST">
                <div class="visually-hidden">
                    <label for="id" class="form-label">Identifiant de la recette</label>
                    <input type="hidden" class="form-control" name="id" id="id" value="<?= $currentRecipe['recipe_id'] ?>">
                </div>
                <div >
                    <label for="title" class="form-label">Titre de la recette</label>
                    <input type="text" class="form-control" name="title" id="title"
                    value="<?= $currentRecipe['title'] ?>">
                    <div id="title-help" class="form-text">Choisissez un titre percutant !</div>
                </div>
                <div>
                    <label for="recipe">Description de la recette</label>
                    <textarea name="recipe" id="recipe" class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droits.">
                    <?= $currentRecipe['recipe'] ?>
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
    </div>
    <?= var_dump($_GET) ?>
    <?php include_once('footer.php'); ?>
</body>