<?php
/**
 * EasyNews Theme Customizer
 *
 * @package EasyNews
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function easynews_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'easynews_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'easynews_customize_partial_blogdescription',
		) );
	}

	/*
	 * Site Title color
	 */
	$wp_customize->add_setting( 'site_title_color', array(
		'default'           => '#000000',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_title_color', array(
		'label'   => esc_html__( 'Site Title Color', 'easynews' ),
		'section' => 'colors',
	) ) );

	/*
	 * Tagline color
	 */
	$wp_customize->add_setting( 'site_tagline_color', array(
		'default'           => '#000000',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_tagline_color', array(
		'label'   => esc_html__( 'Site Tagline Color', 'easynews' ),
		'section' => 'colors',
	) ) );


	/*
	 * Primary color
	 */
	$wp_customize->add_setting( 'primary_color', array(
		'default'           => '#ff7052',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label'   => esc_html__( 'Primary Color', 'easynews' ),
		'section' => 'colors',
	) ) );

	/*
	 * Menu Item Color
	 */
	$wp_customize->add_setting( 'menu_color', array(
		'default'           => '#ffffff',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_color', array(
		'label'   => esc_html__( 'Menu Link Color', 'easynews' ),
		'section' => 'colors',
	) ) );

	/*
	 * Navigation background
	 */
	$wp_customize->add_setting( 'nav_color', array(
		'default'           => '#222222',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_color', array(
		'label'   => esc_html__( 'Navigation Background Color', 'easynews' ),
		'section' => 'colors',
	) ) );

	/*
	 * Menu Hover
	 */
	$wp_customize->add_setting( 'menu_hover_color', array(
		'default'           => '#282828',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_color', array(
		'label'   => esc_html__( 'Menu Hover Background', 'easynews' ),
		'section' => 'colors',
	) ) );

	/* Social */
	$wp_customize->add_section( 'social_media',
		array(
			'title'    => esc_html__( 'Topbar Socials', 'easynews' ),
			'priority' => 15
		)
	);
	$wp_customize->add_setting( 'facebook_url', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );
	$wp_customize->add_control(
		'facebook_url',
		array(
			'type'    => 'text',
			'label'   => esc_html__( 'Facebook', 'easynews' ),
			'section' => 'social_media',
		)
	);
	$wp_customize->add_setting( 'twitter_url', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );
	$wp_customize->add_control(
		'twitter_url',
		array(
			'type'    => 'text',
			'label'   => esc_html__( 'Twitter', 'easynews' ),
			'section' => 'social_media',
		)
	);
	$wp_customize->add_setting( 'gooogle_plus', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );
	$wp_customize->add_control(
		'gooogle_plus',
		array(
			'type'    => 'text',
			'label'   => esc_html__( 'Google+', 'easynews' ),
			'section' => 'social_media',
		)
	);
	$wp_customize->add_setting( 'pinterest_url', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );
	$wp_customize->add_control(
		'pinterest_url',
		array(
			'type'    => 'text',
			'label'   => esc_html__( 'Pinterest', 'easynews' ),
			'section' => 'social_media',
		)
	);
	$wp_customize->add_setting( 'tumblr_url', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );
	$wp_customize->add_control(
		'tumblr_url',
		array(
			'type'    => 'text',
			'label'   => esc_html__( 'Tumblr', 'easynews' ),
			'section' => 'social_media',
		)
	);
	$wp_customize->add_setting( 'reddit_url', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );
	$wp_customize->add_control(
		'reddit_url',
		array(
			'type'    => 'text',
			'label'   => esc_html__( 'Reddit', 'easynews' ),
			'section' => 'social_media',
		)
	);
	$wp_customize->add_setting( 'youtube_url', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );
	$wp_customize->add_control(
		'youtube_url',
		array(
			'type'    => 'text',
			'label'   => esc_html__( 'Youtube', 'easynews' ),
			'section' => 'social_media',
		)
	);
	$wp_customize->add_setting( 'linkedin_url', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );
	$wp_customize->add_control(
		'linkedin_url',
		array(
			'type'    => 'text',
			'label'   => esc_html__( 'Linkedin', 'easynews' ),
			'section' => 'social_media',
		)
	);
	$wp_customize->add_setting( 'instagram_url', array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );
	$wp_customize->add_control(
		'instagram_url',
		array(
			'type'    => 'text',
			'label'   => esc_html__( 'Instagram', 'easynews' ),
			'section' => 'social_media',
		)
	);
	$wp_customize->add_setting( 'email_address', array(
		'sanitize_callback' => 'sanitize_email',
		'default'           => '',
	) );
	$wp_customize->add_control(
		'email_address',
		array(
			'type'    => 'text',
			'label'   => esc_html__( 'Email', 'easynews' ),
			'section' => 'social_media',
		)
	);

   

}

add_action( 'customize_register', 'easynews_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function easynews_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function easynews_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function easynews_sanitize_html_input( $string ) {
	return wp_kses_post( $string );
}

function easynews_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function easynews_customize_preview_js() {
	wp_enqueue_script( 'easynews-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array(
		'customize-preview',
		'jquery'
	), '20151215', true );
}

add_action( 'customize_preview_init', 'easynews_customize_preview_js' );
