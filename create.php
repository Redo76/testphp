

<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php include_once('header.php'); ?>
            <h1>Ajouter une recette</h1>
            <form action="./create_post.php" method="POST">
                <div>
                    <label for="title" class="form-label">Titre de la recette</label>
                    <input type="text" class="form-control" name="title" id="title">
                    <div id="title-help" class="form-text">Choisissez un titre percutant !</div>
                </div>
                <div>
                    <label for="recipe">Description de la recette</label>
                    <textarea name="recipe" id="recipe" class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droits."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
    </div>
    <?php include_once('footer.php'); ?>
</body>
