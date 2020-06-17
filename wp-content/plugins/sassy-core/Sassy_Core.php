<?php
/**
 * Plugin Name: Sassy Core
 * Plugin URI: https://themeforest.net/user/droitthemes/portfolio
 * Description: This plugin adds the core features to the Themes WordPress theme. You must have to install this plugin to work with this theme.
 * Version: 1.0.0
 * Author: DroitThemes
 * Author URI: https://themeforest.net/user/droitthemes/portfolio
 * Text domain: sassy-core
 */

if ( !defined('ABSPATH') )
    die('-1');


// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'Sassy_Core' ) ) {
	/**
	 * Main Themes Core Class
	 *
	 * The main class that initiates and runs the Themes Core plugin.
	 *
	 * @since 1.7.0
	 */
	final class Sassy_Core {
		/**
		 * Themes Core Version
		 *
		 * Holds the version of the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string The plugin version.
		 */
		const  VERSION = '1.0' ;
		/**
		 * Minimum Elementor Version
		 *
		 * Holds the minimum Elementor version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum Elementor version required to run the plugin.
		 */
		const  MINIMUM_ELEMENTOR_VERSION = '1.7.0';
		/**
		 * Minimum PHP Version
		 *
		 * Holds the minimum PHP version required to run the plugin.
		 *
		 * @since 1.7.0
		 * @since 1.7.1 Moved from property with that name to a constant.
		 *
		 * @var string Minimum PHP version required to run the plugin.
		 */
		const  MINIMUM_PHP_VERSION = '5.4' ;
		/**
		 * Instance
		 *
		 * Holds a single instance of the `Press_Elements` class.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 * @static
		 *
		 * @var Press_Elements A single instance of the class.
		 */
		private static  $_instance = null ;
		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 * @static
		 *
		 * @return Press_Elements An instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'faded-small-core' ), '1.7.0' );
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @since 1.7.0
		 *
		 * @access protected
		 *
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'faded-small-core' ), '1.7.0' );
		}

		/**
		 * Constructor
		 *
		 * Initialize the Themes Core plugins.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function __construct() {
			$this->init_hooks();
			do_action( 'press_elements_loaded' );
		}

		/**
		 * Include Files
		 *
		 * Load core files required to run the plugin.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function core_includes() {
			// Extra functions
			//require_once __DIR__ . '/inc/extra.php';
			// Elementor custom fields icon
	/*		require_once __DIR__ . '/fields/icons.php';
			require_once __DIR__ . '/fields/includ_icons.php';*/
			// Twitter widget
			//require_once  __DIR__ . '/widgets/twitter/twitter-widget.php';
		}

		/**
		 * Init Hooks
		 *
		 * Hook into actions and filters.
		 *
		 * @since 1.7.0
		 *
		 * @access private
		 */
		private function init_hooks() {
			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );
		}

		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.7.0
		 *
		 * @access public
		 */
		public function i18n() {
			load_plugin_textdomain( 'theme-core', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}

		/**
		 * Init Themes Core
		 *
		 * Load the plugin after Elementor (and other plugins) are loaded.
		 *
		 * @since 1.0.0
		 * @since 1.7.0 The logic moved from a standalone function to this class method.
		 *
		 * @access public
		 */
		public function init() {

			if ( !did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}

			// Check for required Elementor version

			if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
				return;
			}

			// Check for required PHP version

			if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
				return;
			}

			// Add new Elementor Categories
			add_action( 'elementor/init', [ $this, 'add_elementor_category' ] );
			// Register Widget Scripts
			add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_widget_scripts' ] );
			// Register Widget Styles
			add_action( 'admin_enqueue_scripts', [ $this, 'register_admin_styles' ] );
			add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_widget_styles' ] );
			add_action( 'elementor/frontend/after_register_styles', [ $this, 'register_widget_styles' ] );
			add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_styles' ] );

			// Register New Widgets
			add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {
			$message = sprintf(
			/* translators: 1: Themes Core 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'faded-small-core' ),
				'<strong>' . esc_html__( 'Themes core', 'faded-small-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'faded-small-core' ) . '</strong>'
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.1.0
		 * @since 1.7.0 Moved from a standalone function to a class method.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {
			$message = sprintf(
			/* translators: 1: Themes Core 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'faded-small-core' ),
				'<strong>' . esc_html__( 'Themes Core', 'faded-small-core' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'faded-small-core' ) . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @access public
		 */
		public function admin_notice_minimum_php_version() {
			$message = sprintf(
			/* translators: 1: Themes Core 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'faded-small-core' ),
				'<strong>' . esc_html__( 'Themes Core', 'faded-small-core' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'faded-small-core' ) . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
		}

		/**
		 * Add new Elementor Categories
		 *
		 * Register new widget categories for Themes Core widgets.
		 *
		 * @access public
		 */
		public function add_elementor_category() {
			\Elementor\Plugin::instance()->elements_manager->add_category( 'faded-small-elements', [
				'title' => __( 'Theme Elements', 'faded-small-core' ),
			], 1 );
		}

		/**
		 * Register Widget Scripts
		 *
		 * Register custom scripts required to run Themes Core.
		 *
		 * @access public
		 */
		public function register_widget_scripts() {
			// Typing Effect
			//wp_register_script( 'typedjs', plugins_url( 'press-elements/libs/typed/typed.js' ), array( 'jquery' ) );
		}

		/**
		 * Register Widget Styles
		 *
		 * Register custom styles required to run Themes Core.
		 *
		 * @access public
		 */
		public function register_widget_styles() {
			// Typing Effect
			wp_enqueue_style( 'themify-icon', plugins_url( 'assets/fonts/themify-icon/themify-icons.css', __FILE__ ) );
			wp_enqueue_style( 'themes-elementor-edit', plugins_url( 'assets/css/elementor-edit.css', __FILE__ ) );
		}


		/**
		 * Register Admin Styles
		 *
		 * Register custom styles required to AppArt WordPress Admin Dashboard.
		 *
		 * @access public
		 */
		public function register_admin_styles() {
            wp_enqueue_style( 'themes-admin', plugins_url( 'assets/css/faded-small-core-admin.css', __FILE__ ) );
		}

		/**
		 * Register New Widgets
		 *
		 * Include Themes Core widgets files and register them in Elementor.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access public
		 */
		public function on_widgets_registered() {
			$this->include_widgets();
			$this->register_widgets();
		}

		/**
		 * Include Widgets Files
		 *
		 * Load Themes Core widgets files.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function include_widgets() {


			/* --- Sass theme -- */
			require_once __DIR__ . '/widgets/Faded_Sass_Banner.php';
			require_once __DIR__ . '/widgets/Faded_Sass_Features_List.php';
			require_once __DIR__ . '/widgets/Faded_Sass_C2a_Left.php';
			require_once __DIR__ . '/widgets/Faded_Sass_C2a_Right.php';
			require_once __DIR__ . '/widgets/Faded_Sass_Featured_Img.php';
			require_once __DIR__ . '/widgets/Faded_Sass_Service_Items.php';
			require_once __DIR__ . '/widgets/Faded_Sass_Features_Slider.php';
			require_once __DIR__ . '/widgets/Faded_Sass_Pricing_Plans.php';
			require_once __DIR__ . '/widgets/Faded_Sass_Contact_Form.php';
			require_once __DIR__ . '/widgets/Faded_Sass_Newsletter.php';

		}

		/**
		 * Register Widgets
		 *
		 * Register Themes Core widgets.
		 *
		 * @since 1.0.0
		 * @since 1.7.1 The method moved to this class.
		 *
		 * @access private
		 */
		private function register_widgets() {
			// Site Elements
			

			/* --- Sass theme -- */
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Faded_Small_Core\Widgets\Faded_Sass_Banner() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Faded_Small_Core\Widgets\Faded_Sass_Features_List() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Faded_Small_Core\Widgets\Faded_Sass_C2a_Left() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Faded_Small_Core\Widgets\Faded_Sass_C2a_Right() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Faded_Small_Core\Widgets\Faded_Sass_Featured_Img() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Faded_Small_Core\Widgets\Faded_Sass_Service_Items() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Faded_Small_Core\Widgets\Faded_Sass_Features_Slider() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Faded_Small_Core\Widgets\Faded_Sass_Pricing_Plans() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Faded_Small_Core\Widgets\Faded_Sass_Contact_Form() );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Faded_Small_Core\Widgets\Faded_Sass_Newsletter() );

		
		}

	}
}
// Make sure the same function is not loaded twice in free/premium versions.

if ( !function_exists( 'themes_core_load' ) ) {
	/**
	 * Load Themes Core
	 *
	 * Main instance of Press_Elements.
	 *
	 * @since 1.0.0
	 * @since 1.7.0 The logic moved from this function to a class method.
	 */
	function themes_core_load() {
		return Sassy_Core::instance();
	}

	// Run Themes Core
	themes_core_load();
	


add_action( 'wp_enqueue_scripts', function() {
	wp_dequeue_style('elementor-global');
});
}