<?php
/**
 * eNews and Updates Wigets
 *
 * @since 1.0
 */
class Erange_eNews_Updates extends WP_Widget {

	protected $defaults;
	
	function __construct() {

		$this->defaults = array(
			'title'       => '',
			'text'        => '',
			'id'          => '',
			'input_text'  => '',
			'button_text' => '',
		);

		$widget_ops = array(
			'classname'   => 'enews-widget',
			'description' => __( 'Displays Feedburner email subscribe form', 'erange' ),
		);

		$this->WP_Widget( 'enews', __( 'Erange - eNews and Updates', 'erange' ), $widget_ops );

	}

	function widget( $args, $instance ) {

		extract( $args );

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget . '<div class="enews-content">';

			if ( ! empty( $instance['title'] ) )
				echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;

			echo wpautop( $instance['text'] );

			if ( ! empty( $instance['id'] ) ) : ?>
			<form id="subscribe" class="form subscribe" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open( 'http://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_js( $instance['id'] ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
				<div class="row onepixel">
					<div class="col-md-9 col-sm-9">
						<input type="text" value="<?php echo esc_attr( $instance['input_text'] ); ?>" id="subbox" onfocus="if ( this.value == '<?php echo esc_js( $instance['input_text'] ); ?>') { this.value = ''; }" onblur="if ( this.value == '' ) { this.value = '<?php echo esc_js( $instance['input_text'] ); ?>'; }" name="email" />
					</div>
					<input type="hidden" name="uri" value="<?php echo esc_attr( $instance['id'] ); ?>" />
					<input type="hidden" name="loc" value="<?php echo esc_attr( get_locale() ); ?>" />
					<div class="col-md-3 col-sm-3">
						<input class="button form" type="submit" value="<?php echo esc_attr( $instance['button_text'] ); ?>" id="subbutton" />
					</div>
				</div>
			</form>
			<?php endif;

		echo '</div>' . $after_widget;

	}

	function update( $new_instance, $old_instance ) {

		$new_instance['title'] = strip_tags( $new_instance['title'] );
		$new_instance['text']  = wp_kses( $new_instance['text'], erange_formatting_allowedtags() );
		return $new_instance;

	}

	function form( $instance ) {

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'erange' ); ?>:</label><br />
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text To Show', 'erange' ); ?>:</label><br />
			<textarea id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" class="widefat" rows="6" cols="4"><?php echo htmlspecialchars( $instance['text'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e( 'Google/Feedburner ID', 'erange' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php echo esc_attr( $instance['id'] ); ?>" class="widefat" />
		</p>

		<p>
			<?php $input_text = empty( $instance['input_text'] ) ? __( 'Your Email', 'erange' ) : $instance['input_text']; ?>
			<label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e( 'Input Text', 'erange' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'input_text' ); ?>" name="<?php echo $this->get_field_name( 'input_text' ); ?>" value="<?php echo esc_attr( $input_text ); ?>" class="widefat" />
		</p>

		<p>
			<?php $button_text = empty( $instance['button_text'] ) ? __( 'Go', 'erange' ) : $instance['button_text']; ?>
			<label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text', 'erange' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" value="<?php echo esc_attr( $button_text ); ?>" class="widefat" />
		</p>

	<?php
	}

}
/**
 * Recent Projects
 *
 * @since 1.0
 */
