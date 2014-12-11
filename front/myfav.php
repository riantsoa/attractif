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
                <h2 class="currentsales gray">Mes favoris</h2>
        </div>
        <div class="row timer">
            <div class="col-md-12 col-sm-6">
<?php
$nb = $bdd->prepare('SELECT COUNT(uf.id) AS userfav
                    FROM user_favorite AS uf
                    WHERE user = :id');
$nb->execute(array(
    'id' => $id
));
$data = $nb->fetch(PDO::FETCH_OBJ);
    // Affichage des enregistrements
    echo '<h4>', 'Votre avez : ' . $data->userfav . ' articles en favoris.</h4>';
    echo '<br />';

$req = $bdd->prepare('SELECT uf.*, p.name
                    FROM user_favorite AS uf
                    LEFT JOIN product AS p ON (p.id = uf.product)
                    WHERE user = :id');
$req->execute(array(
    'id' => $id
));
$req->setFetchMode(PDO::FETCH_OBJ);
echo '<h2>Vous aimez :</h2>';
while ($enregistrement = $req->fetch()) {
    // Affichage des enregistrements
    echo '<h5><a href="product_detail.php?id='.$enregistrement->id.'" class="green">' . $enregistrement->name . '</a></h5><br />';
}
?>
            </div>
        </div>
<?php
include('footer.php');