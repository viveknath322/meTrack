<?php namespace Elementor;

class FAQWidget extends Widget_Base{
    public function get_name(){
        return "faq-widget";
    }
    public function get_title(){
        return "FAQ Widget";
    }
    public function get_icon(){
        return "eicon-accordion";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){

    // Start FAQ section
    $this-> start_controls_section(
        'faq_section',
        [
            'label'=>esc_html__('FAQ Content', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_CONTENT,
        ]
    );
    $this->add_control(
        'section_top_title',
        [
            'label'=>esc_html__('Top Title', 'alpas-toolkit'),
            'type'=>Controls_Manager:: TEXT,
        ]
    );

    $this->add_control(
        'section_title',
        [
            'label'=>esc_html__('Title', 'alpas-toolkit'),
            'type'=>Controls_Manager:: TEXT,
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
            'label'=>esc_html__('Description', 'alpas-toolkit'),
            'type'=>Controls_Manager:: WYSIWYG,
            'description' => esc_html__('This text editor for p, ul - ol list tag','alpas-toolkit'),
        ]
    );
    // End Section controls

    $repeater = new Repeater();

    $repeater->add_control(
        'faq_title',
        [
            'label' => esc_html__( 'FAQ Title', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    $repeater->add_control(
        'faq_desc',
        [
            'label' => esc_html__( 'Description', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXTAREA,
        ]
    );

    $this->add_control(
        'faq_list',
        [
            'label' => esc_html__( 'Add FAQ List', 'alpas-toolkit' ),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]
    );

    $this->add_control(
        'image',
        [
            'label' => esc_html__( 'FAQ Image', 'alpas-toolkit' ),
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
            'name' => 'imagesz',
        ]
    );
    $this-> end_controls_section();
    // End Right Controls

    // Start FAQ Style
    $this-> start_controls_section(
        'faq_style',
        [
            'label'=>esc_html__('FAQ Style', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_STYLE,
        ]
    );

    // Start Section Style
    $this->add_responsive_control(
        'toptitle_font_size',
        [
            'label' => esc_html__( 'Top Title Font Size', 'alpas-toolkit' ),
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
    $this->add_responsive_control(
        'desc_font_size',
        [
            'label' => esc_html__( 'Description Font Size', 'alpas-toolkit' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 20,
                ],
            ],
            'devices' => [ 'desktop', 'tablet', 'mobile' ],
            'unit' => 'px',
            'selectors' => [
                '{{WRAPPER}} .section-title p, .section-title ul li, .section-title ol li' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    // End Section Style

    $this->add_control(
        'list_style',
        [
            'label' => esc_html__( 'Accordion Lists', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );
    
    $this->add_control(
        'list_title_color',
        [
            'label' => esc_html__( 'Title Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .faq-accordion .accordion .accordion-title' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'list_title_sz',
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
                '{{WRAPPER}} .faq-accordion .accordion .accordion-title' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    $this->add_control(
        'title_icon_color',
        [
            'label' => esc_html__( 'Title Icon Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .faq-accordion .accordion .accordion-title i' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'list_desc_sz',
        [
            'label' => esc_html__( 'Description Font Size', 'alpas-toolkit' ),
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
                '{{WRAPPER}} .faq-accordion .accordion .accordion-content' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    $this-> end_controls_section();
    
}
    // Register control section end here

    protected function render() 
    {
        $settings = $this->get_settings_for_display(); ?>

        <div class="faq-area ptb-110">
            <div class="container">
                <div class="section-title">
                    <span><?php echo esc_html($settings['section_top_title']); ?></span>
                    <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['section_title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>

                    <?php echo wp_kses_post( $settings['section_desc'] ); ?>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="faq-accordion">
                            <ul class="accordion">
                                <?php
                                if ( $settings['faq_list']!='' ){
                                    $loop = 1;
                                    foreach ( $settings['faq_list'] as $item ) {
                                        if ($loop == 1) {
                                            $active = 'active';
                                            $show = 'show';
                                        }else {
                                            $active = '';
                                            $show = '';
                                        }

                                        if($item['faq_title']!='' || $item['faq_desc']!='') { ?>
                                        <li class="accordion-item">
                                            <a class="accordion-title <?php echo esc_attr($active); ?>" href="javascript:void(0)"><?php echo esc_html($item['faq_title']); ?> <i class="fas fa-plus"></i></a>
                                            <p class="accordion-content <?php echo esc_attr($show); ?>"><?php echo esc_html($item['faq_desc']); ?></p>
                                        </li><?php
                                        } 
                                    $loop++; 
                                    } 
                                } ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="faq-content">
                            <div class="faq-image">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings,'imagesz','image'); ?>
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
Plugin::instance()->widgets_manager->register_widget_type( new FAQWidget );