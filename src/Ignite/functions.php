<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'ignite' ),
		'about'	=>	__( 'About us', 'ignite' ),
		'contractors'	=>	__( 'Contractors', 'ignite' ),
		'employers'	=>	__( 'Employers', 'ignite' ),
		'job'	=>	__( 'Job Seeker', 'ignite' ),
		'specialisations'	=>	__( 'Specialisations/Expertise', 'ignite' ),
		'header-about'	=>	__( 'Header About Us', 'ignite' ),
 		'header-job'	=>	__( 'Header Job Seeker', 'ignite' ),
		'header-employer'	=>	__( 'Header Employer', 'ignite' ),
		'header-contact'	=>	__( 'Header Contact', 'ignite' ),
		'header-top-nav'	=>	__( 'Header Top Nav', 'ignite' )
	)
);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function naked_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'naked_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function naked_scripts()  { 

	// get the theme directory style.css and link to it in the header
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
	
// 	wp_enqueue_script('custom-script', get_template_directory_uri() . '/scripts/modules/theme-module.js', array('jquery'), '1.0', true);

	// Pass the endpoint URL to the JavaScript file
//     wp_localize_script('theme-module', 'asyncRequestData', array(
//         'endpointUrl' => 'https://ws.idibu.com/ws/rest/v1/jobs/live?hash=b94253bec084d37217eab789d5b79fc4',
//     ));
	
	// add fitvid
// 	wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );
	
	// add theme scripts
  
}
add_action( 'wp_enqueue_scripts', 'naked_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header

function custom_post_specialisations() {
	$labels = array(
	  'name'               => _x( 'Specialisation', 'post type general name' ),
	  'singular_name'      => _x( 'Specialisation', 'post type singular name' ),
	  'add_new'            => _x( 'Add Specialisation', 'Projects' ),
	  'add_new_item'       => __( 'Add New Specialisation' ),
	  'edit_item'          => __( 'Edit Specialisation' ),
	  'new_item'           => __( 'New Specialisation' ),
	  'all_items'          => __( 'All Specialisations' ),
	  'view_item'          => __( 'View Specialisation' ),
	  'search_items'       => __( 'Search Specialisations' ),
	  'not_found'          => __( 'No Specialisation found' ),
	  'not_found_in_trash' => __( 'No Specialisation found in the Trash' ), 
	  'menu_name'          => 'Specialisations',
	  'name_admin_bar'        => __( 'Specialisations', 'text_domain' ),
	  'archives'              => __( '', 'text_domain' ),
	  'attributes'            => __( '', 'text_domain' ),
	  'parent_item_colon'     => __( '', 'text_domain' ),
	  'update_item'           => __( 'Update Specialisation', 'text_domain' ),
	  'view_items'            => __( 'View Specialisation', 'text_domain' ),
	  'featured_image'        => __( 'Featured Image', 'text_domain' ),
	  'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
	  'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
	  'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
	  'insert_into_item'      => __( 'Insert into Specialisations', 'text_domain' ),
	  'uploaded_to_this_item' => __( 'Uploaded to this Specialisation', 'text_domain' ),
	  'items_list'            => __( 'Specialisations list', 'text_domain' ),
	  'items_list_navigation' => __( 'Specialisations list navigation', 'text_domain' ),
	  'filter_items_list'     => __( 'Filter Specialisations list', 'text_domain' ),
	);
	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Holds our Specialisations specific data',
		'labels'                => $labels,
		'supports'              => array( 'title','editor','thumbnail'),
		'hierarchical'          => false,
		'public'                => true,
		'has_archive'			=> false,
		'show_ui'               => true,
		'query_var' => true,
    	'rewrite' 				=> array(
					'with_front' => false,
					'slug'       => 'specialisations'),
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'show_in_rest' => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'specialisations', $args ); 
	register_taxonomy('category_specialisations','specialisations',array('heirarchical'=>true,'show_admin_column'=> true,'label'=>'Categories','query_var'=>true,'rewrite'=>true));
	register_taxonomy('tags_specialisations','specialisations',array('heirarchical'=>false,'show_admin_column'=> true,'label'=>'Tags','query_var'=>true,'rewrite'=>true));
}
add_action( 'init', 'custom_post_specialisations' );

