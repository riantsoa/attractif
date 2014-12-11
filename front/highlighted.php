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
            <h2 class="header-title green nohover">Produits phares</h2>
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
                $rows = $req->fetchAll(PDO::FETCH_ASSOC);

                // Nous traitons les résultats en boucle
                foreach ($rows as $row) {
                    // Affichage des enregistrements
                    ?>
                    <div class="view view-first">
                        <?php
                        //Favoris
                        //Si on est connecté
                        if (isset($_SESSION['data']->id)) {
                            $req = $bdd->prepare('SELECT *
                                                FROM user_favorite
                                                WHERE user = :user
                                                AND product = :product');
                            $req->execute(array(
                                'user' => $_SESSION['data']->id,
                                'product' => $row['id']
                            ));
                            $favorites = $req->fetch(PDO::FETCH_OBJ);
                            ?>
                            <a href="lib/favorite.php?product=<?php echo $row['id']; ?>&user=<?php echo $_SESSION['data']->id; ?>">
                                <span class="favorite-icon <?php
                                if ($favorites) {
                                    echo "active";
                                }
                                ?>"></span>
                            </a>
                        <?php } else { ?>
                            <a href="register.php">
                                <span class="favorite-icon"></span>
                            </a>
                        <?php } ?>
                        <?php echo '<img style="max-width: 200px; max-height: 180px" src="img/products/' . $row['image'] . '"  />'; ?>
                        <div class="mask">
                            <h2><?php echo $row['name']; ?></h2>
                            <p><?php echo $row['catename']; ?></p>
                            <a href="product_detail.php?id=<?php echo $row['id']; ?>" class="info">en savoir +</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
        include('footer.php');
        