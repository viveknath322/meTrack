<?php
namespace Elementor;
class FunfactsWidget extends Widget_Base{
    public function get_name(){
        return "funfact-widget";
    }
    public function get_title(){
        return "Funfacts Widget";
    }
    public function get_icon(){
        return "eicon-counter-circle";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){

    // Start Partner section
    $this-> start_controls_section(
        'funfact_section',
        [
            'label'=>esc_html__('Content', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_CONTENT,
        ]
    );

    $repeater = new Repeater();
    $repeater->add_control(
        'title_pre', [
            'label' => esc_html__( 'Title First Part', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
        ]
    );
    $repeater->add_control(
        'title_post', [
            'label' => esc_html__( 'Title Last Part', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
        ]
    );
    $repeater->add_control(
        'count_num', [
            'label' => esc_html__( 'Count Number', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
        ]
    );

    $this->add_control(
        'funfacts_list',
        [
            'label' => esc_html__( 'Add Funfacts list', 'alpas-toolkit' ),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]
    );
    $this-> end_controls_section();

    // Start Style content controls
    $this-> start_controls_section(
        'content_style',
        [
            'label'=>esc_html__('Content Style', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'bg_color',
        [
            'label' => esc_html__( 'Background Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .funfacts-area' => 'background-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'count_num_color',
        [
            'label' => esc_html__( 'Counter Number Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .single-funfacts .circlechart .circle-chart' => 'fill: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'count_number_size',
        [
            'label' => esc_html__( 'Counter Number Font Size', 'alpas-toolkit' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 15,
                ],
            ],
            'devices' => [ 'desktop', 'tablet', 'mobile' ],
            'unit' => 'px',
            'selectors' => [
                '{{WRAPPER}} .circle-chart__percent' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );

    $this->add_control(
        'title_fcolor',
        [
            'label' => esc_html__( 'Title First Part Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .single-funfacts span' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'title_f_size',
        [
            'label' => esc_html__( 'Title First Part Font Size', 'alpas-toolkit' ),
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
                '{{WRAPPER}} .single-funfacts span' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    $this->add_control(
        'title_lcolor',
        [
            'label' => esc_html__( 'Title Last Part Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .single-funfacts h3' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'title_l_size',
        [
            'label' => esc_html__( 'Title Last Part Font Size', 'alpas-toolkit' ),
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
                '{{WRAPPER}} .single-funfacts h3' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );

    $this-> end_controls_section(); 
}
    // Register control section end here

    protected function render() {
        $settings = $this->get_settings_for_display(); ?>

        <!-- Start FunFacts Area -->
        <div class="funfacts-area ptb-110">
            <div class="container">
                <div class="row">
                    <?php
                    if ( $settings['funfacts_list']!='' ){
                        foreach ( $settings['funfacts_list'] as $item ) {
                            if($item['count_num']!='' || $item['title_pre']!='' || $item['title_post']!='') { ?>
                            <div class="col-lg-3 col-md-3 col-6 col-sm-3">
                                <div class="single-funfacts">
                                    <div class="circlechart" data-percentage="<?php echo esc_attr($item['count_num']); ?>"></div>
                                    <span><?php echo esc_html($item['title_pre']); ?></span>
                                    <h3><?php echo esc_html($item['title_post']); ?></h3>
                                </div>
                            </div><?php
                            }  
                        } 
                    } ?>
                </div>
            </div>
        </div>
        <!-- End FunFacts Area -->
    <?php    
    }
    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new FunfactsWidget );