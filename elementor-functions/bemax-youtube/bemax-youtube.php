<?php

add_action('elementor/element/section/section_typo/after_section_end', function( $section, $args ) {
$section->start_controls_section(
'bemax_youtube_bg_section',
[
  'label' => __( 'BEMAX Youtube Background', 'elementor' ),
  'tab' => \Elementor\Controls_Manager::TAB_STYLE,
]
);



	$section->add_control(
		'bemax_youtube',
		[
			'label' => __( 'Activate Youtube as Background', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
      'label_on' => __( 'On', 'elementor-bemax' ),
			'label_off' => __( 'Off', 'elementor-bemax' ),
			'return_value' => 'yes',
			'default' => 'no',
		]
	);

  $section->add_control(
		'bemax_youtube_id',
		[
			'label' => __( 'Youtube Video ID', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( 'ab0TSkLe-E0', 'elementor-bemax' ),
			'placeholder' => __( 'Youtube ID example: ab0TSkLe-E0', 'elementor-bemax' ),
		]
	);


  $section->add_control(
		'bemax_youtube_sound',
		[
			'label' => __( 'Activate Sound', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
      'label_on' => __( 'On', 'elementor-bemax' ),
			'label_off' => __( 'Off', 'elementor-bemax' ),
			'return_value' => 'false',
			'default' => 'false',
		]
	);

  $section->add_control(
		'bemax_youtube_repeat',
		[
			'label' => __( 'Repeat Video', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
      'label_on' => __( 'On', 'elementor-bemax' ),
			'label_off' => __( 'Off', 'elementor-bemax' ),
			'return_value' => 'true',
			'default' => 'true',
		]
	);

  $section->add_control(
		'bemax_youtube_ratio',
		[
			'label' => __( 'Video Ratio', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '16/9',
			'options' => [
				'16/9'  => __( '16/9', 'elementor-bemax' ),
				'4/3' => __( '4/3', 'elementor-bemax' ),
			],
		]
	);

  $section->add_control(
		'bemax_youtube_width',
		[
			'label' => __( 'Video Width', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'window',
			'options' => [
        'window' => esc_html__( 'Use adaptative width (recommended)', 'elementor-bemax' ),
				'section'  => esc_html__( 'Use default width', 'elementor-bemax' ),
			],
		]
	);


  $section->add_control(
		'bemax_youtube_parallax',
		[
			'label' => __( 'Parallax Effect', 'elementor-bemax' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'yes',
			'options' => [
        'no' => esc_html__( 'No', 'elementor-bemax' ),
				'yes'  => esc_html__( 'Yes', 'elementor-bemax' ),
			],
		]
	);

  $section->add_control(
		'bemax_youtube_hide',
		[
			'label' => __( 'Hide Top', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( '-200px', 'elementor-bemax' ),
			'placeholder' => __( 'this option will hide some portion of the video', 'elementor-bemax' ),
		]
	);

  $section->add_control(
		'bemax_youtube_start',
		[
			'label' => __( 'Start time', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( '', 'elementor-bemax' ),
			'placeholder' => __( '(seconds ex: 20)', 'elementor-bemax' ),
		]
	);


  $section->add_control(
		'bemax_youtube_stop',
		[
			'label' => __( 'End time', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __( '', 'elementor-bemax' ),
			'placeholder' => __( '(seconds ex: 20)', 'elementor-bemax' ),
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

	if ( isset( $settings['bemax_youtube'] ) && $settings['bemax_youtube'] === 'yes' ) {
		$element->add_render_attribute( '_wrapper', 'class', 'bemax_youtubebg' );
    $element->add_render_attribute( '_wrapper', 'data-youtubebgid', $settings['bemax_youtube_id'] );
    if($settings['bemax_youtube_sound'] == 'false'){
      $element->add_render_attribute( '_wrapper', 'data-youtubebgmute', $settings['bemax_youtube_sound'] );
    }
    else {
      $element->add_render_attribute( '_wrapper', 'data-youtubebgmute', 'true' );
    }

    if($settings['bemax_youtube_repeat'] == 'true'){
      $element->add_render_attribute( '_wrapper', 'data-youtubebgrepeat', $settings['bemax_youtube_repeat'] );
    }
    else {
      $element->add_render_attribute( '_wrapper', 'data-youtubebgrepeat', 'false' );
    }

    $element->add_render_attribute( '_wrapper', 'data-youtubebgratio', $settings['bemax_youtube_ratio'] );
    $element->add_render_attribute( '_wrapper', 'data-youtubebghidetop', $settings['bemax_youtube_hide'] );

    $element->add_render_attribute( '_wrapper', 'data-youtubebgparallax', $settings['bemax_youtube_parallax'] );
    $element->add_render_attribute( '_wrapper', 'data-youtubebgstart', $settings['bemax_youtube_start'] );
    $element->add_render_attribute( '_wrapper', 'data-youtubebgstop', $settings['bemax_youtube_stop'] );
    $element->add_render_attribute( '_wrapper', 'data-youtubebgwidth', $settings['bemax_youtube_width'] );

	}
});


function bemax_youtube_background_scripts(){
  wp_enqueue_script( 'bemax-elementor-youtube-vb',  plugin_dir_url( __FILE__ ) . 'bemax-youtube.js', '', rand(0, 100) );
}

add_action('wp_enqueue_scripts', 'bemax_youtube_background_scripts', 100);
?>
