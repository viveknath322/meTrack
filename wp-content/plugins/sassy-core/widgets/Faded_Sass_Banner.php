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
class Faded_Sass_Banner extends Widget_Base {

	public function get_name() {
		return 'faded-sass-banner';
	}

	public function get_title() {
		return __( 'Sass:: Sass Banner', 'faded-small-core' );
	}

	public function get_icon() {
		return 'eicon-banner';
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
				'label' => esc_html__( 'Title text', 'faded-small-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Give yourself the best chance of success with Faded'
			]
		);

		$this->add_control(
			'subtitle_text', [
				'label' => esc_html__( 'Subtitle text', 'faded-small-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Solution'
			]
		);

		$this->end_controls_section(); // End title section

		// ------------------------------Button 1 -------------------------
		$this->start_controls_section(
			'button_sec',
			[
				'label' => __( 'Button', 'themes-core' ),
			]
		);
		$this->add_control(
			'button_name', [
				'label' => __( 'Button name', 'themes-core' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => 'Get Started',
			]
			
		);

		$this->add_control(
				'button_url',[		
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
			'sec_featured_img', [
				'label' => esc_html__( 'Upload the section featured image', 'faded-small-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' =>[
					'url'=> FADED_SMALL_DIR_IMG.'/new/saas/mackbook.png',
				]
			]
		);
		
        $this->end_controls_section(); // End Section image
      
	}

	protected function render() {

	$settings = $this->get_settings();
	$title_text = isset($settings['title_text']) ? $settings['title_text'] : '';
	$subtitle_text = isset($settings['subtitle_text']) ? $settings['subtitle_text'] : '';
	$sec_featured_img = isset($settings['sec_featured_img']) ? $settings['sec_featured_img'] : '';
	$button_name = isset($settings['button_name']) ? $settings['button_name'] : '';
	$button_url = isset($settings['button_url']) ? $settings['button_url'] : '';
	?>
	 <section class="saas_home_area">
	    <div class="home_item">
	        <div id="bubbles">
	            <div class="bubble x1"></div>
	            <div class="bubble x2"></div>
	            <div class="bubble x3"></div>
	            <div class="bubble x4"></div>
	            <div class="bubble x5"></div>
	            <div class="bubble x6"></div>
	            <div class="bubble x7"></div>
	            <div class="bubble x8"></div>
	            <div class="bubble x9"></div>
	            <div class="bubble x10"></div>
	            <div class="bubble x11"></div>
	            <div class="bubble x12"></div>
	            <div class="bubble x13"></div>
	        </div>
	        <svg xmlns="http://www.w3.org/2000/svg">
	            <path class="cls-1" fill="#fff" d="M0,0S480.2,100,960.3,100C1440.2,100,1920,0,1920,0V120H0V0Z"/>
	        </svg>
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12 text-center">
	                	<?php if(!empty($subtitle_text)): ?><h6 class="s_banner_text"><?php echo wp_kses_post($subtitle_text , 'post'); ?></h6><?php endif; ?>
	                	<?php if(!empty($title_text)): ?><h1 class="s_banner_title"><?php echo wp_kses_post($title_text , 'post'); ?></h1><?php endif; ?>
	                    <a href="<?php echo esc_url($button_url['url']); ?>" class="saas_btn"><?php echo esc_html($button_name); ?></a>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="saas_home_img">
	        <img src="<?php echo esc_url($sec_featured_img['url']) ?>" alt="">
	    </div>
	</section>
	<?php
	}
}
