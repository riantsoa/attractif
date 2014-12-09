<?php
session_start();
include('lib/dbconnect.php');
include('header.php');

$req = $bdd->prepare('SELECT * FROM product WHERE id= :id');
$req->execute(array(
    'id' => $_GET['id']
));
$data = $req->setFetchMode(PDO::FETCH_OBJ);

while ($enregistrement = $req->fetch()) {
    echo '<h4>'.$enregistrement->name. '</h4>';
    echo '<img src="img/'.$enregistrement->image. '" />'; echo '<p>'.$enregistrement->descript. '</p>';



}

