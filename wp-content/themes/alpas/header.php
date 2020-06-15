<?php global $alpas_opt;
/**
 * The header for our theme
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alpas
 */

?>
<!doctype html>
<?php if( alpas_rtl() == true ): ?><html dir="rtl" <?php language_attributes(); ?>>
<?php else: ?><html <?php language_attributes(); ?>><?php endif; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	
	<!-- Start Preloader Area -->
	<?php if (isset($alpas_opt['enable_preloader']) && $alpas_opt['enable_preloader'] == '1') { ?>
		<div class="preloader">
			<div class="spinner"></div>
        </div>
	<?php } ?>
	<!-- End Preloader Area -->

	<?php
	// Black Logo
	if ( isset($alpas_opt['white_logo']['url']) && $alpas_opt['white_logo']['url'] !='' ) {
		$white_logo = $alpas_opt['white_logo']['url'];
	} else {
		$white_logo = "null";
	}

	if ( isset( $alpas_opt['enable_shop_pages_banner'] ) && $alpas_opt['enable_shop_pages_banner'] == true ) : 
		$hide_banner    = $alpas_opt['enable_shop_pages_banner'];
	else:
		$hide_banner    = false;
	endif;

	// After Hiding Banner add spacing
	if( alpas_hide_page_banner() == 1 || alpas_hide_page_banner_acf() == 'yes' || $hide_banner == false ){
		$nav_class = "nav-color";
	} else {
		$nav_class = "";
	} ?>

	<?php
	// Choose Navbar Style
	if (class_exists('ACF')) {
		if( get_field('choose_navigation_style') == 2 ) {
			$container_cls = "container-fluid";
		} else {
			$container_cls = "container";
		}
	} else {
		$container_cls = "container";
	} 
	
		// WP Nav Class
		$hide_wp_nav = esc_attr("hide-wp-nav");
	?>

	<!-- Start Navbar Area -->
	<?php if ( !is_404()){ ?>
		<div class="navbar-area <?php echo esc_attr($nav_class); ?>">
			<div class="evolta-responsive-nav <?php if ( is_user_logged_in() ) {echo esc_attr($hide_wp_nav);}?>">
				<div class="container">
					<div class="evolta-responsive-menu">
						<div class="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php
								// Black Logo
								if ( $white_logo != 'null' ) { ?>
									<img src="<?php echo esc_url($white_logo); ?>" alt="<?php bloginfo( 'title' ); ?>"><?php
								}else{ ?>
									<h2><?php bloginfo( 'name' ); ?></h2>
								<?php }  ?>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="evolta-nav <?php if ( is_user_logged_in() ) {echo esc_attr($hide_wp_nav);}?>">
				<div class="<?php echo esc_attr($container_cls); ?>">
					<nav class="navbar navbar-expand-md navbar-light">
						<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php
							// Logo
							if ( $white_logo != 'null' ) { ?>
								<img src="<?php echo esc_url( $white_logo ); ?>" alt="<?php bloginfo( 'title' ); ?>"><?php
							} else { ?>
								<h2><?php bloginfo( 'name' ); ?></h2><?php 
							}  ?>
						</a>

						<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
							<?php 
							if(has_nav_menu('header')){
								wp_nav_menu( array(
									'theme_location'  => 'header',
									'depth'           => 3,
									'container'       => 'div',
									'menu_class'      => 'navbar-nav',
									'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
									'walker'          => new Alpas_Bootstrap_Navwalker()
								) );
							} ?>

							<?php
							if( (isset($alpas_opt['enable_header_btn']) && $alpas_opt['enable_header_btn'] != 0) || (isset($alpas_opt['enable_search']) && $alpas_opt['enable_search'] != 0)  ){
								$head_btn = $alpas_opt['enable_header_btn'];
								$link	  = $alpas_opt['btn_link']; ?>

								<div class="others-options"> <?php
									if($alpas_opt['enable_search'] == true || $alpas_opt['enable_cart_btn'] == true ) { ?>

										<?php if( $alpas_opt['enable_cart_btn'] == true ) {
											if ( class_exists( 'WooCommerce' ) ) { ?>
												<a class="cart-btn" href="<?php echo esc_url(wc_get_cart_url()) ?>">
													<i class='flaticon-shopping-basket'></i>
													<span class="mini-cart-count"></span>
												</a><?php 
											}
										} ?>
										
										<div class="option-item"><i class="search-btn flaticon-search"></i>
											<i class="close-btn fas fa-times"></i>
											
											<div class="search-overlay search-popup">
												<div class='search-box'>
													<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

														<input type="text" class="search-input" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Search','alpas'); ?>" required />

														<button type="submit" id="searchsubmit" class="search-button"><i class="fas fa-search"></i></button>
													</form>
												</div>
											</div>
										</div>
										<?php 
									} 
									if($head_btn == true) { ?>
										<a href="<?php echo esc_url($link); ?>" class="btn btn-primary"><?php echo esc_html($alpas_opt['header_btn_text']); ?></a> <?php 
									} ?>

								</div>
							<?php } ?>
						</div>
					</nav>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- End Navbar Area -->