class Erange_Recent_Projects_Widget extends WP_Widget {
		/** constructor */	
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'recent_portfolio_widget recent-portfolio', 
			'description' => __('Shows recent portfolio images in sidebar.','erange')
		);
    	parent::__construct('erange_recent_projects_widget', __('Erange - Recent Projects','erange'), $widget_ops);
	}
	function widget($args, $instance) {
           
			extract( $args );
			$cats = '';

			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Recent Projects' : $instance['title'], $instance, $this->id_base);	
			if ( ! $number = absint( $instance['number'] ) ) $number = 5;
			if( ! $cats = $instance["cats"] )  $cats='';

			$my_args=array(
				'posts_per_page' => $number,
				'orderby' => 'date',
				'order' => 'DESC',
				'post_type' => 'portfolio',
				'tax_query' => array(
					array(
						'taxonomy' => 'portfolio_category',
						'field' => 'id',
						'terms' => $cats,
					)
				)
			);
			
			
			
			$adv_recent_posts = null;
			$adv_recent_posts = new WP_Query($my_args);

			echo $before_widget;
			echo $before_title;
			echo $instance["title"];
			echo $after_title;
			echo '<ul class="list-unstyled row onepixel">'."\n";
			$post_count = 0;
			while ( $adv_recent_posts->have_posts() ) : $adv_recent_posts->the_post();
				
			?>

				<li class="col-md-6 col-xs-6 bottom-5">
					<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'portfolio-widget' );?></a>
				</li><!-- // column -->
				
		<?php 		 
			endwhile;
			echo '</ul>'."\n";
			wp_reset_query();
			echo $after_widget;
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['cats'] = $new_instance['cats'];
			$instance['number'] = absint($new_instance['number']);
			return $instance;
		}
		
		function form( $instance ) {
			$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Projects';
			$number = isset($instance['number']) ? absint($instance['number']) : 5;
		?>
		
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of projects to show:','erange'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
                
        <p>
            <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Categories:','erange');?> 
                <?php
                     $categories =  get_terms('portfolio_category',array( 'parent' => 0 , 'hide_empty'    => false,));
                     echo "<br/>";
                     foreach ($categories as $cat) {
                         $option='<input type="checkbox" id="'. $this->get_field_id( 'cats' ) .'[]" name="'. $this->get_field_name( 'cats' ) .'[]"';
                            if (isset($instance['cats'])) {
                                foreach ($instance['cats'] as $cats) {
                                    if($cats==$cat->term_id) {
                                         $option=$option.' checked="checked"';
                                    }
                                }
                            }
                            $option .= ' value="'.$cat->term_id.'" />';
                            $option .= $cat->name;
                            $option .= '<br />';
                            echo $option;
                         }
                    ?>
            </label>
        </p>
		
		<?php }
}


/**
 * Recent Post
 *
 * @since 1.0
 */
class Erange_Recent_Posts_Widget extends WP_Widget {
		/** constructor */	
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'recent_posts_widget recent-post widget-posts', 
			'description' => __('Shows recent posts in sidebar.','erange')
		);
    	parent::__construct('erange_recent_posts_widget', __('Erange - Recent Posts','erange'), $widget_ops);
	}
	function widget($args, $instance) {
           
			extract( $args );
						
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Recent Posts' : $instance['title'], $instance, $this->id_base);	
			if ( ! $number = absint( $instance['number'] ) ) $number = 5;
			if( ! $cats = $instance["cats"] )  $cats='';

			if($cats){
				$cat_query = implode(',', $cats);
			} else {
				$cat_query = '';
			}

			$my_args=array(
				'posts_per_page' => $number,
				'orderby' => 'date',
				'order' => 'DESC',
				'cat'	=>  $cat_query,
				'ignore_sticky_posts' => 1
			);
			
			
			
			$adv_recent_posts = null;
			$adv_recent_posts = new WP_Query($my_args);

			echo $before_widget;
			echo $before_title;
			echo $instance["title"];
			echo $after_title;
			echo '<ul class="list-unstyled bottom-0">'."\n";
			$post_count = 0;
			while ( $adv_recent_posts->have_posts() ) : $adv_recent_posts->the_post();
				
			?>

				<li <?php post_class('clearfix'); ?>>

					<div class="post-info">
						<h4 class="entry-title bottom-0">
							<a rel="bookmark" title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a>
						</h4>
						<div class="post-meta">
							<span class="author">Post by <a rel="author" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="url fn n" data-toggle="tooltip" title="<?php echo esc_attr( sprintf( __( 'View all posts by %s', 'erange' ), get_the_author() ) );?>"><?php echo get_the_author();?></a></span>
							<span class="time"> <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?> </span>
						</div>
					</div><!-- // .post-content -->

				</li><!-- // .clearfix -->
		<?php 		 
			endwhile;
			echo '</ul>'."\n";
			wp_reset_query();
			echo $after_widget;
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['cats'] = $new_instance['cats'];
			$instance['number'] = absint($new_instance['number']);
			return $instance;
		}
		
		function form( $instance ) {
			$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
			$number = isset($instance['number']) ? absint($instance['number']) : 5;
		?>
		
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:','erange'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
                
        <p>
            <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Categories:','erange');?> 
                <?php
                	 $cats = '';
                     $categories =  get_terms('category',array( 'parent' => 0 , 'hide_empty'    => false,));
                     echo "<br/>";
                     foreach ($categories as $cat) {
                         $option='<input type="checkbox" id="'. $this->get_field_id( 'cats' ) .'[]" name="'. $this->get_field_name( 'cats' ) .'[]"';
                            if (isset($instance['cats'])) {
                                foreach ($instance['cats'] as $cats) {
                                    if($cats==$cat->term_id) {
                                         $option=$option.' checked="checked"';
                                    }
                                }
                            }
                            $option .= ' value="'.$cat->term_id.'" />';
                            $option .= $cat->name;
                            $option .= '<br />';
                            echo $option;
                         }
                    ?>
            </label>
        </p>
		
		<?php }
}

