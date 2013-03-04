<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
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
                            <a href="<?php echo site_url()?>"><img src="<?php bloginfo('template_url'); ?>/assets/logocuble.png" alt=""></a>
                        </h1>
                    </div>
                    <div class="span4">
                        <ul class="social-media">
                            <li><a href="http://www.twitter.com/cuble_es"><i class="icon icon-twitter-sign"></i></a></li>
                            <li><a href="http://www.facebook.com/cuble.es"><i class="icon icon-facebook-sign"></i></a></li>
                            <li><a href="https://plus.google.com/114449356144896554020/"><i class="icon icon-google-plus-sign"></i></a></li>
                            <li><a href="https://github.com/cubledesarrollo"><i class="icon icon-github"></i></a></li>
                        </ul>
                    </div>
                    <div class="span2 offset2">
                        <div class="well header-contact">
                            <i class="icon icon-envelope"></i> <a href="mailto:info@cuble.es">info@cuble.es</a>
                            <br/>
                            <i class="icon icon-phone-sign"></i> <a href="tel:+34963211830">+34 96 321 18 30</a>
                        </div>
                    </div><!-- /.span -->
                </div><!-- /.row -->
            </header>

            <div class="row">
                <div class="span12">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">Menu</a> 
                                <a class="brand" href="<?php echo site_url()?>"><?php _e('Cuble', 'cuble') ?></a>
                                <div class="nav-collapse collapse">
                                   <?php wp_nav_menu(array('theme_location' => 'primary-menu', 
                                                           'menu_class' => 'menu nav')); ?>
                                </div> <!-- /.nav-collapse -->
                            </div><!-- /container -->
                        </div><!-- /navbar-inner -->
                    </div><!-- /navbar -->
                </div><!-- /row -->
            </div><!-- /span12 whoa! -->