<?php

session_start();
include('lib/dbconnect.php');
include('header.php');
//var_dump($_SESSION['data']->id);
//var_dump($_GET['event']);exit;
if (isset($_GET['event'])) {
//protection pour éviter doublon dans la base
    $check = $bdd->prepare('SELECT COUNT(id) AS count FROM event_user WHERE client=' . $_SESSION['data']->id . ' AND event=' . $_GET['event']);
    $check->execute();
    $checked = $check->fetch(PDO::FETCH_OBJ);
//    var_dump($checked->count);exit;
    if ($checked->count == 0) {
        $req = $bdd->prepare('INSERT INTO event_user VALUES(NULL, :status, :user, :event, :date )');
        $req->execute(array(
            'status' => "2",
            'user' => $_SESSION['data']->id,
            'event' => $_GET['event'],
            'date' => date('Y-m-d H:i:s')
        ));
        $data = $req->fetch(PDO::FETCH_OBJ);
    } else {
        echo '<h1>Vous participez déjà à cette vente privée !</h1>';
    }
} else {
    header('location:index.php');
}
include('footer.php');
