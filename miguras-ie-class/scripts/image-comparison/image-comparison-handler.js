/*=========================== MIGURAS TWENTYTWENTY IMAGE COMPARISON ===============================*/
    function miguras_image_comparison(){
      if(jQuery('.miguras_image_comparison_container').length){
        jQuery('.miguras_image_comparison_container').each(function(){
          var $visiblepercent = jQuery(this).attr('data-visible');
          var $beforelabel = jQuery(this).attr('data-before');
          var $afterlabel = jQuery(this).attr('data-after');
          var $orientation = jQuery(this).attr('data-orientation');
          var $overlay = jQuery(this).attr('data-overlay'); if($overlay == 'false'){$overlay = false;}else {$overlay = true;}
          var $slideronhover = jQuery(this).attr('data-slideronhover'); if($slideronhover == 'false'){$slideronhover = false;}else {$slideronhover = true;}
          var $withhandle = jQuery(this).attr('data-withhandle'); if($withhandle == 'false'){$withhandle = false;}else {$withhandle = true;}
          var $clicktomove = jQuery(this).attr('data-clicktomove'); if($clicktomove == 'false'){$clicktomove = false;}else {$clicktomove = true;}

          if(!jQuery(this).hasClass('miguras-image-comparison-loaded')){
            jQuery(this).twentytwenty({
              default_offset_pct: $visiblepercent,
              orientation: $orientation,
              before_label: 'before',
              after_label: 'after',
              no_overlay: $overlay,
              move_slider_on_hover: $slideronhover,
              move_with_handle_only: $withhandle,
              click_to_move: $clicktomove
            });
          }
          
          jQuery(this).addClass('miguras-image-comparison-loaded');
          
          
        })
       } 
        
    }


    

    


   