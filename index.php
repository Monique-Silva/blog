<?php
session_start(); // Commence ou continue une session
// pour vérifier les bugs:
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

//pour tester si le line marche avec action: http://blog.local/index.php?action=nomedulien

# == Frontcontroller == #
$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
## Ici je stock toutes la/les requettes GET['action'] dans la variable $action
$routes = [
    # Crée un tableau un tableau associatif dans lequel je stock toutes les root possible avec une clé définit
    "home" => "ressources/views/home.tpl.php",
    "contact" => "ressources/views/contact.php",
    "about" => "ressources/views/about.php",
    "/" => "app/controllers/homeController.php"
    // ajouter des 'clés' => 'routes' routes ici
];

if(!array_key_exists($action,$routes)){
    #Si la valeur $action ne correspond a aucunes des clés dans $route ALORS
    #l'action n'existe pas
    #affichage page 404
 }  

if ($action === null) {
    include ("app/controllers/homeController.php");

 } else {
    # SINON SI LA VALEUR $action = est égale a des clés de route[]
    # la variable page prendra la valeur de la clés qui correspond a la variable $action dans le tableau $routes
    $action = $routes[$action];
    include $action;
 }
 
 include ("config/database.php");
 ?>

</body>
</html>