function custom_post_services() {
	$labels = array(
	  'name'               => _x( 'Services', 'post type general name' ),
	  'singular_name'      => _x( 'Service', 'post type singular name' ),
	  'add_new'            => _x( 'Add Service', 'Projects' ),
	  'add_new_item'       => __( 'Add New Service' ),
	  'edit_item'          => __( 'Edit Service' ),
	  'new_item'           => __( 'New Service' ),
	  'all_items'          => __( 'All Services' ),
	  'view_item'          => __( 'View Services' ),
	  'search_items'       => __( 'Search Services' ),
	  'not_found'          => __( 'No Service found' ),
	  'not_found_in_trash' => __( 'No Service found in the Trash' ), 
	  'menu_name'          => 'Services',
	  'name_admin_bar'        => __( 'Services', 'text_domain' ),
	  'archives'              => __( '', 'text_domain' ),
	  'attributes'            => __( '', 'text_domain' ),
	  'parent_item_colon'     => __( '', 'text_domain' ),
	  'update_item'           => __( 'Update Service', 'text_domain' ),
	  'view_items'            => __( 'View Service', 'text_domain' ),
	  'featured_image'        => __( 'Featured Image', 'text_domain' ),
	  'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
	  'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
	  'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
	  'insert_into_item'      => __( 'Insert into Services', 'text_domain' ),
	  'uploaded_to_this_item' => __( 'Uploaded to this Service', 'text_domain' ),
	  'items_list'            => __( 'Services list', 'text_domain' ),
	  'items_list_navigation' => __( 'Services list navigation', 'text_domain' ),
	  'filter_items_list'     => __( 'Filter Services list', 'text_domain' ),
	);
	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Holds our Services specific data',
		'labels'                => $labels,
		'supports'              => array( 'title','editor','thumbnail'),
		'hierarchical'          => false,
		'public'                => true,
		'has_archive'			=> false,
		'show_ui'               => true,
		'query_var' => true,
    	'rewrite' 				=> array(
					'with_front' => false,
					'slug'       => 'services'),
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'show_in_rest' => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'services', $args ); 
	register_taxonomy('category_services','services',array('heirarchical'=>true,'show_admin_column'=> true,'label'=>'Categories','query_var'=>true,'rewrite'=>true));
	register_taxonomy('tags_services','services',array('heirarchical'=>false,'show_admin_column'=> true,'label'=>'Tags','query_var'=>true,'rewrite'=>true));
}
add_action( 'init', 'custom_post_services' );


function custom_post_locations() {
	$labels = array(
	  'name'               => _x( 'Locations', 'post type general name' ),
	  'singular_name'      => _x( 'Location', 'post type singular name' ),
	  'add_new'            => _x( 'Add Location', 'Projects' ),
	  'add_new_item'       => __( 'Add New Location' ),
	  'edit_item'          => __( 'Edit Location' ),
	  'new_item'           => __( 'New Location' ),
	  'all_items'          => __( 'All Locations' ),
	  'view_item'          => __( 'View Locations' ),
	  'search_items'       => __( 'Search Locations' ),
	  'not_found'          => __( 'No Location found' ),
	  'not_found_in_trash' => __( 'No Location found in the Trash' ), 
	  'menu_name'          => 'Locations',
	  'name_admin_bar'        => __( 'Location', 'text_domain' ),
	  'archives'              => __( '', 'text_domain' ),
	  'attributes'            => __( '', 'text_domain' ),
	  'parent_item_colon'     => __( '', 'text_domain' ),
	  'update_item'           => __( 'Update Location', 'text_domain' ),
	  'view_items'            => __( 'View Location', 'text_domain' ),
	  'featured_image'        => __( 'Featured Image', 'text_domain' ),
	  'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
	  'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
	  'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
	  'insert_into_item'      => __( 'Insert into Locations', 'text_domain' ),
	  'uploaded_to_this_item' => __( 'Uploaded to this Location', 'text_domain' ),
	  'items_list'            => __( 'Locations list', 'text_domain' ),
	  'items_list_navigation' => __( 'Locations list navigation', 'text_domain' ),
	  'filter_items_list'     => __( 'Filter Locations list', 'text_domain' ),
	);
	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Holds our Locations specific data',
		'labels'                => $labels,
		'supports'              => array( 'title','editor','thumbnail'),
		'hierarchical'          => false,
		'public'                => true,
		'has_archive'			=> false,
		'show_ui'               => true,
		'query_var' => true,
    	'rewrite' 				=> array(
					'with_front' => false,
					'slug'       => 'locations'),
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'show_in_rest' => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'locations', $args ); 
	register_taxonomy('category_locations','services',array('heirarchical'=>true,'show_admin_column'=> true,'label'=>'Categories','query_var'=>true,'rewrite'=>true));
	register_taxonomy('tags_locations','locations',array('heirarchical'=>false,'show_admin_column'=> true,'label'=>'Tags','query_var'=>true,'rewrite'=>true));
}
add_action( 'init', 'custom_post_locations' );


