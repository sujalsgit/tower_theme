<?php
/**
 * Functions and definitions
 *
 */

/* 
Include primary navigation menu
*/
function tower_nav_init() {
	register_nav_menus( array(
		'menu-1' => 'Primary Menu',
	) );
}
add_action( 'init', 'tower_nav_init' );

/**
 * Enqueue scripts and styles.
 */
function tower_scripts() {
	wp_enqueue_style( 'tower-style', get_stylesheet_uri() );
	wp_enqueue_style( 'tower-custom-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_script( 'tower-scripts', get_template_directory_uri() . '/assets/js/scripts.js' );
}
add_action( 'wp_enqueue_scripts', 'tower_scripts' );


// Register Custom Post Type For Insurance Policy
function Create_PostType_Policy() {

	$labels = array(
		'name'                  => _x( 'Policies', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Policy', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Policies', 'text_domain' ),
		'name_admin_bar'        => __( 'Policies', 'text_domain' ),
		'archives'              => __( 'Policy Archives', 'text_domain' ),
		'attributes'            => __( 'Policy Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Insurance:', 'text_domain' ),
		'all_items'             => __( 'List All Policies', 'text_domain' ),
		'add_new_item'          => __( 'Add New Policy', 'text_domain' ),
		'add_new'               => __( 'Add New Policy', 'text_domain' ),
		'new_item'              => __( 'New Policy', 'text_domain' ),
		'edit_item'             => __( 'Edit Policy', 'text_domain' ),
		'update_item'           => __( 'Update Policy', 'text_domain' ),
		'view_item'             => __( 'View Policy', 'text_domain' ),
		'view_items'            => __( 'View Policies', 'text_domain' ),
		'search_items'          => __( 'Search Policy', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Policy', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Policy', 'text_domain' ),
		'items_list'            => __( 'Policies list', 'text_domain' ),
		'items_list_navigation' => __( 'Policies list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Policies list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'space',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Policy', 'text_domain' ),
		'description'           => __( 'Post type for Policies', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( '' ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-text-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'policy', $args );

}
add_action( 'init', 'Create_PostType_Policy', 0 );

// Register Custom Post Type For Insurance Claim
function Create_PostType_Claim() {

	$labels = array(
		'name'                  => _x( 'Policy Claims', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Policy Claim', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Policy Claims', 'text_domain' ),
		'name_admin_bar'        => __( 'Policy Claims', 'text_domain' ),
		'archives'              => __( 'Policy Claim Archives', 'text_domain' ),
		'attributes'            => __( 'Policy Claim Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Insurance:', 'text_domain' ),
		'all_items'             => __( 'List All Claims', 'text_domain' ),
		'add_new_item'          => __( 'Add New Policy Claim', 'text_domain' ),
		'add_new'               => __( 'Add New Claim', 'text_domain' ),
		'new_item'              => __( 'New Policy Claim', 'text_domain' ),
		'edit_item'             => __( 'Edit Policy Claim', 'text_domain' ),
		'update_item'           => __( 'Update Policy Claim', 'text_domain' ),
		'view_item'             => __( 'View Policy Claim', 'text_domain' ),
		'view_items'            => __( 'View Policy Claims', 'text_domain' ),
		'search_items'          => __( 'Search Policy Claim', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Policy Claim', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Policy Claim', 'text_domain' ),
		'items_list'            => __( 'Policy Claims list', 'text_domain' ),
		'items_list_navigation' => __( 'Policy Claims list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Policy Claims list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'space',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Policy Claim', 'text_domain' ),
		'description'           => __( 'Post type for Policy Claims', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( '' ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-yes-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'claim', $args );

}
add_action( 'init', 'Create_PostType_Claim', 0 );

// Register Custom Fields for Custom Post Type - Policy
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_policydetails',
		'title' => 'Policy Details',
		'fields' => array(
			array(
				'key' => 'policy_name',
				'label' => 'Policy Name',
				'name' => 'policy_name',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'policy_id',
				'label' => 'Policy ID',
				'name' => 'policy_id',
				'type' => 'number',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'live_date',
				'label' => 'Live date',
				'name' => 'live_date',
				'type' => 'date_picker',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'd/m/Y',
				'return_format' => 'd/m/Y',
				'first_day' => 1,
			),
			array(
				'key' => 'policy_description',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'policy',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
endif;

// Register Custom Fields for Custom Post Type - Claim
if( function_exists('acf_add_local_field_group') ):
	
	acf_add_local_field_group(array(
		'key' => 'policy_claimdetails',
		'title' => 'Policy Claim Detail',
		'fields' => array(
			array(
				'key' => 'policy_id',
				'label' => 'Policy ID',
				'name' => 'policy_id',
				'type' => 'number',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'claim_name',
				'label' => 'Name',
				'name' => 'name',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'claim_email',
				'label' => 'Email',
				'name' => 'email',
				'type' => 'email',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'claim',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
endif;