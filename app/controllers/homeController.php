<?php
require_once ("app/persistences/blogPostData.php");
$metaTitle = "Mon blog";
$metaDescription = "Blog dedié aux sports";
$lastArticles = getLastBlogPosts($db);
include("ressources/views/layouts/header.tpl.php");
include ("ressources/views/home.tpl.php");
include("ressources/views/layouts/footer.tpl.php");
?>
