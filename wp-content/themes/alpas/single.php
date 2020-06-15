<?php
/**
 * The template for displaying all single posts
 * @package Alpas
 */

get_header();

if ( isset($alpas_opt['blog-layout']) && $alpas_opt['blog-layout'] == 1 ) {
    $blogimg_size = "alpas_single_thumb";
}elseif ( isset($alpas_opt['blog-layout']) && $alpas_opt['blog-layout'] == 2 ) {
    $blogimg_size = "alpas_single_thumb";
}else {
    $blogimg_size = "full";
}

// After Hiding Banner add spacing
if( alpas_hide_page_banner() == 1 ){
    $page_spac = "mt-80";
} else {
    $page_spac = "";
}

// Page Banner Alignment Class Generate
if( alpas_page_banner_alignment() == 1 ){
    $alignment = "text-left";
} elseif( alpas_page_banner_alignment() == 3) {
    $alignment = "text-right";
} else {
	$alignment = "text-center";
}

if ( function_exists('acf_add_options_page') ) {
	$bg = get_field( 'banner_background_image' );
} else {
	$bg = '';
}

if( alpas_hide_page_banner() == 1 ) { } else { ?>
	<div class="page-title-area" style="background-image:url(<?php echo esc_url( $bg ); ?>);">
		<div class="container">
			<div class="page-title-content <?php echo esc_attr($alignment); ?>">
				<h2><?php the_title(); ?></h2>

				<?php
            	if(alpas_breadcumb() != 1){ ?>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'alpas')?></a></li>
						<li><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php esc_html_e('blog', 'alpas') ?></a></li>
						<li>
							<?php 
							$title = the_title('','',false);
							if (!empty($title)) { 
								the_title();
							}else{
								esc_html_e('No Title ', 'alpas');
							}
							?>
						</li>
					</ul><?php
            	} ?>
			</div>
		</div>
	</div> <?php
} ?>

<!-- Start Blog Area -->
<div class="blog-details-area ptb-110 <?php echo esc_attr($page_spac); ?>"> 
	<div class="container">
		<div class="row"> <?php
			while ( have_posts() ) : the_post(); ?>
			<div class="<?php if ( is_active_sidebar( 'article-sidebar' ) && isset($alpas_opt['blog-layout']) && $alpas_opt['blog-layout'] == 1 ) { echo esc_attr('col-lg-8');} elseif(isset($alpas_opt['blog-layout']) && $alpas_opt['blog-layout'] == 3) { echo esc_attr('col-lg-12 col-md-12');} elseif(isset($alpas_opt['blog-layout']) && $alpas_opt['blog-layout'] == 2){ echo esc_attr('col-lg-8 offset-lg-2');} elseif( !is_active_sidebar( 'article-sidebar' ) ) { echo esc_attr('col-lg-8 offset-lg-2');}  else { echo esc_attr('col-lg-8');} ?>">
				<div class="blog-details">
					<?php
					if ( has_post_format( 'video' )) { ?>
						<?php if (has_post_thumbnail()) { ?>
							<div class="single-blog-video">
								<img src="<?php the_post_thumbnail_url($blogimg_size) ?>" alt="<?php echo esc_attr__('blog image', 'alpas')?>">
								<?php if ((class_exists( 'ACF' )) ) { 
								$link = get_field( 'video_link' ); ?>
								<a href="<?php echo esc_url($link); ?>" class="play-link popup-youtube">
									<i class="fa fa-play"></i>
								</a>
								<?php 
								} ?>
							</div>
						<?php
						}
					} ?>

					<?php 
					$post_format =  get_post_format() ;
					if ($post_format != 'video') {
						if(has_post_thumbnail()) { ?>
							<div class="article-img">
								<img src="<?php the_post_thumbnail_url($blogimg_size) ?>" alt="<?php echo esc_attr__('blog image', 'alpas')?>">
							</div> <?php 
						} 
					} ?>

					<div class="blog-details-content">
						<ul class="entry-meta">
							<li> <i class="far fa-user-circle"></i>
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ) ?>">
									<?php the_author() ?>
								</a>
							</li>
							<li>
								<i class="far fa-calendar-alt"></i>
								<?php echo esc_html(get_the_date('F d, Y')) ?>
							</li>
							<li>
								<i class="far fa-comment-dots"></i> 
								<?php comments_number(); ?>
							</li>
						</ul>

						<?php the_content(); 
						
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alpas' ),
							'after'  => '</div>',
						) );
						?>

						<?php if ( get_the_tags() ) {  ?>
						<ul class="category">
							<li><span class="icon-book"><i class="fas fa-bookmark"></i></span></li>
							<?php $tags = get_the_tags();
							foreach ($tags as $tag ) {  ?>
								<li><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
									<?php echo esc_html($tag->name) ?><span class="seperator"><?php echo esc_html(','); ?></span></a>
								</li>
								
							<?php
							} ?>
						</ul>
						<?php } ?>
					</div>
				</div>
			
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div> <?php 
			endwhile; // End of the loop.

			// Sidebar
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

