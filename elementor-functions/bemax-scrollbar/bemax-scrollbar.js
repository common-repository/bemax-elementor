(function ($) {
	var BEMAXscrollbar = function($scope,$){
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

			settings.scrollbar = sectionData[ 'bemax_scrollbar' ];
			settings.scrollbarheight = sectionData[ 'bemax_scrollbar_height' ];
			settings.scrollbarwidth = sectionData[ 'bemax_scrollbar_width' ];
			settings.scrollbaraxis = sectionData[ 'bemax_scrollbar_axis' ];
			settings.scrollbarstyle = sectionData[ 'bemax_scrollbar_style' ];
			settings.scrollbarautohide = sectionData[ 'bemax_scrollbar_autohide' ];
			settings.scrollbarposition = sectionData[ 'bemax_scrollbar_position' ];


			if(settings.scrollbar === 'yes'){
				$scope.addClass('bemax_scrollbar bemax_opacity_class');

				$scope.attr('data-scrollbarheight', settings.scrollbarheight);
				$scope.attr('data-scrollbarwidth', settings.scrollbarwidth);
				$scope.attr('data-scrollbaraxis', settings.scrollbaraxis);
				$scope.attr('data-scrollbarstyle', settings.scrollbarstyle);
				$scope.attr('data-scrollbarautohide', settings.scrollbarautohide);
				$scope.attr('data-scrollbarposition', settings.scrollbarposition);

				var $bemaxscripts = bemax_scripts_free();
				$bemaxscripts.bemax_scrollbar();

			}
			else {
				$scope.removeClass('bemax_scrollbar');
				$scope.removeAttr('data-scrollbarheight');
				$scope.removeAttr('data-scrollbarwidth');
				$scope.removeAttr('data-scrollbaraxis');
				$scope.removeAttr('data-scrollbarstyle');
				$scope.removeAttr('data-scrollbarautohide');
				$scope.removeAttr('data-scrollbarposition');
			}





			if ( 0 !== settings.length ) {
				return settings;
			}

			return false;
		}



	};

	$(window).on('elementor/frontend/init', function () {

			elementorFrontend.hooks.addAction( 'frontend/element_ready/section', BEMAXscrollbar );
	});

}(jQuery));
