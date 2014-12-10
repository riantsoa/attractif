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
                <h2 class="page-header">Ventes en cours</h2>
            </div>
        <div class="row timer">
            <div class="col-md-12 col-sm-6">
                <?php
                //Timer
                // redirection quand timer arrivé à 0
                $redirection = 'index.php';
                $hplus3 = date('Y-m-d H:i:s', strtotime(date('H:i:s')) + 10800);
//                $hmoins1 = date('Y-m-d H:i:s', strtotime(date('H:i:s')) - 3600);
                $req = $bdd->prepare('SELECT *
                                    FROM event
                                    WHERE date < :hplus3
                                    
                                    ');
                //AND date > :hmoins1
                $req->execute(array(
                    'hplus3' => $hplus3,
//                    'hmoins1' => $hmoins1
                ));
                $data = $req->setFetchMode(PDO::FETCH_OBJ);

                while ($enregistrement = $req->fetch()) {
//                    affiche le timer ('à voir plus tard')
//                    $secondes = time() - strtotime($enregistrement->date);
//                    echo '<div id="timer"></div>';
                    echo $enregistrement->name.'<br />';
                    echo $enregistrement->place.'<br />';
                    echo $enregistrement->descript.'<br /><br />';
                }
//                $secondes = strtotime($hplus3) - time();
                ?>
            </div>
        </div>
        <?php
        include('footer.php');
        