<?php
/**
 * The template for display blog post archive.
 *
 * @author 		EverisLabs
 * @package 	Erange
 * @version     1.0
 */ 
get_header();

if(get_theme_mod( 'select_bloglayout' ) == 'large'):
	$sidebar_layout = get_theme_mod( 'select_blogsidebar' );
	$pagenavi_layout = 'normal';
elseif(get_theme_mod( 'select_bloglayout' ) == 'medium'):
	$sidebar_layout = get_theme_mod( 'select_blogsidebar' );
	$pagenavi_layout = 'medium';
else :
	$sidebar_layout = 'blog-masonry';
	$pagenavi_layout = 'medium inline text-center';
endif;	

?>
		
<div class="container top-30">
	<div class="row" id="<?php echo $sidebar_layout;?>">

		<?php if(get_theme_mod( 'select_bloglayout' ) == 'masonry') : ?>
		<div class="blog-archive-list">
			<div id="masonry">
		<?php else: ?>
		<div id="content" class="col-md-8">
			<div id="blog-archive">
		<?php endif; ?>
				
				<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part('content', get_theme_mod( 'select_bloglayout' ) ? get_theme_mod( 'select_bloglayout' ) : 'large' ); ?>
					
				<?php endwhile; else: ?>
					
					<p><?php _e('No post found !','erange');?></p>
				
				<?php endif; ?>

			</div><!-- // #blog-archive -->
		
			<?php (get_theme_mod( 'select_bloglayout' ) != 'masonry') ? erange_pagenavi('','',$pagenavi_layout) : ''; ?>

		</div><!-- // #content -->
		
		<?php if(get_theme_mod( 'select_bloglayout' ) != 'masonry') : ?>
		<?php get_sidebar();?>
		<?php endif; ?>

	</div><!-- // .row -->

	<?php (get_theme_mod( 'select_bloglayout' ) == 'masonry') ? erange_pagenavi('','',$pagenavi_layout) : ''; ?>

</div><!-- // .container -->

<?php get_footer();?>