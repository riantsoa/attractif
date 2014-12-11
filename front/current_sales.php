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
            <h2 class="header-title green nohover">Ventes en cours</h2>
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
                    ?>
                    <div class="event">
                        <div class="name inline"><i class="glyphicon glyphicon-map-marker" style="color: #fff;font-size: 20px;padding: 0 5px 0 0;vertical-align: middle;"></i> <?php echo $enregistrement->name; ?></div><!--
                        --><div class="descript inline">
                            <div class="inline" style="color: #7ecab2;font-size: 20px;padding: 0 10px 0 0;vertical-align: middle;"><i class="glyphicon glyphicon-info-sign"></i></div><!--
                            --><div class="inline" style="width: 510px; vertical-align: middle;"><?php echo substr($enregistrement->descript, 0, 250).'...'; ?></div>
                        </div>
                        <div class="location inline">
                            <div class="inline" style="color: #77e2da;font-size: 20px;padding: 30px 5px;vertical-align: middle;">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </div><!--
                            --><div class="inline" style="width: 180px; vertical-align: middle; padding: 20px 5px;">
                                <?php echo $enregistrement->place; ?><br />
                                <?php echo $enregistrement->date; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
//                $secondes = strtotime($hplus3) - time();
                ?>
            </div>
        </div>
        <?php
        include('footer.php');
        