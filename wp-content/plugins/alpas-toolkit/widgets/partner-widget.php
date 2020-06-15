<?php
namespace Elementor;
class PartnerWidget extends Widget_Base{
    public function get_name(){
        return "partner-logo";
    }
    public function get_title(){
        return "Partner Logo";
    }
    public function get_icon(){
        return "eicon-logo";
    }
    public function get_categories(){
        return ['alpascategory'];
    }

    protected function _register_controls(){

    // Start Partner section
    $this-> start_controls_section(
        'layout_section',
        [
            'label'=>esc_html__('Content', 'alpas-toolkit'),
            'tab'=> Controls_Manager::TAB_CONTENT,
        ]
    );

    $repeater = new Repeater();
    $repeater->add_control(
        'partner_logo', [
            'label' => esc_html__( 'Logo', 'alpas-toolkit' ),
            'type' => Controls_Manager::MEDIA,
            'label_block' => true,
        ]
    );
    $repeater->add_control(
        'logo_url', [
            'label' => esc_html__( 'URL', 'alpas-toolkit' ),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
        ]
    );
    $repeater->add_group_control(
        Group_Control_Image_Size::get_type(),
        [
            'default' =>esc_html__('full','alpas-toolkit'),
            'name' => 'imagesz'
        ]
    );
    $this->add_control(
        'logo',
        [
            'label' => esc_html__( 'Add Partner Logo', 'alpas-toolkit' ),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ]
    );
    $this-> end_controls_section();
    
}

    protected function render() 
    {
        // Retrieve all controls value
        $settings = $this->get_settings_for_display(); ?>

        <!-- Start Partner Area -->
        <div class="partner-area">
            <div class="container">
                <div class="partner-slides owl-carousel owl-theme">
                    <?php
                    if ( $settings['logo']!='' ){ 
                        foreach ( $settings['logo'] as $item ) {
                            if($item['partner_logo']!=''){ ?>
                            <div class="single-partner-item">
                                <a href="<?php echo esc_html($item['logo_url']); ?>">
                                <?php
                                    echo Group_Control_Image_Size::get_attachment_image_html($item,'imagesz','partner_logo');
                                ?>
                                </a>
                            </div>
                        <?php
                    } } }?>
                </div>
            </div>
        </div>
        <!-- End Partner Area -->
    <?php    
    }

    protected function _content_template() {}
}
Plugin::instance()->widgets_manager->register_widget_type( new PartnerWidget );