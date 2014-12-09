<?php
session_start();
include('lib/dbconnect.php');

// On récupère nos variables de session
if (isset($_SESSION['data'])) {
    $mail = $_SESSION['data']->mail;
    $password = $_SESSION['data']->pass;
}

include('header.php');
?>
    <!-- Page Content -->
<div id="content">
    <div class="container">
    <div class="col-lg-12">
        <h2 class="page-header">Nos produits phares</h2>
    </div>
    <div class="col-md-12 col-sm-6">
        <?php
        //Je vérifie le pseudo et le mot de passe
        $req = $bdd->prepare('SELECT * FROM product WHERE 1');
        $req->execute();
        $data = $req->setFetchMode(PDO::FETCH_OBJ);

        // Nous traitons les résultats en boucle
        while ($enregistrement = $req->fetch()) {
            // Affichage des enregistrements
            echo '<img src="img/' . $enregistrement->image . '" />';
        }
        ?>
    </div>
<?php
include('footer.php');


//SELECT * FROM `product` AS p LEFT JOIN sell AS s ON (s.product = p.id) LEFT JOIN event AS e ON (e.id = s.event) WHERE event = MAX(event) LIMIT 10;