<?php 
$post_format = get_post_format();
is_sticky() ? $sticky_class = ' featured' : $sticky_class = '';
?>
<li>
	<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'.$sticky_class); ?>>

		<?php if($post_format == "quote" ): ?>

		<div class="blog-content quote-post">
			<?php the_excerpt(); ?>
		</div><!-- // .blog-content -->

		<?php else: ?>


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

			<div class="entry-audio">
				<?php echo get_post_meta($post->ID, '_format_audio_embed', true); ?>
			</div><!-- // .post-audio -->

			<?php elseif($post_format == "gallery" ): ?>

			<?php if ( $images = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image' ))){ ?>
			
			<div class="slider flexslider">
				<ul class="slides">
					<?php foreach( $images as $image ) :  ?>
					<li><?php echo wp_get_attachment_image($image->ID,'post',0,array('class'	=> "img-responsive",)); ?></li>
					<?php endforeach; ?>
				</ul>
			</div><!-- // .slider -->

			<?php } ?>

			<?php elseif(has_post_thumbnail()) :  ?>

			<div class="blog-image">
				<div class="blog-mark">
					<div class="blog-mark-content">
						<div class="blog-mark-content-inc">
							<a href="<?php the_permalink();?>" class="readmore"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div><!-- // .blog-mark -->
			
				<a href="<?php the_permalink();?>"> <?php the_post_thumbnail( 'post' ); ?> </a>

			</div>
			
			<?php else : ?>

			<div class="blog-image">
				<div class="blog-mark">
					<div class="blog-mark-content">
						<div class="blog-mark-content-inc">
							<a href="<?php the_permalink();?>" class="readmore"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div><!-- // .blog-mark -->
				
				<a href="<?php the_permalink();?>"><img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/placeholder/700x400.gif" alt="<?php the_title();?>"></a>
			</div>

			<?php endif; ?>
		

		<?php if(is_sticky()): ?>

		<div class="blog-content">
			<div class="blog-info">
				<span>
					<i class="fa fa-calendar"></i>
					<time class="published updated" datetime="<?php echo get_the_date( 'c' );?> ">
						<i class="fa fa-clock-o"></i><?php echo get_the_date(); ?>
					</time>
				</span>
				<span class="author vcard">
					<i class="fa fa-user"></i>
					<a rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="url fn n" data-toggle="tooltip" title="<?php echo esc_attr( sprintf( __( 'View all posts by %s', 'erange' ), get_the_author() ) );?>"><?php echo get_the_author();?></a>
				</span><!-- // .author --> 
			</div><!-- // .blog-info -->
			<div class="blog-title">
				<h3 class="entry-title">
					<a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(__('Permalink to: ','erange')); ?>"><?php the_title();?></a>
				</h3>
			</div>
			<div class="blog-detail bottom-20">
				<?php the_excerpt();?>
			</div>
			<a class="readmore button medium" href="<?php the_permalink();?>"><?php _e('Read more','erange');?></a>
		</div><!-- // .blog-content -->

		<?php else: ?>
		
		<div class="blog-content">
			<div class="blog-title">
				<h3 class="entry-title bottom-0">
					<a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title(__('Permalink to: ','erange')); ?>"><?php the_title();?></a>
				</h3>
			</div>
			<div class="blog-info">
				<span>
					<i class="fa fa-calendar"></i>
					<time class="published updated" datetime="<?php echo get_the_date( 'c' );?> ">
						<i class="fa fa-clock-o"></i><?php echo get_the_date(); ?>
					</time>
				</span>
				<span class="author vcard">
					<i class="fa fa-user"></i>
					<a rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="url fn n" data-toggle="tooltip" title="<?php echo esc_attr( sprintf( __( 'View all posts by %s', 'erange' ), get_the_author() ) );?>"><?php echo get_the_author();?></a>
				</span><!-- // .author --> 
			</div><!-- // .blog-info -->
		</div><!-- // .blog-item -->

		<?php endif; endif; ?>

	</div><!-- // .blog-item -->
</li>