<?php
require_once("app/persistences/blogPostData.php");
$metaTitle = "Modification de l'article";
$metaDescription = "Je modifie mon article";
$numArticle = (int) $_GET["id"];
$article = getAllInfoFromArticles ($db, $numArticle);
$erreur = false;
//passar toda a instrução echo em HTML tpl

if (!empty($_POST)) {
    if (empty($_POST["title"])) {
        //echo $titleMissing;
        $erreur = true;
    } else {
        $title = $_POST["title"];
    }
    if (empty($_POST["content"])) {
        //echo $contentMissing;
        $erreur = true;
    } else {
        $content = $_POST["content"];
    }
    if (empty($_POST["publishdate"])) {
        //echo $publishdateMissing;
        $erreur = true;
    } else {
        $publishdate = $_POST["publishdate"];
    }
    if (empty($_POST["lastdate"])) {
        //echo $lastdateMissing;
        $erreur = true;
    } else {
        $lastdate= $_POST["lastdate"];
    }
    if (empty($_POST["importdegree"])) {
        //echo $importdegreeMissing;
        $erreur = true;
    } else {
        $importdegree = $_POST["importdegree"];
    }
    if (empty($_POST["autors_id"])) {
        //echo $autors_idMissing;
        $erreur = true;
    } else {
        $autors_id = $_POST["autors_id"];
    }
    var_dump($erreur);
    if($erreur === true) {
        echo $erreur;
    } else {
        echo "$numArticle, $title";
        updateBlogPost($db, $numArticle, $title, $content, $publishdate, $lastdate, $importdegree, $autors_id);
    }
}

include("ressources/views/layouts/header.tpl.php");
include("ressources/views/blogPostUpdate.tpl.php"); //affichage du formulaire pour créer l'article
include("ressources/views/layouts/footer.tpl.php");