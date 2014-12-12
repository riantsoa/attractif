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
                <h2 class="header-title green nohover">Mes achats</h2>
        </div>
        <div class="row timer">
            <div class="col-md-12 col-sm-6">
<?php
$nb = $bdd->prepare('SELECT COUNT(s.id) AS sales, COUNT( DISTINCT e.id) AS events
                    FROM sale AS s
                    LEFT JOIN event AS e ON (e.id = s.event)
                    WHERE user = :id');
$nb->execute(array(
    'id' => $id
));
$data = $nb->fetch(PDO::FETCH_OBJ);
    // Affichage des enregistrements
?>
    <h4>Votre avez effectué : <?php echo $data->sales; ?> achat<?php if ($data->sales > 1) { echo 's'; } ?> lors de <?php echo $data->events; ?> d'évènement<?php if ($data->events > 1) { echo 's'; } ?>. </h4><br />
<?php
$req = $bdd->prepare('SELECT p.name AS pname, e.name AS ename
                      FROM product AS p
                      LEFT JOIN sale AS s ON (s.product = p.id)
                      LEFT JOIN event AS e ON (e.id = s.event)
                      WHERE s.user = :id
                      ORDER BY s.event ASC');
$req->execute(array(
    'id' => $id
));
$req->setFetchMode(PDO::FETCH_OBJ);
echo '<h2>Vous avez acheté :</h2>';
while ($enregistrement = $req->fetch()) {
    // Affichage des enregistrements
    echo '<h5><span class="green nohover">' . $enregistrement->pname . '</span>, lors de l\'évènement ' . $enregistrement->ename . '</h5><br />';
}
?>
            </div>
        </div>
<?php
include('footer.php');