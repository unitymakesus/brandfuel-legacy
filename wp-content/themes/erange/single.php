<?php 
/**
 * The template for displaying blog content.
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

				<div class="entry-boxinfo">
					<div class="entry-icon">
						<?php echo er_post_format_icon(); ?>
					</div><!-- // .entry-icon -->
					<div class="entry-date">
						<span class="date"><?php echo get_the_date('d');?></span>
						<span class="month"><?php echo get_the_date('M');?></span>
					</div><!-- // .entry-date -->
				</div><!-- // .entry-boxinfo -->

				<div class="entry-header">
					
					<div class="entry-media bottom-20">
						
						<?php if( $post_format == "video" && get_post_meta($post->ID, '_format_video_embed', true) ): ?>
					
						<div class="entry-video">
							<?php echo get_post_meta($post->ID, '_format_video_embed', true); ?>
						</div>
						
						<?php elseif($post_format == "audio" && get_post_meta($post->ID, '_format_audio_embed', true)): ?>

						<div class="entry-audio bottom-20">
							<?php echo get_post_meta($post->ID, '_format_audio_embed', true); ?>
						</div><!-- // .post-audio -->

						<?php elseif($post_format == "gallery" ): ?>

						<?php if ( $images = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image' ))){ ?>
						
						<div class="slider flexslider">
							<ul class="slides">
								<?php foreach( $images as $image ) :  ?>
								<li><?php echo wp_get_attachment_image($image->ID,'post'); ?></li>
								<?php endforeach; ?>
							</ul>
						</div><!-- // .slider -->

						<?php } else { ?>
						
						<a href="<?php the_permalink();?>"> <?php the_post_thumbnail( 'post' ); ?> </a>
						
						<?php } ?>

						<?php elseif($post_format == "quote" ): ?>

						<div class="entry-quotes bottom-20">
							<?php the_excerpt(); ?>
						</div><!-- // .entry-quotes -->

						<?php elseif(has_post_thumbnail()) :  ?>
						
						<a href="<?php the_permalink();?>"> <?php the_post_thumbnail( 'post' ); ?> </a>
						
						<?php else : ?>
						
						<a href="<?php the_permalink();?>"><img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/placeholder/700x400.gif" alt="<?php the_title();?>"></a>
						
						<?php endif; ?>

					</div><!-- // .entry-media -->

					<div class="entry-heading">
						<h3 class="entry-title large">
							<?php the_title();?>
						</h3>
					</div><!-- // .entry-heading -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'erange' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- // .entry-content -->
<div style="clear:both"></div>
					<div class="entry-meta text-center top-30">
						<div class="row">
							<div class="col-md-6" id="meta-tags">
								<div class="entry-meta-group">
									<span><?php _e('Tags','erange');?></span>
									<div class="meta-content">
										<?php if(has_tag()) : ?>
										<?php the_tags(' ', ' '); ?>
										<?php else: ?>
										<span><?php _e('No tags found','erange');?></span>
										<?php endif ; ?>
									</div>
								</div><!-- //.entry-meta-group -->
							</div><!-- // .col-md-6 -->
							<div class="col-md-6" id="meta-cat">
								<div class="entry-meta-group">
									<span><?php _e('Category','erange');?></span>
									<div class="meta-content">
										<?php the_category(' '); ?>
									</div>
								</div><!-- // .entry-meta-group -->
							</div><!-- // .col-md-6 -->
						</div><!-- // .row -->
					</div><!-- // .entry-meta -->

					<?php get_theme_mod('check_sharebox') ? er_post_share() : ''; ?>

					<?php er_nexpre_post(); ?>
					
					<?php get_theme_mod('check_authorbox') ? er_author_box() : ''; ?>

					<?php if(get_theme_mod('check_disable_post_comment') == 0) comments_template(); ?>

				</div><!-- // .entry-header -->
			</div><!-- // .entry-item -->

			<?php endwhile; ?>

		</div><!-- // #content -->

		<?php get_sidebar(); ?>
		
	</div><!-- // .row -->
</div><!-- // .container -->

<?php
get_footer();
?>