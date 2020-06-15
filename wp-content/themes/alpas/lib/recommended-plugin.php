<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'alpas_register_required_plugins' );

function alpas_register_required_plugins() {

	$plugins = array(
		
		array(
			'name'               => esc_html__('Alpas Toolkit', 'alpas'),
			'slug'               => 'alpas-toolkit',
			'source'             => get_stylesheet_directory() . '/lib/plugins/alpas-toolkit.zip', 
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),

		//Elementor Page Builder
		array(
			'name'               => esc_html__('Elementor Pro Page Builder', 'alpas'),
			'slug'               => 'elementor-pro',
			'source'             => get_stylesheet_directory() . '/lib/plugins/elementor-pro.zip', 
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),

		//ACF Pro
		array(
			'name'               => esc_html__('Advance Custom Field Pro', 'alpas'),
			'slug'               => 'advanced-custom-fields-pro',
			'source'             => get_stylesheet_directory() . '/lib/plugins/advanced-custom-fields-pro.zip', 
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),

		// alpas Plugin
		array(
			'name'      => esc_html__('Elementor', 'alpas'),
			'slug'      => 'elementor',
			'required'  => true,
		),

		array(
			'name'      => esc_html__('Contact Form 7', 'alpas'),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('Newsletter', 'alpas'),
			'slug'      => 'newsletter',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('WooCommerce', 'alpas'),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('One Click Demo Import', 'alpas'),
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true, 
		'dismissable'  => true, 
		'dismiss_msg'  => '',   
		'is_automatic' => false, 
		'message'      => '',                      
	);
	tgmpa( $plugins, $config );
}