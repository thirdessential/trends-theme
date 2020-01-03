jQuery(document).ready(function($) {
  // Injecting svg sprite in the beginning of document
  var ajax = new XMLHttpRequest();
  //ajax.open('GET', '/WP_Trends_2/wp-content/themes/trends-theme/img/sprite.svg', true);
  ajax.open('GET', '/trends-sustainability/wp-content/themes/trends-theme/img/sprite.svg', true);
  ajax.responseType = 'document';
  ajax.onload = function(e) {
    document.body.insertBefore(ajax.responseXML.documentElement, document.body.childNodes[0]);
  };
  ajax.send();

  $('.page-header__checkbox').on('change', function() {
    if ($(this).is(':checked')) {
      $('body').addClass('remove-scrolling');
    } else {
      $('body').removeClass('remove-scrolling');
    }
  });

  $(document).ready(function() {

      var hash= window.location.hash;

      if (hash === '#trend-1' || hash === '#report-1') {
        var target = $(hash);

        if ($(window).width() < 768) {

          $('html,body').stop().animate({
            scrollTop: target.offset().top - 150 //offsets for fixed header
          }, 'ease-in-out');

        } else {

          $('html,body').stop().animate({
            scrollTop: target.offset().top - 80 //offsets for fixed header
          }, 'ease-in-out');

        }




      }



    $('.scroll-top').click(function(e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, 500);
    });

    $('.header-btn').click(function(e) {

      if ($(window).width() < 768) {

        $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top - 150 }, 1000);

      } else {

        $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top - 80 }, 1000);

      }

    });

    $('.post__nav a').click(function(e) {
      e.preventDefault();
      $(this).blur();
      $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top - 100 }, 1000);
    });

    if ($('.page').length > 0) {
      $(window).scroll(function() {
        const distanceY = window.pageYOffset || document.documentElement.scrollTop;
        var btnTrends = $('.header-btn--trends');
        var btnReports = $('.header-btn--reports');
        var trendsStart = $(btnTrends.attr('href')).offset().top - 101;
        var trendsEnd = $(btnReports.attr('href')).offset().top - 101;
        var reportsStart = $(btnReports.attr('href')).offset().top - 101;
        var reportsEnd =
          $('.blog__item--report')
            .last()
            .offset().top +
          $('.blog__item--report')
            .last()
            .outerHeight(true) -
          101;

        if (distanceY > trendsStart && distanceY < trendsEnd) {
          btnTrends.addClass('is-active');
        } else {
          btnTrends.removeClass('is-active');
        }
        if (distanceY > reportsStart && distanceY < reportsEnd) {
          btnReports.addClass('is-active');
        } else {
          btnReports.removeClass('is-active');
        }
      });

      $(window).scroll(function() {
        const distanceY = window.pageYOffset || document.documentElement.scrollTop;
        var elTop = $('.hero .page-header__btns-wrap').offset().top;

        if ($(window).width() > 768) {
          if (distanceY >= elTop) {
            $('.page-header').removeClass('is-hidden');
          } else {
            $('.page-header').addClass('is-hidden');
          }
        } else {
          if (distanceY >= elTop - 45) {
            $('.page-header').removeClass('is-hidden');
          } else {
            $('.page-header').addClass('is-hidden');
          }
        }
      });
    }

    if ($('.post').length > 0) {
      var postNav = $('.post__nav a');

      $(window).scroll(function() {
        const distanceY = window.pageYOffset || document.documentElement.scrollTop;

        postNav.each(i => {
          var curBtn = $(postNav.eq(i).attr('href'));

          if (i == 0) {
            var sectionStart = 0;
          } else {
            var sectionStart = curBtn.offset().top - 101;
          }

          var sectionEnd = curBtn.offset().top - 110 + curBtn.outerHeight(true) - 100;

          if (distanceY > sectionStart && distanceY < sectionEnd) {
            $(postNav.eq(i)).addClass('is-active');
          } else {
            $(postNav.eq(i)).removeClass('is-active');
          }
        });
      });
    }

    window.sr = ScrollReveal();

    sr.reveal('.hero__img', {
      distance: '100px',
      duration: 1000,
      interval: 100,
      origin: 'bottom'
    });

    sr.reveal('.hero__text-wrap', {
      delay: 400,
      distance: '100px',
      duration: 1000,
      interval: 100,
      origin: 'bottom'
    });

    sr.reveal('.blog__img', {
      distance: '100px',
      duration: 1000,
      interval: 100,
      origin: 'bottom',
      viewFactor: 0.4
    });

    sr.reveal('.blog__text-wrap', {
      delay: 200,
      distance: '100px',
      duration: 1000,
      interval: 100,
      origin: 'bottom',
      viewFactor: 0.05
    });

    sr.reveal('.block', {
      distance: '100px',
      duration: 1000,
      interval: 400,
      origin: 'bottom',
      viewFactor: 0.3
    });
  });
});
