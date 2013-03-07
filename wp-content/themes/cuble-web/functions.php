<?php
//update_option('siteurl','http://new.cuble.es');
//update_option('home','http://new.cuble.es');

/**
 * Registro de menús.
 */
register_nav_menu( 'primary-menu', __('Menú principal', 'cuble' ));
register_nav_menu( 'footer-menu', __('Enlaces pie de página', 'cuble' ));

/**
 * Registro de tipos de entrada personales.
 */

register_post_type( 'projects',
        array(
                'labels' => array(
                        'name' => __( 'Proyectos' , 'cuble'),
                        'singular_name' => __( 'Proyecto' , 'cuble' )
                        ),
                'public' => true,
                'show_ui' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'projects'),
                'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
        )
);

register_taxonomy(
        'project_tags',
        'projects',
        array(
                'label' => __( 'Etiquetas de proyecto' ),
                'rewrite' => array( 'slug' => 'project-tags' ),
                'public' => true,
                'show_ui' => true,
                'show_admin_column' => true
        )
);

/**
 * Post para servicios, que se mostrarán en portada.
 */
register_post_type( 'services',
        array(
                'labels' => array(
                        'name' => __( 'Servicios' , 'cuble'),
                        'singular_name' => __( 'Servicio' , 'cuble' )
                ),
                'public' => true,
                'show_ui' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'services'),
                'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
        )
);

/**
 * Slideshow
 */
register_post_type( 'slide_image',
        array(
                'labels' => array(
                        'name' => __( 'Imágenes Slideshow' , 'cuble'),
                        'singular_name' => __( 'Imágenes Slideshow' , 'cuble' )
                ),
                'public' => true,
                'supports' => array( 'title', 'excerpt', 'thumbnail')
        )
);

/**
 * Soporte imágenes destacadas
 */
if ( function_exists( 'add_theme_support' ) )
{
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 670, 262, true );
}
add_image_size( 'projects-thumbnail', 252, 252, true );
add_image_size( 'services-thumbnail', 250, 140, true );
add_image_size( 'services-thumbnail-big', 550, 300, true );
add_image_size( 'slideshow-thumbnail', 1170, 400, true );

/**
 * Carga las hojas de estilo y los ficheros de scripts.
 */
function cuble_scripts_styles() {
    
    global $wp_styles;    
    /**
     * Cargamos estilos.
     */
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri().'/css/font-awesome.min.css' );
    wp_enqueue_style( 'font-awesome-ie7', get_stylesheet_directory_uri().'/css/font-awesome-ie7.min.css' );
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

    // Especifico para porfolio
    if (is_post_type_archive('projects'))
    {
        wp_enqueue_script('fancybox', get_stylesheet_directory_uri() .'/fancybox/jquery.fancybox-1.3.4.pack.js', array('custom-jquery'), '1.3.4', true);
        wp_enqueue_script('easing', get_stylesheet_directory_uri() .'/fancybox/jquery.easing-1.3.pack.js', array('custom-jquery', 'fancybox'), '1.3', true);
        wp_enqueue_script('isotope', get_stylesheet_directory_uri() .'/js/jquery.isotope.min.js', array('custom-jquery'), '', true);
    }
    
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

/**
 * Arreglar menú para usarse con el tema.
 */
function cuble_fix_page_menu($html)
{
    return preg_replace('/<ul>/', '<ul class="nav">', $html);
}
add_filter('wp_page_menu', 'cuble_fix_page_menu');


/**
 * Avatares
 */
function cuble_avatar_css($class)
{
    $class = preg_replace("/class='avatar/", 
            "class='img-rounded pull-left avatar", $class) ;
    return $class;
}
add_filter('get_avatar','cuble_avatar_css');

/**
 * "Read More"
 */
function cuble_read_more_link( $link )
{
    
    $link = preg_replace('/class="/', 'class="btn btn-primary ', $link );
    return $link;
}
add_filter( 'the_content_more_link', 'cuble_read_more_link' );

/**
 * 
 */
function cuble_prev_link( $link )
{
    $link = preg_replace('/">/', '" class="btn pull-left">', $link );
    return $link;
}
function cuble_next_link( $link )
{
    $link = preg_replace('/">/', '" class="btn pull-right">', $link );
    return $link;
}
add_filter('next_post_link','cuble_next_link');
add_filter('previous_post_link', 'cuble_prev_link');

function cuble_posts_prev_link( $link )
{
    return 'class="btn btn-primary"';
}
function cuble_posts_next_link( $link )
{
    return 'class="btn btn-primary"';
}
add_filter('next_posts_link_attributes','cuble_posts_next_link');
add_filter('previous_posts_link_attributes', 'cuble_posts_prev_link');

