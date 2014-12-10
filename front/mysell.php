<?php
session_start();
include('lib/dbconnect.php');
include('header.php');

$nb = $bdd->prepare('SELECT COUNT(id) AS count FROM sell WHERE user = :id_user ');
$nb->execute(array(
    'id' => $id
));
$nb->setFetchMode(PDO::FETCH_OBJ);

while ($enregistrement = $nb->fetch()) {
    // Affichage des enregistrements
    echo '<h4>', 'Votre avez effectué : ' . $enregistrement->count . ' achats jusqu\'à aujourd\'hui. </h4>';
    echo '<br />';
}

$req = $bdd->prepare('SELECT p.name, e.name AS eventname
                      FROM product AS p
                      LEFT JOIN sell AS s ON (s.product = p.id)
                      LEFT JOIN event AS e ON (e.id = s.id)
                      WHERE s.user = :id');
$req->execute(array(
    'id' => $id
));
$req->setFetchMode(PDO::FETCH_OBJ);

while ($enregistrement = $req->fetch()) {
    // Affichage des enregistrements
    echo '<h5>', 'Vous avez acheté : ' . $enregistrement->name . ' lors de l\'évènement ' . $enregistrement->eventname . '</h5>';
}
