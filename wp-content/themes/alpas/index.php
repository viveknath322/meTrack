<?php global $alpas_opt;
/**
 * The main theme file
 * @package Alpas
 */

get_header(); ?>
<?php
// Breadcrumb Title
if(isset($alpas_opt['blog_title'])) {
	$title = $alpas_opt['blog_title'];
}else {
	$title = esc_html__('Blog', 'alpas');
}

// Page Banner Alignment Class Generate
if(alpas_page_banner_alignment() == 1 ){
    $alignment = "text-left";
} elseif(alpas_page_banner_alignment() == 3) {
    $alignment = "text-right";
} else {
	$alignment = "text-center";
}

// After Hiding Banner add spacing
if(alpas_hide_page_banner() == 1 ){
    $page_spac = "mt-80";
} else {
    $page_spac = "";
}

if( isset($alpas_opt['blog_bg']) ) {
    $bg    = $alpas_opt['blog_bg']['url'];
} else {
    $bg    = '';
}

if( alpas_hide_page_banner() == 1 ) { }else { ?>
	<div class="page-title-area" style="background-image:url(<?php echo esc_url($bg); ?>);">
		<div class="container">
			<div class="page-title-content <?php echo esc_attr($alignment); ?>">
				<h2><?php if(!$title == ''){ echo esc_html($title); }else{ esc_html_e('Blog', 'alpas'); } ?></h2>
                <?php
            	  if(alpas_breadcumb() != 1){ ?>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'alpas')?></a></li>
                        <li><?php if(!$title == ''){ echo esc_html($title); }else{ esc_html_e('Blog', 'alpas'); } ?></li>
                    </ul><?php
            	} ?>
			</div>
		</div>
	</div>
<?php
} ?>

<!-- Start Blog Area -->
<div class="blog-area ptb-110 <?php echo esc_attr($page_spac); ?>">
    <div class="container">
        <div class="row">
            <!-- Start Blog Content -->
            <div class="<?php if ( is_active_sidebar( 'article-sidebar' ) && isset($alpas_opt['blog-layout']) && $alpas_opt['blog-layout'] == 1 ) { echo esc_attr('col-lg-8');} elseif(isset($alpas_opt['blog-layout']) && $alpas_opt['blog-layout'] == 3) { echo esc_attr('col-lg-12 col-md-12');} elseif(isset($alpas_opt['blog-layout']) && $alpas_opt['blog-layout'] == 2){ echo esc_attr('col-lg-8 offset-lg-2');} elseif( !is_active_sidebar( 'article-sidebar' ) ) { echo esc_attr('col-lg-8 offset-lg-2');}  else { echo esc_attr('col-lg-8');} ?>">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/post-formats/content',get_post_format());
                    endwhile;
                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif;
                ?>
        
                <!-- Stat Pagination -->
                <div class="pagination-area">
                    <nav aria-label="navigation">
                    <?php echo paginate_links( array(
                        'format' => '?paged=%#%',
                        'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                        'next_text' => '<i class="fa fa-angle-double-right"></i>',
                        )
                    ) ?>
                    </nav>
                </div>
            </div>
            <!-- End Blog Content -->
            <?php
            if ( is_active_sidebar( 'article-sidebar' ) && isset($alpas_opt['blog-layout']) ){
                if(isset($alpas_opt['blog-layout']) && $alpas_opt['blog-layout'] != 1 ) {

                } else {
                    get_sidebar(); 
                }
            } else {
                get_sidebar(); 
            } ?>
        </div>   
    </div>
</div>
<!-- End Blog Area -->
<?php
get_footer();
