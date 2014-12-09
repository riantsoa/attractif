<?php
session_start();
include('lib/dbconnect.php');
include('header.php');

$req = $bdd->prepare('SELECT * FROM product WHERE id= :id');
$req->execute(array(
    'id' => $_GET['id']
));
$data = $req->fetch(PDO::FETCH_OBJ);

?>
<!-- Page Content -->
<div id="content">
    <div class="container">
        <div class="col-lg-12">
            <h2 class="page-header">Fiche article de : <?php echo $data->nom; ?></h2>
        </div>
        <div class="col-md-12 col-sm-6">
            <p>TYPE : <?php echo $data->type_id; ?></p>
            <p>DESCRIPTION : <?php echo $data->description; ?></p>
            <p>STOCK : <?php echo $data->stock; ?> produits restants</p>
            <p><img src="img/products/<?php echo $data->img; ?>" width="150" alt="<?php echo $data->nom; ?>" /></p>
        </div>
<?php
include('footer.php');