function custom_post_consultants() {
	$labels = array(
	  'name'               => _x( 'Consultants', 'post type general name' ),
	  'singular_name'      => _x( 'Consultant', 'post type singular name' ),
	  'add_new'            => _x( 'Add Consultant', 'Projects' ),
	  'add_new_item'       => __( 'Add New Consultant' ),
	  'edit_item'          => __( 'Edit Consultant' ),
	  'new_item'           => __( 'New Consultant' ),
	  'all_items'          => __( 'All Consultants' ),
	  'view_item'          => __( 'View Consultants' ),
	  'search_items'       => __( 'Search Consultants' ),
	  'not_found'          => __( 'No Consultant found' ),
	  'not_found_in_trash' => __( 'No Consultant found in the Trash' ), 
	  'menu_name'          => 'Consultants',
	  'name_admin_bar'        => __( 'Consultant', 'text_domain' ),
	  'archives'              => __( '', 'text_domain' ),
	  'attributes'            => __( '', 'text_domain' ),
	  'parent_item_colon'     => __( '', 'text_domain' ),
	  'update_item'           => __( 'Update Consultant', 'text_domain' ),
	  'view_items'            => __( 'View Consultant', 'text_domain' ),
	  'featured_image'        => __( 'Featured Image', 'text_domain' ),
	  'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
	  'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
	  'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
	  'insert_into_item'      => __( 'Insert into Consultants', 'text_domain' ),
	  'uploaded_to_this_item' => __( 'Uploaded to this Consultant', 'text_domain' ),
	  'items_list'            => __( 'Consultants list', 'text_domain' ),
	  'items_list_navigation' => __( 'Consultants list navigation', 'text_domain' ),
	  'filter_items_list'     => __( 'Filter Consultants list', 'text_domain' ),
	);
	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Holds our Consultants specific data',
		'labels'                => $labels,
		'supports'              => array( 'title','editor','thumbnail'),
		'hierarchical'          => false,
		'public'                => true,
		'has_archive'			=> true,
		'show_ui'               => true,
		'query_var' => true,
    	'rewrite' 				=> array(
					'with_front' => false,
					'slug'       => 'consultants'),
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'show_in_rest' => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'consultants', $args ); 
}
add_action( 'init', 'custom_post_consultants' );

add_action( 'template_redirect', 'prefix_redirect_single_cpt' );
function prefix_redirect_single_cpt() {
    if ( is_singular( 'consultants' )) {
        wp_redirect( get_post_type_archive_link( 'consultants' ), 301 );
        exit;
    }
}

