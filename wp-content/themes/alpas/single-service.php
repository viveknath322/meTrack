<?php global $alpas_opt;
/**
 * Single Service Page
 * @package Alpas
 */

get_header();

// After Hiding Banner add spacing
if( alpas_hide_page_banner() == 1 ){
    $page_spac = "mt-80";
} else {
    $page_spac = "";
}
// Page Banner Alignment Class Generate
if(alpas_page_banner_alignment() == 1 ){
    $alignment = "text-left";
} elseif(alpas_page_banner_alignment() == 3) {
    $alignment = "text-right";
} else {
	$alignment = "text-center";
}

if ( function_exists('acf_add_options_page') ) {
	$bg = get_field( 'banner_background_image' );
} else {
	$bg = '';
}

//Page Banner Area
if(alpas_hide_page_banner() == 1 ) {} else { ?>
	<div class="page-title-area" style="background-image:url(<?php echo esc_url( $bg ); ?>);">
		<div class="container">
			<div class="page-title-content <?php echo esc_attr($alignment); ?>">
				<h2><?php the_title(); ?></h2>
				<?php
				if(alpas_breadcumb() != 1){ ?>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'alpas')?></a></li>
						<li><?php the_title(); ?></li>
					</ul><?php
				} ?>
			</div>
		</div>
	</div>
	<?php
} ?>

<!-- Start Service Details Area -->
<div class="services-details-area ptb-110 <?php echo esc_attr($page_spac); ?>">
    <div class="container">
        <?php
        while ( have_posts() ) :
        the_post(); ?>

        <?php echo the_content(); ?> 

        <?php
        endwhile; // End of the loop.
        ?>
    </div>
</div>
<!-- End Research Details Area -->

<?php
get_footer();
