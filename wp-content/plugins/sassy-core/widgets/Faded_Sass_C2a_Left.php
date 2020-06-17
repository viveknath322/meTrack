<?php
namespace Faded_Small_Core\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Text Typing Effect
 *
 * Elementor widget for text typing effect.
 *
 * @since 1.7.0
 */
class Faded_Sass_C2a_Left extends Widget_Base {

	public function get_name() {
		return 'faded-sass-c2a-left';
	}

	public function get_title() {
		return __( 'Sass::  Featured C2A Left', 'faded-small-core' );
	}

	public function get_icon() {
		return 'eicon-dual-button<?php echo FADED_SMALL_DIR_IMG(); ?>/assets/';
	}

	public function get_categories() {
		return [ 'faded-small-elements' ];
	}

	protected function _register_controls() {

		// ------------------------------  Title Section ------------------------------
		$this->start_controls_section(
			'title_sec',
			[
				'label' => __( 'Section Content', 'faded-small-core' ),
			]
		);

		$this->add_control(
			'title_text', [
				'label' => esc_html__( 'Title Text', 'faded-small-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Works on all platforms'
			]
		);

		$this->add_control(
			'content_text', [
				'label' => esc_html__( 'Content Text', 'faded-small-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Tristique, praesentium! Aute, distinctio, quo congue esse totam inceptos do deleniti temporibus? Nemo platea conubia aliquet ultricies veniam quasi nulla quisque? Natoque primis habitasse ipsum illo maiores. Quidem dolore proident. Eveniet cupidatat pede. Suspendisse possimus molestie. Conubia necessitatibus earum et! Aut! Leo! Magnam consectetur, odit, natus porro euismod! Accusamus quos.'
			]
		);
		
		$this->end_controls_section(); // End title section

		// ------------------------------Button 1 -------------------------
		$this->start_controls_section(
			'button_1_sec',
			[
				'label' => __( 'Button', 'themes-core' ),
			]
		);
		$this->add_control(
			'button_1_name', [
				'label' => __( 'Button name', 'themes-core' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => 'Get Started',
			]
			
		);

		$this->add_control(
				'button_1_url',[		
				'label' => __( 'Button URL', 'themes-core' ),
						'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
				]
			);
    	$this->end_controls_section(); // End Buttons


        // -------------------------------------------------- Section image ------------------------------
		$this->start_controls_section(
			'sec_img', [
				'label' => __( 'Section Images', 'faded-small-core' ),
			]
		);
		$this->add_control(
			'featured_img_1', [
				'label' => esc_html__( 'Featured Image 1', 'faded-small-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => FADED_SMALL_DIR_IMG.'/new/saas/saas_about_left.jpg',
				]
			]
		);
		$this->add_control(
			'featured_img_2', [
				'label' => esc_html__( 'Featured Image 2', 'faded-small-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => FADED_SMALL_DIR_IMG.'/new/saas/saas_about_left2.jpg',
				]
			]
		);
		
		
        $this->end_controls_section(); 

	}

	protected function render() {

	$settings = $this->get_settings();
	$title_text = isset($settings['title_text']) ? $settings['title_text'] : '';
	$content_text = isset($settings['content_text']) ? $settings['content_text'] : '';
	$featured_img_1 = isset($settings['featured_img_1']) ? $settings['featured_img_1'] : '';
	$featured_img_2 = isset($settings['featured_img_2']) ? $settings['featured_img_2'] : '';
	
	$button_1_name = isset($settings['button_1_name']) ? $settings['button_1_name'] : '';
	$button_1_url = isset($settings['button_1_url']) ? $settings['button_1_url'] : '';

	?>
    <div class="saas_about_area">
            <a href="#" class="scroll_btn"><i class=""></i></a>
            <div class="saas-about-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="svg_left">
                    <path fill-rule="evenodd"  opacity="0.051" fill="rgb(132, 96, 255)"
                    d="M0.991,565.754 C0.991,565.754 104.446,356.774 349.357,369.332 C634.530,383.954 961.000,485.740 961.000,485.740 L1041.000,443.742 C1041.000,443.742 668.745,74.010 402.657,17.699 C165.398,-32.511 0.991,39.999 0.991,39.999 L0.991,565.754 Z"/>
                    <path fill-rule="evenodd"  opacity="0.051" fill="rgb(132, 96, 255)"
                    d="M0.960,145.000 C0.960,145.000 164.420,63.922 409.339,51.356 C694.520,36.723 1011.000,124.999 1011.000,124.999 L881.000,226.999 C881.000,226.999 666.711,195.848 404.006,290.522 C162.591,377.523 0.960,780.999 0.960,780.999 L0.960,145.000 Z"/>
                </svg>
                <div class="w_50 side-img text-right pull-left pb_50">
                    <img class="img_one" src="<?php echo esc_url($featured_img_1['url']) ?>" alt="">
                    <img class="img_two" src="<?php echo esc_url($featured_img_2['url']) ?>" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="saas_about_content text-left">
                                <h2 class="saas_h2 mt_0"><?php echo esc_html($title_text) ?></h2>
                                <p class="n_title_p"><?php echo esc_html($content_text); ?></p>
                                <a href="<?php echo esc_url($button_1_url['url']) ?>" class="saas_btn_two n_them_btn"><?php echo esc_html($button_1_name); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     </div>
	<?php
	}
}