function custom_post_blogs() {
	$labels = array(
	  'name'               => _x( 'Blogs', 'post type general name' ),
	  'singular_name'      => _x( 'Blog', 'post type singular name' ),
	  'add_new'            => _x( 'Add Blog', 'Projects' ),
	  'add_new_item'       => __( 'Add New Blog' ),
	  'edit_item'          => __( 'Edit Blog' ),
	  'new_item'           => __( 'New Blog' ),
	  'all_items'          => __( 'All Blogs' ),
	  'view_item'          => __( 'View Blogs' ),
	  'search_items'       => __( 'Search Blogs' ),
	  'not_found'          => __( 'No Blog found' ),
	  'not_found_in_trash' => __( 'No Blog found in the Trash' ), 
	  'menu_name'          => 'Blogs',
	  'name_admin_bar'        => __( 'Blog', 'text_domain' ),
	  'archives'              => __( '', 'text_domain' ),
	  'attributes'            => __( '', 'text_domain' ),
	  'parent_item_colon'     => __( '', 'text_domain' ),
	  'update_item'           => __( 'Update Blog', 'text_domain' ),
	  'view_items'            => __( 'View Blog', 'text_domain' ),
	  'featured_image'        => __( 'Featured Image', 'text_domain' ),
	  'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
	  'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
	  'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
	  'insert_into_item'      => __( 'Insert into Blog', 'text_domain' ),
	  'uploaded_to_this_item' => __( 'Uploaded to this Blog', 'text_domain' ),
	  'items_list'            => __( 'Blogs list', 'text_domain' ),
	  'items_list_navigation' => __( 'Blogs list navigation', 'text_domain' ),
	  'filter_items_list'     => __( 'Filter Blogs list', 'text_domain' ),
	);
	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Holds our Blogs specific data',
		'labels'                => $labels,
		'supports'              => array( 'title','editor','thumbnail'),
		'hierarchical'          => false,
		'public'                => true,
		'has_archive'			=> false,
		'show_ui'               => true,
		'query_var' => true,
    	'rewrite' 				=> array(
					'with_front' => false,
					'slug'       => 'blogs'),
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'show_in_rest' => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'blogs', $args ); 
	register_taxonomy('category_blogs','blogs',array('heirarchical'=>true,'show_admin_column'=> true,'label'=>'Categories','query_var'=>true,'rewrite'=>true));
	register_taxonomy('tags_blogs','blogs',array('heirarchical'=>false,'show_admin_column'=> true,'label'=>'Tags','query_var'=>true,'rewrite'=>true));
}
add_action( 'init', 'custom_post_blogs' );


function custom_post_insights() {
	$labels = array(
	  'name'               => _x( 'Insights', 'post type general name' ),
	  'singular_name'      => _x( 'Insight', 'post type singular name' ),
	  'add_new'            => _x( 'Add Insight', 'Projects' ),
	  'add_new_item'       => __( 'Add New Insight' ),
	  'edit_item'          => __( 'Edit Insight' ),
	  'new_item'           => __( 'New Insight' ),
	  'all_items'          => __( 'All Insights' ),
	  'view_item'          => __( 'View Insight' ),
	  'search_items'       => __( 'Search Insights' ),
	  'not_found'          => __( 'No Insight found' ),
	  'not_found_in_trash' => __( 'No Insight found in the Trash' ), 
	  'menu_name'          => 'Advice Insights',
	  'name_admin_bar'        => __( 'Insight', 'text_domain' ),
	  'archives'              => __( '', 'text_domain' ),
	  'attributes'            => __( '', 'text_domain' ),
	  'parent_item_colon'     => __( '', 'text_domain' ),
	  'update_item'           => __( 'Update Insight', 'text_domain' ),
	  'view_items'            => __( 'View Insight', 'text_domain' ),
	  'featured_image'        => __( 'Featured Image', 'text_domain' ),
	  'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
	  'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
	  'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
	  'insert_into_item'      => __( 'Insert into Insight', 'text_domain' ),
	  'uploaded_to_this_item' => __( 'Uploaded to this Insight', 'text_domain' ),
	  'items_list'            => __( 'Insights list', 'text_domain' ),
	  'items_list_navigation' => __( 'Insights list navigation', 'text_domain' ),
	  'filter_items_list'     => __( 'Filter Insights list', 'text_domain' ),
	);
	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Holds our Insights specific data',
		'labels'                => $labels,
		'supports'              => array( 'title','editor','thumbnail'),
		'hierarchical'          => false,
		'public'                => true,
		'has_archive'			=> false,
		'show_ui'               => true,
		'query_var' 			=> true,
    	/*'rewrite' 				=> array(
					'with_front' => false,
					'slug'       => 'advice-insights'), */
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'show_in_rest' => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'insights', $args ); 
	register_taxonomy('category_insights','insights',array('heirarchical'=>true,'show_admin_column'=> true,'label'=>'Categories','query_var'=>true,'rewrite'=>true));
	register_taxonomy('tags_insights','insights',array('heirarchical'=>false,'show_admin_column'=> true,'label'=>'Tags','query_var'=>true,'rewrite'=>true));
}
add_action( 'init', 'custom_post_insights' );

