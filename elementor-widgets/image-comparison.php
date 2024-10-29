<?php



class BEMAX_Image_Comparison extends \Elementor\Widget_Base {
  
 
	public function get_name() {
		return 'bemax_image_comparison';
	}

	
	public function get_title() {
		return __( 'Bemax Image Comparison', 'elementor-bemax' );
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
			'bemax_image_comparison_content_section',
			[
				'label' => __( 'Image Comparison', 'elementor-bemax' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

   
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'image', 
        'id' => 'before_upload', 
        'label' => 'Before Image'
      )
    );
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'text', 
        'id' => 'before_text', 
        'label' => 'Before Text',
        'default' => 'Before'
      )
    );
   
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'image', 
        'id' => 'after_upload', 
        'label' => 'After Image'
      )
    );
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'text', 
        'id' => 'after_text', 
        'label' => 'After Text',
        'default' => 'After'
      )
    );
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'select', 
        'id' => 'orientation', 
        'label' => 'Orientation',
        'default' => 'horizontal',
        'options' => array(
          'horizontal'  => 'Horizontal',
          'vertical' => 'Vertical',
        )  
      )                           
    );
    
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'slider', 
        'id' => 'visible', 
        'label' => 'Before Visible Percent',
        'units' => '',
        'default' => [
          'unit' => '',
          'size' => 0.5,
        ],
        'range' => [
          '' => [
            'min' => 0,
            'max' => 1,
            'step' => 0.1,
          ],
        ],
      )                           
    );
    
    
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'select', 
        'id' => 'overlay', 
        'label' => 'Overlay',
        'default' => 'true',
        'options' => array(
          'false'  => 'Yes',
          'true' => 'No',
        )  
      )                           
    );
    
  
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'select', 
        'id' => 'slideronhover', 
        'label' => 'Slider on Hover',
        'default' => 'true',
        'options' => array(
          'true'  => 'Yes',
          'false' => 'No',
        )  
      )                           
    );
    
    
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'select', 
        'id' => 'withhandle', 
        'label' => 'Move only with handle',
        'default' => 'true',
        'options' => array(
          'true'  => 'Yes',
          'false' => 'No',
        )  
      )                           
    );
    
    
    
    
    $migurascontrols->control_selector($this, 
      array(
        'type' => 'select', 
        'id' => 'clicktomove', 
        'label' => 'Click to Move',
        'default' => 'false',
        'options' => array(
          'true'  => 'Yes',
          'false' => 'No',
        )  
      )                           
    );
    
    

	$this->end_controls_section();

    
    
	} // end of function _register_controls
  
  
  
 
  
	protected function render() {
    $settings = $this->get_settings_for_display();
    $attrs = $this->get_settings_for_display();

    
    $attrs['before_upload'] = $settings['before_upload']['url'];
    $attrs['after_upload'] = $settings['after_upload']['url'];    
    $attrs['visible'] = $settings['visible']['size'];

    
    $miguras = new Miguras_IE_Functions();  
    echo $miguras->image_comparison($attrs);
    
	}

}