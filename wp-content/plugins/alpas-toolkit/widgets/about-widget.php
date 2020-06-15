<?php
namespace Elementor;
class AboutWidget extends Widget_Base{
    public function get_name(){
        return "about-us-widget";
    }
    public function get_title(){
        return "About Us";
    }
    public function get_icon(){
        return "eicon-info-box";
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
            'right_image',
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
                'name' => 'image_sz'
            ]
        );

        $this->add_control(
            'about_top_title',
            [
                'label'=>esc_html__('Top Title', 'alpas-toolkit'),
                'type'=>Controls_Manager:: TEXT,
            ]
        );
        $this->add_control(
            'about_title',
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
            'about_desc',
            [
                'label'=>esc_html__('Description', 'alpas-toolkit'),
                'type'=>Controls_Manager:: WYSIWYG,
                'description' => esc_html__('This text editor for p, ul - ol list tag','alpas-toolkit'),
            ]
        );

        $this->add_control(
            'about_card_content',
            [
                'label' => esc_html__( 'About Card', 'alpas-toolkit' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'card_title', [
                'label' => esc_html__( 'Card Title', 'alpas-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'card_title_tag',
            [
                'label' => __('Card Title Tag', 'alpas-toolkit'),
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
            'card_details', [
                'label' => esc_html__( 'Card Details', 'alpas-toolkit' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'card_icon',
            [
                'label' => esc_html__( 'Choose Card Background Icon', 'alpas-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'flaticon-play-button'                    => esc_html__( 'Play Button', 'alpas-toolkit' ),
                    'flaticon-shopping-basket'                => esc_html__( 'Shopping Basket', 'alpas-toolkit' ),
                    'flaticon-search'                         => esc_html__( 'Search', 'alpas-toolkit' ),
                    'flaticon-add'                            => esc_html__( 'Add', 'alpas-toolkit' ),
                    'flaticon-add-1'                          => esc_html__( 'Add-1', 'alpas-toolkit' ),
                    'flaticon-substract'                      => esc_html__( 'Add', 'alpas-toolkit' ),
                    'flaticon-minus'                          => esc_html__( 'Substract', 'alpas-toolkit' ),
                    'flaticon-right-arrow'                    => esc_html__( 'Right arrow', 'alpas-toolkit' ),
                    'flaticon-arrow-pointing-to-right'        => esc_html__( 'Arrow pointing to right', 'alpas-toolkit' ),
                    'flaticon-left-arrow'                     => esc_html__( 'Left arrow', 'alpas-toolkit' ),
                    'flaticon-arrow-pointing-to-left'         => esc_html__( 'Arrow pointing to left', 'alpas-toolkit' ),
                    'flaticon-facebook-letter-logo'           => esc_html__( 'Facebook', 'alpas-toolkit' ),
                    'flaticon-twitter-black-shape'            => esc_html__( 'Twitter', 'alpas-toolkit' ),
                    'flaticon-instagram-logo'                 => esc_html__( 'Instagram', 'alpas-toolkit' ),
                    'flaticon-linkedin-letters'               => esc_html__( 'Linkedin', 'alpas-toolkit' ),
                    'flaticon-youtube'                        => esc_html__( 'Youtube', 'alpas-toolkit' ),
                    'flaticon-top'                            => esc_html__( 'Top', 'alpas-toolkit' ),
                    'flaticon-maps-and-location'              => esc_html__( 'Maps and location', 'alpas-toolkit' ),
                    'flaticon-link-symbol'                    => esc_html__( 'Link symbol', 'alpas-toolkit' ),
                    'flaticon-right-quotes-symbol'            => esc_html__( 'Right quotes symbol', 'alpas-toolkit' ),
                    'flaticon-copyright'                      => esc_html__( 'Copyright', 'alpas-toolkit' ),
                    'flaticon-down-arrow'                     => esc_html__( 'Down arrow', 'alpas-toolkit' ),
                    'flaticon-up-arrow'                       => esc_html__( 'Up arrow', 'alpas-toolkit' ),
                    'flaticon-placeholder'                    => esc_html__( 'Placeholder', 'alpas-toolkit' ),
                    'flaticon-phone-call'                     => esc_html__( 'Phone call', 'alpas-toolkit' ),
                    'flaticon-message-closed-envelope'        => esc_html__( 'Message closed envelope', 'alpas-toolkit' ),
                    'flaticon-tick'                           => esc_html__( 'Tick', 'alpas-toolkit' ),
                    'flaticon-factory'                        => esc_html__( 'Factory', 'alpas-toolkit' ),
                    'flaticon-hospital'                       => esc_html__( 'Hospital', 'alpas-toolkit' ),
                    'flaticon-tracking'                       => esc_html__( 'Tracking', 'alpas-toolkit' ),
                    'flaticon-money-bag'                      => esc_html__( 'Money bag', 'alpas-toolkit' ),
                    'flaticon-house'                          => esc_html__( 'House', 'alpas-toolkit' ),
                    'flaticon-box'                            => esc_html__( 'Box', 'alpas-toolkit' ),
                    'flaticon-insurance'                      => esc_html__( 'Insurance', 'alpas-toolkit' ),
                    'flaticon-bitcoin'                        => esc_html__( 'Bitcoin', 'alpas-toolkit' ),
                ],
            ]
        );
    
        $this->add_control(
            'card_content',
            [
                'label' => esc_html__( 'Add Card Content', 'alpas-toolkit' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
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
			'top_title_style',
			[
				'label' => esc_html__( 'Top Title', 'alpas-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
        );

        $this->add_responsive_control(
			'top_title_font_size',
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
					'{{WRAPPER}} .about-content span' => 'font-size: {{SIZE}}{{UNIT}}',
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
                    '{{WRAPPER}} .about-content h2, .about-content h1, .about-content h3, .about-content h4, .about-content h5, .about-content h6' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .about-content h2, .about-content h1, .about-content h3, .about-content h4, .about-content h5, .about-content h6' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );

        $this->add_control(
			'description_style',
			[
				'label' => esc_html__( 'Description', 'alpas-toolkit' ),
				'type' => Controls_Manager::HEADING,
			]
        );

        $this->add_responsive_control(
			'desc_font_size',
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
					'{{WRAPPER}} .about-content p, .about-content ul li, .about-content ol li' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );

        $this->add_control(
			'card_style',
			[
				'label' => esc_html__( 'About Card Style', 'alpas-toolkit' ),
                'type' => Controls_Manager::HEADING,
			]
        );
        $this->add_control(
            'card_title_color',
            [
                'label' => esc_html__( 'Title Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-text h3, .about-text h1, .about-text h2, .about-text h4, .about-text h5, .about-text h6' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
			'card_titlefont_size',
			[
				'label' => esc_html__( 'Title Font Size', 'alpas-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 45,
					],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'unit' => 'px',
				'selectors' => [
					'{{WRAPPER}} .about-text h3, .about-text h1, .about-text h2, .about-text h4, .about-text h5, .about-text h6' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );

        $this->add_responsive_control(
			'card_descfont_size',
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
					'{{WRAPPER}} .about-text p, .about-text ul li, .about-text ol li' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
			]
        );

        $this-> end_controls_section();
    }
    // Register control section end here

    protected function render()
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display();

        // Tag allowed for about content
        $about_text_allowed_tags = array(
            'a' =>array(
                'href' => array(),
                'title' => array(),
                'class' => array()
            ),
            'p' => array(),
            'br' => array(),
            'em' => array(),
            'strong' => array()
        ); ?>

        <!-- Start About Area -->
        <div class="about-area ptb-110">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-content">
                            <span><?php echo esc_html($settings['about_top_title']); ?></span>
                            <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['about_title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>

                            <?php echo wp_kses_post( $settings['about_desc'] ); ?>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="about-image">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($settings,'image_sz','right_image'); ?>
                        </div>
                    </div>
                </div>

                <div class="about-inner-area">
					<div class="row"> <?php
                    if ( $settings['card_content']!='' ){
                        $loop = 1;
                        foreach ( $settings['card_content'] as $item ) {
                            if ($loop == 3) {
                                $colcls = 'col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3';
                            }else {
                                $colcls = 'col-lg-4 col-md-6 col-sm-6';
                            }

                            if( $item['card_title']!='' || $item['card_details']!='' ) { ?>
                            <div class="<?php echo esc_attr( $colcls ); ?>">
                                <div class="about-text">
                                    <<?php echo esc_attr( $item['card_title_tag'] ); ?>><?php echo esc_html( $item['card_title'] ); ?></<?php echo esc_attr( $item['card_title_tag'] ); ?>>
                                    <?php echo wp_kses_post( $item['card_details'] ); ?>
                                    <i class="<?php echo esc_attr( $item['card_icon'] ); ?>"></i>
                                </div>
                            </div><?php
                            } 
                        $loop++; 
                        } 
                    } ?>
					</div>
				</div>
            </div>

        </div>
        <!-- End About Area -->
        <?php
    }

    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new AboutWidget );