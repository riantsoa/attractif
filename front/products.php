<?php
session_start();
include('lib/dbconnect.php');
include('header.php');
?>
<!-- Page Content -->
<div id="content">
<div class="container">
    <div class="col-lg-12">
        <h2 class="page-header">Liste de nos produits</h2>
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
        echo '<h4>', $enregistrement->name, ' ', '<a href="product_detail.php?id='.$enregistrement->id.'">Voir le produit</a>', '</h4>';
        }
    ?>
</div>
<?php
include('footer.php');