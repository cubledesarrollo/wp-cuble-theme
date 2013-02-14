<?php
/**
 * Profolio
 * 
 * @author Cuble Desarrollo S.L.
 * @package Wordpress Cuble Theme
 */
$args = array( 'post_type' => 'projects', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
?>
<?php get_header(); ?>
<div class="row">
	<div class="span12">
		<h2><?php _e('Casos de estudio', 'cuble');?></h2>
		<hr>
	</div>
</div>

<div class="row">
	<div class="span12">

	    <?php $tags = get_terms('project_tags'); ?>
		<ul class="filter">
			<li><span><?php _e('Filtrar proyectos')?>:</span></li>
			<li><a class="active" href="#" data-filter="*"><?php _e('Ver todas', 'cuble')?></a></li>
			<?php foreach ($tags as $tag):?>
			<li><a href="#" data-filter=".<?php echo $tag->name?>"><?php echo $tag->name?></a></li>
            <?php endforeach; ?>
		</ul>
        
        <!--Portfolio Items-->
        <ul class="thumbnails portfolio">
    		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    		<?php 
    		$terms = get_the_terms($post->ID, 'project_tags');
    		$class = array(); foreach ($terms as $term) $class[] = $term->name;
    		$class = join(' ', $class);
    		 ?>
    		<li class="span3 <?php echo $class?>">
    			<div class="thumbnail">
    				<a class="js-fancybox" rel="album" title="<?php the_title() ?>" href="<?php the_permalink() ?>">
    				<?php the_post_thumbnail('projects-thumbnail');?>
    				</a>
    				<h5><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
    				<p><?php the_excerpt(); ?></p>
    			</div>
    		</li>
    		<?php endwhile; ?>
	    </ul>
    </div><!-- /.span12 -->
</div><!-- /.row -->

<?php get_footer(); ?>