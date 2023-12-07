(function($) {
    $(document).ready(function() {
      $('nav ul li').click(function(e) {
        $(this).find('.nav-dropdown').toggle();
        $('.nav-dropdown').not($(this).find('.nav-dropdown')).hide();
        e.stopPropagation();
      });
  
      $('html').click(function() {
        $('.nav-dropdown').hide();
      });
  
      $('#nav-toggle').click(function() {
        $('nav ul').slideToggle();
        $('.nav-dropdown').hide();
      });
  
      $('#nav-toggle').on('click', function() {
        $(this).toggleClass('active');
      });
    });
  })(jQuery);
  