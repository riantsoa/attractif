<?php
session_start();
include('lib/dbconnect.php');
include('header.php');

$req = $bdd->prepare('SELECT * FROM product WHERE id= :id');
$req->execute(array(
    'id' => $_GET['id']
));
$data = $req->setFetchMode(PDO::FETCH_OBJ);

?>
<!-- Page Content -->
<div id="content">
    <div class="container">
        <div class="col-lg-12">
            <h2 class="page-header">Liste de nos produits</h2>
        </div>
        <div class="col-md-12 col-sm-6">
            <?php
            while ($enregistrement = $req->fetch()) {
                echo $enregistrement->name;
                echo '<img src="img/' . $enregistrement->image . '" />';
                echo $enregistrement->descript;
            }
            ?>
        </div>
<?php
include('footer.php');