(function($){
  $.fn.bemaxoffCanvas = function(options){
    var $this = $(this);
    var $windowsize = $(window).outerHeight();
    var $windowwidth = $(window).outerWidth();
    //settings

    var defaults = {
        width : '300px',
        scroll : 'rounded-dots',
        openicon : 'a',
        closedicon : 'Q',
        iconsize : '30',
        iconcolor : '#ffffff',
        iconbackground : '#111111',
        positiony : '100px',
        positionx : '50px',
        buttontext : '',
        height : 'auto',
        insideposition : 'middle',
        initial: 'closed',
        buttons: 'yes',
    }

    var settings = $.extend({}, defaults, options);
    var $finalwidth = parseInt(settings.width);
    var $finalheight = $windowsize;
    var $buttontext = '';
    if(settings.height != 'auto' && settings.height != ''){
      $finalheight = settings.height;
    }
    if($windowwidth < 768){$finalwidth = $windowwidth;}
    if(settings.buttontext != ''){
      $buttontext = '<span style="color:'+settings.iconcolor+';" class="bemax_offcanvas_offcanvas_button_text">'+settings.buttontext+'</span>';
    }

    // code begin
    if($('.bemax_offcanvas').length && settings.buttons == 'yes'){
      jQuery('body').append('<span class="bemax_offcanvas_offcanvas_button_wrapper bemax_offcanvas_offcanvas_button_click">'+$buttontext+'<i class="'+settings.openicon+'"></i></span>');
      $this.prepend('<span class="bemax_offcanvas_offcanvas_button_click bemax_offcanvas_offcanvas_inside bemax_inside_'+settings.insideposition+' bemax_offcanvas_offcanvas_button"><i class="'+settings.openicon+'"></i></span>');

    }

    var $outsidebuttonwidth = (parseInt(settings.iconsize)*1.3)
    if(settings.buttontext != '') {
      $outsidebuttonwidth = '';
    }

    $('.bemax_offcanvas_offcanvas_button_wrapper').css({
      left: settings.positionx,
      top: settings.positiony,
      backgroundColor: settings.iconbackground,
      height: (parseInt(settings.iconsize)*1.3),
      lineHeight: (parseInt(settings.iconsize)*1.3)+'px',
    });

    $('.bemax_offcanvas_offcanvas_button_wrapper i').css({
      color: settings.iconcolor,
      backgroundColor: settings.iconbackground,
      fontSize: parseInt(settings.iconsize),
      lineHeight: (parseInt(settings.iconsize)*1.3)+'px',
      padding: '0 0.3em',
    });


    $('.bemax_offcanvas_offcanvas_button').css({
      color: settings.iconcolor,
      backgroundColor: settings.iconbackground,
      fontSize: parseInt(settings.iconsize),
      height: (parseInt(settings.iconsize)*1.3),
      width: (parseInt(settings.iconsize)*1.3),
      lineHeight: (parseInt(settings.iconsize)*1.3)+'px',
    });


    $this.mCustomScrollbar({
      setHeight: $finalheight,
      setWidth: false,
      axis: 'y',
      theme: settings.scroll,
      scrollbarPosition: 'inside'
    });

    var $newheight = $this.outerHeight();
    $('.bemax_inside_top').css({top: '10px' });
    $('.bemax_inside_middle').css({top: ($newheight/2) - (settings.iconsize/2) });
    $('.bemax_inside_bottom').css({bottom: '10px' });

    if(settings.initial == 'open') {

      $this.addClass('bemax_offcanvas_offcanvas bemax_offcanvas_offcanvas_show');
      $('.bemax_offcanvas_offcanvas_button').find('i').attr('class', settings.closedicon);
      $('.bemax_offcanvas_offcanvas_button_wrapper').css({opacity: 0});
      $('.bemax_offcanvas_offcanvas_inside').css({opacity: 0, position: 'absolute'});

      $this.css({
        width: $finalwidth,
      });
      $this.css({left: 0});
      $('.bemax_offcanvas_offcanvas_inside').css({opacity: '', position: 'fixed'});


    }
    else {
      $this.addClass('bemax_offcanvas_offcanvas bemax_offcanvas_offcanvas_hide');
      $this.css({
        left: -($finalwidth),
      });
    }

    $('.bemax_offcanvas_offcanvas_button_click').on('click', function(){
      if($this.hasClass('bemax_offcanvas_offcanvas_hide')){


        $('.bemax_offcanvas_offcanvas_button').find('i').attr('class', settings.closedicon);
        $('.bemax_offcanvas_offcanvas_button_wrapper').css({opacity: 0});
        $('.bemax_offcanvas_offcanvas_inside').css({opacity: 0, position: 'absolute'});

        $this.css({
          width: $finalwidth,
        });
        $this.stop().animate({left: 0}, 400, function(){
		    $('.bemax_offcanvas_offcanvas_inside').css({opacity: '', position: 'fixed'});
        $this.removeClass('bemax_offcanvas_offcanvas_hide');
        $this.addClass('bemax_offcanvas_offcanvas_show');
        });
      }

      if($this.hasClass('bemax_offcanvas_offcanvas_show')){


        $('.bemax_offcanvas_offcanvas_button').find('i').attr('class', settings.openicon);
        $('.bemax_offcanvas_offcanvas_button_wrapper').css({opacity: 1});

		$('.bemax_offcanvas_offcanvas_inside').css({opacity: 0});
        $this.stop().animate({left: -($finalwidth)}, 400, function(){
		  $('.bemax_offcanvas_offcanvas_inside').css({opacity: 0, position: 'absolute'});
          $this.removeClass('bemax_offcanvas_offcanvas_show');
          $this.addClass('bemax_offcanvas_offcanvas_hide');
          $this.css({
            width: 0,
          });
        });
      }

    });


  }
})(jQuery);
