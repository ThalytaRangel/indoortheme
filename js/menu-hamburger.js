jQuery(document).ready(function($) {
  $('#hamburger-icon').on('click', function() {
      $('.header-content').toggleClass('menu-visible');
  });
});