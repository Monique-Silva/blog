<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Mon blog</title>
</head>
<body>

<?php
//pour tester si le line marche avec action: http://blog.local/index.php?action=nomedulien
echo "Bienvenue sur le blog";
# == Frontcontroller == #
$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
## Ici je stock toutes la/les requettes GET['action'] dans la variable $action
$routes = [
    # Crée un tableau un tableau associatif dans lequel je stock toutes les root possible avec une clé définit
    "home" => "ressources/views/home.php",
    "contact" => "ressources/views/contact.php",
    "about" => "ressources/views/about.php",
    "/" => "app/controllers/homeController.php"
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

 include ('config/database.php');
 ?>

</body>
</html>