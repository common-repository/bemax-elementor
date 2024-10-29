(function ($) {
	var BEMAXtilt = function($scope,$){
		var target    = $scope,
		    sectionId = target.data('id'),
		    editMode  = elementorFrontend.isEditMode(),
			settings;


		if ( editMode ) {
			settings = generateEditorSettings( sectionId );
		}

		if (!editMode || ! settings ) {
			return false;
		}

		function generateEditorSettings(targetId){
			var editorElements          = null,
				sectionData             = {},
				settings                = {};

			if ( ! window.elementor.hasOwnProperty( 'elements' ) ) {
				return false;
			}

			editorElements = window.elementor.elements;

			if ( ! editorElements.models ) {
				return false;
			}

			$.each(editorElements.models,function(index,elem){
				if( targetId == elem.id){
					sectionData = elem.attributes.settings.attributes;

				} else if( elem.id == target.closest( '.elementor-top-section' ).data( 'id' ) ) {
					$.each(elem.attributes.elements.models,function(index,col){
						$.each(col.attributes.elements.models,function(index,subSec){
							sectionData = subSec.attributes.settings.attributes;
						});
					});
				}
			});

			settings.tilt = sectionData[ 'bemax_tilt' ];
			settings.tiltapplyto = sectionData[ 'bemax_tilt_applyto' ];
			settings.tiltparallax = sectionData[ 'bemax_tilt_parallax' ];
			settings.tiltperspective = sectionData[ 'bemax_tilt_perspective' ];
			settings.tiltscale = sectionData[ 'bemax_tilt_scale' ];


			if(settings.tilt === 'yes'){
				$scope.addClass('bemax_tilteffect bemax_opacity_class');

				$scope.attr('data-tilteffectapplyto', settings.tiltapplyto);
				$scope.attr('data-tilteffectparallax', settings.tiltparallax);
				$scope.attr('data-tilteffectperspective', settings.tiltperspective);
				$scope.attr('data-tilteffectscale', settings.tiltscale);

				var $bemaxscripts = bemax_scripts_free();
				$bemaxscripts.bemax_tilt_effect();

			}
			else {
        if($scope.parent().hasClass('bemax_tilteffect_outer_wrapper')){
          $scope.unwrap('.bemax_tilteffect_outer_wrapper');
        }
        
				$scope.removeClass('bemax_tilteffect bemax_tilt_parallax');

				$scope.removeAttr('data-tilteffectapplyto');
				$scope.removeAttr('data-tilteffectparallax');
				$scope.removeAttr('data-tilteffectperspective');
				$scope.removeAttr('data-tilteffectscale');
				$scope.removeAttr('style');


			}





			if ( 0 !== settings.length ) {
				return settings;
			}

			return false;
		}



	};

	$(window).on('elementor/frontend/init', function () {

			elementorFrontend.hooks.addAction( 'frontend/element_ready/section', BEMAXtilt );
	});

}(jQuery));
