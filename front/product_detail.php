<?php
session_start();
include('lib/dbconnect.php');
include('header.php');

$req = $bdd->prepare('SELECT p.descript AS pdescrip, p.quantity AS pqty, p.image AS pimage, p.name AS prodname, c.name AS catname
                      FROM product AS p
                      LEFT JOIN category AS c ON (c.id = p.category)
                      WHERE p.id= :id');
$req->execute(array(
    'id' => $_GET['id']
));
$data = $req->fetch(PDO::FETCH_OBJ);
?>
<!-- Page Content -->
<div id="content">
    <div class="container">
        <!-- Selection 3 blocks -->
        <div class="col-lg-12">
                <h2 class="currentsales gray">Fiche détail de <?php echo $data->prodname; ?></h2>
        </div>
        <div class="row timer">
            <div class="col-md-12 col-sm-6">
            <p>CATEGORIE : <?php echo $data->catname; ?></p>
            <p>DESCRIPTION : <?php echo $data->pdescrip; ?></p>
            <p>STOCK : <?php echo $data->pqty; ?> produits restants</p>
            <p><img src="img/products/<?php echo $data->pimage; ?>" width="150" alt="<?php echo $data->prodname; ?>" /></p>

<?php
include('footer.php');