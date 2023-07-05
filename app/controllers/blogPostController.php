<?php
require_once ("app/persistences/blogPostData.php");
$metaTitle = "Commentaires";
$metaDescription = "Page de commentaires";
$numArticle = $_GET["id"];
$article = getblogPostById($db, $numArticle);
$comments = getCommentsByBlogPost($db, $numArticle);
include("ressources/views/layouts/header.tpl.php");
include("ressources/views/blogPost.tpl.php");
include("ressources/views/layouts/footer.tpl.php");
//var_dump($blogPosts);
?>

