<?php
/***
   Template Name: Blog Archive
 *
 * The template for displaying custom archive of portfolio .
 *
 * @author 		EverisLabs
 * @package 	Erange
 * @version     1.0
 */ 
get_header();

$layout = rwmb_meta('erange_post_archive');
if($layout == 'large'):
	$sidebar_layout = get_theme_mod( 'select_blogsidebar' );
	$pagenavi_layout = 'normal';
elseif($layout == 'medium'):
	$sidebar_layout = get_theme_mod( 'select_blogsidebar' );
	$pagenavi_layout = 'medium';
else :
	$sidebar_layout = 'blog-masonry';
	$pagenavi_layout = 'medium inline text-center';
endif;	

?>
		
<div class="container top-30">
	<div class="row" id="<?php echo $sidebar_layout;?>">

		<?php if($layout == 'masonry') : ?>
		<div class="blog-archive-list">
			<div id="masonry">
		<?php else: ?>
		<div id="content" class="col-md-8">
			<div id="blog-archive">

		<?php endif;  ?>
				
				<?php
					global $wp_query;
					$paged = get_query_var('paged') ? get_query_var('paged') : 1;
					$args = array(
						'posts_per_page' 	=> 10,
						'post_status' 		=> 'publish',
						'orderby' 			=> 'date',
						'order' 			=> 'DESC',
						'paged' 			=> $paged
					);
					$wp_query = new WP_Query($args);
					if($wp_query->have_posts()) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
			?>
					
					<?php get_template_part('content', $layout ? $layout : 'large' ); ?>
					
				<?php endwhile; endif; ?>

			</div><!-- // #blog-archive -->
		
			<?php ($layout != 'masonry') ? erange_pagenavi('','',$pagenavi_layout) : ''; ?>

		</div><!-- // #content -->
		
		<?php if($layout != 'masonry') : ?>
		<?php get_sidebar();?>
		<?php endif; ?>

	</div><!-- // .row -->

	<?php ($layout == 'masonry') ? erange_pagenavi('','',$pagenavi_layout) : ''; ?>

</div><!-- // .container -->

<?php get_footer();?>