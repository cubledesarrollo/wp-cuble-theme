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
		<h2>El Blog de Cuble</h2>
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
		        
	        <div class="row">
	            <div class="span7 offset2">
	                <hr>
    		        <nav class="nav-single clearfix">
    				<?php previous_post_link( '%link', __('Anterior', 'cuble') ); ?>
    				<?php next_post_link( '%link', __('Siguiente', 'cuble') ); ?>
    				<p class="centered"><?php _e( '¿Quieres leer más?', 'cuble' ); ?></p>
    				</nav><!-- .nav-single -->
				</div>
            </div>
            <div class="row">
	            <div class="span7 offset2">
				<!-- the comments -->
				<hr>
			    <?php comments_template( '', true ); ?>
		        </div>
	        </div>
		<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>
	
	</div>
	
	<?php get_sidebar(); ?>
	
</div><!-- .row -->
<?php get_footer(); ?>
