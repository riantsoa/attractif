<?php
session_start();
include('dbconnect.php');

//Je vérifie le pseudo et le mot de passe
$req = $bdd->prepare('SELECT mail, pass, id FROM user WHERE pass = :pass AND mail = :mail');
$req->execute(array(
    'pass' => $_POST['pass'],
    'mail' => $_POST['mail']
));
$data = $req->fetch(PDO::FETCH_OBJ);

// Success
if ($data) {
    $_SESSION['data'] = $data;
    header('location:../index.php');
} else {
    header('location:../index.php?error=1');
}