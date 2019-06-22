<?php

/**
* Register meta boxed
*/

$prefix = 'erange_';
global $meta_boxes;
$meta_boxes = array();

// List all define sidebar
$sidebarposition = array();
$sidebarposition['default-sidebar'] = __('Default Sidebar','erange');
$sidebarposition['shop-sidebar'] = __('Shop Sidebar','erange');
$sidebar = get_theme_mod('unlimited_sidebar' );

if ($sidebar != ''){
	foreach ( $sidebar as $sidebar_area ) {
		if(is_array($sidebar_area))
		$sidebarposition[$sidebar_area['id']] = $sidebar_area['name'];
	}
}

// Custom Heading
$meta_boxes[] = array(

	'id' => 'custom_heading',
	'title' => __( 'Custom Heading', 'erange' ),
	'pages' => array( 'post', 'page','portfolio' ),
	'context' => 'normal',
	'priority' => 'low',
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		array(
			'name' => __( 'Custom Heading Title', 'erange' ),
			'id'   => "{$prefix}custom_heading_title",
			'type'             => 'text',
		),
		array(
			'name' => __( 'Header Background Image', 'erange' ),
			'id'   => "{$prefix}header_bg",
			'type'             => 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name' => __( 'Heading Background Image', 'erange' ),
			'id'   => "{$prefix}heading_bg",
			'type'             => 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name' => __( 'Heading Background Height (Pixel)', 'erange' ),
			'id'   => "{$prefix}heading_bg_height",
			'type'             => 'text',
			'std'	=> '200',
		),
		array(
			'name' => __( 'Heading Background Repeat', 'erange' ),
			'id'   => "{$prefix}heading_bg_repeat",
			'type'             => 'select',
			'options'  => array(
				'cover' => __( 'Cover', 'erange' ),
				'repeat' => __( 'Repeat', 'erange' ),
			),
		),
		array(
			'name' => __( 'Advance Page Menus', 'erange' ),
			'id'   => "{$prefix}page_advance_menu",
			'type'             => 'text',
		),
		array(
			'name' => __( 'Header Content', 'erange' ),
			'id'   => "{$prefix}page_header_content",
			'type'             => 'textarea',
		),
		array(
			'name' => __( 'Above Footer Content', 'erange' ),
			'id'   => "{$prefix}page_above_footer_content",
			'type'             => 'textarea',
		),
	)
);