/**
 * Category Listing Widget
 *
 * @since 1.0
 */
class Erange_Category_Widget extends WP_Widget {
		/** constructor */	
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'menu erange_taxonomy_widget widget-category', 
			'description' => __('Shows category listing in sidebar.','erange')
		);
    	parent::__construct('recent-posts-widget', __('Erange - Category List','erange'), $widget_ops);
	}
	function widget($args, $instance) {
           
			extract( $args );
		
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Category' : $instance['title'], $instance, $this->id_base);	
			
			echo $before_widget;
			echo $before_title;
			echo $instance["title"];
			echo $after_title;
			echo '<ul class="list-unstyled">'."\n";
			$args = array(
  				'orderby' => 'name',
  				'order' => 'ASC'
  			);
			$categories = get_categories($args);
			foreach($categories as $category) { 
				echo '<li>';
    			echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s",'erange' ), $category->name ) . '" ' . '>' . $category->name.'</a>';
    			echo '</li>';
			}
			?>
				
		<?php 		 
			echo '</ul>'."\n";
			echo $after_widget;
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}
		
		function form( $instance ) {
			$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Category';
		?>
		
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		
		<?php }
}
/**
 * Contact Widget.
 *
 * @since 1.0
 */
class Erange_Contact extends WP_Widget {
		/** constructor */	
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'erange_contact_info contact_widget', 
			'description' => __('Display contact infomations','erange')
		);
    	parent::__construct('erange_contact_info', __('Erange - Contact Info','erange'), $widget_ops);
	}
	function widget($args, $instance) {
			extract( $args );
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Contact Infomations' : $instance['title'], $instance, $this->id_base);	
			
			echo $before_widget.$before_title.$instance["title"].$after_title;
			echo '<ul class="contact-info-wrap list-unstyled">'."\n";
			echo '<li class="contact-field"><i class="fa fa-map-marker"></i><strong>'.$instance["address"].'</strong></li>'."\n";
			echo '<li class="contact-field"><i class="fa fa-phone"></i><span>Phone:</span>'.$instance["phone"].'</li>'."\n";
			echo '<li class="contact-field"><i class="fa fa-reply"></i><span>Fax:</span>'.$instance["fax"].'</li>'."\n";
			echo '<li class="contact-field"><i class="fa fa-envelope"></i><span>Email:</span>'.$instance["email"].'</li>'."\n";
			echo '<li class="contact-field"><i class="fa fa-globe"></i><span>Website:</span>'.$instance["website"].'</li>'."\n";
			echo '</ul>'."\n";
			echo $after_widget;
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['address'] = strip_tags($new_instance['address']);
			$instance['phone'] = strip_tags($new_instance['phone']);
			$instance['fax'] = strip_tags($new_instance['fax']);
			$instance['email'] = strip_tags($new_instance['email']);
			$instance['website'] = strip_tags($new_instance['website']);
			return $instance;
		}
		
		function form( $instance ) {
			$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Contact Infomations';
			$address = isset($instance['address']) ? esc_attr($instance['address']) : '';
			$phone = isset($instance['phone']) ? esc_attr($instance['phone']) : '';
			$fax = isset($instance['fax']) ? esc_attr($instance['fax']) : '';
			$email = isset($instance['email']) ? esc_attr($instance['email']) : '';
			$website = isset($instance['website']) ? esc_attr($instance['website']) : '';
		?>
		
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" size="3" /></p>
        
		<p><label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" size="3" /></p>

		<p><label for="<?php echo $this->get_field_id('fax'); ?>"><?php _e('Fax:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" type="text" value="<?php echo $fax; ?>" size="3" /></p>

		<p><label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" size="3" /></p>

		<p><label for="<?php echo $this->get_field_id('website'); ?>"><?php _e('Website:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('website'); ?>" name="<?php echo $this->get_field_name('website'); ?>" type="text" value="<?php echo $website; ?>" size="3" /></p>

		<?php }
}
/**
 * Video Embed Widget.
 *
 * @since 1.0
 */
class Erange_Embed_Code extends WP_Widget {
		/** constructor */	
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'erange_video_embed', 
			'description' => __('Display video in Widget','erange')
		);
    	parent::__construct('erange_embed_code', __('Erange - Video Embed','erange'), $widget_ops);
	}
	function widget($args, $instance) {
			extract( $args );
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Contact Infomations' : $instance['title'], $instance, $this->id_base);	
			
			echo $before_widget.$before_title.$instance["title"].$after_title;
			echo '<div class="embed_content">'."\n";
			echo $instance['embed_code'];
			echo '</div>'."\n";
			echo $after_widget;
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['embed_code'] = strip_tags($new_instance['embed_code']);
			return $instance;
		}
		
		function form( $instance ) {
			$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Contact Infomations';
			$embed_code = isset($instance['embed_code']) ? esc_attr($instance['embed_code']) : '';
		?>
		
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('embed_code'); ?>"><?php _e('Video Embed Code:','erange'); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id('embed_code'); ?>" name="<?php echo $this->get_field_name('embed_code'); ?>"><?php echo $embed_code; ?></textarea></p>
        
		<?php }
}
/**
 * Flickr Images.
 *
 * @since 1.0
 */
