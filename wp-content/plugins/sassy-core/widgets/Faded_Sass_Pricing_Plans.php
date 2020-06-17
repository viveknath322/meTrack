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
class Faded_Sass_Pricing_Plans extends Widget_Base {

	public function get_name() {
		return 'faded-sass-pricing-plans';
	}

	public function get_title() {
		return __( 'Sass:: Pricing Plans', 'faded-small-core' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'faded-small-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();
		 // ------------------------------Buttons -------------------------
		$this->start_controls_section(
			'title_sec',
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
		$this->end_controls_section(); 

		// ------------------------------Features Section Info -------------------------
		$this->start_controls_section(
			'buttons_sec',
			[
				'label' => __( 'Section Feature Info', 'faded-small-core' ),
			]
		);
		$this->add_control(
			'features_sction', [
				'label' => __( 'Create Pricing Items', 'faded-small-core' ),
				'type' => Controls_Manager::REPEATER,
				'title_field' => '{{{ label }}}',
				'fields' => [
					[
						'name' => 'label',
						'label' => __( 'Title', 'faded-small-core' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => 'Free'
					],
					[
						'name' => 'duration',
						'label' => __( 'Duration', 'faded-small-core' ),
						'type' => Controls_Manager::TEXT,
						'default' => 'Lifetime',
					],
					[
						'name' => 'price',
						'label' => __( 'Price', 'faded-small-core' ),
						'type' => Controls_Manager::TEXT,
						'default' => '$100',
					],
					[
						'name' => 'label-details',
						'label' => __( 'Details', 'faded-small-core' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'default' => '<li>One Website</li>
                                	  <li>One User</li>
                                	  <li>50 GB Bandwidth</li>
                                	  <li><i class="icon_close"></i></li>
                                	  <li><i class="icon_close"></i></li>'
                       
					],
                    [
                        'name' => 'image_icon',
                        'label' => __( 'Image icon', 'theme-core' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
							'url' => FADED_SMALL_DIR_IMG.'/new/icon/rocket-icon.png',
						]
		            ],
		            [
						'name' => 'purchase_btn_label',
						'label' => __( 'Purchase button label', 'faded-small-core' ),
						'type' => Controls_Manager::TEXT,
						'default' => 'Purchase',
                        'label_block' => true
					],
					[
						'name' => 'purchase_btn_url',
						'label' => __( 'Purchase button URL', 'faded-small-core' ),
						'type' => Controls_Manager::URL,
						'default' => [
							'url' => '#',
							'is_external' => '',
						],
						'show_external' => true,
					],
				
				],
			]
		);
    $this->end_controls_section(); 
	}

	protected function render() {

		$settings = $this->get_settings();
		$title_text = !empty($settings['title_text'])  ? $settings['title_text'] : '';
		$content_text = !empty($settings['content_text'])  ? $settings['content_text'] : '';
		$features_sction = !empty($settings['features_sction'])  ? $settings['features_sction'] : '';
    ?>
 	<section class="saas_priceing_area">
        <div class="container">
            <div class="saas_section_title mb_70">
             <?php if(!empty($title_text)): ?><h2><?php echo wp_kses_post($title_text , 'post'); ?></h2><?php endif; ?>
       		 <?php if(!empty($content_text)): ?><p><?php echo wp_kses_post($content_text , 'post'); ?></p><?php endif; ?>
            </div>
            <div class="row saas_priceing_info">
            	<?php 	foreach ($features_sction as $pricing) : ?>
                <div class="col-md-4">
                    <div class="saas_price_item">
                        <img src="<?php echo esc_url($pricing['image_icon']['url']); ?>" alt="">
                        <h3><?php echo esc_html($pricing['label']); ?></h3>
                        <div class="br"></div>
                        <ul class="list_style">
                            <?php echo wp_kses_post($pricing['label-details'],'post'); ?>
                        </ul>
                        <div class="price">
                            <?php echo esc_html($pricing['price']); ?>
                            <span><?php echo esc_html($pricing['duration']); ?></span>
                        </div>
                        <a href="<?php echo esc_url($pricing['purchase_btn_url']['url']); ?>" class="saas_btn_two"><?php echo esc_html($pricing['purchase_btn_label']); ?></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
	}
}
