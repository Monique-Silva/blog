<?php
require_once ("app/persistences/blogPostData.php");
$metaTitle = "Création de l'article";
$metaDescription = "Je crée mon article";
$titleMissing= "Il manque le titre";
$contentMissing= "Il faut remplir le contenu de l'article";
$publishdateMissing= "Il manque la date de publication";
$lastdateMissing= "Il faut remplir la date de supression de l'article";
$importdegreeMissing= "Il faut évaluer l'importance de l'article, de 1 a 5";
$autors_idMissing= "N'oubliez pas d'insérer votre numéro ID";
$erreur = false;
$remplir = "Veuillez bien remplir toutes les informations correctement";

if (!empty($_POST)) {
    if (empty($_POST["title"])) {
        echo $titleMissing;
        $erreur = true;
    } else {
        $title = $_POST["title"];
    }
    if (empty($_POST["content"])) {
        echo $contentMissing;
        $erreur = true;
    } else {
        $content = $_POST["content"];
    }
    if (empty($_POST["publishdate"])) {
        echo $publishdateMissing;
        $erreur = true;
    } else {
        $publishdate = $_POST["publishdate"];
    }
    if (empty($_POST["lastdate"])) {
        echo $lastdateMissing;
        $erreur = true;
    } else {
        $lastdate= $_POST["lastdate"];
    }
    if (empty($_POST["importdegree"])) {
        echo $importdegreeMissing;
        $erreur = true;
    } else {
        $importdegree = $_POST["importdegree"];
    }
    if (empty($_POST["autors_id"])) {
        echo $autors_idMissing;
        $erreur = true;
    } else {
        $autors_id = $_POST["autors_id"];
    }
    if($erreur === true) {
        echo $remplir;
    } else{
        createBlogPost($db, $title, $content, $publishdate, $lastdate, $importdegree, $autors_id);
    }

}
include("ressources/views/layouts/header.tpl.php");
include ("ressources/views/blogPostCreate.tpl.php"); //affichage du formulaire pour créer l'article
include("ressources/views/layouts/footer.tpl.php");
//var_dump($blogPostCreate);
//resolver o problema em que a requete é enviada e aparece uma mensagem de erro $remplir.
//passar toda a instrução echo em HTML tpl

?>