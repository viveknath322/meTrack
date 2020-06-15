<?php
/**
 * Alpas functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Alpas
 */

if( !defined('ALPAS_FRAMEWORK_VAR') ) define('ALPAS_FRAMEWORK_VAR', 'alpas_opt');

if ( ! function_exists( 'alpas_setup' ) ) :
	
	function alpas_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'alpas', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Custom Thumbnail Image Sizes
		add_image_size( 'alpas_card_thumb', 510, 400, true );
		add_image_size( 'alpas_single_thumb', 730, 450, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header' => esc_html__( 'Primary', 'alpas' ),
			'footer-bottom-menu' => esc_html__( 'Footer Bottom Menu', 'alpas' ),
		) );

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'alpas_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add support for posts formats
        add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat', 'status') );
	}
endif;
add_action( 'after_setup_theme', 'alpas_setup' );

// Set the content width in pixels, based on the theme's design and stylesheet.
if ( ! function_exists( 'alpas_content_width' ) ) :
	function alpas_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'alpas_content_width', 640 );
	}
endif;
add_action( 'after_setup_theme', 'alpas_content_width', 0 );

// Enqueue scripts and styles.
if ( ! function_exists( 'alpas_scripts' ) ) :
	function alpas_scripts() {
		wp_enqueue_style( 'alpas-style', get_stylesheet_uri() );
		wp_style_add_data( 'alpas-style', 'rtl', 'replace' );

		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
		wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css');
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css');
		wp_enqueue_style( 'boxicons', get_template_directory_uri() . '/assets/css/boxicons.min.css');	
		wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css');	
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
		wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.min.css');
		wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css');
		wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.css');
		wp_enqueue_style( 'progresscircle', get_template_directory_uri() . '/assets/css/progresscircle.min.css');
		// WooCommerce CSS
		if ( class_exists( 'WooCommerce' ) ):
			wp_enqueue_style( 'alpas-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css');
		endif;
		wp_enqueue_style( 'alpas-main-style', get_template_directory_uri() . '/assets/css/style.css');
		wp_enqueue_style( 'alpas-responsive', get_template_directory_uri() . '/assets/css/responsive.css');

		if( alpas_rtl() == true ):
			wp_enqueue_style( 'alpas-rtl', get_template_directory_uri() . '/rtl.css' );
		endif;

		wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array ( 'jquery' ), true);
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array ( 'jquery' ), true);
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array ( 'jquery' ), true);
		wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array ( 'jquery' ), true);
		wp_enqueue_script( 'jquery-nice-select', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array ( 'jquery' ), true);
		wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js', array ( 'jquery' ), true);
		wp_enqueue_script( 'progresscircle', get_template_directory_uri() . '/assets/js/progresscircle.min.js', array ( 'jquery' ), true);
		
		wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array ( 'jquery' ), true);
		wp_enqueue_script( 'alpas-main', get_template_directory_uri() . '/assets/js/main.js', array ( 'jquery' ), true);

		// Coming Soon Date
		global $alpas_opt;
		if (isset($alpas_opt['coming-soon-date']) && $alpas_opt['coming-soon-date'] != '' ) {
			$fulldate = $alpas_opt['coming-soon-date'];
			wp_localize_script( 'alpas-main', 'dateData', array(
				'endTime'  => $fulldate,
			) );
		} else {
			wp_localize_script( 'alpas-main', 'dateData', array(
				'endTime'  => ' ',
			) );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'alpas_scripts' );

// Google Fonts
if ( ! function_exists( 'alpas_fonts' ) ) {
	function alpas_fonts() {
		wp_enqueue_style( 'alpas-fonts', "//fonts.googleapis.com/css?family=Dosis:400,500,600,700,800|Open+Sans:400,600,600i,700,800", '', '1.0.0', 'screen' );
	}
}
add_action( 'wp_enqueue_scripts', 'alpas_fonts' );

// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Template Tag
require get_template_directory() . '/inc/template-tags.php';

//Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Theme Widgets
require get_template_directory() . '/inc/widgets.php';

// Custom Style
require get_template_directory() . '/inc/custom-style.php';

// ACF Meta Box
require get_template_directory() . '/inc/acf.php';

// Bootstrap Navwalker
require get_template_directory() . '/inc/bootstrap-navwalker.php';

//TGM
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

