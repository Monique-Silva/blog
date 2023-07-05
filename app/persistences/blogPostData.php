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
function createBlogPost ($database, $newArticle): array {
    $blogQuery = file_get_contents("database/createArticle.sql");
    $statement =  $database->prepare($blogQuery);
    //ação para criar novo artigo $statement->
    $statement->execute();
    echo x;
}

/*
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
*/

function deleteBlogPost ($database, int $numArticle): void {
    $blogQuery = file_get_contents("database/deleteBlogPost.sql");
    $statement = $database->prepare($blogQuery);
    $statement->bindValue("id", $numArticle, PDO::PARAM_INT);
    $statement->execute();
}

