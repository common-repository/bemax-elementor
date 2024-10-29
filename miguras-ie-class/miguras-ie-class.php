<?php 


class Miguras_IE_Functions {
   protected $name;
  
    
   public function __construct($pluginName = null){
      
      $this->name = $pluginName;

      //private functions exec

    }
    
  
    // required scripts and styles for image comparison
    public function image_comparison_scripts(){

        wp_enqueue_script( $this->name.'-image-comparison',  plugin_dir_url( __FILE__ ) . 'scripts/image-comparison/jquery.twentytwenty.js' );
        wp_enqueue_script( $this->name.'-image-comparison-move-events',  plugin_dir_url( __FILE__ ) . 'scripts/image-comparison/jquery.event.move.js' );
        wp_enqueue_style( $this->name.'-image-comparison-css',  plugin_dir_url( __FILE__ ) . 'scripts/image-comparison/twentytwenty.css' ); 
        wp_enqueue_script( $this->name.'-image-comparison-jquery',  plugin_dir_url( __FILE__ ) . 'scripts/image-comparison/image-comparison-handler.js' );
    }
  
    
    // required scripts and styles for members
    public function members_scripts(){
      
        wp_enqueue_style( $this->name.'-members-css',  plugin_dir_url( __FILE__ ) . 'scripts/members/members-styles.css' ); 
    }
  
    
  
    // load requested scripts and styles  
    public function enqueue_scripts($scripts){
      
      if(in_array( 'image-comparison' , $scripts )){
        add_action('wp_enqueue_scripts', array($this, 'image_comparison_scripts'), 999);
      }
      
      if(in_array( 'members' , $scripts )){
        add_action('wp_enqueue_scripts', array($this, 'members_scripts'), 999);
      }
      
    }
      
      
  
   
    public function image_comparison($attrs){
      $output = '';

      $output .= sprintf(
      '
      <div data-clicktomove="%10$s" data-withhandle="%9$s" data-slideronhover="%8$s" data-overlay="%7$s" data-visible="%6$s" data-orientation="%5$s" data-before="%3$s" data-after="%4$s" class="miguras_image_comparison_container">
        <img class="miguras_image_comparison_before" src="%1$s" />
        <img class="miguras_image_comparison_after" src="%2$s" />
      </div>
      ',
      $attrs['before_upload'],
      $attrs['after_upload'],
      $attrs['before_text'],
      $attrs['after_text'],
      $attrs['orientation'],
      $attrs['visible'],
      $attrs['overlay'],
      $attrs['slideronhover'],
      $attrs['withhandle'],
      $attrs['clicktomove']

      );

      return $output;
    }
  
    
  
  
  
    
  
    
    public function member($attrs){
      
      $iconone = $icontwo = $iconthree = '';

      if(isset($attrs["first_icon_type"]) && $attrs["first_icon_type"] != 'none' ){
        $iconone = '<a href="'.esc_attr($attrs["first_icon_link"]).'"><i class="' . $attrs['first_icon_type'] . '" aria-hidden="true"></i></a>';
      }
      if(isset($attrs["second_icon_type"]) && $$attrs["second_icon_type"] != 'none' ){
        $icontwo = '<a href="'.esc_attr($attrs["second_icon_link"]).'"><i class="' . $attrs['second_icon_type'] . '" aria-hidden="true"></i></a>';
      }
      if(isset($attrs["third_icon_type"]) && $$attrs["third_icon_type"] != 'none' ){
        $iconthree = '<a href="'.esc_attr($attrs["third_icon_link"]).'"><i class="' . $attrs['third_icon_type'] . '" aria-hidden="true"></i></a>';
      }
      
      if($attrs['style'] === 'effect_1'):

				return sprintf('
				<div data-color="%9$s" class="miguras_module miguras_team_member %1$s">
					<img class="miguras_team_member_image" src="%2$s"/>

				<div class="miguras_team_member_content">
						<div class="miguras_team_member_maininfo">
							<h2 class="miguras_team_member_name">
								%3$s
							</h2>
							<h3 class="miguras_team_member_position">
								%4$s
							</h3>
						</div>
						<div class="miguras_team_member_description">
							%5$s
						</div>
						<div class="miguras_team_member_networks">
									%6$s
									%7$s
									%8$s
						</div>
					</div>

				</div>
				',

					$attrs['style'],
					$attrs['upload'],
					$attrs['name'],
					$attrs['position'],
					$attrs['content'],
					$iconone,
					$icontwo,
					$iconthree,
					$attrs['main_color']

				);
			endif;
      
      
      
      
    } // end of member function
  
  
  
  
  
}



?>