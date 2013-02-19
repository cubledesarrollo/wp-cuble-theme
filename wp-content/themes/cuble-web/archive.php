<?php
/**
 * 
 * @author Cuble Desarrollo S.L.
 * @package Wordpress Cuble Theme
 */
?>
<?php get_header(); ?>

<div class="row">
	<div class="span12">
		<h2>Our Curated Blog</h2>
		<hr>
	</div>
</div>

<div class="row">
	<!-- blog container -->
	<div class="span9">
	<?php if ( have_posts() ) : ?>
	    <?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
		    <?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>
	</div>
	
	<?php get_sidebar(); ?>
	
</div><!-- .row -->

<?php get_footer(); ?>