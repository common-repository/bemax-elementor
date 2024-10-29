<?php 



class Miguras_Universal_Builder_Controls {
  
  protected $plugin;
  protected $plugin_domain;
  
  public function __construct($source = null){
    
    $this->plugin = $source['plugin_name'];
    $this->plugin_domain = $source['plugin_domain'];
    
  }
  
  public function control_selector($widget, $attrs = null, $extra = null){    
    
    $domain = $this->plugin_domain;
    
    
    // Text Field
    if($attrs['type'] == 'text'):
     
        if($this->plugin == 'elementor'):
         $widget->add_control(
          $attrs['id'],
            [
              'label' => __( $attrs['label'], $domain ),
              'type' => \Elementor\Controls_Manager::TEXT,
              'default' => __( $attrs['default'], $domain ),
              'placeholder' => __( $attrs['placeholder'], $domain ),
              'selectors' => $attrs['selectors'],
            ]
          );
       endif;

    endif;
    
    
    
    // Image Field
    if($attrs['type'] == 'image'):
      
      if($this->plugin == 'elementor'):
         $widget->add_control(
            $attrs['id'],
            [
              'label' => __( $attrs['label'], $domain ),
              'type' => \Elementor\Controls_Manager::MEDIA,
              'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
              ],
            ]
          );
       endif;

    endif;
    
    
    // Select Field
    if($attrs['type'] == 'select'):
      $selectoptionsfixed = array();
      $selectoptions = $attrs['options'];
      foreach($selectoptions as $selectoptionkey => $selectoptionvalue){
        $selectoptionsfixed[$selectoptionkey] = __( $selectoptionvalue, $domain );
      }

      if($this->plugin == 'elementor'):
        $widget->add_control(
          $attrs['id'],
          [
            'label' => __( $attrs['label'], $domain ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => $attrs['default'],
            'options' => $selectoptionsfixed,
            'selectors' => $attrs['selectors'],
          ]
        );
      endif;
    endif;
    
    
    // Slider Field
    if($attrs['type'] == 'slider'):
    
    if($this->plugin == 'elementor'):
      $widget->add_control(
        $attrs['id'],
          [
            'label' => __( $attrs['label'], $domain ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ $attrs['units'] ],
            'range' => $attrs['range'],
            'default' => $attrs['default'],
            'selectors' => $attrs['selectors'],
          ]
      );
    endif;
    
    endif;
    
    
    
    // Content Field
    if($attrs['type'] == 'content'):
    
    if($this->plugin == 'elementor'):
      $widget->add_control(
        $attrs['id'],
        [
          'label' => __( $attrs['label'], $domain ),
          'type' => \Elementor\Controls_Manager::WYSIWYG,
          'default' => __( $attrs['default'], $domain ),
          'placeholder' => __( $attrs['placeholder'], $domain ),
        ]
      );
    endif;
    
    endif;
    
    
    
    // Icon  Field
    if($attrs['type'] == 'icon'):
    
    if($this->plugin == 'elementor'):
      $widget->add_control(
        $attrs['id'],
        [
          'label' => __( $attrs['label'], $domain ),
          'type' => \Elementor\Controls_Manager::ICON,
          'include' => $attrs['icons'],
          'default' => $attrs['default'],
        ]
      );
    endif;
    
    endif;
    
    
    
    
    // Color  Field
    if($attrs['type'] == 'color'):
    
      if($this->plugin == 'elementor'):
        $widget->add_control(
          $attrs['id'],
          [
            'label' => __( $attrs['label'], $domain ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => $attrs['default'],
            'scheme' => [
              'type' => \Elementor\Scheme_Color::get_type(),
              'value' => \Elementor\Scheme_Color::COLOR_1,
            ],
            'selectors' => $attrs['selectors'],
          ]
        );
      endif;
    
    endif;
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  } // end of control_selector function
  
  
  
  
  
  
  
  
  
}




?>