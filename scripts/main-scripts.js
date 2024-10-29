jQuery(window).on('elementor/frontend/init', function () {

  
  // load image comparison
  elementorFrontend.hooks.addAction( 'frontend/element_ready/bemax_image_comparison.default', function($scope, $){
    miguras_image_comparison();       
  } );
  
  

});