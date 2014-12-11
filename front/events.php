<?php
session_start();
include('lib/dbconnect.php');
include('header.php');
?>
    <!-- Page Content -->
    <div id="content">
        <div class="container">

            <div class="col-lg-12">
                <div class="centerTitle">
                    <h2 class="pageTitle">Prochaines ventes</h2>
                </div>
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
                //    echo '<h1>', $enregistrement->name, ' ', $enregistrement->date, '</h1>';
                //    echo '<p>', 'Adresse :' .$enregistrement->place, '</p>';
                //    echo '<p>', 'Infos :' .$enregistrement->descript, '</p>';
                //    echo '<br />';

                ?>



                    <div class="responsive-table-line" style="margin:0px auto;max-width:700px;">
                        <table class="table table-bordered table-condensed table-body-center" >
                            <thead>
                            <tr>
                                <th><span class="label label-info">Nom</span></th>
                                <th><span class="label label-info">Lieu</span></th>
                                <th><span class="label label-info">Date</span></th>
                                <th><span class="label label-info">Infos</span></th>
                                <th><span class="label label-info"></span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td data-title="Nom"><?php echo $enregistrement->name ?></td>
                                <td data-title="Lieu"><?php echo $enregistrement->place ?></td>
                                <td data-title="Date"><?php echo $enregistrement->date ?></td>
                                <td data-title="Infos"><?php echo $enregistrement->descript ?></td>
                                <td><a class="btn btn-primary btn-lg" href="#" role="button">Participer</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <br />
                <?php } ?>

            </div>

            <?php
            include('footer.php');
            