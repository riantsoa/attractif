<?php
session_start();
include('dbconnect.php');

//Je vérifie le pseudo et le mot de passe
$req = $bdd->prepare('SELECT id, email, password FROM user WHERE password = :password AND email = :email');
$req->execute(array(
    'password' => $_POST['password'],
    'email' => $_POST['email']
));
$data = $req->fetch(PDO::FETCH_OBJ);

// Success
if ($data) {
    $_SESSION['data'] = $data;
    header('location:../index.php');
} else {
    header('location:../index.php?error=1');
}