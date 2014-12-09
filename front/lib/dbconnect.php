<?php
// Connection au serveur
$dns = 'mysql:host=localhost;dbname=attractif;charset=utf8';
$utilisateur = 'root';
$motDePasse = '';

try
{
    $bdd = new PDO( $dns, $utilisateur, $motDePasse );
}
catch (Exception $e) // Si erreur
{
    die('Erreur : ' . $e->getMessage());
}