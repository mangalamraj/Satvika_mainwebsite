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
class Starto_Course_Grid extends Widget_Base {

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
		return 'starto-course-grid';
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
		return __( 'Course Grid', 'starto-elementor' );
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
		return 'eicon-posts-grid';
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
		return [ 'imagesloaded', 'starto-elementor' ];
	}
	
	/**
	 * Retrieve course categories
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Course categories
	 */
	public function get_course_categories() {
		//Get all categories
		$categories_arr = get_terms('course_category', 'hide_empty=0&hierarchical=0&parent=0&orderby=menu_order');
		$tg_categories_select = array();
		
		foreach ($categories_arr as $cat) {
			$tg_categories_select[$cat->term_id] = $cat->name;
		}

		return $tg_categories_select;
	}
	
	/**
	 * Retrieve course tags
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Course tags
	 */
	public function get_course_tags() {
		//Get all tags
		$tags_arr = get_terms('course_tag', 'hide_empty=0&hierarchical=0&parent=0&orderby=menu_order');
		$tg_tags_select = array();
		
		foreach ($tags_arr as $tag) {
			$tg_tags_select[$tag->term_id] = $tag->name;
		}

		return $tg_tags_select;
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
			'grid_template',
			[
				'label' => __( 'Grid Template', 'starto-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 1,
			    'options' => [
				    1 => __( 'Style 1', 'starto-elementor' ),
				    2 => __( 'Style 2', 'starto-elementor' ),
				    3 => __( 'Style 3', 'starto-elementor' ),
			    ],
			]
		);
		
		$this->add_control(
			'course_category',
			[
				'label' => __( 'Filter by Categories', 'starto-elementor' ),
				'type' => Controls_Manager::SELECT2,
			    'options' => $this->get_course_categories(),
			    'multiple' => true,
			]
		);
		
		$this->add_control(
			'course_tag',
			[
				'label' => __( 'Filter by Tags', 'starto-elementor' ),
				'type' => Controls_Manager::SELECT2,
			    'options' => $this->get_course_tags(),
			    'multiple' => true,
			]
		);
		
		$this->add_control(
			'sort_by',
			[
				'label' => __( 'Sort By', 'starto-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
			    'options' => [
				    'default' => __( 'Default', 'starto-elementor' ),
				    'random' => __( 'Random', 'starto-elementor' ),
				    'published' => __( 'Published Date', 'starto-elementor' ),
			     	'title' => __( 'Title', 'starto-elementor' ),
			     	'price_low' => __( 'Price (Low to High)', 'starto-elementor' ),
			     	'price_high' => __( 'Price (High to Low)', 'starto-elementor' ),
			    ],
			]
		);

		$this->add_control(
		    'posts_per_page',
		    [
		        'label' => __( 'Posts Per Page', 'starto-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 6,
		        ],
		        'range' => [
		            'px' => [
		                'min' => -1,
		                'max' => 100,
		                'step' => 1,
		            ]
		        ],
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
			'spacing',
			[
				'label' => __( 'Column Spacing', 'starto-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'starto-elementor' ),
				'label_off' => __( 'No', 'starto-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'show_pagination',
			[
				'label' => __( 'Show Pagination', 'starto-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'starto-elementor' ),
				'label_off' => __( 'No', 'starto-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'hover_effect',
			[
				'label' => __( 'Hover Effect', 'starto-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'starto-elementor' ),
				'label_off' => __( 'No', 'starto-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_meta',
			[
				'label' => __( 'Meta Data', 'starto-elementor' ),
			]
		);
		
		$this->add_control(
		    'excerpt_length',
		    [
		        'label' => __( 'Excerpt Length', 'starto-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 90,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 300,
		                'step' => 1,
		            ]
		        ],
		    ]
		);
		
		$this->add_control(
			'show_rating',
			[
				'label' => __( 'Show Rating', 'starto-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'starto-elementor' ),
				'label_off' => __( 'No', 'starto-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'show_lesson',
			[
				'label' => __( 'Show Lesson', 'starto-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'starto-elementor' ),
				'label_off' => __( 'No', 'starto-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'show_student',
			[
				'label' => __( 'Show Student Number', 'starto-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'starto-elementor' ),
				'label_off' => __( 'No', 'starto-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'show_price',
			[
				'label' => __( 'Show Price', 'starto-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'starto-elementor' ),
				'label_off' => __( 'No', 'starto-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'show_tooltip',
			[
				'label' => __( 'Show Tooltip', 'starto-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'starto-elementor' ),
				'label_off' => __( 'No', 'starto-elementor' ),
				'return_value' => 'yes',
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
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper .card-title a' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper .card-title',
			]
		);
		
		$this->add_control(
		    'content_bg_color',
		    [
		        'label' => __( 'Content Background Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper .card-info' => 'background-color: {{VALUE}}',
		            '{{WRAPPER}} .course-grid-container .grid_template3 .card-info .card-title-wrapper' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'content_border_color',
		    [
		        'label' => __( 'Content Border Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper' => 'border-color: {{VALUE}}',
		            '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper .card-meta-wrapper' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'card_box_shadow',
				'label' => __( 'Card Shadow', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper',
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
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper .card-info .card-excerpt' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'label' => __( 'Excerpt Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper .card-info .card-excerpt p',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_meta_style',
			array(
				'label'      => esc_html__( 'Meta Data', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'meta_color',
		    [
		        'label' => __( 'Meta Data Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper .card-info .card-meta' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'label' => __( 'Meta Data Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper .card-info div.card-meta',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_pricing_style',
			array(
				'label'      => esc_html__( 'Pricing', 'starto-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'pricing_bg_color',
		    [
		        'label' => __( 'Pricing Background Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#3d64ff',
		        'selectors' => [
		            '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper .card-price' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'pricing_color',
		    [
		        'label' => __( 'Pricing Font Color', 'starto-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper .card-price' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pricing_typography',
				'label' => __( 'Pricing Typography', 'starto-elementor' ),
				'selector' => '{{WRAPPER}} .course-grid-container .portfolio-classic-grid-wrapper .card-price',
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
		include(STARTO_ELEMENTOR_PATH.'templates/course-grid/index.php');
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
