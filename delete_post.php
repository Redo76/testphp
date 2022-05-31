<?php
session_start();

include_once('variables.php');
include_once('config/mysql.php');


$id = $_GET['id'];

$sqlUpdate = 'DELETE FROM recipes WHERE recipe_id=:id' ;


$updateRecipe = $mysqlClient -> prepare($sqlUpdate);
$updateRecipe -> execute([
    'id' => $id,
]);

header('Location: ./home.php');
?>