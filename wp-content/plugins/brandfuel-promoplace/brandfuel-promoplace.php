<?php
/**
 * Plugin Name:       Brand Fuel - Promoplace product slider shortcode
 * Description:       This plugin provides functionality for a shortcode that pulls the product slider from BF's Promoplace website
 * Version:           1.0
 * Author:            Unity Digital Agency
 * Author URI:        https://www.unitymakes.us/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Load scripts and styles
function bf_promo_scripts() {
  global $post;

  wp_enqueue_script( 'slickslider', plugins_url('assets/slick.min.js', __FILE__), ['jquery'], '1.8.0', true );
  wp_enqueue_script( 'bf-promo', plugins_url('assets/bf-promoplace.js', __FILE__), ['jquery', 'slickslider'], null, true );
  wp_enqueue_style( 'bf-promo', plugins_url('assets/bf-promoplace.css', __FILE__) );
}
add_action('wp_enqueue_scripts', 'bf_promo_scripts');

// Shortcode for [brandfuel-promoplace]
function bf_promoplace( ){

  if ( false === ( $products_html = get_transient( 'bf_promoplace' ) ) ) {

    $promoplace = new DOMDocument;
    $products = new DOMDocument;

    // Suppress errors due to malformed HTML on promoplace website
    libxml_use_internal_errors(true);
    
    // Load HTML into PHP
    $remoteget = wp_remote_get('https://www.promoplace.com/brandfuel');
    $promoplace->loadHtml(wp_remote_retrieve_body($remoteget));
    $prod_node = $promoplace->getElementById('productCarousel');

    // Get products HTML
    $new_node = $products->importNode($prod_node, true);
    $products->appendChild($new_node);

    // Open all links in new tab/window
    $a_links = $products->getElementsByTagName('a');
    foreach ($a_links as $a) {
      $a->setAttribute('target', '_blank');
      $a->setAttribute('rel', 'noopener');
    }

    $products_html = $products->saveHtml();

    set_transient( 'bf_promoplace', $products_html, 6 * HOUR_IN_SECONDS );

  }

  // Return HTML
  return $products_html;
}
add_shortcode( 'brandfuel-promoplace', 'bf_promoplace' );


// Shortcode for [brandfuel-testimonials]
function bf_testimonials( ){
    
    $testimonials = new WP_Query([
        'posts_per_page' => '-1',
        'orderby' => 'rand',
        'order' => 'ASC',
        'post_type' => 'portfolio'
    ]);
    
    if ($testimonials->have_posts()) :
        
        $output .= '<div id="bf-testimonials">';
        
        while ($testimonials->have_posts()) : $testimonials->the_post();
            $output .= '<div class="testimonial">' . get_the_content() . '</div>';
        
        endwhile;
        
        $output .= '</div>';
    
    endif; wp_reset_postdata();
    

    // Return HTML
    return $output;
}
add_shortcode( 'brandfuel-testimonials', 'bf_testimonials' );
