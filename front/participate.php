<?php

session_start();
include('lib/dbconnect.php');
include('header.php');

?>
<div id="content">
    <div class="container">
<?php
if (isset($_GET['event'])) {
//protection pour éviter doublon dans la base
    $check = $bdd->prepare('SELECT COUNT(id) AS count FROM event_user WHERE user=' . $_SESSION['data']->id . ' AND event=' . $_GET['event']);
    $check->execute();
    $checked = $check->fetch(PDO::FETCH_OBJ);
    //si on ne participe pas à cette VP
    if ($checked->count == 0) {
        $req = $bdd->prepare('INSERT INTO event_user VALUES(NULL, :status, :user, :event, :date )');
        $req->execute(array(
            'status' => "2",
            'user' => $_SESSION['data']->id,
            'event' => $_GET['event'],
            'date' => date('Y-m-d H:i:s')
        ));
        $data = $req->fetch(PDO::FETCH_OBJ);
        echo '<h1>Félicitation vous participez à cette vente privée !</h1>';
    } else {
        echo '<h1>Vous participez déjà à cette vente privée !</h1>';
    }
    echo '<a href="index.php">< retour</a>';
} else {
    header('location:index.php');
}
include('footer.php');
