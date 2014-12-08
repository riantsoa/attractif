<?php
session_start();
include('lib/dbconnect.php');

//var_dump($_SESSION['data']);
// On récupère nos variables de session
if (isset($_SESSION['data'])) {
    $mail = $_SESSION['data']->mail;
    $password = $_SESSION['data']->pass;
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Attractif - Accueil</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/modern-business.css" rel="stylesheet">
        <link href="css/layout.css" rel="stylesheet">
        <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="header">
            <div id="search" class="inline col-md-4 col-sm-6">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span><input type="text" class="blabla" placeholder="Recherche">
            </div>
            <div id="logo" class="inline col-md-4 col-sm-6">
                <a href="index.php"><img src="img/attractif.jpg" alt="Attractif - vente privée high tech"></a>
            </div>
            <div id="login" class="inline col-md-4 col-sm-6">
                <?php
                // Si non-connecté => Login / Sinon => Mon compte
                if (isset($password) && isset($mail)) {
                    ?>
                    <span id="login-btn" aria-hidden="true"><i class="glyphicon glyphicon-user"></i> Mon compte</span>
                    <div id="login-box">
                        <div>Bienvenue, <?php echo $mail; ?></div>
                        <div>Mes infos</div>
                        <div>Mes alertes</div>
                        <div>Mes favoris</div>
                        <div>Mes achats / VP</div>
                        <div><a href="lib/logout.php">Me déconnecter</a></div>
                    </div>
                    <?php
                } else {
                    ?>
                    <span id="login-btn" aria-hidden="true"><i class="glyphicon glyphicon-user"></i> Connexion</span>
                    <div id="login-box">
                        <form action="lib/login.php" method="post">
                            <input type="text" placeholder="E-mail" name="mail">
                            <br />
                            <input type="password" placeholder="Mot de passe" name="pass"><br />
                            <input type="submit" value="Connexion">
                        </form>
                        <div>
                            <span><a href="forgot.php">Mot de passe oublié ?</a></span>
                            <span class="hr"></span>
                            <span>Pas encore de compte ?<br /><a href="register.php">S'inscrire</a></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- NAV LINKS -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="">Prochaines ventes</a>
                            <div class="nav-hover"></div>
                        </li>
                        <li>
                            <a href="">Produits phares</a>
                            <div class="nav-hover"></div>
                        </li>
                        <li>
                            <a href="products.php">Tous les produits</a>
                            <div class="nav-hover"></div>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>
                            <div class="nav-hover"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
                <!-- Footer -->
                <footer>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Copyright &copy; Attractif 2014</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/script.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $('.carousel').carousel({
                interval: 5000 //changes the speed
            })
        </script>
    </body>
</html>