class Erange_Flickr_Images extends WP_Widget {
		/** constructor */	
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'erange_flickr_images flickr', 
			'description' => __('Display Flickr images','erange')
		);
    	parent::__construct('erange_flickr_images', __('Erange - Flickr Images','erange'), $widget_ops);
	}
	function widget($args, $instance) {
			extract( $args );
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Flickr' : $instance['title'], $instance, $this->id_base);	
			
			echo $before_widget.$before_title.$instance["title"].$after_title;
			echo '<div class="flickr-widget">'."\n";
			echo '<div class="clearfix"><script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.$instance['number_img'].'&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user='.$instance['flickr_id'].'"></script></div>';
			echo '</div>'."\n";
			echo $after_widget;
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);
			$instance['number_img'] = strip_tags($new_instance['number_img']);
			return $instance;
		}
		
		function form( $instance ) {
			$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Flickr';
			$flickr_id = isset($instance['flickr_id']) ? esc_attr($instance['flickr_id']) : '';
			$number_img = isset($instance['number_img']) ? esc_attr($instance['number_img']) : '9';
		?>
		
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('flickr_id'); ?>"><?php _e('Flickr ID:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('flickr_id'); ?>" name="<?php echo $this->get_field_name('flickr_id'); ?>" type="text" value="<?php echo $flickr_id; ?>"></p>

        <p><label for="<?php echo $this->get_field_id('number_img'); ?>"><?php _e('Number:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('number_img'); ?>" name="<?php echo $this->get_field_name('number_img'); ?>" type="text" value="<?php echo $number_img; ?>"></p>
        
		<?php }
}
/**
 * Twitter
 *
 * @since 1.0
 */
