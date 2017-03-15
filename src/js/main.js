$(function() {
  $('.portfolio-picture-item a').featherlightGallery({
    previousIcon: '&#9664;',
    nextIcon: '&#9654;'
  });

  // initialize slick slider
  $('.portfolio-picture-items').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 2000
  });

  $(window).off('scroll').on('scroll', function() {
    if ($(window).scrollTop() > 100 && !$('.outer-wrapper').hasClass('scroll')) {
      $('.outer-wrapper').addClass('scroll');
    }
    else if ($(window).scrollTop() === 0 && $('.outer-wrapper').hasClass('scroll')) {
      $('.outer-wrapper').removeClass('scroll');
    }
  });
});