function add_acf_to_custom_post_type_menu() {
	//Archive custom fields for blogs
    acf_add_options_page( array(
        'page_title' => 'Blogs Archive Custom Fields',
        'menu_title' => 'Archive Custom Fields',
        'menu_slug' => 'blogs-post-type-options',
        'capability' => 'manage_options',
        'parent_slug' => 'edit.php?post_type=blogs',
    ) );
	
	//Archive custom fields for Consultants
    acf_add_options_page( array(
        'page_title' => 'Consultants Archive Custom Fields',
        'menu_title' => 'Consultants Custom Fields',
        'menu_slug' => 'consultants-post-type-options',
        'capability' => 'manage_options',
        'parent_slug' => 'edit.php?post_type=consultants',
    ) );
	
	 acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
}
add_action( 'acf/init', 'add_acf_to_custom_post_type_menu' );

function my_enqueue_scripts() {
  wp_enqueue_script('jquery', get_template_directory_uri() . '/scripts/vendors/jquery.min.js');
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );

function my_ajaxurl() {
  echo '<script type="text/javascript">var ajaxurl = "' . admin_url('admin-ajax.php') . '";</script>';
}
add_action('wp_head', 'my_ajaxurl');

function post_search() {
	
  $searchQuery = $_POST['search_query'];
  $blogs_category = $_POST['blogs_category'];
  $paged = $_POST['paged'];
  if( $paged == ''){
	  $paged = 1;
  }
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : $paged;
  if($searchQuery != '' && $blogs_category != ''){
	  $args = array(
		's' => $searchQuery,
		'post_type' => array( 'blogs', 'insights' ),
		'posts_per_page' => 6,
		'tax_query' => array( 
		'relation' => 'AND',
		'paged' => $paged,
		array(
			'taxonomy' => 'category_blogs',
			'field'    => 'slug',
			'terms'    => $blogs_category,
		),
		),
	  );
  }
  elseif($searchQuery != '' && $blogs_category == ''){
	  $args = array(
		's' => $searchQuery,
		'post_type' => array( 'blogs', 'insights' ),
		'posts_per_page' => 6,
		'paged' => $paged,
	  );
  }

  $query = new WP_Query($args);
	$totalpost = $query->found_posts; 
	$total_page = $query->max_num_pages; ?>
    <span data-pages="<?php echo $total_page; ?>" class="invisible w-0 h-0 position-absolute" id="total_pages"></span>
	<span data-pages="<?php echo $paged; ?>" class="invisible w-0 h-0 position-absolute" id="current_page"></span>
	<span data-pages="<?php echo $totalpost; ?>" class="invisible w-0 h-0 position-absolute" id="found_article"></span>
	<?php if ($query->have_posts()) { ?>
	 <?php while ($query->have_posts()) {
      $query->the_post();?>
      <div class="post">
          <div class="image-wrapper">
			<?php $featured_image_id = get_post_thumbnail_id(get_the_ID());
			$alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
			$image_url = wp_get_attachment_image_src($featured_image_id, 'full')[0]; ?>
            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_html($image_url)?>" alt="<?php echo esc_html($alt_text)?>"></a>
          </div>
          <div class="content-wrapper">
            <a href="<?php the_permalink(); ?>"><h4 class="post-title"><?php the_title(); ?></h4></a>
            <p><?php echo wp_strip_all_tags(get_the_content()); ?></p>
            <a href="<?php the_permalink(); ?>" class="link-arrow">Read More</a>
          </div>
		</div>
	  <?php wp_reset_postdata();
    }
  } else {
    // no posts found message here
    echo "No posts found.";
  }

  wp_reset_postdata();
  wp_die();
}
add_action( 'wp_ajax_post_search', 'post_search' );
add_action( 'wp_ajax_nopriv_post_search', 'post_search' );

