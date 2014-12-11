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
                <h2 class="currentsales gray">Liste des produits</h2>
        </div>
        <div class="row timer">
            <div class="col-md-12 col-sm-6">
    <form action="products.php" method="POST">
            <p>
                <input type="hidden" name="sorted" value="1">
                <input type="submit" value="Trier par categorie" class="tri_bandeau" onchange="this.form.submit();">
            </p>
        </form>
    <?php
        //Je vérifie le pseudo et le mot de passe
    if(isset($_POST['sorted'])){
        $req = $bdd->prepare('SELECT p.id, p.name, p.image AS prodimage , c.name AS catename
                              FROM product AS p
                              LEFT JOIN category AS c ON (c.id = p.category)
                              ORDER BY p.category');
    } else{
        $req = $bdd->prepare('SELECT p.id, p.name, p.image AS prodimage , c.name AS catename
                              FROM product AS p
                              LEFT JOIN category AS c ON (c.id = p.category)');
        }

        $req->execute();
        $data = $req->setFetchMode(PDO::FETCH_OBJ);

        // Nous traitons les résultats en boucle
        while ($enregistrement = $req->fetch()) {
        // Affichage des enregistrements

    ?>
        <div class="view view-first">
            <?php echo '<img style="max-width: 200px; max-height: 180px" src="img/products/' . $enregistrement->prodimage . '"  />';?>
            <div class="mask">
                <h2><?php echo  $enregistrement->name ; ?></h2>
                <p><?php echo $enregistrement->catename ?></p>
                <a href="product_detail.php?id=<?php echo $enregistrement->id; ?>" class="info">en savoir +</a>
            </div>
        </div>
        <?php } ?>
<?php
include('footer.php');