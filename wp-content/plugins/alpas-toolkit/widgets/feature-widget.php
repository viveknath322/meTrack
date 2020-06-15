<?php
namespace Elementor;
class FeatureWidget extends Widget_Base{
    public function get_name(){
        return "feature-widget";
    }
    public function get_title(){
        return "Feature Widget";
    }
    public function get_icon(){
        return "eicon-favorite";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){
        // Tab content controls
        $this-> start_controls_section(
            'feature_section_content',
            [
                'label'=>esc_html__('Feature Section Content', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'feature_image',
            [
                'label' => esc_html__('Image', 'alpas-toolkit' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        
        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'default' =>esc_html__('full','alpas-toolkit'),
                'name' => 'image_sz',
            ]
        );
        $repeater->add_control(
            'feature_title', [
                'label' => esc_html__( 'Feature Title', 'alpas-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'feature_title_tag',
            [
                'label' => __('Feature Title Tag', 'veliki-toolkit'),
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
            'feature_details', [
                'label' => esc_html__( 'Feature Details', 'alpas-toolkit' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'feature_list', [
                'label' => esc_html__( 'Feature Lists', 'alpas-toolkit' ),
                'type' => Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'feature_content',
            [
                'label' => esc_html__( 'Add Feature Content', 'alpas-toolkit' ),
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
                'label' => esc_html__( 'Top Shape Image', 'alpas-toolkit' ),
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
            'bottom_shape',
            [
                'label' => esc_html__( 'Bottom Left Shape Image', 'alpas-toolkit' ),
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
        // End Tab content controls

        // Start Features Card Style
        $this-> start_controls_section(
            'featured_style',
            [
                'label'=>esc_html__('Features Style', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'feature_title_color',
            [
                'label' => esc_html__( 'Feature Title Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .overview-box .content h3, .overview-box .content h1, .overview-box .content h2, .overview-box .content h4, .overview-box .content h5, .overview-box .content h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_responsive_control(
			'feature_title_font_size',
			[
				'label' => esc_html__( 'Feature Title Font Size', 'alpas-toolkit' ),
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
					'{{WRAPPER}} .overview-box .content h3, .overview-box .content h1, .overview-box .content h2, .overview-box .content h4, .overview-box .content h5, .overview-box .content h6' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );

        $this->add_responsive_control(
			'feature_desc_font_size',
			[
				'label' => esc_html__( 'Feature Description Font Size', 'alpas-toolkit' ),
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
					'{{WRAPPER}} .overview-box .content p' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );
        $this->add_control(
            'feature_list_icon_color',
            [
                'label' => esc_html__( 'Feature List Icon Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .overview-box .content .features-list li span i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'feature_list_title_color',
            [
                'label' => esc_html__( 'Feature List Title Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .overview-box .content .features-list li span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
			'feature_list_title_font_size',
			[
				'label' => esc_html__( 'Feature List Title Font Size', 'alpas-toolkit' ),
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
					'{{WRAPPER}} .overview-box .content .features-list li span' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );
        $this-> end_controls_section();
    }
    // Register control section end here

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>

        <!-- Start Features Area -->
        <div class="features-area ptb-110">
            <div class="container"> <?php
                if ($settings['feature_content'] !='') { 
                    $i = 1; 
                    foreach ( $settings['feature_content'] as $item ) { 
                        if( $i % 2 != 0) { ?>
                            <div class="overview-box">
                                <div class="image wow zoomIn" data-wow-delay="1s">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($item,'image_sz','feature_image'); ?>
                                </div>

                                <div class="content">
                                    <<?php echo esc_attr( $item['feature_title_tag'] ); ?>><?php echo esc_html( $item['feature_title'] ); ?></<?php echo esc_attr( $item['feature_title_tag'] ); ?>>
                                    <p><?php echo esc_html( $item['feature_details'] ); ?></p>

                                    <?php echo wp_kses_post( $item['feature_list'] ); ?>
                                </div>
                            </div> <?php
                        } else { ?>
                            <div class="overview-box">
                                <div class="content">
                                    <<?php echo esc_attr( $item['feature_title_tag'] ); ?>><?php echo esc_html( $item['feature_title'] ); ?></<?php echo esc_attr( $item['feature_title_tag'] ); ?>>
                                    <p><?php echo esc_html( $item['feature_details'] ); ?></p>

                                    <?php echo wp_kses_post( $item['feature_list'] ); ?>
                                </div>

                                <div class="image wow zoomIn" data-wow-delay="1s">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($item,'image_sz','feature_image'); ?>
                                </div>
                            </div>
                            <?php
                        }
                        $i++;
                    }
                } ?>
            </div>

            <?php 
            if ( 'yes' === $settings['section_shape'] ) { ?>
                <div class="rectangle-shape1">
                    <img src="<?php echo esc_url( $settings['top_shape']['url']); ?>" alt="<?php echo esc_attr__( 'Shape', 'alpas-toolkit' ); ?>">
                </div>
                <div class="rectangle-shape2">
                    <img src="<?php echo esc_url( $settings['bottom_shape']['url']); ?>" alt="<?php echo esc_attr__( 'Shape', 'alpas-toolkit' ); ?>">
                </div>
            <?php
            } ?>
        </div>

        <?php
    }

    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new FeatureWidget );