<?php
try 
{
    $db = new PDO("mysql:host=blog.local;dbname=blog", "monique_silva", "01031985"); //pour se conecter à la base de données "blog"
}
catch (Exception $e)
{
    die("Erreur : " . $e->getMessage());
}
