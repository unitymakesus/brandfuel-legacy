<?php 
/**
 * The template for displaying portfolio content.
 *
 * @author 		EverisLabs
 * @package 	Erange
 * @version     1.0
 */

get_header();
?>

<div class="container">

	<div class="portfolio-title-area title-area bottom-30">
		<?php if(term_description()):?>
		<h4 class="heading-subtitle bottom-0"><?php echo term_description(); ?></h4>
		<?php endif; ?>
		<h3 class="large bottom-0 heading-title"><span class="portfolio-category-title"><?php single_cat_title();?></span></h3>
	</div><!-- // .portfolio-title-area -->

	<div class="row">

		<?php while ( have_posts() ) : the_post();?>

		<div class="col-md-<?php echo get_theme_mod( 'select_portfolio_archive' ) ? get_theme_mod( 'select_portfolio_archive' ) : 4;?> col-sm-6 col-xs-12 bottom-30">

			<?php get_template_part('content', 'portfolio' ); ?>

		</div>

		<?php endwhile; ?>

	</div><!-- // .row -->
</div><!-- // .container -->

<?php get_footer();?>