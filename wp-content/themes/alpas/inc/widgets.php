<?php
// Register widget area.
function alpas_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alpas' ),
		'id'            => 'article-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'alpas' ),
		'before_widget' => '<div id="%1$s" class="sidebar widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Shop Sidebar
    register_sidebar( array( 
        'name'          => esc_html__( 'Shop Sidebar', 'alpas' ),
        'id'            => 'shop',
        'description'   => esc_html__( 'Add widgets here.', 'alpas' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'alpas' ),
		'id'            => 'footer-one',
		'description'   => esc_html__( 'Add widgets here.', 'alpas' ),
		'before_widget' => '<div class="single-footer-widget footer-wid widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-wid-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'alpas' ),
		'id'            => 'footer-two',
		'description'   => esc_html__( 'Add widgets here.', 'alpas' ),
		'before_widget' => '<div class="single-footer-widget footer-wid widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-wid-title">',
		'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'alpas' ),
		'id'            => 'footer-three',
		'description'   => esc_html__( 'Add widgets here.', 'alpas' ),
		'before_widget' => '<div class="single-footer-widget footer-wid widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-wid-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'alpas_widgets_init' );