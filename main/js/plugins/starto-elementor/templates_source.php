<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Starto_Templates_Source extends Elementor\TemplateLibrary\Source_Base {

	/**
	 * Template prefix
	 *
	 * @var string
	 */
	protected $template_prefix = 'starto_';

	/**
	 * Return templates prefix
	 *
	 * @return [type] [description]
	 */
	public function get_prefix() {
		return $this->template_prefix;
	}

	public function get_id() {
		return 'starto-templates';
	}

	public function get_title() {
		return __( 'Starto Templates', 'starto-elementor' );
	}

	public function register_data() {}

	public function get_items( $args = array() ) {
		
		$templates = array();

		$templates_data = array(
			1 	=> array(
				'template_id'      	=> $this->template_prefix .'1',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Home 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_1.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/',
			),
			2 	=> array(
				'template_id'      	=> $this->template_prefix .'2',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Home 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_2.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/home-2/',
			),
			3 	=> array(
				'template_id'      	=> $this->template_prefix .'3',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Home 3',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_3.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/home-3/',
			),
			4 	=> array(
				'template_id'      	=> $this->template_prefix .'4',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Home 4',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_4.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/home-4/',
			),
			5 	=> array(
				'template_id'      	=> $this->template_prefix .'5',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Home 5',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_5.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/home-5/',
			),
			6 	=> array(
				'template_id'      	=> $this->template_prefix .'6',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Home 6',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_6.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/home-6/',
			),
			7 	=> array(
				'template_id'      	=> $this->template_prefix .'7',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Home 7',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_7.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/home-7/',
			),
			8 	=> array(
				'template_id'      	=> $this->template_prefix .'8',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Home 8',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_8.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/home-8/',
			),
			9 	=> array(
				'template_id'      	=> $this->template_prefix .'9',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Home 9',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_9.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('home'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/home-9/',
			),
			10 	=> array(
				'template_id'      	=> $this->template_prefix .'10',
				'source'            => $this->get_id(),
				'title'             => 'Starto - About 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_10.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('about'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/about-1/',
			),
			11 	=> array(
				'template_id'      	=> $this->template_prefix .'11',
				'source'            => $this->get_id(),
				'title'             => 'Starto - About 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_11.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('about'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/about-2/',
			),
			12 	=> array(
				'template_id'      	=> $this->template_prefix .'12',
				'source'            => $this->get_id(),
				'title'             => 'Starto - About 3',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_12.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('about'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/about-3/',
			),
			/*13 	=> array(
				'template_id'      	=> $this->template_prefix .'13',
				'source'            => $this->get_id(),
				'title'             => 'Starto - About 4',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_13.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('about'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/about-4/',
			),*/
			14 	=> array(
				'template_id'      	=> $this->template_prefix .'14',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Our Team',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_14.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('team'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/our-team/',
			),
			15 	=> array(
				'template_id'      	=> $this->template_prefix .'15',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Contact 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_15.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('contact'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/contact-1/',
			),
			16 	=> array(
				'template_id'      	=> $this->template_prefix .'16',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Contact 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_16.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('contact'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/contact-2/',
			),
			17 	=> array(
				'template_id'      	=> $this->template_prefix .'17',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Service 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_17.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('service'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/service-1/',
			),
			18 	=> array(
				'template_id'      	=> $this->template_prefix .'18',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Service 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_18.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('service'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/service-2/',
			),
			19 	=> array(
				'template_id'      	=> $this->template_prefix .'19',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Pricing',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_19.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('service'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/pricing/',
			),
			20 	=> array(
				'template_id'      	=> $this->template_prefix .'20',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Portfolio Classic',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_20.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/portfolio-classic/',
			),
			21 	=> array(
				'template_id'      	=> $this->template_prefix .'21',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Portfolio Grid',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_21.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/portfolio-grid/',
			),
			22 	=> array(
				'template_id'      	=> $this->template_prefix .'22',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Portfolio Grid Overlay',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_22.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/portfolio-grid-overlay/',
			),
			23 	=> array(
				'template_id'      	=> $this->template_prefix .'23',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Portfolio 3D Overlay',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_23.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/portfolio-3d-overlay/',
			),
			24 	=> array(
				'template_id'      	=> $this->template_prefix .'24',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Portfolio Contain',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_24.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/portfolio-contain/',
			),
			25 	=> array(
				'template_id'      	=> $this->template_prefix .'25',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Portfolio Masonry',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_25.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/portfolio-masonry/',
			),
			26 	=> array(
				'template_id'      	=> $this->template_prefix .'26',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Portfolio Masonry Grid',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_26.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/portfolio-masonry-grid/',
			),
			27 	=> array(
				'template_id'      	=> $this->template_prefix .'27',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Portfolio Coverflow',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_27.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/portfolio-coverflow/',
			),
			28 	=> array(
				'template_id'      	=> $this->template_prefix .'28',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Portfolio Timeline Horizon',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_28.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/portfolio-timeline-horizon/',
			),
			29 	=> array(
				'template_id'      	=> $this->template_prefix .'29',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Portfolio Timeline Vertical',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_29.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/portfolio-timeline-vertical/',
			),
			30 	=> array(
				'template_id'      	=> $this->template_prefix .'30',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Single Portfolio 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_30.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/single-portfolio-1/',
			),
			31 	=> array(
				'template_id'      	=> $this->template_prefix .'31',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Single Portfolio 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_31.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/single-portfolio-2/',
			),
			32 	=> array(
				'template_id'      	=> $this->template_prefix .'32',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Single Portfolio 3',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_32.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/single-portfolio-3/',
			),
			33 	=> array(
				'template_id'      	=> $this->template_prefix .'33',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Single Portfolio 4',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_33.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/single-portfolio-4/',
			),
			34 	=> array(
				'template_id'      	=> $this->template_prefix .'34',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Single Portfolio 5',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_34.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('portfolio'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/single-portfolio-5/',
			),
			35 	=> array(
				'template_id'      	=> $this->template_prefix .'35',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Video Grid',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_35.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('video'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/video-grid/',
			),
			36 	=> array(
				'template_id'      	=> $this->template_prefix .'36',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Blog',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_36.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'page',
				'subtype'			=> 'page',
				'author'            => 'ThemeGoods',

				'keywords'          => array('blog'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog-grid/',
			),
						
			//Adding navigation menu block templates
			501 => array(
				'template_id'      	=> $this->template_prefix .'501',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Header 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_501.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme navigation menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('navigation'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/header/header-1/',
			),
			502 => array(
				'template_id'      	=> $this->template_prefix .'502',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Header 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_502.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme navigation menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('navigation'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/header/header-2/',
			),
			503 => array(
				'template_id'      	=> $this->template_prefix .'503',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Header 3',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_503.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme navigation menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('navigation'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/header/header-3/',
			),
			504 => array(
				'template_id'      	=> $this->template_prefix .'504',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Header 4',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_504.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme navigation menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('navigation'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/header/header-4/',
			),
			505 => array(
				'template_id'      	=> $this->template_prefix .'505',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Header 5',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_505.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme navigation menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('navigation'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/header/header-5/',
			),
			
			//Adding mega menu block templates
			601 => array(
				'template_id'      	=> $this->template_prefix .'601',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Mega Menu Home Grid',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_601.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme mega menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('megamenu'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/megamenu/home-mega-menu/',
			),
			602 => array(
				'template_id'      	=> $this->template_prefix .'602',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Mega Menu Services',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_602.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme mega menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('megamenu'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/megamenu/service-mega-menu/',
			),
			603 => array(
				'template_id'      	=> $this->template_prefix .'603',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Mega Menu Shop',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_603.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme mega menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('megamenu'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/megamenu/shop-mega-menu/',
			),
			604 => array(
				'template_id'      	=> $this->template_prefix .'604',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Mega Menu Page',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_604.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme mega menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('megamenu'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/megamenu/page-mega-menu/',
			),
			605 => array(
				'template_id'      	=> $this->template_prefix .'605',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Mega Menu Portfolio',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_605.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme mega menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('megamenu'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/megamenu/portfolio-mega-menu/',
			),
			606 => array(
				'template_id'      	=> $this->template_prefix .'606',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Mega Menu Slider',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_606.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme mega menu',
				'author'            => 'ThemeGoods',

				'keywords'          => array('megamenu'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/megamenu/slider-mega-menu/',
			),
			
			//Adding footer block templates
			701 => array(
				'template_id'      	=> $this->template_prefix .'701',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Footer 1',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_701.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme footer',
				'author'            => 'ThemeGoods',

				'keywords'          => array('footer'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/footer/footer-1/',
			),
			702 => array(
				'template_id'      	=> $this->template_prefix .'702',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Footer 2',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_702.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme footer',
				'author'            => 'ThemeGoods',

				'keywords'          => array('footer'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/footer/footer-2/',
			),
			703 => array(
				'template_id'      	=> $this->template_prefix .'703',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Footer 3',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_703.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme footer',
				'author'            => 'ThemeGoods',

				'keywords'          => array('footer'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/footer/footer-3/',
			),
			704 => array(
				'template_id'      	=> $this->template_prefix .'704',
				'source'            => $this->get_id(),
				'title'             => 'Starto - Footer 4',
				'thumbnail'         => 'http://assets.themegoods.com/demo/starto/templates/screenshots/starto_704.jpg',
				'date'      		=> date( get_option( 'date_format' ), 1575280289 ),
				'type'				=> 'block',
				'subtype'			=> 'theme footer',
				'author'            => 'ThemeGoods',

				'keywords'          => array('footer'),
				'is_pro'            => false,
				'has_page_settings' => false,
				'url'               => 'https://themes.themegoods.com/starto/blog/footer/footer-4/',
			),
		);
		
		if ( ! empty( $templates_data ) ) {
			foreach ( $templates_data as $template_data ) 
			{
				$templates_data['popularityIndex'] = 260;
				$templates_data['trendIndex'] = 125;
				
				$templates[] = $this->get_item( $template_data );
			}
		}

		if ( ! empty( $args ) ) {
			$templates = wp_list_filter( $templates, $args );
		}
		
		return $templates;
	}
	
	public function get_item( $template_data ) {
		return array(
			'template_id'     => $template_data['template_id'],
			'source'          => 'remote',
			'type'            => $template_data['type'],
			'subtype'         => $template_data['subtype'],
			'title'           => $template_data['title'],
			'thumbnail'       => $template_data['thumbnail'],
			'date'            => $template_data['date'],
			'author'          => $template_data['author'],
			'tags'            => $template_data['tags'],
			'isPro'           => ( 1 == $template_data['isPro'] ),
			'popularityIndex' => (int) $template_data['popularityIndex'],
			'trendIndex'      => (int) $template_data['trendIndex'],
			'hasPageSettings' => ( 1 == $template_data['hasPageSettings'] ),
			'url'             => $template_data['url'],
			'favorite'        => ( 1 == $template_data['favorite'] ),
		);
	}

	public function save_item( $template_data ) {
		return false;
	}

	public function update_item( $new_data ) {
		return false;
	}

	public function delete_template( $template_id ) {
		return false;
	}

	public function export_template( $template_id ) {
		return false;
	}

	public function get_data( array $args, $context = 'display' ) {
		$url	  = 'http://assets.themegoods.com/demo/starto/templates/json/'.$args['template_id'].'.json';
		$response = wp_remote_get( $url, array( 'timeout' => 60 ) );
		$body     = wp_remote_retrieve_body( $response );
		$body     = json_decode( $body, true );
		$data     = ! empty( $body['content'] ) ? $body['content'] : false;
		
		$result = array();

		$result['content']       = $this->replace_elements_ids($data);
		$result['content']       = $this->process_export_import_content( $result['content'], 'on_import' );
		$result['page_settings'] = array();

		return $result;
	}
}