/**
 * Tag cloud
 */
function cuble_tag_cloud($src)
{
    return preg_replace('/wp-tag-cloud/', 'wp-tag-cloud tag-cloud', $src);
}
add_filter('wp_tag_cloud','cuble_tag_cloud');

/**
 * 
 */
add_filter( 'nav_menu_css_class', 'additional_active_item_classes', 10, 2 );
function additional_active_item_classes($classes = array(), $menu_item = false){

    if(in_array('current-menu-item', $menu_item->classes)){
        $classes[] = 'active';
    }
    return $classes;
}
/**
 * Iconos de categoría.
 */


/**
 * Sidebar Widgets 
 */
register_sidebar(array(
        'name' => __( 'Barra Lateral', 'cuble' ),
        'id' => 'right-sidebar',
        'description' => __( 'Widgets para mostrar en la barra lateral derecha.' ),
        'before_title' => '<strong>',
        'after_title' => '</strong>',
        'before_widget' => '<div class="well">',
        'after_widget'  => '</div>',
));

/**
 * Comentarios.
 */
function cuble_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?><!-- single comment --><?php 
    switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
        ?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
		    <div class="media">
		        <a class="pull-left" href="#">
					<?php echo get_avatar( $comment, 70 ); ?>
				</a>
				<div class="media-body">
			        <h5 class="media-heading"><?php comment_author_link(); ?></h5>
		            <?php comment_text(); ?>
			        <br>
			        <a href="<?php esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_date(); ?></a> - <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Contestar', 'cuble' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		        </div>
	        </div>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}

/**
 * Mailchimp
 */

add_action('cuble_mailchimpSF_signup_form', 'cuble_mailchimpSF_signup_form');
function cuble_mailchimpSF_signup_form()
{
    ob_start();
    mailchimpSF_signup_form();
    $string=ob_get_contents();
    ob_end_clean();
    $string = preg_replace('/class="button"/', 'class="button btn btn-primary"', $string);
    $string = preg_replace('/<form method="post" action="\#mc_signup" id="mc_signup_form">/', '<form method="post" action="#mc_signup" id="mc_signup_form" class="footer-form"><fieldset>', $string);
    $string = preg_replace('/Email Address/', __('Entérate de nuestras noticias', 'cuble'), $string);
    $string = preg_replace('/<\/from>/', '</fieldset></from>', $string);
    echo $string;
}


/**
 * Personalización del tema.
 */
 function cuble_customize_register( $wp_customize )
{
   //All our sections, settings, and controls will be added here
    $wp_customize->add_setting( 'primary_claim' , array(
            'default'     => 'Welcome to Merovingio a chrystal clear multipurpose theme',
    ) );
    $wp_customize->add_setting( 'secondary_claim_title' , array(
            'default'     => 'It brings you a beautiful look and a powerful framework for your website',
    ) );
    $wp_customize->add_setting( 'secondary_claim_content' , array(
            'default'     => "Twenty years from now you will be more disappointed by the things that you didn't do than by the ones you did do. So throw off the bowlines. Sail away from the safe harbor. Catch the trade winds. Explore. Dream. Discover. The design will scale to fit on all browser widths/resolutions and on all mobile devices. Go ahead and scale your browser window and see the results.",
    ) );
    $wp_customize->add_section( 'cuble_front_content' , array(
        'title'      => __('Contenido portada','cuble'),
        'priority'   => 30,
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'primary_claim_control', array(
            'label'        => __( 'Eslogan principal', 'cuble' ),
            'section'    => 'cuble_front_content',
            'settings'   => 'primary_claim',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'secondary_claim_title_control', array(
            'label'        => __( 'Título eslogan secundario', 'cuble' ),
            'section'    => 'cuble_front_content',
            'settings'   => 'secondary_claim_title',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'secondary_claim_content_control', array(
            'label'        => __( 'Contenido eslogan secundario', 'cuble' ),
            'section'    => 'cuble_front_content',
            'settings'   => 'secondary_claim_content',
    ) ) );
    
    
    
}
add_action( 'customize_register', 'cuble_customize_register' );

/**
 * Formulario de busqueda.
 * <form>
                            <div class="input-append">
                                <input class="span2" id="appendedInputButtons" type="text">
                                <button class="btn btn-primary" type="button"><?php _e("Buscar", 'cuble')?></button>
                            </div>
                        </form>
 */
 function cuble_search_form( $form )
 {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div class="input-append">
    <input class="span2" type="text" value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit" class="btn btn-primary" id="searchsubmit">'. esc_attr__('Buscar','cuble') .'</button>
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'cuble_search_form' );
