(function ($) {
	var BEMAXsidebar = function($scope,$){
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

			settings.sidebar = sectionData[ 'bemax_sidebar' ];
			settings.sidebarwidth = sectionData[ 'bemax_sidebar_width' ];
			settings.sidebarstyle = sectionData[ 'bemax_sidebar_style' ];
			settings.sidebaropenicon = sectionData[ 'bemax_sidebar_openicon' ];
			settings.sidebariconsize = sectionData[ 'bemax_sidebar_iconsize' ];
			settings.sidebarcloseicon = sectionData[ 'bemax_sidebar_closeicon' ];
			settings.sidebariconbackground = sectionData[ 'bemax_sidebar_iconbackground' ];
			settings.sidebariconcolor = sectionData[ 'bemax_sidebar_iconcolor' ];
			settings.sidebartop = sectionData[ 'bemax_sidebar_top' ];
			settings.sidebarleft = sectionData[ 'bemax_sidebar_left' ];
			settings.sidebarbuttontext = sectionData[ 'bemax_sidebar_buttontext' ];
			settings.sidebarheight = sectionData[ 'bemax_sidebar_height' ];
			settings.sidebarinsideposition = sectionData[ 'bemax_sidebar_insideposition' ];
			settings.sidebarinitialstate = sectionData[ 'bemax_sidebar_initial_state' ];
			settings.sidebarbuttons = sectionData[ 'bemax_sidebar_buttons' ];



			if(settings.sidebar === 'yes'){
				$scope.addClass('bemax_offcanvas bemax_opacity_class');

				$scope.attr('data-offcanvaswidth', settings.sidebarwidth);
				$scope.attr('data-offcanvasstyle', settings.sidebarstyle);
				$scope.attr('data-offcanvasopenicon', settings.sidebaropenicon);
				$scope.attr('data-offcanvasiconsize', settings.sidebariconsize);
				$scope.attr('data-offcanvasclosedicon', settings.sidebarcloseicon);
				$scope.attr('data-offcanvasiconbackground', settings.sidebariconbackground);
				$scope.attr('data-offcanvasiconcolor', settings.sidebariconcolor);
				$scope.attr('data-offcanvastop', settings.sidebartop);
				$scope.attr('data-offcanvasleft', settings.sidebarleft);
				$scope.attr('data-offcanvasbuttontext', settings.sidebarbuttontext);
				$scope.attr('data-offcanvasheight', settings.sidebarheight);
				$scope.attr('data-offcanvasinsideposition', settings.sidebarinsideposition);
				$scope.attr('data-offcanvasstate', settings.sidebarinitialstate);
				$scope.attr('data-offcanvasbuttons', settings.sidebarbuttons);

				var $bemaxscripts = bemax_scripts_free();
				$bemaxscripts.bemax_offcanvas();

			}
			else {
				$scope.removeClass('bemax_offcanvas');
				$scope.removeClass('bemax_offcanvas_offcanvas');
				$('.bemax_offcanvas_offcanvas_button_wrapper').remove();

				$scope.removeAttr('data-offcanvaswidth');
				$scope.removeAttr('data-offcanvasstyle');
				$scope.removeAttr('data-offcanvasopenicon');
				$scope.removeAttr('data-offcanvasiconsize');
				$scope.removeAttr('data-offcanvasclosedicon');
				$scope.removeAttr('data-offcanvasiconbackground');
				$scope.removeAttr('data-offcanvasiconcolor');
				$scope.removeAttr('data-offcanvastop');
				$scope.removeAttr('data-offcanvasleft');
				$scope.removeAttr('data-offcanvasbuttontext');
				$scope.removeAttr('data-offcanvasheight');
				$scope.removeAttr('data-offcanvasinsideposition');
				$scope.removeAttr('data-offcanvasstate');
				$scope.removeAttr('data-offcanvasbuttons');

			}





			if ( 0 !== settings.length ) {
				return settings;
			}

			return false;
		}



	};

	$(window).on('elementor/frontend/init', function () {

			elementorFrontend.hooks.addAction( 'frontend/element_ready/section', BEMAXsidebar );
	});

}(jQuery));
