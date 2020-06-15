<?php global $alpas_opt;
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alpas
 */
	// White Logo
	if(isset($alpas_opt['white_logo']['url']) && $alpas_opt['white_logo']['url'] !='' ) {
		$white_logo = $alpas_opt['white_logo']['url'];
	}else {
		$white_logo = "null";
	} 
	// Map Image
	if(isset($alpas_opt['map_img']['url']) && $alpas_opt['map_img']['url'] !='' ) {
		$map_img = $alpas_opt['map_img']['url'];
	}else {
		$map_img = "null";
	} ?>

	<?php 
	// Footer Widget
	if(!is_active_sidebar( 'footer-one' ) && !is_active_sidebar( 'footer-two' ) && !is_active_sidebar( 'footer-three' )) {
		$footer_widget = 'yes';
		$footer_padding = 'footer-top-padding';
		$footer_margin = 'copy-top-margin';
	} else { 
		$footer_widget = 'no';
		$footer_padding = '';
		$footer_margin = '';
	} 
	
	$footer_map = 'footer-map-none';
	?>
	<!-- Start Footer Area -->
	<?php if ( !is_404()){ ?>
	<footer class="footer-area <?php echo esc_attr( $footer_padding ); ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<div class="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php
								// White Logo
								if ( $white_logo != 'null' ) { ?>
									<img src="<?php echo esc_url($white_logo); ?>" alt="<?php bloginfo( 'title' ); ?>"><?php
								} else { ?>
									<h2><?php bloginfo( 'name' ); ?></h2> <?php  
								} ?>
							</a>
							
							<?php 
							if(isset($alpas_opt['footer-social-text']) && $alpas_opt['footer-social-text'] !='' ) { ?>
								<p> <?php echo esc_html($alpas_opt['footer-social-text']); ?> </p> <?php
							} ?>
						</div>

						<?php get_template_part('inc/social-link', 'social-link'); ?>

					</div>
				</div>

				<?php if ( is_active_sidebar( 'footer-one' ) ) { ?>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<?php dynamic_sidebar('footer-one'); ?>
				</div> <?php 
				} ?>

				<?php if ( is_active_sidebar( 'footer-two' ) ) { ?>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<?php dynamic_sidebar('footer-two'); ?>
				</div> <?php 
				} ?>

				<?php if ( is_active_sidebar( 'footer-three' ) ) { ?>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<?php dynamic_sidebar('footer-three'); ?>
				</div> <?php 
				} ?>
			</div>
		</div> 

		<div class="copyright-area <?php echo esc_attr( $footer_margin ); ?>">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-6 col-sm-6">
						<p>
						<?php if(isset($alpas_opt['footer-copyright-text']) && $alpas_opt['footer-copyright-text'] !='') { 
							echo wp_kses_post($alpas_opt['footer-copyright-text']) ;
						} else {
							echo esc_html__('© Copyright 2020 All Rights Reserved.','alpas') ;
						} ?>
						</p>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<?php
						if(has_nav_menu('footer-bottom-menu')){
							wp_nav_menu( array(
								'theme_location'  => 'footer-bottom-menu',
								'depth'           => 1,
								'fallback_cb'     => false,
								'menu_id'         => 'footer-bottom-menu-one',
							) );
						} ?>
					</div>
				</div>
			</div>
		</div>

		<?php if (isset($alpas_opt['show_mapimage']) && $alpas_opt['show_mapimage'] == '1') { 
			if($map_img !='null') { ?>
				<div class="circle-map <?php if( $footer_widget == 'yes' ){ echo esc_attr( $footer_map ); } ?>"><img src="<?php echo esc_url($map_img); ?>" alt="<?php bloginfo( 'title' ); ?>"></div><?php
			}
		} ?>

		<div class="lines">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>
	</footer>
	<?php } ?>
	<!-- End Footer Area -->

	<div class="go-top"><i class="fas fa-arrow-up"></i><i class="fas fa-arrow-up"></i></div>

	<!--<div class="et-demo-options-toolbar">
		<?php
		global $wp;
		$current_url = home_url(add_query_arg(array(), $wp->request));
		?>
		<?php if( alpas_rtl() == true ): ?>
			<a href="<?php echo esc_url( $current_url ); ?>" class="hint--bounce hint--left hint--black" id="toggle-quick-options" aria-label="LTR">
				<i class="fas fa-align-left"></i>
			</a>
		<?php else: ?>
			<a href="<?php echo esc_url( $current_url ); ?>/?rtl=enable" class="hint--bounce hint--left hint--black" id="toggle-quick-options" aria-label="RTL">
				<i class="fas fa-align-right"></i>
			</a>
		<?php endif; ?>
		<a href="mailto:hello@envytheme.com" target="_blank" rel="nofollow" class="hint--bounce hint--left hint--black" aria-label="Reach Us">
			<i class="fas fa-life-ring"></i>
		</a>
		<a href="https://docs.envytheme.com/docs/alpas-theme-documentation/" target="_blank" rel="nofollow" class="hint--bounce hint--left hint--black" aria-label="Documentation">
			<i class="fas fa-book"></i>
		</a>
		<a href="https://1.envato.market/6Zxn3" target="_blank" rel="nofollow" class="hint--bounce hint--left hint--black" aria-label="Purchase alpas">
			<i class="fas fa-shopping-cart"></i>
		</a>
	</div> -->

	<?php wp_footer(); ?>

	</body>
</html>