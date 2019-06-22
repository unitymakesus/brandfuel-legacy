<?php
/**
 * The template for displaying comments.
 *
 * @author 		EverisLabs
 * @package 	Erange
 * @version     1.0
 */

if ( post_password_required() )
	return;
?>

<div id="comments" class="comment-list top-30">

	<?php if ( have_comments() ) : ?>

		<h3 class="sub-heading bottom-20"><?php _e('Comments','erange');?></h3>

		<div class="commet-list-content">
			<ul class="commentlist list-unstyled">
				 <?php wp_list_comments(array( 'callback' => 'erange_comment' )); ?>
			</ul><!-- .comment-list -->
		</div><!-- // .commet-list-content -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'erange' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'erange' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'erange' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

</div><!-- #comments -->

<?php if ( comments_open() ) : ?>
<div id="add-comment" class="comment-form top-30">
	
	<h3 class="sub-heading bottom-20"><?php _e('Add your comment','erange');?></h3>

	<?php
	
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		//Custom Fields
		$fields =  array(
			'author'=> '<div class="row form-input"><div class="col-lg-4 col-md-4"><span class="field"><input name="author" type="text" value="' . __('Name (required)', 'erange') . '" size="30"' . $aria_req . ' /></span></div>',
			
			'email' => '<div class="col-lg-4 col-md-4"><span class="field"><input name="email" type="text" value="' . __('E-Mail (required)', 'erange') . '" size="30"' . $aria_req . ' /></span></div>',
			
			'url' 	=> '<div class="col-lg-4 col-md-4"><span class="field"><input name="url" type="text" value="' . __('Website', 'erange') . '" size="30" /></span></div></div>',
		);

		//Comment Form Args
        $comments_args = array(
			'fields' => $fields,
			'comment_notes_after' => ' ',
			'title_reply'=>'',
			'comment_field' => '<div id="form-input" class="form-input"><textarea id="comment" name="comment" aria-required="true" cols="58" rows="10" tabindex="4"></textarea></div>',
			'label_submit' => __('Submit comment','erange')
		);
		
		// Show Comment Form
		comment_form($comments_args); 
	?>
	
</div><!-- // .comment-form -->
	
<?php endif; ?>