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

// Enqueue scripts and styles.
function tower_scripts() {
	wp_enqueue_style( 'tower-style', get_stylesheet_uri() );
	wp_enqueue_style( 'tower-custom-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_script( 'tower-scripts', get_template_directory_uri() . '/assets/js/scripts.js' );
}
add_action( 'wp_enqueue_scripts', 'tower_scripts' );

// Incude Bootstrap Framework files
function enqueue_bootstrap_scripts() {
    wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_scripts');

function enqueue_bootstrap_css() {
    wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_css');

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


//Listing Page - Columns for Custom Post Type - Policy
add_filter( 'manage_edit-policy_columns', 'policy_columns' ) ;

function policy_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'policy_name' => __( 'Policy Name' ),
		'policy_id' => __( 'Policy ID' ),
		'live_date' => __( 'Live Date' )
	);
	return $columns;
}

add_action( 'manage_policy_posts_custom_column', 'render_policy_list', 10, 2 );

function render_policy_list( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'policy_name' :

			/* Get the post meta. */
			$policy_name = get_field('policy_name');

			/* If no policy_name is found, output a default message. */
			if ( empty( $policy_name ) )
				echo __( '-' );
			else
				echo '<a href="' . get_edit_post_link($post) . '">' .$policy_name. '</a>';
			break;

		case 'policy_id' :

  			/* Get the post meta. */
			$policy_id = get_field('policy_id');

  			/* If no policy_id is found, output a default message. */
  			if ( empty( $policy_id ) )
  				echo __( '-' );
  			else
  				printf( __( '%s' ), $policy_id );
  			break;

		case 'live_date' :

  			/* Get the post meta. */
			$live_date = get_field('live_date');

  			/* If no live_date is found, output a default message. */
  			if ( empty( $live_date ) )
  				echo __( '-' );
  			else
  				printf( __( '%s' ), $live_date );

  			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}

add_filter("manage_edit-policy_sortable_columns", "make_policy_list_sortable" );

function make_policy_list_sortable( $columns )
{
  $columns = array(
		'policy_name' => __( 'Policy Name' ),
		'policy_id' => __( 'Policy ID' ),
		'live_date' => __( 'Live Date' )
	);
	return $columns;
}


//Listing Page - Columns for Custom Post Type - Claim
add_filter( 'manage_edit-claim_columns', 'claim_columns' ) ;

function claim_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'name' => __( 'Name' ),
		'policy_id' => __( 'Policy ID' ),
		'email' => __( 'Email' )
	);

	return $columns;
}

add_action( 'manage_claim_posts_custom_column', 'render_claim_list', 10, 2 );

