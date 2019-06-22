<?php

/**
* Register Portfolio Custom Post Type
*/

function erange_job() {
  
  $labels = array(
    'name'               => __('Job','erange'),
    'singular_name'      => __('Job','erange'),
    'add_new'            => __('Add New','erange'),
    'add_new_item'       => __('Add New Job','erange'),
    'edit_item'          => __('Edit Job','erange'),
    'new_item'           => __('New Job','erange'),
    'all_items'          => __('All Jobs','erange'),
    'view_item'          => __('View Job','erange'),
    'search_items'       => __('Search Job','erange'),
    'not_found'          => __('No Jobs found','erange'),
    'not_found_in_trash' => __('No Jobs found in Trash','erange'),
    'parent_item_colon'  => __('','erange'),
    'menu_name'          => __('Job','erange')
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'menu_icon'          => 'dashicons-media-text',
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'job' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'thumbnail' )
  );

  register_post_type( 'job', $args );
}
add_action( 'init', 'erange_job' );

/**
* Register Portfolio Taxonomies
*/

function erange_job_taxonomies() {

    // Job categories taxonomy
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
        'rewrite'           => array( 'slug' => 'job_category' ),
    );

    register_taxonomy( 'job_category', array( 'job' ), $args );

    // Job Type
    $labels = array(
        'name'              => __( 'Type', 'erange' ),
        'singular_name'     => __( 'Type', 'erange' ),
        'search_items'      => __( 'Search Types', 'erange' ),
        'all_items'         => __( 'All Types', 'erange' ),
        'parent_item'       => __( 'Parent Type', 'erange' ),
        'parent_item_colon' => __( 'Parent Type:', 'erange' ),
        'edit_item'         => __( 'Edit Type', 'erange' ),
        'update_item'       => __( 'Update Type' , 'erange'),
        'add_new_item'      => __( 'Add New Type', 'erange' ),
        'new_item_name'     => __( 'New Type Name', 'erange' ),
        'menu_name'         => __( 'Type', 'erange' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'job_type' ),
    );

    register_taxonomy( 'job_type', array( 'job' ), $args );

    // Job Place
    $labels = array(
        'name'              => __( 'Place', 'erange' ),
        'singular_name'     => __( 'Place', 'erange' ),
        'search_items'      => __( 'Search Places', 'erange' ),
        'all_items'         => __( 'All Places', 'erange' ),
        'parent_item'       => __( 'Parent Place', 'erange' ),
        'parent_item_colon' => __( 'Parent Place:', 'erange' ),
        'edit_item'         => __( 'Edit Place', 'erange' ),
        'update_item'       => __( 'Update Place' , 'erange'),
        'add_new_item'      => __( 'Add New Place', 'erange' ),
        'new_item_name'     => __( 'New Place Name', 'erange' ),
        'menu_name'         => __( 'Place', 'erange' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'job_place' ),
    );

    register_taxonomy( 'job_place', array( 'job' ), $args );
}

add_action( 'init', 'erange_job_taxonomies', 0 );

?>