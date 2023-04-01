<?php
namespace StartoElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Portfolio Classic
 *
 * Elementor widget for portfolio posts
 *
 * @since 1.0.0
 */
class Starto_Pricing_Table extends Widget_Base {

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
		return 'starto-pricing-table';
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
		return __( 'Pricing Table', 'starto-elementor' );
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
		return 'eicon-price-table';
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
		return [ 'switchery', 'starto-elementor' ];
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
				'label' => __( 'Plans', 'starto-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'slide_title',
						'label' => __( 'Title', 'starto-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Title' , 'starto-elementor' ),
					],
					[
						'name' => 'slide_price_month',
						'label' => __( 'Price/Month', 'starto-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( '$10' , 'starto-elementor' ),
					],
					[
						'name' => 'slide_price_year',
						'label' => __( 'Price/Year', 'starto-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( '$99' , 'starto-elementor' ),
					],
					[
						'name' => 'slide_features',
						'label' => __( 'Features', 'starto-elementor' ),
						'description' => __( 'Enter each feature seperate by enter (new line)', 'starto-elementor' ),
						'type' => Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'slide_button_title',
						'label' => __( 'Button Title', 'starto-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Purchase' , 'starto-elementor' ),
					],
					[
						'name' => 'slide_button_link',
						'label' => __( 'Button Link URL', 'starto-elementor' ),
						'type' => Controls_Manager::URL,
						'default' => [
					        'url' => '',
					        'is_external' => '',
					     ],
						'show_external' => true,
					],
					[
						'name' => 'slide_featured',
						'label' => __( 'Mark as Featured Plan', 'starto-elementor' ),
						'type' => Controls_Manager::SWITCHER,
						'default' => 'no',
						'label_on' => __( 'Yes', 'starto-elementor' ),
						'label_off' => __( 'No', 'starto-elementor' ),
						'return_value' => 'yes',
					],
				],
				'title_field' => '{{{ slide_title }}}',
			]
		);

		$this->add_control(
		    'columns',
		    [
		        'label' => __( 'Columns', 'starto-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 3,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 2,
		                'max' => 4,
		                'step' => 1,
		            ]
		        ],
		    ]
		);
		
		$this->add_control(
			'price_switching',
			[
				'label' => __( 'Price Switching', 'starto-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'starto-elementor' ),
				'label_off' => __( 'No', 'starto-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'starto-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 25,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .service-grid-wrapper' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'entrance_animation',
			[
				'label'       => esc_html__( 'Entrance Animation', 'starto-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'slide-up',
			    'options' => [
			     	'slide-up' => __( 'Slide Up', 'starto-elementor' ),
			     	'popout' => __( 'Popout', 'starto-elementor' ),
			     	'fade-in' => __( 'Fade In', 'starto-elementor' ),
			    ]
			]
		);
		
		$this->add_control(
			'disable_animation',
			[
				'label'       => esc_html__( 'Disable entrance animation for', 'starto-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'tablet',
			    'options' => [
			     	'none' => __( 'None', 'starto-elementor' ),
			     	'tablet' => __( 'Mobile and Tablet', 'starto-elementor' ),
			     	'mobile' => __( 'Mobile', 'starto-elementor' ),
			     	'all' => __( 'Disable All', 'starto-elementor' ),
			    ]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_plan_style',
			array(
				'label'      => esc_html__( 'Plan', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_responsive_control(
		    'plan_padding',
		    [
		        'label' => __( 'Plan Content Padding', 'starto-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 60,
		            'unit' => 'px',
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 200,
		                'step' => 5,
		            ]
		        ],
		        'size_units' => [ 'px' ],
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper .inner-wrap' => 'padding: {{SIZE}}{{UNIT}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'plan_bg_color',
		    [
		        'label' => __( 'Plan Background Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper .inner-wrap' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'plan_border_color',
		    [
		        'label' => __( 'Plan Border Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper .inner-wrap' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'plan_hover_bg_color',
		    [
		        'label' => __( 'Plan Hover Background Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper .inner-wrap:hover' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'plan_hover_border_color',
		    [
		        'label' => __( 'Plan Hover Border Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0055FF',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper .inner-wrap:hover' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'plan_featured_bg_color',
		    [
		        'label' => __( 'Featured Plan Background Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper.featured-pricing-plan .inner-wrap' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'plan_featured_border_color',
		    [
		        'label' => __( 'Featured Plan Border Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0055FF',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper.featured-pricing-plan .inner-wrap' => 'border-color: {{VALUE}}',
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
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper h2.pricing-plan-title' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'title_hover_color',
		    [
		        'label' => __( 'Title Hover Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper:hover h2.pricing-plan-title' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'title_featured_color',
		    [
		        'label' => __( 'Featured Plan Title Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper.featured-pricing-plan h2.pricing-plan-title' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .pricing-table-wrapper h2.pricing-plan-title',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_price_style',
			array(
				'label'      => esc_html__( 'Price', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'price_color',
		    [
		        'label' => __( 'Price Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-plan-price-wrap h3.pricing-plan-price' => 'color: {{VALUE}}',
		            '{{WRAPPER}} .pricing-plan-price-wrap' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'price_hover_color',
		    [
		        'label' => __( 'Price Hover Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper:hover h3.pricing-plan-price' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'price_featured_color',
		    [
		        'label' => __( 'Featured Plan Price Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper.featured-pricing-plan h3.pricing-plan-price' => 'color: {{VALUE}}',
		            '{{WRAPPER}} .pricing-table-wrapper.featured-pricing-plan .pricing-plan-unit-month' => 'color: {{VALUE}}',
		            '{{WRAPPER}} .pricing-table-wrapper.featured-pricing-plan .pricing-plan-unit-year' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'label' => __( 'Price Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .pricing-plan-price-wrap h3.pricing-plan-price',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_unit_typography',
				'label' => __( 'Price per Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .pricing-plan-price-wrap .pricing-plan-unit-month, {{WRAPPER}} .pricing-plan-price-wrap .pricing-plan-unit-year',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_features_style',
			array(
				'label'      => esc_html__( 'Features', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'features_color',
		    [
		        'label' => __( 'Features Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper .pricing-plan-content-list' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'features_icon_color',
		    [
		        'label' => __( 'Check Icon Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0055FF',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-plan-content ul.pricing-plan-content-list li:before' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'features_hover_color',
		    [
		        'label' => __( 'Features Hover Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper:hover .pricing-plan-content-list' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'features_featured_color',
		    [
		        'label' => __( 'Featured Plan Features Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-table-wrapper.featured-pricing-plan .pricing-plan-content-list' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'features_typography',
				'label' => __( 'Features Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .pricing-table-wrapper .pricing-plan-content-list',
			]
		);
				
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_button_style',
			array(
				'label'      => esc_html__( 'Button', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'button_color',
		    [
		        'label' => __( 'Button Font Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-plan-content .pricing-plan-button' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'button_bg_color',
		    [
		        'label' => __( 'Button Background Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0055FF',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-plan-content .pricing-plan-button' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'button_border_color',
		    [
		        'label' => __( 'Button Border Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0055FF',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-plan-content .pricing-plan-button' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'button_hover_color',
		    [
		        'label' => __( 'Button Hover Font Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0055FF',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-plan-content .pricing-plan-button:hover' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'button_hover_bg_color',
		    [
		        'label' => __( 'Button Hover Background Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-plan-content .pricing-plan-button:hover' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'button_hover_border_color',
		    [
		        'label' => __( 'Button Hover Border Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0055FF',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-plan-content .pricing-plan-button:hover' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __( 'Button Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .pricing-plan-content .pricing-plan-button',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_switching_style',
			array(
				'label'      => esc_html__( 'Switching', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'switching_button_color',
		    [
		        'label' => __( 'Switching Button Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#0055FF',
		    ]
		);
		
		$this->add_control(
		    'switching_bg_color',
		    [
		        'label' => __( 'Switching Background Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#E7E7E7',
		    ]
		);
		
		$this->add_control(
		    'switching_font_color',
		    [
		        'label' => __( 'Switching Font Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .pricing-plan-switch-wrap' => 'color: {{VALUE}}',
		        ],
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
		include(STARTO_ELEMENTOR_PATH.'templates/pricing-table/index.php');
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
