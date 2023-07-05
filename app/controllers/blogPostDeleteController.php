<?php
require_once ("app/persistences/blogPostData.php");
$metaTitle = "Delete file";
$metaDescription = "Fichier qui sera exclu";
$numArticle = (int) $_GET["id"];
deleteBlogPost($db, $numArticle);
header("Location: http://blog.local/"); //redirige vers la page d'accueil
?>