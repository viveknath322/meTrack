<?php
namespace Elementor;
class TeamWidget extends Widget_Base{
    public function get_name(){
        return "teams-widget";
    }
    public function get_title(){
        return "Team Widget";
    }
    public function get_icon(){
        return "eicon-gallery-group";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){

    // Section controls
    $this-> start_controls_section(
        'alpas_section',
        [
            'label'=>esc_html__('Section', 'alpas-toolkit'),
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
    // End Section controls

    // Start Partner section
    $this->add_control(
        'team_controls',
        [
            'label' => esc_html__( 'Our Experts', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );

    $repeater = new Repeater();

    $repeater->add_control(
        'member_img', [
            'label' => esc_html__( 'Image', 'alpas-toolkit' ),
            'type' => Controls_Manager::MEDIA,
            'label_block' => true,
        ]
    );

    $repeater->add_group_control(
        Group_Control_Image_Size::get_type(),
        [
            'default' =>esc_html__('full','alpas-toolkit'),
            'name' => 'imagesz'
        ]
    );

    $repeater->add_control(
        'name',
        [
            'label' => esc_html__( 'Member Name', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
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
        'designation',
        [
            'label' => esc_html__( 'Designation', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    $repeater->add_control(
        'icon_type', [
            'label' => esc_html__( 'Choose Icon Type', 'alpas-toolkit' ),
            'type' => Controls_Manager::SELECT,
            'label_block' => true,
            'options' => [
                '1'  => __( 'Flaticon', 'alpas-toolkit' ),
                '2'  => __( 'Fontawesome', 'alpas-toolkit' ),
            ],
            'default' => '1'
        ]
    );
    $repeater->add_control(
        'flat_icon1',
        [
            'label' => esc_html__( 'Choose Social Icon One', 'alpas-toolkit' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'flaticon-facebook-letter-logo'     => esc_html__( 'Facebook', 'alpas-toolkit' ),
                'flaticon-twitter-black-shape'      => esc_html__( 'Twitter', 'alpas-toolkit' ),
                'flaticon-instagram-logo'           => esc_html__( 'Instagram', 'alpas-toolkit' ),
                'flaticon-linkedin-letters'         => esc_html__( 'Youtube', 'alpas-toolkit' ),
            ],
            'condition' => [
                'icon_type' => '1',
            ]
        ]
    );
    $repeater->add_control(
        'icon',
        [
            'label' => esc_html__( 'Choose Social Icon One', 'veliki-toolkit' ),
            'type' => Controls_Manager::ICON,
            'default' => 'fa fa-facebook',
            'condition' => [
                'icon_type' => '2',
            ]
        ]
    );
    $repeater->add_control(
        'url1',
        [
            'label' => esc_html__( 'URL', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    $repeater->add_control(
        'flat_icon2',
        [
            'label' => esc_html__( 'Choose Social Icon Two', 'alpas-toolkit' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'flaticon-facebook-letter-logo'     => esc_html__( 'Facebook', 'alpas-toolkit' ),
                'flaticon-twitter-black-shape'      => esc_html__( 'Twitter', 'alpas-toolkit' ),
                'flaticon-instagram-logo'           => esc_html__( 'Instagram', 'alpas-toolkit' ),
                'flaticon-linkedin-letters'         => esc_html__( 'Youtube', 'alpas-toolkit' ),
            ],
            'condition' => [
                'icon_type' => '1',
            ]
        ]
    );
    $repeater->add_control(
        'icon2',
        [
            'label' => esc_html__( 'Choose Social Icon Two', 'veliki-toolkit' ),
            'type' => Controls_Manager::ICON,
            'default' => 'fa fa-facebook',
            'condition' => [
                'icon_type' => '2',
            ]
        ]
    );
    $repeater->add_control(
        'url2',
        [
            'label' => esc_html__( 'URL', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );
    $repeater->add_control(
        'flat_icon3',
        [
            'label' => esc_html__( 'Choose Social Icon Three', 'alpas-toolkit' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
                'flaticon-facebook-letter-logo'     => esc_html__( 'Facebook', 'alpas-toolkit' ),
                'flaticon-twitter-black-shape'      => esc_html__( 'Twitter', 'alpas-toolkit' ),
                'flaticon-instagram-logo'           => esc_html__( 'Instagram', 'alpas-toolkit' ),
                'flaticon-linkedin-letters'         => esc_html__( 'Youtube', 'alpas-toolkit' ),
            ],
            'condition' => [
                'icon_type' => '1',
            ]
        ]
    );
    $repeater->add_control(
        'icon3',
        [
            'label' => esc_html__( 'Choose Social Icon Three', 'veliki-toolkit' ),
            'type' => Controls_Manager::ICON,
            'default' => 'fa fa-facebook',
            'condition' => [
                'icon_type' => '2',
            ]
        ]
    );
    $repeater->add_control(
        'url3',
        [
            'label' => esc_html__( 'URL', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
        ]
    );

    $this->add_control(
        'teams',
        [
            'label' => esc_html__( 'Add Experts Information', 'alpas-toolkit' ),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]
    );
    $this-> end_controls_section();

    // Start Style content controls
    $this-> start_controls_section(
        'experts_style',
        [
            'label'=>esc_html__('Experts Content', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_STYLE,
        ]
    );

    // Start Section Style
    $this->add_control(
        'title_style',
        [
            'label' => esc_html__( 'Title', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
            'condition' => [
                'section_show' => 'yes',
            ]
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
            'condition' => [
                'section_show' => 'yes',
            ]
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
            'condition' => [
                'section_show' => 'yes',
            ]
        ]
    );
    $this->add_control(
        'section_desc_style',
        [
            'label' => esc_html__( 'Description', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
            'condition' => [
                'section_show' => 'yes',
            ]
        ]
    );

    $this->add_responsive_control(
        'desc_font_size',
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
                '{{WRAPPER}} .section-title p, .section-title ul li, .section-title ol li' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
            'condition' => [
                'section_show' => 'yes',
            ]
        ]
    );
    // End Section Style

    // Start Single Expert Style controls
    $this->add_control(
        'member_name',
        [
            'label' => esc_html__( 'Member Name', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );
    $this->add_control(
        'name_color',
        [
            'label' => esc_html__( 'Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .single-team-box .content h3, .single-team-box .content h1, .single-team-box .content h2, .single-team-box .content h4, .single-team-box .content h5, .single-team-box .content h6' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'name_hcolor',
        [
            'label' => esc_html__( 'Hover Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .single-team-box:hover .content h3, .single-team-box:hover .content h1, .single-team-box:hover .content h2, .single-team-box:hover .content h4, .single-team-box:hover .content h5, .single-team-box:hover .content h6' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'name_sz',
        [
            'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
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
                '{{WRAPPER}} .single-team-box .content h3, .single-team-box .content h1, .single-team-box .content h2, .single-team-box .content h4, .single-team-box .content h5, .single-team-box .content h6' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    $this->add_control(
        'member_desig',
        [
            'label' => esc_html__( 'Member Designation', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );
    $this->add_responsive_control(
        'desig_sz',
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
                '{{WRAPPER}} .single-team-box .content span' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    $this->add_control(
        'des_hcolor',
        [
            'label' => esc_html__( 'Hover Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .single-team-box:hover .content span' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->add_control(
        'member_share',
        [
            'label' => esc_html__( 'Social Share', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );
    $this->add_control(
        'share_bg',
        [
            'label' => esc_html__( 'Background Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .single-team-box .image .social' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this-> end_controls_section(); 
}
    protected function render() 
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display(); ?>

        <!-- Start Team Area -->
        <div class="container">
            <?php 
            if ( 'yes' === $settings['section_show'] ) { ?>
                <div class="section-title">
                    <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['section_title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>

                    <?php echo wp_kses_post( $settings['section_desc'] ); ?>
                </div>
            <?php } ?>

            <div class="row">
                <?php
                if ( $settings['teams']!='' ){ 
                    foreach ( $settings['teams'] as $item ) {
                    if($item['name']!='' || $item['member_img']!=''){ ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-team-box">
                                <div class="image">
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($item,'imagesz','member_img'); ?>
                                    <div class="social">
                                        <?php
                                            if ( $item['flat_icon1'] != '' || $item['icon'] != '' ) { 
                                                if ( $item['flat_icon1'] !='' ) {
                                                    $iconcls1 = $item['flat_icon1'];
                                                } else {
                                                    $iconcls1 = $item['icon'];
                                                } ?>
                                                <a href="<?php echo esc_url($item['url1']);?>" target="_blank"><i class="<?php echo esc_attr( $iconcls1 );?>"></i></a> <?php 
                                            } 
                                            if ( $item['flat_icon2'] != '' || $item['icon2'] != '' ) { 
                                                if ( $item['flat_icon2'] !='' ) {
                                                    $iconcls2 = $item['flat_icon2'];
                                                } else {
                                                    $iconcls2 = $item['icon2'];
                                                } ?>
                                                <a href="<?php echo esc_url($item['url2']);?>" target="_blank"><i class="<?php echo esc_attr( $iconcls2 );?>"></i></a><?php 
                                            } 
                                            if( $item['flat_icon3'] != '' || $item['icon3'] != '' ) { 
                                                if ( $item['flat_icon3'] !='' ) {
                                                    $iconcls3 = $item['flat_icon3'];
                                                } else {
                                                    $iconcls3 = $item['icon3'];
                                                } ?>
                                                <a href="<?php echo esc_url($item['url3']);?>" target="_blank"><i class="<?php echo esc_attr( $iconcls3 );?>"></i></a><?php 
                                            }  
                                        ?>
                                    </div>
                                </div>
                                <?php
                                if($item['name'] !='' || $item['designation'] ) { ?>
                                    <div class="content">
                                        <<?php echo esc_attr( $item['name_tag'] ); ?>><?php echo esc_html($item['name']);?></<?php echo esc_attr( $item['name_tag'] ); ?>>
                                        <span><?php echo esc_html($item['designation']);?></span>
                                    </div> <?php
                                } ?>
                                
                            </div>
                        </div><?php
                        } 
                    } 
                } ?>
            </div>
        </div> <?php    
    }

    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new TeamWidget );