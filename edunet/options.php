<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace( "/\W/", "_", strtolower( $themename ) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'edunet'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// If using image radio buttons, define a directory path
	$imagepath =  trailingslashit( get_template_directory_uri() ) . 'images/';

	// Background Defaults
	$background_defaults = array(
		'color' => '#222222',
		'image' => $imagepath . 'dark-noise.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );

	// Editor settings
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	// Footer Position settings
	$footer_position_settings = array(
		'left' => esc_html__( 'Left aligned', 'edunet' ),
		'center' => esc_html__( 'Center aligned', 'edunet' ),
		'right' => esc_html__( 'Right aligned', 'edunet' )
	);

	$options = array();

	$options[] = array(
		'name' => esc_html__( 'Basic Settings', 'edunet' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => esc_html__( 'Background', 'edunet' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default background image, use the <a href="%1$s" title="Custom background">Appearance &gt; Background</a> menu option.', 'edunet' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-background' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Logo', 'edunet' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default logo, use the <a href="%1$s" title="Custom header">Appearance &gt; Header</a> menu option.', 'edunet' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-header' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Social Media Settings', 'edunet' ),
		'desc' => esc_html__( 'Enter the URLs for your Social Media platforms', 'edunet' ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Twitter', 'edunet' ),
		'desc' => esc_html__( 'Enter your Twitter URL.', 'edunet' ),
		'id' => 'social_twitter',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Facebook', 'edunet' ),
		'desc' => esc_html__( 'Enter your Facebook URL.', 'edunet' ),
		'id' => 'social_facebook',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Google+', 'edunet' ),
		'desc' => esc_html__( 'Enter your Google+ URL.', 'edunet' ),
		'id' => 'social_googleplus',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'LinkedIn', 'edunet' ),
		'desc' => esc_html__( 'Enter your LinkedIn URL.', 'edunet' ),
		'id' => 'social_linkedin',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'GitHub', 'edunet' ),
		'desc' => esc_html__( 'Enter your GitHub URL.', 'edunet' ),
		'id' => 'social_github',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'YouTube', 'edunet' ),
		'desc' => esc_html__( 'Enter your YouTube URL.', 'edunet' ),
		'id' => 'social_youtube',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Instagram', 'edunet' ),
		'desc' => esc_html__( 'Enter your Instagram URL.', 'edunet' ),
		'id' => 'social_instagram',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Flickr', 'edunet' ),
		'desc' => esc_html__( 'Enter your Flickr URL.', 'edunet' ),
		'id' => 'social_flickr',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Pinterest', 'edunet' ),
		'desc' => esc_html__( 'Enter your Pinterest URL.', 'edunet' ),
		'id' => 'social_pinterest',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Vkontakte', 'edunet' ),
		'desc' => esc_html__( 'Введите свой Vkontakte URL.', 'edunet' ),
		'id' => 'social_vk',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Advanced settings', 'edunet' ),
		'type' => 'heading' );

	$options[] = array(
		'name' =>  esc_html__( 'Banner Background', 'edunet' ),
		'desc' => esc_html__( 'Select an image and background color for the homepage banner.', 'edunet' ),
		'id' => 'banner_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => esc_html__( 'Footer Background Color', 'edunet' ),
		'desc' => esc_html__( 'Select the background color for the footer.', 'edunet' ),
		'id' => 'footer_color',
		'std' => '#222222',
		'type' => 'color' );

	$options[] = array(
		'name' => esc_html__( 'Footer Content', 'edunet' ),
		'desc' => esc_html__( 'Enter the text you&lsquo;d like to display in the footer. This content will be displayed just below the footer widgets. It&lsquo;s ideal for displaying your copyright message or credits.', 'edunet' ),
		'id' => 'footer_content',
		'std' => edunet_get_credits(),
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => esc_html__( 'Footer Content Position', 'edunet' ),
		'desc' => esc_html__( 'Select what position you would like the footer content aligned to.', 'edunet' ),
		'id' => 'footer_position',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini',
		'options' => $footer_position_settings );

	$options[] = array(
		'name' => esc_html__( 'Google Analytics', 'edunet' ),
		'desc' => esc_html__( 'Enter your Google Analytics Tracking ID. The Tracking ID will be in the form of UA-1234567-1.', 'edunet' ),
		'id' => 'ga_trackingid',
		'std' => '',
		'class' => 'mini',
		'type' => 'text' );

	return $options;
}
