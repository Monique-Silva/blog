<?php
echo "Bienvenue sur le blog";
# == Frontcontroller == #
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
## Ici je stock toutes la/les requettes GET['action'] dans la variable $action
$routes = [
    # Crée un tableau un tableau associatif dans lequel je stock toutes les root possible avec une clé définit
    'home' => 'home.php',
    'contact' => 'contact.php',
    'about' => 'about.php',
    // ajouter des 'clés' => 'routes' routes ici
]
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










 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Mon blog</title>
</head>
<body>

<?php
session_start();

$routes = [
    "home" => "home.php",
    "contact" => "contact.php",
    "about" => "about.php",
    // ajoutez d'autres routes ici
];

$page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRING);
// si aucune page n'est définie dans $_GET, alors on utilise 'home' comme page par défaut
if (empty($page)) {
    $page = "home";
}
ob_start(); // commence la mise en tampon de sortie

if (!array_key_exists($page, $routes)) {
    // Si la page demandée n'existe pas dans $routes, renvoyer une erreur 404
    header("HTTP/1.0 404 Not Found");
    include("404.php"); // supposons que vous avez un fichier 404.php pour gérer les erreurs 404
} else {
    // Si la page demandée existe dans $routes, inclure le fichier PHP correspondant
    include($routes[$page]);
}

$render = ob_get_clean(); // récupère le contenu du tampon et le stocke dans $render

echo $render; // affiche le contenu stocké dans $render

//try 
//{
    $db = new PDO("mysql:host=blog.local;dbname=blog", "Monique-Silva", "2712"); //pour se conecter à la base de données "blog"
//}
//catch (Exception $e)
//{
//    die("Error: " . $e->getMessage*());
//}


//$statement = $pdo->query("SELECT tile FROM articles");
?>
</body>
</html>