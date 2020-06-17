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
class Faded_Sass_Featured_Img extends Widget_Base {

	public function get_name() {
		return 'faded-sass-featured-img';
	}

	public function get_title() {
		return __( 'Sass:: Featured Img', 'faded-small-core' );
	}

	public function get_icon() {
		return 'eicon-insert-image';
	}

	public function get_categories() {
		return [ 'faded-small-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Fixed Screen Image', 'themes-core' ),
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => esc_html__( 'Title text', 'themes-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Our Dashboard Features'
			]
		);
		$this->add_control(
			'sec_content',
			[
				'label' => esc_html__( 'Section Content', 'themes-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Tristique voluptate proident ipsam, officia mus? Nam tempus, conubia nascetur vero hac animi? Sapien<br> cillum class quia illo ipsa nullam ante!'
			]
		);
		$this->add_control(
			'sec_featured_image', [
				'label' => esc_html__( 'Featured Image 2', 'faded-small-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => FADED_SMALL_DIR_IMG.'/new/saas/video.png',
				]
			]
		);
		$this->end_controls_section(); // End Hero content
	}

	protected function render() {

	$settings = $this->get_settings();

	$title_text = !empty($settings['title_text'])  ? $settings['title_text'] : '';
	$sec_content = !empty($settings['sec_content'])  ? $settings['sec_content'] : '';
	$sec_featured_image = !empty($settings['sec_featured_image'])  ? $settings['sec_featured_image'] : '';

    ?>
    <section class="sass_video_area">
            <div class="container">
                <div class="saas_section_title mb_70">
                    <h2><?php echo esc_html($title_text); ?></h2>
                    <p><?php echo wp_kses_post($sec_content,'post'); ?></p>
                    <p></p>
                </div>
                <div class="saas_video">
                    <img src="<?php echo esc_url($sec_featured_image['url']) ?>" alt="">
                    <a href="#" class="video_btn"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </section>
    <?php
	}
}
