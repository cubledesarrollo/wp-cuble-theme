<?php
/**
 * Template Name: Blog Home
 * 
 * @author Cuble Desarrollo S.L.
 * @package Wordpress Cuble Theme
 */
?>
<?php get_header(); ?>

<div class="row">
	<div class="span12">
		<h2><?php _e("El Blog de Cuble", 'cuble') ?></h2>
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
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="row">
			<div class="span7 offset2">
		        <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			        <div class="nav-previous pull-right"><?php next_posts_link( __( 'Post más viejos <span class="meta-nav">&rarr;</span>', 'cuble' ) ); ?></div>
			        <div class="nav-next pull-left"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Post más nuevos ', 'cuble' ) ); ?></div>
		        </nav>
		    </div>
		</div>
    	<?php endif; ?>
	<?php else : ?>
	<?php endif; ?>
	</div>
	
	<?php get_sidebar(); ?>
	
</div><!-- .row -->

<?php get_footer(); ?>