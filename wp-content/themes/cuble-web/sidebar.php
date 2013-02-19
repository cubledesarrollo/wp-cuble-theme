<!-- the sidebar -->
<aside class="span3">
    <!-- widget -->
    <div class="well">
        <strong><?php _e("Temas populares", 'cuble');?></strong>
        <hr>
        <?php wp_tag_cloud(array(
                'orderby' => 'count', 
                'number' => 10,
                'format' => 'list',
                'largest' => 8)); ?>
    </div>
    <?php dynamic_sidebar( 'right-sidebar' ); ?>
    
</aside><!-- end of sidebar -->