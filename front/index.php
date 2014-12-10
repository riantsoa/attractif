<?php
session_start();
include('lib/dbconnect.php');
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
                $req = $bdd->prepare('SELECT id, date FROM event WHERE date >= NOW()');
                $req->execute();
                $data = $req->fetch(PDO::FETCH_OBJ);
                // redirection quand timer arrivé à 0
                $redirection = 'index.php';
                $secondes = strtotime($data->date) - time();
                ?>
                <h2>PROCHAINE VENTE DANS </h2>
                <div id="timer"></div>
                <div class="participate green">
                    <?php if (isset($_SESSION['data'])) { ?>
                        <a href="participate.php?event=<?php echo $data->id; ?>">PARTICIPER</a>
                    <?php } else { ?>
                        <a href="#">PARTICIPER</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Produits phares -->
        <div class="row highlight-products">
            <h2>10 PRODUITS PHARES</h2>
            <div class="best-products">
                <div class="col-md-12">
                    <div id="carousel">
                        <button class="prev inline"></button>
                        <div class="mfcarousel inline">
                            <ul>
                                <li><img src="http://malsup.github.io/images/beach1.jpg"></li>
                                <li><img src="http://malsup.github.io/images/beach2.jpg"></li>
                                <li><img src="http://malsup.github.io/images/beach3.jpg"></li>
                                <li><img src="http://malsup.github.io/images/beach4.jpg"></li>
                                <li><img src="http://malsup.github.io/images/beach5.jpg"></li>
                                <li><img src="http://malsup.github.io/images/beach6.jpg"></li>
                                <li><img src="http://malsup.github.io/images/beach7.jpg"></li>
                                <li><img src="http://malsup.github.io/images/beach8.jpg"></li>
                            </ul>
                        </div>
                        <button class="next inline"></button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include('footer.php');
        