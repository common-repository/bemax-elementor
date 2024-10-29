<?php

class BEMAX_Animated_Links extends \Elementor\Widget_Base {

	
	public function get_name() {
		return 'bemax_animated_links';
	}

	
	public function get_title() {
		return __( 'Bemax Animated Links', 'elementor-bemax' );
	}

	
	public function get_icon() {
		return 'fa fa-bomb';
	}


	public function get_categories() {
		return [ 'bemax-category' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'animated_links_content_section',
			[
				'label' => __( 'Animated Links', 'elementor-bemax' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

    
    
	$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'elementor-bemax' ),
				'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'cl-effect-1',
				'options' => [
					'cl-effect-1' => esc_html__( 'Effect 1', 'bemax' ),
					'cl-effect-2' => esc_html__( 'Effect 2', 'bemax' ),
					'cl-effect-3' => esc_html__( 'Effect 3', 'bemax' ),
					'cl-effect-4' => esc_html__( 'Effect 4', 'bemax' ),
					'cl-effect-5' => esc_html__( 'Effect 5', 'bemax' ),
					'cl-effect-6' => esc_html__( 'Effect 6', 'bemax' ),
					'cl-effect-7' => esc_html__( 'Effect 7', 'bemax' ),
					'cl-effect-8' => esc_html__( 'Effect 8', 'bemax' ),
					'cl-effect-9' => esc_html__( 'Effect 9', 'bemax' ),
					'cl-effect-10' => esc_html__( 'Effect 10', 'bemax' ),
					'cl-effect-11' => esc_html__( 'Effect 11', 'bemax' ),
					'cl-effect-12' => esc_html__( 'Effect 12', 'bemax' ),
					'cl-effect-13' => esc_html__( 'Effect 13', 'bemax' ),
					'cl-effect-14' => esc_html__( 'Effect 14', 'bemax' ),
					'cl-effect-15' => esc_html__( 'Effect 15', 'bemax' ),
					'cl-effect-16' => esc_html__( 'Effect 16', 'bemax' ),
					'cl-effect-17' => esc_html__( 'Effect 17', 'bemax' ),
					'cl-effect-18' => esc_html__( 'Effect 18', 'bemax' ),
					'cl-effect-19' => esc_html__( 'Effect 19', 'bemax' ),
					'cl-effect-20' => esc_html__( 'Effect 20', 'bemax' ),
					'cl-effect-21' => esc_html__( 'Effect 21', 'bemax' ),
				],	
			]
		);

  $this->add_control(
    'text',
    [
      'label' => __( 'Text', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::TEXT,
      'default' => __( 'Go To Page', 'elementor-bemax' ),
      'placeholder' => __( 'Type the button text here', 'elementor-bemax' ),
    ]
  );
    
  $this->add_control(
    'second-link-text',
    [
      'label' => __( 'Second Text', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::TEXT,
      'default' => __( 'Go To Page', 'elementor-bemax' ),
      'placeholder' => __( 'Type your second text here', 'elementor-bemax' ),
      'condition' => ['style' => ['cl-effect-9', 'cl-effect-2', 'cl-effect-5', 'cl-effect-10', 'cl-effect-11', 'cl-effect-15', 'cl-effect-16', 'cl-effect-17', 'cl-effect-18', 'cl-effect-19', 'cl-effect-20']]
      
    ]
  );
  
  $this->add_control(
    'link',
    [
      'label' => __( 'Link', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::TEXT,
      'default' => __( 'http://www.google.com', 'elementor-bemax' ),
      'placeholder' => __( 'Type your url here', 'elementor-bemax' ),
    ]
  );
    
    
		$this->end_controls_section();
    
    
    
  $this->start_controls_section(
    'animated_links_style_section',
    [
      'label' => __( 'Animated Links', 'elementor-bemax' ),
      'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
  );
  
    
  $this->add_control(
    'backgroundcolor',
      [
        'label' => __( 'Button Background Color', 'elementor-bemax' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'scheme' => [
          'type' => \Elementor\Scheme_Color::get_type(),
          'value' => \Elementor\Scheme_Color::COLOR_1,
        ],
        'default' => '#d30c5c',
        'selectors' => [
          '{{WRAPPER}} a' => 'background-color: {{VALUE}}',
          '{{WRAPPER}} span' => 'background-color: {{VALUE}}',
          '.csstransforms3d {{WRAPPER}} .cl-effect-19 a:hover span::before' => 'background-color: {{VALUE}}',
          '.csstransforms3d {{WRAPPER}} .cl-effect-19 a:focus span::before' => 'background-color: {{VALUE}}',
          '.csstransforms3d {{WRAPPER}} .cl-effect-19 a span::before' => 'background-color: {{VALUE}}',
          '.csstransforms3d {{WRAPPER}} .cl-effect-2 a span::before' => 'background-color: {{VALUE}}',
          
          
          
        ],
      ]
  );
  $this->add_control(
  'color',
    [
      'label' => __( 'Button Text Color', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'scheme' => [
        'type' => \Elementor\Scheme_Color::get_type(),
        'value' => \Elementor\Scheme_Color::COLOR_1,
      ],
      'default' => '#ffffff',
      'selectors' => [
        '{{WRAPPER}} a' => 'color: {{VALUE}}',
        '{{WRAPPER}} .al-second-span' => 'color: {{VALUE}}',
        '{{WRAPPER}} .cl-effect-10 a::before' => 'color: {{VALUE}}',        
      ],
    ]
  );
    
  $this->add_control(
    'colorhover',
    [
      'label' => __( 'Button Text Color 2', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'scheme' => [
        'type' => \Elementor\Scheme_Color::get_type(),
        'value' => \Elementor\Scheme_Color::COLOR_1,
      ],
      'default' => '#ffffff',
      'selectors' => [
        '{{WRAPPER}} span' => 'color: {{VALUE}}',
        
      ],
      'condition' => ['style' => ['cl-effect-9', 'cl-effect-10', 'cl-effect-11', 'cl-effect-13' ]]
    ]
  );
   
    
  $this->add_control(
    'secondary_color',
    [
      'label' => __( 'Secondary Color', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'scheme' => [
        'type' => \Elementor\Scheme_Color::get_type(),
        'value' => \Elementor\Scheme_Color::COLOR_1,
      ],
      'default' => '#444444',
      'selectors' => [
        '{{WRAPPER}} .cl-effect-18 a::before' => 'background-color: {{VALUE}}',
        '{{WRAPPER}} .cl-effect-18 a::after' => 'background-color: {{VALUE}}',
      ],
      'condition' => ['style' => ['cl-effect-18']]
    ]
  );
  
  $this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'typo',
			'label' => __( 'Button Typography', 'elementor-bemax' ),
			'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .bemax_animated_links a, {{WRAPPER}} .bemax_animated_links span',
		]
	);
    
  $this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor-bemax' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor-bemax' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor-bemax' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor-bemax' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor-bemax' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
			]
		);
   
  $this->add_control(
    'padding',
    [
      'label' => __( 'Padding', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::DIMENSIONS,
      'size_units' => [ 'px', '%', 'em' ],
      'selectors' => [
        '{{WRAPPER}} nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      ],
    ]
  );
    
  $this->add_control(
    'important_note',
    [
      'label' => __( 'Important Note', 'elementor-bemax' ),
      'show_label' => false,
      'type' => \Elementor\Controls_Manager::RAW_HTML,
      'raw' => __( 'Effect 19 only supports px to define button width', 'elementor-bemax' ),
      'content_classes' => '',
      'condition' => [
        'style' => 'cl-effect-19'
      ]
    ]
  );

    
  $this->add_control(
    'button_width',
    [
      'label' => __( 'Button Width', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::SLIDER,
      'size_units' => [ 'px', '%' ],
      'range' => [
        'px' => [
          'min' => 0,
          'max' => 1000,
          'step' => 1,
        ],
        '%' => [
          'min' => 0,
          'max' => 100,
        ],
      ],
      'default' => [
        'unit' => 'px',
        'size' => 250,
      ],
      'selectors' => [
        '{{WRAPPER}} nav' => 'width: {{SIZE}}{{UNIT}};',
        '{{WRAPPER}} .cl-effect-19 a' => 'width: {{SIZE}}{{UNIT}};',
        '{{WRAPPER}} .cl-effect-19 a span:' => '-webkit-transform-origin: 50% 50% calc(-{{SIZE}}{{UNIT}}/2);',
        '{{WRAPPER}} .cl-effect-19 a span' => '-moz-transform-origin: 50% 50% calc(-{{SIZE}}{{UNIT}}/2);',
        '{{WRAPPER}} .cl-effect-19 a span' => 'transform-origin: 50% 50% calc(-{{SIZE}}{{UNIT}}/2);',
      ],
    ]
  );

	$this->end_controls_section();

    
    
	} // end of function _register_controls
  
  
  
 
  
	protected function render() {

		$settings = $this->get_settings_for_display();



		$secondlink = $secondspan = $data = $span = $onlylink = '';

		$secondlink = $settings['second-link-text'];
		if($secondlink == ''){
			$secondlink = $settings['text'];
		}

		if($settings['style'] === 'cl-effect-10' || $settings['style'] === 'cl-effect-11' || $settings['style'] === 'cl-effect-15' || $settings['style'] === 'cl-effect-16' || $settings['style'] === 'cl-effect-17' || $settings['style'] === 'cl-effect-18'){
			$data = 'data-hover="'.$secondlink.'"';
		}

		if($settings['style'] === 'cl-effect-10' || $settings['style'] === 'cl-effect-19' || $settings['style'] === 'cl-effect-20' ||
			$settings['style'] === 'cl-effect-2' || $settings['style'] === 'cl-effect-5' || $settings['style'] === 'cl-effect-9'){
			$span = '<span data-hover="'.$secondlink.'">'.$settings['text'].'</span>';
		}

		if($settings['style'] === 'cl-effect-16' || $settings['style'] === 'cl-effect-17' || $settings['style'] === 'cl-effect-18' || $settings['style'] === 'cl-effect-21' ||
			$settings['style'] === 'cl-effect-11' || $settings['style'] === 'cl-effect-12' || $settings['style'] === 'cl-effect-13' || $settings['style'] === 'cl-effect-14' || $settings['style'] === 'cl-effect-15' ||
			$settings['style'] === 'cl-effect-1' || $settings['style'] === 'cl-effect-3' || $settings['style'] === 'cl-effect-4' || $settings['style'] === 'cl-effect-6' || $settings['style'] === 'cl-effect-7' || $settings['style'] === 'cl-effect-8'){
			$onlylink = $settings['text'];
		}

		if($settings['style'] === 'cl-effect-9'){
			$secondspan = '<span class="al-second-span">'.$secondlink.'</span>';
		}

		echo sprintf('
			<div class="bemax_animated_links">
        <nav class="%1$s">
          <a href="%2$s" %4$s>%3$s%6$s%5$s</a>
        </nav>
      </div>
      ',

			esc_html__($settings['style']),
			esc_html__($settings['link']),
			$onlylink,
			$data,
			$secondspan,
			$span
		);

	}

}