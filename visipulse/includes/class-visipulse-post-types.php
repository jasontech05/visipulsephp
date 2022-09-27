<?php

/**
 * The fucntionality for visitor custom post types
 *
 * @link       https://smartan.ca
 * @since      1.0.0
 *
 * @package    Visipulse
 * @subpackage Visipulse/includes
 */

class Visipulse_Post_Types {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The Template Loader of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */

	private $template_loader;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->template_loader = $this->get_template_loader();

	}

	/**
	 * 
	 * Hooked into 'init' action
	 * 
	 */
	public function init () {

	$this->register_visitor_post_type();
	$this->register_taxonomy_location();
		
	}

	/**
	 * Register custom post type Visitors.
	 *
	 * @since    1.0.0
	 */

	public function register_visitor_post_type () {
	
		$labels = array(
			'name'                  => _x( "Visipulse Visitor Management", 'Post type general name', 'visipulse' ),
			'singular_name'         => _x( 'Visitor', 'Post type singular name', 'visipulse' ),
			'menu_name'             => _x( 'Visitors', 'Admin Menu text', 'visipulse' ),
			'name_admin_bar'        => _x( 'Visitor', 'Add New on Toolbar', 'visipulse' ),
			'add_new'               => __( 'New Visitor', 'visipulse' ),
			'add_new_item'          => __( 'Add Visitor', 'visipulse' ),
			'new_item'              => __( 'New Visitor', 'visipulse' ),
			'edit_item'             => __( 'Edit Visitor', 'visipulse' ),
			'view_item'             => __( 'View Visitor', 'visipulse' ),
			'all_items'             => __( 'All Visitors', 'visipulse' ),
			'search_items'          => __( 'Search Visitors', 'visipulse' ),
			'parent_item_colon'     => __( 'Parent Visitor:', 'visipulse' ),
			'not_found'             => __( 'Visitor Not Found.', 'visipulse' ),
			'not_found_in_trash'    => __( 'No Visitors Found in Trash Deleted.', 'visipulse' ),
			'featured_image'        => _x( 'Visitor Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'visipulse' ),
			'set_featured_image'    => _x( 'Set visitor image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'visipulse' ),
			'remove_featured_image' => _x( 'Remove visitor image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'visipulse' ),
			'use_featured_image'    => _x( 'Use as visitor image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'visipulse' ),
			'archives'              => _x( 'Visitor archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'visipulse' ),
			'insert_into_item'      => _x( 'Insert into visitor', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'visipulse' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this visitor', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'visipulse' ),
			'filter_items_list'     => _x( 'Filter visitor list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'visipulse' ),
			'items_list_navigation' => _x( 'Visitor list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'visipulse' ),
			'items_list'            => _x( 'Visitor list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'visipulse' ),
		);     
		$args = array(
			'labels'             => $labels,
			'description'        => "Keep track of visitors: know who is in your office at all times and keep an accurate log of when they arrived and left.",
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'visitor' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 20,
			'menu_icon'          =>'dashicons-groups',
			'supports'           => array( 'title', 'editor' ),
			'taxonomies'         => array( 'location' ),
			'show_in_rest'       => true
		);
		 
		register_post_type( 'visitors', $args );
	}

	/**
	 * Register custom Taxonomy Location.
	 *
	 * @since    1.0.0
	 */

	public function register_taxonomy_location() {

		register_taxonomy( 'location', array( 'visitors' ), array(
			'description'       => 'Location',
			'labels'            => array(
				'name'                       => _x( 'Location', 'taxonomy general name', 'visipulse' ),
				'singular_name'              => _x( 'Location', 'taxonomy singular name', 'visipulse' ),
				'search_items'               => __( 'Search Location', 'visipulse' ),
				'popular_items'              => __( 'Popular Location', 'visipulse' ),
				'all_items'                  => __( 'All Location', 'visipulse' ),
				'parent_item'                => __( 'Parent Location', 'visipulse' ),
				'parent_item_colon'          => __( 'Parent Location:', 'visipulse' ),
				'edit_item'                  => __( 'Edit Location', 'visipulse' ),
				'view_item'                  => __( 'View Location', 'visipulse' ),
				'update_item'                => __( 'Update Location', 'visipulse' ),
				'add_new_item'               => __( 'Add New Location', 'visipulse' ),
				'new_item_name'              => __( 'New Location Name', 'visipulse' ),
				'separate_items_with_commas' => __( 'Separate location with commas', 'visipulse' ),
				'add_or_remove_items'        => __( 'Add or remove location', 'visipulse' ),
				'choose_from_most_used'      => __( 'Choose from the most used location', 'visipulse' ),
				'not_found'                  => __( 'No location found.', 'visipulse' ),
			),
			'public'            => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'meta_box_cb'       => null,
			'show_admin_column' => true,
			'hierarchical'      => true,
			'query_var'         => 'location',
			'rewrite'           => array(
				'slug'         => 'location',
				'with_front'   => true,
				'hierarchical' => true,
			),
			'capabilities'      => array(),
			'show_in_rest'      => true,
		) );
	}

/**
 * 
 * Filter content for Visitors
 * 
 *The content of the visitor / visitor post type.
 * 
 */
	
	public function content_single_visitor ( $the_content) {

		// filter contents for just Visitors

		if (in_the_loop() && is_singular('visitors')){

	//	return "<pre>" . $the_content . "</pre>";
	ob_start();
		include VISIPULSE_BASE_DIR . 'templates/visipulse-content.php';
	return ob_get_clean();
		}

		return $the_content;
	}

/**
 * 
 * 
 * Single Template for CPT: Visitor
 * 
 */

 public function single_template_visitor ($template) {

	if (is_singular( 'visitors' )) {
	
	//**Template for Single Visitor *//
	return $this->template_loader->get_template_part( 'visitor', 'page', false );
 }
	return $template;
 }

 /**
 * 
 * 
 * Archive Template for CPT: Visitor
 * 
 */

public function archive_template_visitor ($template) {

	if ( is_post_type_archive( 'visitors' ) || is_tax ( 'location' )) {
	
	//**Template for Visitor archive *//

	return $this->template_loader->get_template_part( 'archive', 'page', false );
	}
	return $template;

 }

 /**
 * 
 * 
 * Template Loader Class
 * 
 */
public function get_template_loader () {

	require_once VISIPULSE_BASE_DIR.'public/class-visipulse-visitor-template-loader.php';

	return new Visipulse_Template_Loader();

}


}