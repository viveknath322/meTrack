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
class Faded_Sass_C2a_Right extends Widget_Base {

	public function get_name() {
		return 'faded-sass-c2a-right';
	}

	public function get_title() {
		return __( 'Sass::  Featured C2A Right', 'faded-small-core' );
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
				'default' => 'Easy & secure access'
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
						'default' => 'Learn more',
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
					'url' => FADED_SMALL_DIR_IMG.'/new/saas/saas_about_right.jpg',
				]
			]
		);
		$this->add_control(
			'featured_img_2', [
				'label' => esc_html__( 'Featured Image 2', 'faded-small-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => FADED_SMALL_DIR_IMG.'/new/saas/saas_about_right1.jpg',
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
     <section class="sass_c2a_area_right">
        <div class="saas-about-item sass_a_item_two">
            <svg xmlns="http://www.w3.org/2000/svg" class="svg_right">
                <path fill-rule="evenodd"  opacity="0.051" fill="rgb(132, 96, 255)"
                 d="M1039.977,215.245 C1039.977,215.245 936.526,424.225 691.622,411.667 C406.458,397.045 119.998,265.259 119.998,265.259 L-0.000,417.257 C-0.000,417.257 372.243,706.989 638.324,763.300 C875.576,813.509 1039.977,741.000 1039.977,741.000 L1039.977,215.245 Z"/>
                <path fill-rule="evenodd"  opacity="0.051" fill="rgb(132, 96, 255)"
                 d="M1040.009,636.000 C1040.009,636.000 876.554,717.076 631.642,729.643 C346.469,744.276 39.999,706.000 39.999,706.000 L179.995,573.999 C179.995,573.999 374.278,585.151 636.975,490.477 C878.382,403.475 1040.009,-0.000 1040.009,-0.000 L1040.009,636.000 Z"/>
            </svg>
            <div class="w_50 side-img text-left pull-right pb_140">
                 <img class="img_one" src="<?php echo esc_url($featured_img_1['url']) ?>" alt="">
                <img class="img_two" src="<?php echo esc_url($featured_img_2['url']) ?>" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="saas_about_content text-left">
                            <h2 class="saas_h2 mt_0"><?php echo esc_html($title_text) ?></h2>
                            <p class="n_title_p"><?php echo esc_html($content_text); ?></p>
                            <a href="<?php echo esc_url($button_1_url['url']) ?>" class="saas_btn_two n_them_btn"><?php echo esc_html($button_1_name); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php
	}
}
