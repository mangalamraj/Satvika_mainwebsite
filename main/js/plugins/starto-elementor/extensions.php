<?php

/**
 * Class description
 *
 * @package   package_name
 * @author    ThemeG
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Starto_Ext' ) ) {

	/**
	 * Define Starto_Ext class
	 */
	class Starto_Ext {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    object
		 */
		private static $instance = null;

		/**
		 * Init Handler
		 */
		public function init() {
			add_action( 'elementor/element/column/section_advanced/after_section_end', [ $this, 'widget_tab_advanced_add_section' ], 10, 2 );

			add_action( 'elementor/element/common/_section_style/after_section_end', array( $this, 'widget_tab_advanced_add_section' ), 10, 2 );
		}

		/**
		 * [widget_tab_advanced_add_section description]
		 * @param  [type] $element [description]
		 * @param  [type] $args    [description]
		 * @return [type]          [description]
		 */
		public function widget_tab_advanced_add_section( $element, $args ) {

			$element->start_controls_section(
				'starto_ext_animation_section',
				[
					'label' => esc_html__( 'Custom Animation', 'starto-elementor' ),
					'tab'   => Elementor\Controls_Manager::TAB_ADVANCED,
				]
			);

			$element->add_control(
				'starto_ext_is_scrollme',
				[
					'label'        => esc_html__( 'Scroll Animation', 'starto-elementor' ),
					'description'  => esc_html__( 'Add animation to element when scrolling through page contents', 'starto-elementor' ),
					'type'         => Elementor\Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'Yes', 'starto-elementor' ),
					'label_off'    => esc_html__( 'No', 'starto-elementor' ),
					'return_value' => 'true',
					'default'      => 'false',
					'frontend_available' => true,
				]
			);

			$element->add_control(
				'starto_ext_scrollme_disable',
				[
					'label'       => esc_html__( 'Disable for', 'starto-elementor' ),
					'type' => Elementor\Controls_Manager::SELECT,
					'default' => 'mobile',
				    'options' => [
				     	'none' => __( 'None', 'starto-elementor' ),
				     	'tablet' => __( 'Mobile and Tablet', 'starto-elementor' ),
				     	'mobile' => __( 'Mobile', 'starto-elementor' ),
				    ],
					'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
				]
			);
			
			/*$element->add_control(
				'starto_ext_scrollme_easing',
				[
					'label'       => esc_html__( 'Easing', 'starto-elementor' ),
					'type' => Elementor\Controls_Manager::SELECT,
					'default' => 'swing',
				    'options' => [
					    'swing' => __( 'swing', 'starto-elementor' ),
				     	'easeInQuad' => __( 'easeInQuad', 'starto-elementor' ),
				     	'easeInCubic' => __( 'easeInCubic', 'starto-elementor' ),
				     	'easeInQuart' => __( 'easeInQuart', 'starto-elementor' ),
				     	'easeInQuint' => __( 'easeInQuint', 'starto-elementor' ),
				     	'easeInSine' => __( 'easeInSine', 'starto-elementor' ),
				     	'easeInExpo' => __( 'easeInExpo', 'starto-elementor' ),
				     	'easeInCirc' => __( 'easeInCirc', 'starto-elementor' ),
				     	'easeInBack' => __( 'easeInBack', 'starto-elementor' ),
				     	'easeInElastic' => __( 'easeInElastic', 'starto-elementor' ),
				     	'easeInBounce' => __( 'easeInBounce', 'starto-elementor' ),
				     	'easeOutQuad' => __( 'easeOutQuad', 'starto-elementor' ),
				     	'easeOutCubic' => __( 'easeOutCubic', 'starto-elementor' ),
				     	'easeOutQuart' => __( 'easeOutQuart', 'starto-elementor' ),
				     	'easeOutQuint' => __( 'easeOutQuint', 'starto-elementor' ),
				     	'easeOutSine' => __( 'easeOutSine', 'starto-elementor' ),
				     	'easeOutExpo' => __( 'easeOutExpo', 'starto-elementor' ),
				     	'easeOutCirc' => __( 'easeOutCirc', 'starto-elementor' ),
				     	'easeOutBack' => __( 'easeOutBack', 'starto-elementor' ),
				     	'easeOutElastic' => __( 'easeOutElastic', 'starto-elementor' ),
				     	'easeOutBounce' => __( 'easeOutBounce', 'starto-elementor' ),
				     	'easeInOutQuad' => __( 'easeInOutQuad', 'starto-elementor' ),
				     	'easeInOutCubic' => __( 'easeInOutCubic', 'starto-elementor' ),
				     	'easeInOutQuart' => __( 'easeInOutQuart', 'starto-elementor' ),
				     	'easeInOutQuint' => __( 'easeInOutQuint', 'starto-elementor' ),
				     	'easeInOutSine' => __( 'easeInOutSine', 'starto-elementor' ),
				     	'easeInOutExpo' => __( 'easeInOutExpo', 'starto-elementor' ),
				     	'easeInOutCirc' => __( 'easeInOutCirc', 'starto-elementor' ),
				     	'easeInOutBack' => __( 'easeInOutBack', 'starto-elementor' ),
				     	'easeInOutElastic' => __( 'easeInOutElastic', 'starto-elementor' ),
				     	'easeInOutBounce' => __( 'easeInOutBounce', 'starto-elementor' ),
				    ],
					'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
				]
			);*/
			
			$element->add_control(
			    'starto_ext_scrollme_smoothness',
			    [
			        'label' => __( 'Smoothness', 'starto-elementor' ),
			        'description' => __( 'factor that slowdown the animation, the more the smoothier', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 30,
			        ],
			        'range' => [
			            'px' => [
			                'min' => 0,
			                'max' => 100,
			                'step' => 5,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			/*$element->add_control(
				'starto_ext_scrollme_duration',
				[
					'label' => __( 'Animation Duration (ms)', 'starto-elementor' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 5,
					'max' => 5000,
					'step' => 5,
					'default' => 400,
					'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => false,
					'selectors' => [
			            '.elementor-widget.elementor-element-{{ID}}' => 'transition-duration: {{VALUE}}ms !important',
			        ],
				]
			);*/
			
			$element->add_control(
			    'starto_ext_scrollme_scalex',
			    [
			        'label' => __( 'Scale X', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 1,
			        ],
			        'range' => [
			            'px' => [
			                'min' => 0.1,
			                'max' => 2,
			                'step' => 0.1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_scrollme_scaley',
			    [
			        'label' => __( 'Scale Y', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 1,
			        ],
			        'range' => [
			            'px' => [
			                'min' => 0.1,
			                'max' => 2,
			                'step' => 0.1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_scrollme_scalez',
			    [
			        'label' => __( 'Scale Z', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 1,
			        ],
			        'range' => [
			            'px' => [
			                'min' => 0.1,
			                'max' => 2,
			                'step' => 0.1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
		
			$element->add_control(
			    'starto_ext_scrollme_rotatex',
			    [
			        'label' => __( 'Rotate X', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -360,
			                'max' => 360,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_scrollme_rotatey',
			    [
			        'label' => __( 'Rotate Y', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -360,
			                'max' => 360,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_scrollme_rotatez',
			    [
			        'label' => __( 'Rotate Z', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -360,
			                'max' => 360,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_scrollme_translatex',
			    [
			        'label' => __( 'Translate X', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -1000,
			                'max' => 1000,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_scrollme_translatey',
			    [
			        'label' => __( 'Translate Y', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -1000,
			                'max' => 1000,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_scrollme_translatez',
			    [
			        'label' => __( 'Translate Z', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -1000,
			                'max' => 1000,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_scrollme' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
				'starto_ext_is_smoove',
				[
					'label'        => esc_html__( 'Entrance Animation', 'starto-elementor' ),
					'description'  => esc_html__( 'Add custom entrance animation to element', 'starto-elementor' ),
					'type'         => Elementor\Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'Yes', 'starto-elementor' ),
					'label_off'    => esc_html__( 'No', 'starto-elementor' ),
					'return_value' => 'true',
					'default'      => 'false',
					'frontend_available' => true,
				]
			);

			$element->add_control(
				'starto_ext_smoove_disable',
				[
					'label'       => esc_html__( 'Disable for', 'starto-elementor' ),
					'type' => Elementor\Controls_Manager::SELECT,
					'default' => 1,
				    'options' => [
				     	1 => __( 'None', 'starto-elementor' ),
				     	769 => __( 'Mobile and Tablet', 'starto-elementor' ),
				     	415 => __( 'Mobile', 'starto-elementor' ),
				    ],
					'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
				]
			);
			
			$element->add_control(
				'starto_ext_smoove_easing',
				[
					'label'       => esc_html__( 'Easing', 'starto-elementor' ),
					'type' => Elementor\Controls_Manager::SELECT,
					'default' => '0.250, 0.250, 0.750, 0.750',
				    'options' => [
					    '0.250, 0.250, 0.750, 0.750' => __( 'linear', 'starto-elementor' ),
				     	'0.250, 0.100, 0.250, 1.000' => __( 'ease', 'starto-elementor' ),
				     	'0.420, 0.000, 1.000, 1.000' => __( 'ease-in', 'starto-elementor' ),
				     	'0.000, 0.000, 0.580, 1.000' => __( 'ease-out', 'starto-elementor' ),
				     	'0.420, 0.000, 0.580, 1.000' => __( 'ease-in-out', 'starto-elementor' ),
				     	'0.550, 0.085, 0.680, 0.530' => __( 'easeInQuad', 'starto-elementor' ),
				     	'0.550, 0.055, 0.675, 0.190' => __( 'easeInCubic', 'starto-elementor' ),
				     	'0.895, 0.030, 0.685, 0.220' => __( 'easeInQuart', 'starto-elementor' ),
				     	'0.755, 0.050, 0.855, 0.060' => __( 'easeInQuint', 'starto-elementor' ),
				     	'0.470, 0.000, 0.745, 0.715' => __( 'easeInSine', 'starto-elementor' ),
				     	'0.950, 0.050, 0.795, 0.035' => __( 'easeInExpo', 'starto-elementor' ),
				     	'0.600, 0.040, 0.980, 0.335' => __( 'easeInCirc', 'starto-elementor' ),
				     	'0.600, -0.280, 0.735, 0.045' => __( 'easeInBack', 'starto-elementor' ),
				     	'0.250, 0.460, 0.450, 0.940' => __( 'easeOutQuad', 'starto-elementor' ),
				     	'0.215, 0.610, 0.355, 1.000' => __( 'easeOutCubic', 'starto-elementor' ),
				     	'0.165, 0.840, 0.440, 1.000' => __( 'easeOutQuart', 'starto-elementor' ),
				     	'0.230, 1.000, 0.320, 1.000' => __( 'easeOutQuint', 'starto-elementor' ),
				     	'0.390, 0.575, 0.565, 1.000' => __( 'easeOutSine', 'starto-elementor' ),
				     	'0.190, 1.000, 0.220, 1.000' => __( 'easeOutExpo', 'starto-elementor' ),
				     	'0.075, 0.820, 0.165, 1.000' => __( 'easeOutCirc', 'starto-elementor' ),
				     	'0.175, 0.885, 0.320, 1.275' => __( 'easeOutBack', 'starto-elementor' ),
				     	'0.455, 0.030, 0.515, 0.955' => __( 'easeInOutQuad', 'starto-elementor' ),
				     	'0.645, 0.045, 0.355, 1.000' => __( 'easeInOutCubic', 'starto-elementor' ),
				     	'0.770, 0.000, 0.175, 1.000' => __( 'easeInOutQuart', 'starto-elementor' ),
				     	'0.860, 0.000, 0.070, 1.000' => __( 'easeInOutQuint', 'starto-elementor' ),
				     	'0.445, 0.050, 0.550, 0.950' => __( 'easeInOutSine', 'starto-elementor' ),
				     	'1.000, 0.000, 0.000, 1.000' => __( 'easeInOutExpo', 'starto-elementor' ),
				     	'0.785, 0.135, 0.150, 0.860' => __( 'easeInOutCirc', 'starto-elementor' ),
				     	'0.680, -0.550, 0.265, 1.550' => __( 'easeInOutBack', 'starto-elementor' ),
				    ],
					'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => false,
					'selectors' => [
			            '.elementor-element.elementor-element-{{ID}}' => 'transition-timing-function: cubic-bezier({{VALUE}}) !important',
			        ],
				]
			);
			
			$element->add_control(
				'starto_ext_smoove_delay',
				[
					'label' => __( 'Animation Delay (ms)', 'starto-elementor' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 5000,
					'step' => 5,
					'default' => 0,
					'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => false,
					'selectors' => [
			            '.elementor-element.elementor-element-{{ID}}' => 'transition-delay: {{VALUE}}ms !important',
			        ],
				]
			);
			
			$element->add_control(
				'starto_ext_smoove_duration',
				[
					'label' => __( 'Animation Duration (ms)', 'starto-elementor' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 5,
					'max' => 5000,
					'step' => 5,
					'default' => 400,
					'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
					/*'selectors' => [
			            '.elementor-widget.elementor-element-{{ID}}' => 'transition-duration: {{VALUE}}ms !important',
			        ],*/
				]
			);
			
			$element->add_control(
			    'starto_ext_smoove_opacity',
			    [
			        'label' => __( 'Opacity', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => 0,
			                'max' => 1,
			                'step' => 0.1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => false,
					'selectors' => [
			            '.elementor-widget.elementor-element-{{ID}}' => 'opacity: {{SIZE}}',
			        ],
			    ]
			);
			
			$element->add_control(
			    'starto_ext_smoove_scalex',
			    [
			        'label' => __( 'Scale X', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 1,
			        ],
			        'range' => [
			            'px' => [
			                'min' => 0.1,
			                'max' => 2,
			                'step' => 0.1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_smoove_scaley',
			    [
			        'label' => __( 'Scale Y', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 1,
			        ],
			        'range' => [
			            'px' => [
			                'min' => 0.1,
			                'max' => 2,
			                'step' => 0.1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_smoove_rotatex',
			    [
			        'label' => __( 'Rotate X', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -360,
			                'max' => 360,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_smoove_rotatey',
			    [
			        'label' => __( 'Rotate Y', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -360,
			                'max' => 360,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_smoove_rotatez',
			    [
			        'label' => __( 'Rotate Z', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -360,
			                'max' => 360,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_smoove_translatex',
			    [
			        'label' => __( 'Translate X', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -1000,
			                'max' => 1000,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_smoove_translatey',
			    [
			        'label' => __( 'Translate Y', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -1000,
			                'max' => 1000,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_smoove_translatez',
			    [
			        'label' => __( 'Translate Z', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => -1000,
			                'max' => 1000,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_smoove_skewx',
			    [
			        'label' => __( 'Skew X', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => 0,
			                'max' => 360,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_smoove_skewy',
			    [
			        'label' => __( 'Skew Y', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0,
			        ],
			        'range' => [
			            'px' => [
			                'min' => 0,
			                'max' => 360,
			                'step' => 1,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
			    'starto_ext_smoove_perspective',
			    [
			        'label' => __( 'Perspective', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 1000,
			        ],
			        'range' => [
			            'px' => [
			                'min' => 5,
			                'max' => 4000,
			                'step' => 5,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_smoove' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
				'starto_ext_is_parallax_mouse',
				[
					'label'        => esc_html__( 'Mouse Parallax', 'starto-elementor' ),
					'description'  => esc_html__( 'Add parallax to element when moving mouse position', 'starto-elementor' ),
					'type'         => Elementor\Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'Yes', 'starto-elementor' ),
					'label_off'    => esc_html__( 'No', 'starto-elementor' ),
					'return_value' => 'true',
					'default'      => 'false',
					'frontend_available' => true,
				]
			);
			
			$element->add_control(
			    'starto_ext_is_parallax_mouse_depth',
			    [
			        'label' => __( 'Depth', 'starto-elementor' ),
			        'type' => Elementor\Controls_Manager::SLIDER,
			        'default' => [
			            'size' => 0.2,
			        ],
			        'range' => [
			            'px' => [
			                'min' => 0.1,
			                'max' => 2,
			                'step' => 0.05,
			            ]
			        ],
			        'size_units' => [ 'px' ],
			        'condition' => [
						'starto_ext_is_parallax_mouse' => 'true',
					],
					'frontend_available' => true,
			    ]
			);
			
			$element->add_control(
				'starto_ext_is_infinite',
				[
					'label'        => esc_html__( 'Infinite Animation', 'starto-elementor' ),
					'description'  => esc_html__( 'Add custom infinite animation to element', 'starto-elementor' ),
					'type'         => Elementor\Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'Yes', 'starto-elementor' ),
					'label_off'    => esc_html__( 'No', 'starto-elementor' ),
					'return_value' => 'true',
					'default'      => 'false',
					'frontend_available' => true,
				]
			);
			
			$element->add_control(
				'starto_ext_infinite_animation',
				[
					'label'       => esc_html__( 'Easing', 'starto-elementor' ),
					'type' => Elementor\Controls_Manager::SELECT,
					'default' => 'if_bounce',
				    'options' => [
					    'if_swing1' => __( 'Swing 1', 'starto-elementor' ),
					    'if_swing2' => __( 'Swing 2', 'starto-elementor' ),
				     	'if_wave' 	=> __( 'Wave', 'starto-elementor' ),
				     	'if_tilt' 	=> __( 'Tilt', 'starto-elementor' ),
				     	'if_bounce' => __( 'Bounce', 'starto-elementor' ),
				     	'if_scale' 	=> __( 'Scale', 'starto-elementor' ),
				     	'if_spin' 	=> __( 'Spin', 'starto-elementor' ),
				    ],
					'condition' => [
						'starto_ext_is_infinite' => 'true',
					],
					'frontend_available' => true,
				]
			);
			
			$element->add_control(
				'starto_ext_infinite_easing',
				[
					'label'       => esc_html__( 'Easing', 'starto-elementor' ),
					'type' => Elementor\Controls_Manager::SELECT,
					'default' => '0.250, 0.250, 0.750, 0.750',
				    'options' => [
					    '0.250, 0.250, 0.750, 0.750' => __( 'linear', 'starto-elementor' ),
				     	'0.250, 0.100, 0.250, 1.000' => __( 'ease', 'starto-elementor' ),
				     	'0.420, 0.000, 1.000, 1.000' => __( 'ease-in', 'starto-elementor' ),
				     	'0.000, 0.000, 0.580, 1.000' => __( 'ease-out', 'starto-elementor' ),
				     	'0.420, 0.000, 0.580, 1.000' => __( 'ease-in-out', 'starto-elementor' ),
				     	'0.550, 0.085, 0.680, 0.530' => __( 'easeInQuad', 'starto-elementor' ),
				     	'0.550, 0.055, 0.675, 0.190' => __( 'easeInCubic', 'starto-elementor' ),
				     	'0.895, 0.030, 0.685, 0.220' => __( 'easeInQuart', 'starto-elementor' ),
				     	'0.755, 0.050, 0.855, 0.060' => __( 'easeInQuint', 'starto-elementor' ),
				     	'0.470, 0.000, 0.745, 0.715' => __( 'easeInSine', 'starto-elementor' ),
				     	'0.950, 0.050, 0.795, 0.035' => __( 'easeInExpo', 'starto-elementor' ),
				     	'0.600, 0.040, 0.980, 0.335' => __( 'easeInCirc', 'starto-elementor' ),
				     	'0.600, -0.280, 0.735, 0.045' => __( 'easeInBack', 'starto-elementor' ),
				     	'0.250, 0.460, 0.450, 0.940' => __( 'easeOutQuad', 'starto-elementor' ),
				     	'0.215, 0.610, 0.355, 1.000' => __( 'easeOutCubic', 'starto-elementor' ),
				     	'0.165, 0.840, 0.440, 1.000' => __( 'easeOutQuart', 'starto-elementor' ),
				     	'0.230, 1.000, 0.320, 1.000' => __( 'easeOutQuint', 'starto-elementor' ),
				     	'0.390, 0.575, 0.565, 1.000' => __( 'easeOutSine', 'starto-elementor' ),
				     	'0.190, 1.000, 0.220, 1.000' => __( 'easeOutExpo', 'starto-elementor' ),
				     	'0.075, 0.820, 0.165, 1.000' => __( 'easeOutCirc', 'starto-elementor' ),
				     	'0.175, 0.885, 0.320, 1.275' => __( 'easeOutBack', 'starto-elementor' ),
				     	'0.455, 0.030, 0.515, 0.955' => __( 'easeInOutQuad', 'starto-elementor' ),
				     	'0.645, 0.045, 0.355, 1.000' => __( 'easeInOutCubic', 'starto-elementor' ),
				     	'0.770, 0.000, 0.175, 1.000' => __( 'easeInOutQuart', 'starto-elementor' ),
				     	'0.860, 0.000, 0.070, 1.000' => __( 'easeInOutQuint', 'starto-elementor' ),
				     	'0.445, 0.050, 0.550, 0.950' => __( 'easeInOutSine', 'starto-elementor' ),
				     	'1.000, 0.000, 0.000, 1.000' => __( 'easeInOutExpo', 'starto-elementor' ),
				     	'0.785, 0.135, 0.150, 0.860' => __( 'easeInOutCirc', 'starto-elementor' ),
				     	'0.680, -0.550, 0.265, 1.550' => __( 'easeInOutBack', 'starto-elementor' ),
				    ],
					'condition' => [
						'starto_ext_is_infinite' => 'true',
					],
					'frontend_available' => true
				]
			);
			
			$element->add_control(
				'starto_ext_infinite_duration',
				[
					'label' => __( 'Animation Duration (s)', 'starto-elementor' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 1,
					'max' => 15,
					'step' => 1,
					'default' => 4,
					'condition' => [
						'starto_ext_is_infinite' => 'true',
					],
					'frontend_available' => true
				]
			);

			$element->end_controls_section();
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object
		 */
		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
	}
}

/**
 * Returns instance of Starto_Ext
 *
 * @return object
 */
function starto_ext() {
	return Starto_Ext::get_instance();
}
