<?php

add_action('elementor/element/section/section_typo/after_section_end', function( $section, $args ) {
$section->start_controls_section(
'bemax_sidebar_section',
[
  'label' => __( 'BEMAX OFF Canvas Sidebar', 'elementor' ),
  'tab' => \Elementor\Controls_Manager::TAB_STYLE,
]
);



	$section->add_control(
		'bemax_sidebar',
		[
			'label' => __( 'Activate OFF Canvas Sidebar', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
      'label_on' => __( 'On', 'elementor-bemax' ),
			'label_off' => __( 'Off', 'elementor-bemax' ),
			'return_value' => 'yes',
			'default' => 'no',
		]
	);

  $section->add_control(
		'bemax_sidebar_initial_state',
		[
			'label' => __( 'Initial State', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'closed',
			'options' => [
        'closed' => esc_html__( 'Closed', 'elementor-bemax' ),
        'open' => esc_html__( 'Open', 'elementor-bemax' ),
			],
		]
	);

  $section->add_control(
		'bemax_sidebar_buttons',
		[
			'label' => __( 'Display Open/Close Button', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'yes',
			'options' => [
        'yes' => esc_html__( 'Yes', 'elementor-bemax' ),
        'no' => esc_html__( 'No', 'elementor-bemax' ),
			],
      'condition' => ['bemax_sidebar_initial_state' => 'open']
		]
	);

  $section->add_control(
		'bemax_sidebar_width',
		[
			'label' => __( 'Sidebar Width', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( '350px', 'elementor-bemax' ),
			'placeholder' => __( 'default value: 350px', 'elementor-bemax' ),
		]
	);

  $section->add_control(
		'bemax_sidebar_style',
		[
			'label' => __( 'Scrollbar Style', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'rounded-dots',
			'options' => [
        'rounded-dots' => esc_html__( 'Rounded Dots', 'elementor-bemax' ),
        'rounded-dots-dark' => esc_html__( 'Rounded Dots Dark', 'elementor-bemax' ),
        'light' => esc_html__( 'Regular Light', 'elementor-bemax' ),
        'dark' => esc_html__( 'Regular Dark', 'elementor-bemax' ),
        'light-thin' => esc_html__( 'Light Thin', 'elementor-bemax' ),
        'dark-thin' => esc_html__( 'Dark Thin', 'elementor-bemax' ),
        'inset' => esc_html__( 'Light Inset', 'elementor-bemax' ),
        'inset-dark' => esc_html__( 'Dark Inset', 'elementor-bemax' ),
        'rounded' => esc_html__( 'Light Rounded', 'elementor-bemax' ),
        'rounded-dark' => esc_html__( 'Dark Rounded', 'elementor-bemax' ),
        '3d-thick' => esc_html__( '3D Light Thick', 'elementor-bemax' ),
        '3d-thick-dark' => esc_html__( '3D Dark Thick', 'elementor-bemax' ),
			],
		]
	);

  $section->add_control(
		'bemax_sidebar_openicon',
		[
			'label' => __( 'Open Icon', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::ICON,
			'default' => __( 'fa fa-bars', 'elementor-bemax' ),

		]
	);
  $section->add_control(
		'bemax_sidebar_buttontext',
		[
			'label' => __( 'Text for outside button (Optional)', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( '', 'elementor-bemax' ),
			'placeholder' => __( '', 'elementor-bemax' ),
		]
	);

  $section->add_control(
		'bemax_sidebar_padding',
		[
			'label' => __( 'Text Padding', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
      'allowed_dimensions' => 'horizontal',
			'selectors' => [
				'.bemax_offcanvas_offcanvas_button_text' => 'padding-right: {{RIGHT}}{{UNIT}} !important; padding-left: {{LEFT}}{{UNIT}} !important;',
			],
		]
	);

  $section->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'bemax_sidebar_typo',
			'label' => __( 'Button Typography', 'elementor-bemax' ),
			'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '.bemax_offcanvas_offcanvas_button_text',
		]
	);

  /*
  $section->add_control(
		'bemax_sidebar_font',
		[
			'label' => __( 'Font Family', 'plugin-domain' ),
			'type' => \Elementor\Controls_Manager::FONT,
			'default' => "",
      'selector' => '.elementor-widget',

		]
	);
  */

  $section->add_control(
		'bemax_sidebar_iconsize',
		[
			'label' => __( 'Icon Size', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'min' => 5,
			'max' => 50,
			'step' => 1,
			'default' => 35,
		]
	);

  $section->add_control(
		'bemax_sidebar_closeicon',
		[
			'label' => __( 'Close Icon', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::ICON,
			'default' => __( 'fa fa-close', 'elementor-bemax' ),

		]
	);

  $section->add_control(
		'bemax_sidebar_iconbackground',
		[
			'label' => __( 'Icon Background', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'scheme' => [
				'type' => \Elementor\Scheme_Color::get_type(),
				'value' => \Elementor\Scheme_Color::COLOR_1,
			],
	    'default' => '#ef218f',
		]
	);

  $section->add_control(
		'bemax_sidebar_iconcolor',
		[
			'label' => __( 'Icon Color', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'scheme' => [
				'type' => \Elementor\Scheme_Color::get_type(),
				'value' => \Elementor\Scheme_Color::COLOR_1,
			],
	    'default' => '#ffffff',
		]
	);

  $section->add_control(
		'bemax_sidebar_top',
		[
			'label' => __( 'Outside bottom top position', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( '100px', 'elementor-bemax' ),
			'placeholder' => __( '100px', 'elementor-bemax' ),
		]
	);


  $section->add_control(
		'bemax_sidebar_left',
		[
			'label' => __( 'Outside bottom left position', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( '50px', 'elementor-bemax' ),
			'placeholder' => __( '50px', 'elementor-bemax' ),
		]
	);

  $section->add_control(
		'bemax_sidebar_insideposition',
		[
			'label' => __( 'Button Inside Position', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'top',
			'options' => [
        'top' => esc_html__( 'Top', 'elementor-bemax' ),
				'middle'  => esc_html__( 'Middle', 'elementor-bemax' ),
        'bottom'  => esc_html__( 'Bottom', 'elementor-bemax' ),
			],
		]
	);

  $section->add_control(
		'bemax_sidebar_height',
		[
			'label' => __( 'Sidebar Height', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( 'auto', 'elementor-bemax' ),
			'placeholder' => __( 'default value: auto', 'elementor-bemax' ),
		]
	);


  $section->end_controls_section();


}, 10, 2 );

add_action( 'elementor/frontend/section/before_render', function( $element ) {
	// Make sure we are in a section element
	if( 'section' !== $element->get_name() ) {
		return;
	}
	// get the settings
	$settings = $element->get_settings();

	if ( isset( $settings['bemax_sidebar'] ) && $settings['bemax_sidebar'] === 'yes' ) {
		$element->add_render_attribute( '_wrapper', 'class', 'bemax_offcanvas bemax_opacity_class' );
    $element->add_render_attribute( '_wrapper', 'data-offcanvaswidth', $settings['bemax_sidebar_width'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasstyle', $settings['bemax_sidebar_style'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasopenicon', $settings['bemax_sidebar_openicon'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasiconsize', $settings['bemax_sidebar_iconsize'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasclosedicon', $settings['bemax_sidebar_closeicon'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasiconbackground', $settings['bemax_sidebar_iconbackground'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasiconcolor', $settings['bemax_sidebar_iconcolor'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvastop', $settings['bemax_sidebar_top'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasleft', $settings['bemax_sidebar_left'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasbuttontext', $settings['bemax_sidebar_buttontext'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasheight', $settings['bemax_sidebar_height'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasinsideposition', $settings['bemax_sidebar_insideposition'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasstate', $settings['bemax_sidebar_initial_state'] );
    $element->add_render_attribute( '_wrapper', 'data-offcanvasbuttons', $settings['bemax_sidebar_buttons'] );

	}
});


function bemax_sidebar_scripts(){
  wp_enqueue_script( 'bemax-elementor-sidebar-vb',  plugin_dir_url( __FILE__ ) . 'bemax-sidebar.js', '', rand(0, 100) );
}

add_action('wp_enqueue_scripts', 'bemax_sidebar_scripts', 100);
?>
