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
class Faded_Sass_Features_Slider extends Widget_Base {

	public function get_name() {
		return 'faded-sass-features-slider';
	}

	public function get_title() {
		return __( 'Sass:: Features Slider', 'faded-small-core' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-down';
	}

	public function get_categories() {
		return [ 'faded-small-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		 // ------------------------------Buttons -------------------------
		$this->start_controls_section(
			'buttons_sec',
			[
				'label' => __( 'Section Title Info', 'faded-small-core' ),
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => esc_html__( 'Title text', 'themes-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Screenshot'
			]
		);
		$this->add_control(
			'content_text',
			[
				'label' => esc_html__( 'Section Content', 'themes-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Tristique voluptate proident ipsam, officia mus? Nam tempus, conubia nascetur vero hac animi? Sapien cillum class quia.'
			]
		);
		$this->end_controls_section(); // End Buttons
		$this->start_controls_section(
			'slider_sec',
			[
				'label' => __( 'Section Slider Image Info', 'faded-small-core' ),
			]
		);
		$this->add_control(
			'gallery',
			[
				'label' => __( 'Add Images', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [
					'url'=> FADED_SMALL_DIR_IMG.'/new/saas/screen1.jpg',
				],
			]
		);
    $this->end_controls_section(); // End Buttons
	}
	protected function render() {
		$settings = $this->get_settings();
		$title_text = !empty($settings['title_text'])  ? $settings['title_text'] : '';
		$content_text = !empty($settings['content_text'])  ? $settings['content_text'] : '';
		$gallery = !empty($settings['gallery'])  ? $settings['gallery'] : '';
    ?>
   
     <section class="saas_gallery_area">
        <div class="saas_section_title mb_70">
        	<?php if(!empty($title_text)): ?><h2><?php echo wp_kses_post($title_text , 'post'); ?></h2><?php endif; ?>
            <?php if(!empty($content_text)): ?><p><?php echo wp_kses_post($content_text , 'post'); ?></p><?php endif; ?>
           
        </div>
        <div class="saas_screen_gallery owl-carousel">
        	<?php foreach ($gallery as $image) : ?>
            	<div class="item"><img src="<?php echo esc_url($image['url']) ?>" alt=""></div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
	}
}