require_once get_template_directory() . '/lib/recommended-plugin.php';

// Load WooCommerce compatibility file.
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Demo Data
if ( ! function_exists( 'alpas_import_files' ) ) :
	function alpas_import_files() {
		return array(
			array(
				'import_file_name'             => esc_html__('Alpas Demo Import', 'alpas'),
				'local_import_file'            => trailingslashit( get_template_directory() ) . '/lib/demo-data/alpas-demo.xml',
				'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/lib/demo-data/alpas-widgets.json',
				'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/lib/demo-data/alpas-export.dat',
				'local_import_redux'           => array(
					array(
					'file_path'   => trailingslashit( get_template_directory() ) . '/lib/demo-data/redux-option.json',
					'option_name' => 'alpas_opt',
					),
				),
				'import_notice'                => esc_html__( 'After import demo, just set static homepage from settings>reading and check widgets & menus.', 'alpas' ),
			),
		);
	}
endif;
add_filter( 'pt-ocdi/import_files', 'alpas_import_files' );

// Return Space
if ( ! function_exists( 'alpas_excerpt_more_ret_space' ) ) :
	function alpas_excerpt_more_ret_space($more) {
		return '';
	}
endif;
add_filter('excerpt_more', 'alpas_excerpt_more_ret_space');

// Search Result
if ( ! function_exists( 'alpas_remove_pages_from_search' ) ) :
	function alpas_remove_pages_from_search() {
	global $wp_post_types;
	$wp_post_types['page']->exclude_from_search = true;
	}
	endif;
add_action('init', 'alpas_remove_pages_from_search');

// Filter the categories archive widget to add a span around post count
if ( ! function_exists( 'alpas_cat_count_span' ) ) {
	function alpas_cat_count_span( $links ) {
		$links = str_replace( '</a> (', '</a><span class="post-count">(', $links );
		$links = str_replace( ')', ')</span>', $links );
		return $links;
	}
}
add_filter( 'wp_list_categories', 'alpas_cat_count_span' );

// Filter the archives widget to add a span around post count
if ( ! function_exists( 'alpas_archive_count_span' ) ) {
	function alpas_archive_count_span( $links ) {
		$links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">(', $links );
		$links = str_replace( ')', ')</span>', $links );
		return $links;
	}
}
add_filter( 'get_archives_link', 'alpas_archive_count_span' );

// For Page.php
if ( ! function_exists( 'alpas_is_elementor' ) ) {
	function alpas_is_elementor(){
		if ( function_exists( 'elementor_load_plugin_textdomain' ) ):
			global $post;
			return \Elementor\Plugin::$instance->db->is_built_with_elementor($post->ID);
		endif;
	}
}

// Breadcrumb Function
if ( ! function_exists( 'alpas_breadcumb' ) ) {
	function alpas_breadcumb(){
		global $alpas_opt;
		if( isset($alpas_opt['hide_breadcumb'] ) && $alpas_opt['hide_breadcumb'] !=0 ){
			$breadcumb = true;
		} else {
			$breadcumb = 0;
		}
		return $breadcumb;
	}
}

//  Hide Page Banner Function
if ( ! function_exists( 'alpas_hide_page_banner' ) ) {
	function alpas_hide_page_banner(){

		global $alpas_opt;
		if(isset($alpas_opt['hide_page_banner']) && $alpas_opt['hide_page_banner'] != 0 ){
			$hide_banner = true;
		} else {
			$hide_banner = 0;
		}
		return $hide_banner;
	}
}

//  Hide Page Banner From ACF
if ( ! function_exists( 'alpas_hide_page_banner_acf' ) ) {
	function alpas_hide_page_banner_acf(){
		if (function_exists('acf_add_options_page') ) {
			$page_hide = get_field( 'page_banner_hide' );
		
			if ($page_hide) {
				$page = $page_hide[0];
			} else {
				$page = '';
			}
		} else {
			$page = '';
		}
		return $page;
	}
}

//  Page Banner Text Alignment Function
if ( ! function_exists( 'alpas_page_banner_alignment' ) ) {
	function alpas_page_banner_alignment(){
		global $alpas_opt;
		if(isset($alpas_opt['page_alignment'] )){

			$banner_alignment =  $alpas_opt['page_alignment'];
		} else {
			$banner_alignment = 2;
		}
		return $banner_alignment;
	}
}


