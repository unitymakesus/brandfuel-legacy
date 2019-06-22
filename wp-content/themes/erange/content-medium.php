<?php $post_format = get_post_format(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class('entry-item medium'); ?>>
	<div class="row">

		<div class="col-md-6">
			<div class="media-area">
				<div class="entry-boxinfo">
					<div class="entry-icon">
						<?php echo er_post_format_icon(); ?>
					</div><!-- // .entry-icon -->
					<div class="entry-date">
						<span class="date"><?php echo get_the_date('d');?></span>
						<span class="month"><?php echo get_the_date('M');?></span>
					</div><!-- // .entry-date -->
				</div><!-- // .entry-boxinfo -->
			
				<?php if( $post_format == "video" && get_post_meta($post->ID, '_format_video_embed', true) ): ?>
				
				<div class="entry-video">
					<div class="entry-video bottom-20">
			
						<div class="entry-video-mark">
							<a class="popup-vimeo" href="<?php echo erange_get_video_link(get_post_meta($post->ID, '_format_video_embed', true),'link');?>">
								<span class="icon">
									<i class="fa fa-play"></i>
								</span>
							</a><!-- // .popup-vimeo -->
						</div><!-- // .entry-videmo-mark -->

						<?php echo erange_get_video_link(get_post_meta($post->ID, '_format_video_embed', true));?>
					</div>
				</div>
				
				<?php elseif($post_format == "audio" && get_post_meta($post->ID, '_format_audio_embed', true)): ?>

				<div class="entry-audio bottom-20">
					<?php echo get_post_meta($post->ID, '_format_audio_embed', true); ?>
				</div><!-- // .post-audio -->

				<?php elseif($post_format == "gallery" ): ?>

				<?php if ( $images = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image' ))){ ?>
				
				<div class="entry-slider bottom-20">
					<div class="slider flexslider">
						<ul class="slides">
							<?php foreach( $images as $image ) :  ?>
							<li><?php echo wp_get_attachment_image($image->ID,'post',0,array('class'	=> "img-responsive",)); ?></li>
							<?php endforeach; ?>
						</ul>
					</div><!-- // .slider -->
				</div>

				<?php } else { ?>

				<div class="entry-media bottom-20">
				
					<a href="<?php the_permalink();?>"> <?php the_post_thumbnail( 'post' ); ?> </a>

				</div>
				
				<?php } ?>

				<?php elseif($post_format == "quote" ): ?>

				<div class="entry-quotes bottom-20">
					<?php the_excerpt(); ?>
				</div><!-- // .entry-quotes -->

				<?php elseif(has_post_thumbnail()) :  ?>

				<div class="entry-media bottom-20">
				
					<a href="<?php the_permalink();?>"> <?php the_post_thumbnail( 'post' ); ?> </a>

				</div>
				
				<?php else : ?>

				<div class="entry-media bottom-20">
				
					<a href="<?php the_permalink();?>"><img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/placeholder/700x400.gif" alt="<?php the_title();?>"></a>

				</div>
				
				<?php endif; ?>

			
			</div><!-- // .media-area -->
		</div><!-- // end column -->
		
		<div class="col-md-6">
			<div class="entry-heading">
				<h3 class="entry-title large">
					<a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(__('Permalink to: ','erange')); ?>"><?php the_title();?></a>
				</h3>
			</div><!-- // .entry-heading -->
			<div class="entry-summary">
				<?php the_excerpt(); ?>
<a href="<?php the_permalink();?>" class="exreadmore">Read More</a>
			</div><!-- // .entry-summary -->
		</div><!-- // end column -->
		
	</div><!-- // .row -->

	<div class="entry-info">
		<span>
			<?php _e('This entry was posted by','erange');?>
			<strong class="author vcard">
				<a rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="url fn n" data-toggle="tooltip" title="<?php echo esc_attr( sprintf( __( 'View all posts by %s', 'erange' ), get_the_author() ) );?>"><?php echo get_the_author();?></a>
			</strong><!-- // .author --> 
			<?php _e('on','erange');?> <?php the_category(', ');?>
		</span>
	</div><!-- // .entry-info -->
	
</div><!-- // .entry-item -->