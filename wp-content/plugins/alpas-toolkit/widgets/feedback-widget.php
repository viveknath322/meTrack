<?php
namespace Elementor;
class FeedbackWidget extends Widget_Base{
    public function get_name(){
        return "feedback-widget";
    }
    public function get_title(){
        return "Testimonial Widget";
    }
    public function get_icon(){
        return "eicon-testimonial-carousel";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){
    
        $this-> start_controls_section(
            'alpas_testimonial',
            [
                'label'=>esc_html__('Testimonials', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_show',
            [
                'label' => esc_html__( 'Section Show?', 'alpas-toolkit' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'alpas-toolkit' ),
                'label_off' => esc_html__( 'Hide', 'alpas-toolkit' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'section_title',
            [
                'label'=>esc_html__('Title', 'alpas-toolkit'),
                'type'=>Controls_Manager:: TEXT,
                'condition' => [
                    'section_show' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title Heading Tag', 'alpas-toolkit'),
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
                'condition' => [
                    'section_show' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'section_desc',
            [
                'label'=>esc_html__('Description', 'alpas-toolkit'),
                'type'=>Controls_Manager:: WYSIWYG,
                'description' => esc_html__('This text editor for p, ul - ol list tag','alpas-toolkit'),
                'condition' => [
                    'section_show' => 'yes',
                ]
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'feedback', [
                'label' => esc_html__( 'Feedback', 'alpas-toolkit' ),
                'type'=>Controls_Manager:: TEXTAREA,
            ]
        );
        $repeater->add_control(
            'title', [
                'label' => esc_html__( 'Title', 'alpas-toolkit' ),
                'type'=>Controls_Manager:: TEXT,
            ]
        );
        $repeater->add_control(
            'name_tag',
            [
                'label' => __('Name Tag', 'alpas-toolkit'),
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
        $repeater->add_control(
            'designation', [
                'label' => esc_html__( 'Designation', 'alpas-toolkit' ),
                'type'=>Controls_Manager:: TEXT,
            ]
        );
        $repeater->add_control(
            'client_image',
            [
                'label' => esc_html__( 'Client Image', 'alpas-toolkit' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'default' =>'full',
                'name' => 'imagesz',
            ]
        );
        $this->add_control(
            'all_feedback',
            [
                'label' => esc_html__( 'All Feedback', 'alpas-toolkit' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        // Box Shape
        $this->add_control(
			'section_shape',
			[
				'label' => esc_html__( 'Show Shape?', 'alpas-toolkit' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'alpas-toolkit' ),
				'label_off' => esc_html__( 'Hide', 'alpas-toolkit' ),
				'return_value' => 'yes',
                'default' => 'yes',
			]
        );
        $this->add_control(
            'top_shape',
            [
                'label' => esc_html__( 'Top Right Shape Image', 'alpas-toolkit' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'section_shape' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'top_white_shape',
            [
                'label' => esc_html__( 'Top White Shape Image', 'alpas-toolkit' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'section_shape' => 'yes',
                ]
            ]
        );
        $this-> end_controls_section();

        // Start Style content controls
        $this-> start_controls_section(
            'content_section_style',
            [
                'label'=>esc_html__('Section Style', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_STYLE,
                'condition' => [
                    'section_show' => 'yes',
                ]
            ]
        );
        $this->add_control(
            'section_title_color',
            [
                'label' => esc_html__( 'Section Title Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2, .section-title h1, .section-title h3, .section-title h4, .section-title h5, .section-title h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
			'section_title_font_size',
			[
				'label' => esc_html__( 'Section Title Font Size', 'alpas-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
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
            'section_desc_color',
            [
                'label' => esc_html__( 'Section Description Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p, .section-title ul li, .section-title ol li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
			'section_desc_font_size',
			[
				'label' => esc_html__( 'Section Description Font Size', 'alpas-toolkit' ),
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
					'{{WRAPPER}} .section-title p, .section-title ul li, .section-title ol li' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );
        $this-> end_controls_section();
        // End Section Style controls

        // Start Single Feedbak Style
        $this-> start_controls_section(
            'feedback_style',
            [
                'label'=>esc_html__('Single Feedback', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__( 'Background Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback-area' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'client_feed',
            [
                'label' => esc_html__( 'Feedback', 'alpas-toolkit' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_responsive_control(
            'font_sz',
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
                    '{{WRAPPER}} .single-feedback-item .feedback-desc p, .single-feedback-item .feedback-desc ul li, .single-feedback-item .feedback-desc ol li' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_control(
            'client_title',
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
                    '{{WRAPPER}} .single-feedback-item .client-info h3, .single-feedback-item .client-info h1, .single-feedback-item .client-info h2, .single-feedback-item .client-info h4, .single-feedback-item .client-info h5, .single-feedback-item .client-info h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'titlefont_sz',
            [
                'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 25,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'unit' => 'px',
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-item .client-info h3, .single-feedback-item .client-info h1, .single-feedback-item .client-info h2, .single-feedback-item .client-info h4, .single-feedback-item .client-info h5, .single-feedback-item .client-info h6' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'desigfont_sz',
            [
                'label' => esc_html__( 'Designation Font Size', 'alpas-toolkit' ),
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
                    '{{WRAPPER}} .single-feedback-item .client-info span' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this-> add_control(
            'quote_heading',
            [
                'label'=>esc_html__('Quote', 'alpas-toolkit'),
                'type'=> Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'qoute_bgcolor',
            [
                'label' => esc_html__( 'Background Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feedback-item::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this-> end_controls_section();
    }

    protected function render() 
    {
        $settings = $this->get_settings_for_display(); ?>

        <!-- Start Testimonials Area -->
        <div class="feedback-area">
            <div class="container"> <?php 
               if ( 'yes' === $settings['section_show'] ) { ?>
                    <div class="section-title">
                        <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['section_title']); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                        <?php echo wp_kses_post( $settings['section_desc'] ); ?>
                    </div> <?php 
                } ?>
                <div class="row">
                    <div class="feedback-slides owl-carousel owl-theme"><?php
                        if ( $settings['all_feedback']!='') { 
                            foreach( $settings['all_feedback'] as $item ){ 
                                if($item['feedback']!='' || $item['title']!='') { ?>
                                <div class="single-feedback-item">
                                    <div class="feedback-desc">
                                        <?php echo wp_kses_post( $item['feedback'] ); ?>
                                    </div>

                                    <div class="client-info">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html($item,'imagesz','client_image'); ?>

                                        <<?php echo esc_attr( $item['name_tag'] ); ?>><?php echo esc_html($item['title']); ?></<?php echo esc_attr( $item['name_tag'] ); ?>>
                                        <span><?php echo esc_html($item['designation']); ?></span>
                                    </div>
                                </div> <?php
                                }
                            }
                        } ?>
                    </div>
                </div>

            </div>

            <?php 
            if ( 'yes' === $settings['section_shape'] ) { ?>
                <div class="feedback-shape">
                    <img src="<?php echo esc_url( $settings['top_white_shape']['url']); ?>" alt="<?php echo esc_attr__( 'Shape', 'alpas-toolkit' ); ?>">
                </div>
                <div class="shape-rectangle">
                    <img src="<?php echo esc_url( $settings['top_shape']['url']); ?>" alt="<?php echo esc_attr__( 'Shape', 'alpas-toolkit' ); ?>">
                </div>
            <?php
            } ?>
        </div>
        <!-- End Testimonials Area -->
    <?php
    } 
    protected function _content_template() {}

}
Plugin::instance()->widgets_manager->register_widget_type( new FeedbackWidget );