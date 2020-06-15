<?php namespace Elementor;

class FAQContactWidget extends Widget_Base{
    public function get_name(){
        return "faq-contact-widget";
    }
    public function get_title(){
        return "FAQ Contact Widget";
    }
    public function get_icon(){
        return "eicon-call-to-action";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){

    // Start FAQ Contact Controls
    $this-> start_controls_section(
        'top_content',
        [
            'label'=>esc_html__('Contact Content', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_CONTENT,
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
            'label' => esc_html__( 'FAQ Form Shortcode', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    $this-> end_controls_section();
    // End FAQ Contact Controls

    // Start FAQ  Style
    $this-> start_controls_section(
        'faq_contact_style',
        [
            'label'=>esc_html__('Content', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'toptitle_style',
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
                    'min' => 1,
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
                    'min' => 1,
                    'max' => 30,
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
    
}
    // Register control section end here
    protected function render() 
    {
        $settings = $this->get_settings_for_display(); ?>

        <div class="faq-area pb-110">
            <div class="container">
                <div class="faq-contact">
                    <div class="section-title">
                        <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['section_title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>

                        <?php echo wp_kses_post( $settings['section_desc'] ); ?>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4">
                            <div class="faq-contact-image">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings,'leftimgsz','left_image'); ?>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-8">
                            <div class="faq-contact-form">
                                <?php $form = $settings['contact_shortcode']; 
                                echo do_shortcode($form); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php    
    }

    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new FAQContactWidget );