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
class Faded_Sass_Newsletter extends Widget_Base {

	public function get_name() {
		return 'faded-sass-newsletter';
	}

	public function get_title() {
		return __( 'Sass:: Newsletter', 'faded-small-core' );
	}

	public function get_icon() {
		return 'eicon-post-content';
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
				'label' => __( 'Awesome Features', 'themes-core' ),
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => esc_html__( 'Title text', 'themes-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Join Our Newsletter'
			]
		);
		$this->add_control(
			'content_text',
			[
				'label' => esc_html__( 'Content text', 'themes-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit donec tempus pellentesque dui vel tristique purus justo vestibulum eget lectus.'
			]
		);
		
		$this->end_controls_section(); // End Hero content
	}

	protected function render() {

		$settings = $this->get_settings();
		$title_text = !empty($settings['title_text'])  ? $settings['title_text'] : '';
		$content_text = !empty($settings['content_text'])  ? $settings['content_text'] : '';


?>

     <section class="saas_newsletter_area">
            <div class="container">
                <div class="new_sectitle br_none pb_0">
                    <h2 class="n_title_color mb_0"><?php echo esc_html($title_text); ?></h2>
                    <p class="n_title_p mb_0"><?php echo wp_kses_post($content_text,'post') ?></p>
                </div>
                <form class="n_subscription saas_subscribe mailchimp" method="post" novalidate="true" _lpchecked="1" action="https://droitthemes.us19.list-manage.com/subscribe/post?u=5d334217e146b083fe74171bf&amp;id=a6ddc4fcb3">
                    <div class="form-group">
                        <input name="EMAIL" id="mce-EMAIL" type="email" class="form-control memail" placeholder="Your email">
                    </div>
                    <button type="submit">Subscribe <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    <p class="mchimp-errmessage" style="display: none;"></p>
                    <p class="mchimp-sucmessage" style="display: none;"></p>
                </form>
            </div>
     </section>
    <?php
	}
}
