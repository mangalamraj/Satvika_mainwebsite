<?php 

global $wp_scripts;
$suffix = defined('wbebaic_SCRIPT_DEBUG') && wbebaic_SCRIPT_DEBUG ? '' : '.min';
    
    wp_register_style('qlcd-wbebaic-admin-style', wbebaic_addon_url . 'css/admin-style.css', '', '', 'screen');
    wp_enqueue_style('qlcd-wbebaic-admin-style');

    wp_enqueue_script('jquery');

    wp_register_style('qcld-wbebaic-bootcampqc-css', wbebaic_addon_url . 'css/bootstrap.min.css', '', '', 'screen');
    wp_enqueue_style('qcld-wbebaic-bootcampqc-css');



?>
<div class="wrap">
    <h1 class="wbebaic_addon_header_h1"><?php echo esc_html__('Before After Slider for Elementor', 'wpwbebaic_addons'); ?> </h1>
</div>
<div class="wp-wbebaic_addons-wrap">
    <div class="wbebaic_addon_dashboard_header container"><h1><?php echo esc_html__('Before After Slider for Elementor', 'wbebaic_addon'); ?></h1></div>

    <div class="wbebaic_addon_addons_section container">
        <div class="wbebaic_addon_single_addon_wrapper qc-display-flex qc-justify-center qc-flex-wrap wbebaic_pb_0">
            <h2 class="wbebaic_addon_single_addon_title"><?php echo esc_html__('AddOns', 'wbebaic_addon'); ?></h2>
            
            <div class="wbebaic_addon_single_addon wbebaic-center-addon">
                <div class="wbebaic_addon_single_content">
                    <div class="wbebaic_addon_addon_image">
                        <a href="https://plugin-devs.com/product/gallery-slider-for-elementor-before-after-slider/" target="_blank" >
                            <img src="<?php echo esc_url(wbebaic_addon_url.'images/before-after-gallery.png'); ?>" title="" />
                        </a>
                    </div>
                    <div class="wbebaic_addon_addon_content">
                        <div class="wbebaic_addon_addon_title">
                            <a href="https://plugin-devs.com/product/gallery-slider-for-elementor-before-after-slider/" target="_blank" >
                                <?php echo esc_html__('Gallery Slider AddOn', 'wbebaic_addon'); ?>
                            </a>
                        </div>
                        <div class="wbebaic_addon_addon_details">
                            <span class="wp_addon_notinstalled">Not Installed</span>
                            <p>Display Your Before After Works as Slideshow with image Navigation</p>
                            <a class="button button-secondary" href="https://plugin-devs.com/product/gallery-slider-for-elementor-before-after-slider/" target="_blank" ><?php echo esc_html__('Get It Now', 'wbebaic_addon'); ?></a>
                        </div>            
                    </div>
                </div>
            </div>

            <div class="wbebaic_addon_single_addon wbebaic-center-addon">
                <div class="wbebaic_addon_single_content">
                    <div class="wbebaic_addon_addon_image">
                        <a href="https://plugin-devs.com/product/carousel-slider-for-elementor-before-after-slider/" target="_blank" >
                            <img src="<?php echo esc_url(wbebaic_addon_url.'images/before-after-carousel-3.png'); ?>" title="" />
                        </a>
                    </div>
                    <div class="wbebaic_addon_addon_content">
                        <div class="wbebaic_addon_addon_title">
                            <a href="https://plugin-devs.com/product/carousel-slider-for-elementor-before-after-slider/" target="_blank" >
                                <?php echo esc_html__('Carousel Slider AddOn', 'wbebaic_addon'); ?>
                            </a>
                        </div>
                        <div class="wbebaic_addon_addon_details">
                            <span class="wp_addon_notinstalled">Not Installed</span>
                            <p>Display your Before After Works as Carousel Slider</p>
                            <a class="button button-secondary" href="https://plugin-devs.com/product/carousel-slider-for-elementor-before-after-slider/" target="_blank" ><?php echo esc_html__('Get It Now', 'wbebaic_addon'); ?></a>
                        </div>            
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>