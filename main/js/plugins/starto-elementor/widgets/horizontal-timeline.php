<?php
namespace StartoElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Blog Posts
 *
 * Elementor widget for blog posts
 *
 * @since 1.0.0
 */
class Starto_Horizontal_Timeline extends Widget_Base {

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
		return 'starto-horizontal-timeline';
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
		return __( 'Horizontal Timeline', 'starto-elementor' );
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
		return 'eicon-post-slider';
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
		return [ 'starto-elementor' ];
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
				'fields' => [
					[
						'name' => 'slide_date',
						'label' => __( 'Date', 'starto-elementor' ),
						'type' => Controls_Manager::DATE_TIME,
						'default' => __( '2018' , 'starto-elementor' ),
						'picker_options' => [
				            'enableTime' => false,
				            'allowInput' => true,
				        ],
					],
					[
						'name' => 'slide_date_format',
						'label' => __( 'Display Date Format', 'starto-elementor' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'Y',
					    'options' => [
					     	'Y' => __( 'Year Only', 'starto-elementor' ),
					     	'M' => __( 'Month Only', 'starto-elementor' ),
					     	'd M' => __( 'Date & Month', 'starto-elementor' ),
					     	'M Y' => __( 'Month & Year', 'starto-elementor' ),
					     	'd M Y' => __( 'Date & Month and Year', 'starto-elementor' ),
					    ],
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
						'default' => __( 'Sub Title' , 'starto-elementor' ),
					],
					[
						'name' => 'slide_description',
						'label' => __( 'Description', 'starto-elementor' ),
						'type' => Controls_Manager::WYSIWYG,
					],
				],
				'title_field' => '{{{ slide_title }}}',
			]
		);
		
		$this->add_control(
		    'timeline_spacing',
		    [
		        'label' => __( 'Timeline Spacing', 'architecturer-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 60,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 10,
		                'max' => 500,
		                'step' => 5,
		            ],
		        ],
		        'size_units' => [ 'px' ]
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
		        'label' => __( 'Title font Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .cd-horizontal-timeline .events-content h2' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} div.cd-horizontal-timeline .events-content h2',
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
		        'label' => __( 'Sub Title font Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#888888',
		        'selectors' => [
		            '{{WRAPPER}} div.cd-horizontal-timeline .events-content em' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => __( 'Sub Title Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .cd-horizontal-timeline .events-content em',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content_style',
			array(
				'label'      => esc_html__( 'Content', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'content_font_color',
		    [
		        'label' => __( 'Content font Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .cd-horizontal-timeline .events-content li .events-content-desc' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Content Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} div.cd-horizontal-timeline .events-content li .events-content-desc',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_navigation_style',
			array(
				'label'      => esc_html__( 'Navigation', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'nav_color',
		    [
		        'label' => __( 'Navigation Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#e7e7e7',
		        'selectors' => [
		            '{{WRAPPER}} .cd-horizontal-timeline .events' => 'background: {{VALUE}}',
		            '{{WRAPPER}} .cd-horizontal-timeline .events a::after' => 'border-color: {{VALUE}}',
		            '{{WRAPPER}} .cd-timeline-navigation a' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_active_color',
		    [
		        'label' => __( 'Navigation Active Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .cd-horizontal-timeline .filling-line' => 'background-color: {{VALUE}}',
		             '{{WRAPPER}} .cd-horizontal-timeline .events a.selected::after' => 'background-color: {{VALUE}}',
		             '{{WRAPPER}} .cd-horizontal-timeline div.events a.selected::after' => 'border-color: {{VALUE}}',
		             '{{WRAPPER}} .cd-horizontal-timeline .events a.older-event::after' => 'border-color: {{VALUE}}',
		             '{{WRAPPER}} .cd-timeline-navigation a:hover' => 'border-color: {{VALUE}}',
		             '{{WRAPPER}} .cd-timeline-navigation a.prev:hover:after' => 'color: {{VALUE}}',
		             '{{WRAPPER}} .cd-timeline-navigation a.next:hover:after' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_label_color',
		    [
		        'label' => __( 'Navigation Label Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .cd-horizontal-timeline .events a' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'nav_label_typography',
				'label' => __( 'Navigation Label Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .cd-horizontal-timeline div.events a',
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
		include(STARTO_ELEMENTOR_PATH.'templates/horizontal-timeline/index.php');
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
