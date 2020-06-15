<?php
namespace Elementor;
class NewsletterWidget extends Widget_Base{
    public function get_name(){
        return "newsletter-widget";
    }
    public function get_title(){
        return "Newsletter Widget";
    }
    public function get_icon(){
        return "eicon-form-horizontal";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){
    
        $this-> start_controls_section(
            'alpas_testimonial',
            [
                'label'=>esc_html__('Subscribe', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'form_title', [
                'label' => esc_html__( 'Form Title', 'alpas-toolkit' ),
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
                'default'     => 'h2',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'form_placeholder', [
                'label' => esc_html__( 'Form Placeholder Text', 'alpas-toolkit' ),
                'type'=>Controls_Manager:: TEXT,
            ]
        );
        $this->add_control(
            'form_btn', [
                'label' => esc_html__( 'Form Button Text', 'alpas-toolkit' ),
                'type'=>Controls_Manager:: TEXT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'alpas-toolkit' ),
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
            'call_title', [
                'label' => esc_html__( 'Right Title', 'alpas-toolkit' ),
                'type'=>Controls_Manager:: TEXT,
            ]
        );
        $this->add_control(
            'call_title_tag',
            [
                'label' => __('Right Title Tag', 'alpas-toolkit'),
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
            'call_text', [
                'label' => esc_html__( 'Call Text', 'alpas-toolkit' ),
                'type'=>Controls_Manager:: TEXT,
            ]
        );
        $this->add_control(
            'contact_number', [
                'label' => esc_html__( 'Contact Number', 'alpas-toolkit' ),
                'type'=>Controls_Manager:: TEXT,
            ]
        );
        
        $this-> end_controls_section();

        // Start Style Controls
        $this-> start_controls_section(
            'newsletter_style',
            [
                'label'=>esc_html__('Newsletter Style', 'alpas-toolkit'),
                'tab'=> Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_style',
            [
                'label' => esc_html__( 'Form Title', 'alpas-toolkit' ),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .newsletter-content h2, .newsletter-content h1, .newsletter-content h3, .newsletter-content h4, .newsletter-content h5, .newsletter-content h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'font_sz',
            [
                'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'unit' => 'px',
                'selectors' => [
                    '{{WRAPPER}} .newsletter-content h2, .newsletter-content h1, .newsletter-content h3, .newsletter-content h4, .newsletter-content h5, .newsletter-content h6' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'placeholder_style',
            [
                'label' => esc_html__( 'Placeholder', 'alpas-toolkit' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'placeholder_color',
            [
                'label' => esc_html__( 'Text Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .newsletter-content form .input-newsletter::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'inputfield_style',
            [
                'label' => esc_html__( 'Input Field', 'alpas-toolkit' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'input_color',
            [
                'label' => esc_html__( 'Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .newsletter-content form .input-newsletter' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'input_bgcolor',
            [
                'label' => esc_html__( 'Background Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .newsletter-content form .input-newsletter' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__( 'Button Text Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .newsletter-content form button' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'right_title_color',
            [
                'label' => esc_html__( 'Right Title Color', 'alpas-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe-contact-info .content h2, .subscribe-contact-info .content h1, .subscribe-contact-info .content h3, .subscribe-contact-info .content h4, .subscribe-contact-info .content h5, .subscribe-contact-info .content h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_font_sz',
            [
                'label' => esc_html__( 'Number & Text Font Size', 'alpas-toolkit' ),
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
                    '{{WRAPPER}} .subscribe-contact-info .content span' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
   
        $this-> end_controls_section();
    }

    protected function render() 
    {
        $settings = $this->get_settings_for_display(); ?>

        <!-- Start Free Trial Area -->
        <div class="subscribe-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="newsletter-content">
                            <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html($settings['form_title']); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>

                            <form class="newsletter-form" method="post" action="<?php echo get_bloginfo().'/?na=s' ?>" onsubmit="return newsletter_check(this)"><?php
                                if($settings['form_placeholder'] !='') { ?>
                                <input type="email" class="input-newsletter"
                                    placeholder="<?php echo esc_attr($settings['form_placeholder']); ?>"
                                    name="ne" required autocomplete="off"> <?php
                                } ?>
                                <?php
                                if($settings['form_btn'] !='') { ?>
                                    <button type="submit"> <?php echo esc_html($settings['form_btn']); ?> <i class="flaticon-paper-plane"></i> </button><?php
                                } ?>
                                
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="subscribe-contact-info">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($settings,'imagesz','image'); ?>

                            <div class="content">
                                <<?php echo esc_attr( $settings['call_title_tag'] ); ?>><?php echo esc_html( $settings['call_title'] ); ?></<?php echo esc_attr( $settings['call_title_tag'] ); ?>>
                                <span><?php echo esc_html( $settings['call_text'] ); ?> <a href="<?php echo esc_attr__("tel:","alpas-toolkit")?><?php echo wp_kses_post(str_replace(' ', '', $settings['contact_number']), "alpas-toolkit") ?>"><?php echo esc_html( $settings['contact_number'] ); ?></a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Free Trial Area -->
    <?php
    } 
    protected function _content_template() {}

}
Plugin::instance()->widgets_manager->register_widget_type( new NewsletterWidget );