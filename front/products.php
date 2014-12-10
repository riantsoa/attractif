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
    if(isset($_POST['sorted'])){
        $req = $bdd->prepare('SELECT p.id, p.name, c.name AS catename
                              FROM product AS p
                              LEFT JOIN category AS c ON (c.id = p.category)
                              ORDER BY p.category');
    } else{
        $req = $bdd->prepare('SELECT p.id, p.name, c.name AS catename
                              FROM product AS p
                              LEFT JOIN category AS c ON (c.id = p.category)');
        }

        $req->execute();
        $data = $req->setFetchMode(PDO::FETCH_OBJ);

        // Nous traitons les résultats en boucle
        while ($enregistrement = $req->fetch()) {
        // Affichage des enregistrements
        echo '<h6>', $enregistrement->catename. '</h6>';
        echo '<h4>', $enregistrement->name, ' ', '<a href="product_detail.php?id='.$enregistrement->id.'">Voir le produit</a>', '</h4>';
        }
    ?>


    <form action="products.php" method="POST">
            <p>
                <input type="hidden" name="sorted" value="1">
                <input type="submit" value="Trier par categorie" class="tri_bandeau" onchange="this.form.submit();">
            </p>
    </form>


        <!-- sql SELECT * FROM product WHERE category = ".$cat -->
</div>
<?php
include('footer.php');