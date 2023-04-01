<?php
namespace WB_EBAIC\Before_After_Slider;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
/**
 * Elementor Before After Image Comparison Slider Widget.
 *
 * Main widget that create the before after image slider widget
 *
 * @since 1.0.0
*/
class WB_Elementor_Before_After extends \Elementor\Widget_Base
{

	/**
	 * Get widget name
	 *
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'wb-before-after-image-slider-elementor';
	}

	/**
	 * Get widget title
	 *
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html( 'Before After Image Comparison Slider', 'elementor-before-after-image-slider' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-columns';
	}

	/**
	 * Retrieve the widget category.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_categories() {
		return [ 'web-builder-element' ];
	}

	/**
	 * Retrieve the widget category.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_name',
			[
				'label' => esc_html( 'Before After Slider', 'elementor-before-after-image-slider' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'before_image',
			[
				'label' => esc_html( 'Before Image', 'elementor-before-after-image-slider' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'after_image',
			[
				'label' => esc_html( 'After Image', 'elementor-before-after-image-slider' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'full',
			]
		);

		$this->add_control(
			'more_feature_two',
			[
				'label' => esc_html__( 'Orientation:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				// 'description' => 'Choose Horizontal or Vertical Orientation of the Slider. Default is Horizontal. <a href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank">Upgrade to Pro</a> to use the <strong>Vertical</strong> Orientation.',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'more_feature_three',
			[
				'label' => esc_html__( 'Click to Move:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				// 'description' => 'Click anywhere on the slider to move the comparison handle.  <a href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank">Upgrade to Pro</a> to use this',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'more_feature_4',
			[
				'label' => esc_html__( 'Move on Hover:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				// 'description' => 'Move the handle on mouse hover instead of Drag the handler <a href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank">Upgrade to Pro</a> to use this',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'more_feature_five',
			[
				'label' => esc_html__( 'Default Offset:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				// 'description' => 'Move the handle on mouse hover instead of Drag the handler <a href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank">Upgrade to Pro</a> to use this',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'more_feature_six',
			[
				'label' => esc_html__( 'Overlay on Mouse Hover:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				// 'description' => 'Move the handle on mouse hover instead of Drag the handler <a href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank">Upgrade to Pro</a> to use this',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'more_feature_one',
			[
				'label' => esc_html__( 'Need More Options:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'before_text_configuration',
			[
				'label' => esc_html( 'Before Label', 'news-ticker-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'more_feature_seven',
			[
				'label' => esc_html__( 'Before Text:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'more_feature_eight',
			[
				'label' => esc_html__( 'Before Text Color:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'more_feature_nine',
			[
				'label' => esc_html__( 'Before Text Background:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'after_text_configuration',
			[
				'label' => esc_html( 'After Label', 'news-ticker-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'more_feature_10',
			[
				'label' => esc_html__( 'After Text:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'more_feature_11',
			[
				'label' => esc_html__( 'After Text Color:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->add_control(
			'more_feature_12',
			[
				'label' => esc_html__( 'After Text Background:', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => false,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html( 'Customize Style', 'news-ticker-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'more_feature_four',
			[
				'label' => __( 'You can <a style=" font-size: 12px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >customize the slider styles</a> fully with the <a style=" font-size: 12px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Pro Version</a>', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => true,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px; height: 100%; display: block; line-height: 28px;" href="https://plugin-devs.com/product/before-after-slider-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$element_id = $this->get_id();
		//print_r($settings);
?>
		<div class="wb_ebais_twentytwenty_container twentytwenty-container" id="wb_before_after_<?php echo esc_attr($element_id); ?>">
			<span class='before_text'><?php echo __('Before', 'before-after-image-comparison-slider-for-elementor'); ?></span>
			<span class='after_text'><?php echo __('After', 'before-after-image-comparison-slider-for-elementor'); ?></span>
<?php
			echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'before_image' );
			echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'after_image' );

?>
		</div>
		<style>
			#wb_before_after_<?php echo esc_attr($element_id); ?>{
				max-width: auto;
			}
		</style>
<?php
	}

	protected function _content_template() {}
}