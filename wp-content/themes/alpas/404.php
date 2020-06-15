<?php global $alpas_opt;
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Alpas
 */

get_header();

if ( isset($alpas_opt['content_not_found']) && $alpas_opt['content_not_found'] != '' ) {
	$title = $alpas_opt['content_not_found']; 
	$content = $alpas_opt['long_content_not_found']; 
	$button = $alpas_opt['button_not_found']; 
?>

<div class="error-area">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="container">
				<div class="error-content">
					<?php if( $alpas_opt['img-404']['url']!='' ) { ?>
						<img src="<?php echo esc_url($alpas_opt['img-404']['url'] ); ?>">
					<?php } ?>
					<h3><?php echo esc_html( $title ); ?></h3>
					<p><?php echo esc_html( $content ); ?></p>
					<?php if( !$button == '' ) {?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php echo esc_html( $button ); ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}else { ?>
	<div class="error-area">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="error-content">
						<img src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/404.png' ); ?>" alt="<?php echo esc_attr__( 'Error', 'alpas' ); ?>">
						<h3><?php echo esc_html__('Page not found','alpas')?></h3>
						<p><?php echo esc_html__('The page you are looking for might have been removed had its name changed or is temporarily unavailable.','alpas')?></p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php echo esc_html__('Go to Home', 'alpas'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}
get_footer();
