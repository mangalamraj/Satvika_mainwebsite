<?php
namespace StartoElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Distortion Grid
 *
 * @since 1.0.0
 */
class Starto_Distortion_Grid extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'starto-distortion-grid';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Distortion Hover Grid', 'starto-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-columns';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'starto-theme-widgets-category' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'imagesloaded', 'three', 'tweenmax', 'hover', 'starto-elementor' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'starto-elementor' ),
			]
		);
		
		$this->add_control(
			'slides',
			[
				'label' => __( 'Slides', 'starto-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'slide_title' => 'Superior Room',
						'slide_subtitle' => 'From $199',
						'slide_link_title' => 'Book Now',
					],
				],
				'fields' => [
					[
						'name' => 'slide_image',
						'label' => __( 'Image', 'starto-elementor' ),
						'type' => Controls_Manager::MEDIA,
						'label_block' => true,
					],
					[
						'name' => 'slide_image_hover',
						'label' => __( 'Image on hover', 'starto-elementor' ),
						'type' => Controls_Manager::MEDIA,
						'label_block' => true,
					],
					[
						'name' => 'slide_title',
						'label' => __( 'Title', 'starto-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Title' , 'starto-elementor' ),
					],
					[
						'name' => 'slide_subtitle',
						'label' => __( 'Sub Title', 'starto-elementor' ),
						'type' => Controls_Manager::TEXT,
					],
					[
						'name' => 'slide_excerpt',
						'label' => __( 'Excerpt', 'starto-elementor' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => __( 'Excerpt' , 'starto-elementor' ),
					],
					[
						'name' => 'slide_link_title',
						'label' => __( 'Link Title', 'starto-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Link Title' , 'starto-elementor' ),
					],
					[
						'name' => 'slide_link',
						'label' => __( 'Link URL', 'starto-elementor' ),
						'type' => Controls_Manager::URL,
						'default' => [
					        'url' => '',
					        'is_external' => '',
					     ],
						'show_external' => true,
					],
				],
				'title_field' => '{{{ slide_title }}}',
			]
		);
		
		$this->add_control(
		  'theme',
		  [
		     'label'       => __( 'Theme', 'starto-elementor' ),
		     'type' => Controls_Manager::SELECT,
		     'default' => 1,
		     'options' => [
			   1 => __( 'Theme 1', 'starto-elementor' ),
			   2 => __( 'Theme 2', 'starto-elementor' ),
			   3 => __( 'Theme 3', 'starto-elementor' ),
			   4 => __( 'Theme 4', 'starto-elementor' ),
			   5 => __( 'Theme 5', 'starto-elementor' ),
			   6 => __( 'Theme 6', 'starto-elementor' ),
			   7 => __( 'Theme 7', 'starto-elementor' ),
			   8 => __( 'Theme 8', 'starto-elementor' ),
			   9 => __( 'Theme 9', 'starto-elementor' ),
			   10 => __( 'Theme 10', 'starto-elementor' ),
			],
		  ]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_title_style',
			array(
				'label'      => esc_html__( 'Title', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'title_color',
		    [
		        'label' => __( 'Title Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} h2.distortion-grid-item-title' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .distortion-grid-item-content h2.distortion-grid-item-title',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_subtitle_style',
			array(
				'label'      => esc_html__( 'Sub Title', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'subtitle_color',
		    [
		        'label' => __( 'Sub Title Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .distortion-grid-item-meta' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => __( 'Sub Title Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} span.distortion-grid-item-meta',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_excerpt_style',
			array(
				'label'      => esc_html__( 'Excerpt', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'excerpt_color',
		    [
		        'label' => __( 'Excerpt Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .distortion-grid-item-subtitle span' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'label' => __( 'Excerpt Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} div.distortion-grid-item-subtitle span',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_link_style',
			array(
				'label'      => esc_html__( 'Link', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'link_color',
		    [
		        'label' => __( 'Link Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .distortion-grid-item-link' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'link_hover_color',
		    [
		        'label' => __( 'Link Hover Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .distortion-grid-item-link:focus, {{WRAPPER}} .distortion-grid-item-link:hover' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'label' => __( 'Link Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} a.distortion-grid-item-link',
			]
		);
		
		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		include(STARTO_ELEMENTOR_PATH.'templates/distortion-grid/index.php');
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		return '';
	}
}
