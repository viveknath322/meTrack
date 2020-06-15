<?php 
namespace Elementor;
class PostWidget extends Widget_Base{
    public function get_name(){
        return "post-widget";
    }
    public function get_title(){
        return "Posts";
    }
    public function get_icon(){
        return "eicon-post-list";
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
        'section_title',
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
        'section_desc',
        [
            'label'=>esc_html__('Description', 'alpas-toolkit'),
            'type'=>Controls_Manager:: WYSIWYG,
            'description' => esc_html__('This text editor for p, ul - ol list tag','alpas-toolkit'),
        ]
    );
    $this-> end_controls_section();
    // End Section controls

    $this-> start_controls_section(
        'layout_section',
        [
            'label'=>esc_html__('Posts Content', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'post_title_tag',
        [
            'label' => __('Post Title Tag', 'alpas-toolkit'),
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
            'default' => esc_html__( '3', 'alpas-toolkit' ),
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
    $this-> end_controls_section();

    // Start Style content controls
    $this-> start_controls_section(
        'heading_style',
        [
            'label'=>esc_html__('Section Heading', 'alpas-toolkit'),
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
                '{{WRAPPER}} .section-title h2, .section-title h1, .section-title h3, .section-title h4, .section-title h5, .section-title h6' => 'color: {{VALUE}}',
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
                '{{WRAPPER}} .section-title h2, .section-title h1, .section-title h3, .section-title h4, .section-title h5, .section-title h6' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );

    $this->add_control(
        'desc_style',
        [
            'label' => esc_html__( 'Description', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );

    $this->add_responsive_control(
        'desc_size',
        [
            'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
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

    // Start Style controls
    $this-> start_controls_section(
        'layout_style',
        [
            'label'=>esc_html__('Posts', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'post_mata_info',
        [
            'label' => esc_html__( 'Post Meta', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );

    $this->add_control(
        'meta_info_color',
        [
            'label' => esc_html__( 'Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .single-blog-post .post-content .entry-meta li, .single-blog-post .post-content .entry-meta li a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_control(
        'meta_info_separator_color',
        [
            'label' => esc_html__( 'Separator Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .single-blog-post .post-content .entry-meta li::before' => 'background-color: {{VALUE}}',
            ],
        ]
    );

    $this->add_responsive_control(
        'meta_info_sz',
        [
            'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
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
                '{{WRAPPER}} .single-blog-post .post-content .entry-meta li, .single-blog-post .post-content .entry-meta li a' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );

    $this->add_control(
        'post_title',
        [
            'label' => esc_html__( 'Post Title', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );
    $this->add_control(
        'post_title_color',
        [
            'label' => esc_html__( 'Color', 'alpas-toolkit' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .single-blog-post .post-content h3 a, .single-blog-post .post-content h1 a, .single-blog-post .post-content h2 a, .single-blog-post .post-content h4 a, .single-blog-post .post-content h5 a, .single-blog-post .post-content h6 a' => 'color: {{VALUE}}',
            ],
        ]
    );
    $this->add_responsive_control(
        'post_title_sz',
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
                '{{WRAPPER}} .single-blog-post .post-content h3, .single-blog-post .post-content h1, .single-blog-post .post-content h2, .single-blog-post .post-content h4, .single-blog-post .post-content h5, .single-blog-post .post-content h6' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );

    $this->add_control(
        'post_desc',
        [
            'label' => esc_html__( 'Description', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );
    $this->add_responsive_control(
        'post_desc_sz',
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
                '{{WRAPPER}} .single-blog-post .post-content p' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );

    $this->add_control(
        'post_readmore',
        [
            'label' => esc_html__( 'Read More', 'alpas-toolkit' ),
            'type' => Controls_Manager::HEADING,
        ]
    );
    $this->add_responsive_control(
        'readmore_sz',
        [
            'label' => esc_html__( 'Font Size', 'alpas-toolkit' ),
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
                '{{WRAPPER}} .single-blog-post .post-content .read-more-btn' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    $this-> end_controls_section();
}

    protected function render() 
    {
        global $alpas_opt;
        $settings = $this->get_settings_for_display(); ?>

        <!-- Start Blog Area -->
        <div class="blog-area ptb-110">
            <div class="container">
                <div class="section-title">
                    <<?php echo esc_attr( $settings['title_tag'] ); ?>><?php echo esc_html( $settings['section_title']); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                    <?php echo wp_kses_post( $settings['section_desc'] ); ?>
                </div>

                <div class="row">
                    <?php
                    $args = array(
                        'orderby' => 'date',
                        'order' => $settings['order'],
                        'posts_per_page' => $settings['count'],
                        'ignore_sticky_posts' => 1,
                        'meta_key' => '_thumbnail_id'
                    );

                    $post_array = new \WP_Query( $args );
                    $loop = 1;
                    while($post_array->have_posts()): $post_array->the_post();
                    $id = get_the_ID();
                    $title = get_the_title(get_the_ID());
                    if($loop == 3 && $settings['count'] == 3){ 
                        $colcls = "col-lg-4 col-md-6 offset-lg-0 offset-md-3";
                    } else {
                        $colcls = "col-lg-4 col-md-6";
                    } ?>

                    <div class="<?php echo esc_attr($colcls); ?>">
                        <div class="single-blog-post home-blog-post">
                            <div class="entry-thumbnail">
                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($id, 'alpas_card_thumb')); ?>" alt="<?php echo esc_attr__('blog image','alpas-toolkit'); ?>"></a>
                            </div>

                            <div class="post-content">
                                <ul class="entry-meta">
                                    <li>
                                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ) ?>">
                                            <?php the_author() ?>
                                        </a>
                                    </li>
                                    <li><?php echo esc_html__(get_the_date('F d, Y'), 'alpas-toolkit'); ?></li>
                                </ul>
                                
                                <<?php echo esc_attr( $settings['post_title_tag'] ); ?>><a href="<?php echo esc_url(get_the_permalink($id)); ?>"><?php echo esc_html($title); ?></a></<?php echo esc_attr( $settings['post_title_tag'] ); ?>>

                                <p><?php echo esc_html(wp_trim_words( get_the_excerpt(), 19, '...' )); ?></p>
                                <a href="<?php echo esc_url(get_the_permalink($id)); ?>" class="read-more-btn"> <?php if(isset($alpas_opt['post_read_more'] ) && !$alpas_opt['post_read_more'] == ''){ echo esc_html($alpas_opt['post_read_more']); }else{ echo esc_html__('Read More','alpas-toolkit'); } ?> <i class="flaticon-add-1"></i></a> 
                            </div>
                        </div>
                    </div> 
                    <?php
                    $loop++;
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
        <?php 
    }

    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new PostWidget );