<?php

/**
 * Re-enable full Visual Composer (WP Bakery) functionality
 */

function reenable_vc() {
	if(function_exists('vc_disable_frontend')) {
		vc_frontend_editor()->disableInline(false);
	}
}
add_action('init', 'reenable_vc', 1);

// Remove required plugins from Parent Theme
add_action('init', function() {
  remove_action( 'tgmpa_register', 'erange_register_required_plugins' );
});

function team_post_type() {
	$labels = array(
		'name' => _x("Team", "post type general name"),
		'singular_name' => _x("Team", "post type singular name"),
		'menu_name' => 'Team Profiles',
		'add_new' => _x("Add New", "team item"),
		'add_new_item' => __("Add New Profile"),
		'edit_item' => __("Edit Profile"),
		'new_item' => __("New Profile"),
		'view_item' => __("View Profile"),
		'parent_item_colon' => ''
	);

	register_post_type('team' , array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-admin-users',
		'rewrite' => false,
		'supports' => array('title', 'editor', 'thumbnail')
	) );

  register_taxonomy( strtolower($singular), 'team', array(
    'public' => false,
    'show_ui' => true,
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'query_var' => true,
    'rewrite' => false,
    'labels' => $labels
  ) );
}

add_action( 'init', 'team_post_type' );
