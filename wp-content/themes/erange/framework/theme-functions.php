<?php
/**
 * Register custom meta box
 *
 * @since Erange 1.0
 */
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/framework/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/framework/meta-box' ) );
require_once RWMB_DIR . 'meta-box.php';
include get_template_directory().'/framework/metabox.php';

/**
 * Add custom contact methods
 *
 * @since Erange 1.0
 */
add_filter('user_contactmethods', 'er_user_contactmethods');            
function er_user_contactmethods($user_contactmethods){  
    $user_contactmethods['twitter'] = 'Twitter';  
    $user_contactmethods['facebook'] = 'Facebook'; 
    $user_contactmethods['linkedin'] = 'LikedIn'; 
    $user_contactmethods['pinterest'] = 'Pinterest';
    $user_contactmethods['googleplus'] = 'Google Plus';
    return $user_contactmethods;  
}  

/**
 * Breadcrumb
 * Custom fixed for email request
 *
 * @since Erange 1.x
 */
function erange_breadcrumb() {
 
    /* === OPTIONS === */
    $text['home']     = 'Home'; // text for the 'Home' link
    $text['category'] = 'Archive by Category "%s"'; // text for a category page
    $text['search']   = 'Search Results for "%s" Query'; // text for a search results page
    $text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
    $text['author']   = 'Articles Posted by %s'; // text for an author page
    $text['404']      = 'Error 404'; // text for the 404 page
 
    $show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
    $show_on_home   = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
    $show_title     = 1; // 1 - show the title for the links, 0 - don't show
    $delimiter      = ''; // delimiter between crumbs
    $before         = '<li class="current"><span>'; // tag before the current crumb
    $after          = '</span></li>'; // tag after the current crumb
    /* === END OF OPTIONS === */
 
    global $post;
    $home_link    = home_url('/');
    $link_before  = '<li>';
    $link_after   = '</li>';
    $link_attr    = '';
    $link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    if(!is_search() && !is_404())
    $parent_id    = $parent_id_2 = $post->post_parent;
    $frontpage_id = get_option('page_on_front');
 
    if (is_home() || is_front_page()) {
 
        if ($show_on_home == 1) echo '<div class="breadcrumbs"><ul class="clearfix"><li>' . $text['home'] . '</li></ul></div>';
 
    } else {
 
        echo '<div class="breadcrumbs"><ul class="clearfix">';
        if ($show_home_link == 1) {
            echo '<li><a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a></li>';
            if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
        }
 
        if ( is_category() ) {
            $this_cat = get_category(get_query_var('cat'), false);
            if ($this_cat->parent != 0) {
                $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
 
        } elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;
 
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;
 
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;
 
        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
 
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
                if ($show_current == 1) echo $before . get_the_title() . $after;
            }
 
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
 
        } elseif ( is_attachment() ) {
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
            $cats = str_replace('</a>', '</a>' . $link_after, $cats);
            if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
            echo $cats;
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
 
        } elseif ( is_page() && !$parent_id ) {
            if ($show_current == 1) echo $before . get_the_title() . $after;
 
        } elseif ( is_page() && $parent_id ) {
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) echo $delimiter;
                }
            }
            if ($show_current == 1) {
                if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
                echo $before . get_the_title() . $after;
            }
 
        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;
 
        } elseif ( is_404() ) {
            echo $before . $text['404'] . $after;
        }
 
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
 
        echo '</ul></div><!-- .breadcrumbs -->';
 
    }
}

/**
 * Formatting Allowed Tags
 *
 * @since Erange 1.0
 */
function erange_formatting_allowedtags() {

	return apply_filters(
		'erange_formatting_allowedtags',
		array(
			'a'          => array( 'href' => array(), 'title' => array(), ),
			'b'          => array(),
			'blockquote' => array(),
			'br'         => array(),
			'div'        => array( 'align' => array(), 'class' => array(), 'style' => array(), ),
			'em'         => array(),
			'i'          => array(),
			'p'          => array( 'align' => array(), 'class' => array(), 'style' => array(), ),
			'span'       => array( 'align' => array(), 'class' => array(), 'style' => array(), ),
			'strong'     => array(),
		)
	);

}
/**
 * Page Navigation
 *
 * @since Erange 1.0
 */
