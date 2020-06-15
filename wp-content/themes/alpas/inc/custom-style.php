<?php
/**
 * Register custom style.
 */

if ( ! function_exists( 'alpas_custom_css' ) ) {
    function alpas_custom_css(){
        
        $custom_css ='';
        global $alpas_opt;

        if( isset($alpas_opt['primary_color'] ) ) {
            $primary_color = $alpas_opt['primary_color'];
            
        } else {
            $primary_color = '#0ca59d';
        }

        if( isset($alpas_opt['optional_color'] ) ) {
            $optional_color = $alpas_opt['optional_color'];
            
        } else {
            $optional_color = '#ffac00';
        }

        if(isset($alpas_opt['grad_color1']) && isset($alpas_opt['grad_color2']) && isset($alpas_opt['grad_color3']) && isset($alpas_opt['grad_color4']) && isset($alpas_opt['grad_color5'])) { 
            $grad_color1 = $alpas_opt['grad_color1'];
            $grad_color2 = $alpas_opt['grad_color2'];
            $grad_color3 = $alpas_opt['grad_color3'];
            $grad_color4 = $alpas_opt['grad_color4'];
            $grad_color5 = $alpas_opt['grad_color5'];
        } else {
            $grad_color1 = '#0ca59d';
            $grad_color2 = '#28aca4';
            $grad_color3 = '#39b2ab';
            $grad_color4 = '#47b9b3';
            $grad_color5 = '#54c0ba';
        }

        if(isset($alpas_opt['opt_grad_color1']) && isset($alpas_opt['opt_grad_color2']) && isset($alpas_opt['opt_grad_color3']) && isset($alpas_opt['opt_grad_color4']) && isset($alpas_opt['opt_grad_color5'])) { 
            $opt_grad_color1 = $alpas_opt['opt_grad_color1'];
            $opt_grad_color2 = $alpas_opt['opt_grad_color2'];
            $opt_grad_color3 = $alpas_opt['opt_grad_color3'];
            $opt_grad_color4 = $alpas_opt['opt_grad_color4'];
            $opt_grad_color5 = $alpas_opt['opt_grad_color5'];
        } else {
            $opt_grad_color1 = '#ffac00';
            $opt_grad_color2 = '#ffac00';
            $opt_grad_color3 = '#ffac00';
            $opt_grad_color4 = '#faa01f';
            $opt_grad_color5 = '#f7b733';
        }

        if(isset($alpas_opt['nav_grad_color1']) && isset($alpas_opt['nav_grad_color2']) && isset($alpas_opt['nav_grad_color3']) && isset($alpas_opt['nav_grad_color4']) && isset($alpas_opt['nav_grad_color5'])) { 
            $nav_grad_color1 = $alpas_opt['nav_grad_color1'];
            $nav_grad_color2 = $alpas_opt['nav_grad_color2'];
            $nav_grad_color3 = $alpas_opt['nav_grad_color3'];
            $nav_grad_color4 = $alpas_opt['nav_grad_color4'];
            $nav_grad_color5 = $alpas_opt['nav_grad_color5'];
        } else {
            $nav_grad_color1 = '#0ca59d';
            $nav_grad_color2 = '#28aca4';
            $nav_grad_color3 = '#39b2ab';
            $nav_grad_color4 = '#47b9b3';
            $nav_grad_color5 = '#54c0ba';
        }

        if( isset($alpas_opt['text_color'] ) ) {
            $text_color = $alpas_opt['text_color'];
            
        } else {
            $text_color = '#57647c';
        }

        if(isset($alpas_opt['footer_bgc'] ) ) {
            $footer_bgc = $alpas_opt['footer_bgc'];
            
        } else {
            $footer_bgc = '#182c51';
        }

        if(isset($alpas_opt['footer_bottom_bg'] ) ) {
            $footer_bottom_bg = $alpas_opt['footer_bottom_bg'];
            
        } else {
            $footer_bottom_bg = '#0d1d3b';
        }

        $custom_css .='
        .post_type_icon, .post_type, .single-blog-video .play-link, .wp-block-button .wp-block-button__link, .has-cyan-bluish-gray-background-color.has-cyan-bluish-gray-background-color, .page-links .current, .page-links .post-page-numbers:hover, .post-password-form input[type="submit"], .comment-navigation .nav-links .nav-previous a:hover, .comment-navigation .nav-links .nav-next a:hover, .blog-sidebar .widget ul li::before, #comments .comment-list .comment-body .reply a:hover, .comment-respond .form-submit input, .blog-sidebar .tagcloud a:hover, .blog-sidebar .tagcloud a:focus, .preloader::before, .preloader::after, .main-banner, .overview-box .content .features-list li span i, .funfacts-area, .single-team-box:hover .content, .services-details-overview .services-details-desc .services-details-accordion .accordion .accordion-title i, .single-serve-box::before, .page-title-area, .pagination-area .page-numbers.current, .pagination-area .page-numbers:hover, .pagination-area .page-numbers:focus, .pages-links .post-page-numbers.current, .pages-links .post-page-numbers:hover, .pages-links .post-page-numbers:focus, .faq-accordion .accordion .accordion-title i, .coming-soon-area .coming-soon-content .social ul li a:hover, .contact-info-box:hover .icon, .newsletter-content form button:hover, .go-top { background-color: '.esc_attr($primary_color).';}

        .wp-block-file .wp-block-file__button, .wp-block-tag-cloud a:hover, .wp-block-tag-cloud a:focus, .wp-block-search button { background-color: '.esc_attr($primary_color).' !important; }

        .sticky .post-content .title::before, .sticky .post-content .read-more-btn, .blog-details .blog-details-content code, .blog-details .blog-details-content ul a, .blog-details .blog-details-content .category li a:hover, .entry-meta li a:hover, .blog-details .blog-details-content ul.entry-meta li a:hover, #comments .comment-list .comment-body a, .wp-block-image figcaption a, .blog-details .blog-details-content p a, .blog-details .blog-details-content ol a, .wp-block-file a, table th a, .blog-details .blog-details-content kbd, .wp-caption .wp-caption-text a, .comments-area .comment-content code, .comments-area .comment-content kbd, table td a, table td a:hover, .blog-sidebar .widget ul li a:hover, .page-main-content .entry-content a, .page-main-content kbd, .page-main-content code, a:hover, a:focus, .section-title span, .read-more-btn i, .read-more-btn:hover, .about-content span, .single-team-box .image .social a, .single-blog-post .post-content .entry-meta li a:hover, .blog-details .article-footer .article-tags a:hover, .entry-meta li a:hover, .entry-meta li i, .contact-info-box .icon, .contact-info-box p a:hover, .subscribe-contact-info .content span a:hover, .wpcf7-list-item-label a, .single-blog-video .play-link:hover, .single-services-box .icon { color: '.esc_attr($primary_color).';}

        .sticky .post-content .entry-meta li a:hover, .is-style-outline .wp-block-button__link, .blog-details .blog-meta ul li a:hover, .blog-details .blog-meta ul li a:hover, table th a:hover, .main-banner-content .btn-primary:hover { color: '.esc_attr($primary_color).' !important; }

        .form-control:focus, .contact-info-box:hover .icon, blockquote { border-color: '.esc_attr($primary_color).'; }

        .btn-light:hover, .btn-light:focus { border-color: '.esc_attr($primary_color).' !important; }

        .evolta-nav .navbar .others-options .btn-primary::after, .main-banner-content .btn-primary::before, .newsletter-content form button, .single-footer-widget .social li a:hover, .single-footer-widget h3::before, .go-top::before { background: '.esc_attr($optional_color).';}

        .read-more-btn, .read-more-btn:hover i, .evolta-nav .navbar .navbar-nav .nav-item a.active, .evolta-nav .navbar .navbar-nav .nav-item:focus a, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li a:hover, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li a:focus, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li a.active, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a:hover, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a:focus, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a.active, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li.active a, .evolta-nav .navbar .navbar-nav .nav-item .dropdown-menu li.active a, .evolta-nav .navbar .others-options .cart-btn:hover, .evolta-nav .navbar .others-options .btn-primary, .evolta-nav .navbar .others-options .option-item .search-btn:hover, .evolta-nav .navbar .others-options .option-item .close-btn:hover, .search-overlay.search-popup .search-form .search-button:hover, .search-overlay.search-popup .search-form .search-button:focus, .single-team-box .image .social a:hover, .single-team-box .content span, .services-details-overview .services-details-desc .features-list li i, .single-feedback-item::before, .subscribe-contact-info .content span, .subscribe-contact-info .content span a, .single-footer-widget ul li a:hover, .single-footer-widget .footer-contact-list li a:hover, .copyright-area p a:hover, .copyright-area ul li a:hover { color: '.esc_attr($optional_color).';}

        .search-overlay.search-popup .search-form .search-input:focus { border-color: '.esc_attr($optional_color).'; }

        @media only screen and (max-width: 991px) {
            .evolta-responsive-nav .evolta-responsive-menu.mean-container .mean-nav ul li.active a,  .evolta-responsive-nav .evolta-responsive-menu.mean-container .mean-nav ul li.active li.active a, .evolta-responsive-nav .evolta-responsive-menu.mean-container .mean-nav ul li.active li li.active a, .evolta-responsive-nav .evolta-responsive-menu.mean-container .mean-nav ul li.active li li li.active a, .evolta-responsive-nav .evolta-responsive-menu.mean-container .mean-nav ul li.active li li li li.active a, .evolta-responsive-nav .evolta-responsive-menu.mean-container .mean-nav ul li a.active, .others-options .cart-btn:hover { color: '.esc_attr($optional_color).'; }
        }

        .single-funfacts .circlechart .circle-chart .circle-chart__circle {
            stroke: '.esc_attr($optional_color).' !important;
        }

        .blog-sidebar .widget_search form button::before, .blog-sidebar .widget .widget-title::before, .comments-title::before, .comment-respond .comment-reply-title::before, .search-form .search-submit, .btn-primary::before, .feedback-area {background: linear-gradient(to right top, '.esc_attr($grad_color1).', '.esc_attr($grad_color2).', '.esc_attr($grad_color3).', '.esc_attr($grad_color4).', '.esc_attr($grad_color5).')}

        .navbar-area.is-sticky {background: linear-gradient(to right top, '.esc_attr($grad_color1).', '.esc_attr($grad_color2).', '.esc_attr($grad_color3).', '.esc_attr($grad_color4).', '.esc_attr($grad_color5).') !important}

        .blog-sidebar .widget_search form button::after, .comment-respond .form-submit input:hover, .comment-respond .form-submit input:focus, .btn-primary::after, .evolta-nav .navbar .others-options .option-item a span {background: linear-gradient(to right, '.esc_attr($opt_grad_color1).', '.esc_attr($opt_grad_color2).', '.esc_attr($opt_grad_color3).', '.esc_attr($opt_grad_color4).', '.esc_attr($opt_grad_color5).')}

        p, .search-overlay.search-popup .search-form .search-button, .services-details-overview .services-details-desc .features-list li, .single-feedback-item .feedback-desc p::before, .single-feedback-item .feedback-desc p::after, .single-blog-post .post-content .entry-meta li, .single-blog-post .post-content .entry-meta li a, .entry-meta li a, .contact-info-box p a, .blog-details .blog-details-content ul.entry-meta li a, .comment-respond .comment-form-cookies-consent label,#comments .comment-list .comment-body .reply a, .blog-details .blog-details-content ol li, .blog-details .blog-details-content ul li, .blog-sidebar .calendar_wrap caption,  .blog-sidebar .tagcloud a, .blog-sidebar .widget ul li, .blog-sidebar .widget ul li a, .entry-meta li, .entry-meta li a { color: '.esc_attr($text_color).';}

        .single-blog-post .post-content .entry-meta li::before { background-color: '.esc_attr($text_color).';}

         .navbar-area.is-sticky, .nav-color {background: linear-gradient(to right top, '.esc_attr($nav_grad_color1).', '.esc_attr($nav_grad_color2).', '.esc_attr($nav_grad_color3).', '.esc_attr($nav_grad_color4).', '.esc_attr($nav_grad_color5).') !important}

        .footer-area { background-color: '.esc_attr($footer_bgc).'; }

        .copyright-area { background-color: '.esc_attr($footer_bottom_bg).'; }

        .single-products .sale-btn, .single-products .products-image ul li a:hover, .productsQuickView .modal-dialog .modal-content .products-content form button, .productsQuickView .modal-dialog .modal-content button.close:hover, .productsQuickView .modal-dialog .modal-content button.close:hover, .woocommerce ul.products li.product:hover .add-to-cart-btn, .shop-sidebar .widget_product_search form button, .shop-sidebar a.button, .shop-sidebar .woocommerce-widget-layered-nav-dropdown__submit, .shop-sidebar .woocommerce button.button, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .products_details div.product .woocommerce-tabs .panel #respond input#submit, .products_details div.product .product_title::before, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover, .btn-primary:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce .woocommerce-MyAccount-navigation ul .is-active a, .woocommerce .woocommerce-MyAccount-navigation ul li a:hover, .products_details div.product span.sale-btn, .shop-sidebar .tagcloud a:focus, .shop-sidebar .widget_search form button, .shop-sidebar .widget .widget-title::before, .shop-sidebar .widget ul li::before, .shop-sidebar .tagcloud a:hover, .shop-sidebar .tagcloud a:focus { background-color: '.esc_attr($primary_color).'; }

        .btn-primary, .btn-primary.disabled, .btn-primary:disabled { background-color: '.esc_attr( $optional_color ).'; }

        .productsQuickView .modal-dialog .modal-content .products-content .product-meta span a:hover, .woocommerce ul.products li.product h3 a:hover, .woocommerce ul.products li.product .add-to-cart-btn, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .products_details div.product .woocommerce-tabs ul.tabs li a:hover, .products_details div.product .woocommerce-tabs ul.tabs li.active, .products_details div.product .woocommerce-tabs ul.tabs li.active a:hover, .products_details div.product .product_meta span.posted_in a:hover, .products_details div.product .product_meta span.tagged_as a:hover, .products_details div.product span.price, .cart-table table tbody tr td.product-name a, .woocommerce-message::before, .woocommerce-info::before, .shop-sidebar .widget ul li a:hover, .shop-sidebar .widget_rss .widget-title .rsswidget { color: '.esc_attr ($primary_color).'; }

        .woocommerce-info, .woocommerce-message { border-top-color: '.esc_attr ($primary_color).'; }
        .shop-sidebar .widget_shopping_cart .cart_list li a:hover, .shop-sidebar ul li a:hover { color: '.esc_attr ($primary_color).' !important; }

        .woocommerce ul.products li.product:hover .add-to-cart-btn, .form-control:focus, .woocommerce .form-control:focus, .shop-sidebar .tagcloud a:hover, .shop-sidebar .tagcloud a:focus { border-color: '.esc_attr ($primary_color).'; }

        ';

        // Hide Sticky Header
        if(isset($alpas_opt['enable_sticky_header']) && $alpas_opt['enable_sticky_header'] == false){ $custom_css .='
            .navbar-area.is-sticky{
                display:none !important;
            }';
        }

        // Custom Css
        if( isset($alpas_opt['alpas_css_code'] ) && !empty($alpas_opt['alpas_css_code']) ):
            $custom_css .= $alpas_opt['alpas_css_code'];
        endif;
        

        wp_add_inline_style('alpas-main-style', $custom_css);

        // Custom Js
        $custom_script ='';
        if( isset($alpas_opt['alpas_js_code'] )){
            $custom_script .= $alpas_opt['alpas_js_code'];
        }
        
        wp_add_inline_script( 'alpas-main', $custom_script );
    }
  }
add_action( 'wp_enqueue_scripts', 'alpas_custom_css' );