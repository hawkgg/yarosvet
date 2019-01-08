/*-------------------------------------------------------------------------------------------------------------------------------*/
/*This is main JS file that contains custom style rules used in this template*/
/*-------------------------------------------------------------------------------------------------------------------------------*/
/* Template Name: Site Title*/
/* Version: 1.0 Initial Release*/
/* Build Date: 22-04-2015*/
/* Author: Unbranded*/
/* Website: http://moonart.net.ua/site/
/* Copyright: (C) 2015 */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------*/
/* TABLE OF CONTENTS: */
/*--------------------------------------------------------*/
/* 01 - VARIABLES */
/*-------------------------------------------------------------------------------------------------------------------------------*/

jQuery(function($) {

  "use strict";

  /*================*/
  /* 01 - VARIABLES */
  /*================*/
  var swipers = [],
    winW, winH, winScr, $container, $isotope_container_rating, _isresponsive,
    _ismobile = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i);

  /*========================*/
  /* 02 - page calculations */
  /*========================*/
  function pageCalculations() {
    winW = $(window).width();
    winH = $(window).height();
    if ($('.menu-button').is(':visible')) _isresponsive = true;
    else _isresponsive = false;
  }

  /*=================================*/
  /* 03 - function on document ready */
  /*=================================*/
  pageCalculations();

  $(document).ready(function() {
    enableComingSoonCounter();
    qtyStepper();
  });

  /*============================*/
  /* 04 - function on page load */
  /*============================*/
  $(window).on('load', function() {
    $('#loader-wrapper').fadeOut();
    $isotope_container_rating.isotope({ itemSelector: '.isotope-item-rating', masonry: { gutter: 0, columnWidth: '.grid-sizer' } });
    //izotopInit();
    if ($('.isotope-filter').length) {
      var initValue = $('.isotope-nav').find('.selected a').attr('data-filter');
      $container.isotope({ itemSelector: '.isotope-item', filter: initValue, masonry: { gutter: 0, columnWidth: '.grid-sizer' } });
    }
    if ($('.isotope').length) {
      $container.isotope({ itemSelector: '.isotope-item', masonry: { gutter: 0, columnWidth: '.grid-sizer' } });
    }
  });

  /*==============================*/
  /* 05 - function on page scroll */
  /*==============================*/
  $(window).on("scroll", function() {
    winScr = $(window).scrollTop();
    if (winScr > 0) {
      $(".tt-header").addClass("stick");
    } else {
      $(".tt-header").removeClass("stick");
    }
  });

  /*==============================*/
  /* 05 - function on page resize */
  /*==============================*/
  if (!_ismobile) {
    $(window).resize(function() {
      heightInit();
    });
  }

  $(document).ready(function() {
    function enableFullWidth() {
      initFullWidth();
      $(window).bind('load resize', function() {
        initFullWidth();
      }).trigger('resize');
    }
    enableFullWidth();

    function initFullWidth() {
      $('.fullwidth').each(function() {
        var element = $(this),
          element_x;

        // Reset Styles
        element.css('margin-left', '');
        element.css('width', '');

        // Set New Styles
        element.css('margin-left', -element.offset().left + 'px');
        element.css('width', $(window).width() + 'px');

      });

    }
    initSwiper();
  });

  /*=====================*/
  /* 07 - swiper sliders */
  /*=====================*/
  function initSwiper() {
    var initIterator = 0;
    $('.swiper-container').each(function() {
      var $t = $(this);

      var index = 'swiper-unique-id-' + initIterator;

      $t.addClass('swiper-' + index + ' initialized').attr('id', index);

      var autoPlayVar = parseInt($t.attr('data-autoplay'), 10);
      var centerVar = parseInt($t.attr('data-center'), 10);
      centerVar = centerVar ? true : false;
      var simVar = ($t.closest('.circle-description-slide-box').length) ? false : true;
      var slidesPerViewVar = parseInt($t.attr('data-slides-per-view-for-all'), 10)
      if(slidesPerViewVar) {
        var lg = slidesPerViewVar,
            md = slidesPerViewVar,
            sm = slidesPerViewVar,
            xs = slidesPerViewVar;
      } else {
        var lg = parseInt($t.attr('data-lg-slides'), 10),
            md = parseInt($t.attr('data-md-slides'), 10),
            sm = parseInt($t.attr('data-sm-slides'), 10),
            xs = parseInt($t.attr('data-xs-slides'), 10);
      }

      var loopVar = parseInt($t.attr('data-loop'), 10);
      var speedVar = parseInt($t.attr('data-speed'), 10);
      var sb_lg, sb_md, sb_sm, sb_xs;
      if (!(sb_lg = parseInt($t.attr('data-sb-lg'), 10))) sb_lg = 1;
      if (!(sb_md = parseInt($t.attr('data-sb-md'), 10))) sb_md = 1;
      if (!(sb_sm = parseInt($t.attr('data-sb-sm'), 10))) sb_sm = 1;
      if (!(sb_xs = parseInt($t.attr('data-sb-xs'), 10))) sb_xs = 1;

      var autoHeightVar;
      if (!(autoHeightVar = $t.attr('data-auto-height'))) autoHeightVar = false;

      swipers['swiper-' + index] = new Swiper('.swiper-' + index, {
        speed: speedVar,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        loop: loopVar,
        autoplay: autoPlayVar,
        keyboard: {
          enabled: true,
          onlyInViewport: false,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        autoHeight: autoHeightVar,
        parallax: true,
        simulateTouch: simVar,
        centeredSlides: centerVar,
        roundLengths: true,
        breakpoints: {
            1600: {
              slidesPerView: lg,
              spaceBetween: sb_lg,
            },
            1200: {
              slidesPerView: md,
              spaceBetween: sb_md,
            },
            992: {
              slidesPerView: sm,
              spaceBetween: sb_sm,
            },
            768: {
              slidesPerView: xs,
              spaceBetween: sb_xs,
            },
        },
        onSlideChangeEnd: function(swiper) {
          var activeIndex = (loopVar === true) ? swiper.activeIndex : swiper.activeLoopIndex;
          var qVal = $t.find('.swiper-slide-active').attr('data-val');
          $t.find('.swiper-slide[data-val="' + qVal + '"]').addClass('active');
        },
        onSlideChangeStart: function(swiper) {
          $t.find('.swiper-slide.active').removeClass('active');
        },
        onSlideClick: function(swiper) {

        }
      });
      initIterator++;
    });

  }

  /*==============================*/
  /* 08 - buttons, clicks, hovers */
  /*==============================*/
  //menu
  $('.cmn-toggle-switch').on('click', function(e) {
    $(this).toggleClass('active');
    $(this).parents('header').find('.toggle-block').slideToggle();
    e.preventDefault();
  });
  $('.main-nav .menu-toggle').on('click', function(e) {
    $(this).closest('li').addClass('active').siblings('.active').removeClass('active');
    $(this).closest('li').siblings('.parent').find('ul').slideUp();
    $(this).parent().siblings('ul').slideToggle();
    e.preventDefault();
  });
  $('.main-nav .menu-toggle-inner').on('click', function(e) {
    $(this).closest('li').addClass('active').siblings('.active').removeClass('active');
    $(this).closest('li').siblings('li').find('ul').slideUp();
    $(this).parent().siblings('ul').slideToggle();
    e.preventDefault();
  });

  //video-popup
  $('.tt-video-img,.tt-open-video,.c-btn-video-one').each(function(){
    $(this).on("click", function(e) {
      var video = $('.tt-video-img').data('video');
      $('.tt-video-popup').addClass('active');
      $('.tt-video-popup').find('iframe').attr('src', video);
      e.preventDefault();
    });
  });

  $('.tt-video-img-two,.tt-open-video,.c-btn-video-two').each(function(){
    $(this).on("click", function(e) {
      var video = $('.tt-video-img-two').data('video');
      $('.tt-video-popup-two').addClass('active');
      $('.tt-video-popup-two').find('iframe').attr('src', video);
      e.preventDefault();
    });
  });

  $('.tt-video-close, .tt-video-caption').on("click", function(e) {
    $('.tt-video-popup').removeClass('active');
    $('.tt-video-popup').find('iframe').attr('src', 'about:blank');
    e.preventDefault();
  });

  /*==================================================*/
  /* 09 - form elements - checkboxes and radiobuttons */
  /*==================================================*/
  //Tabs
  var tabFinish = 0;
  $('.tt-nav-tab-item').on('click', function() {
    var $t = $(this);
    if (tabFinish || $t.hasClass('active')) return false;
    tabFinish = 1;
    $t.closest('.tt-nav-tab').find('.tt-nav-tab-item').removeClass('active');
    $t.addClass('active');
    var index = $t.parent().parent().find('.tt-nav-tab-item').index(this);
    $t.parents('.tt-tab-nav-wrapper').find('.tt-tab-select select option:eq(' + index + ')').prop('selected', true);
    $t.closest('.tt-tab-wrapper').find('.tt-tab-info:visible').fadeOut(500, function() {
      var $tabActive = $t.closest('.tt-tab-wrapper').find('.tt-tab-info').eq(index);
      $tabActive.css('display', 'block').css('opacity', '0');
      tabReinit($tabActive.parents('.tt-tab-wrapper'));
      $tabActive.animate({ opacity: 1 });
      tabFinish = 0;
    });
  });
  $('.tt-tab-select select').on('change', function() {
    var $t = $(this);
    if (tabFinish) return false;
    tabFinish = 1;
    var index = $t.find('option').index($(this).find('option:selected'));
    $t.closest('.tt-tab-nav-wrapper').find('.tt-nav-tab-item').removeClass('active');
    $t.closest('.tt-tab-nav-wrapper').find('.tt-nav-tab-item:eq(' + index + ')').addClass('active');
    $t.closest('.tt-tab-wrapper').find('.tt-tab-info:visible').fadeOut(500, function() {
      var $tabActive = $t.closest('.tt-tab-wrapper').find('.tt-tab-info').eq(index);
      $tabActive.css('display', 'block').css('opacity', '0');
      tabReinit($tabActive.parents('.tt-tab-wrapper'));
      $tabActive.animate({ opacity: 1 });
      tabFinish = 0;
    });
  });

  function tabReinit($tab) {
    $tab.find('.swiper-container').each(function() {
      var thisSwiper = swipers['swiper-' + $(this).attr('id')],
        $t = $(this);
    });
  }

  //isotope filter
  $container = $('.isotope-content');
  $isotope_container_rating = $('.isotope-content-rating');
  $('.isotope-nav').on('click', 'a', function(e) {
    var filterValue = $(this).attr('data-filter');
    var $buttonGroup = $(this).parent().parent();
    var index = $buttonGroup.find('li').index($(this).parent());
    $buttonGroup.siblings('.isotope-select').find('option:eq(' + index + ')').prop('selected', true);
    $container.isotope({ filter: filterValue });
    $buttonGroup.find('.selected').removeClass('selected');
    $(this).parent().addClass('selected');
    e.preventDefault();
  });
  $('.isotope-select select').on('change', function() {
    var filterValue = $(this).find('option:selected').val();
    var index = $(this).find('option').index($(this).find('option:selected'));
    $container.isotope({ filter: filterValue });
    var $buttonGroup = $(this).parents('.isotope-select').siblings('.isotope-nav');
    $buttonGroup.find('.selected').removeClass('selected');
    $buttonGroup.find('li').eq(index).addClass('selected');
  });

  /*accordion*/
  $('.tt-accordion-title').on('click', function(e) {
    if ($(this).hasClass('active')) {
      $(this).siblings('.tt-accordion-body').slideUp();
      $(this).removeClass('active');
    } else {
      $(this).closest('.tt-accordion').find('.tt-accordion-title.active').removeClass('active');
      $(this).closest('.tt-accordion').find('.tt-accordion-body').slideUp('slow');
      $(this).toggleClass('active');
      $(this).siblings('.tt-accordion-body').slideToggle('slow');
    }
    e.preventDefault();
  });

  /*tt-mslide-2 scroll*/
  $(document).on('click', '.tt-mslide-2-arrow', function(e) {
    var $slide = $(this).parents('.tt-mslide-2'),
      offset = $slide.offset().top,
      height = $slide.height(),
      headerH = $('.tt-header .top-inner').height();
    scroll = offset + height - headerH;
    $('html,body').animate({ scrollTop: scroll }, 1000);
    e.preventDefault();
  });

  /*tt-scroll-link*/
  if ($('.tt-scroll-link').length) {
    $(document).on('click', '.tt-scroll-link', function(e) {
      var offset = $('.tt-scroll-block').offset().top,
        headerH = $('.tt-header .top-inner').height();
      scroll = offset - headerH;
      $('html,body').animate({ scrollTop: scroll }, 1000);
      e.preventDefault();
    });
  }

  $('.player').mb_YTPlayer();


  function heightInit() {
    (function($) {
      var adminHeight = ($('body').hasClass('admin-bar')) ? 32 : 0,
        ttHeaderHeight = $('.tt-header').height(),
        totalHeight = adminHeight + ttHeaderHeight;
      $('.tt-full-height').height($(window).height() - totalHeight);
      $('.tt-height-parent').each(function() {
        $(this).height($(this).parent().first().height());
      });
    })(jQuery);
  }

  function qtyStepper() {

    if (typeof $.fn.number != 'function') {
      return;
    }

    if ($('input[type=number]').length) {
      $('input[type=number]').number();
    };
  }

  function enableComingSoonCounter() {
    $('.tt-coming-soon-counter').each(function() {
      var el = $(this),
        todayDate = new Date(),
        countDate = new Date(el.data('countdate')),
        $days = el.find('.tt-c-days'),
        $hours = el.find('.tt-c-hours'),
        $minutes = el.find('.tt-c-minutes'),
        $seconds = el.find('.tt-c-seconds');

      var dif = countDate.getTime() - todayDate.getTime();

      // Start Counter
      if (dif > 0) {
        console.log('sdfsd');
        updateComingSoonCounter();
        var counterInterval = setInterval(function() {
          updateComingSoonCounter();
        }, 1000);
      } else {
        $days.text(0);
        $hours.text(0);
        $minutes.text(0);
        $seconds.text(0);
      }

      // Update Coming Soon Counter
      function updateComingSoonCounter() {
        todayDate = new Date();

        var daysDif = getDaysDifference(todayDate, countDate),
          hoursDif = getHoursDifference(todayDate, countDate),
          minutesDif = getMinutesDifference(todayDate, countDate),
          secondsDif = getSecondsDifference(todayDate, countDate);

        if (secondsDif > 0) {

          // Fix Seconds, Minutes And Hours
          secondsDif -= minutesDif * 60;
          minutesDif -= hoursDif * 60;
          hoursDif -= daysDif * 24;

          // Update The Counters
          $days.text(daysDif);
          $hours.text(hoursDif);
          $minutes.text(minutesDif);
          $seconds.text(secondsDif);

        } else {
          clearInterval(counterInterval);

          // Update The Counters
          $days.text(0);
          $hours.text(0);
          $minutes.text(0);
          $seconds.text(0);
        }
      }

      // Get Floored Difference In Days Between Two Dates
      function getDaysDifference(now, then) {
        return Math.floor((then.getTime() - now.getTime()) / (1000 * 60 * 60 * 24));
      }

      // Get Floored Difference In Hours Between Two Dates
      function getHoursDifference(now, then) {
        return Math.floor((then.getTime() - now.getTime()) / (1000 * 60 * 60));
      }

      // Get Floored Difference In Minutes Between Two Dates
      function getMinutesDifference(now, then) {
        return Math.floor((then.getTime() - now.getTime()) / (1000 * 60));
      }

      // Get Floored Difference In Seconds Between Two Dates
      function getSecondsDifference(now, then) {
        return Math.floor((then.getTime() - now.getTime()) / (1000));
      }

    });
  }

  /*==================================================*/
  /* 10 - My javascript code */
  /*==================================================*/
  //Form submit

  $('footer .wpcf7').on('wpcf7mailsent', function(){
    $('.send-form').click();
  });

  $( '.tt-header .cmn-toggle-switch' ).on( 'click', function( event ) {
      $('.tt-header .toggle-block').css('display:block !important');
  });



  /*==================================================*/
  /* 11 - ISOTOPE FILTERING */
  /*==================================================*/

    var filterFns = {
      // show if number is greater than 50
      // numberGreaterThan50: function() {
      //   var number = $(this).find('.number').text();
      //   return parseInt( number, 10 ) > 50;
      // }
    };


    // bind filter button click
    jQuery('.isotope-filter button').on( 'click', function() {
      var jQueryfilterButtonGroup = jQuery( this ).parent();
      var isHashing = jQueryfilterButtonGroup.attr('data-is-hashing');
      var target = jQueryfilterButtonGroup.attr('data-target');

      var hashFilter = jQuery( this ).attr('data-filter');
      // set filter in hash

      if (isHashing == '1') {
        if (hashFilter[0] != '*') hashFilter = hashFilter.slice(1);
        location.hash = 'filter=' + encodeURIComponent( hashFilter );
      } else {
        isoFilter(target, hashFilter);
        jQueryfilterButtonGroup.find('.is-checked').removeClass('is-checked');
        jQuery( this ).addClass('is-checked');
      }
    });

    // bind filter on select change
    $('.isotope-select').on( 'change', function() {
      var jQueryfilterButtonGroup = jQuery( this ).parent();
      var isHashing = jQueryfilterButtonGroup.attr('data-is-hashing');
      var target = jQueryfilterButtonGroup.attr('data-target');

      // get filter value from option value
      var hashFilter = jQuery( this ).find('option:selected').attr('data-filter');

      if (isHashing == '1') {
        if (hashFilter[0] != '*') hashFilter = hashFilter.slice(1);
        location.hash = 'filter=' + encodeURIComponent( hashFilter );
      } else {
        isoFilter(target, hashFilter);
      }

    });


    function isoFilter(target, hashFilter) {
      if (! $(target).hasClass('isotope')) {
        target = target + ' .isotope';
      }
      // filter isotope
      $(target).isotope({
        itemSelector: target + ' .isotope-item',
        // use filterFns
        filter: filterFns[ hashFilter ] || hashFilter
      });

      if ($(target).find('fitWidth')) {
        $(target).isotope({
          masonry: {
            fitWidth: true,
          },
        });
      }
    }

    var isIsotopeInit = false;

    function getHashFilter() {
      // get filter=filterName
      var matches = location.hash.match( /filter=([^&]+)/i );
      var hashFilter = matches && matches[1];
      return hashFilter && decodeURIComponent( hashFilter );
    }

    function onHashchange() {
      var hashFilter = getHashFilter();
      if ( !hashFilter && isIsotopeInit ) {
        return;
      }
      isIsotopeInit = true;

      if (hashFilter && hashFilter[0] != '*') hashFilter = '.' + hashFilter;

      var target = jQuery( '*[data-is-hashing="1"]' ).eq(0).attr('data-target');

      isoFilter(target, hashFilter);

      // set selected class on button
      if ( hashFilter ) {
        var jQueryfilterButtonGroup = jQuery('*[data-is-hashing="1"]');
        jQueryfilterButtonGroup.find('.is-checked').removeClass('is-checked');
        jQueryfilterButtonGroup.find('[data-filter="' + hashFilter + '"]').addClass('is-checked');
        jQueryfilterButtonGroup.find('[data-filter="' + hashFilter + '"]').attr('selected', 'selected');
      }
    }

    jQuery(window).on( 'hashchange', onHashchange );

    // trigger event handler to init Isotope
    onHashchange();






  /*==================================================*/
  /* 12 - CALL ORDER */
  /*==================================================*/

  $('.call-order-link').on('click', function(){
    setTimeout(function(){
      $('.cp_id_7605b p .your-phone input').focus();
    },100);
  });

  // $('.wpcf7-form.sent').on('load', function(){
  //   $(this).parent('.modal-form-wrap').hide().after('<p class="text-center call-order-success-message">Успешно отправлено! Ждите звонка :)</p>');
  // });




  /*==================================================*/
  /* 13 - MENU OVERLAY */
  /*==================================================*/

  $('.cmn-toggle-switch').on('click', function(){
    if ($('body').hasClass('overflow-hidden')) {
      $('body').removeClass('overflow-hidden');
      $('.menu-overlay').fadeOut();
    } else {
      $('.menu-overlay').fadeIn();
      $('body').addClass('overflow-hidden');
    }
  });

  $('.menu-overlay').on('click', function(){
      $('.cmn-toggle-switch').click();
    });

  /*==================================================*/
  /* 14 - CUSTOM */
  /*==================================================*/

  document.querySelectorAll('.wpcf7').forEach(function(item, i, arr){
    item.addEventListener('wpcf7beforesubmit', function(e) {
      jQuery( this ).find('.wpcf7-submit').eq(0).prop('disabled', true);
    }, false);

    "wpcf7invalid wpcf7spam wpcf7mailsent wpcf7mailfailed wpcf7submit".split(" ").forEach(function(e){
      item.addEventListener(e, function(){
        jQuery( this ).find('.wpcf7-submit').eq(0).prop('disabled', false);
      }, false);
    });
  });
});