function insights_search() {
  $searchQuery = $_POST['search_query'];
  $tag = $_POST['tag'];
  
  $args = array(
	's' => $searchQuery,
	'post_type' => 'Insights',
	'post_status' => 'publish',
	'posts_per_page' => 9,
	'orderby' => 'date',
	'order' => 'DESC',
	'tax_query' => array( 
	'relation' => 'AND',
	array(
		'taxonomy' => 'tags_insights',
		'field'    => 'slug',
		'terms'    => $tag,
	),
	),
  );

  $query = new WP_Query($args);
	if ($query->have_posts()) {
	 while ($query->have_posts()) {
      $query->the_post();?>
      <div class="card-column">
        <div class="image-wrapper">
		  <?php $featured_image_id = get_post_thumbnail_id(get_the_ID());
		  $alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
		  $image_url = wp_get_attachment_image_src($featured_image_id, 'full')[0]; ?>
          <a href=""><img src="<?php echo esc_html($image_url)?>" alt="<?php echo esc_html($alt_text)?>"></a>
        </div>
        <div class="content-wrapper">
          <div class="title-wrapper">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
          </div>
          <p><?php echo wp_strip_all_tags(get_the_content()); ?></p>
          <a href="<?php the_permalink(); ?>" class="link-arrow">Download the Guide</a>
        </div>
      </div>
	  <?php wp_reset_postdata();
    }
  } else {
    // no posts found message here
    echo "No posts found.";
  }

  wp_reset_postdata();
  wp_die();
}
add_action( 'wp_ajax_insights_search', 'insights_search' );
add_action( 'wp_ajax_nopriv_insights_search', 'insights_search' );

function insights_load_more() {
  $searchQuery = $_POST['search_query'];
  $tag = $_POST['tag'];
  
  $args = array(
	's' => $searchQuery,
	'post_type' => 'Insights',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'DESC',
	'tax_query' => array( 
	'relation' => 'AND',
	array(
		'taxonomy' => 'tags_insights',
		'field'    => 'slug',
		'terms'    => $tag,
	),
	),
  );

  $query = new WP_Query($args);
	if ($query->have_posts()) {
	 while ($query->have_posts()) {
      $query->the_post();?>
      <div class="card-column">
        <div class="image-wrapper">
		  <?php $featured_image_id = get_post_thumbnail_id(get_the_ID());
		  $alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
		  $image_url = wp_get_attachment_image_src($featured_image_id, 'full')[0]; ?>
          <a href=""><img src="<?php echo esc_html($image_url)?>" alt="<?php echo esc_html($alt_text)?>"></a>
        </div>
        <div class="content-wrapper">
          <div class="title-wrapper">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
          </div>
          <p><?php echo wp_strip_all_tags(get_the_content()); ?></p>
          <a href="<?php the_permalink(); ?>" class="link-arrow">Download the Guide</a>
        </div>
      </div>
	  <?php wp_reset_postdata();
    }
  } else {
    // no posts found message here
    echo "No posts found.";
  }

  wp_reset_postdata();
  wp_die();
}
add_action( 'wp_ajax_insights_load_more', 'insights_load_more' );
add_action( 'wp_ajax_nopriv_insights_load_more', 'insights_load_more' );



function load_more_posts() {
    $searchQuery = $_POST['search_query'];
  $tag = $_POST['tag'];
  
  $args = array(
	's' => $searchQuery,
	'post_type' => array('insights', 'blogs'),
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'DESC',
  );

  $query = new WP_Query($args);
	if ($query->have_posts()) {
	 while ($query->have_posts()) {
      $query->the_post();?>
      <div class="card-column box-shadow">
        <div class="image-wrapper">
		  <?php $featured_image_id = get_post_thumbnail_id(get_the_ID());
		  $alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
		  $image_url = wp_get_attachment_image_src($featured_image_id, 'full')[0]; ?>
          <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_html($image_url)?>" alt="<?php echo esc_html($alt_text)?>"></a>
        </div>
        <div class="content-wrapper" style="background-color:#fff;">
          <div class="title-wrapper">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
          </div>
          <p><?php echo wp_strip_all_tags(get_the_content()); ?></p>
          <a href="<?php the_permalink(); ?>" class="link-arrow">Read More</a>
        </div>
      </div>
	  <?php wp_reset_postdata();
    }
  } else {
    // no posts found message here
    echo "No posts found.";
  }

  wp_reset_postdata();
  wp_die();
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<p class="menu-item-description">' . $item->description . '</p>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );

// function make_async_request() {
// 	set_time_limit(30); 
//     $headers = array(
//         'Accept' => 'application/xml',
//         'Content-Type' => 'application/xml',
//     );
	
// 	$hash = 'b94253bec084d37217eab789d5b79fc4';
// 	$baseurl = 'https://idibu.com/clients/board_scripts/ignite/igniteservices.xml';
//     $url = $baseurl.'/live?hash='.$hash;

