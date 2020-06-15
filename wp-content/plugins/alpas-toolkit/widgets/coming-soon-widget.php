<?php 
namespace Elementor;
class ComingSoonWidget extends Widget_Base{
    public function get_name(){
        return "comingsoon-widget";
    }
    public function get_title(){
        return "Coming Soon";
    }
    public function get_icon(){
        return "fa fa-creative-commons";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){
        // Start Left Content
        $this-> start_controls_section(
            'comingsoon_section',
            [
                'label'=>esc_html__('Left Content', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => esc_html__('Background Image', 'alpas-toolkit' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Image For Responsive Device', 'alpas-toolkit' ),
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
        $this-> end_controls_section();
        // End Left Content

        // Start Right Content
        $this-> start_controls_section(
            'comingsoon_right',
            [
                'label'=>esc_html__('Right Content', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label'=> esc_html__('Title','alpas-toolkit'),
                'type'=>Controls_Manager:: TEXT,
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => __('Title Tag', 'veliki-toolkit'),
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
            'fname',
            [
                'label'=> esc_html__('Name Placeholder','alpas-toolkit'),
                'type'=>Controls_Manager:: TEXT,
                'default'=> esc_html__('Your Name','alpas-toolkit'),
            ]
        );
        $this->add_control(
            'emailadd',
            [
                'label'=> esc_html__('Email Placeholder','alpas-toolkit'),
                'type'=>Controls_Manager:: TEXT,
                'default'=> esc_html__('Your Email','alpas-toolkit'),
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label'=> esc_html__('Button Text','alpas-toolkit'),
                'type'=>Controls_Manager:: TEXT,
            ]
        );
        $this->add_control(
            'desc',
            [
                'label'=> esc_html__('Description','alpas-toolkit'),
                'type'=>Controls_Manager:: TEXTAREA,
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Social Icons', 'alpas-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'fab fa-twitter'  => esc_html__( 'Twitter', 'alpas-toolkit' ),
                    'fab fa-youtube'  => esc_html__( 'Youtube', 'alpas-toolkit' ),
                    'fab fa-facebook-f'  => esc_html__( 'Facebook', 'alpas-toolkit' ),
                    'fab fa-linkedin-in'  => esc_html__( 'Linkedin', 'alpas-toolkit' ),
                    'fab fa-instagram'  => esc_html__( 'Instagram', 'alpas-toolkit' ),
                ],
            ]
        );
        $repeater->add_control(
            'social_link',
            [
                'label' => esc_html__( 'URL', 'alpas-toolkit' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'social_color',
            [
                'label' => esc_html__( 'Choose Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1'  => esc_html__( 'Facebook Color', 'alpas-toolkit' ),
                    '2'  => esc_html__( 'Youtube Color', 'alpas-toolkit' ),
                    '3'  => esc_html__( 'Twitter Color', 'alpas-toolkit' ),
                    '4'  => esc_html__( 'Linkedin Color', 'alpas-toolkit' ),
                    '5'  => esc_html__( 'Instagram Color', 'alpas-toolkit' ),
                ],
            ]
        );

        $this->add_control(
            'social_list',
            [
                'label' => esc_html__( 'Add Social List', 'alpas-toolkit' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
        $this-> end_controls_section();
        // End Right Content

        // Start Comingsoon Styling
        $this-> start_controls_section(
            'coming_style',
            [
                'label'=>esc_html__('Content', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .coming-soon-content h3, .coming-soon-content h1, .coming-soon-content h2, .coming-soon-content h4, .coming-soon-content h5, .coming-soon-content h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
			'title_size',
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
					'{{WRAPPER}} .coming-soon-content h3, .coming-soon-content h1, .coming-soon-content h2, .coming-soon-content h4, .coming-soon-content h5, .coming-soon-content h6' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__( 'Button Text Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-primary' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
			'btn_size',
			[
				'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
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
					'{{WRAPPER}}  .btn-primary' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );
        
        $this->add_control(
			'timer_style',
			[
				'label' => esc_html__( 'Timer', 'alpas-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
        );
        $this->add_control(
            'timer_color',
            [
                'label' => esc_html__( 'Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .coming-soon-area .coming-soon-time #timer div' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
			'timer_size',
			[
				'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
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
					'{{WRAPPER}} .coming-soon-area .coming-soon-time #timer div' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );
        $this-> end_controls_section();

    }

    protected function render() 
    {
    $settings = $this->get_settings_for_display();

    global $alpas_opt;

    // Black Logo
	if(isset($alpas_opt['black_logo']['url']) && $alpas_opt['black_logo']['url'] !='' ) {
		$black_logo = $alpas_opt['black_logo']['url'];
	}else {
		$black_logo = "null";
	} ?>

    <!-- Start Coming Soon Area -->
    <div class="coming-soon-area">
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="coming-soon-time" style="background-image: url(<?php echo esc_url( $settings['bg_image']['url']); ?> )">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings,'imagesz','image'); ?>

                        <div id="timer">
                            <div id="days"></div>
                            <div id="hours"></div>
                            <div id="minutes"></div>
                            <div id="seconds"></div>
                        </div>

                        <?php 
                        if ( 'yes' === $settings['section_shape'] ) { ?>
                            <div class="bg-shape1">
                                <img src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/shape/4.svg' ); ?>" alt="<?php echo esc_attr__( 'Shape', 'alpas-toolkit' ); ?>">
                            </div>
                            <div class="bg-shape2">
                                <img src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/shape/4.svg' ); ?>" alt="<?php echo esc_attr__( 'Shape', 'alpas-toolkit' ); ?>">
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 p-0">
                    <div class="coming-soon-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="logo">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <?php
                                        // Black Logo
                                        if ( $black_logo != 'null' ) { ?>
                                            <img src="<?php echo esc_url($black_logo); ?>" alt="<?php bloginfo( 'title' ); ?>"><?php
                                        }else{ ?>
                                            <h2><?php bloginfo( 'name' ); ?></h2>
                                        <?php }  ?>
                                    </a>
                                </div>
                                
                                <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>

                                <form data-toggle="validator" method="post" action="<?php echo get_bloginfo();?>/?na=s" onsubmit="return newsletter_check(this)">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nn" placeholder="<?php echo esc_attr($settings['fname']);?>" required autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="<?php echo esc_attr($settings['emailadd']);?>" name="ne" required autocomplete="off">
                                    </div>
                                    
                                    <?php 
                                    if($settings['btn_text']!=''){ ?>
                                        <button type="submit" class="btn btn-primary"><?php echo esc_html($settings['btn_text']);?></button> <?php
                                    } ?>

                                    <p><?php echo esc_html($settings['desc']);?></p>
                                </form>

                                <div class="social">
                                    <ul>
                                        <?php
                                        if ( $settings['social_list']!='' ){
                                            foreach ( $settings['social_list'] as $item ) {

                                                if ($item['social_color'] == 1) {
                                                    $cls="facebook";
                                                } elseif ($item['social_color'] == 2) {
                                                    $cls="youtube";
                                                } elseif ($item['social_color'] == 3) {
                                                    $cls="twitter";
                                                } elseif ($item['social_color'] == 4) {
                                                    $cls="linkedin";
                                                }else {
                                                    $cls="instagram";
                                                }

                                                if($item['icon']!='') { ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $item['social_link'] ); ?>" target="_blank" class="<?php echo esc_attr( $cls ); ?>"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></a>
                                                </li><?php
                                        } } }?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Coming Soon Area -->
    <?php
    }
    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new ComingSoonWidget );