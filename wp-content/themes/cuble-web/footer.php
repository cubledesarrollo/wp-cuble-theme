</div><!-- /.container (page container)-->

	<footer>
		<div class="container">
			<!-- row of widgets -->
			<div class="row">
				<div class="span3">
					<h4><?php _e("Nosotros", 'cuble')?></h4>
					<p>Technology should be about more than newest, loudest, prettiest. It should make a difference.. <a href="#">Aenean</a> nisl orci, condimentum.</p>
					<p>We take what’s familiar and look at it in a new light. Our team focuses on making technology that’s simple, fresh and helpful.</p>
				</div> <!-- /.span3 -->

				<hr class="visible-phone">
				
				<div class="span3">
					<h4><?php _e("Enlaces", 'cuble')?></h4>
					<?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
				</div><!-- /.span3 -->

				<hr class="visible-phone">
				
				<div class="span3">
					<h4><?php _e('Etiquetas populares', 'cuble')?></h4>
				    <?php wp_tag_cloud(array('orderby' => 'count', 
				            'number' => 10,
				            'format' => 'list')); ?>
				</div><!-- /.span3 -->

				<hr class="visible-phone">
				
				<div class="span3">
					<h4><?php _e('Suscríbete en nuestro newletter', 'cuble')?></h4>
					<?php do_action('cuble_mailchimpSF_signup_form'); ?>
				</div> <!-- /.span3 -->
			</div> <!-- /.row -->
		</div><!-- /.container -->

		<div class="bottom-line">
			<div class="container">
				<p class="pull-right"><a href="#"><?php _e("Ir arriba")?></a></p>
				<p>&copy; <?php echo date('Y')?> Cuble Desarrollo S.L. | <a href="http://www.twitter.com/cuble_es"><i class="icon icon-twitter"></i></a> | <a href="http://www.facebook.com/cuble.es"><i class="icon icon-facebook"></i></a> | <a href="https://plus.google.com/114449356144896554020/"><i class="icon icon-google-plus"></i></a></p>
			</div>
		</div>
	</footer>

	<!-- last but not least the javascript -->
	<?php wp_footer(); ?>
	<script>
		$(document).ready(function(){
			//bootstrap tooltip trigger
			$('[rel="tooltip"]').tooltip();
		});
	</script>

	<?php if (is_post_type_archive('projects')):?>
	<script>
		$(document).ready(function(){
			// bootstrap tooltip trigger
			$('[rel="tooltip"]').tooltip();

			// fancybox gallery
			$("a.js-fancybox").fancybox({
				'transitionIn'  :   'elastic',
				'transitionOut' :   'elastic',
				'speedIn'       :   600, 
				'speedOut'      :   200, 
				'overlayShow'   :   true
			});
		});

		// initialize Isotope inside $(window).load() instead of $(document).ready()
		// because Isotope needs to measure media size to avoid items overlapping
		$(window).load(function(){
			// isotope filter setup
			var $container = $(".portfolio");
			$container.isotope({
				filter: "*",
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false,
				}
			});
			// isotope filter button
			$(".filter a").click(function(){
				var selector = $(this).attr('data-filter');
				$container.isotope({ 
					filter: selector,
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false,
					}
				});
				return false;
			});
			// filter button behavior
			var $optionSets = $('.filter'),
			$optionLinks = $optionSets.find('a');
			$optionLinks.click(function(){
				var $this = $(this);
				// don't proceed if already selected
				if ( $this.hasClass('active') ) {
					return false;
				}
				// add active class to selected filter button
				var $optionSet = $this.parents('.filter');
				$optionSet.find('.active').removeClass('active');
				$this.addClass('active');
			});
		});
	</script>
	<?php elseif ( is_single() ): ?>
	<script>
		$(document).ready(function(){
			//bootstrap tooltip trigger
			$('[rel="tooltip"]').tooltip();
			$('.comment-form').collapse();
		});
		$('input#submit').addClass('btn');
	</script>
	<?php endif; ?>
	
	</body>
</html>