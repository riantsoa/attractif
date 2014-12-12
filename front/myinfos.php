<?php
session_start();
include('lib/dbconnect.php');
include('header.php');

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Je vérifie les infos et je les insert
    $insert = $bdd->prepare('UPDATE user SET name=:nom, mail= :email, pass= :password ');
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
$req = $bdd->prepare('SELECT * FROM user WHERE pass = :password AND mail = :email');
$req->execute(array(
    'password' => $password,
    'email' => $email
));
$data = $req->fetch(PDO::FETCH_OBJ);
?>
<!-- Page Content -->
<div id="content">
    <div class="container">
        <!-- Selection 3 blocks -->
        <div class="col-lg-12">
                <h2 class="header-title green nohover">Mon compte</h2>
        </div>
        <div class="row timer">
            <div class="col-md-12 col-sm-6">
                <form action="myinfos.php" method="post">
                    <label for="nom">Nom</label>
                    <input class="form-control input-sm input-md" required="required"  type="text" placeholder="Nom" name="nom" value="<?php echo $data->name; ?>" /><br />
                    <label for="email">Email</label>
                    <input class="form-control input-sm input-md" required="required"  type="email" placeholder="Email" name="email" value="<?php echo $data->mail; ?>" /><br />
                    <label for="password">Mot de passe</label>
                    <input class="form-control input-sm input-md" required="required"  type="text" placeholder="Mot de passe" name="password" value="<?php echo $data->pass; ?>"/><br />
                    <input class="form-control input-sm input-md" required="required"  type="submit" name="submit" value="Enregistrer modifications">
                </form>
            </div>
        </div>
        <?php
        include('footer.php');
