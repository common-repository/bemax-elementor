(function ($) {
	var BEMAXparticles = function($scope,$){
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

			settings.particles = sectionData[ 'bemax_particles' ];
			settings.particlesdotscolor = sectionData[ 'bemax_particles_dotscolor' ];
			settings.particleslinescolor = sectionData[ 'bemax_particles_linescolor' ];
			settings.particlesdirectionx = sectionData[ 'bemax_particles_directionx' ];
			settings.particlesdirectiony = sectionData[ 'bemax_particles_directiony' ];
			settings.particlesdensity = sectionData[ 'bemax_particles_density' ];
			settings.particlesradius = sectionData[ 'bemax_particles_particleradius' ];
			settings.particleslinewidth = sectionData[ 'bemax_particles_linewidth' ];
			settings.particlesparallax = sectionData[ 'bemax_particles_parallax' ];


			if(settings.particles === 'yes'){
				$scope.addClass('bemax_particles_bg bemax_opacity_class');

				$scope.attr('data-particlesdotscolor', settings.particlesdotscolor);
				$scope.attr('data-particleslinescolor', settings.particleslinescolor);
				$scope.attr('data-particlesdirectionx', settings.particlesdirectionx);
				$scope.attr('data-particlesdirectiony', settings.particlesdirectiony);
				$scope.attr('data-particlesdensity', settings.particlesdensity);
				$scope.attr('data-particlesradius', settings.particlesradius);
				$scope.attr('data-particleslinewidth', settings.particleslinewidth);
				$scope.attr('data-particlesparallax', settings.particlesparallax);


				var $bemaxscripts = bemax_scripts_free();
				$bemaxscripts.bemax_particles_background();


			}
			else {
				$scope.removeClass('bemax_particles_bg');

				$scope.removeAttr('data-particlesdotscolor');
				$scope.removeAttr('data-particleslinescolor');
				$scope.removeAttr('data-particlesdirectionx');
				$scope.removeAttr('data-particlesdirectiony');
				$scope.removeAttr('data-particlesdensity');
				$scope.removeAttr('data-particlesradius');
				$scope.removeAttr('data-particleslinewidth');
				$scope.removeAttr('data-particlesparallax');

			}





			if ( 0 !== settings.length ) {
				return settings;
			}

			return false;
		}



	};

	$(window).on('elementor/frontend/init', function () {

			elementorFrontend.hooks.addAction( 'frontend/element_ready/section', BEMAXparticles );
	});

}(jQuery));
