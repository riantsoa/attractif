<?php
session_start();
include('lib/dbconnect.php');
include('header.php');
?>
    <!-- Page Content -->
    <div id="content">
        <div class="container">
            <div class="col-lg-12">
                <h2 class="page-header">Liste de nos événements</h2>
            </div>
            <div class="col-md-12 col-sm-6">
                <?php
                //Timer
                // redirection quand timer arrivé à 0
                $redirection = 'index.php';
                $hplus3 = date('Y-m-d H:i:s', strtotime(date('H:i:s')) + 10800);
//                $hmoins1 = date('Y-m-d H:i:s', strtotime(date('H:i:s')) - 3600);
                $req = $bdd->prepare('SELECT *
                                    FROM event
                                    WHERE date > :hplus3
                                    
                                    ');
                //AND date > :hmoins1
                $req->execute(array(
                    'hplus3' => $hplus3,
//                    'hmoins1' => $hmoins1
                ));
                $data = $req->setFetchMode(PDO::FETCH_OBJ);

                while ($enregistrement = $req->fetch()) {
                    // Affichage des enregistrements
                    echo '<h1>', $enregistrement->name, ' ', $enregistrement->date, '</h1>';
                    echo '<p>', $enregistrement->place, '</p>';
                    echo '<p>', $enregistrement->descript, '</p>';
                    echo '<br />';
                }
                ?>
            </div>
            <?php
            include('footer.php');
            