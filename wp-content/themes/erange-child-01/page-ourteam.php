<?php
/***
   Template Name: Our Team
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


	<div id="content">

		<?php
		/***
		   Template Name: Our Team
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

			<div id="content">

				<?php
					global $wp_query;
					$args = array(
						'post_type' 		=> 'team',
						'posts_per_page' 	=> -1,
						'post_status' 		=> 'publish',
						'orderby' 			=> 'title',
						'order' 			=> 'ASC',
					);
					$wp_query = new WP_Query($args);
				?>

			<?php while ( have_posts() ) : the_post();?>

			<div class="col-md-<?php echo get_theme_mod( 'select_portfolio_archive' ) ? get_theme_mod( 'select_portfolio_archive' ) : 4;?> col-sm-6 col-xs-12 bottom-30">
				<div class="team-member clearfix ">
					<a href="<?php echo get_permalink( $post->ID ); ?>">
						<div class="avatar">
							<img src="<?php echo get_the_post_thumbnail_url( $post_id, 'large' ); ?>" alt="" class="img-responsive">
						</div>
						<div class="team-member-info">
							<h4 class="heading bottom-0"><?php echo the_title(); ?></h4>
						</div>
					</a>
				</div>
				<br>
			</div>

			<?php endwhile; ?>

		</div><!-- // end row -->
	</div><!-- // #content -->


	<?php erange_pagenavi('','','medium'); wp_reset_query();?>

</div><!-- // .bottom-30 -->
<?php get_footer();?>