function render_claim_list( $column, $post_id ) {
	global $post;

	switch( $column ) {

		case 'policy_id' :

  			/* Get the post meta. */
			$policy_id = get_field('policy_id');

  			/* If no policy_id is found, output a default message. */
  			if ( empty( $policy_id ) )
  				echo __( '-' );
  			else
  				printf( __( '%s' ), $policy_id );

  			break;
		case 'name' :

			/* Get the post meta. */
			$name = get_field('name');

			/* If no name is found, output a default message. */
			if ( empty( $name ) )
				echo __( '-' );
			else
				echo '<a href="' . get_edit_post_link($post) . '">' .$name. '</a>';

			break;

		case 'email' :

  			/* Get the post meta. */
			$email = get_field('email');

  			/* If no email is found, output a default message. */
  			if ( empty( $email ) )
  				echo __( '-' );
  			else
  				printf( __( '%s' ), $email );

  			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}

add_filter("manage_edit-claim_sortable_columns", "make_claim_list_sortable" );

function make_claim_list_sortable( $columns )
{
  $columns = array(
		'policy_id' => __( 'Policy ID' ),
		'name' => __( 'Name' ),
		'email' => __( 'Email' )
	);
	return $columns;
}


// Validate PolicyID for Post Types - Claim
add_action('save_post', 'validate_policyID', 10000, 2); 
function validate_policyID($post_id, $post) {

	if ($post->post_type != 'claim') return;

	$post_type = 'policy';
	$meta_key = 'policy_id';
   
	// look up the current policy_id for this claim post
	$policy_id = get_post_meta($post_id, $meta_key, true);
  
	global $wpdb;
	$query = 'select a.id from '.$wpdb->posts.' a inner join '.$wpdb->postmeta.' b on a.id = b.post_id where a.post_type = "'.$post_type.'" and b.meta_key = "'.$meta_key.'" and b.meta_value = "'.$policy_id.'" and a.id != '.$post_id.' limit 1';
   	$q = $wpdb->prepare($query);
	$exists = $wpdb->get_var($q);
  
	//If policy_id does not exists then set it to zero and notify user
	if (!$exists){
			  update_post_meta($post_id, $meta_key, '0');
			  # Add a notification
			  update_option('my_notifications', json_encode(array('error', 'Invalid Policy ID - '.$mls_id)));
			  # And redirect
			  header('Location: '.get_edit_post_link($post_id, 'redirect'));
			  exit;
	}
  }

  //Function to display admin notification
  function my_notification() {
	$notifications = get_option('my_notifications');

	if (!empty($notifications)) {
		$notifications = json_decode($notifications);
		#notifications[0] = (string) Type of notification: error, updated or update-nag
		#notifications[1] = (string) Message
		#notifications[2] = (boolean) is_dismissible?
		switch ($notifications[0]) {
			case 'error': # red
			case 'updated': # green
			case 'update-nag': # ?
				$class = $notifications[0];
				break;
			default:
				# Defaults to error just in case
				$class = 'error';
				break;
		}

		$is_dismissable = '';
		if (isset($notifications[2]) && $notifications[2] == true)
			$is_dismissable = 'is_dismissable';

		echo '<div class="'.$class.' notice '.$is_dismissable.'">';
		echo '<p>'.$notifications[1].'</p>';
		echo '</div>';

		#Reset the notification
		update_option('my_notifications', false);
	}
}
add_action( 'admin_notices', 'my_notification' );


//set title from custom post
function autogenerate_title_from_customfields( $post_id, $post ){
       
	if ( 'policy' == $post->post_type ) {
		$policy_name = get_post_meta( $post_id, 'policy_name', true );
		$new_title = sanitize_text_field( $policy_name );
		$new_slug = sanitize_title( $policy_name );
			
		$args = array(
		'ID'          =>   $post_id,
		'post_title'  =>   $new_title,
		'post_name'   =>   $new_slug
		);
	
		// unhook this function so it doesn't loop infinitely
		 remove_action('save_post', 'autogenerate_title_from_customfields',30,2);
  
		 // update the post, which calls save_post again
		 wp_update_post( $args );
  
		 // re-hook this function
		 add_action('save_post', 'autogenerate_title_from_customfields',30,2); 
   	} 
   
	if ( 'claim' == $post->post_type ) {
		$name = get_post_meta( $post_id, 'name', true );
		$new_title = sanitize_text_field( $name );
		$new_slug = sanitize_title( $name );
			
		$args = array(
		'ID'          =>   $post_id,
		'post_title'  =>   $new_title,
		'post_name'   =>   $new_slug
		);
  
		// unhook this function so it doesn't loop infinitely
		 remove_action('save_post', 'autogenerate_title_from_customfields',30,2);
  
		 // update the post, which calls save_post again
		 wp_update_post( $args );
  
		 // re-hook this function
		 add_action('save_post', 'autogenerate_title_from_customfields',30,2); 
    } 
 }
 add_action( 'save_post', 'autogenerate_title_from_customfields', 30, 2 );

//remove autosave functionality as sometimes it saves title as draft
function disable_autosave() {
	wp_deregister_script('autosave');
  }
  add_action('wp_print_scripts','disable_autosave' );
  remove_action('pre_post_update','wp_save_post_revision' );


//REST API for Policy
add_action( 'rest_api_init', 'create_rest_api_policies' );   

function create_rest_api_policies() {
    register_rest_route( 'v2', '/policies', array(
        'methods' => 'GET',
        'callback' => 'rest_pi_get_all_policies_callback'
    ));
}

function rest_pi_get_all_policies_callback( $request ) {
    // Initialize the array that will receive the posts' data. 
    $posts_data = array();

    // Receive and set the page parameter from the $request for pagination purposes
    $paged = $request->get_param( 'page' );
    $paged = ( isset( $paged ) || ! ( empty( $paged ) ) ) ? $paged : 1; 

    // Get the posts using the 'post' and 'news' post types
    $posts = get_posts( array(
            'paged' => $paged,
            'posts_per_page' => 10,            
            'post_type' => array( 'policy' ), // This is the line that allows to fetch multiple post types. 
			'post_status'     => 'publish',
        )
    ); 

    // Loop through the posts and push the desired data to the array we've initialized earlier in the form of an object
    foreach( $posts as $post ) {
        $id = $post->ID; 
        $post_thumbnail = ( has_post_thumbnail( $id ) ) ? get_the_post_thumbnail_url( $id ) : null;

        $posts_data[] = (object) array( 
            'id' => $id, 
            'url' => get_permalink($id),
            'title' => get_post_meta($id, 'policy_name', true),
			'policy_id' => get_post_meta($id, 'policy_id', true),
			'live_date' => get_post_meta($id, 'live_date', true),
			'description' => get_post_meta($id, 'description', true)
        );
    }                  
    return $posts_data;                   
}

//Resolve CURL error to fetch API
add_filter( 'https_ssl_verify', '__return_false' );