// Custom Page Templates
$meta_boxes[] = array(

	'id' => 'custom_page_settings',
	'title' => __( 'Custom Page/Post Settings', 'erange' ),
	'pages' => array( 'page', 'post' ),
	'context' => 'side',
	'priority' => 'low',
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		array(
			'name' => __( 'Choose page with & sidebar', 'erange' ),
			'id'   => "{$prefix}page_sidebar",
			'type'             => 'select',
			'options'  => array(
				'content-sidebar' => __( 'Right sidebar', 'erange' ),
				'sidebar-content' => __( 'Left Sidebar', 'erange' ),
				'fullwidth' => __( 'Full Width', 'erange' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'content-sidebar',
		),

		array(
			'name' => __( 'Sidebar Widget', 'erange' ),
			'id'   => "{$prefix}page_sidebar_widget",
			'type'             => 'select',
			'options'  => $sidebarposition,
			'std'         => 'default-sidebar',
			'multiple'    => false,
		),

		array(
			'name' => __( 'Force full width', 'erange' ),
			'id'   => "{$prefix}force_fw",
			'type' => 'checkbox',
			'desc' => 'Force page full width. Only apply with page',
			'std'  => 0,
		),

		array(
			'name' => __( 'Show Page Heading', 'erange' ),
			'id'   => "{$prefix}page_heading",
			'type' => 'checkbox',
			'desc' => 'Only apply on page',
			'std'  => 1,
		),

		array(
			'name' => __( 'Show Page Title', 'erange' ),
			'id'   => "{$prefix}page_title",
			'type' => 'checkbox',
			'desc' => 'Only apply on page',
			'std'  => 1,
		),
	)
);


// Custom Post Archive Templates
$meta_boxes[] = array(

	'id' => 'custom_archive_settings',
	'title' => __( 'Custom Archive Settings', 'erange' ),
	'pages' => array( 'page' ),
	'context' => 'side',
	'priority' => 'low',
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		array(
			'name' => __( 'Choose page with & sidebar', 'erange' ),
			'id'   => "{$prefix}post_archive",
			'type'             => 'select',
			'options'  => array(
				'masonry' => __( 'Masonry', 'erange' ),
				'large' => __( 'Large', 'erange' ),
				'medium' => __( 'Medium', 'erange' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'large',
		),
	)
);


// Portfolio Page Options
$meta_boxes[] = array(

	'id' => 'portfolio_page_option',
	'title' => __( 'Portfolio Page Option (Only apply when select Portfolio Filter Page Templates)', 'erange' ),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'low',
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		array(
			'name' => __( 'Choose portfolio column item', 'erange' ),
			'id'   => "{$prefix}portfolio_columns",
			'type'             => 'select',
			'options'  => array(
				'3' => __( '4 Columns', 'erange' ),
				'4' => __( '3 Columns', 'erange' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => '3',
		),

		array(
			'name' => __( 'Items per page', 'erange' ),
			'id'   => "{$prefix}portfolio_item_per_page",
			'type'             => 'text',
			'std'         => '12',
		),

		array(
			'name' => __( 'Enable Filter', 'erange' ),
			'id'   => "{$prefix}portfolio_enable_filter",
			'type' => 'checkbox',
			'std'         => 1,
		)
	)
);

// Custom Portfolio Infomations
$meta_boxes[] = array(

	'id' => 'portfolio_infomations',
	'title' => __( 'Portfolio Infomations', 'erange' ),
	'pages' => array( 'portfolio' ),
	'context' => 'normal',
	'priority' => 'high',
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		array(
			'name'  => __( 'Author', 'erange' ),
			'id'    => "{$prefix}project_author",
			'desc'  => __( 'Author of project', 'erange' ),
			'type'  => 'text',
			'std'   => __( '', 'erange' ),
			'clone' => false,
		),
		array(
			'name'  => __( 'Partner', 'erange' ),
			'id'    => "{$prefix}project_parner",
			'desc'  => __( 'Your Partner', 'erange' ),
			'type'  => 'text',
			'std'   => __( '', 'erange' ),
			'clone' => false,
		),
		array(
			'name'  => __( 'Customer', 'erange' ),
			'id'    => "{$prefix}project_customer",
			'desc'  => __( 'Your Customer', 'erange' ),
			'type'  => 'text',
			'std'   => __( '', 'erange' ),
			'clone' => false,
		),
		array(
			'name'  => __( 'Release Date', 'erange' ),
			'id'    => "{$prefix}project_release_date",
			'desc'  => __( 'Project Release Date', 'erange' ),
			'type' => 'date',
			'js_options' => array(
				'appendText'      => __( '(mm-dd-yyyy)', 'erange' ),
				'dateFormat'      => __( 'mm-dd-yy', 'erange' ),
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
		array(
			'name'  => __( 'Project Link', 'erange' ),
			'id'    => "{$prefix}project_link",
			'desc'  => __( 'URL of your project', 'erange' ),
			'type'  => 'url',
			'std'   => '',
		),
		array(
			'name'  => __( 'Cusom Field', 'erange' ),
			'id'    => "{$prefix}project_custom_field",
			'desc'  => __( 'Add your custom field', 'erange' ),
			'type'  => 'textarea',
			'std'   => '[field title="Country"]Canada[/field]',
		),
		array(
			'type' => 'heading',
			'name' => __( 'Project Images', 'erange' ),
			'id'   => 'heading_3', 
		),
		array(
			'name'             => __( 'Upload your project images', 'erange' ),
			'id'               => "{$prefix}project_images",
			'type'             => 'image_advanced',
			'max_file_uploads' => 8,
		),
		array(
			'type' => 'heading',
			'name' => __( 'Project Video', 'erange' ),
			'id'   => 'heading_4', 
		),
		array(
			'name' => __( 'Video Emb Code', 'erange' ),
			'id'   => "{$prefix}project_video",
			'type' => 'textarea',
		),
	)
);

// Jobs
$meta_boxes[] = array(

	'id' => 'jobs_option',
	'title' => __( 'Job informations', 'erange' ),
	'pages' => array( 'job' ),
	'context' => 'normal',
	'priority' => 'low',
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		array(
			'name'  => __( 'Salary', 'erange' ),
			'id'    => "{$prefix}job_salary",
			'type'  => 'text',
			'clone' => false,
		),
		array(
			'name'  => __( 'End Date', 'erange' ),
			'id'    => "{$prefix}job_end_date",
			'type' => 'date',
			'js_options' => array(
				'appendText'      => __( '(mm-dd-yyyy)', 'erange' ),
				'dateFormat'      => __( 'mm-dd-yy', 'erange' ),
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
		array(
			'name'  => __( 'Contact Form 7 Shortcode', 'erange' ),
			'id'    => "{$prefix}contact_form7_code",
			'type' => 'text',
		),
	)
);


function erange_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
add_action( 'admin_init', 'erange_register_meta_boxes' );