class Erange_Twitter extends WP_Widget {
		/** constructor */	
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'last-tweet widget-twitter', 
			'description' => __('Display Lastest Tweet','erange')
		);
    	parent::__construct('erange_twitter', __('Erange - New Tweets','erange'), $widget_ops);
	}
	function widget($args, $instance) {
			extract( $args );
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Tweets' : $instance['title'], $instance, $this->id_base);	
			
			$twitter_widget_id = erange_rand_string(8);

			echo $before_widget.$before_title.$instance["title"].$after_title;
			echo '<div class="widget-content">';
			echo '<div id="tweet-'.$twitter_widget_id.'">'."\n";
			echo '</div>'."\n";
			echo '</div>'."\n";
			echo '<script type="text/javascript">jQuery(document).ready(function(){jQuery("#tweet-'.$twitter_widget_id.'").tweet({modpath:"'.get_template_directory_uri().'/js/twitter/",count:'.$instance['number_tweet'].',username:"'.$instance['twitter_id'].'",loading_text:"loading twitter feed...",template:"{text}{time}{join}"})})</script>';
			echo $after_widget;
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['twitter_id'] = strip_tags($new_instance['twitter_id']);
			$instance['number_tweet'] = strip_tags($new_instance['number_tweet']);
			return $instance;
		}
		
		function form( $instance ) {
			$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Twitter';
			$twitter_id = isset($instance['twitter_id']) ? esc_attr($instance['twitter_id']) : '';
			$number_tweet = isset($instance['number_tweet']) ? esc_attr($instance['number_tweet']) : '3';
		?>
		
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php _e('Twitter ID:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" type="text" value="<?php echo $twitter_id; ?>"></p>

        <p><label for="<?php echo $this->get_field_id('number_tweet'); ?>"><?php _e('Number:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('number_tweet'); ?>" name="<?php echo $this->get_field_name('number_tweet'); ?>" type="text" value="<?php echo $number_tweet; ?>"></p>
        
		<?php }
}
/**
 * Social Media
 *
 * @since 1.0
 */
class Erange_Social extends WP_Widget {
		/** constructor */	
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'social media widget', 
			'description' => __('Display Social Media Network Link','erange')
		);
    	parent::__construct('erange_social', __('Erange - Social Media','erange'), $widget_ops);
	}
	function widget($args, $instance) {
			extract( $args );
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Tweets' : $instance['title'], $instance, $this->id_base);	
			
			$twitter_widget_id = erange_rand_string(8);

			echo $before_widget.$before_title.$instance["title"].$after_title;
			echo '<div class="social-group">';
			echo '<ul class="social list-unstyled clearfix bottom-0">';
			if(get_theme_mod('social_twitter') != "")
			echo '<li class="twitter"><a target="_blank" href="http://twitter.com/'.get_theme_mod('social_twitter').'" data-toggle="tooltip" data-placement="bottom" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a></li>';
            if(get_theme_mod('social_facebook')!= "")
            echo '<li class="facebook"><a target="_blank" href="'.get_theme_mod('social_facebook').'" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a></li>';
            if(get_theme_mod('social_google')!= "")
            echo '<li class="googleplus"><a target="_blank" href="'.get_theme_mod('social_google').'" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>';
            if(get_theme_mod('social_pinterest')!= "")
            echo '<li class="pinterest"><a target="_blank" href="'.get_theme_mod('social_pinterest').'" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>';
            if(get_theme_mod('social_youtube')!= "")
            echo '<li class="youtube"><a target="_blank" href="'.get_theme_mod('social_youtube').'" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a></li>';
            if(get_theme_mod('social_dribbble')!= "")
            echo '<li class="dribbble"><a target="_blank" href="'.get_theme_mod('social_dribbble').'" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>';
            if(get_theme_mod('social_linkedin')!= "")
            echo '<li class="linkedin"><a target="_blank" href="'.get_theme_mod('social_linkedin').'" data-toggle="tooltip" data-placement="bottom" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>';
            if(get_theme_mod('social_flickr')!= "")
            echo '<li class="flickr"><a target="_blank" href="'.get_theme_mod('social_flickr').'" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i class="fa fa-flickr"></i></a></li>';
            if(get_theme_mod('social_instagram')!= "")
            echo '<li class="flickr"><a target="_blank" href="'.get_theme_mod('social_instagram').'" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a></li>';
            if(get_theme_mod('social_vimeo')!= "")
            echo '<li class="vimeo"><a target="_blank" href="'.get_theme_mod('social_vimeo').'" data-toggle="tooltip" data-placement="bottom" title="Vimeo"><i class="fa fa-vimeo-square"></i></a></li>';
            if(get_theme_mod('social_rss') == 1)
            echo '<li class="rss"><a target="_blank" href="'.get_bloginfo( 'rss2_url' ).'" data-toggle="tooltip" data-placement="bottom" title="RSS"><i class="fa fa-rss"></i></a></li>';
			echo '</ul>';
			echo '</div>';
			echo $after_widget;
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}
		
		function form( $instance ) {
			$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Social Network';
		?>
		
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','erange'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        
		<?php }
}
/**
 * FixedMenus
 *
 * @since 1.0
 */
