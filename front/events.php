<?php
session_start();
include('lib/dbconnect.php');
include('header.php');
?>
    <!-- Page Content -->
    <div id="content">
        <div class="container">
            <div class="col-lg-12">
                <h2 class="event gray">Liste de nos événements</h2>
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
    <div class="responsive-table-line" style="margin:0px auto;max-width:700px;">
        <table class="table table-bordered table-condensed table-body-center" >
            <thead>
            <tr>
                <th>Droit</th>
                <th>Valeur alphanumérique</th>
                <th>Valeur octale</th>
                <th>Valeur binaire</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-title="Droit">Aucun droit</td>
                <td data-title="Valeur alphanumérique">---</td>
                <td data-title="Valeur octale">0</td>
                <td data-title="Valeur binaire">000</td>
            </tr>
            <tr>
                <td data-title="Droit">Exécution</td>
                <td data-title="Valeur alphanumérique">--x</td>
                <td data-title="Valeur octale">1</td>
                <td data-title="Valeur binaire">001</td>
            </tr>
            <tr>
                <td data-title="Droit">Ecriture</td>
                <td data-title="Valeur alphanumérique">-w-</td>
                <td data-title="Valeur octale">2</td>
                <td data-title="Valeur binaire">010</td>
            </tr>
            <tr>
                <td data-title="Droit">Ecriture et exécution</td>
                <td data-title="Valeur alphanumérique">-wx</td>
                <td data-title="Valeur octale">3</td>
                <td data-title="Valeur binaire">011</td>
            </tr>
            <tr>
                <td data-title="Droit">Lecture seulement</td>
                <td data-title="Valeur alphanumérique">r--</td>
                <td data-title="Valeur octale">4</td>
                <td data-title="Valeur binaire">100</td>
            </tr>
            <tr>
                <td data-title="Droit">Lecture et exécution</td>
                <td data-title="Valeur alphanumérique">r-x</td>
                <td data-title="Valeur octale">5</td>
                <td data-title="Valeur binaire">101</td>
            </tr>
            <tr>
                <td data-title="Droit">Lecture et écriture</td>
                <td data-title="Valeur alphanumérique">rw-</td>
                <td data-title="Valeur octale">6</td>
                <td data-title="Valeur binaire">110</td>
            </tr>
            <tr>
                <td data-title="Droit">Tous les droits</td>
                <td data-title="Valeur alphanumérique">rwx</td>
                <td data-title="Valeur octale">7</td>
                <td data-title="Valeur binaire">111</td>
            </tr>
            </tbody>
        </table>
    </div>
            <?php
            include('footer.php');
            