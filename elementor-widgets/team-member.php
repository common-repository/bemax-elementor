<?php



class BEMAX_team_member extends \Elementor\Widget_Base {
  
 
	public function get_name() {
		return 'bemax_team_member';
	}

	
	public function get_title() {
		return __( 'Bemax Team Member', 'elementor-bemax' );
	}

	
	public function get_icon() {
		return 'fa fa-bomb';
	}


	public function get_categories() {
		return [ 'bemax-category' ];
	}


	protected function _register_controls() {
    $migurascontrols = new Miguras_Universal_Builder_Controls(array('plugin_name' => 'elementor', 'plugin_domain', 'miguras_controls'));

		$this->start_controls_section(
			'bemax_team_member_section',
			[
				'label' => __( 'Member', 'elementor-bemax' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

   
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'image', 
        'id' => 'upload', 
        'label' => 'Member Image'
      )
    );
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'text', 
        'id' => 'name', 
        'label' => 'Name',
        'default' => 'John Smith'
      )
    );
   
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'text', 
        'id' => 'position', 
        'label' => 'Position',
        'default' => 'Designer'
      )
    );
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'content', 
        'id' => 'content', 
        'label' => 'Member Description',
        'default' => 'I\'m a great graphic designer',
      )
    );
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'icon', 
        'id' => 'first_icon_type', 
        'label' => 'First Icon',
        'default' => 'fa fa-linkedin',
        'icons' =>  [
					'fa fa-facebook',
					'fa fa-flickr',
					'fa fa-google-plus',
					'fa fa-instagram',
					'fa fa-linkedin',
					'fa fa-pinterest',
					'fa fa-reddit',
					'fa fa-twitch',
					'fa fa-twitter',
					'fa fa-vimeo',
					'fa fa-youtube',
				],
      )
    );
    
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'text', 
        'id' => 'first_icon_link', 
        'label' => 'First Icon Link',
        'default' => 'http://www.google.com'
      )
    );
    
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'icon', 
        'id' => 'second_icon_type', 
        'label' => 'Second Icon',
        'default' => 'fa fa-instagram',
        'icons' =>  [
					'fa fa-facebook',
					'fa fa-flickr',
					'fa fa-google-plus',
					'fa fa-instagram',
					'fa fa-linkedin',
					'fa fa-pinterest',
					'fa fa-reddit',
					'fa fa-twitch',
					'fa fa-twitter',
					'fa fa-vimeo',
					'fa fa-youtube',
				],
      )
    );
    
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'text', 
        'id' => 'second_icon_link', 
        'label' => 'Second Icon Link',
        'default' => 'http://www.google.com'
      )
    );
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'icon', 
        'id' => 'third_icon_type', 
        'label' => 'Third Icon',
        'default' => 'fa fa-pinterest',
        'icons' =>  [
					'fa fa-facebook',
					'fa fa-flickr',
					'fa fa-google-plus',
					'fa fa-instagram',
					'fa fa-linkedin',
					'fa fa-pinterest',
					'fa fa-reddit',
					'fa fa-twitch',
					'fa fa-twitter',
					'fa fa-vimeo',
					'fa fa-youtube',
				],
      )
    );
    
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'text', 
        'id' => 'third_icon_link', 
        'label' => 'Third Icon Link',
        'default' => 'http://www.google.com'
      )
    );
    
   
    
    /*
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'color', 
        'id' => 'main_color', 
        'label' => 'Main Color',
        'default' => '#333333'
      )
    );
    */


	$this->end_controls_section();
    
  
    
    
  /************** STYLE TAB *******************/
  $this->start_controls_section(
    'bemax_team_member_styles_section',
    [
      'label' => __( 'Design', 'elementor-bemax' ),
      'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    ]
  );
    
    
  $migurascontrols->control_selector($this, 
    array(
      'type' => 'select', 
      'id' => 'style', 
      'label' => 'Style',
      'default' => 'effect_1',
      'options'  => array(
        'effect_1' => 'Style 1',
      ),
    )                           
  );  
    
    
  $this->add_control(
    'content_padding',
    [
      'label' => __( 'Content Padding', 'elementor-bemax' ),
      'type' => \Elementor\Controls_Manager::DIMENSIONS,
      'default' => [
        'top' => '20',
        'right' => '20',
        'bottom' => '20',
        'left' => '20',
        'unit' => 'px',
      ],
      'size_units' => [ 'px', '%', 'em' ],
      'selectors' => [
        '{{WRAPPER}} .miguras_team_member_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
      ],
    ]
  );

    
    
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
      'name' => 'content_typography',
      'label' => __( 'Content Typography', 'elementor-bemax' ),
      'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
      'selector' => '{{WRAPPER}}',
    ]
  );
    
    
  $this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
      'name' => 'title_typography',
      'label' => __( 'Title Typography', 'elementor-bemax' ),
      'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
      'selector' => '{{WRAPPER}} .miguras_team_member_name',
    ]
  );
    
  $migurascontrols->control_selector($this, 
    array(
      'type' => 'color', 
      'id' => 'title_color', 
      'label' => 'Name Color',
      'default' => '#51005e',
      'selectors' => [
        '{{WRAPPER}} .miguras_team_member_name' => 'color: {{VALUE}}',
      ]
    )
  );
    
    
  $migurascontrols->control_selector($this, 
    array(
      'type' => 'color', 
      'id' => 'position_color', 
      'label' => 'Position Color',
      'default' => '#e5023e',
      'selectors' => [
        '{{WRAPPER}} .miguras_team_member_position' => 'color: {{VALUE}}',
      ]
    )
  );
    
    
    
   $migurascontrols->control_selector($this, 
    array(
      'type' => 'color', 
      'id' => 'icons_color', 
      'label' => 'Icons Color',
      'default' => '#e5023e',
      'selectors' => [
        '{{WRAPPER}} .miguras_team_member_networks a' => 'color: {{VALUE}}',
      ]
    )
  );
    
    
   $migurascontrols->control_selector($this, 
    array(
      'type' => 'color', 
      'id' => 'icons_color_hover', 
      'label' => 'Icons Color Hover',
      'default' => '#ff02f6',
      'selectors' => [
        '{{WRAPPER}} .miguras_team_member_networks a:hover' => 'color: {{VALUE}}',
      ]
    )
  );
  
    
   $this->add_control(
			'content_alignment',
			[
				'label' => __( 'Alignment', 'elementor-bemax' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
        'selectors' => [
          '{{WRAPPER}}' => 'text-align: {{VALUE}} !important',
        ],
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
				],
				'default' => 'center',
				'toggle' => true,
			]
		);
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'slider', 
        'id' => 'icons_size', 
        'label' => 'Icons Size',
        'units' => array('px'),
        'default' => [
          'unit' => 'px',
          'size' => 20,
        ],
        'range' => [
          'px' => [
            'min' => 1,
            'max' => 50,
            'step' => 1,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} .miguras_team_member_networks a' => 'font-size: {{SIZE}}{{UNIT}}',
				]
      )                           
    );


    
    
  $this->end_controls_section();

    
    
	} // end of function _register_controls
  
  
  
 
  
	protected function render() {
    $attrs = $this->get_settings_for_display();
    $settings = $this->get_settings_for_display();

    $attrs['upload'] = $settings['upload']['url'];
 
    
    $miguras = new Miguras_IE_Functions();  
    echo $miguras->member($attrs);
    
	}

}