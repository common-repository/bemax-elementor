<?php

add_action('elementor/element/section/section_typo/after_section_end', function( $section, $args ) {
$section->start_controls_section(
'bemax_particles_section',
[
  'label' => __( 'BEMAX Particles', 'elementor' ),
  'tab' => \Elementor\Controls_Manager::TAB_STYLE,
]
);



	$section->add_control(
		'bemax_particles',
		[
			'label' => __( 'Activate Particles', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
      'label_on' => __( 'On', 'elementor-bemax' ),
			'label_off' => __( 'Off', 'elementor-bemax' ),
			'return_value' => 'yes',
			'default' => 'no',
		]
	);

  $section->add_control(
		'bemax_particles_dotscolor',
		[
			'label' => __( 'Dots Color', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'scheme' => [
				'type' => \Elementor\Scheme_Color::get_type(),
				'value' => \Elementor\Scheme_Color::COLOR_1,
			],
	    'default' => '#2bff75',
		]
	);

  $section->add_control(
    'bemax_particles_linescolor',
    [
      'label' => __( 'Lines Color', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'scheme' => [
        'type' => \Elementor\Scheme_Color::get_type(),
        'value' => \Elementor\Scheme_Color::COLOR_1,
      ],
      'default' => '#000000',
    ]
  );

  $section->add_control(
		'bemax_particles_directionx',
		[
			'label' => __( 'Horizontal Direction', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'center',
			'options' => [
        'left' => esc_html__( 'left', 'elementor-bemax' ),
				'center'  => esc_html__( 'center', 'elementor-bemax' ),
        'right'  => esc_html__( 'right', 'elementor-bemax' ),
			],
		]
	);

  $section->add_control(
		'bemax_particles_directiony',
		[
			'label' => __( 'Vertical Direction', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'center',
			'options' => [
        'up' => esc_html__( 'up', 'elementor-bemax' ),
				'center'  => esc_html__( 'center', 'elementor-bemax' ),
        'down'  => esc_html__( 'down', 'elementor-bemax' ),
			],
		]
	);

  $section->add_control(
		'bemax_particles_particleradius',
		[
			'label' => __( 'Particles Radius', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'min' => 1,
			'max' => 10,
			'step' => 1,
			'default' => 5,
		]
	);

  $section->add_control(
		'bemax_particles_linewidth',
		[
			'label' => __( 'Lines Width', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'min' => 0,
			'max' => 3,
			'step' => 0.1,
			'default' => 1,
		]
	);

  $section->add_control(
		'bemax_particles_density',
		[
			'label' => __( 'Particles Density', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'min' => 500,
			'max' => 10000,
			'step' => 500,
			'default' => 3500,
		]
	);

  $section->add_control(
		'bemax_particles_parallax',
		[
			'label' => __( 'Parallax Effect', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'true',
			'options' => [
        'false' => esc_html__( 'false', 'elementor-bemax' ),
				'true'  => esc_html__( 'true', 'elementor-bemax' ),
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

	if ( isset( $settings['bemax_particles'] ) && $settings['bemax_particles'] === 'yes' ) {
		$element->add_render_attribute( '_wrapper', 'class', 'bemax_particles_bg bemax_opacity_class' );
    $element->add_render_attribute( '_wrapper', 'data-particlesdotscolor', $settings['bemax_particles_dotscolor'] );
    $element->add_render_attribute( '_wrapper', 'data-particleslinescolor', $settings['bemax_particles_linescolor'] );
    $element->add_render_attribute( '_wrapper', 'data-particlesdirectionx', $settings['bemax_particles_directionx'] );
    $element->add_render_attribute( '_wrapper', 'data-particlesdirectiony', $settings['bemax_particles_directiony'] );
    $element->add_render_attribute( '_wrapper', 'data-particlesdensity', $settings['bemax_particles_density'] );
    $element->add_render_attribute( '_wrapper', 'data-particlesradius', $settings['bemax_particles_particleradius'] );
    $element->add_render_attribute( '_wrapper', 'data-particleslinewidth', $settings['bemax_particles_linewidth'] );
    $element->add_render_attribute( '_wrapper', 'data-particlesparallax', $settings['bemax_particles_parallax'] );


	}
});


function bemax_particles_scripts(){
  wp_enqueue_script( 'bemax-elementor-particles-vb',  plugin_dir_url( __FILE__ ) . 'bemax-particles.js', '', rand(0, 100) );
}

add_action('wp_enqueue_scripts', 'bemax_particles_scripts', 100);
?>
