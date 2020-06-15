<?php
/**
 *  Your Domain WooCommerce functions and definitions
 */
 	// Theme WooCommerce Support
	add_theme_support( 'woocommerce', apply_filters( 'storefront_woocommerce_args', array(
		'single_image_width'    => 530,
		'thumbnail_image_width' => 350,
		add_theme_support( 'wc-product-gallery-zoom' ),
		add_theme_support( 'wc-product-gallery-lightbox' ),
		add_theme_support( 'wc-product-gallery-slider' ),
	) ) );

	if ( is_active_sidebar( 'shop' ) ) {
		// Change number or products per row to 3
		add_filter('loop_shop_columns', 'alpas_loop_columns', 999);
		if (!function_exists('alpas_loop_columns')) {
			function alpas_loop_columns() {
				global $alpas_opt;

				if ( isset( $_GET['shop-sidebar'] ) ):
					if( $_GET['shop-sidebar'] == 'right' || $_GET['shop-sidebar'] == 'left' ):
						return 2; // 2 products per row
					elseif( $_GET['shop-sidebar'] == 'none' ):
						return 3; // 3 products per row
					endif;
				else:
					if ( $alpas_opt['alpas_product_sidebar'] == 'alpas_product_no_sidebar' ):
						return 3; // 3 products per row
					else:
						return 2; // 2 products per row
					endif;
				endif;	
			}
		}
	} else {
		// Change number or products per row to 3
		add_filter('loop_shop_columns', 'alpas_loop_columns', 999);
		if (!function_exists('alpas_loop_columns')) {
			function alpas_loop_columns() {
				return 3; // 3 products per row
			}
		}
	}

	// Change number of related products output
	function alpas_woo_related_products_limit() {
		global $product;
		$args['posts_per_page'] = 6;
		return $args;
	}
	add_filter( 'woocommerce_output_related_products_args', 'alpas_related_products_args', 20 );
	function alpas_related_products_args( $args ) {
		global $alpas_opt;

		if( isset( $alpas_opt['alpas_related_product_count'] ) ):
		   $count = $alpas_opt['alpas_related_product_count'];
		else:
		   $count = '3';
		endif;

		$args['posts_per_page'] = $count; // related products
		
		global $alpas_opt;
		if ( isset( $_GET['shop-sidebar'] ) ):
			if( $_GET['shop-sidebar'] == 'right' || $_GET['shop-sidebar'] == 'left' ):
				$args['columns'] = 2; // 2 products per row
			elseif( $_GET['shop-sidebar'] == 'none' ):
				$args['columns'] = 3; // 3 products per row
			endif;
		else:
			if ( $alpas_opt['alpas_product_sidebar'] == 'alpas_product_no_sidebar' ):
				$args['columns'] = 3; // 3 products per row
			else:
				$args['columns'] = 2; // 2 products per row
			endif;
		endif;
		
		return $args;
	}

	if ( ! function_exists( 'alpas_wc_refresh_mini_cart_count' ) ) :
		function alpas_wc_refresh_mini_cart_count($fragments){
			ob_start();
			?>
			<span class="mini-cart-count"> 
				<?php echo WC()->cart->get_cart_contents_count(); ?>
			</span>
			<?php
				$fragments['.mini-cart-count'] = ob_get_clean();
			return $fragments;
		}
	endif;
	add_filter( 'woocommerce_add_to_cart_fragments', 'alpas_wc_refresh_mini_cart_count');

	// Filter woocommerce_checkout_fields
	if ( ! function_exists( 'alpas_field_class_add' ) ) :
		function alpas_field_class_add($fields) {
		foreach ($fields as &$fieldset) {
			foreach ($fieldset as &$field) {
				$field['class'][] = 'form-group'; 
				$field['input_class'][] = 'form-control';
			}
		}
		return $fields;
	}
	endif;
	add_filter('woocommerce_checkout_fields', 'alpas_field_class_add' );

	/**
	 * Post Per page
	 */
	add_filter( 'loop_shop_per_page', 'alpas_redefine_products_per_page', 9999 );
	
	function alpas_redefine_products_per_page( $per_page ) {
		global $alpas_opt;

		if( isset( $alpas_opt['products_page_count'] ) ):
		   $count = $alpas_opt['products_page_count'];
		else:
		   $count = '6';
		endif;
		
		$per_page = $count;
		return $per_page;
	}

	if ( ! function_exists( 'alpas_refresh_mini_cart_count' ) ) :
		function alpas_refresh_mini_cart_count($fragments){
			ob_start();
			?>
			<span class="cart-count"> 
				<?php echo WC()->cart->get_cart_contents_count(); ?>
			</span>
			<?php
				$fragments['.cart-count'] = ob_get_clean();
			return $fragments;
		}
	endif;
	add_filter( 'woocommerce_add_to_cart_fragments', 'alpas_refresh_mini_cart_count');