function round_num($num, $to_nearest) {
   /*Round fractions down (http://php.net/manual/en/function.floor.php)*/
   return floor($num/$to_nearest)*$to_nearest;
}
 
/* Function that performs a Boxed Style Numbered Pagination (also called Page Navigation).
   Function is largely based on Version 2.4 of the WP-PageNavi plugin */  
function erange_pagenavi($before = '', $after = '', $class = '') { 
    global $wpdb, $wp_query;
    $pagenavi_options = array();
    $pagenavi_options['pages_text'] = ('');
    $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['first_text'] = ('First Page');
    $pagenavi_options['last_text'] = ('Last Page');
    $pagenavi_options['next_text'] = '&#8594;';
    $pagenavi_options['prev_text'] = '&#8592;';
    $pagenavi_options['dotright_text'] = '...';
    $pagenavi_options['dotleft_text'] = '...';
    $pagenavi_options['num_pages'] = 4; //continuous block of page numbers
    $pagenavi_options['always_show'] = 0;
    $pagenavi_options['num_larger_page_numbers'] = 0;
    $pagenavi_options['larger_page_numbers_multiple'] = 4;
     
    //If NOT a single Post is being displayed
    /*http://codex.wordpress.org/Function_Reference/is_single)*/
    if (!is_single()) {
        $request = $wp_query->request;
        //intval — Get the integer value of a variable
        /*http://php.net/manual/en/function.intval.php*/
        $posts_per_page = intval(get_query_var('posts_per_page'));
        //Retrieve variable in the WP_Query class.
        /*http://codex.wordpress.org/Function_Reference/get_query_var*/
        $paged = intval(get_query_var('paged'));
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;
         
        //empty — Determine whether a variable is empty
        /*http://php.net/manual/en/function.empty.php*/
        if(empty($paged) || $paged == 0) {
            $paged = 1;
        }
         
        $pages_to_show = intval($pagenavi_options['num_pages']);
        $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
        $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
        $pages_to_show_minus_1 = $pages_to_show - 1;
        $half_page_start = floor($pages_to_show_minus_1/2);
        //ceil — Round fractions up (http://us2.php.net/manual/en/function.ceil.php)
        $half_page_end = ceil($pages_to_show_minus_1/2);
        $start_page = $paged - $half_page_start;
         
        if($start_page <= 0) {
            $start_page = 1;
        }
         
        $end_page = $paged + $half_page_end;
        if(($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if($start_page <= 0) {
            $start_page = 1;
        }
         
        $larger_per_page = $larger_page_to_show*$larger_page_multiple;
        //round_num() custom function - Rounds To The Nearest Value.
        $larger_start_page_start = (round_num($start_page, 10) + $larger_page_multiple) - $larger_per_page;
        $larger_start_page_end = round_num($start_page, 10) + $larger_page_multiple;
        $larger_end_page_start = round_num($end_page, 10) + $larger_page_multiple;
        $larger_end_page_end = round_num($end_page, 10) + ($larger_per_page);
         
        if($larger_start_page_end - $larger_page_multiple == $start_page) {
            $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
            $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
        }  
        if($larger_start_page_start <= 0) {
            $larger_start_page_start = $larger_page_multiple;
        }
        if($larger_start_page_end > $max_page) {
            $larger_start_page_end = $max_page;
        }
        if($larger_end_page_end > $max_page) {
            $larger_end_page_end = $max_page;
        }
        if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
            /*http://php.net/manual/en/function.str-replace.php */
            /*number_format_i18n(): Converts integer number to format based on locale (wp-includes/functions.php*/
            $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
            $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
            echo $before.'<div class="pagenavi '.$class.'">'."\n".'<ul class="list-unstyled bottom-0 clearfix">'."\n";
             
            if(!empty($pages_text)) {
                echo '<li><span class="pages">'.$pages_text.'</span></li>';
            }
            //Displays a link to the previous post which exists in chronological order from the current post.
            /*http://codex.wordpress.org/Function_Reference/previous_post_link*/
            
            echo '<li>'.get_previous_posts_link($pagenavi_options['prev_text']).'</li>';
             
            if ($start_page >= 2 && $pages_to_show < $max_page) {
                $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
                //esc_url(): Encodes < > & " ' (less than, greater than, ampersand, double quote, single quote).
                /*http://codex.wordpress.org/Data_Validation*/
                //get_pagenum_link():(wp-includes/link-template.php)-Retrieve get links for page numbers.
                echo '<li><a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">1</a></li>';
                if(!empty($pagenavi_options['dotleft_text'])) {
                    echo '<li><span class="expand">'.$pagenavi_options['dotleft_text'].'</span></li>';
                }
            }
             
            if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
                for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<li><a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a></li>';
                }
            }
             
            for($i = $start_page; $i  <= $end_page; $i++) {                     
                if($i == $paged) {
                    $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                    echo '<li><span class="current">'.$current_page_text.'</span></li>';
                } else {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<li><a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a></li>';
                }
            }
             
            if ($end_page < $max_page) {
                if(!empty($pagenavi_options['dotright_text'])) {
                    echo '<li><span class="expand">'.$pagenavi_options['dotright_text'].'</span></li>';
                }
                $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
                echo '<li><a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$max_page.'</a></li>';
            }
            
            echo '<li>'.get_next_posts_link($pagenavi_options['next_text'], $max_page).'</li>';
             
            if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
                for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<li><a href="'.esc_url(get_pagenum_link($i)).'" class="single_page" title="'.$page_text.'">'.$page_text.'</a></li>';
                }
            }
            echo '</ul></div>'.$after."\n";
        }
    }
}

