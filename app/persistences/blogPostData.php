<?php
//Ce fichier va contenir toutes les fonctions qui seront responsables de gérer la persistance des données dans la BDD et donc du dialogue avec la BDD.
//La deuxième fonction a pour paramètre le numéro de l’article, elle retourne l’article avec l’auteur.
//La troisième a pour paramètre le numéro de l’article, elle retourne les commentaires de l’article avec l’auteur.

require_once ("config/database.php");

function getLastBlogPosts($database) {
    $blogQuery = file_get_contents("database/lastBlogPosts.sql");
    $statement = $database->prepare($blogQuery);
    $statement->execute();
    $lastBlogPosts = $statement->fetchAll();
    return $lastBlogPosts;
}

function getblogPostById($database, int $numArticle): array {
    $blogQuery = file_get_contents("database/numArticle.sql");
    $statement = $database->prepare($blogQuery);
    $statement->bindValue(":id", $numArticle, PDO::PARAM_INT);
    $statement->execute();
    $blogPosts = $statement->fetchAll();
    return $blogPosts[0];
}

function getCommentsByBlogPost($database, int $numArticle): array {
    $blogQuery = file_get_contents("database/commentsByBlogPost.sql");
    $statement = $database->prepare($blogQuery);
    $statement->bindValue("id", $numArticle, PDO::PARAM_INT);
    $statement->execute();
    $commentsByBlogPost = $statement->fetchAll();
    return $commentsByBlogPost;
}
function createBlogPost ($database, string $title, string $content, string $publishdate, string $lastdate, int $importdegree, int $autors_id): array {
    $blogQuery = file_get_contents("database/createBlogPost.sql");
    $statement = $database->prepare($blogQuery);
    $statement->bindValue(":title", $title, PDO::PARAM_STR);
    $statement->bindValue(":content", $content, PDO::PARAM_STR);
    $statement->bindValue(":publishdate", $publishdate, PDO::PARAM_STR);
    $statement->bindValue(":lastdate", $lastdate, PDO::PARAM_STR);
    $statement->bindValue(":importdegree", $importdegree, PDO::PARAM_STR);
    $statement->bindValue(":autors_id", $autors_id, PDO::PARAM_INT);
    $statement->execute();
    $newBlogPost = $statement->fetchAll();
    return $newBlogPost;
}

function getAllInfoFromArticles ($database, int $numArticle): array {
    $blogQuery = file_get_contents("database/getAllInfoFromArticles.sql");
    $statement = $database->prepare($blogQuery);
    $statement->bindValue("id", $numArticle, PDO::PARAM_INT);
    $statement->execute();
    $AllInfoFromArticle = $statement->fetch();
    return $AllInfoFromArticle;
}
function updateBlogPost ($database, $numArticle, $title, $content, $publishdate, $lastdate, $importdegree, $autors_id): array {
    $blogQuery = file_get_contents("database/updateBlogPost.sql");
    $statement = $database->prepare($blogQuery);
    $statement->bindValue("id", $numArticle, PDO::PARAM_INT);
    $statement->bindValue(":title", $title, PDO::PARAM_STR);
    $statement->bindValue(":content", $content, PDO::PARAM_STR);
    $statement->bindValue(":publishdate", $publishdate, PDO::PARAM_STR);
    $statement->bindValue(":lastdate", $lastdate, PDO::PARAM_STR);
    $statement->bindValue(":importdegree", $importdegree, PDO::PARAM_STR);
    $statement->bindValue(":autors_id", $autors_id, PDO::PARAM_INT);
    $statement->execute();
    $updateBlogPost = $statement->fetchAll();
    return $updateBlogPost;
}
function deleteBlogPost ($database, int $numArticle): void {
    $blogQuery = file_get_contents("database/deleteBlogPost.sql");
    $statement = $database->prepare($blogQuery);
    $statement->bindValue("id", $numArticle, PDO::PARAM_INT);
    $statement->execute();
}

