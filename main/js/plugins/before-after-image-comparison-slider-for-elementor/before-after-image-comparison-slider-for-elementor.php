<?php
/**
 Plugin Name: Before After Image Comparison Slider for Elementor
 Description: Before After Image Comparison Slider for Elementor is an image comparison slider plugin. This plugin allows you to create the effect for comparing two before and after images.
 Author: Plugin Devs
 Author URI: https://plugin-devs.com/
 Plugin URI: https://plugin-devs.com/product/before-after-slider-for-elementor/
 Version: 1.4.7
 License: GPLv2
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
 Domain Path: languages
 Text Domain: before-after-image-comparison-slider-for-elementor
 */

define( 'WB_EBAIC_PATH', plugin_dir_path( __FILE__ ) );
define( 'WB_EBAIC_URL', plugin_dir_url( __FILE__ ) ) ;


// Add a custom category for panel widgets
add_action( 'elementor/init', 'wb_ebaic_create_category' );

function wb_ebaic_create_category() {
   \Elementor\Plugin::$instance->elements_manager->add_category( 
	   	'web-builder-element',
	   	[
	   		'title' => esc_html( 'Web Builders Element', 'elementor-before-after-image-slider' ),
	   		'icon' => 'fa fa-plug', //default icon
	   	],
	   	2 // position
   );
}




require_once( WB_EBAIC_PATH . 'admin/main.php' );
require_once( WB_EBAIC_PATH . 'admin/notices.php' );
require_once( WB_EBAIC_PATH . 'admin/admin-pages.php' );

if( is_admin() ){
	require_once( WB_EBAIC_PATH . 'class-plugin-deactivate-feedback.php' );
	require_once( WB_EBAIC_PATH . 'support-page/class-support-page.php' );
	$wb_ebaic_feedback = new Wp_ebaic_Usage_Feedback(
		__FILE__,
		'webbuilders03@gmail.com',
		false,
		true

	);
}


add_action( 'init', 'wb_ebaic_load_textdomain' );
  
/**
 * Load plugin textdomain.
 */
function wb_ebaic_load_textdomain() {
  load_plugin_textdomain( 'before-after-image-comparison-slider-for-elementor', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

add_action('wp_footer', 'wbebaic_display_custom_css');
function wbebaic_display_custom_css(){
	$custom_css = get_option( 'wbebaic_custom_css' );
	$css ='';
	if ( ! empty( $custom_css ) ) {
		$css .= '<style type="text/css">';
		$css .= '/* Custom CSS */' . "\n";
		$css .= $custom_css . "\n";
		$css .= '</style>';
	}
	echo $css;
}

add_action('wp_footer', 'wbebaic_display_custom_js');
function wbebaic_display_custom_js(){
	$custom_js = get_option( 'wbebaic_custom_js' );
	$js ='';
	if ( ! empty( $custom_js ) ) {
		$js .= '<script>';
		$js .= '/* Custom JS */' . "\n";
		$js .= $custom_js . "\n";
		$js .= '</script>';
	}
	echo $js;
}

/**
 * Submenu filter function. Tested with Wordpress 4.1.1
 * Sort and order submenu positions to match your custom order.
 *
 */
function wbebaic_order_submenu( $menu_ord ) {

  global $submenu;

  // Enable the next line to see a specific menu and it's order positions
  //echo '<pre>'; print_r( $submenu['wbel-before-after-slider'] ); echo '</pre>'; exit();

  $arr = array();

  $arr[] = $submenu['wbel-before-after-slider'][1];
  $arr[] = $submenu['wbel-before-after-slider'][2];
  $arr[] = $submenu['wbel-before-after-slider'][4];
  $arr[] = $submenu['wbel-before-after-slider'][5];
  $arr[] = $submenu['wbel-before-after-slider'][3];

  $submenu['wbel-before-after-slider'] = $arr;

  return $menu_ord;

}

// add the filter to wordpress
add_filter( 'custom_menu_order', 'wbebaic_order_submenu' );