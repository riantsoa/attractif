<?php
session_start();
include('lib/dbconnect.php');
include('header.php');

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Je vérifie les infos et je les insert
    $insert = $bdd->prepare('INSERT INTO user VALUES(NULL, :nom, :email, :password, :newsletter, :alert, :admin)');
    try {
        // On envois la requète
        $success = $insert->execute(array(
            'nom' => $nom,
            'email' => $email,
            'password' => $password,
            'newsletter' => 1,
            'alert' => 0,
            'admin' => 0
        ));

        if ($success) {
            echo "Enregistrement réussi";
        }
    } catch (Exception $e) {
        echo 'Erreur de requète : ', $e->getMessage();
    }
}
?>
<!-- Page Content -->
<div id="content">
    <div class="container">
        <!-- Selection 3 blocks -->
        <div class="col-lg-12">
            <h2 class="header-title green nohover">S'enregistrer</h2>
        </div>
        <div class="row timer center">
            <div class="col-md-12 col-sm-6">
            <form action="register.php" method="post">
                <input type="text" placeholder="Nom" name="nom" /><br />
                <input type="email" placeholder="Email" name="email" /><br />
                <input type="password" placeholder="Mot de passe" name="password" /><br />
                <input type="submit" name="submit" value="Inscription">
            </form>
        </div>
        </div>

    
<?php
include('footer.php');
