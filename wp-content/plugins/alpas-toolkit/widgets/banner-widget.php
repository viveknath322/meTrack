<?php
namespace Elementor;
class AlpasBannerWidget extends Widget_Base{
    public function get_name(){
        return "alpas-banner-widget";
    }
    public function get_title(){
        return "Main Banner";
    }
    public function get_icon(){
        return "eicon-banner";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){
        // Tab content controls
        $this-> start_controls_section(
            'section_content',
            [
                'label'=>esc_html__('Content', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'section_shape',
			[
				'label' => esc_html__( 'Hide Shapes?', 'alpas-toolkit' ),
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

        $this->add_control(
            'bottom_white_shape',
            [
                'label' => esc_html__( 'Bottom White Shape Image', 'alpas-toolkit' ),
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
            'banner_bg_image',
            [
                'label' => esc_html__( 'Banner Image', 'alpas-toolkit' ),
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
        $this->add_control(
            'banner_top_title',
            [
                'label'=>esc_html__('Top Title', 'alpas-toolkit'),
                'type'=>Controls_Manager:: TEXT,
            ]
        );

        $this->add_control(
            'banner_title',
            [
                'label'=>esc_html__('Title', 'alpas-toolkit'),
                'type'=>Controls_Manager:: TEXT,
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
                'default'     => 'h1',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'banner_desc',
            [
                'label'=>esc_html__('Description', 'alpas-toolkit'),
                'type'=>Controls_Manager:: WYSIWYG,
                'description' => esc_html__('This text editor for p, ul - ol list tag','alpas-toolkit'),
            ]
        );

        $this->add_control(
            'started_button_text',
            [
                'label'=>esc_html__('Get Started Button Text', 'alpas-toolkit'),
                'type'=>Controls_Manager:: TEXT,
            ]
        );

        $this->add_control(
            'started_link_type',
            [
                'label' => esc_html__( 'Link Type', 'alpas-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    '1'  => esc_html__( 'Link To Page', 'alpas-toolkit' ),
                    '2' => esc_html__( 'External Link', 'alpas-toolkit' ),
                ], 
            ]
        );

        $this->add_control(
            'started_link_to_page',
            [
                'label' => esc_html__( 'Link Page', 'alpas-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => alpas_toolkit_get_page_as_list(),
                'condition' => [
                    'started_link_type' => '1',
                ]
            ]
        );

        $this->add_control(
            'started_ex_link',
            [
                'label'=>esc_html__('External Link', 'alpas-toolkit'),
                'type'=>Controls_Manager:: TEXT,
                'condition' => [
                    'started_link_type' => '2',
                ]
            ]
        );

        $this-> end_controls_section();

        // End Tab content controls

        // Start Style content controls
        $this-> start_controls_section(
            'content_style',
            [
                'label'=>esc_html__('Content', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'banner_color',
            [
                'label' => esc_html__( 'Banner Background Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-banner' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'top_title_color',
            [
                'label' => esc_html__( 'Top Title Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-banner-content span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
			'top_title_font_size',
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
					'{{WRAPPER}} .main-banner-content span' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-banner-content h1, .main-banner-content h2, .main-banner-content h3, .main-banner-content h4, .main-banner-content h5, .main-banner-content h6' => 'color: {{VALUE}}',
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
						'max' => 80,
					],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'unit' => 'px',
				'selectors' => [
					'{{WRAPPER}} .main-banner-content h1, .main-banner-content h2, .main-banner-content h3, .main-banner-content h4, .main-banner-content h5, .main-banner-content h6' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );
        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Description Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-banner-content p, .main-banner-content ul li, .main-banner-content ol li' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
			'desc_size',
			[
				'label' => esc_html__( 'Description Font Size', 'alpas-toolkit' ),
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
					'{{WRAPPER}} .main-banner-content p, .main-banner-content ul li, .main-banner-content ol li' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );

        $this->add_responsive_control(
			'btn_font_size',
			[
				'label' => esc_html__( 'Button Font Size', 'alpas-toolkit' ),
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
					'{{WRAPPER}} .btn' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__( 'Button Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-primary' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btn_hcolor',
            [
                'label' => esc_html__( 'Button Hover Background Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .main-banner-content .btn-primary::after' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this-> end_controls_section();
        // End Style content controls
    }
    // Register control section end here

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display();

        // Get Started Button Link
        $started_link = '';
        if($settings['started_link_type'] == 1){
            $started_link = get_page_link($settings['started_link_to_page']); 
        } else {
            $started_link = $settings['started_ex_link'];
        } ?>

        <!-- Start Main Banner Area -->
        <div class="main-banner">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <div class="main-banner-content">
                                    <span><?php echo esc_html( $settings['banner_top_title']); ?></span>
                                    <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['banner_title']); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                    <?php echo wp_kses_post( $settings['banner_desc'] ); ?>

                                    <?php 
                                    if($settings['started_button_text'] != ''){ ?>
                                        <a href="<?php echo esc_url($started_link); ?>" class="btn btn-primary"><?php echo esc_html($settings['started_button_text']); ?></a>
                                    <?php
                                    } ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="main-banner-image">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings,'imagesz','banner_bg_image'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
            if ( 'yes' === $settings['section_shape'] ) { ?>
                <div class="banner-shape">
                    <img src="<?php echo esc_url( $settings['bottom_white_shape']['url']); ?>" alt="<?php echo esc_attr__( 'Shape', 'alpas-toolkit' ); ?>">
                </div>
                <div class="shape1">
                    <img src="<?php echo esc_url( $settings['bottom_shape']['url']); ?>" alt="<?php echo esc_attr__( 'Shape', 'alpas-toolkit' ); ?>">
                </div>
                <div class="shape2">
                    <img src="<?php echo esc_url( $settings['top_shape']['url']); ?>" alt="<?php echo esc_attr__( 'Shape', 'alpas-toolkit' ); ?>">
                </div>
            <?php
            } ?>
        </div>
        <!-- End Main Banner Area -->
        <?php
    }

    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new AlpasBannerWidget );