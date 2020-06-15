<?php
/* 
 * Plugin Name: Alpas Toolkit
 * Author: EnvyTheme
 * Author URI: envytheme.com
 * Description: A Light weight and easy toolkit for Elementor page builder widgets.
 * Version: 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; //Exit if accessed directly
}

define('ALPAS_ACC_PATH', plugin_dir_path(__FILE__));
if( !defined('ALPAS_FRAMEWORK_VAR') ) define('ALPAS_FRAMEWORK_VAR', 'alpas_opt');

// Select page for link
function alpas_toolkit_get_page_as_list() {
    $args = wp_parse_args(array(
        'post_type' => 'page',
        'numberposts' => -1,
    ));

    $posts = get_posts($args);
    $post_options = array(esc_html__('--Select Page--', 'alpas-toolkit') => '');

    if ($posts) {
        foreach ($posts as $post) {
            $post_options[$post->post_title] = $post->ID;
        }
    }
    $flipped = array_flip($post_options);
    return $flipped;
}

//Custom Post
function alpas_toolkit_custom_post()
{
	global $alpas_opt;
	if( isset( $alpas_opt['ser_post_text'] ) ) {
		$ser_post_type = $alpas_opt['ser_post_text'];
	} else {
		$ser_post_type = 'service';
	}
	//Services Custom Post
 	register_post_type('service',
        array(
            'labels' => array(
                'name' => esc_html__('Services', 'alpas-toolkit'),
                'singular_name' => esc_html__('Service', 'alpas-toolkit'),
            ),
            'menu_icon' => 'dashicons-images-alt',
            'supports' => array('title', 'thumbnail', 'editor', 'page-attributes','excerpt'),
            'has_archive' => true,
			'public'   => true,
			'rewrite' => array( 'slug' => $ser_post_type ),
        )
	);
}

add_action('init', 'alpas_toolkit_custom_post');

//Taxonomy Custom Post
function alpas_toolkit_custom_post_taxonomy(){
	//Service Taxonomy
    register_taxonomy(
      'service_cat',
      'service',
        array(
          'hierarchical'      => true,
          'label'             => esc_html__('Services Category', 'alpas-toolkit' ),
          'query_var'         => true,
          'show_admin_column' => true,
              'rewrite'       => array(
              'slug'          => 'service-category',
              'with_front'    => true
            )
        )
	);
}
add_action('init', 'alpas_toolkit_custom_post_taxonomy');

// Service Category Select
function alpas_toolkit_get_service_cat_list() {
	$services_category_id = get_queried_object_id();
	$args = array(
		'parent' => $services_category_id
	);

	$terms = get_terms( 'service_cat', get_the_ID());
	$cat_options = array(esc_html__('', 'alpas-toolkit') => '');

	if ($terms) {
		foreach ($terms as $term) {
			$cat_options[$term->name] = $term->name;
		}
	}
	return $cat_options;
}


// Main Alpas Toolkit Class

final class Elementor_Test_Extension {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION = '7.0';

	// Instance
    private static $_instance = null;
    
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	// Constructor
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	// init
	public function init() {
        load_plugin_textdomain( 'alpas-toolkit' );

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
        
        add_action('elementor/elements/categories_registered',[ $this, 'register_new_category'] );
        
    }

    public function register_new_category($manager){
        $manager->add_category('alpascategory',[
            'title'=>esc_html__('Alpas Category','alpas-toolkit'),
            'icon'=> 'fa fa-image'
        ]);
    }

	//Admin notice
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'alpas-toolkit' ),
			'<strong>' . esc_html__( 'Alpas Toolkit', 'alpas-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'alpas-toolkit' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'alpas-toolkit' ),
			'<strong>' . esc_html__( 'Alpas Toolkit', 'alpas-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'alpas-toolkit' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'alpas-toolkit' ),
			'<strong>' . esc_html__( 'Alpas Toolkit', 'alpas-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'alpas-toolkit' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	// Toolkit Widgets
	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/banner-widget.php' );
		require_once( __DIR__ . '/widgets/partner-widget.php' );
		require_once( __DIR__ . '/widgets/service-widget.php' );
		require_once( __DIR__ . '/widgets/feature-widget.php' );
		require_once( __DIR__ . '/widgets/funfacts-widget.php' );
		require_once( __DIR__ . '/widgets/feedback-widget.php' );
		require_once( __DIR__ . '/widgets/post-widget.php' );
		require_once( __DIR__ . '/widgets/newsletter-widget.php' );
		require_once( __DIR__ . '/widgets/about-widget.php' );
		require_once( __DIR__ . '/widgets/team-widget.php' );
		require_once( __DIR__ . '/widgets/coming-soon-widget.php' );
		require_once( __DIR__ . '/widgets/top-faq-widget.php' );
		require_once( __DIR__ . '/widgets/faq-contact-widget.php' );
		require_once( __DIR__ . '/widgets/contact-widget.php' );
		require_once( __DIR__ . '/widgets/single-service-widget.php' );
	}

}
Elementor_Test_Extension::instance();

// Redux Theme Options
require_once(ALPAS_ACC_PATH . 'redux/ReduxCore/framework.php');
require_once(ALPAS_ACC_PATH . 'redux/sample/sample-config.php');

//Theme Widgets
require_once(ALPAS_ACC_PATH . 'inc/widgets.php');

//Registering crazy toolkit files
function alpas_toolkit_files()
{
	wp_enqueue_style('font-awesome-4.7', plugin_dir_url(__FILE__) . 'assets/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'alpas_toolkit_files');

// Extra P tag
add_filter('the_content', 'alpas_remove_empty_p', 20, 1);
function alpas_remove_empty_p($content){
    $content = force_balance_tags($content);
    return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}

add_filter('script_loader_tag', 'alpas_clean_script_tag');
function alpas_clean_script_tag($input) {
    $input = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $input );
    return $input;
}

/**
 * Extend Icon pack core controls.
 *
 * @param  object $controls_manager Controls manager instance.
 * @return void
 */ 

function alpas_icon_pack( $controls_manager ) {

	require_once(ALPAS_ACC_PATH . 'inc/icon.php');

	$controls = array(
		$controls_manager::ICON => 'TRYO_Icon_Controler',
	);

	foreach ( $controls as $control_id => $class_name ) {
		$controls_manager->unregister_control( $control_id );
		$controls_manager->register_control( $control_id, new $class_name() );
	}
}

$opt_name = ALPAS_FRAMEWORK_VAR;