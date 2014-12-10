<?php
session_start();
include('lib/dbconnect.php');
include('header.php');
?>
    <!-- Page Content -->
<div id="content">
    <div class="container">
    <div class="col-lg-12">
        <h2 class="page-header">Nos 10 produits phares</h2>
    </div>
    <div class="col-md-12 col-sm-6">
        <?php
        //Je vérifie le pseudo et le mot de passe
        $req = $bdd->prepare('SELECT p.*, COUNT(s.id) AS nb
                            FROM product as p
                            INNER JOIN sale as s ON (p.id = s.product)
                            GROUP BY p.id
                            ORDER BY nb DESC
                            LIMIT 0,10');
        //SELECT s.product FROM sales as s WHERE event = 4
        $req->execute();
        $data = $req->setFetchMode(PDO::FETCH_OBJ);

        // Nous traitons les résultats en boucle
        while ($enregistrement = $req->fetch()) {
            // Affichage des enregistrements
            echo '<img src="img/products/' . $enregistrement->image . '" width="200" alt="'.$enregistrement->name.'" /><br />';
        }
        ?>
    </div>
<?php
include('footer.php');


//SELECT * FROM `product` AS p LEFT JOIN sell AS s ON (s.product = p.id) LEFT JOIN event AS e ON (e.id = s.event) WHERE event = MAX(event) LIMIT 10;