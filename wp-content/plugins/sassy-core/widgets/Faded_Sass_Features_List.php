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
class Faded_Sass_Features_List extends Widget_Base {

	public function get_name() {
		return 'faded-sass-feature-list';
	}

	public function get_title() {
		return __( 'Sass:: Features List', 'faded-small-core' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'faded-small-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();


		        // ------------------------------Features Section Info -------------------------
		$this->start_controls_section(
			'buttons_sec',
			[
				'label' => __( 'Section Feature Info', 'faded-small-core' ),
			]
		);
		$this->add_control(
			'features_sction', [
				'label' => __( 'Create Box', 'faded-small-core' ),
				'type' => Controls_Manager::REPEATER,
				'title_field' => '{{{ label }}}',
				'fields' => [
					[
						'name' => 'label',
						'label' => __( 'Title', 'faded-small-core' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => 'Register to get start'
					],
					[
						'name' => 'label-details',
						'label' => __( 'Details', 'faded-small-core' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'default' => 'Officiis per torquent placeat tempora blandit, aliquid, iure, quod dignissim reprehenderit turpis placeat unde.'
                       
					],
                    [
                        'name' => 'image_icon',
                        'label' => __( 'Image icon', 'theme-core' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
							'url' => FADED_SMALL_DIR_IMG.'/new/icon/pincel.png',
						]
		            ],
				
				],
			]
		);
    $this->end_controls_section(); 
	}

	protected function render() {

		$settings = $this->get_settings();
		$features_sction = !empty($settings['features_sction'])  ? $settings['features_sction'] : '';
    ?>
    <section class="n_features_area pt_0 ">
            <div class="container">
                <div class="row">
                	<?php foreach ($features_sction as $features_info ): ?>
                    <div class="col-md-4">
                        <div class="n_features_item">
                            <div class="n_round_icon">
                                <img src="<?php echo esc_url($features_info['image_icon']['url']); ?>" alt="">
                            </div>
                            <h3><?php echo esc_html($features_info['label']); ?></h3>
                            <p><?php echo esc_html($features_info['label-details']); ?></p>
                        </div>
                    </div>
                   <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php
	}
}
