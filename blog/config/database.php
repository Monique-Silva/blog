<?php
try 
{
    $db = new PDO("mysql:host=blog.local;dbname=blog", "Monique-Silva", "2712"); //pour se conecter à la base de données "blog"
}
catch (Exception $e)
{
    die("Erreur : " . $e->getMessage());
}
?>