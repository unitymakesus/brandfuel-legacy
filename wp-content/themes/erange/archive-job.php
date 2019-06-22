<?php 
/**
 * The template for displaying job content.
 *
 * @author 		EverisLabs
 * @package 	Erange
 * @version     1.0
 */

get_header();
?>

<div class="container top-30">
	
	<div class="row" id="<?php echo $sidebar_layout;?>">

		<div id="content" class="col-md-8">

			<?php while ( have_posts() ) : the_post();?>

			<div class="job-item bottom-30">

				<?php get_template_part('content', 'job' ); ?>

			</div>

			<?php endwhile; ?>

		</div><!-- // #content -->

		<?php get_sidebar();?>

	</div><!-- // .row -->
</div><!-- // .container -->

<?php get_footer();?>