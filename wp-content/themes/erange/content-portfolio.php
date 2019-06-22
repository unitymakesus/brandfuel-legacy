<div class="portfolio-item">
	<div class="portfolio-mark">
		<div class="portfolio-mark-content">
			<div class="portfolio-mark-inner">
				<div class="portfolio-mark-icon">
					<span class="icon"><i class="fa fa-camera"></i></span>
					<span class="likes"><i class="fa fa-heart"></i><?php echo get_post_meta( get_the_id(), "_post_like_count", true ) ? get_post_meta( get_the_id(), "_post_like_count", true ) : 0; ?></span>
				</div>
				<h4 class="bottom-0"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
				<?php echo erange_custom_taxonomies_terms_links('portfolio_category');?>
			</div><!-- // .portfolio-mark-inner -->
		</div><!-- // .portfolio-mark-content -->
	</div><!-- // .portfolio-item -->

	<div class="portfolio-img">
		<?php the_post_thumbnail('portfolio');?>
	</div>
</div><!-- // .portfolio-item -->