/**
 * Get theme layout from theme options
 *
 * @since Erange 1.0
 */
function layout_class(){
    if(get_theme_mod( 'select_layoutstyle' ) == 'fullwidth'):
        $class = 'class=""';
    elseif(get_theme_mod( 'select_layoutstyle' ) == 'boxed'):
        $class = 'class="container boxed"';
    else:
        $class = 'class="container boxed margin"';
    endif;

    echo $class;
}
function erange_layout_format_div($class=null){
    $out = '';
    if(get_theme_mod( 'select_layoutstyle' ) == 'boxed'):
        if($class):
            $out = ' class="'.$class.'"';
        endif;
    else:
        $out = ' class="container '.$class.'"';
    endif;
    echo $out;
}

/**
 * Show Google Web Fonts URL
 *
 * @since Erange 1.0
 */
function erange_google_font(){
    
    $body_font = get_theme_mod('font_body');

    $heading1 = get_theme_mod('font_h1');
    $heading2 = get_theme_mod('font_h2');
    $heading3 = get_theme_mod('font_h3');
    $heading4 = get_theme_mod('font_h4');
    $heading5 = get_theme_mod('font_h5');
    $heading6 = get_theme_mod('font_h6');

    $widget_title_font = get_theme_mod('font_widget_title');
    $widget_border = get_theme_mod('border_top_widget_title');
    $widget_content = get_theme_mod('font_sidebar_widget');
    $footer_widget = get_theme_mod('font_footerheadline');
    $font_nav = get_theme_mod('font_nav');
    $callus_font = get_theme_mod('font_callus');
    $top_widget = get_theme_mod('font_top_widget_heading');

    $custom_font = '';
    $count = 0;
    $out = '';
    $default = array(
                    'arial',
                    'verdana',
                    'trebuchet',
                    'georgia',
                    'times',
                    'tahoma',
                    'helvetica');

    $google_fonts = array(
                    $body_font['face'],
                    $heading1['face'],
                    $heading2['face'],
                    $heading3['face'],
                    $heading4['face'],
                    $heading5['face'],
                    $heading6['face'],
                    $top_widget['face'],
                    $callus_font['face'],
                    $font_nav['face'],
                    $widget_title_font['face'],
                    $widget_content['face'],
                    $footer_widget['face'],
                    );
    
    $google_fonts_unique = array_unique($google_fonts);
    
    foreach($google_fonts_unique as $get_fonts) {
        if(!in_array($get_fonts, $default) && $get_fonts != '') {
                $custom_font = str_replace(' ', '+', $get_fonts). ':300,400,400italic,500,600,700,800,700italic|' . $custom_font;
        }
    }
    
    if($custom_font != ''){
        $out = "@import url('http://fonts.googleapis.com/css?family=" . substr_replace($custom_font ,"",-1) . "&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek,vietnamese');";
    }

    return $out;
}

