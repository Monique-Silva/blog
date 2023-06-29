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
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
## Ici je stock toutes les requette GET['action'] dans la variable $action

$routes = [
    #Crée un tableau un tableau associatif dans lequel je stock toutes les root possible
    'home' => 'home.php'
    'contact' => 'contact.php'
    'about' => 'about.php'
    // ajouter des routes ici
];

 if(!array_key_exists($action,$routes)) {
    #Si la valeur $action = ne correspond a aucunes des valeurs dans $route ALORS 
    //l'action n'existe pas
    //affichage page 404
    header("HTTP/1.0 404 Not Found");
    include*('404.php');
 }else{
    # SINON SI LA VALEUR $action = est égale a une valeur stocker dans route[]
    # il prendra la valeur de action et affichera la root du tableau $route qui est identique a la valeur de $_GET['action']
    $page = $routes[$action];
    include $page;
 }
</body>
</html>