//     $response = wp_remote_get($baseurl, array(
//         'headers' => $headers,
// 		'timeout' => 30, 
//     ));

//     if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
//         $body = wp_remote_retrieve_body($response);
		
// 		$array_data = json_decode(json_encode(simplexml_load_string($body)), true);
// 		$jobs = $array_data['response']['jobs']['job'];
		
// 		print_r('<pre>');
// 			print_r($array_data);
// 			print_r('</pre>');
		
// 		foreach ($jobs as $job) {
// 			$id = $job['id'];

// 			$detailurl = $baseurl.'/'.$id.'?hash='.$hash;
 			
// 			$detaildata = wp_remote_get($detailurl, array(
// 				'headers' => $headers,
// 			));
			
// 			$detail_data_body = wp_remote_retrieve_body($detaildata);

// 			$individual_array = json_decode(json_encode(simplexml_load_string($detail_data_body)), true);
// 			echo '<Br/>Detailed URL:'.$detailurl;
// 			print_r('<pre>');
// 			print_r($individual_array['response']['job']['title']);
// 			print_r('</pre>');
// 		}
		
//     } else {
//         $error_message = is_wp_error($response) ? $response->get_error_message() : 'Unknown error occurred.';
//         echo 'Error: ' . $error_message;
//     }
//     exit();

// }
// add_action('wp_ajax_make_async_request', 'make_async_request');
// add_action('wp_ajax_nopriv_make_async_request', 'make_async_request');
// 


//DOWNLOAD XML
function download_igniteservices_xml() {
    $xml_url = 'https://idibu.com/clients/board_scripts/ignite/igniteservices.xml';
    $destination_path = get_stylesheet_directory() . '/igniteservices.xml';

    $response = wp_remote_get($xml_url);

    if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
        $xml_data = wp_remote_retrieve_body($response);
        file_put_contents($destination_path, $xml_data);
    }
}

download_igniteservices_xml();

//SCHEDULE UPDATE
function schedule_xml_update() {
    if (!wp_next_scheduled('update_xml_cron')) {
        wp_schedule_event(time(), 'every_ten_minutes', 'update_xml_cron');
    }
}

add_action('wp', 'schedule_xml_update');

function custom_cron_schedules($schedules) {
    $schedules['every_ten_minutes'] = array(
        'interval' => 600, // 10 minutes in seconds - 600
        'display'  => __('Every 10 Minutes'),
    );
    return $schedules;
}

add_filter('cron_schedules', 'custom_cron_schedules');

//ACTUAL UPDATE
function update_xml_file() {
    $xml_url = 'https://idibu.com/clients/board_scripts/ignite/igniteservices.xml';
    $destination_path = get_stylesheet_directory() . '/igniteservices.xml';

    $response = wp_remote_get($xml_url);

    if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
        $xml_data = wp_remote_retrieve_body($response);
        file_put_contents($destination_path, $xml_data);
    }
}

add_action('update_xml_cron', 'update_xml_file');

//////////////////////////////////
// LATEST JOB SECTION
/////////////////////////////////

function get_jobs_section() {
    $xml_path = get_stylesheet_directory() . '/igniteservices.xml';
    $xml_data = '';

    if (file_exists($xml_path)) {
		
		$xml_data = file_get_contents($xml_path);
        $xml = simplexml_load_string($xml_data, 'SimpleXMLElement', LIBXML_NOCDATA);
        $json_data = json_encode($xml);
		
        $res = json_decode($json_data, true);
		
//      $title = $res['job'][1]['job_title'];

		$jobs = $res['job'];
		
// 		echo '<pre>';
// 		print_r ($res);
// 		echo '</pre>';
		
		$i = 0;
		foreach ($jobs as $job) {
			
			echo '<div class="">
									<div class="job-card">
									<div class="job-category">'.$job['job_industry'].'</div>
									<div class="job-title">'.$job['job_title'].'</div>

									<div class="job-details">
											<div class="d-flex justify-content-between  mb-4">
													<div class="location">
															<div class="label">LOCATION</div>
															<div class="value">'.$job['job_location'].'</div>
													</div>
													<div class="jobtype">
															<div class="label">JOB TYPE</div>
															<div class="value">'.$job['job_type'].'</div>
													</div>

											</div>

											<div class="salary">
													<div class="label">SALARAY</div>
													<div class="value">Term: '.$job['salary_per'].'</div>
													<div class="value">Min: '.$job['salary_currency'] .' '.number_format($job['salary_from'], 2, '.', ',').'</div>
													<div class="value">Max: '.$job['salary_currency'] .' '.number_format($job['salary_to'], 2, '.', ',').'</div>
											</div>
									</div>

											<a href="/" class="btn btn-solid">Apply Now</a>

									</div>
							</div>';



			if (++$i == 9) break;
		}
		
		
    } else {
        wp_send_json_error('XML file not found.');
    }
	
	wp_die();
}

