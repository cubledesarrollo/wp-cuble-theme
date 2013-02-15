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
                <?php
                $args = array( 'post_type' => 'slide_image');
                $loop = new WP_Query( $args );
                $first = true;
                ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="<?php if ($first): ?>active <?php $first = false; endif;?>item">
                    <?php the_post_thumbnail( 'slideshow-thumbnail', array("class" => "")); ?>
                </div>
                <?php endwhile; ?>
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
            <h3><?php echo get_theme_mod('primary_claim'); ?></h3>
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
            <?php if (has_post_thumbnail()): ?>
		    <?php the_post_thumbnail( 'services-thumbnail', array("class" => "img-rounded")); ?>
		    <?php endif; ?>
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
            <h3><?php echo get_theme_mod('secondary_claim_title'); ?></h3>
            <p><?php echo get_theme_mod('secondary_claim_content'); ?></p>
        </div>
    </div>
</div>

</div><!-- /.container (page container)-->
<?php get_footer(); ?>