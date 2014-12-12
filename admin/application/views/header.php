<!DOCTYPE html>
<html lang="en">

<head>
    <?php $base_url = base_url() . 'template_admin_files/';?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Attractif</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $base_url;?>css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $base_url;?>css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo $base_url;?>css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $base_url;?>css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $base_url;?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $base_url;?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>css/jquery.datetimepicker.css" rel="stylesheet" type="text/css">
    <script src="<?php echo $base_url;?>js/jquery.js"></script>
    <!-- /#wrapper -->
    <!-- Metis Menu Plugin JavaScript -->

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $base_url;?>js/sb-admin-2.js"></script>
    <script src="<?php echo $base_url;?>js/plugins/metisMenu/metisMenu.min.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo $base_url;?>js/jquery.js"></script>
    <script src="<?php echo $base_url;?>js/html5shiv.js"></script>
    <script src="<?php echo $base_url;?>jsrespond.min.js"></script>

    <![endif]-->

</head>

<body>

<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo base_url();?>index.php/welcome"><img src="<?php echo base_url();?>img/logotype.png" height="30px" style="margin-top: -5px;  "></a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">

<!-- /.dropdown -->
<!-- /.dropdown -->
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li class="divider"></li>
        <li><a href="<?php echo site_url();?>/userctrl/deconnecter"><i class="fa fa-sign-out fa-fw"></i> Deconnecter</a>
        </li>
    </ul>
    <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a class="active" href="<?php echo base_url();?>index.php/welcome"><i class="fa fa-dashboard fa-fw"></i>&nbsp;&nbsp;Accueil</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>index.php/user/index"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Utilisateurs</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>index.php/product/index"><span class="glyphicon glyphicon-phone"></span>&nbsp;&nbsp;Produits</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>index.php/category/index"><span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;Categories</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>index.php/event/index"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;Evenements</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>index.php/sale/index"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Ventes</a>
            </li>
            <li class="active">
                <a href="#"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;Mailing<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse in" aria-expanded="true" style="">
                    <li>
                        <a href="<?php echo base_url();?>index.php/mailing/export_mail_csv"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Export des adresses mail</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
