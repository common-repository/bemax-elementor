<?php

add_action('elementor/element/section/section_typo/after_section_end', function( $section, $args ) {
$section->start_controls_section(
'bemax_tilt_section',
[
  'label' => __( 'BEMAX Tilt Effect', 'elementor' ),
  'tab' => \Elementor\Controls_Manager::TAB_STYLE,
]
);



	$section->add_control(
		'bemax_tilt',
		[
			'label' => __( 'Activate Tilt Effect', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
      'label_on' => __( 'On', 'elementor-bemax' ),
			'label_off' => __( 'Off', 'elementor-bemax' ),
			'return_value' => 'yes',
			'default' => 'no',
		]
	);

  $section->add_control(
		'bemax_tilt_applyto',
		[
			'label' => __( 'Apply to', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'section',
			'options' => [
        'section' => esc_html__( 'Entire Section', 'elementor-bemax' ),
				'modules'  => esc_html__( 'Elements', 'elementor-bemax' ),
        'onlyelements'  => esc_html__( 'Only Widgets', 'elementor-bemax' ),
			],
		]
	);
  $section->add_control(
		'bemax_tilt_parallax',
		[
			'label' => __( 'Activate Parallax', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'no',
			'options' => [
        'no' => esc_html__( 'No', 'elementor-bemax' ),
        'yes'  => esc_html__( 'Yes', 'elementor-bemax' ),
			],
      'condition' => ['bemax_tilt_applyto' => 'section']
		]
	);

  $section->add_control(
		'bemax_tilt_perspective',
		[
			'label' => __( 'Perspective', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'min' => 100,
			'max' => 1000,
			'step' => 100,
			'default' => 1000,
		]
	);

  $section->add_control(
		'bemax_tilt_scale',
		[
			'label' => __( 'Perspective', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'min' => 1,
			'max' => 3,
			'step' => 0.1,
			'default' => 1,
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

	if ( isset( $settings['bemax_tilt'] ) && $settings['bemax_tilt'] === 'yes' ) {
		$element->add_render_attribute( '_wrapper', 'class', 'bemax_tilteffect bemax_opacity_class' );
    $element->add_render_attribute( '_wrapper', 'data-tilteffectapplyto', $settings['bemax_tilt_applyto'] );
    $element->add_render_attribute( '_wrapper', 'data-tilteffectparallax', $settings['bemax_tilt_parallax'] );
    $element->add_render_attribute( '_wrapper', 'data-tilteffectperspective', $settings['bemax_tilt_perspective'] );
    $element->add_render_attribute( '_wrapper', 'data-tilteffectscale', $settings['bemax_tilt_scale'] );



	}
});


function bemax_tilt_scripts(){
  wp_enqueue_script( 'bemax-elementor-tilt-vb',  plugin_dir_url( __FILE__ ) . 'bemax-tilt.js', '', rand(0, 100) );
}

add_action('wp_enqueue_scripts', 'bemax_tilt_scripts', 100);
?>
