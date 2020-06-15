<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = ALPAS_FRAMEWORK_VAR;
    

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'opt_name/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'alpas-toolkit' ),
        'page_title'           => __( 'Theme Options', 'alpas-toolkit' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'alpas_option',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p></p>', 'alpas-toolkit' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'alpas-toolkit' );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'alpas-toolkit' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'alpas-toolkit' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'alpas-toolkit' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'alpas-toolkit' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'alpas-toolkit' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

// -> START General Options
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'General Options', 'alpas-toolkit' ),
    'id'               => 'general_options',
    'customizer' => false,
    'icon'             => ' el el-home',
    'fields'     => array(
        array(
            'id' => 'enable_preloader',
            'type' => 'switch',
            'title' => esc_html__('Enable Preloader', 'alpas-toolkit'),
            'default' => '1',
        ),
        array(
            'id'        => 'enable_sticky_header',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Sticky Header', 'alpas-toolkit'),
            'desc'      => esc_html__('', 'alpas-toolkit'),
            'default'   => '1'
        ),
        array(
            'id' => 'alpas_enable_rtl',
            'type' => 'select',
            'options' => array(
                'enable'        => 'Enable',
                'disable'       => 'Disable',
            ),
            'title'     => esc_html__( 'RTL', 'alpas-toolkit' ),
            'default'   => 'disable',
        ),
        array(
            'id'       => 'coming-soon-date',
            'type'     => 'date',
            'title'    => esc_html__( 'Date Option', 'alpas-toolkit' ),
            'subtitle' => esc_html__('This date option is required only for Coming soon page', 'alpas-toolkit'),
            'desc'     => esc_html__( 'Choose a Date', 'alpas-toolkit' )
        ),
    
        array(
            'id'       => 'white_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'White Logo', 'alpas-toolkit' ),
        ),
        array(
            'id'       => 'black_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Black Logo', 'alpas-toolkit' ),
        ),
        array(
            'id'        => 'ser_post_text',
            'type'      => 'text',
            'title'     => __('Services Custom Post URL Text', 'alpas-toolkit'),
            'default'   => __('service', 'alpas-toolkit'),
            'desc'      => __( 'After changing this please go to dashboard Settings->Permalinks. Then click Save Changes button', 'alpas-toolkit' )
        ),
    ),
) );

// -> START Pages Options
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Pages Banner Options', 'alpas-toolkit' ),
    'id'               => 'pages_options',
    'customizer' => false,
    'icon'             => ' el el-tasks',
    'fields'     => array(
        array(
            'id'       => 'hide_page_banner',
            'type'     => 'checkbox',
            'title'    => esc_html__( 'Page Banner Hide?', 'alpas-toolkit' ),
        ),
        array(
            'id'       => 'hide_breadcumb',
            'type'     => 'checkbox',
            'title'    => esc_html__( 'Breadcrumb Hide?', 'alpas-toolkit' ),
            'required' => array('hide_page_banner','!=','1'),
        ),  
        array(
            'id'       => 'page_alignment',
            'type'     => 'radio',
            'title'    => esc_html__( 'Banner Title Alignment', 'alpas-toolkit' ),
            'options'  => array(
                '1' => 'Left', 
                '2' => 'Center', 
                '3' => 'Right'
            ),
            'default' => '2',
            'required' => array('hide_page_banner','!=','1'),
        ),
        array(
            'id'       => 'blog_bg',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Posts Page Banner Background Image', 'alpas-toolkit' ),
            'required' => array('hide_page_banner','!=','1'),
        ),
        array(
            'id'       => 'archive_bg',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Archive Page Banner Background Image', 'alpas-toolkit' ),
            'required' => array('hide_page_banner','!=','1'),
        ),
        array(
            'id'       => 'search_bg',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Search Page Banner Background Image', 'alpas-toolkit' ),
            'required' => array('hide_page_banner','!=','1'),
        ),
    ),
) );

