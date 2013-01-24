<?php
/**
 * Carga las hojas de estilo y los ficheros de scripts.
 */
function cuble_scripts_styles() {
    global $wp_styles;
    
    /**
     * Cargamos estilos.
     */
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri().'/css/font-awesome.css' );
    wp_enqueue_style( 'font-awesome-ie7', get_stylesheet_directory_uri().'/css/font-awesome-ie7.css' );
    wp_enqueue_style( 'isotope', get_stylesheet_directory_uri().'/css/isotope.css' );
    
    /**
     * Compobamos si se ha creado el fichero de plantilla correctamente, si no,
     * se carga el less.
     */
    if (file_exists(get_template_directory().'/css/cuble.css'))
    {
        wp_enqueue_style( 'cuble-theme', get_stylesheet_directory_uri().'/css/cuble.css' );
    }
    else
    {
        wp_enqueue_style( 'cuble-theme', get_stylesheet_directory_uri().'/less/cuble.less' );
        wp_enqueue_script('less', get_stylesheet_directory_uri() .'/js/less.min.js', array('jquery'), '1.3.3');
    }
    /*
     * Loads our main stylesheet.
    */
    wp_enqueue_style( 'cuble-style', get_stylesheet_uri() );
    wp_enqueue_style( 'pauta-one', "http://fonts.googleapis.com/css?family=Patua+One");
    
    /* Scripts */
    wp_enqueue_script('custom-jquery', get_stylesheet_directory_uri() .'/js/jquery-1.8.2.min.js', array(), '1.8.2', true);
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() .'/js/bootstrap.min.js', array('custom-jquery'), '2.2.2', true);
    
}
add_action( 'wp_enqueue_scripts', 'cuble_scripts_styles' );

/**
 * Arregla el attributo rel de los ficheros less.
 *
 * @param string $src
 */
function fix_less_rel($src) {
    if (preg_match('/href=.*\.less/', $src))
        return str_replace("rel='stylesheet'", "rel='stylesheet/less'", $src);
    return $src;
}
add_filter('style_loader_tag', 'fix_less_rel');

/*
 * Esta clase permite meter la clase nav dentro del ul para que funcione con bootstrap.
 */
function add_menuclass($ulclass) {
return preg_replace('/<ul>/', '<ul class="nav">', $ulclass, 1);
}
add_filter('wp_page_menu','add_menuclass');