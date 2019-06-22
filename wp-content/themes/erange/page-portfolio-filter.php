<?php
/***
   Template Name: Portfolio
 *
 * The template for displaying custom archive of portfolio .
 *
 * @author 		EverisLabs
 * @package 	Erange
 * @version     1.0
 */
get_header();
$p_columns = rwmb_meta('erange_portfolio_columns') ? rwmb_meta('erange_portfolio_columns') : 4;
?>

<div class="container top-30">
	
	<?php while ( have_posts() ) : the_post(); if (!empty( $post->post_content)) :?>
	<div class="entry-content bottom-30">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'erange' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div>
	<?php endif;endwhile;wp_reset_postdata();wp_reset_query(); ?>

	
	<div id="content">

		<?php
			global $wp_query;
			$portfolioitems = rwmb_meta('erange_portfolio_item_per_page'); // Get Items per Page Value
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$args = array(
				'post_type' 		=> 'portfolio',
				'posts_per_page' 	=> $portfolioitems,
				'post_status' 		=> 'publish',
				'orderby' 			=> 'date',
				'order' 			=> 'DESC',
				'paged' 			=> $paged
			);
			$wp_query = new WP_Query($args);
		?>
		
		<?php if(rwmb_meta('erange_portfolio_enable_filter') == 1 ):?>
			<div class="portfolio-title-area title-area bottom-30">
				<h4 class="heading-subtitle bottom-0"><?php _e('some projects we had finished','erange');?></h4>
				<h3 class="large bottom-0 heading-title"><span class="portfolio-category-title"><?php _e('Portfolio','erange');?></span></h3>
			</div><!-- // .portfolio-title-area -->
		<?php endif; ?>

		<div class="row <?php if(rwmb_meta('erange_portfolio_enable_filter') == 1 ):?> portfolio-filter<?php endif;?>">

			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

			<div class="col-md-<?php echo $p_columns ;?> col-sm-6 col-xs-6 element bottom-30 <?php echo erange_custom_taxonomies_terms_slug('portfolio_category');?>">
				<?php get_template_part('content', 'portfolio' ); ?>
			</div><!-- // .portfolo-item -->
			
			<?php endwhile;?>

		</div><!-- // end row -->
	</div><!-- // #content -->

	
	<?php erange_pagenavi('','','medium'); wp_reset_query();?>

</div><!-- // .bottom-30 -->
<?php get_footer();?>