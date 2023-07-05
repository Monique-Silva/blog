<?php
require_once ("app/persistences/blogPostData.php");
$metaTitle = "Mon blog";
$metaDescription = "Blog dedié aux sports";
$lastArticles = getLastBlogPosts($db);
include("ressources/views/layouts/header.tpl.php");
include ("ressources/views/home.tpl.php");
include("ressources/views/layouts/footer.tpl.php");
//var_dump(getLastBlogPosts($db));
?>


//passos: criar o link dos sites, adicionar o id no index com a função get_id(), criar a landing page de cada artigo, organizar o estilo css, etc.

