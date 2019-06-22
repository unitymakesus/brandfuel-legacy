<?php 
/**
 * The template for displaying job content.
 *
 * @author 		EverisLabs
 * @package 	Erange
 * @version     1.0
 */

get_header();
$post_format = get_post_format();
?>

<div class="container top-30" id="blog-archive">
	<div class="row" id="<?php echo rwmb_meta('erange_page_sidebar') ? rwmb_meta('erange_page_sidebar') : 'content-sidebar';?>">
		
		<div id="content" class="col-md-8 bottom-sm-30">

			<?php while ( have_posts() ) : the_post(); ?>
	
			<div class="entry-item">

				<div class="entry-heading">
					<h3 class="entry-title large bottom-10">
						<?php the_title();?>
					</h3>
				</div><!-- // .entry-heading -->

				<div class="job-meta">
					<span class="type">
						<?php echo erange_custom_taxonomies_terms_links('job_type');?>
					</span>
					<span class="category">
						<i class="fa fa-folder-open-o icon-left"></i><?php echo erange_custom_taxonomies_terms_links('job_category');?>
					</span>
					<span class="place">
						<i class="fa fa-map-marker icon-left"></i><?php echo erange_custom_taxonomies_terms_links('job_place');?>
					</span>
				</div>

				<div class="entry-content bottom-30">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'erange' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
				</div><!-- // .entry-content -->
				
				<?php if(rwmb_meta('erange_contact_form7_code')): ?>
				<div class="job-apply">
					<h3 class="title bottom-0"><?php _e('Quick Apply','erange');?></h3>
					<div class="job-apply-form">
						<?php echo do_shortcode(rwmb_meta('erange_contact_form7_code')); ?>
					</div>
				</div>
				<?php endif; ?>
			</div><!-- // .entry-item -->

			<?php endwhile; ?>

		</div><!-- // #content -->
	</div><!-- // .row -->
</div><!-- // .container -->

<?php
get_footer();
?>