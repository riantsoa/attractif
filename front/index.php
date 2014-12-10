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
            <div class="fill" style="background-image:url('img/slide1.jpg');"></div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('img/slide2.jpg');"></div>
            <div class="carousel-caption left">
                <h2>Razer Electra</h2>
                <div>Retrouvez tous les articles de la gamme Razer<br />
                    lors de nos prochaines ventes privées<br /></div>
            </div>
        </div>
        <div class="item">
            <div class="fill" style="background-image:url('img/slide3.jpg');"></div>
            <div class="carousel-caption right">
                <h2>ipad 2 - Apple</h2>
                <div>Retrouvez la tablette d'Apple ipad 2<br />
                    lors de nos prochaines ventes privées<br /></div>
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
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            <?php
                            //Je vérifie le pseudo et le mot de passe
                            $req = $bdd->prepare('SELECT p.*, COUNT(s.id) AS nb
                            FROM product as p
                            LEFT JOIN sale as s ON (p.id = s.product)
                            GROUP BY p.id
                            ORDER BY nb DESC
                            LIMIT 0,10');
                            //SELECT s.product FROM sales as s WHERE event = 4
                            $req->execute();
                            $data = $req->setFetchMode(PDO::FETCH_OBJ);

                            // Nous traitons les résultats en boucle
                            while ($enregistrement = $req->fetch()) {
                                ?>
                                <div class="item"><?php echo '<img src="img/products/' . $enregistrement->image . '" width="200" alt="' . $enregistrement->name . '" />'; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include('footer.php');
        