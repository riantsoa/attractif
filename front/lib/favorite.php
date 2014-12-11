<?php

session_start();
include('dbconnect.php');

//Je vérifie si il existe déjà un favoris pour ce produit
$req = $bdd->prepare('SELECT *
                    FROM user_favorite
                    WHERE user = :user
                    AND product = :product');
$req->execute(array(
    'user' => $_GET['user'],
    'product' => $_GET['product']
));
$favorite = $req->fetch(PDO::FETCH_OBJ);

// Success
if ($favorite) {
    $delete = $bdd->prepare("DELETE FROM user_favorite WHERE user = :user AND product = :product");
    $delete->execute(array(
        'user' => $_GET['user'],
        'product' => $_GET['product']
    ));
    header('location:' . $_SERVER['HTTP_REFERER']);
} else {
    $insert = $bdd->prepare('INSERT INTO user_favorite VALUES(NULL, :user, :product, :category, :event)');
    // On envoi la requète
    $success = $insert->execute(array(
        'user' => $_GET['user'],
        'product' => $_GET['product'],
        'category' => 0,
        'event' => 0
    ));
    header('location:' . $_SERVER['HTTP_REFERER']);
}