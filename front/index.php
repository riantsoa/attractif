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
        <div class="row three-area">
            <div class="col-md-4 col-sm-6">
                <span class="label label-default">Prochaines ventes</span>
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <span class="label label-default">Produits</span>
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <span class="label label-default">Newsletters / Alertes</span>
                <a href="portfolio-item.html">
                    <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                </a>
            </div>
        </div>
        <!-- Produits phares -->
        <div class="row highlight-products">
            <!--<div class="col-lg-12">
                <h2 class="page-header">Nos produits phares</h2>
            </div>-->
            <div class="best-products">
                <div class="col-md-6">
                    <img class="img-responsive" src="http://placehold.it/700x450" alt="">
                </div>
            </div>
        </div>
        <?php
        include('footer.php');
        