<?php
/**
 * Post / Page Metabox Configurations
 *
 * @link https://developer.wordpress.org/reference/functions/add_meta_box/
 * @tutorial https://www.smashingmagazine.com/2011/10/create-custom-post-meta-boxes-wordpress/
 *
 * @package J-Bones
 */

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'bnz_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'bnz_post_meta_boxes_setup' );

/* Meta box setup function. */
function bnz_post_meta_boxes_setup() {
	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'bnz_add_meta_boxes' );
	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'bnz_save_meta_header', 10, 2 );
	add_action( 'save_post', 'bnz_save_meta_sidebar', 10, 2 );
	add_action( 'save_post', 'bnz_save_meta_class', 10, 2 );
	add_action( 'save_post', 'bnz_save_meta_top_content', 10, 2 );

}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function bnz_add_meta_boxes() {
	add_meta_box(
		'bnz-above-content',      // Unique ID
		esc_html__( 'Top Content', 'example' ),    // Title
		'bnz_above_content_meta_box',   // Callback function
		'page',         // Admin page (or post type)
		'normal',       // Context
		'high'       // Priority
    );
	add_meta_box(
		'bnz-post-class',      // Unique ID
		esc_html__( 'Page Class', 'example' ),    // Title
		'bnz_post_class_meta_box',   // Callback function
		'page',         // Admin page (or post type)
		'side',         // Context
		'default'       // Priority
    );
	add_meta_box(
		'bnz-post-class',      // Unique ID
		esc_html__( 'Post Class', 'example' ),    // Title
		'bnz_post_class_meta_box',   // Callback function
		'post',         // Admin page (or post type)
		'side',         // Context
		'default'       // Priority
    );
	add_meta_box(
		'bnz-sidebar',      // Unique ID
		esc_html__( 'Page Sidebar', 'example' ),    // Title
		'bnz_post_sidebar_meta_box',   // Callback function
		'page',         // Admin page (or post type)
		'side',         // Context
		'default'       // Priority
    );
	add_meta_box(
		'bnz-sidebar',      // Unique ID
		esc_html__( 'Post Sidebar', 'example' ),    // Title
		'bnz_post_sidebar_meta_box',   // Callback function
		'post',         // Admin page (or post type)
		'side',         // Context
		'default'       // Priority
    );
	add_meta_box(
		'bnz-header',      // Unique ID
		esc_html__( 'Page Header Settings', 'example' ),    // Title
		'bnz_header',   // Callback function
		'page',         // Admin page (or post type)
		'side',         // Context
		'default'       // Priority
	);
	add_meta_box(
		'bnz-header',      // Unique ID
		esc_html__( 'Post Header Settings', 'example' ),    // Title
		'bnz_header',   // Callback function
		'post',         // Admin page (or post type)
		'side',         // Context
		'default'       // Priority
	);
}


// Site Identity
require_once('metabox/top-content.php');

// Sidebar Selection
require_once('metabox/sidebar-selection.php');

// Header Settings
require_once('metabox/header-settings.php');

// Custom Class
require_once('metabox/custom-class.php');



