<?php
/**
 * Template Name: Servicios
 * 
 * @author Cuble Desarrollo S.L.
 * @package Wordpress Cuble Theme
 */
?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="row">
	<div class="span12">
		<h2><?php the_title();?></h2>
		<hr>
	</div>
</div><!-- .row -->
<?php  $content = get_the_content(); ?>
<div class="row">
    <?php
    global $more;
    $args = array( 'post_type' => 'services', 'posts_per_page' => 4 );
    $loop = new WP_Query( $args );
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php $more = 0; ?>
    <div class="span6">
        <div class="info-column">
            <?php if (has_post_thumbnail()): ?>
		    <?php the_post_thumbnail( 'services-thumbnail-big', array("class" => "img-rounded")); ?>
		    <?php endif; ?>
            <h3>
                <?php $icon = get_post_meta($post->ID, 'icon', true); ?>
                <?php if (!empty($icon)):?>
                <i class="icon <?php echo $icon; ?>"></i>
                <?php endif; ?>
                <?php the_title() ?>
            </h3>
            <p><?php the_content(__("Saber más &raquo;",'cuble')); ?></p>
            <!-- <a class="btn btn-primary" href="<?php the_permalink() ?>"><?php ?></a> -->
        </div>
    </div>
    <?php endwhile; ?>
</div><!-- /.row -->

<div class="row">
	<div class="span12">
    <?php echo $content; ?>
    </div>
</div><!-- .row -->
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>