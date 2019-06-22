	</div><!-- // #main -->
	
	<footer id="footer" class="top-30" role="contentinfo">

		<?php if(is_page() && rwmb_meta('erange_page_above_footer_content')) echo do_shortcode(rwmb_meta('erange_page_above_footer_content')); ?>
		
		<div class="widgetarea">
			<div class="container">

				<?php 
					$total_column = array_sum(array(get_theme_mod('footer_widget_1_width'),get_theme_mod('footer_widget_2_width'),get_theme_mod('footer_widget_3_width'),get_theme_mod('footer_widget_4_width')));
					if($total_column <= 12):
				?>

				<div class="row">
					
					<?php if(get_theme_mod('footer_widget_1_width') != 'Disable' ) : ?>
			        <div id="footer-widget-1" class="bottom-sm-30 col-sm-6 col-md-<?php echo get_theme_mod('footer_widget_1_width');?>">
			          <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 1')); ?>
			        </div><!-- // #footer-widget-1 -->
			        <?php endif; ?>

			        <?php if(get_theme_mod('footer_widget_2_width') != 'Disable' ) : ?>
			        <div id="footer-widget-2" class="bottom-sm-30 col-sm-6 col-md-<?php echo get_theme_mod('footer_widget_2_width');?>">
			          <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 2')); ?>
			        </div><!-- // #footer-widget-2 -->
			        <?php endif; ?>

			        <?php if(get_theme_mod('footer_widget_3_width') != 'Disable' ) : ?>
			        <div id="footer-widget-3" class="bottom-sm-30 col-sm-6 col-md-<?php echo get_theme_mod('footer_widget_3_width');?>">
			          <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 3')); ?>
			        </div><!-- // #footer-widget-3 -->
			        <?php endif; ?>
			        
			        <?php if(get_theme_mod('footer_widget_4_width') != 'Disable' ) : ?>
			        <div id="footer-widget-4" class="bottom-sm-30 col-sm-6 col-md-<?php echo get_theme_mod('footer_widget_4_width');?>">
			          <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 4')); ?>
			        </div><!-- // #footer-widget-4 -->
			        <?php endif; ?>

				</div><!-- // .row -->

				<?php else: ?>

     			<p><?php _e('Wrong setting for footer columns widget. Please make sure total columns width not bigger than 12.','erange');?></p>

      			<?php endif; ?>

			</div><!-- // .container -->
		</div><!-- // .widgetarea -->

		<?php if(get_theme_mod( 'select_footer_row' ) == 'two') : ?>

		<div class="widgetarea second">
			<div class="container">
				
				<?php 
					$total_column = array_sum(array(get_theme_mod('footer_widget_5_width'),get_theme_mod('footer_widget_6_width'),get_theme_mod('footer_widget_7_width'),get_theme_mod('footer_widget_8_width')));
					if($total_column <= 12):
				?>

				<div class="row">
					
					<?php if(get_theme_mod('footer_widget_5_width') != 'Disable' ) : ?>
			        <div id="footer-widget-5" class="bottom-sm-30 col-sm-6 col-md-<?php echo get_theme_mod('footer_widget_5_width');?>">
			          <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 5')); ?>
			        </div><!-- // #footer-widget-1 -->
			        <?php endif; ?>

			        <?php if(get_theme_mod('footer_widget_6_width') != 'Disable' ) : ?>
			        <div id="footer-widget-6" class="bottom-sm-30 col-sm-6 col-md-<?php echo get_theme_mod('footer_widget_6_width');?>">
			          <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 6')); ?>
			        </div><!-- // #footer-widget-2 -->
			        <?php endif; ?>

			        <?php if(get_theme_mod('footer_widget_7_width') != 'Disable' ) : ?>
			        <div id="footer-widget-7" class="bottom-sm-30 col-sm-6 col-md-<?php echo get_theme_mod('footer_widget_7_width');?>">
			          <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 7')); ?>
			        </div><!-- // #footer-widget-3 -->
			        <?php endif; ?>
			        
			        <?php if(get_theme_mod('footer_widget_8_width') != 'Disable' ) : ?>
			        <div id="footer-widget-8" class="bottom-sm-30 col-sm-6 col-md-<?php echo get_theme_mod('footer_widget_8_width');?>">
			          <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer 8')); ?>
			        </div><!-- // #footer-widget-4 -->
			        <?php endif; ?>

				</div><!-- // .row -->

				<?php else: ?>

     			<p><?php _e('Wrong setting for footer columns widget of second row. Please make sure total columns width not bigger than 12.','erange');?></p>

      			<?php endif; ?>

			</div><!-- // .container -->
		</div><!-- // .widgetarea -->

		<?php endif; ?>

		<div class="credit">
			<div<?php erange_layout_format_div();?>>
				<div class="row">
					<div class="col-md-6 col-sm-6" style="width:100%;">

						<span>
							<?php echo get_theme_mod('textarea_copyright') ? do_shortcode(get_theme_mod('textarea_copyright')) : 'Design by <a target="_blank" href="https://everislabs.com">EverisLabs</a>. Powered by <a target="_blank" href="http://wordpress.org">WordPress</a>.';?>
						</span><!-- // end span -->

					</div><!-- // .row -->
					<div class="col-md-6 col-sm-6 text-right creditlink">
						<nav>
							<?php 
							wp_nav_menu( array(
								'theme_location'  => 'footer',
								'container'       => 'ul', 
								'menu_class' => 'list-unstyled bottom-0 links', 
								'depth'           => 1 ) );
							?>
						</nav><!-- // nav -->
					</div><!-- // end column -->

				</div><!-- // .container -->
			</div><!-- // .container -->
		</div><!-- // .credit -->

	</footer><!-- // #footer -->
	
	<!-- // Respinsive Menu -->
	<a href="#mobile-menu" class="responsive-menu visible-xs visible-sm button pull-right color"><i class="fa fa-bars"></i></a>

	<div id="mobile-menu">
		<span class="menu-content"></span>
	</div><!-- // #mobile-menu -->

</div><!-- // #wrap -->

<?php wp_footer(); ?>

</body>
</html>