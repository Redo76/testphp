<?php
try
{
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=my_recipes;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table recipes
$sqlQuery = 'INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)';


$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute([
    'title' => 'Cassoulet',
    'recipe' => 'Etape 1 : Des flageolets ! Etape 2 : Euh ...',
    'author' => 'contributeur@exemple.com',
    'is_enabled' => 1, // 1 = true, 0 = false
]
);
$recipes = $recipesStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($recipes as $recipe) {
?>
    <p><?php echo $recipe['author']; ?></p>
<?php
}
?>