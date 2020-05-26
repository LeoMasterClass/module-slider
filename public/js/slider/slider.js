$(function() {
    var $firstSlide = $('.slide:first-child');
    var $lastSlide = $('.slide:last-child');
    $('.slide:not(".js-active")').hide();
    $('.js-control-left').click(function() {
      if ($('li.js-active').index() == 0) {
        $('.js-active').fadeOut(500).removeClass('js-active');
        $lastSlide.toggleClass('js-active').fadeIn(500);
      } else {
        $('.js-active').fadeOut(500).removeClass('js-active').prev('li').toggleClass('js-active').fadeIn(500);
      }
    });
    $('.js-control-right').click(function() {
      if ($('li.js-active').index() == 2) {
        $('.js-active').fadeOut(500).removeClass('js-active');
        $firstSlide.toggleClass('js-active').fadeIn(500);
      } else {
        $('.js-active').removeClass('js-active').fadeOut(500).next('li').toggleClass('js-active').fadeIn(500);
      }
    });
  });