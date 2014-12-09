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
            <div id="logo" class="inline col-md-4 col-sm-6">
                <a href="index.php"><img src="img/logo.png" alt="Attractif - vente privée high tech" width="200"></a>
            </div>
            <div id="login" class="inline col-md-8 col-sm-6">
                <?php
                // Si non-connecté => Login / Sinon => Mon compte
                if (isset($password) && isset($mail)) {
                    ?>
                    <span id="login-btn" aria-hidden="true"><i class="glyphicon glyphicon-user"></i> Mon compte</span>
                    <div id="login-box">
                        <div>Bienvenue, <?php echo $mail; ?></div>
                        <div><a href="myinfos.php">Mes infos</a></div>
                        <div><a href="myalerts.php">Mes alertes</a></div>
                        <div><a href="myfav.php">Mes favoris</a></div>
                        <div><a href="mysell.php">Mes achats / VP</a></div>
                        <br />
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
                            <a href="ventes.php">Ventes en cours</a>
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