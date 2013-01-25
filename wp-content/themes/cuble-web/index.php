
<?php get_header(); ?>
		<div class="row">
			<div class="span12">
                            <h2><?php echo _e("Think Up!") ?></h2>
				<hr>
			</div>
		</div>

		<div class="row">
			<!-- blog container -->
			<div class="span9">
                            
                                 <?php if (have_posts()) : ?>
                                 <?php while (have_posts()) : the_post(); ?>
                            
				<!-- first article -->
				<article class="row">
					<!-- post meta data -->
					<div class="span2 hidden-phone">
						<!-- author meta data -->
                                                  

						<img class="img-rounded pull-left avatar" src="<?php bloginfo('template_directory') ?>/images/authors/<?php the_author_ID()?>.jpg" alt="">
						<strong><?php echo _e("Escrito por:"); ?></strong>
						<p><?php the_author(); ?></p>
						<span class="label"><small>Editor in Chief</small></span>
						<hr>
						<!-- post meta data -->
						<p><?php the_time('j F Y'); ?></p>
						<p><?php echo _e("Etiquetas"); ?></p>
						<ul class="post-tags">
                                                    <?php $tags = wp_get_post_tags($post->ID); ?>
                                                    <?php foreach ($tags as $tag){ ?>
							<li><a href='<?php echo  $tag->link; ?>' title='<?php echo $tag->name ?> Tag' class='<?php echo $tag->slug; ?>'><?php echo $tag->name; ?></a></li> 
                                                    <?php } ?>	 
						</ul>
					</div><!-- end of post meta data-->
					<!-- the post -->
					<div class="span7">
						<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
						<?php the_excerpt(200); ?>
						<a class="btn btn-primary" href="blog-post.html"><?php echo _e("Continuar leyendo"); ?> &raquo;</a>
					</div><!-- /end of post -->
				</article><!-- /end of article -->
                                
                                 <?php endwhile; ?> 
                                <?php endif; ?> 
  
                    </div><!-- /.span9 blog container-->

			<!-- the sidebar -->
			<aside class="span3">
				<!-- widget -->
				<div class="well">
					<strong><?php echo _e("Buscar"); ?></strong>
					<hr>
					   
                                        <form class="input-append" action="<?php echo home_url( '/' ); ?>" method="get">
                                            <fieldset> 
                                                <input type="text" name="s" class="span2" id="search" value="<?php the_search_query(); ?>" />
                                                <input type="submit" class="btn btn-primary" value="<?php _e("Buscar"); ?>" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
                                            </fieldset>
                                            
                                        </form>
				</div>
				<!-- widget -->
				<div class="well">
					<strong>Want To Know More?</strong>
					<hr>
					<p>When I first started designing interactive products, it was a struggle. Small projects were fine. But when the interactions got more complex, I noticed that tools, team communication, and even my own thinking started breaking down. I see many startups facing these same problems today. So I wanted to share...</p>
				</div>
				<!-- widget -->
				<div class="well">
					<strong>Popular Topics</strong>
					<hr>
					<ul class="tag-cloud">
						<li><a href="#">styles</a></li>
						<li><a href="#">layout</a></li>
						<li><a href="#">letterpress</a></li>
						<li><a href="#">magazine</a></li>
						<li><a href="#">menu</a></li>
						<li><a href="#">metal</a></li>
						<li><a href="#">navigation</a></li>
						<li><a href="#">paper</a></li>
						<li><a href="#">print</a></li>
						<li><a href="#">scripts</a></li>
						<li><a href="#">nodes</a></li>
					</ul>
				</div>
				<!-- widget -->
				<div class="well">
					<strong>Latest Tweets</strong>
					<hr>
					<!-- first tweet -->
					<p><a href="http://twitter.com/heyallanmoreno" target="_blank">@heyallanmoreno</a> When I first started designing interactive products, it was a struggle. Small projects were fine. <a href="#">#WebDesign</a>, <a href="http://goo.gl/jt9KZ" target="_blank">http://goo.gl/jt9KZ</a></p>
					<small>12 Hours Ago</small>
					<hr>
					<!-- second tweet -->
					<p><a href="http://twitter.com/heyallanmoreno" target="_blank">@heyallanmoreno</a> Great talk about dealing with <a href="#">#Clients</a> <a href="#">#ResponsiveDesign</a> and <a href="#">#Photoshop</a> mockups <a href="http://vimeo.com/55339166" target="_blank">http://vimeo.com/55339166</a></p>
					<small>30 Hours Ago</small>
				</div>
				<!-- widget -->
				<div class="well">
					<strong>Slider Widget</strong>
					<hr>
					<div id="widget-carousel" class="carousel slide">
						<!-- Carousel items -->
						<div class="carousel-inner">
							<!-- slide -->
							<div class="active item">
								<a href="#"><img src="assets/post-img.jpeg" alt=""></a>
								<h5><i class="icon icon-external-link"></i> <a href="#">Bespoke Business Solutions</a></h5>
								<p>Modularizing editing tasks. In a new theme we're developing, I decided to look into adding widgets anywhere with shortcodes and it turns out that it isn't that difficult.</p>
							</div>
							<!-- slide -->
							<div class="item">
								<a href="#"><img src="assets/post-img-1.jpeg" alt=""></a>
								<h5><i class="icon icon-external-link"></i> <a href="#">The New Book Is Finally Here!</a></h5>
								<p>Pre-orders are being shipped from Berlin, Germany, by airmail. Due to an unexpected huge amount of pre-orders in the past days, delivery of the new book orders varies depending on region.</p>
							</div>
						</div>
						<!-- Carousel nav -->
						<a class="carousel-control left" href="#widget-carousel" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#widget-carousel" data-slide="next">&rsaquo;</a>
					</div>
				</div>
			</aside><!-- end of sidebar -->
		</div><!-- .row -->
 
	 
<?php get_footer(); ?>