/**
 * Get custom post type terms links
 *
 * @since Erange 1.0
 */
function erange_custom_taxonomies_terms_links($taxonomy) {
    global $post, $post_id;
    // get post by post id &get_post
    $post = get_post($post->ID);
    // get post type by post
    $post_type = $post->post_type;
    // get post type taxonomies
    $terms = get_the_terms( $post->ID, $taxonomy );
    if ( !empty( $terms ) ) {
        $out = array();
        foreach ( $terms as $term )
            $out[] = '<a title="'.$term->name.'" href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a>';
        $return = join( ', ', $out );
    } else {
        $return = '';
    }
    return $return;
}

/**
 * Get custom post type terms slig
 *
 * @since Erange 1.0
 */
function erange_custom_taxonomies_terms_slug($taxonomy) {
    global $post, $post_id;
    // get post by post id
    $post = get_post($post->ID);
    // get post type by post
    $post_type = $post->post_type;
    // get post type taxonomies
    $terms = get_the_terms( $post->ID, $taxonomy );
    if ( !empty( $terms ) ) {
        $out = array();
        foreach ( $terms as $term )
            $out[] = $term->slug;
        $return = join( ' ', $out );
    }
    return $return;
}

/**
 * Creat random string
 *
 * @since Erange 1.0
 */
function erange_rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
    $str = '';
    $size = strlen( $chars );
    for( $i = 0; $i < $length; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
    }

    return $str;
}

/**
 * Add Responsive Images Class
 *
 * @since Erange 1.0
 */
add_filter('post_thumbnail_html','erange_add_class_to_thumbnail');
function erange_add_class_to_thumbnail($thumb) {
    $thumb = str_replace('attachment-', 'img-responsive attachment-', $thumb);
    return $thumb;
}

/**
 * Count total post in special term
 *
 * @since Erange 1.0
 */
function erange_term_post_count($type,$term){
    $args = array(
        'post_type' => $type,
        'post_status' => 'published',
        'numberposts' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $term
            )
        )
    );
    return count( get_posts( $args ) );
    wp_reset_query();
}

/**
 * Get second product images
 *
 * @since Erange 1.0
 */
function erange_second_product_image(){
    global $post, $product, $woocommerce;
    $attachment_ids = $product->get_gallery_attachment_ids();
    if ( $attachment_ids ) {
        $loop = 1;
        foreach ( $attachment_ids as $attachment_id ) {
            if($loop == 1)
            $img       = wp_get_attachment_image_src( $attachment_id, 'shop_catalog');
            $image = $img[0];
            $loop++;
        }
    } else {
        $image = '';
    }

    return $image;
}

/**
 * Return icon class from icon name
 *
 * @since Erange 1.0
 */
function erange_icon_format($icon){
    if(substr($icon, 0, 3) == 'pe-'){
        $out = $icon;
    } else {
        $out = 'fa fa-'.$icon;
    }
    return $out;
}

/**
 * Get vimeo thumbnail
 *
 * @since Erange 1.0
 */
function erange_get_vimeo_thumbnail($id){
    $vimeo = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));
    return $vimeo[0]['thumbnail_large'];
}

/**
 * Get vimeo and youtube video link and images
 *
 * @since Erange 1.0
 */
function erange_get_video_link($link,$output='img'){

    if (strpos($link,'youtu') !== false) {
       
        $pattern = '%(?:https?://)?(?:www\.)?(?:youtu\.be/| youtube\.com(?:/embed/|/v/|/watch\?v=))([\w-]{10,12})[a-zA-Z0-9\< \>\"]%x';
        $result = preg_match($pattern, $link, $matches);
        $img = '<img class="img-responsive" src="http://img.youtube.com/vi/'.$matches[1].'/maxresdefault.jpg" alt=""/>';
        $link = 'http://www.youtube.com/watch?v='.$matches[1];
    } else {
        preg_match('/player\.vimeo\.com\/video\/([0-9]*)/', $link, $matches);
        $img = '<img class="img-vimeo" src="'.erange_get_vimeo_thumbnail($matches[1]).'" alt=""/>';
        $link = 'http://vimeo.com/'.$matches[1];
    }

    if($output == 'img'){
        $out = $img;
    } else {
        $out = $link;
    }
    return $out;
}