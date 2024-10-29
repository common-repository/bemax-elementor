
function bemax_scripts_free(){

  function bemax_youtube_background(){

    jQuery(function($){

      setTimeout(function(){
        var $selector = $(".bemax_youtubebg");

        $selector.each(function(){
          var $this = jQuery(this);
          var $youtubebgid = jQuery(this).attr('data-youtubebgid');
          var $youtubebgmute = (jQuery(this).attr('data-youtubebgmute') == "true");
          var $youtubebgratio = jQuery(this).attr('data-youtubebgratio');
          var $youtubebgrepeat = (jQuery(this).attr('data-youtubebgrepeat') == "true");
          var $youtubebgparallax = jQuery(this).attr('data-youtubebgparallax');
          var $youtubebghidetop = jQuery(this).attr('data-youtubebghidetop');
          $youtubebghidetop = $youtubebghidetop.replace('-', '');
          $youtubebghidetop = $youtubebghidetop.replace('px', '');
          var $youtubebgstart = jQuery(this).attr('data-youtubebgstart');
          var $youtubebgstop = jQuery(this).attr('data-youtubebgstop');
          var $youtubebgwidth = jQuery(this).attr('data-youtubebgwidth');

          var $sectionInitialHeight = $this.outerHeight();
          var $sectionwidth = $this.outerWidth();

          var $windowwidth = $(window).width();
          var $videowidth = $windowwidth;
          if($youtubebgwidth == 'section'){
            $videowidth = $sectionwidth;
          }
          $videowidth = $videowidth*1.4;



          if($this.find('.bemax_youtube_background_container').length == 0){
              $(this).prepend('<div class="bemax_youtube_background_container"></div>');
          }

          if($this.find('.bemax_youtube_background_video').length == 0) {
            $this.find('.bemax_youtube_background_container').prepend('<div class="bemax_youtube_background_video" style="margin-top:-'+$youtubebghidetop+'px;"></div>');
          }


          if($this.find('.bemax_youtube_black').length == 0){
            $this.find('.bemax_youtube_background_container').append('<div class="bemax_youtube_black"></div>');
          }



          if($windowwidth <= 768 && $youtubebgwidth == 'window'){
            $videowidth = ($videowidth*4);
            $sectionwidth = ($sectionwidth*4);

          }
          $this.find('.bemax_youtube_background_video').css({position: 'absolute', top: 0, width: $videowidth });
          $this.find('.bemax_youtube_background_video').css({left:-($videowidth/2 - $sectionwidth/2) });


          $this.find('.bemax_youtube_background_container').css({width: $videowidth, height: $sectionInitialHeight});



          if($youtubebgparallax == 'yes'){
            jQuery(window).scroll(function() {
              var scroll = jQuery(window).scrollTop();
              var windowheight = jQuery(window).outerHeight();
              var sectionoffset = $this.offset();
              var sectionheight = $this.outerHeight();

              if((sectionoffset.top <= scroll && sectionoffset.top+sectionheight) > scroll){
                $this.find('.bemax_youtube_background_container').attr('data-top', scroll);
                if($sectionwidth*1.4 >= $videowidth && $youtubebgwidth == 'window'){
                  $this.attr('data-sw', $sectionwidth*1.4);
                  $this.attr('data-vw', $videowidth);
                  $this.find('.bemax_youtube_background_container').css({top: 0, position: 'fixed'});
                }
                else{
                  $this.find('.bemax_youtube_background_container').css({top: scroll-sectionoffset.top});
                }

              }
              else {
                $this.find('.bemax_youtube_background_container').css({position: 'absolute', top: 0});
              }

            });
          }


          if($(this).find('.bemax_youtube_background_video').length != 0){


            $(this).find('.bemax_youtube_background_video').YTPlayer({
            ratio: eval($youtubebgratio),
            videoId: $youtubebgid,
            mute: $youtubebgmute,
            repeat: $youtubebgrepeat,
            width: $videowidth,
            playButtonClass: 'YTPlayer-play',
            pauseButtonClass: 'YTPlayer-pause',
            muteButtonClass: 'YTPlayer-mute',
            volumeUpClass: 'YTPlayer-volume-up',
            volumeDownClass: 'YTPlayer-volume-down',
            start: $youtubebgstart,
            pauseOnScroll: false,
            fitToBackground: false,
            playerVars: {
              iv_load_policy: 3,
              modestbranding: 1,
              autoplay: 1,
              controls: 0,
              showinfo: 0,
              wmode: 'opaque',
              branding: 0,
              autohide: 0,
              rel: 0,
              start: $youtubebgstart,
              end: $youtubebgstop,
            },
            callback: function() {

                var player = $this.find('.bemax_youtube_background_video').data('ytPlayer').player;
                var $iframe = player.getIframe();
                var $blackheight = (2 + parseInt($iframe.height) - parseInt($youtubebghidetop));


                $this.find('.bemax_youtube_black').after('<div class="bemax_youtube_background_overlay"></div>');


                $this.find('.bemax_youtube_black').css({background: '#000000', height: $blackheight});

                player.addEventListener('onStateChange', function(data){
                  if(YT.PlayerState.PLAYING){
                    setTimeout(function(){
                      $this.find('.bemax_youtube_black').stop().animate({opacity: 0}, 1000);
                      $this.addClass('bemax_youtube_bg');
                    }, 500);
                  }
                  if(YT.PlayerState.ENDED || YT.PlayerState.PAUSED){
                    if($this.hasClass('bemax_youtube_bg')){
                      $this.find('.bemax_youtube_black').css({opacity: 1});
                      $this.removeClass('bemax_youtube_bg');
                    }
                  }
                });

            }

          });



          }
          var $settingsHeight = $(this).find('.elementor-editor-element-settings').outerHeight();
          $(this).find('.elementor-editor-element-settings').css({zIndex: 999, top: parseInt($settingsHeight)+'px'})

        });

      }, 500);








    });


  }


    function bemax_scrollbar(){

    jQuery(function($){


        jQuery('.bemax_scrollbar').each(function(){
          $(this).wrapInner('<div class="bemax_scrollbar_inner_wrapper"></div>');

          var $scrollbarheight = jQuery(this).attr('data-scrollbarheight');
          var $scrollbarwidth = jQuery(this).attr('data-scrollbarwidth');
          var $scrollbaraxis = jQuery(this).attr('data-scrollbaraxis');
          var $scrollbarstyle = jQuery(this).attr('data-scrollbarstyle');
          var $scrollbarautohide = jQuery(this).attr('data-scrollbarautohide');
          var $scrollbarposition = jQuery(this).attr('data-scrollbarposition');

          var $hide = ($scrollbarautohide == "true");


          $(this).find('.bemax_scrollbar_inner_wrapper').mCustomScrollbar({
            setHeight: $scrollbarheight,
            setWidth: $scrollbarwidth,
            axis: $scrollbaraxis,
            theme: $scrollbarstyle,
            autoHideScrollbar: $hide,
            scrollbarPosition: $scrollbarposition
          });
          $(this).removeClass('bemax_opacity_class');
          var $settingsHeight = $(this).find('.elementor-editor-element-settings').outerHeight();
          $(this).find('.elementor-editor-element-settings').css({zIndex: 999, top: parseInt($settingsHeight)+'px'})
        });



    });

  }





  function bemax_tilt_effect(){

    jQuery(function($){


      $('.bemax_tilteffect').on('mouseenter', function(){
        $(this).parents('body').addClass('bemax_overflow');
      });
      $('.bemax_tilteffect').on('mouseleave', function(){
        $thiselem = $(this);
        setTimeout(function(){
          $thiselem.parents('body').removeClass('bemax_overflow');
        }, 200);

      });

      $('.bemax_tilteffect').each(function(){
        $(this).wrap('<div class="bemax_tilteffect_outer_wrapper"></div>');

        var $tilteffectapplyto = $(this).attr('data-tilteffectapplyto');
        var $tilteffectparallax = $(this).attr('data-tilteffectparallax');
        var $tilteffectperspective = $(this).attr('data-tilteffectperspective');
        var $tilteffectscale = $(this).attr('data-tilteffectscale');

        if($tilteffectapplyto == 'modules') {
          $(this).parent('.bemax_tilteffect_outer_wrapper').find('.elementor-element').tilt({
            perspective: parseInt($tilteffectperspective),
            scale: parseInt($tilteffectscale),
          })
        }

        if($tilteffectapplyto == 'onlyelements') {
          $(this).parent('.bemax_tilteffect_outer_wrapper').find('.elementor-widget').tilt({
            perspective: parseInt($tilteffectperspective),
            scale: parseInt($tilteffectscale),
          })
        }

        if($tilteffectapplyto == 'section'){
          if($tilteffectparallax == 'yes'){
            $(this).parent('.bemax_tilteffect_outer_wrapper').addClass('bemax_tilt_parallax');
          }
          $(this).parent('.bemax_tilteffect_outer_wrapper').tilt({
            perspective: parseInt($tilteffectperspective),
            scale: parseInt($tilteffectscale),
          });
        }

        $(this).removeClass('bemax_opacity_class');

      });





    });


  }


  function bemax_offcanvas(){

    jQuery(function($){
      var $offcanvaswidth = $('.bemax_offcanvas').first().attr('data-offcanvaswidth');
      var $offcanvasstyle = $('.bemax_offcanvas').first().attr('data-offcanvasstyle');
      var $offcanvasopenicon = $('.bemax_offcanvas').first().attr('data-offcanvasopenicon');
      var $offcanvasiconsize = $('.bemax_offcanvas').first().attr('data-offcanvasiconsize');
      var $offcanvasclosedicon = $('.bemax_offcanvas').first().attr('data-offcanvasclosedicon');
      var $offcanvasiconbackground = $('.bemax_offcanvas').first().attr('data-offcanvasiconbackground');
      var $offcanvasiconcolor = $('.bemax_offcanvas').first().attr('data-offcanvasiconcolor');
      var $offcanvastop = $('.bemax_offcanvas').first().attr('data-offcanvastop');
      var $offcanvasleft = $('.bemax_offcanvas').first().attr('data-offcanvasleft');
      var $offcanvasbuttontext = $('.bemax_offcanvas').first().attr('data-offcanvasbuttontext');
      var $offcanvasheight = $('.bemax_offcanvas').first().attr('data-offcanvasheight');
      var $offcanvasinsideposition = $('.bemax_offcanvas').first().attr('data-offcanvasinsideposition');
      var $offcanvasstate = $('.bemax_offcanvas').first().attr('data-offcanvasstate');
      var $offcanvasbuttons = $('.bemax_offcanvas').first().attr('data-offcanvasbuttons');
      if($offcanvasstate == 'closed'){
        $offcanvasbuttons = 'yes';
      }



      $('.bemax_offcanvas').first().wrapInner('<div class="bemax_offcanvas_inner_wrapper"></div>');
      $('.bemax_offcanvas').first().find('.bemax_offcanvas_inner_wrapper').bemaxoffCanvas({
        width : $offcanvaswidth,
        scroll : $offcanvasstyle,
        openicon : $offcanvasopenicon,
        closedicon : $offcanvasclosedicon,
        iconsize : $offcanvasiconsize,
        iconcolor : $offcanvasiconcolor,
        iconbackground : $offcanvasiconbackground,
        positiony : $offcanvastop,
        positionx : $offcanvasleft,
        buttontext : $offcanvasbuttontext,
        height : $offcanvasheight,
        insideposition : $offcanvasinsideposition,
        initial: $offcanvasstate,
        buttons: $offcanvasbuttons,
      });
      $('.bemax_offcanvas').removeClass('bemax_opacity_class');
      var $settingsHeight = $('.bemax_offcanvas').first().find('.bemax_offcanvas_inner_wrapper').find('.elementor-editor-element-settings').outerHeight();
      $('.bemax_offcanvas').first().find('.bemax_offcanvas_inner_wrapper').find('.elementor-editor-element-settings').css({zIndex: 999, top: parseInt($settingsHeight)+'px'})

    });




  }

  function bemax_particles_background(){


      jQuery('.bemax_particles_bg').each(function(){
        jQuery(this).wrapInner('<div class="bemax_particles_inner_wrapper"></div>');
        var $particlesdotscolor = jQuery(this).attr('data-particlesdotscolor');
        var $particleslinescolor = jQuery(this).attr('data-particleslinescolor');
        var $particlesdirectionx = jQuery(this).attr('data-particlesdirectionx');
        var $particlesdirectiony = jQuery(this).attr('data-particlesdirectiony');
        var $particlesdensity = jQuery(this).attr('data-particlesdensity');
        var $particlesradius = jQuery(this).attr('data-particlesradius');
        var $particleslinewidth = jQuery(this).attr('data-particleslinewidth');
        var $particlesparallax = jQuery(this).attr('data-particlesparallax');



        jQuery(this).find('.bemax_particles_inner_wrapper').particleground({
            dotColor: $particlesdotscolor,
            lineColor: $particleslinescolor,
            directionX: $particlesdirectionx,
            directionY: $particlesdirectiony,
            density: $particlesdensity,
            particleRadius: $particlesradius,
            lineWidth: $particleslinewidth,
            parallax: $particlesparallax,
        });
        jQuery(this).removeClass('bemax_opacity_class');

      });

  }

  return {
    bemax_scrollbar: bemax_scrollbar,
    bemax_tilt_effect: bemax_tilt_effect,
    bemax_offcanvas: bemax_offcanvas,
    bemax_particles_background: bemax_particles_background,
    bemax_youtube_background: bemax_youtube_background,
  };

}






//BUILDER
jQuery(function($) {

    jQuery(document).on('mouseenter', function(){
      if(jQuery("#et-fb-app").length != 0) {


      }
    });

});

//FRONT
jQuery(document).ready(function(){


  if(jQuery("#elementor").length == 0) {

    bemax_scripts_free().bemax_scrollbar();
    bemax_scripts_free().bemax_tilt_effect();
    bemax_scripts_free().bemax_offcanvas();
    bemax_scripts_free().bemax_particles_background();
    bemax_scripts_free().bemax_youtube_background();

  }

})
