<?php
namespace Elementor;
class ServiceWidget extends Widget_Base{
    public function get_name(){
        return "service-widget";
    }
    public function get_title(){
        return "Services";
    }
    public function get_icon(){
        return "eicon-favorite";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){

        $this-> start_controls_section(
            'service_section_content',
            [
                'label'=>esc_html__('Service Section Content', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'services_style',
            [
                'label' => esc_html__( 'Choose a Style', 'alpas-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    ''    => esc_html__( '', 'alpas-toolkit' ),
                    '1'   => esc_html__( 'Style 1 with images', 'alpas-toolkit' ),
                    '2'   => esc_html__( 'Style 2 with icon shape', 'alpas-toolkit' ),
                    '3'   => esc_html__( 'Style 3 with icon', 'alpas-toolkit' ),
                ], 
            ]
        );

        $this->add_control(
            'cat_name',
            [
                'label' => esc_html__( 'Select Post Category', 'alpas-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => alpas_toolkit_get_service_cat_list(),
            ]
        );

        $this->add_control(
            'post_title_tag',
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
            'count',
            [
                'label' => esc_html__( 'Post Per Page', 'alpas-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('if you went to see all post type -1','alpas-toolkit')
            ]
        );
    
        $this->add_control(
            'order',
            [
                'label' => esc_html__( 'Select Order', 'alpas-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'DESC'  => esc_html__( 'DESC', 'alpas-toolkit' ),
                    'ASC'  => esc_html__( 'ASC', 'alpas-toolkit' ),
                ],
                'default' => 'DESC',
            ]
        );

        $this->add_control(
            'read_more_btntext',
            [
                'label' => esc_html__( 'Read More Button Text', 'alpas-toolkit' ),
                'default' => esc_html__( 'Read More', 'alpas-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'services_style' => ['1'],
                ]
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
                'condition' => [
                    'services_style' => ['2'],
                ]
			]
        );

        // Box Shape
        $this->add_control(
			'icon_shape',
			[
				'label' => esc_html__( 'Show Icon Shape?', 'alpas-toolkit' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'alpas-toolkit' ),
				'label_off' => esc_html__( 'Hide', 'alpas-toolkit' ),
				'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'services_style' => ['2'],
                ]
			]
        );
        $this-> end_controls_section();
        
        $this-> start_controls_section(
            'section_content',
            [
                'label'=>esc_html__('Section Content', 'alpas-toolkit'),
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
        $this-> end_controls_section();
        // End Section controls

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
			'section_desc_font_size',
			[
				'label' => esc_html__( 'Section Description Font Size', 'alpas-toolkit' ),
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
        // End Section Style controls

        // Start Service Featured Card Style
        $this-> start_controls_section(
            'services_featured_style',
            [
                'label'=>esc_html__('Services Card Style', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_STYLE,
                'condition' => [
                    'services_style' => ['1','2'],
                ]
            ]
        );

       $this->add_control(
            'featured_title_color',
            [
                'label' => esc_html__( 'Title Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-featured-solutions h3, .single-featured-solutions h1, .single-featured-solutions h2, .single-featured-solutions h4, .single-featured-solutions h5, .single-featured-solutions h6, .single-services-box h3 a, .single-services-box h1 a, .single-services-box h2 a, .single-services-box h4 a, .single-services-box h5 a, .single-services-box h6 a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
			'featured_title_font_size',
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
					'{{WRAPPER}} .single-featured-solutions h3, .single-featured-solutions h1, .single-featured-solutions h2, .single-featured-solutions h4, .single-featured-solutions h5, .single-featured-solutions h6, .single-services-box h3, .single-services-box h1, .single-services-box h2, .single-services-box h4, .single-services-box h5, .single-services-box h6' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );
        $this->add_responsive_control(
			'featured_desc_font_size',
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
					'{{WRAPPER}} .single-featured-solutions p, .single-services-box p' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );
        $this->add_responsive_control(
			'readmore_font_size',
			[
				'label' => esc_html__( 'Read More Text Font Size', 'alpas-toolkit' ),
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
					'{{WRAPPER}} .single-featured-solutions .read-more-btn' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'services_style' => '1',
                ]
			]
        );
        $this-> end_controls_section();
        // End Services Card Style

        // Start Icon Style controls
        $this-> start_controls_section(
            'icon_content_style',
            [
                'label'=>esc_html__('Service Icon Card Style', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_STYLE,
                'condition' => [
                    'services_style' => '3',
                ]
            ]
        );
        $this->add_control(
            'serve_title_color',
            [
                'label' => esc_html__( 'Title Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-serve-box h3, .single-serve-box h1, .single-serve-box h2, .single-serve-box h4, .single-serve-box h5, .single-serve-box h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
			'serve_title_font_size',
			[
				'label' => esc_html__( 'Title Font Size', 'alpas-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 40,
					],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'unit' => 'px',
				'selectors' => [
					'{{WRAPPER}} .single-serve-box h3, .single-serve-box h1, .single-serve-box h2, .single-serve-box h4, .single-serve-box h5, .single-serve-box h6' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );
        $this->add_control(
            'serve_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-serve-box i' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_control(
            'serve_title_hovercolor',
            [
                'label' => esc_html__( 'Title Hover Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-serve-box:hover h3, .single-serve-box:hover h1, .single-serve-box:hover h2, .single-serve-box:hover h4, .single-serve-box:hover h5, .single-serve-box:hover h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'serve_icon_hcolor',
            [
                'label' => esc_html__( 'Icon Hover Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-serve-box:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this-> end_controls_section();
        // End Icon Style controls

    }
    // Register control section end here

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if( $settings['cat_name'] != '' ):
            $args = array(
                'post_type' => 'service',
                'posts_per_page' => $settings['count'],
                'order' => $settings['order'],
                'tax_query' => array(
                    array(
                        'taxonomy' => 'service_cat',
                        'field' => 'slug',
                        'terms' => $settings['cat_name'],
                        'hide_empty' => false
                    )
                )
            );
        else:
            $args = array(
                'post_type' => 'service',
                'posts_per_page' => $settings['count'],
                'order' => $settings['order'],
            );
        endif;

        $services_array = new \WP_Query( $args ); ?>

        <?php
        if( $settings['services_style'] == 1 ) { ?>
            <div class="featured-solutions-area ptb-110">
                <div class="container">
                    <?php 
                    if ( 'yes' === $settings['section_show'] ) { ?>
                        <div class="section-title">
                            <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['section_title']); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <?php echo wp_kses_post( $settings['section_desc'] ); ?>
                        </div> <?php 
                    } ?>

                    <div class="row">
                        <?php
                        $loop = 1;
                        while($services_array->have_posts()): $services_array->the_post();
                            // Grid
                            if($loop == 3){
                                $col_cls = "col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3";
                            } else {
                                $col_cls = "col-lg-4 col-md-6 col-sm-6";
                            } ?>
                            <div class="<?php echo esc_attr($col_cls); ?>">
                                <div class="single-featured-solutions">
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr__('image','alpas-toolkit'); ?>">

                                    <<?php echo esc_attr( $settings['post_title_tag'] ); ?>> <?php the_title(); ?> </<?php echo esc_attr( $settings['post_title_tag'] ); ?>>
                                    <p><?php the_excerpt(); ?></p>

                                    <a href="<?php echo esc_url(get_the_permalink(), 'alpas-toolkit'); ?>" class="read-more-btn"><?php echo esc_html( $settings['read_more_btntext'] ); ?> <i class="flaticon-add"></i></a>

                                </div>
                            </div>
                        <?php
                        $loop++;
                        endwhile;
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </div><?php
        } 
        elseif( $settings['services_style'] == 2 ) { ?>
            <div class="services-area ptb-110">
                <div class="container">
                    <?php 
                    if ( 'yes' === $settings['section_show'] ) { ?>
                        <div class="section-title">
                            <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['section_title']); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <?php echo wp_kses_post( $settings['section_desc'] ); ?>
                        </div> <?php 
                    } ?>
                    <div class="row">
                        <?php
                        while($services_array->have_posts()): $services_array->the_post(); 
                            // ACF field access
                            if (class_exists( 'ACF') && get_field('choose_icon')){
                                $icon = get_field('choose_icon');
                            } else{
                                $icon = '';
                            } ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="single-services-box">
                                    <div class="icon"> 
                                        <i class="<?php echo esc_attr($icon); ?>"></i>

                                        <?php 
                                        if ( 'yes' === $settings['icon_shape'] ) { ?>
                                            <div class="icon-bg">
                                                <img src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/icon-bg1.png' ); ?>" alt="<?php echo esc_attr__( 'Shape', 'alpas-toolkit' ); ?>">
                                            </div> <?php
                                        } ?>
                                    </div>

                                    <<?php echo esc_attr( $settings['post_title_tag'] ); ?>> <a href="<?php echo esc_url(get_the_permalink(), 'alpas-toolkit'); ?>"><?php the_title(); ?> </a> </<?php echo esc_attr( $settings['post_title_tag'] ); ?>>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_query();
                        ?>
                    </div>
                </div>

                <?php 
                if ( 'yes' === $settings['section_shape'] ) { ?>
                    <div class="services-shape">
                        <img src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/services-shape.png' ); ?>" alt="<?php echo esc_attr__( 'Shape', 'alpas-toolkit' ); ?>">
                    </div>
                <?php
                } ?>
            </div> <?php
        } 
        elseif( $settings['services_style'] == 3 ) { ?>
            <div class="serve-area ptb-110">
                <div class="container">
                    <?php 
                    if ( 'yes' === $settings['section_show'] ) { ?>
                        <div class="section-title">
                            <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['section_title']); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <?php echo wp_kses_post( $settings['section_desc'] ); ?>
                        </div> <?php 
                    } ?>
                    <div class="row">
                        <?php
                        while($services_array->have_posts()): $services_array->the_post(); 
                            // ACF field access
                            if (class_exists( 'ACF') && get_field('choose_icon')){
                                $icon = get_field('choose_icon');
                            }else{
                                $icon = '';
                            } ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="single-serve-box">
                                    <i class="<?php echo esc_attr($icon); ?>"></i>
                                    <<?php echo esc_attr( $settings['post_title_tag'] ); ?>> <?php the_title(); ?> </<?php echo esc_attr( $settings['post_title_tag'] ); ?>>
                                    <a href="<?php echo esc_url(get_the_permalink(), 'alpas-toolkit'); ?>"> </a>
                                </div> 
                            </div>
                        <?php
                        endwhile;
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </div> <?php
        } ?>
        <?php
    }

    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new ServiceWidget );