class Erange_FixedMenus extends WP_Widget {

	function __construct() {
		$widget_ops = array( 
			'classname'   => 'widget_nav_menu affix-widget', 
			'description' => __('Add a custom menu to your sidebar.') 
		);
		parent::__construct( 'erange_fixed_menu', __('Erange - Fixed Custom Menu'), $widget_ops );
	}

	function widget($args, $instance) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( !$nav_menu )
			return;

		/** This filter is documented in wp-includes/default-widgets.php */
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];

		if ( !empty($instance['title']) )
			echo $args['before_title'] . $instance['title'] . $args['after_title'];

		wp_nav_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu ) );

		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

		// Get menus
		$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );

		// If no menus exists, direct the user to go and create some.
		if ( !$menus ) {
			echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
			return;
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
			<select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
		<?php
			foreach ( $menus as $menu ) {
				echo '<option value="' . $menu->term_id . '"'
					. selected( $nav_menu, $menu->term_id, false )
					. '>'. $menu->name . '</option>';
			}
		?>
			</select>
		</p>
		<?php
	}
}

/**
 * Tags Widget.
 *
 * @since 1.0
 */
function tcr_tag_cloud_filter($args = array()) {
    $args['smallest'] = 12;
    $args['largest'] = 12;
    $args['unit'] = 'px';
    return $args;
}
add_filter('widget_tag_cloud_args', 'tcr_tag_cloud_filter', 90);

/**
 * Register Widgets.
 *
 * @since 1.0
 */
function erange_register_widgets() {
	register_widget( 'Erange_eNews_Updates' );
	register_widget( 'Erange_Recent_Projects_Widget' );
	register_widget( 'Erange_Recent_Posts_Widget' );
	register_widget( 'Erange_Category_Widget' );
	register_widget( 'Erange_Embed_Code' );
	register_widget( 'Erange_Contact' );
	register_widget( 'Erange_Flickr_Images' );
	register_widget( 'Erange_Twitter' );
	register_widget( 'Erange_Social' );
	register_widget( 'Erange_FixedMenus');
}

add_action( 'widgets_init', 'erange_register_widgets' );