<?php
session_start();
include('lib/dbconnect.php');

//var_dump($_SESSION['data']);
// On récupère nos variables de session
if (isset($_SESSION['data'])) {
    $mail = $_SESSION['data']->mail;
    $password = $_SESSION['data']->pass;
}
include('header.php');
?>
<!-- Slider -->
<header id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
            <div class="carousel-caption">
                <h2>Caption 1</h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
            <div class="carousel-caption">
                <h2>Caption 2</h2>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
            <div class="carousel-caption">
                <h2>Caption 3</h2>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="icon-prev"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="icon-next"></span></a>
</header>
<!-- Page Content -->
<div id="content">
    <div class="container">
        <!-- Selection 3 blocks -->
        <div class="row timer">
            <div class="col-md-12 col-sm-6">
                <?php
                //Timer
                $req = $bdd->prepare('SELECT * FROM event WHERE 1');
                $req->execute();
                $data = $req->fetch(PDO::FETCH_OBJ);
                $redirection = 'index.php'; // quand le compteur arrive à 0
                $secondes = strtotime($data->date) - time();
//                $secondes = strtotime($data->date)
                ?>
                <script type="text/javascript">
                    var temps = <?php echo $secondes; ?>;
                    var timer = setInterval('CompteaRebour()', 1000);
                    function CompteaRebour() {

                        temps--;
                        j = parseInt(temps);
                        h = parseInt(temps / 3600);
                        m = parseInt((temps % 3600) / 60);
                        s = parseInt((temps % 3600) % 60);
                        document.getElementById('timer').innerHTML =
                                ' <div class="inline"><span class="hour">' + (h < 10 ? "0" + h : h) + '</span><p>HEURES</p></div> ' +
                                ' <div class="inline"><span class="min">' + (m < 10 ? "0" + m : m) + '</span><p>MINUTES</p></div> ' +
                                ' <div class="inline"><span class="sec">' + (s < 10 ? "0" + s : s) + '</span><p>SECONDES</p></div> ';
                        if ((s == 0 && m == 0 && h == 0)) {
                            clearInterval(timer);
                            url = "<?php echo $redirection; ?>"
                            Redirection(url)
                        }
                    }
                    function Redirection(url) {
                        setTimeout("window.location=url", 500)
                    }
                </script>
                <h2>PROCHAINE VENTE DANS </h2>
                <div id="timer"></div>
                <div class="participate green">
                    <a href="#">PARTICIPER</a>
                </div>
            </div>
        </div>
        <!-- Produits phares -->
        <div class="row highlight-products">
                <h2>Nos produits phares</h2>
            <div class="best-products">
                <div class="col-md-6">
                    <img class="img-responsive" src="http://placehold.it/700x450" alt="">
                </div>
            </div>
        </div>
        <?php
        include('footer.php');
        