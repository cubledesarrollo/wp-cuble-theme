<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        <?php wp_head(); ?>
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
                                <div class="nav-collapse collapse">                                 
                                     <?php   wp_nav_menu(); ?>
                                </div> <!-- /.nav-collapse -->
                            </div><!-- /container -->
                        </div><!-- /navbar-inner -->
                    </div><!-- /navbar -->
                </div><!-- /row -->
            </div><!-- /span12 whoa! -->