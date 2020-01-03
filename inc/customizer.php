<?php
/**
 * Trends Theme Customizer
 *
 * @package trends-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function theme_customize_preview_js() {
	wp_enqueue_script( 'theme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'theme_customize_preview_js' );

/* Creates Header Settings
====================================
function header_customizer_settings($wp_customize) {
$wp_customize->add_panel( 'header_panel', array(
 'priority'       => 900,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __('Header Settings', 'trends-theme'),
	'description'    => __('Several header settings', 'trends-theme')
) );

// Adds the Header Logo section
$wp_customize->add_section( 'header_logo_section', array(
		'title' => __('Header Logo', 'rre-theme'),
		'panel'  => 'header_panel'
) );

	// Add the Header Logo
	$wp_customize->add_setting('header_logo_setting');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo_control',
	array(
	'label' => __('Upload Header Logo'),
	'section' => 'header_logo_section',
	'settings' => 'header_logo_setting',
	) ) );

// Adds the Share Price link
$wp_customize->add_section( 'share_price_link', array(
		'title' => __('Share Price Link', 'rre-theme'),
		'panel'  => 'header_panel'
) );

	// Get in Touch Link
	$wp_customize->add_setting('share_price_link_setting');

		$wp_customize->add_control( 'share_price_link_control', array(
		 'label' => __( 'Add the Share Price Link' ),
		 'type' => 'url',
		 'section' => 'share_price_link',
		 'settings' => 'share_price_link_setting'
		) );

}
add_action('customize_register', 'header_customizer_settings');
*/
/* Creates Footer Settings
====================================
function footer_customizer_settings($wp_customize) {
$wp_customize->add_panel( 'footer_panel', array(
 'priority'       => 900,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => __('Footer Settings', 'trends-theme'),
	'description'    => __('Several footer settings', 'trends-theme')
) );
/*
// Adds the Footer Logo section
$wp_customize->add_section( 'footer_logo_section', array(
		'title' => __('Footer Logo', 'rre-theme'),
		'panel'  => 'footer_panel'
) );

	// Add the Footer Logo
	$wp_customize->add_setting('footer_logo_setting');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_control',
	array(
	'label' => __('Upload Footer Logo'),
	'section' => 'footer_logo_section',
	'settings' => 'footer_logo_setting',
	) ) );

	// Adds the Email and Social Media Links section
	$wp_customize->add_section( 'email_social_media_section', array(
			'title' => __('Email, Social Media and Address Section', 'rre-theme'),
			'panel'  => 'footer_panel'
	) );

		// Get in Touch Link
		$wp_customize->add_setting('get_in_touch_setting');

			$wp_customize->add_control( 'get_in_touch_control', array(
			 'label' => __( 'Get in Touch Email Address' ),
			 'type' => 'email',
			 'section' => 'email_social_media_section',
			 'settings' => 'get_in_touch_setting'
			) );

		// Twitter Link
		$wp_customize->add_setting('twitter_setting');

			$wp_customize->add_control( 'twitter_control', array(
			 'label' => __( 'Twitter Link' ),
			 'type' => 'url',
			 'section' => 'email_social_media_section',
			 'settings' => 'twitter_setting'
			) );

		// Registered Office Address
		$wp_customize->add_setting('registered_office_setting');

			$wp_customize->add_control( 'registered_office_control', array(
			 'label' => __( 'Registered Office Address' ),
			 'type' => 'text',
			 'section' => 'email_social_media_section',
			 'settings' => 'registered_office_setting'
			) );


}
add_action('customize_register', 'footer_customizer_settings');
*/
