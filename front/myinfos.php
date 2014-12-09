<?php
session_start();
include('lib/dbconnect.php');
include('header.php');

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Je vérifie les infos et je les insert
    $insert = $bdd->prepare('UPDATE user SET nom=:nom, email= :email, password= :password ');
    try {
        // On envois la requète
        $success = $insert->execute(array(
            'nom' => $nom,
            'email' => $email,
            'password' => $password
        ));

        if ($success) {
            echo "Enregistrement réussi";
        }
    } catch (Exception $e) {
        echo 'Erreur de requète : ', $e->getMessage();
    }
}
$req = $bdd->prepare('SELECT * FROM user WHERE password = :password AND email = :email');
$req->execute(array(
    'password' => $password,
    'email' => $email
));
$data = $req->fetch(PDO::FETCH_OBJ);
?>
<!-- Page Content -->
<div id="content">
    <div class="container">
        <div class="col-lg-12">
            <h2 class="page-header">Liste de nos produits</h2>
        </div>
        <div class="col-md-12 col-sm-6">
            <div class="col-md-12 col-sm-6">
                <form action="myinfos.php" method="post">
                    <input type="text" placeholder="Nom" name="nom" value="<?php echo $data->nom; ?>" /><br />
                    <input type="email" placeholder="Email" name="email" value="<?php echo $data->email; ?>" /><br />
                    <input type="text" placeholder="Mot de passe" name="password" value="<?php echo $data->password; ?>"/><br />
                    <input type="submit" name="submit" value="Enregistrer modifications">
                </form>
            </div>
        </div>
        <?php
        include('footer.php');
        