add_action('wp_ajax_get_jobs_section', 'get_jobs_section');
add_action('wp_ajax_nopriv_get_jobs_section', 'get_jobs_section');


//////////////////////////////////
// JOB RESULTS PAGE
/////////////////////////////////

// function job_results() {
//     $xml_path = get_stylesheet_directory() . '/igniteservices.xml';
//     $xml_data = '';

//     if (file_exists($xml_path)) {
//         $xml_data = file_get_contents($xml_path);
//         $xml = simplexml_load_string($xml_data, 'SimpleXMLElement', LIBXML_NOCDATA);
//         $json_data = json_encode($xml);
//         $res = json_decode($json_data, true);
        
//         $jobs = $res['job'];

//         // Number of jobs per page
//         $jobs_per_page = 10;

//         // Get the current page number from the AJAX request
//         $current_page = isset($_POST['page']) ? intval($_POST['page']) : 1;

//         // Calculate the starting and ending indices for the current page
//         $start_index = ($current_page - 1) * $jobs_per_page;
//         $end_index = $start_index + $jobs_per_page - 1;
//         $end_index = min($end_index, count($jobs) - 1);

//         // Loop through the jobs and display the results for the current page
//         for ($i = $start_index; $i <= $end_index; $i++) {
//             $job = $jobs[$i];

//             echo '<div class="">
//                     <div class="job-title">' . $job['job_title'] . '</div>
//                 </div>';
//         }

//         // Calculate the total number of pages
//         $total_pages = ceil(count($jobs) / $jobs_per_page);

//         // Output the pagination links
//         echo '<div class="pagination">';
//         for ($page = 1; $page <= $total_pages; $page++) {
//             $class = ($page == $current_page) ? 'active' : '';
//             echo '<a href="#" class="' . $class . '" data-page="' . $page . '">' . $page . '</a>';
//         }
//         echo '</div>';
//     } else {
//         wp_send_json_error('XML file not found.');
//     }
    
//     wp_die();
// }

// add_action('wp_ajax_job_results', 'job_results');
// add_action('wp_ajax_nopriv_job_results', 'job_results');

function job_search() {
	
	/////////////////////// WORKING 2 WITH NEXT AND PREV PAGINATION
	$xml_path = get_stylesheet_directory() . '/igniteservices.xml';
	$xml_data = '';

	if (file_exists($xml_path)) {
		$xml_data = file_get_contents($xml_path);
		$xml = simplexml_load_string($xml_data, 'SimpleXMLElement', LIBXML_NOCDATA);
		$jobs = $xml->job;

		// Number of jobs per page
		$jobs_per_page = 10;

		// Get the current page number from the URL parameter
		$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

		// Calculate the starting and ending indices for the current page
		$start_index = ($current_page - 1) * $jobs_per_page;
		$end_index = $start_index + $jobs_per_page - 1;
		$end_index = min($end_index, count($jobs) - 1);

		// Store the job HTML content in a variable
		$job_html = '';
		
		for ($i = $start_index; $i <= $end_index; $i++) {
			$job = $jobs[$i];

			$job_html .= '<div class="job">' .
				'<div class="job-title">' . $job->job_title . '</div>' .
				'</div>';
		}

		// Calculate the total number of pages
		$total_pages = ceil(count($jobs) / $jobs_per_page);

		// Output the job HTML content and total pages
		$response = array(
			'html' => $job_html,
			'current_page' => $current_page,
			'total_pages' => $total_pages
		);

		wp_send_json_success($response);
	} else {
		wp_send_json_error('XML file not found.');
	}


	
}

add_action('wp_ajax_job_search', 'job_search');
add_action('wp_ajax_nopriv_job_search', 'job_search');

