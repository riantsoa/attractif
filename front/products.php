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
            <h2 class="header-title green nohover">Liste des produits</h2>
        </div>
        <div class="row timer center">
            <div class="col-md-12 col-sm-6">
                <?php
                $req = $bdd->prepare('SELECT name
                                        FROM category');
                $req->execute();
                $rows = $req->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <form action="products.php" method="POST">
                    <p>
                        <select name="filter">
                            <?php
                            // Nous traitons les résultats en boucle
                            foreach ($rows as $row) {
                                ?>
                                <option name="<?php echo $row['name']; ?>" value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                            <?php } ?>
                            </select> 
                            <input type="submit" name="submit" value="Filtrer">
                        </p>
                    </form>
                    <?php
//                        var_dump($_POST);exit;
                    //Je vérifie le pseudo et le mot de passe
                    if (isset($_POST['submit'])) {
                        $req = $bdd->prepare('SELECT p.id, p.name, p.image AS prodimage , c.name AS catename
                              FROM product AS p
                              LEFT JOIN category AS c ON (c.id = p.category)
                              WHERE c.name ="'.$_POST['filter'].'"');
                    } else {
                        $req = $bdd->prepare('SELECT p.id, p.name, p.image AS prodimage , c.name AS catename
                              FROM product AS p
                              LEFT JOIN category AS c ON (c.id = p.category)');
                    }

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
                            <?php echo '<img style="max-width: 200px; max-height: 180px" src="img/products/' . $row['prodimage'] . '"  />'; ?>
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
            