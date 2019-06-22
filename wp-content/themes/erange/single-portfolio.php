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

<div id="page">

	<div class="container">

		<?php while ( have_posts() ) : the_post(); ?>

		<div class="row">
			<div class="col-md-8 bottom-sm-30">

				<?php if(rwmb_meta( 'erange_project_images', 'type=file' )) :?>

				<div class="portfolio-heading bottom-30">
					<div class="slider flexslider">
						<ul class="slides">
							<?php
								$count = '';
								$out = '';     
								$portfolio_images = rwmb_meta( 'erange_project_images', 'type=file' );
								foreach ( $portfolio_images as $slides ) {
									if($slides['url'] != '')
										$out .=  '<li><img src="'.$slides['url'].'" alt=""/></li>';
									$count++;
								};
								echo $out;
							?>
						</ul><!-- // .slides -->
					</div><!-- // .slider -->
				</div><!-- // .portfolio-heading -->

				<?php endif; ?>

				<div class="portfolio-content">

					<h4 class="large bottom-20"><?php the_title();?></h4>
					
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'erange' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

				</div><!-- // .portfolio-content -->

			</div><!-- // end column -->

			<div class="col-md-4">
				<div class="portfolio-sub-info bottom-30">

					<div class="portfolio-sub-info-list">
						<ul class="bottom-0 list-unstyled">

							<li>
								<span class="title"><?php _e('published','erange');?></span>
								<span class="value"><?php echo get_the_date();?></span>
							</li>

							<?php if(erange_custom_taxonomies_terms_links('portfolio_category')):?>
							<li class="clearfix">
								<span class="title">
									<?php _e('Categories','erange');?>
								</span>
								<span class="value">
									<?php echo erange_custom_taxonomies_terms_links('portfolio_category');?>
								</span>
							</li>
							<?php endif; ?>

							<?php if(erange_custom_taxonomies_terms_links('portfolio_tag')):?>
							<li class="clearfix">
								<span class="title">
									<?php _e('Tags','erange');?>
								</span>
								<span class="value">
									<?php echo erange_custom_taxonomies_terms_links('portfolio_tag');?>
								</span>
							</li>
							<?php endif; ?>

							<?php if(rwmb_meta('erange_project_release_date')): ?>
							<li class="clearfix">
								<span class="title">
									<?php _e('Release Date','erange');?>
								</span>
								<span class="value">
									<?php echo rwmb_meta('erange_project_release_date');?>
								</span>
							</li>
							<?php endif; ?>

							<?php if(rwmb_meta('erange_project_author')): ?>
							<li class="clearfix">
								<span class="title">
									<?php _e('Author','erange');?>
								</span>
								<span class="value">
									<?php echo rwmb_meta('erange_project_author');?>
								</span>
							</li>
							<?php endif; ?>

							<?php if(rwmb_meta('erange_project_partner')): ?>
							<li class="clearfix">
								<span class="title">
									<?php _e('Partner','erange');?>
								</span>
								<span class="value">
									<?php echo rwmb_meta('erange_project_partner');?>
								</span>
							</li>
							<?php endif;?>

							<?php if(rwmb_meta('erange_project_customer')): ?>
							<li class="clearfix">
								<span class="title">
									<?php _e('Customer','erange');?>
								</span>
								<span class="value">
									<?php echo rwmb_meta('erange_project_customer');?>
								</span>
							</li>
							<?php endif; ?>

							<?php echo rwmb_meta('erange_project_custom_field') ? apply_filters( 'the_content', rwmb_meta('erange_project_custom_field') ) : '' ; ?>

						</ul>
					</div><!-- // .portfolio-sub-info-list -->

				</div><!-- // .portfolio-sub-info -->

				<div class="portfolio-action">
					<div class="portfolio-action-inner">
						<ul class="list-unstyled bottom-0">
							<li><?php echo getPostLikeLink(get_the_ID()); ?></li>
							<?php if(rwmb_meta('erange_project_link')): ?>
							<li><a href="<?php echo rwmb_meta('erange_project_link'); ?>"><i class="fa fa-external-link"></i><?php _e('View this projects','erange');?></a></li>
							<?php endif; ?>
							<?php if(get_theme_mod( 'text_portfolio_new_project_url' )):?>
							<li><a href="<?php echo get_theme_mod( 'text_portfolio_new_project_url' );?>"><i class="fa fa-briefcase"></i><?php _e('Create new project','erange');?></a></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>

			</div><!-- // end column -->
		</div><!-- // .row -->

		<?php endwhile; ?>

	</div><!-- // .container -->

	<?php
		$relates_project = array(   
	    	'post__not_in' => array($post->ID),
	    	'showposts'=> 9,
	    	'post_type' => 'portfolio'
	    );
	    $relates = new WP_Query( $relates_project );
	    if($relates->have_posts()) :
	?>

	<div class="divider top top-30 bottom-30"></div>

	<div id="recent-projects" class="carouselbox">
		<div class="container">
			<div class="row">
				<div class="col-md-3 bottom-sm-30">
					<div class="heading-area">
						<h5 class="large bottom-0 heading-title"><?php echo get_theme_mod( 'text_portfolio_recent_heading' ) ? get_theme_mod( 'text_portfolio_recent_heading' ) : __('Recent <span>Projects</span>','erange');?></h5>
						<h6 class="heading-subtitle bottom-20"><?php echo get_theme_mod( 'text_portfolio_recent_subheading' ) ? get_theme_mod( 'text_portfolio_recent_subheading' ) : __('same project you are viewing','erange');?></h6>
					</div><!-- // .heading-area -->

					<p><?php echo get_theme_mod( 'text_portfolio_recent_desc' );?></p>
				
					<div class="carouselbox nav">
						<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
						<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
					</div><!-- // .carouselbox -->

				</div><!-- // end column -->

				<div class="col-md-9">
					<div class="row">
						<ul class="carousel-area list-unstyled bottom-0">

							<?php while($relates->have_posts()):$relates->the_post();?>
							<li>
								<?php get_template_part('content', 'portfolio' ); ?>
							</li><!-- // end li -->
							<?php endwhile; ?>
							
						</ul><!-- // .carousel-area -->
					</div><!-- // .row -->
				</div><!-- // end column -->
				
			</div><!-- // .row -->
		</div><!-- // .container -->
	</div><!-- // .carouselbox -->

	<?php endif; ?>

</div><!-- // #content -->

<?php get_footer(); ?>