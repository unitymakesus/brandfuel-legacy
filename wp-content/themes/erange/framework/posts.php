<?php

/**
 * Custom Expcerpt Length
 *
 * @since Erange 1.0
 */
function erange_excerpt_length( $length ) {
	get_theme_mod('text_excerptlength') ? $lg = get_theme_mod('text_excerptlength') : $lg = 30;
	return $lg;
}
add_filter( 'excerpt_length', 'erange_excerpt_length', 999 );
function erange_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'erange_excerpt_more');

function erange_custom_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

/**
 * Author Box
 *
 * @since Erange 1.0
 */
function er_author_box(){ ?>

	<div class="entry-author clearfix top-30">
		<div class="avatar">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
		</div><!-- // .avatar -->
		<div class="author-info">
			<h4><?php the_author_meta( 'user_nicename' ); ?></h4>
			<p><?php the_author_meta( 'user_description' ); ?></p>
		</div><!-- // .author-info -->
	</div><!-- // .entry-author -->

<?php }

/**
 * Post Sharing
 *
 * @since Erange 1.0
 */

function er_post_share(){ ?>
	
	<div class="entry-share text-center">
		<ul class="social color list-unstyled bottom-0">
			<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo urlencode(get_the_title()); ?>"><i class="fa fa-facebook"></i></a></li>
			<li class="twitter"><a href="http://twitter.com/home?status=<?php echo urlencode(get_the_title()); ?><?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a></li>
			<li class="googleplus"><a href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>"><i class="fa fa-google-plus"></i></a></li>
			<li class="linkedin"><a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php echo urlencode(get_the_title()); ?>"><i class="fa fa-linkedin"></i></a></li>
		</ul><!-- // .social -->
	</div><!-- // .entry-share -->

<?php }
add_action( 'erange_post_share' , 'er_post_share' );

/**
*
* Get next & previous post
*
* @since Erange 1.0
*/
function er_nexpre_post(){
	global $post, $post_id;
	$prev_post = get_adjacent_post(false, '', true);
	if(!empty($prev_post)) {
		$prev_post_out = '<h4 class="bottom-0"><a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">' . $prev_post->post_title . '</a></h4>'; 
	} else {
		$prev_post_out = '<span class="notice">'.__('No previous post', 'ereven').'</span>';
	}

	$next_post = get_adjacent_post(false, '', false);
	if(!empty($next_post)) {
		$next_post_out = '<h4 class="bottom-0"><a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . $next_post->post_title . '</a></h4>'; 
	} else {
		$next_post_out = '<span class="notice">'.__('No next post', 'ereven').'</span>';
	} ?>

	<div class="entry-relate text-center">
		<div class="row">
			<div class="col-md-6" id="prev-post">
				<div class="relate-post">
					<span class="title"><?php _e('Previous Post','erange');?></span>
					<?php echo $prev_post_out; ?>
				</div>
			</div><!-- // .col-md-6 -->
			<div class="col-md-6" id="next-post">
				<div class="relate-post">
					<span class="title"><?php _e('Next Post','erange');?></span>
					<?php echo $next_post_out; ?>
				</div>
			</div><!-- // .col-md-6 -->
		</div><!-- // .row -->
	</div><!-- // .entry-relate -->

<?php }

/**
*
* Icon for post format
*
* @since Erange 1.0
*/

function er_post_format_icon(){ 

	global $post, $post_id;
	$post_format = get_post_format();

	if( has_post_thumbnail() && $post_format == '' ): 

		$out = '<i class="fa fa-camera"></i>';

	elseif( $post_format == "video" ): 

		$out = '<i class="fa fa-video-camera"></i>';

	elseif($post_format == "audio"): 

		$out = '<i class="fa fa-music"></i>';

	elseif($post_format == "gallery" ): 

		$out = '<i class="fa fa-camera"></i>';

	elseif($post_format == "quote"): 

		$out = '<i class="fa fa-quote-left"></i>';

	else: 

		$out = '<i class="fa fa-file-text"></i>';

	endif; 

	return $out;
}

/**
*
* Post Comments
*/
function erange_comment( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div class="comment-body clearfix" id="comment-<?php comment_ID() ?>">
		<div class="avatar">
			<?php echo get_avatar( $comment,$size='70'); ?>
		</div><!-- // .avatar -->

		<div class="comment-text">
			<div class="author">
				<span><?php printf( __( '%s', 'erange'), get_comment_author_link() ) ?></span>
				<time class="comment-date" datetime="<?php echo get_comment_date('c');?>"><?php printf(__('%1$s at %2$s', 'erange'), get_comment_date(),  get_comment_time() ) ?></time>
				<span class="edit-link">
					<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
					<?php edit_comment_link( __( '(Edit)', 'erange'),'  ','' ) ?>
				</span>
			</div><!-- // .author -->

			<div class="text">
				<?php comment_text() ?>
				<?php if ( $comment->comment_approved == '0' ) : ?>
		        	<em><?php _e( 'Your comment is awaiting moderation.', 'erange' ) ?></em>
		      	<?php endif; ?>
			</div><!-- // .text -->

		</div><!-- // .comment-text -->
	</div><!-- // .commentbody -->
<?php
}

/**
*
* Remove Images Width & Height Tag 
*
*/
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}