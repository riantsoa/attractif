<?php
// On récupère nos variables de session
if (isset($_SESSION['data'])) {
    $email = $_SESSION['data']->mail;
    $password = $_SESSION['data']->pass;
    $id = $_SESSION['data']->id;
}
header('Content-Type: text/html; charset=utf-8');
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

        <!-- css pour hover image produit -->
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style_common.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />



        <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="js/owl-carousel/owl.theme.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body>
        <div id="header">
            <div id="logo" class="inline col-md-4 col-sm-6">
                <a href="index.php"><img src="img/logotype-attractif-slogan.png" alt="Attractif - vente privée high tech" width="200"></a>
            </div>
            <div id="login" class="inline col-md-8 col-sm-6">
                <?php
                // Si non-connecté => Login / Sinon => Mon compte
                if (isset($password) && isset($email)) {
                    ?>
                    <span id="login-btn" aria-hidden="true"><i class="glyphicon glyphicon-user"></i> Mon compte</span>
                    <div id="login-box">
                        <div>Bienvenue, <?php echo $email; ?></div>
                        <div><a href="myinfos.php"><i class="glyphicon glyphicon-user" aria-hidden="true"></i> Mes infos</a></div>
                        <div><a href="#"><i class="glyphicon glyphicon-bell" aria-hidden="true"></i> Mes alertes</a></div>
                        <div><a href="myfav.php"><i class="glyphicon glyphicon-star" aria-hidden="true"></i> Mes favoris</a></div>
                        <div><a href="mysale.php"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> Mes achats / VP</a></div>
                        <br />
                        <div><a href="lib/logout.php"><i class="glyphicon glyphicon-remove-circle" aria-hidden="true"></i> Me déconnecter</a></div>
                    </div>
                    <?php
                } else {
                    ?>
                    <span id="login-btn" aria-hidden="true"><i class="glyphicon glyphicon-user"></i> Connexion</span>
                    <div id="login-box">
                        <form action="lib/login.php" method="post">
                            <input type="text" placeholder="E-mail" name="email">
                            <br />
                            <input type="password" placeholder="Mot de passe" name="password"><br />
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
                            <a href="current_sales.php">Ventes en cours</a>
                            <div class="nav-hover"></div>
                        </li>
                        <li>
                            <a href="events.php">Prochaines ventes</a>
                            <div class="nav-hover"></div>
                        </li>
                        <li>
                            <a href="highlighted.php">Produits phares</a>
                            <div class="nav-hover"></div>
                        </li>
                        <li>
                            <a href="products.php">Tous les produits</a>
                            <div class="nav-hover"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>