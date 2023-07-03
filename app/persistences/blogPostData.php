<?php
//Ce fichier va contenir toutes les fonctions qui seront responsables de gérer la persistance des données dans la BDD et donc du dialogue avec la BDD.
include  ("config/database.php");

function getLastBlogPosts($database) {
    $blogQuery = "SELECT articles.title, autors.pseudoname FROM articles INNER JOIN autors ON articles.autors_id = autors.id ORDER BY articles.publishdate DESC LIMIT 10;";
    $statement = $database->prepare($blogQuery);
    $statement->execute();
    $lastBlogPosts = $statement->fetchAll();
    return $lastBlogPosts;
}