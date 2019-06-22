<div id="job-<?php the_ID(); ?>" <?php post_class('entry-item'); ?>>

	<div class="entry-heading">
		<h3 class="entry-title large bottom-10">
			<a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a>
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

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

</div>