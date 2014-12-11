<?php
session_start();
include('lib/dbconnect.php');
include('header.php');
?>
<!-- Page Content -->
<div id="content">
    <div class="container">
        <!-- Selection 3 blocks -->
        <div class="col-lg-12">
            <h2 class="currentsales gray">Produits phares</h2>
        </div>
        <div class="row timer center">
            <div class="col-md-12 col-sm-12">
                <?php
                //Je vérifie le pseudo et le mot de passe
                $req = $bdd->prepare('SELECT p.*, COUNT(s.id) AS nb, c.name AS catename
                            FROM product as p
                            LEFT JOIN sale as s ON (p.id = s.product)
                            LEFT JOIN category AS c ON (c.id = p.category)
                            GROUP BY p.id
                            ORDER BY nb DESC
                            LIMIT 0,10');
                //INNER JOIN sale as s ON (p.id = s.product) -> vide les nb = 0
                $req->execute();
                $data = $req->setFetchMode(PDO::FETCH_OBJ);

                // Nous traitons les résultats en boucle
                while ($enregistrement = $req->fetch()) {
                    // Affichage des enregistrements
                    ?>
                    <div class="view view-first">
                        <?php echo '<img style="max-width: 200px; max-height: 180px" src="img/products/' . $enregistrement->image . '"  />'; ?>
                        <div class="mask">
                            <h2><?php echo $enregistrement->name; ?></h2>
                            <p><?php echo $enregistrement->catename ?></p>
                            <a href="product_detail.php?id=<?php echo $enregistrement->id; ?>" class="info">en savoir +</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
        include('footer.php');
        