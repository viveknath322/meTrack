<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5dccfbf475bfc',
        'title' => esc_html__('Navbar Style', 'alpas'),
        'fields' => array(
            array(
                'key' => 'field_5dccfc2536630',
                'label' => esc_html__('Choose Navigation Style', 'alpas'),
                'name' => 'choose_navigation_style',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    1 => 'Navbar with container',
                    2 => 'Navbar with full width',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'elementor_header_footer',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_5dccfc9601e89',
        'title' => esc_html__('Pages Option', 'alpas'),
        'fields' => array(
            array(
                'key' => 'field_5dccfcac53408',
                'label' => esc_html__('Page Banner Hide?', 'alpas'),
                'name' => 'page_banner_hide',
                'type' => 'checkbox',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'yes' => 'Yes',
                ),
                'allow_custom' => 0,
                'default_value' => array(
                ),
                'layout' => 'vertical',
                'toggle' => 0,
                'return_format' => 'value',
                'save_custom' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                ),
            ),
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'elementor_header_footer',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_5dd4d348e70ce',
        'title' => esc_html__('Post Format Video', 'alpas'),
        'fields' => array(
            array(
                'key' => 'field_5dd4d35b10d1a',
                'label' => esc_html__('Video Link', 'alpas'),
                'name' => 'video_link',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_format',
                    'operator' => '==',
                    'value' => 'video',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_5dcd27fc09ab9',
        'title' => esc_html__('Services Meta Info', 'alpas'),
        'fields' => array(
            array(
                'key' => 'field_5dcd28a541d56',
                'label' => esc_html__('Choose Icon', 'alpas'),
                'name' => 'choose_icon',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'fas fa-network-wired' => 'fas fa-network-wired',
                    'fas fa-robot' => 'fas fa-robot',
                    'far fa-image' => 'far fa-image',
                    'fab fa-cloudversify' => 'fab fa-cloudversify',
                    'fas fa-vr-cardboard' => 'fas fa-vr-cardboard',
                    'fab fa-leanpub' => 'fab fa-leanpub',
                    'flaticon-play-button' => 'flaticon-play-button',
                    'flaticon-shopping-basket' => 'flaticon-shopping-basket',
                    'flaticon-search' => 'flaticon-search',
                    'flaticon-add' => 'flaticon-add',
                    'flaticon-add-1' => 'flaticon-add-1',
                    'flaticon-substract' => 'flaticon-substract',
                    'flaticon-minus' => 'flaticon-minus',
                    'flaticon-right-arrow' => 'flaticon-right-arrow',
                    'flaticon-arrow-pointing-to-right' => 'flaticon-arrow-pointing-to-right',
                    'flaticon-left-arrow' => 'flaticon-left-arrow',
                    'flaticon-arrow-pointing-to-left' => 'flaticon-arrow-pointing-to-left',
                    'flaticon-facebook-letter-logo' => 'flaticon-facebook-letter-logo',
                    'flaticon-twitter-black-shape' => 'flaticon-twitter-black-shape',
                    'flaticon-instagram-logo' => 'flaticon-instagram-logo',
                    'flaticon-linkedin-letters' => 'flaticon-linkedin-letters',
                    'flaticon-youtube' => 'flaticon-youtube',
                    'flaticon-top' => 'flaticon-top',
                    'flaticon-maps-and-location' => 'flaticon-maps-and-location',
                    'flaticon-link-symbol' => 'flaticon-link-symbol',
                    'flaticon-right-quotes-symbol' => 'flaticon-right-quotes-symbol',
                    'flaticon-copyright' => 'flaticon-copyright',
                    'flaticon-down-arrow' => 'flaticon-down-arrow',
                    'flaticon-up-arrow' => 'flaticon-up-arrow',
                    'flaticon-placeholder' => 'flaticon-placeholder',
                    'flaticon-phone-call' => 'flaticon-phone-call',
                    'flaticon-message-closed-envelope' => 'flaticon-message-closed-envelope',
                    'flaticon-tick' => 'flaticon-tick',
                    'flaticon-factory' => 'flaticon-factory',
                    'flaticon-hospital' => 'flaticon-hospital',
                    'flaticon-tracking' => 'flaticon-tracking',
                    'flaticon-money-bag' => 'flaticon-money-bag',
                    'flaticon-house' => 'flaticon-house',
                    'flaticon-box' => 'flaticon-box',
                    'flaticon-insurance' => 'flaticon-insurance',
                    'flaticon-bitcoin' => 'flaticon-bitcoin',
                ),
                'default_value' => array(
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_taxonomy',
                    'operator' => '==',
                    'value' => 'service_cat:icon-category',
                ),
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5e89b10a134f4',
        'title' => esc_html__('Single Product', 'alpas'),
        'fields' => array(
            array(
                'key' => 'field_5e89b11b50ccf',
                'label' => esc_html__('Banner Background Image', 'alpas'),
                'name' => 'product_banner_background_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5e8c6e136f53f',
        'title' => esc_html__('Single Page Banner Background', 'alpas'),
        'fields' => array(
            array(
                'key' => 'field_5e8c6e3a49bbe',
                'label' => esc_html__('Banner Background Image', 'alpas'),
                'name' => 'banner_background_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'service',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;