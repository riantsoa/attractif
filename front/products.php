<?php
// Je me connecte à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=attractif', 'root', '');
}
catch (Exception $e) // Si erreur
{
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT `name`,`quantity`,`category`,`descript` FROM `product`');
$data = $req->execute();

var_dump($data);
