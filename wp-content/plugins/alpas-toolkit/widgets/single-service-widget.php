<?php
namespace Elementor;
class SingleServiceWidget extends Widget_Base{
    public function get_name(){
        return "single-service-widget";
    }
    public function get_title(){
        return "Single Service";
    }
    public function get_icon(){
        return "eicon-text";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){
        // Tab content controls
        $this-> start_controls_section(
            'service_overview',
            [
                'label'=>esc_html__('Services Overview', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'service_title',
            [
                'label'=>esc_html__('Service Details Title', 'alpas-toolkit'),
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
                'default'     => 'h3',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'service_overview_desc',
            [
                'label'=>esc_html__('Content', 'alpas-toolkit'),
                'type'=>Controls_Manager:: WYSIWYG,
                'description' => esc_html__('This text editor for p, ul - ol list tag','alpas-toolkit'),
            ]
        );
        $this->add_control(
            'single_left_image',
            [
                'label' => esc_html__('Left Image', 'alpas-toolkit' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'default' =>esc_html__('full','alpas-toolkit'),
                'name' => 'lefttimgsz'
            ]
        );
        $this-> end_controls_section();

        // services details overview bottom
        $this-> start_controls_section(
            'service_overview_two',
            [
                'label'=>esc_html__('Single Service Overview Two', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'single_right_image',
            [
                'label' => esc_html__('Right Image', 'alpas-toolkit' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'default' =>esc_html__('full','alpas-toolkit'),
                'name' => 'rightimgsz'
            ]
        );

        $this->add_control(
            'service_details_title',
            [
                'label'=>esc_html__('Service Details Title', 'alpas-toolkit'),
                'type'=>Controls_Manager:: TEXT,
            ]
        );

        $this->add_control(
            'title_tag2',
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
                'default'     => 'h3',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'service_details_desc',
            [
                'label'=>esc_html__('Description', 'alpas-toolkit'),
                'type'=>Controls_Manager:: WYSIWYG,
                'description' => esc_html__('This text editor for p, ul - ol list tag','alpas-toolkit'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'faq_title', [
                'label' => esc_html__( 'Accordion Title', 'alpas-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
    
        $repeater->add_control(
            'faq_details', [
                'label' => esc_html__( 'Accordion Details', 'alpas-toolkit' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
    
        $this->add_control(
            'faq_content',
            [
                'label' => esc_html__( 'Add Accordion Content', 'alpas-toolkit' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this-> end_controls_section();

        // End Tab content controls

        // Start Style content controls
        $this-> start_controls_section(
            'single_service_style',
            [
                'label'=>esc_html__('Single Service Style', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'service_details_title_color',
            [
                'label' => esc_html__( 'Title Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-details-overview .services-details-desc h3, .services-details-overview .services-details-desc h1, .services-details-overview .services-details-desc h2, .services-details-overview .services-details-desc h4, .services-details-overview .services-details-desc h5, .services-details-overview .services-details-desc h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'service_details_title_sz',
            [
                'label' => esc_html__( 'Title Font Size', 'alpas-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 40,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'unit' => 'px',
                'selectors' => [
                    '{{WRAPPER}} .services-details-overview .services-details-desc h3, .services-details-overview .services-details-desc h1, .services-details-overview .services-details-desc h2, .services-details-overview .services-details-desc h4, .services-details-overview .services-details-desc h5, .services-details-overview .services-details-desc h6' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'service_desc_sz',
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
                    '{{WRAPPER}} .services-details-overview .services-details-desc p, .services-details-overview .services-details-desc ul li, .services-details-overview .services-details-desc ol li' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'service_feature_text_color',
            [
                'label' => esc_html__( 'Feature Text Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-details-overview .services-details-desc .features-list li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'service_feature_text_sz',
            [
                'label' => esc_html__( 'Feature Text Font Size', 'alpas-toolkit' ),
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
                    '{{WRAPPER}} .services-details-overview .services-details-desc .features-list li' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'service_accordion_title_color',
            [
                'label' => esc_html__( 'Accordion Title Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-details-overview .services-details-desc .services-details-accordion .accordion .accordion-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'service_accordion_title_sz',
            [
                'label' => esc_html__( 'Accordion Title Font Size', 'alpas-toolkit' ),
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
                    '{{WRAPPER}} .services-details-overview .services-details-desc .services-details-accordion .accordion .accordion-title' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'service_accordion_desc_sz',
            [
                'label' => esc_html__( 'Accordion Description Font Size', 'alpas-toolkit' ),
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
                    '{{WRAPPER}} .services-details-overview .services-details-desc .services-details-accordion .accordion .accordion-content' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this-> end_controls_section();
    }
    // Register control section end here

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display(); ?>

        <!-- Start Services Details Area -->
            <div class="services-details-overview">
                <div class="services-details-image">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings,'leftimgsz','single_left_image'); ?>
                </div>
                <div class="services-details-desc">
                    <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['service_title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>

                    <?php echo wp_kses_post( $settings['service_overview_desc'] ); ?>
                </div>
            </div>

            <div class="services-details-overview">
                <div class="services-details-desc">
                    <<?php echo esc_attr( $settings['title_tag2'] ); ?>><?php echo esc_html( $settings['service_details_title'] ); ?></<?php echo esc_attr( $settings['title_tag2'] ); ?>>

                    <?php echo wp_kses_post( $settings['service_details_desc'] ); ?>

                    <div class="services-details-accordion">
                        <ul class="accordion">
                            <?php
                            if ( $settings['faq_content']!='' ){
                                $loop = 1;
                                foreach ( $settings['faq_content'] as $item ) {
                                    if ($loop == 1) {
                                        $active = 'active';
                                        $show = 'show';
                                    }else {
                                        $active = '';
                                        $show = '';
                                    }

                                    if($item['faq_title']!='' || $item['faq_details']!='') { ?>
                                    <li class="accordion-item">
                                        <a class="accordion-title <?php echo esc_attr($active); ?>" href="javascript:void(0)"><?php echo esc_html($item['faq_title']); ?> <i class="fa fa-plus"></i></a>
                                        <p class="accordion-content <?php echo esc_attr($show); ?>"><?php echo esc_html($item['faq_details']); ?></p>
                                    </li><?php
                                    } 
                                $loop++; 
                                } 
                            } ?>

                        </ul>
                    </div>
                </div>
                <div class="services-details-image">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings,'rightimgsz','single_right_image'); ?>
                </div>
            </div>
        <!-- End Services Details Area -->
        <?php
    }

    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new SingleServiceWidget );