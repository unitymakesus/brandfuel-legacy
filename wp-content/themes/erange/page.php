<?php 
/**
 * The template for displaying blog content.
 *
 * @author 		EverisLabs
 * @package 	Erange
 * @version     1.0
 */

get_header();
if(rwmb_meta('erange_page_sidebar') == 'fullwidth' && rwmb_meta('erange_force_fw') == 1 ){
	$class = '';
} else {
	$class = 'container ';
}
?>

<div class="<?php echo $class;?>top-30">
	<div class="row" id="<?php echo rwmb_meta('erange_page_sidebar') ? rwmb_meta('erange_page_sidebar') : 'content-sidebar';?>">
		
		<div id="content" class="col-md-<?php echo rwmb_meta('erange_page_sidebar') != 'fullwidth' ? 8 : 12;?> bottom-sm-30">

			<?php while ( have_posts() ) : the_post(); ?>
	
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'erange' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

			<?php endwhile; ?>

		</div><!-- // #content -->

		<?php if(rwmb_meta('erange_page_sidebar') != 'fullwidth'):?>
			<?php get_sidebar();?>
		<?php endif;?>

	</div><!-- // .row -->
</div><!-- // .container -->

<?php
get_footer();
?>