// -> START Header
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header', 'alpas-toolkit' ),
    'id'               => 'header',
    'customizer'       => false,
    'icon'             => 'el el-website',
    'fields'     => array(
        array(
            'id' => 'enable_header_btn',
            'type' => 'switch',
            'title' => esc_html__('Enable Header Button', 'alpas-toolkit'),
            'default' => '1'
        ),
        array(
            'id' => 'header_btn_text',
            'type' => 'text',
            'title' => esc_html__('Header Button Text', 'alpas-toolkit'),
            'required' => array('enable_header_btn','equals','1'),
            'default' => esc_html__("Free Quote", 'alpas-toolkit'),
        ),
        array(
            'id' => 'btn_link',
            'type' => 'text',
            'title' => esc_html__( 'Button Link', 'alpas-toolkit' ),
            'required' => array('enable_header_btn','equals','1'),
            'default' => esc_html__('#', 'alpas-toolkit'),
        ),
        array(
            'id' => 'enable_search',
            'type' => 'switch',
            'title' => esc_html__('Enable Search Form', 'alpas-toolkit'),
            'default' => '1'
        ),
        array(
            'id' => 'enable_cart_btn',
            'type' => 'switch',
            'title' => esc_html__('Enable Woocommerce Cart', 'alpas-toolkit'),
            'default' => '1'
        ),
    ),
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header Gradient Colors', 'alpas-toolkit' ),
    'id'               => 'nav-color-options',
    'customizer_width' => '500px',
    'subsection' => true,
    'desc'     => esc_html__( 'Select all colors for seeing gradient effect. Make sure all colors will be different ', 'alpas-toolkit' ),

    'fields'     => array(
        array(
            'id'          => 'nav_grad_color1',
            'type'        => 'color',
            'title'       => esc_html__('Gradient Color One', 'alpas-toolkit'),
            'default'     => '#0ca59d',
            'validate'    => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'nav_grad_color2',
            'type'     => 'color',
            'title'    => esc_html__('Gradient Color Two', 'alpas-toolkit'), 
            'default'     => '#28aca4',
            'validate' => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'nav_grad_color3',
            'type'     => 'color',
            'title'    => esc_html__('Gradient Color Three', 'alpas-toolkit'), 
            'default'     => '#39b2ab',
            'validate' => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'nav_grad_color4',
            'type'     => 'color',
            'title'    => esc_html__('Gradient Color Four', 'alpas-toolkit'), 
            'default'     => '#47b9b3',
            'validate' => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'nav_grad_color5',
            'type'     => 'color',
            'title'    => esc_html__('Gradient Color Five', 'alpas-toolkit'), 
            'default'     => '#54c0ba',
            'validate' => 'color',
            'transparent' => false,
        )
    ),
) );

/* Social Profiles */
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Social Profiles', 'alpas-toolkit'),
	'desc' => 'Social profiles are used in different places inside the theme.',
	'icon' => 'el-icon-user',
	'customizer' => false,
	'fields' => array(
        array(
			'id' => 'facebook-url',
			'type' => 'text',
			'title' =>esc_html__('Facebook URL', 'alpas-toolkit')
		),
        array(
			'id' => 'twitter-url',
            'type' => 'text',
			'title' => esc_html__('Twitter URL', 'alpas-toolkit')
		),
		array(
			'id' => 'instagram-url',
			'type' => 'text',
			'title' => esc_html__('Instagram URL', 'alpas-toolkit')
        ),
        array(
			'id' => 'youtube-url',
			'type' => 'text',
			'title' =>  esc_html__('Youtube URL', 'alpas-toolkit')
		),
		array(
			'id' => 'linkedin-url',
			'type' => 'text',
			'title' => esc_html__('Linkedin URL', 'alpas-toolkit')
		),
	)
) );

