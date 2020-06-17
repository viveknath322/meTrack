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
class Faded_Sass_Service_Items extends Widget_Base {

	public function get_name() {
		return 'faded-sass-service-items';
	}

	public function get_title() {
		return __( 'Sass :: Service Items', 'faded-small-core' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'faded-small-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

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
				'default' => 'Our Dashboards Features'
			]
		);

		$this->add_control(
			'subtitle_text', [
				'label' => esc_html__( 'Subtitle Text', 'faded-small-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Tristique voluptate proident ipsam, officia mus? Nam tempus, conubia nascetur vero hac animi? Sapien cillum class quia.'
			]
		);
		
		$this->end_controls_section(); // End title section

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
						'default' => 'Track Anything'
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
						'label' => __( 'Image icon', 'plugin-domain' ),
						'type' => Controls_Manager::MEDIA,
						'default' => [
							'url' => FADED_SMALL_DIR_IMG.'/new/icon/d-f1.png',
						]
					],
                   
				
				],
			]
		);

    $this->end_controls_section(); 
    
	

	}

	protected function render() {

		$settings = $this->get_settings();
		
		$title_text = !empty($settings['title_text'])  ? $settings['title_text'] : '';
		$subtitle_text = !empty($settings['subtitle_text'])  ? $settings['subtitle_text'] : '';
		$features_sction = !empty($settings['features_sction'])  ? $settings['features_sction'] : '';
		$slider_sction = !empty($settings['slider_sction'])  ? $settings['slider_sction'] : '';
?>
      <section class="saas_dashboard_features">
            <div class="container">
                <div class="saas_section_title mb_70">
                     <?php if(!empty($title_text)): ?><h2><?php echo wp_kses_post($title_text , 'post'); ?></h2><?php endif; ?>
                    <?php if(!empty($subtitle_text)): ?><p><?php echo wp_kses_post($subtitle_text , 'post'); ?></p><?php endif; ?>
                </div>
                <div class="row saas_features_info">
                	<?php foreach ($features_sction as $features_info ): ?>
                    <div class="col-md-4">
                        <div class="saas_features_item">
                            <div class="round_icon">
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
