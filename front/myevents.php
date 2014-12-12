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
                <h2 class="header-title green nohover">Mes ventes privées</h2>
        </div>
        <div class="row timer">
            <div class="col-md-12 col-sm-6">
<?php
$nb = $bdd->prepare('SELECT COUNT(eu.id) AS events
                    FROM event_user AS eu
                    WHERE user = :id');
$nb->execute(array(
    'id' => $id
));
$data = $nb->fetch(PDO::FETCH_OBJ);
    // Affichage des enregistrements
?>
    <h4>Votre participez à : <?php echo $data->events; ?> vente<?php if ($data->events > 1) { echo 's'; } ?> privée<?php if ($data->events > 1) { echo 's'; } ?> à venir. </h4><br />
<?php
$req = $bdd->prepare('SELECT eu.event, e.name
                      FROM event_user AS eu
                      LEFT JOIN event AS e ON (e.id = eu.event)
                      WHERE eu.user = :id
                      ORDER BY eu.event ASC');
$req->execute(array(
    'id' => $id
));
$req->setFetchMode(PDO::FETCH_OBJ);
echo '<h2>Vous participez à :</h2>';
while ($enregistrement = $req->fetch()) {
    // Affichage des enregistrements
    echo '<h5><span class="green nohover">' . $enregistrement->name . '</span></h5><br />';
}
?>
            </div>
        </div>
<?php
include('footer.php');