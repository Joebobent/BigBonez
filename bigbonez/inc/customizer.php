<?php
/**
 * BigBonez Theme Customizer
 *
 * @package BigBonez
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bnz_customize_register( $wp_customize ) {

	// Site Identity
	require_once('customizer/site-identity.php');

	// Site Header
	require_once('customizer/site-header.php');

	// Page Settings
	require_once('customizer/page-settings.php');

	// Theme Settings
	// require_once('customizer/theme-settings.php');

	// Social Network
	require_once('customizer/social-networks.php');

	// -- DEFAULT CODE (CHECK & DELETE) --

	// $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	// $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	// $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// if ( isset( $wp_customize->selective_refresh ) ) {
	// 	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	// 		'selector'        => '.site-title a',
	// 		'render_callback' => 'bnz_customize_partial_blogname',
	// 	) );
	// 	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	// 		'selector'        => '.site-description',
	// 		'render_callback' => 'bnz_customize_partial_blogdescription',
	// 	) );
	// }
}
add_action( 'customize_register', 'bnz_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bnz_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bnz_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bnz_customize_preview_js() {
	wp_enqueue_script( 'bnz-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bnz_customize_preview_js' );
