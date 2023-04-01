<?php
add_action('admin_menu', 'wbebaic_menu_page');
function wbebaic_menu_page(){
	global $submenu;

	add_menu_page(
		'Before After Slider for Elementor',
		'Before After Slider for Elementor',
		'manage_options',
		'wbel-before-after-slider',
		'wbel_before_after_slider_callback',
		'dashicons-image-flip-horizontal',
		'59'
	);

	add_submenu_page(
		'wbel-before-after-slider',
		'Custom CSS',
		'Custom CSS',
		'manage_options',
		'wbel-before-after-custom-css',
		'wbel_before_after_slider_css_callback' 
	);

	add_submenu_page(
		'wbel-before-after-slider',
		'Custom JS',
		'Custom JS',
		'manage_options',
		'wbel-before-after-custom-js',
		'wbel_before_after_slider_js_callback' 
	);
	$link_text = '<span class="wpbebaic-up-pro-link" style="font-weight: bold; color: #FCB214">Upgrade To Pro</span>';
			
	$submenu["wbel-before-after-slider"][3] = array( $link_text, 'manage_options' , 'https://plugin-devs.com/product/before-after-slider-for-elementor/' );

	add_submenu_page(
		'wbel-before-after-slider',
		'AddOns',
		'AddOns',
		'manage_options',
		'wbel-before-after-addons',
		'wbel_before_after_slider_addons_callback' 
	);
	
	return $submenu;
}

function wbel_before_after_slider_callback(){}
function wbel_before_after_slider_css_callback(){
	 // The default message that will appear
    $custom_css_default = __( '/*
Welcome to the Custom CSS editor!

Please add all your custom CSS here and avoid modifying the core plugin files. Don\'t use <style> tag
*/');
	    $custom_css = get_option( 'wbebaic_custom_css', $custom_css_default );
?>
	    <div class="wrap">
	        <div id="icon-themes" class="icon32"></div>
	        <h2><?php _e( 'Custom CSS' ); ?></h2>
	        <?php if ( ! empty( $_GET['settings-updated'] ) ) echo '<div id="message" class="updated"><p><strong>' . __( 'Custom CSS updated.' ) . '</strong></p></div>'; ?>
	 
	        <form id="custom_css_form" method="post" action="options.php" style="margin-top: 15px;">
	 
	            <?php settings_fields( 'wbebaic_custom_css' ); ?>
	 
	            <div id="custom_css_container">
	                <div name="wbebaic_custom_css" id="wbebaic_custom_css" style="border: 1px solid #DFDFDF; -moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; width: 100%; height: 400px; position: relative;"></div>
	            </div>
	 
	            <textarea id="custom_css_textarea" name="wbebaic_custom_css" style="display: none;"><?php echo $custom_css; ?></textarea>
	            <p><input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ) ?>" /></p>
	        </form>
	    </div>
<?php
}

function wbel_before_after_slider_js_callback(){
	// The default message that will appear
    $custom_js_default = __( '/*
Welcome to the Custom JS editor!

Please add all your custom JS here and avoid modifying the core plugin files. Don\'t use <script> tag
*/');
	    $custom_css = get_option( 'wbebaic_custom_js', $custom_js_default );
?>
	    <div class="wrap">
	        <div id="icon-themes" class="icon32"></div>
	        <h2><?php _e( 'Custom JS' ); ?> <a href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" class="button" style="background: #FCB214; color: #fff;font-weight: 700">Upgrade to Pro</a></h2>
	        <?php if ( ! empty( $_GET['settings-updated'] ) ) echo '<div id="message" class="updated"><p><strong>' . __( 'Custom JS updated.' ) . '</strong></p></div>'; ?>
	 		<h3>This is a Pro Version feature. You have need to <a href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank">upgrade to the pro</a> version to use this feature.</h3>
	        <form id="custom_js_form" method="post" action="#" onsubmit="return false;" style="margin-top: 15px;">
	 
	            <?php settings_fields( 'wbebaic_custom_js' ); ?>
	 
	            <div id="custom_css_container">
	                <div name="wbebaic_custom_js" id="wbebaic_custom_js" style="border: 1px solid #DFDFDF; -moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius: 3px; width: 100%; height: 400px; position: relative;"></div>
	            </div>
	 
	            <textarea id="custom_js_textarea" name="wbebaic_custom_js" style="display: none;"><?php echo $custom_css; ?></textarea>
	            <p><input type="submit" class="button-primary disabled" value="<?php _e( 'Save Changes' ) ?>" /><a href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" class="button" style="background: #FCB214; color: #fff;font-weight: 700; margin-left: 10px">Upgrade to Pro</a></p>
	        </form>
	    </div>
<?php
}

add_action( 'admin_enqueue_scripts', 'wbebaic_custom_css_js_scripts' );
function wbebaic_custom_css_js_scripts( $hook ) {

    if ( ('before-after-slider-for-elementor_page_wbel-before-after-custom-css' == $hook) || ('before-after-slider-for-elementor_page_wbel-before-after-custom-js' == $hook) ) {
        wp_enqueue_script( 'ace_code_highlighter_js', WB_EBAIC_URL . 'assets/ace/js/ace.js', '', '1.0.0', true );
        wp_enqueue_script( 'ace_mode_css', WB_EBAIC_URL . 'assets/ace/js/mode-css.js', array( 'ace_code_highlighter_js' ), '1.0.0', true );
        wp_enqueue_script( 'ace_mode_js', WB_EBAIC_URL . 'assets/ace/js/mode-javascript.js', array( 'ace_code_highlighter_js' ), '1.0.0', true );
        wp_enqueue_script( 'custom_css_js', WB_EBAIC_URL . 'assets/ace/ace-include.js', array( 'jquery', 'ace_code_highlighter_js' ), '1.0.0', true );
    }
}

add_action( 'admin_init', 'register_custom_css_setting' ); 
function register_custom_css_setting() {
    register_setting( 'wbebaic_custom_css', 'wbebaic_custom_css',  'wbebaic_custom_css_validation');
    register_setting( 'wbebaic_custom_js', 'wbebaic_custom_js');
}

function wbebaic_custom_css_validation( $input ) {
    if ( ! empty( $input['wbebaic_custom_css'] ) )
        $input['wbebaic_custom_css'] = trim( $input['wbebaic_custom_css'] );
    return $input;
}


function wbel_before_after_slider_addons_callback(){
	define( 'wbebaic_addon_url', plugin_dir_url(__FILE__).'addons/' );
	define( 'wbebaic_SCRIPT_DEBUG', true );
	require_once('addons/admin_ui2.php');
}