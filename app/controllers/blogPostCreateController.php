<?php
require_once ("app/persistences/blogPostData.php");
$metaTitle = "Création de l'article";
$metaDescription = "Je crée mon article";
//$blogPostCreate = fonction pour creer larticle qui sera cree sur blogPostData($db);
include("ressources/views/layouts/header.tpl.php");
include ("ressources/views/blogPostCreate.tpl.php"); //affichage du formulaire pour créer l'article
include("ressources/views/layouts/footer.tpl.php");
//var_dump($blogPostCreate);
?>