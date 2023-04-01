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
class Starto_Portfolio_Timeline_Vertical extends Widget_Base {

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
		return 'starto-portfolio-timeline-vertical';
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
		return __( 'Portfolio Timeline Vertical', 'starto-elementor' );
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
		return 'eicon-slider-vertical';
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
		return [ 'swiper', 'starto-elementor' ];
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
						'name' => 'slide_label',
						'label' => __( 'Label', 'starto-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Label' , 'starto-elementor' ),
					],
					[
						'name' => 'slide_image',
						'label' => __( 'Image', 'starto-elementor' ),
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
						'name' => 'slide_description',
						'label' => __( 'Description', 'starto-elementor' ),
						'type' => Controls_Manager::WYSIWYG,
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
		    'height',
		    [
		        'label' => __( 'Height', 'starto-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 800,
		            'unit' => 'px',
		        ],
		        'range' => [
		            'px' => [
		                'min' => 5,
		                'max' => 2000,
		                'step' => 5,
		            ],
		        ],
		        'size_units' => [ 'px' ],
		    ]
		);
		
		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Auto Play', 'starto-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'label_on' => __( 'Yes', 'starto-elementor' ),
				'label_off' => __( 'No', 'starto-elementor' ),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
		    'timer',
		    [
		        'label' => __( 'Timer (in seconds)', 'starto-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 8,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 1,
		                'max' => 60,
		                'step' => 1,
		            ]
		        ],
		        'size_units' => [ 'px' ]
		    ]
		);
		
		$this->add_control(
		    'transition_speed',
		    [
		        'label' => __( 'Transition Speed (in milli-seconds)', 'starto-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 1600,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 100,
		                'max' => 5000,
		                'step' => 100,
		            ]
		        ],
		        'size_units' => [ 'px' ]
		    ]
		);

		$this->add_control(
		    'background_overlay',
		    [
		        'label' => __( 'Background Overlay', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => 'rgba(0,0,0,0.3)',
		        'selectors' => [
		            '{{WRAPPER}} .portfolio-timeline-vertical-content-wrapper .timeline .swiper-slide::after' => 'background-color: {{VALUE}}',
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
		            '{{WRAPPER}} .portfolio-timeline-vertical-content-wrapper .timeline .swiper-slide .timeline-title' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .portfolio-timeline-vertical-content-wrapper .timeline .swiper-slide h4.timeline-title',
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
		            '{{WRAPPER}} .portfolio-classic-grid-wrapper .portfolio-classic-content .portfolio-classic-subtitle' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => __( 'Sub Title Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .portfolio-timeline-vertical-content-wrapper .timeline .swiper-slide .timeline-year',
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
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .portfolio-timeline-vertical-content-wrapper .timeline .swiper-slide .timeline-text' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Content Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .portfolio-timeline-vertical-content-wrapper .timeline .swiper-slide div.timeline-text',
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
		        'label' => __( 'Navigation Line Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => 'rgba(255, 255, 255, 0.2)',
		        'selectors' => [
		            '{{WRAPPER}} .portfolio-timeline-vertical-content-wrapper .timeline .swiper-pagination::before' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_active_color',
		    [
		        'label' => __( 'Navigation Active Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .portfolio-timeline-vertical-content-wrapper .timeline .swiper-pagination-bullet' => 'color: {{VALUE}}',
		             '{{WRAPPER}} .portfolio-timeline-vertical-content-wrapper .timeline .swiper-pagination-bullet::before' => 'background-color: {{VALUE}}',
		             '{{WRAPPER}} .portfolio-timeline-vertical-content-wrapper .timeline .swiper-button-next, .portfolio-timeline-vertical-content-wrapper .timeline .swiper-button-prev' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'label' => __( 'Label Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .portfolio-timeline-vertical-content-wrapper .timeline .swiper-pagination',
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
		include(STARTO_ELEMENTOR_PATH.'templates/portfolio-timeline-vertical/index.php');
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
