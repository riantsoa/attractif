<?php
session_start();
include('lib/dbconnect.php');
include('header.php');

// On récupère nos variables de session
if (isset($_SESSION['data'])) {
    $mail = $_SESSION['data']->mail;
    $password = $_SESSION['data']->pass;
    $id = $_SESSION['data']->id;
}

$req = $bdd->prepare('SELECT COUNT(*) FROM sell WHERE user = :id_user ');
$req->execute(array(
    'pass' => $password,
    'mail' => $mail,
    'id' => $id
));
$data = $req->setFetchMode(PDO::FETCH_OBJ);

while ($enregistrement = $req->fetch()) {
    // Affichage des enregistrements
    echo '<h4>', 'Votre avez effectué : ' .$enregistrement->$data, '</h4>';
}