// -> START Footer Area
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Footer', 'alpas-toolkit' ),
    'id'               => 'footer',
    'customizer'       => false,
    'icon'             => 'el el-edit',
    'fields' => array(

        array(
            'id' => 'footer-social-text',
            'type' => 'textarea',
            'title' => esc_html__('Footer social text', 'alpas-toolkit'),
            'default' => esc_html__('Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.','alpas-toolkit')
        ),
        array(
            'id' => 'footer-copyright-text',
            'type' => 'editor',
            'title' => esc_html__('Footer copyright text', 'alpas-toolkit'),
            'subtitle' => esc_html__('HTML and Shortcodes are allowed', 'alpas-toolkit'),
            'desc' => '',
            'args' => array(
                'teeny' => true,
                'media_buttons' => false
            ),
        ),
        array(
            'id' => 'footer_bgc',
            'type' => 'color',
            'title' => esc_html__('Footer Top Background Color', 'alpas-toolkit'),
            'default' => '#182c51',
            'validate' => 'color',
            'transparent' => false
        ),
        array(
            'id' => 'footer_bottom_bg',
            'type' => 'color',
            'title' => esc_html__('Footer Bottom Background Color', 'alpas-toolkit'),
            'default' => '#0d1d3b',
            'validate' => 'color',
            'transparent' => false
        ),

        array(
            'id' => 'show_mapimage',
            'type' => 'switch',
            'title' => esc_html__('Show Map image?', 'alpas-toolkit'),
            'default' => '1'
        ),
        array(
            'id'       => 'map_img',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Map', 'alpas-toolkit' ),
            'required' => array('show_mapimage','equals','1'),
        ),
    ) 
));

// -> START Styling 
Redux::setSection( $opt_name, array(
    'title'            =>  esc_html__( 'Styling Options', 'alpas-toolkit' ),
    'id'               => 'styling_options',
    'customizer' => false,
    'icon'             => ' el el-magic',
    'fields'     => array(
        array(
            'id' => 'primary_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'alpas-toolkit'),
            'default' => '#0ca59d',
            'validate' => 'color',
            'transparent' => false
        ),
        array(
            'id' => 'optional_color',
            'type' => 'color',
            'title' => esc_html__('Optional Color', 'alpas-toolkit'),
            'default' => '#ffac00',
            'validate' => 'color',
            'transparent' => false
        ),
        array(
            'id' => 'text_color',
            'type' => 'color',
            'title' => esc_html__('Body Text Color', 'alpas-toolkit'),
            'default' => '#57647c',
            'validate' => 'color',
            'transparent' => false
        ),
    ),
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Gradient Colors', 'alpas-toolkit' ),
    'id'               => 'grad-color-options',
    'customizer_width' => '500px',
    'subsection' => true,
    'desc'     => esc_html__( 'Select all colors for seeing gradient effect. Make sure all colors will be different ', 'alpas-toolkit' ),

    'fields'     => array(
        array(
            'id'          => 'grad_color1',
            'type'        => 'color',
            'title'       => esc_html__('Gradient Color One', 'alpas-toolkit'),
            'default'     => '#0ca59d',
            'validate'    => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'grad_color2',
            'type'     => 'color',
            'title'    => esc_html__('Gradient Color Two', 'alpas-toolkit'), 
            'default'     => '#28aca4',
            'validate' => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'grad_color3',
            'type'     => 'color',
            'title'    => esc_html__('Gradient Color Three', 'alpas-toolkit'), 
            'default'     => '#39b2ab',
            'validate' => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'grad_color4',
            'type'     => 'color',
            'title'    => esc_html__('Gradient Color Four', 'alpas-toolkit'), 
            'default'     => '#47b9b3',
            'validate' => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'grad_color5',
            'type'     => 'color',
            'title'    => esc_html__('Gradient Color Five', 'alpas-toolkit'), 
            'default'     => '#54c0ba',
            'validate' => 'color',
            'transparent' => false,
        )
    ),
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Optional Gradient Colors', 'alpas-toolkit' ),
    'id'               => 'opt-grad-color-options',
    'customizer_width' => '500px',
    'subsection' => true,
    'desc'     => esc_html__( 'Select all colors for seeing gradient effect. Make sure all colors will be different ', 'alpas-toolkit' ),

    'fields'     => array(
        array(
            'id'          => 'opt_grad_color1',
            'type'        => 'color',
            'title'       => esc_html__('Optional Gradient Color One', 'alpas-toolkit'),
            'default'     => '#ffac00',
            'validate'    => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'opt_grad_color2',
            'type'     => 'color',
            'title'    => esc_html__('Optional Gradient Color Two', 'alpas-toolkit'), 
            'default'     => '#ffac00',
            'validate' => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'opt_grad_color3',
            'type'     => 'color',
            'title'    => esc_html__('Optional Gradient Color Three', 'alpas-toolkit'), 
            'default'     => '#ffac00',
            'validate' => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'opt_grad_color4',
            'type'     => 'color',
            'title'    => esc_html__('Optional Gradient Color Four', 'alpas-toolkit'), 
            'default'     => '#faa01f',
            'validate' => 'color',
            'transparent' => false,
        ),
        array(
            'id'       => 'opt_grad_color5',
            'type'     => 'color',
            'title'    => esc_html__('Optional Gradient Color Five', 'alpas-toolkit'), 
            'default'     => '#f7b733',
            'validate' => 'color',
            'transparent' => false,
        )
    ),
) );

