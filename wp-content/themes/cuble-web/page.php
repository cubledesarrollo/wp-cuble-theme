<?php
/**
 * Template Name: Blog Home
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

<div class="row">
	<div class="span12">

    <?php the_content(); ?>

    </div>
</div><!-- .row -->
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>