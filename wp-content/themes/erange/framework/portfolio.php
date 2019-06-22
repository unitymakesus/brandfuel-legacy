<?php

/**
* Register Portfolio Custom Post Type
*/

function erange_portfolio() {
  
  $portfolio_slug = get_theme_mod('text_portfolioslug') ? get_theme_mod('text_portfolioslug') : 'portfolio';

  $labels = array(
    'name'               => __('Portfolio','erange'),
    'singular_name'      => __('Portfolio','erange'),
    'add_new'            => __('Add New','erange'),
    'add_new_item'       => __('Add New Project','erange'),
    'edit_item'          => __('Edit Project','erange'),
    'new_item'           => __('New Project','erange'),
    'all_items'          => __('All Projects','erange'),
    'view_item'          => __('View Project','erange'),
    'search_items'       => __('Search Project','erange'),
    'not_found'          => __('No projects found','erange'),
    'not_found_in_trash' => __('No projects found in Trash','erange'),
    'parent_item_colon'  => __('','erange'),
    'menu_name'          => __('Portfolio','erange')
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'menu_icon' 		 => 'dashicons-media-interactive',
    'rewrite'            => array( 'slug' => $portfolio_slug ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'thumbnail' )
  );

  register_post_type( 'portfolio', $args );
}
add_action( 'init', 'erange_portfolio' );

/**
* Register Portfolio Taxonomies
*/

function erange_portfolio_taxonomies() {

  	$portfolio_cat_slug = get_theme_mod('text_portfolio_category_slug') ? get_theme_mod('text_portfolio_category_slug') : 'portfolio_categoy';
  	$portfolio_tag_slug = get_theme_mod('text_portfolio_tag_slug') ? get_theme_mod('text_portfolio_tag_slug') : 'portfolio_tag';

	// Portfolio categories taxonomy
	$labels = array(
		'name'              => __( 'Categories', 'erange' ),
		'singular_name'     => __( 'Category', 'erange' ),
		'search_items'      => __( 'Search Categories', 'erange' ),
		'all_items'         => __( 'All Categories', 'erange' ),
		'parent_item'       => __( 'Parent Category', 'erange' ),
		'parent_item_colon' => __( 'Parent Category:', 'erange' ),
		'edit_item'         => __( 'Edit Category', 'erange' ),
		'update_item'       => __( 'Update Category' , 'erange'),
		'add_new_item'      => __( 'Add New Category', 'erange' ),
		'new_item_name'     => __( 'New Category Name', 'erange' ),
		'menu_name'         => __( 'Category', 'erange' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $portfolio_cat_slug ),
	);

	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

	// Portfolio tags taxonomy
	$labels = array(
		'name'              => __( 'Tags', 'erange' ),
		'singular_name'     => __( 'Tag', 'erange' ),
		'search_items'      => __( 'Search Tags', 'erange' ),
		'all_items'         => __( 'All Tags', 'erange' ),
		'parent_item'       => __( 'Parent Tag', 'erange' ),
		'parent_item_colon' => __( 'Parent Tag:', 'erange' ),
		'edit_item'         => __( 'Edit Tag', 'erange' ),
		'update_item'       => __( 'Update Tag' , 'erange'),
		'add_new_item'      => __( 'Add New Tag', 'erange' ),
		'new_item_name'     => __( 'New Tag Name', 'erange' ),
		'menu_name'         => __( 'Tag', 'erange' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $portfolio_tag_slug ),
	);

	register_taxonomy( 'portfolio_tag', array( 'portfolio' ), $args );
}

add_action( 'init', 'erange_portfolio_taxonomies', 0 );