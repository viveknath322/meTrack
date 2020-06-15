<?php namespace Elementor;

class ContactWidget extends Widget_Base{
    public function get_name(){
        return "contact-widget";
    }
    public function get_title(){
        return "Contact Widget";
    }
    public function get_icon(){
        return "eicon-form-horizontal";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){

    // Start Contact Controls
    $this-> start_controls_section(
        'top_content',
        [
            'label'=>esc_html__('Contact Content', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'section_top_title',
        [
            'label' => esc_html__( 'Top Title', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    $this->add_control(
        'section_title',
        [
            'label' => esc_html__( 'Title', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    $this->add_control(
        'title_tag',
        [
            'label' => __('Title Tag', 'alpas-toolkit'),
            'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
            'default'     => 'h2',
            'label_block' => true,
        ]
    );
    $this->add_control(
        'section_desc',
        [
            'label' => esc_html__( 'Description', 'alpas-toolkit' ),
            'type'=>Controls_Manager:: WYSIWYG,
            'description' => esc_html__('This text editor for p, ul - ol list tag','alpas-toolkit'),
        ]
    );

    $this->add_control(
        'left_image',
        [
            'label' => esc_html__( 'FAQ Left Image', 'alpas-toolkit' ),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Image_Size::get_type(),
        [
            'default' =>'full',
            'name' => 'leftimgsz',
        ]
    );

    $this->add_control(
        'contact_shortcode',
        [
            'label' => esc_html__( 'Contact Form Shortcode', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    // Start Email 
    $this->add_control(
        'contact_info_email',
        [
            'label' => esc_html__( 'Contact Email', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );
    $this->add_control(
        'email_title',
        [
            'label' => esc_html__( 'Email Text', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    $this->add_control(
        'email_title_tag',
        [
            'label' => __('Email Title Tag', 'alpas-toolkit'),
            'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
            'default'     => 'h3',
            'label_block' => true,
        ]
    );

    $repeater_e = new Repeater();
    $repeater_e->add_control(
        'email_address',
        [
            'label' => esc_html__( 'Email Address', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    
    $this->add_control(
        'emails',
        [
            'label' => esc_html__( 'Add Email Addresses', 'alpas-toolkit' ),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater_e->get_controls(),
        ]
    );

    // Start Contact Info
    $this->add_control(
        'contact_info_address',
        [
            'label' => esc_html__( 'Contact Address', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );
    $this->add_control(
        'add_title',
        [
            'label' => esc_html__( 'Address Title', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    $this->add_control(
        'add_title_tag',
        [
            'label' => __('Address Title Tag', 'alpas-toolkit'),
            'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
            'default'     => 'h3',
            'label_block' => true,
        ]
    );
    $this->add_control(
        'address_details',
        [
            'label'=>esc_html__('Address', 'alpas-toolkit'),
            'type'=>Controls_Manager:: TEXTAREA,
        ]
    );
 
    // Start Phone 
    $this->add_control(
        'contact_info',
        [
            'label' => esc_html__( 'Contact Details', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );
    $this->add_control(
        'contact_title',
        [
            'label' => esc_html__( 'Contact Title', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    $this->add_control(
        'con_title_tag',
        [
            'label' => __('Contact Title Tag', 'alpas-toolkit'),
            'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
            'default'     => 'h3',
            'label_block' => true,
        ]
    );
    
    $repeater_con = new Repeater();
    $repeater_con->add_control(
        'contact_number',
        [
            'label' => esc_html__( 'Contact Number', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    
    $this->add_control(
        'contacts',
        [
            'label' => esc_html__( 'Add Contact Number', 'alpas-toolkit' ),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater_con->get_controls(),
        ]
    );
    $this-> end_controls_section();

    // Start Section Title Style
    $this-> start_controls_section(
        'contact_section_style',
        [
            'label'=>esc_html__('Section Content', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_STYLE,
        ]
    );
    
    $this->add_control(
        'toptitle_style',
        [
            'label' => esc_html__( 'Top Title', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );

    $this->add_responsive_control(
        'toptitle_font_size',
        [
            'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 30,
                ],
            ],
            'devices' => [ 'desktop', 'tablet', 'mobile' ],
            'unit' => 'px',
            'selectors' => [
                '{{WRAPPER}} .section-title span' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );

    $this->add_control(
        'title_style',
        [
            'label' => esc_html__( 'Title', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );

    $this->add_control(
        'title_color',
        [
            'label' => esc_html__( 'Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .section-title h2, .section-title h1, .section-title h3, .section-title h4, .section-title h5, .section-title h6' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'title_font_size',
        [
            'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 60,
                ],
            ],
            'devices' => [ 'desktop', 'tablet', 'mobile' ],
            'unit' => 'px',
            'selectors' => [
                '{{WRAPPER}} .section-title h2, .section-title h1, .section-title h3, .section-title h4, .section-title h5, .section-title h6' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );

    $this->add_control(
        'desc_style',
        [
            'label' => esc_html__( 'Description', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );

    $this->add_responsive_control(
        'desc_size',
        [
            'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 25,
                ],
            ],
            'devices' => [ 'desktop', 'tablet', 'mobile' ],
            'unit' => 'px',
            'selectors' => [
                '{{WRAPPER}} .section-title p, .section-title ul li, .section-title ol li' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    $this-> end_controls_section();
    // End Section Style controls
    
    // Start Contact Style
    $this-> start_controls_section(
        'contact_style',
        [
            'label'=>esc_html__('Contact Information', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_STYLE,
        ]
    );
    // Icon Style
  
    $this->add_control(
        'icon_bgcolor',
        [
            'label' => esc_html__( 'Icon Background Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .contact-info-box .icon' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'icon_hovercolor',
        [
            'label' => esc_html__( 'Icon Hover Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .contact-info-box:hover .icon' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'card_title_color',
        [
            'label' => esc_html__( 'Card Title Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .contact-info-box h3, .contact-info-box h1, .contact-info-box h2, .contact-info-box h4, .contact-info-box h5, .contact-info-box h6' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'card_title_font_size',
        [
            'label' => esc_html__( 'Card Title Font Size', 'alpas-toolkit' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 30,
                ],
            ],
            'devices' => [ 'desktop', 'tablet', 'mobile' ],
            'unit' => 'px',
            'selectors' => [
                '{{WRAPPER}} .contact-info-box h3, .contact-info-box h1, .contact-info-box h2, .contact-info-box h4, .contact-info-box h5, .contact-info-box h6' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );

    $this->add_control(
        'add_desc_style',
        [
            'label' => esc_html__( 'Contact Information', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );

    $this->add_control(
        'add_desc_color',
        [
            'label' => esc_html__( 'Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .contact-info-box p a, .contact-info-box p' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'add_desc_size',
        [
            'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 20,
                ],
            ],
            'devices' => [ 'desktop', 'tablet', 'mobile' ],
            'unit' => 'px',
            'selectors' => [
                '{{WRAPPER}} .contact-info-box p a, .contact-info-box p' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    $this-> end_controls_section();
    
}
    // Register control section end here
    protected function render() 
    {
        $settings = $this->get_settings_for_display(); ?>
        <div class="contact-area ptb-110">
            <div class="container">
                <div class="section-title">
                    <span><?php echo esc_html($settings['section_top_title']); ?></span>
                    <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['section_title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>

                    <?php echo wp_kses_post( $settings['section_desc'] ); ?>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4">
                        <div class="contact-image">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($settings,'image_sz','left_image'); ?>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8">
                        <div class="contact-form">
                            <?php $form = $settings['contact_shortcode']; 
                            echo do_shortcode($form); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php
                    if($settings['email_title']!=''){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="contact-info-box">
                                <div class="icon">
                                    <i class='bx bx-envelope'></i>
                                </div>

                                <<?php echo esc_attr( $settings['email_title_tag'] ); ?>><?php echo esc_html($settings['email_title']); ?></<?php echo esc_attr( $settings['email_title_tag'] ); ?>>
                                <?php
                                foreach ( $settings['emails'] as $item ) {
                                    if($item['email_address']!=''){ ?>
                                        <p><a href="<?php echo esc_attr__("mailto:","alpas-toolkit")?><?php echo esc_url($item['email_address']); ?>"><?php echo esc_html($item['email_address']); ?></a></p>
                                    <?php
                                    }
                                } ?>
                            </div>
                        </div> <?php
                    } ?>
 
                    <?php
                   if($settings['add_title']!='' || $settings['address_details']!=''){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="contact-info-box">
                                <div class="icon">
                                    <i class='bx bx-map'></i>
                                </div>
                                <<?php echo esc_attr( $settings['add_title_tag'] ); ?>><?php echo esc_html( $settings['add_title'] ); ?></<?php echo esc_attr( $settings['add_title_tag'] ); ?>>
                                <p><?php echo esc_html( $settings['address_details'] ); ?> </p>
                            </div>
                        </div> <?php
                   } 
                    if($settings['contact_title']!=''){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                            <div class="contact-info-box">
                                <div class="icon">
                                    <i class='bx bx-phone-call'></i>
                                </div>

                                <<?php echo esc_attr( $settings['con_title_tag'] ); ?>><?php echo esc_html($settings['contact_title']); ?></<?php echo esc_attr( $settings['con_title_tag'] ); ?>>

                                <?php
                                    foreach ( $settings['contacts'] as $item ) {
                                        if($item['contact_number']!=''){ ?>
                                            <p><a href="<?php echo esc_attr__("tel:","alpas-toolkit")?><?php echo wp_kses_post(str_replace(' ', '', $item['contact_number']), "alpas-toolkit") ?>"><?php echo esc_html($item['contact_number']); ?></a></p>
                                        <?php
                                        }
                                    } ?>
                            </div>
                        </div> <?php
                        } ?>
                </div>

            </div>
        </div>
    <?php    
    }
    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new ContactWidget );