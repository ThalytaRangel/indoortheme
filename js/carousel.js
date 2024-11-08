
jQuery(document).ready(function($) {
  const itemCount = $('.news-carousel .news-card').length;
  $('.news-carousel').slick({
    slidesToShow: itemCount > 3 ? 3 : itemCount,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
});