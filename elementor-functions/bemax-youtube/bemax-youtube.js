(function ($) {
	var BEMAXYoutubeBg = function($scope,$){
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

			settings.youtube = sectionData[ 'bemax_youtube' ];
			settings.youtubebgid = sectionData[ 'bemax_youtube_id' ];
			settings.youtubebgmute = sectionData[ 'bemax_youtube_sound' ];
			settings.youtubebgratio = sectionData[ 'bemax_youtube_ratio' ];
			settings.youtubebgrepeat = sectionData[ 'bemax_youtube_repeat' ];
			settings.youtubebghidetop = sectionData[ 'bemax_youtube_hide' ];
			settings.youtubebgparallax = sectionData[ 'bemax_youtube_parallax' ];
			settings.youtubebgstart = sectionData[ 'bemax_youtube_start' ];
			settings.youtubebgstop = sectionData[ 'bemax_youtube_stop' ];
			settings.youtubebgwidth = sectionData[ 'bemax_youtube_width' ];


			if(settings.youtube === 'yes'){
				$scope.addClass('bemax_youtubebg');

				$scope.attr('data-youtubebgid',settings.youtubebgid);

				if(settings.youtubebgmute == 'false'){
					$scope.attr('data-youtubebgmute',settings.youtubebgmute);
				}
				else {
					$scope.attr('data-youtubebgmute','true');
				}

				if(settings.youtubebgrepeat == 'true'){
					$scope.attr('data-youtubebgrepeat',settings.youtubebgrepeat);
				}
				else {
					$scope.attr('data-youtubebgrepeat','false');
				}

				$scope.attr('data-youtubebgratio',settings.youtubebgratio);
				$scope.attr('data-youtubebghidetop',settings.youtubebghidetop);
				$scope.attr('data-youtubebgparallax',settings.youtubebgparallax);
				$scope.attr('data-youtubebgstart',settings.youtubebgstart);
				$scope.attr('data-youtubebgstop',settings.youtubebgstop);
				$scope.attr('data-youtubebgwidth',settings.youtubebgwidth);

				var $bemaxscripts = bemax_scripts_free();
				$bemaxscripts.bemax_youtube_background();
			}
			else {
				$scope.removeClass('bemax_youtubebg');

				$scope.removeAttr('data-youtubebgid');
				$scope.removeAttr('data-youtubebgmute');
				$scope.removeAttr('data-youtubebgratio');
				$scope.removeAttr('data-youtubebgrepeat');
				$scope.removeAttr('data-youtubebghidetop');
				$scope.removeAttr('data-youtubebgparallax');
				$scope.removeAttr('data-youtubebgstart');
				$scope.removeAttr('data-youtubebgstop');
				$scope.removeAttr('data-youtubebgwidth');
			}





			if ( 0 !== settings.length ) {
				return settings;
			}

			return false;
		}



	};

	$(window).on('elementor/frontend/init', function () {

			elementorFrontend.hooks.addAction( 'frontend/element_ready/section', BEMAXYoutubeBg );
	});

}(jQuery));
