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
class Faded_Sass_Contact_Form extends Widget_Base {

	public function get_name() {
		return 'faded-sass-contact-form';
	}

	public function get_title() {
		return __( 'Sass:: Contact Form', 'faded-small-core' );
	}

	public function get_icon() {
		return 'eicon-mail';
	}

	public function get_categories() {
		return [ 'faded-small-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		
	    // -------------------------------------------------- Featured image ------------------------------
		$this->start_controls_section(
            'title_sec',
            [
                'label' => __( 'Section Content', 'faded-small-core' ),
            ]
        );

        $this->add_control(
            'title_text', [
                'label' => esc_html__( 'Title text', 'faded-small-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Get In Touch'
            ]
        );
        $this->add_control(
            'content_text', [
                'label' => esc_html__( 'Section Content', 'faded-small-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.'
            ]
        );

     $this->end_controls_section();   






        // ------------------------------Buttons -------------------------
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
						'default' => 'Location'
					],
					[
						'name' => 'label-details',
						'label' => __( 'Details', 'faded-small-core' ),
						'type' => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'default' => '591 Goldner Point, New York'
                       
					],
					[
                        'name' => 'icon_type',
                        'label' => __( 'Icon type', 'theme-core' ),
                        'type' => Controls_Manager::SELECT,
                        'options' => [
                            'image_icon' => __( 'Image icon', 'theme-core' ),
                        ],
                        'default' => 'image_icon',
                    ],
                    [
                        'name' => 'image_icon',
                        'label' => __( 'Image icon', 'theme-core' ),
                        'type' => Controls_Manager::MEDIA,
                        'condition' => [
                            'icon_type' => 'image_icon'
                        ],
                        'default'=> [
                                'url'=> FADED_SMALL_DIR_IMG.'/new/icon/placeholder.png',
                        ]
                        
                    ],
				
				],
			]
		);
    $this->end_controls_section(); // End Buttons
    /*Contact ------------ area-------------------------*/
    $this->start_controls_section(
        'titles_sec',
            [
                'label' => __( 'Contact Form', 'faded-small-core' ),
    ]);
    $this->add_control(
            'contact_form',[
                'label' => 'Contact Form',
                'type' => Controls_Manager::SELECT,
                'options' => get_contact_form_7_posts(),
            ]
    );


    $this->end_controls_section();


	}

	protected function render() {

		$settings = $this->get_settings();
        $title_text = !empty($settings['title_text'])  ? $settings['title_text'] : '';
		$content_text = !empty($settings['content_text'])  ? $settings['content_text'] : '';
        $features_sction = !empty($settings['features_sction'])  ? $settings['features_sction'] : '';
		$contact_form = !empty($settings['contact_form'])  ? $settings['contact_form'] : '';
    ?>
         <section class="saas_contact_area">
            <div class="container">
                <div class="saas_contact_info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="saas-contact_info">
                                <h3 class="s_contact_title"><?php  echo esc_html($title_text); ?></h3>
                                <p><?php    echo esc_html($content_text); ?></p>
                                 <?php   foreach ($features_sction as $features) :?>
	                                <div class="contact-info">
	                                    <div class="icon"><img src="<?php echo esc_url($features['image_icon']['url']); ?>" alt=""></div>
	                                    <h3><?php   echo esc_html($features['label']) ?></h3>
	                                    <p><?php   echo esc_html($features['label-details']) ?></p>
	                                </div>
                            	<?php 	endforeach; ?>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="saas_contact_form">
                                <h3 class="s_contact_title"><?php echo __('Leave a Comment','faded-small-core') ?></h3>
                        			<?php echo do_shortcode('[contact-form-7 id="' . $contact_form . '"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
	}
}
