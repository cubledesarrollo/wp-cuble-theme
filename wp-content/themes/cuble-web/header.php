<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Merovingio - Responsive Bootstrap Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/theme.css">
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Patua+One'>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox-1.3.4.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/isotope.css">
        <!--[if lt IE 9]>
                <link rel="stylesheet" href="css/font-awesome-ie7.css">
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="favicon.ico">
    </head>

    <body>
        <!-- page wrapper -->
        <div class="container wrapper">
            <header>
                <div class="row">
                    <div class="span4">
                        <h1>
                            <a href="index.html"><img src="<?php bloginfo('template_url'); ?>/assets/logocuble.png" alt=""></a>
                        </h1>
                    </div>
                    <div class="span4">
                        <ul class="social-media">
                            <li><a href="http://www.twitter.com/cuble_es"><i class="icon icon-twitter-sign"></i></a></li>
                            <li><a href="http://www.facebook.com/cuble.es"><i class="icon icon-facebook-sign"></i></a></li>
                            <li><a href="http://plus.google.com/cuble"><i class="icon icon-google-plus-sign"></i></a></li>                           
                        </ul>
                    </div>
                    <div class="span4">
                        <form>
                            <div class="input-append">
                                <input class="span2" id="appendedInputButtons" type="text">
                                <button class="btn btn-primary" type="button">Search</button>
                            </div>
                        </form>
                    </div><!-- /.span -->
                </div><!-- /.row -->
            </header>

            <div class="row">
                <div class="span12">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">Menu</a>
                                <a class="brand" href="index.html">Cuble</a>
                                <div class="nav-collapse collapse">                                 
                                     <?php  wp_nav_menu(); ?>
                                </div> <!-- /.nav-collapse -->
                            </div><!-- /container -->
                        </div><!-- /navbar-inner -->
                    </div><!-- /navbar -->
                </div><!-- /row -->
            </div><!-- /span12 whoa! -->