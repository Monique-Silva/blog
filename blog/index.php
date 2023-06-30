<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Mon blog</title>
</head>
<body>

<?php
echo "Bienvenue sur le blog";
# == Frontcontroller == #
$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
## Ici je stock toutes la/les requettes GET['action'] dans la variable $action
$routes = [
    # Crée un tableau un tableau associatif dans lequel je stock toutes les root possible avec une clé définit
    "home" => "home.php",
    "contact" => "contact.php",
    "about" => "about.php"
    // ajouter des 'clés' => 'routes' routes ici
];
 if(!array_key_exists($action,$routes)){
    #Si la valeur $action ne correspond a aucunes des clés dans $route ALORS
    #l'action n'existe pas
    #affichage page 404

 }else{
    # SINON SI LA VALEUR $action = est égale a des clés de route[]
    # la variable page prendra la valeur de la clés qui correspond a la variable $action dans le tableau $routes
    $page = $routes[$action];
    include $page;
 }

 try 
{
    $db = new PDO("mysql:host=blog.local;dbname=blog", "Monique-Silva", "2712"); //pour se conecter à la base de données "blog"
}
catch (Exception $e)
{
    die("Erreur : " . $e->getMessage());
}

 ?>

</body>
</html>
