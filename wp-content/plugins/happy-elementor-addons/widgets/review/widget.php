<?php
/**
 * Review widget class
 *
 * @package Happy_Addons
 */
namespace Happy_Addons\Elementor\Widget;

use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use ParagonIE\Sodium\Core\Curve25519\Ge\P3;

defined( 'ABSPATH' ) || die();

class Review extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Review', 'happy-elementor-addons' );
    }

	public function get_custom_help_url() {
		return 'https://happyaddons.com/docs/happy-addons-for-elementor/widgets/review/';
	}

	/**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'hm hm-review';
    }

    public function get_keywords() {
        return [ 'review', 'comment', 'feedback', 'testimonial' ];
    }

	protected function register_content_controls() {
		$this->start_controls_section(
			'_section_review',
			[
				'label' => __( 'Review', 'happy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'ratting',
            [
                'label' => __( 'Ratting', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'px',
                    'size' => 4.2,
                ],
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .5,
                    ],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'ratting_style',
            [
                'label' => __( 'Ratting Style', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'star' => __( 'Star', 'happy-elementor-addons' ),
                    'num' => __( 'Number', 'happy-elementor-addons' ),
                ],
                'default' => 'star',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'review',
            [
                'label' => __( 'Review', 'happy-elementor-addons' ),
                'description' => ha_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Happy reviewer is super excited being part of happy addons family', 'happy-elementor-addons' ),
                'placeholder' => __( 'Type amazing review from happy reviewer', 'happy-elementor-addons' ),
                'separator' => 'before',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'review_position',
            [
                'label' => __( 'Review Position', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'before' => __( 'Before Ratting', 'happy-elementor-addons' ),
                    'after' => __( 'After Ratting', 'happy-elementor-addons' ),
                ],
                'default' => 'before',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'review_for',
            [
                'label' => __( 'Review For', 'happy-elementor-addons' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Movie, Games, Software name etc.', 'happy-elementor-addons' ),
                'description' => __( '[This field is only for structured data (schema.org) purpose] Obviously this review belongs to something like Movie, Games, Software or Service. So type the name of that thing.', 'happy-elementor-addons' ),
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            '_section_reviewer',
            [
                'label' => __( 'Reviewer', 'happy-elementor-addons' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Photo', 'happy-elementor-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'image_position',
            [
                'label' => __( 'Image Position', 'happy-elementor-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'happy-elementor-addons' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => __( 'Top', 'happy-elementor-addons' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'happy-elementor-addons' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'top',
                'toggle' => false,
                'prefix_class' => 'ha-review--',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Name', 'happy-elementor-addons' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => 'Happy Reviewer',
                'placeholder' => __( 'Type Reviewer Name', 'happy-elementor-addons' ),
                'separator' => 'before',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'job_title',
            [
                'label' => __( 'Job Title', 'happy-elementor-addons' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Happy Officer', 'happy-elementor-addons' ),
                'placeholder' => __( 'Type Reviewer Job Title', 'happy-elementor-addons' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'happy-elementor-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'happy-elementor-addons' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'happy-elementor-addons' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'happy-elementor-addons' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Name HTML Tag', 'happy-elementor-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'happy-elementor-addons' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'happy-elementor-addons' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'happy-elementor-addons' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'happy-elementor-addons' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'happy-elementor-addons' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'happy-elementor-addons' ),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_ratting_style',
            [
                'label' => __( 'Ratting', 'happy-elementor-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'ratting_size',
            [
                'label' => __( 'Size', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-ratting' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ratting_spacing',
            [
                'label' => __( 'Bottom Spacing', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-ratting' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'ratting_padding',
            [
                'label' => __( 'Padding', 'happy-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-ratting' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'ratting_color',
            [
                'label' => __( 'Text Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ha-review-ratting' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'ratting_bg_color',
            [
                'label' => __( 'Background Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ha-review-ratting' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'ratting_border',
                'selector' => '{{WRAPPER}} .ha-review-ratting',
            ]
        );

        $this->add_control(
            'ratting_border_radius',
            [
                'label' => __( 'Border Radius', 'happy-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-ratting' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_review_style',
            [
                'label' => __( 'Review & Reviewer', 'happy-elementor-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'body_padding',
            [
                'label' => __( 'Text Box Padding', 'happy-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_heading_name',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Name', 'happy-elementor-addons' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-reviewer' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => __( 'Text Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ha-review-reviewer' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .ha-review-reviewer',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_job_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Job Title', 'happy-elementor-addons' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'job_title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-position' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'job_title_color',
            [
                'label' => __( 'Text Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ha-review-position' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'job_title_typography',
                'selector' => '{{WRAPPER}} .ha-review-position',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_control(
            '_heading_review',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Review', 'happy-elementor-addons' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'review_spacing',
            [
                'label' => __( 'Bottom Spacing', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'review_color',
            [
                'label' => __( 'Text Color', 'happy-elementor-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ha-review-desc' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'review_typography',
                'selector' => '{{WRAPPER}} .ha-review-desc',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_photo_style',
            [
                'label' => __( 'Photo', 'happy-elementor-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __( 'Width', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 70,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-figure' => 'flex: 0 0 {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}}.ha-review--right .ha-review-body, {{WRAPPER}}.ha-review--left .ha-review-body' => 'flex: 0 0 calc(100% - {{SIZE || 150}}{{UNIT}}); max-width: calc(100% - {{SIZE || 150}}{{UNIT}});',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => __( 'Height', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 70,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-figure' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'offset_toggle',
            [
                'label' => __( 'Offset', 'happy-elementor-addons' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'None', 'happy-elementor-addons' ),
                'label_on' => __( 'Custom', 'happy-elementor-addons' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'image_offset_x',
            [
                'label' => __( 'Offset X', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'render_type' => 'ui'
            ]
        );

        $this->add_responsive_control(
            'image_offset_y',
            [
                'label' => __( 'Offset Y', 'happy-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    // Left image position styles
                    '(desktop){{WRAPPER}}.ha-review--left .ha-review-body' => 'margin-left: {{image_offset_x.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width.SIZE || 150}}{{image_width.UNIT}}) + (-1 * {{image_offset_x.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width.SIZE || 150}}{{image_width.UNIT}}) + (-1 * {{image_offset_x.SIZE || 0}}{{UNIT}}));',
                    '(tablet){{WRAPPER}}.ha-review--left .ha-review-body' => 'margin-left: {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width_tablet.SIZE || 150}}{{image_width_tablet.UNIT}}) + (-1 * {{image_offset_x_tablet.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width_tablet.SIZE || 150}}{{image_width_tablet.UNIT}}) + (-1 * {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}));',
                    '(mobile){{WRAPPER}}.ha-review--left .ha-review-body' => 'margin-left: {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}; flex: 0 0 calc((100% - {{image_width_mobile.SIZE || 150}}{{image_width_mobile.UNIT}}) + (-1 * {{image_offset_x_mobile.SIZE || 0}}{{UNIT}})); max-width: calc((100% - {{image_width_mobile.SIZE || 150}}{{image_width_mobile.UNIT}}) + (-1 * {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}));',
                    // Image right position styles
                    '(desktop){{WRAPPER}}.ha-review--right .ha-review-body' => 'margin-right: calc(-1 * {{image_offset_x.SIZE || 0}}{{UNIT}}); flex: 0 0 calc((100% - {{image_width.SIZE || 150}}{{image_width.UNIT}}) + {{image_offset_x.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width.SIZE || 150}}{{image_width.UNIT}}) + {{image_offset_x.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}}.ha-review--right .ha-review-body' => 'margin-right: calc(-1 * {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}); flex: 0 0 calc((100% - {{image_width_tablet.SIZE || 150}}{{image_width_tablet.UNIT}}) + {{image_offset_x_tablet.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width_tablet.SIZE || 150}}{{image_width_tablet.UNIT}}) + {{image_offset_x_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}}.ha-review--right .ha-review-body' => 'margin-right: calc(-1 * {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}); flex: 0 0 calc((100% - {{image_width_mobile.SIZE || 150}}{{image_width_mobile.UNIT}}) + {{image_offset_x_mobile.SIZE || 0}}{{UNIT}}); max-width: calc((100% - {{image_width_mobile.SIZE || 150}}{{image_width_mobile.UNIT}}) + {{image_offset_x_mobile.SIZE || 0}}{{UNIT}});',
                    // Image translate styles
                    '(desktop){{WRAPPER}} .ha-review-figure' => '-ms-transform: translate({{image_offset_x.SIZE || 0}}{{UNIT}}, {{image_offset_y.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{image_offset_x.SIZE || 0}}{{UNIT}}, {{image_offset_y.SIZE || 0}}{{UNIT}}); transform: translate({{image_offset_x.SIZE || 0}}{{UNIT}}, {{image_offset_y.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}} .ha-review-figure' => '-ms-transform: translate({{image_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{image_offset_y_tablet.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{image_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{image_offset_y_tablet.SIZE || 0}}{{UNIT}}); transform: translate({{image_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{image_offset_y_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}} .ha-review-figure' => '-ms-transform: translate({{image_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{image_offset_y_mobile.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{image_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{image_offset_y_mobile.SIZE || 0}}{{UNIT}}); transform: translate({{image_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{image_offset_y_mobile.SIZE || 0}}{{UNIT}});',
                    // Review body styles
                    '{{WRAPPER}}.ha-review--top .ha-review-body' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_popover();

        $this->add_responsive_control(
            'image_padding',
            [
                'label' => __( 'Padding', 'happy-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-figure img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .ha-review-figure img',
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => __( 'Border Radius', 'happy-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ha-review-figure img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .ha-review-figure img',
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( '_wrapper', 'itemscope' );
        $this->add_render_attribute( '_wrapper', 'itemtype', 'https://schema.org/Review' );

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'ha-review-reviewer' );
        $this->add_render_attribute( 'title', 'itemprop', 'author' );
        $this->add_render_attribute( 'title', 'itemscope', '' );
        $this->add_render_attribute( 'title', 'itemtype', 'https://schema.org/Person' );

        $this->add_inline_editing_attributes( 'job_title', 'basic' );
        $this->add_render_attribute( 'job_title', 'class', 'ha-review-position' );

        $this->add_inline_editing_attributes( 'review', 'intermediate' );
        $this->add_render_attribute( 'review', 'class', 'ha-review-desc' );
        $this->add_render_attribute( 'review', 'itemprop', 'reviewBody' );

        $this->add_render_attribute( 'ratting', 'class', [
                'ha-review-ratting',
                'ha-review-ratting--' . $settings['ratting_style']
            ] );

        $this->add_render_attribute( 'ratting', 'itemprop', 'reviewRating' );
        $this->add_render_attribute( 'ratting', 'itemscope' );
        $this->add_render_attribute( 'ratting', 'itemtype', 'https://schema.org/Rating' );

        $ratting = max( 0, $settings['ratting']['size'] );
        ?>

        <?php if ( $settings['image']['url'] || $settings['image']['id'] ) :
            $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
            $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
            $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
            $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
            ?>
            <figure class="ha-review-figure">
                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
            </figure>
        <?php endif; ?>

        <div class="ha-review-body">
            <?php if ( $settings['review_position'] === 'before' && $settings['review'] ) : ?>
                <div <?php $this->print_render_attribute_string( 'review' ); ?>>
                    <p><?php echo ha_kses_intermediate( $settings['review'] ); ?></p>
                </div>
            <?php endif; ?>

            <div class="ha-review-header">
                <?php if ( $settings['title' ] ) :
                    printf( '<%1$s %2$s>%3$s</%1$s>',
                        tag_escape( $settings['title_tag'] ),
                        $this->get_render_attribute_string( 'title' ),
                        ha_kses_basic( $settings['title' ] )
                        );
                endif; ?>

                <?php if ( $settings['job_title' ] ) : ?>
                    <div <?php $this->print_render_attribute_string( 'job_title' ); ?>><?php echo ha_kses_basic( $settings['job_title' ] ); ?></div>
                <?php endif; ?>

                <div <?php $this->print_render_attribute_string( 'ratting' ); ?>>
                    <meta itemprop="ratingValue" content="<?php echo esc_attr( $ratting ); ?>">

                    <?php if ( $settings['ratting_style'] === 'num' ) : ?>
                        <?php echo esc_html( $ratting ); ?> <i class="fa fa-star" aria-hidden="true"></i>
                    <?php else :
                        for ( $i = 1; $i <= 5; ++$i ) :
                            if ( $i <= $ratting ) {
                                echo '<i class="fa fa-star" aria-hidden="true"></i>';
                            } else {
                                echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                            }
                        endfor;
                    endif; ?>
                 </div>
            </div>

            <?php if ( $settings['review_position'] === 'after' && $settings['review'] ) : ?>
                <div <?php $this->print_render_attribute_string( 'review' ); ?>>
                    <p><?php echo ha_kses_intermediate( $settings['review'] ); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <span class="ha-screen-reader-text" itemprop="itemReviewed" itemscope itemtype="https://schema.org/Thing">
            <span itemprop="name"><?php echo esc_html( $settings['review_for'] ); ?></span>
        </span>
        <?php
    }

    public function _content_template() {
        ?>
        <#
        view.addInlineEditingAttributes( 'title', 'basic' );
        view.addRenderAttribute( 'title', 'class', 'ha-review-reviewer' );

        view.addInlineEditingAttributes( 'job_title', 'basic' );
        view.addRenderAttribute( 'job_title', 'class', 'ha-review-position' );

        view.addInlineEditingAttributes( 'review', 'intermediate' );
        view.addRenderAttribute( 'review', 'class', 'ha-review-desc' );

        var ratting = Math.max(0, settings.ratting.size);

        if (settings.image.url || settings.image.id) {
            var image = {
                id: settings.image.id,
                url: settings.image.url,
                size: settings.thumbnail_size,
                dimension: settings.thumbnail_custom_dimension,
                model: view.getEditModel()
            };

            var image_url = elementor.imagesManager.getImageUrl( image );
            #>
            <figure class="ha-review-figure">
                <img src="{{ image_url }}">
            </figure>
        <# } #>

        <div class="ha-review-body">
            <# if (settings.review_position === 'before' && settings.review) { #>
                <div {{{ view.getRenderAttributeString( 'review' ) }}}>
                    <p>{{{ settings.review }}}</p>
                </div>
            <# } #>
            <div class="ha-review-header">
                <# if (settings.title) { #>
                    <{{ settings.title_tag }} {{{ view.getRenderAttributeString( 'title' ) }}}>{{{ settings.title }}}</{{ settings.title_tag }}>
                <# } #>
                <# if (settings.job_title) { #>
                    <div {{{ view.getRenderAttributeString( 'job_title' ) }}}>{{{ settings.job_title }}}</div>
                <# } #>
                <# if ( settings.ratting_style === 'num' ) { #>
                    <div class="ha-review-ratting ha-review-ratting--num">{{ ratting }} <i class="fa fa-star"></i></div>
                <# } else { #>
                    <div class="ha-review-ratting ha-review-ratting--star">
                        <# _.each(_.range(1, 6), function(i) {
                            if (i <= ratting) {
                                print('<i class="fa fa-star"></i>');
                            } else {
                                print('<i class="fa fa-star-o"></i>');
                            }
                        }); #>
                    </div>
                <# } #>
            </div>
            <# if ( settings.review_position === 'after' && settings.review) { #>
                <div {{{ view.getRenderAttributeString( 'review' ) }}}>
                    <p>{{{ settings.review }}}</p>
                </div>
            <# } #>
        </div>
        <?php
    }

}
