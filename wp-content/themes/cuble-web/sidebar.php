<!-- the sidebar -->
<aside class="span3">

    <?php if ( ! dynamic_sidebar( 'right-sidebar' ) ) : ?>
    <!-- widget -->
    <div class="well">
        <strong><?php _e("Buscar", 'cuble');?></strong>
        <hr>
        <form class="input-append">
            <input type="text" class="flexible">
            <button type="submit" class="btn btn-primary"><?php _e("Ir", 'cuble');?></button>
        </form>
    </div>
    <!-- widget -->
    <div class="well">
        <strong><?php _e("Temas populares", 'cuble');?></strong>
        <hr>
        <?php wp_tag_cloud(array(
                'orderby' => 'count', 
                'number' => 10,
                'format' => 'list')); ?>
    </div>
    <?php endif; ?>

</aside><!-- end of sidebar -->