// -> START Blog Area
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Blog', 'alpas-toolkit' ),
    'id'               => 'alpas_blog',
    'customizer' => false,
    'icon'             => 'el el-file-edit',
    'fields' => array(
        array(
            'id'       => 'post_read_more',
            'type'     => 'text',
            'title'    => esc_html__( 'Posts Read More Button Text', 'alpas-toolkit' ),
        ),
        array(
            'id'       => 'blog_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Posts Page Banner Title', 'alpas-toolkit' ),
        ),
        array(
            'id'       => 'blog-layout',
            'type'     => 'radio',
            'title'    => esc_html__( 'Blog Layout', 'alpas-toolkit' ),
            'options'  => array(
                    '1' => 'Blog with sidebar', 
                    '2' => 'Blog without sidebar center',
                    '3' => 'Blog full width'
                ),
            'default' => '1'
        ),
    ) 
));

// WooCommerce Product
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'WooCommerce Product', 'alpas-toolkit' ),
    'desc'  => esc_html__( 'Manage product page settings.', 'alpas-toolkit' ),
    'icon'  => 'el-icon-list-alt',
    'customizer'    => false,
    'fields' => array(
        array(
            'id'        => 'enable_shop_pages_banner',
            'type'      => 'switch',
            'title'     => esc_html__('Enable WooCommerce Page Banner', 'alpas-toolkit'),
            'default'   => '0'
        ),
        array(
			'id'    => 'hide_woo_breadcrumb',
            'type'  => 'switch',
			'title' => esc_html__('Hide WooCommerce Breadcrumb', 'edali-toolkit'),
            'default'   => '0',
            'required'      => array('enable_shop_pages_banner','equals','1'),
        ),
        array(
            'id'       => 'product_bg_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'WooCommerce Page Background Image', 'alpas-toolkit' ),
            'required' => array('enable_shop_pages_banner','equals','1'),
        ),
        array(
            'id'        => 'products_page_count',
            'desc'      => esc_html__( 'Number of products per page on product pages.', 'alpas-toolkit' ),
            'type'      => 'text',
            'title'     => esc_html__( 'Products per page', 'alpas-toolkit' ),
            'default'   => '6',
        ),
        array(
            'id'    => 'alpas_product_sidebar',
            'type'  => 'select',
            'options' => array(
                'alpas_product_no_sidebar'       => 'None',
                'alpas_product_left_sidebar'     => 'Sidebar on the left',
                'alpas_product_right_sidebar'    => 'Sidebar on the right',
            ),
            'title'     => esc_html__( 'Product Sidebar Position', 'alpas-toolkit' ),
            'default'   => 'alpas_product_no_sidebar',
        ),
        array(
            'id'    => 'alpas_related_product_count',
            'type'  => 'text',
            'title' => esc_html__( 'Product Details Related Product Count', 'alpas-toolkit' ),
            'desc'  => esc_html__( 'e.g. 3', 'alpas-toolkit' ),
            'default' => '3',
        ),
    ),
));

