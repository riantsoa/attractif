<?php
session_start();
include('lib/dbconnect.php');
include('header.php');

// On récupère nos variables de session
if (isset($_SESSION['data'])) {
    $mail = $_SESSION['data']->mail;
    $password = $_SESSION['data']->pass;
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    //Je vérifie les infos et je les insert
    $insert = $bdd->prepare('UPDATE user SET name=:name, mail= :mail, pass= :pass ');
    try {
        // On envois la requète
        $success = $insert->execute(array(
            'name' => $name,
            'mail' => $mail,
            'pass' => $pass
        ));

        if ($success) {
            echo "Enregistrement réussi";
        }
    } catch (Exception $e) {
        echo 'Erreur de requète : ', $e->getMessage();
    }
}
$req = $bdd->prepare('SELECT * FROM user WHERE pass = :pass AND mail = :mail');
$req->execute(array(
    'pass' => $password,
    'mail' => $mail
));
$data = $req->setFetchMode(PDO::FETCH_OBJ);
?>
<!-- Page Content -->
<div id="content">
    <div class="container">
        <div class="col-lg-12">
            <h2 class="page-header">Liste de nos produits</h2>
        </div>
        <div class="col-md-12 col-sm-6">
            <?php
            while ($enregistrement = $req->fetch()) {
                // Affichage des enregistrements

                echo '
    <div class="col-md-12 col-sm-6">
       <form action="myinfos.php" method="post">
            <input type="text" placeholder="Nom" name="name" value="' . $enregistrement->name . '" /><br />
            <input type="email" placeholder="Email" name="mail" value="' . $enregistrement->mail . '" /><br />
            <input type="text" placeholder="Mot de passe" name="pass" value="' . $enregistrement->pass . '"/><br />
            <input type="submit" name="submit" value="Enregistrer modifications">
        </form>
    </div>';
            }
            ?>
        </div>
        <?php
        include('footer.php');
        