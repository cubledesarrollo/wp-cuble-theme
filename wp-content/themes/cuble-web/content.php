<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<!-- post meta data -->
	<div class="span2 hidden-phone">
		<!-- author meta data -->
		<?php echo get_avatar(get_the_author_meta('ID'), 70); ?>
		<strong><?php _e('Escrito por', 'cuble');?>:</strong>
		<p><?php the_author(); ?></p>
		<span class="label"><small><?php the_author_meta('description')?></small></span>
		<hr>
		<!-- post meta data -->
		<p><?php the_date() ?></p>
		<p><?php _e('Etiquetas')?>:</p>
		<?php if (get_post_type() == 'projects'):?>
		<?php echo get_the_term_list( $post->ID, 'project_tags', '<ul class="post-tags"><li>', '</li><li>' , '</li></ul>'); ?>
		<?php else: ?>
		<?php echo get_the_tag_list( '<ul class="post-tags"><li>', '</li><li>' , '</li></ul>'); ?>
		<?php endif;?>
	</div><!-- end of post meta data-->
	<!-- the post -->
	<div class="span7">
		<h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		
		<?php if (has_post_thumbnail()): ?>
		<?php the_post_thumbnail( 'post-thumbnail', array("class" => "post-img")); ?>
		<?php endif; ?>
		
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		    <p><?php the_excerpt(); ?></p>
		<?php else : ?>
    		<p>
    			<?php the_content( __( 'Continuar leyendo &raquo;', 'cuble' ) ); ?>
    			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
    		</p>
		<?php endif; ?>
		
	</div><!-- /end of post -->
</article><!-- /end of article -->