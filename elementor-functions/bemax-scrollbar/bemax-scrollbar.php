<?php

add_action('elementor/element/section/section_typo/after_section_end', function( $section, $args ) {
$section->start_controls_section(
'bemax_scrollbar_section',
[
  'label' => __( 'BEMAX Scrollbar Section', 'elementor' ),
  'tab' => \Elementor\Controls_Manager::TAB_STYLE,
]
);



	$section->add_control(
		'bemax_scrollbar',
		[
			'label' => __( 'Activate Scrollbar', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
      'label_on' => __( 'On', 'elementor-bemax' ),
			'label_off' => __( 'Off', 'elementor-bemax' ),
			'return_value' => 'yes',
			'default' => 'no',
		]
	);

  $section->add_control(
		'bemax_scrollbar_height',
		[
			'label' => __( 'Scrollbar Height', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( '100px', 'elementor-bemax' ),
			'placeholder' => __( 'default value: 400px', 'elementor-bemax' ),
		]
	);

  $section->add_control(
		'bemax_scrollbar_width',
		[
			'label' => __( 'Scrollbar Width', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( '', 'elementor-bemax' ),
			'placeholder' => __( 'Empty for default size', 'elementor-bemax' ),
		]
	);

  $section->add_control(
		'bemax_scrollbar_axis',
		[
			'label' => __( 'Scrollbar Axis', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'y',
			'options' => [
        'y' => esc_html__( 'Vertical Scrollbar', 'elementor-bemax' ),
        'x' => esc_html__( 'Horizontal Scrollbar', 'elementor-bemax' ),
        'yx' => esc_html__( 'Both Scrollbar', 'elementor-bemax' ),
			],
		]
	);


  $section->add_control(
		'bemax_scrollbar_style',
		[
			'label' => __( 'Scrollbar Style', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'rounded-dots-dark',
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
		'bemax_scrollbar_autohide',
		[
			'label' => __( 'Scrollbar Axis', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'false',
			'options' => [
        'false' => esc_html__( 'No', 'elementor-bemax' ),
        'true' => esc_html__( 'Yes', 'elementor-bemax' ),
			],
		]
	);

  $section->add_control(
		'bemax_scrollbar_position',
		[
			'label' => __( 'Scrollbar Position', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'inside',
			'options' => [
        'inside' => esc_html__( 'Inside Section', 'elementor-bemax' ),
        'outside' => esc_html__( 'Outside Section', 'elementor-bemax' ),
			],
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

	if ( isset( $settings['bemax_scrollbar'] ) && $settings['bemax_scrollbar'] === 'yes' ) {
		$element->add_render_attribute( '_wrapper', 'class', 'bemax_scrollbar bemax_opacity_class' );
    $element->add_render_attribute( '_wrapper', 'data-scrollbarheight', $settings['bemax_scrollbar_height'] );
    $element->add_render_attribute( '_wrapper', 'data-scrollbarwidth', $settings['bemax_scrollbar_width'] );
    $element->add_render_attribute( '_wrapper', 'data-scrollbaraxis', $settings['bemax_scrollbar_axis'] );
    $element->add_render_attribute( '_wrapper', 'data-scrollbarstyle', $settings['bemax_scrollbar_style'] );
    $element->add_render_attribute( '_wrapper', 'data-scrollbarautohide', $settings['bemax_scrollbar_autohide'] );
    $element->add_render_attribute( '_wrapper', 'data-scrollbarposition', $settings['bemax_scrollbar_position'] );


	}
});


function bemax_scrollbar_scripts(){
  wp_enqueue_script( 'bemax-elementor-scrollbar-vb',  plugin_dir_url( __FILE__ ) . 'bemax-scrollbar.js', '', rand(0, 100) );
}

add_action('wp_enqueue_scripts', 'bemax_scrollbar_scripts', 100);
?>
