<?php
namespace WB_EBAIC;
use WB_EBAIC\Before_After_Slider;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class WB_Elementor_BAIC_Main {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.4';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var WB_Elementor_BAIC_Main The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return WB_Elementor_BAIC_Main An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	public function wb_ebaic_plugin_action_links( $links, $file, $data ){
		if ( isset($data['slug']) && $data['slug'] === 'before-after-image-comparison-slider-for-elementor' ) {
			$new_links = array(
					'review' => '<a href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" class="wb-ebaic-color-red" ><b class="wb-ebaic-extra-bold wb-ebaic-font-16" >Upgrade to Pro</b></a>',
					);
			
			$links = array_merge( $links, $new_links );
		}
		
		return $links;
	}


	public function wb_ebaic_plugin_row_meta( $links, $file, $data ){
		if ( isset($data['slug']) && $data['slug'] === 'before-after-image-comparison-slider-for-elementor' ) {
			$new_links = array(
					'review' => '<a href="https://wordpress.org/support/plugin/before-after-image-comparison-slider-for-elementor/reviews/?rate=5#new-post" target="_blank" class="wb-ebaic-color-red" style="color: #e49b00;"><strong class="wb-ebaic-extra-bold wb-ebaic-font-16">Leave a Review</strong></a>',
					);
			
			$links = array_merge( $links, $new_links );
		}
		
		return $links;
	}
	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by 'plugins_loaded' action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		$this->add_actions();


	}

	/**
	 * Add Actions
	 * 
	 * Call all Essential Action hooks from here
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function add_actions(){
		add_filter( 'plugin_action_links', [ $this, 'wb_ebaic_plugin_action_links'], 10, 3 );
		add_filter( 'plugin_row_meta', [ $this, 'wb_ebaic_plugin_row_meta'], 10, 3 );
		add_action( 'admin_notices', [ $this, 'leave_a_review' ] );

		// Enqueue Styles
		add_action( 'admin_enqueue_scripts',  [ $this, 'admin_scripts_styles' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'enqueue_styles' ] );

		// Enqueue Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'enqueue_scripts' ] );
		
		// Register widget
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

		// Wordpress Ajax
		add_action( 'wp_ajax_wb_ebaic_review_transient', [$this, 'wb_ebaic_review_transient'] );
	}

	public function wb_ebaic_review_transient()
	{
		if ( is_admin() ) {
			$wb_ebaic_review_transient = get_transient('wb_ebaic_review_transient');
			$wb_ebaic_review_option = get_option('wb_ebaic_review_transient');
			if( $wb_ebaic_review_transient  != 'reviewed' ){
				if( set_transient('wb_ebaic_review_transient', 'reviewed', 1*YEAR_IN_SECONDS ) ){
					echo 'already_reviewed';
				}
			}
			if( $wb_ebaic_review_option  != 'reviewed' ){
				if( add_option('wb_ebaic_review_transient', 'reviewed' ) ){
					echo 'already_reviewed';
				}
			}
			wp_die();
		}
	}
	/**
	 * Register Widget
	 * 
	 * Register Elementor Before After Image Comparison Slider From Here
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function register_widgets() {

		$this->includes();
		$this->register_slider_widgets();
	}

	/**
	 * Admin notice
	 *
	 * Request for leave a review
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function leave_a_review() {
		// delete_transient('wb_ebaic_review_transient');
		// delete_option('wb_ebaic_review_transient');
		$wb_ebaic_review_transient = get_transient('wb_ebaic_review_transient');
		$wb_ebaic_review_option = get_option('wb_ebaic_review_transient');
		if( $wb_ebaic_review_transient  != 'reviewed' && $wb_ebaic_review_option != 'reviewed' ){
	?>
			<div class="notice notice-error">
				<p class="wb-ebaic-font-16">Can you please let us know your thoughts about <strong>Before After Image Comparison Slider for Elementor</strong>, so that we can improve it</p>
				<p>
					<a class="wb-ebaic-color-red wb-ebaic-extra-bold wb-ebaic-font-16 text-decoration-none" target="_blank" href="https://wordpress.org/support/plugin/before-after-image-comparison-slider-for-elementor/reviews/?rate=5#new-post">Leave a Review</a>
					<span class="wb-ebaic-color-blue wb-ebaic-font-16 wb-ebaic-mx-10">|</span>
					<a class="wb-ebaic-already-reviewed wb-ebaic-bold text-decoration-none" href="#">Already Reviewed</a>
				</p>
			</div>
	<?php
		}
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ){ unset( $_GET['activate'] ); }

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html( '"%1$s" requires "%2$s" to be installed and activated.', 'elementor-before-after-image-slider' ),
			'<strong>' . esc_html( 'Elementor Before After Image Comparison', 'elementor-before-after-image-slider' ) . '</strong>',
			'<strong>' . esc_html( 'Elementor', 'elementor-before-after-image-slider' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-before-after-image-slider' ),
			'<strong>' . esc_html( 'Elementor Before After Image Comparison', 'elementor-before-after-image-slider' ) . '</strong>',
			'<strong>' . esc_html( 'Elementor', 'elementor-before-after-image-slider' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-before-after-image-slider' ),
			'<strong>' . esc_html( 'Elementor Before After Image Comparison', 'elementor-before-after-image-slider' ) . '</strong>',
			'<strong>' . esc_html( 'PHP', 'elementor-before-after-image-slider' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Enqueue Styles
	 * 
	 * Load all required stylesheets
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function enqueue_styles(){

		wp_enqueue_style( 'wb-elementor-before-after-slider', WB_EBAIC_URL . '/assets/css/twentytwenty.css', array(), '1.0.0', 'all' );
	}

	/**
	 * Enqueue Admin Styles and Scripts
	 * 
	 * Load Admin stylesheets and scripts
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_scripts_styles(){

		wp_enqueue_style( 'wb-elementor-admin-style', WB_EBAIC_URL . '/assets/css/admin.css', array(), '1.0.0', 'all' );
		
		wp_enqueue_script( 'wb-elementor-admin-script', WB_EBAIC_URL . '/assets/js/admin.js', array('jquery'), '1.0.0', 'all' );

		wp_localize_script( 'wb-elementor-admin-script', 'wb_ebaic_ajax_object',
            array(
            	'ajax_url' => admin_url( 'admin-ajax.php' ),
            ) 
        );
	}

	/**
	 * Enqueue Scripts
	 * 
	 * Load all required scripts
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function enqueue_scripts(){

		wp_enqueue_script( 'wb-elementor-before-after-slider-event-move', WB_EBAIC_URL . '/assets/js/jquery.event.move.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'wb-elementor-before-after-slider-library', WB_EBAIC_URL . '/assets/js/jquery.twentytwenty.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'wb-elementor-before-after-slider-main', WB_EBAIC_URL . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true );
	}

	/**
	 * Include Files
	 *
	 * Load widgets php files.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function includes() {

		require_once( WB_EBAIC_PATH . '/widgets/before-after.php' );

	}

	/**
	 * Register Slider Widget
	 *
	 * Register the Slider Widget from here
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function register_slider_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Before_After_Slider\WB_Elementor_Before_After() );
	}

}

WB_Elementor_BAIC_Main::instance();