// Typography
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Typography', 'alpas-toolkit' ),
    'desc' => esc_html__( 'Manage your fonts and typefaces.', 'alpas-toolkit' ),
    'icon' => 'el-icon-fontsize',
    'customizer'    => false,
    'fields' => array(
        array(
            'id'            => 'opt-typography-body',
            'type'          => 'typography',
            'title'         => esc_html__( 'Body font', 'alpas-toolkit' ),
            'google'        => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => true, // Select a backup non-google font in addition to a google font
            'all_styles'    => false, // Enable all Google Font style/weight variations to be added to the page
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => false,
            'output' => array(
                'body',
            ), // An array of CSS selectors to apply this font style to dynamically
            'subtitle' => esc_html__( 'Typography option with each property can be called individually.', 'alpas-toolkit' ),
            'default' => array(
                'font-family' => 'Open Sans',
                'google' => true,
            ),
        ),
        array(
            'id'            => 'opt-typography-secondary',
            'type'          => 'typography',
            'title'         => esc_html__( 'Secondary font', 'alpas-toolkit' ),
            'google'        => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => true, // Select a backup non-google font in addition to a google font
            'all_styles'    => false, // Enable all Google Font style/weight variations to be added to the page
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => false,
            'output' => array(
                '.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6, .section-title span, .btn, .read-more-btn, .evolta-nav .navbar .navbar-nav, .main-banner-content span, .about-content span, .overview-box .content .features-list, .single-funfacts .circlechart .circle-chart .circle-chart__info, .single-funfacts span, .single-team-box .content span, .services-details-overview .services-details-desc .features-list, .services-details-overview .services-details-desc .services-details-accordion .accordion .accordion-title, .single-feedback-item .client-info span, .single-blog-post .post-content .entry-meta li, blockquote, .blockquote, .page-title-content ul, .pagination-area, .blog-sidebar .widget ul li, .faq-accordion .accordion .accordion-title, .faq-contact-form form .form-control, .coming-soon-area .coming-soon-time #timer div, .contact-form form .form-control, .newsletter-content form button, .subscribe-contact-info .content span, #comments .comment-list .comment-body .reply a, .comment-respond label, .comment-respond .form-submit input',
            ), // An array of CSS selectors to apply this font style to dynamically
            'subtitle' => esc_html__( 'Typography option with each property can be called individually.', 'alpas-toolkit' ),
            'default' => array(
                'font-family' => 'Dosis',
                'google' => true,
            ),
        ),
    ),
) );

// Advanced Settings
Redux::setSection( $opt_name, array(
	'title'         => esc_html__('Advanced Settings', 'alpas-toolkit'),
    'icon'          => 'el-icon-cogs',
    'customizer'    => false,
	'fields' => array(
		array(
			'id' => 'alpas_css_code',
			'type' => 'ace_editor',
			'title' => esc_html__('Custom CSS Code', 'alpas-toolkit'),
			'desc' => esc_html__('e.g. .btn-primary{ background: #000; } Dont use &lt;style&gt; tags', 'alpas-toolkit'),
			'subtitle' => esc_html__('Paste your CSS code here.', 'alpas-toolkit'),
			'mode' => 'css',
			'theme' => 'monokai'
		),
		array(
			'id'        => 'alpas_js_code',
			'type'      => 'ace_editor',
			'title'     => esc_html__('Custom JS Code', 'alpas-toolkit'),
			'desc'      => esc_html__('e.g. alert("Hello World!"); Dont use&lt;script&gt;tags.', 'alpas-toolkit'),
			'subtitle'  => esc_html__('Paste your JS code here.', 'alpas-toolkit'),
			'mode'      => 'javascript',
			'theme'     => 'monokai'
		)
	)
) );

// -> START 404 Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( '404', 'alpas-toolkit' ),
    'id'                => 'alpas_404',
    'customizer'        => false,
    'icon'              => 'el el-question-sign',
    'fields'            => array(
        array(
            'id'        => 'img-404',
            'type'      => 'media',
            'url'       => true,
            'title'     => esc_html__('404 Image Upload', 'alpas-toolkit' ),
            'compiler'  => 'false',
        ),
        array(
            'id'       => 'content_not_found',
            'type'     => 'textarea',
            'title'    => esc_html__( '404 Title', 'alpas-toolkit' ),
            'default'  => esc_html__( 'Page Not Found', 'alpas-toolkit' ),
        ),
        array(
            'id'       => 'long_content_not_found',
            'type'     => 'textarea',
            'title'    => esc_html__( '404 Content', 'alpas-toolkit' ),
        ),
        array(
            'id'       => 'button_not_found',
            'type'     => 'text',
            'title'    => esc_html__( 'Go to Home Button Text', 'alpas-toolkit' ),
            'default'  => esc_html__( 'Go To Home', 'alpas-toolkit' ),
        ),
    ) 
));

      /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */


    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'alpas-toolkit' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'alpas-toolkit' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

