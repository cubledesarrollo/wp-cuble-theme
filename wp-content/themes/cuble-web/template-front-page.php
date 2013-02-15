<?php
/**
 * Template Name: Front Page
 * 
 * @author Cuble Desarrollo S.L.
 * @package Wordpress Cuble Theme
 */
?>

<?php get_header(); ?>
<div class="row">
    <div class="span12">
        <div id="home-carousel" class="carousel slide">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="active item">
                    <img src="<?php echo get_stylesheet_directory_uri()?>/assets/slide-4.jpg" alt="">
                </div>
                <div class="item">
                    <img src="<?php echo get_stylesheet_directory_uri()?>/assets/slide-5.jpg" alt="">
                </div>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#home-carousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#home-carousel" data-slide="next">&rsaquo;</a>
        </div><!-- /.carousel -->
    </div><!-- /.span -->
</div><!-- /.row -->

<div class="row">
    <div class="span12">
        <div class="well centered">
            <h3>Welcome to Merovingio a chrystal clear multipurpose theme <a class="btn btn-primary btn-large" href="#">Learn More <i class="icon icon-caret-right"></i></a></h3>
        </div>
    </div>
</div>

<div class="row">
    <?php
    $args = array( 'post_type' => 'services', 'posts_per_page' => 4 );
    $loop = new WP_Query( $args );
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <div class="span3">
        <div class="info-column">
            <img class="img-rounded" src="<?php echo get_stylesheet_directory_uri()?>/assets/team-1.jpg" alt="">
            <h3>
                <?php $icon = get_post_meta($post->ID, 'icon', true); ?>
                <?php if (!empty($icon)):?>
                <i class="icon <?php echo $icon; ?>"></i>
                <?php endif; ?>
                <?php the_title() ?>
            </h3>
            <p><?php the_excerpt(); ?></p>
            <a class="btn btn-primary" href="<?php the_permalink() ?>"><?php _e("Saber más &raquo;",'cuble')?></a>
        </div>
    </div>
    <?php endwhile; ?>
</div><!-- /.row -->

<div class="row">
    <div class="span12">
        <div class="well centered">
            <h3>It brings you a beautiful look and a powerful framework for your website</h3>
            <p>Twenty years from now you will be more disappointed by the things that you didn't do than by the ones you did do. So throw off the bowlines. Sail away from the safe harbor. Catch the trade winds. Explore. Dream. Discover. The design will scale to fit on all browser widths/resolutions and on all mobile devices. Go ahead and scale your browser window and see the results.</p>
        </div>
    </div>
</div>

</div><!-- /.container (page container)-->
<?php get_footer(); ?>