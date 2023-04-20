$(document).ready(function(){
  $('body').addClass('loaded');
	// Mobile menu
	$('.mobile-menu-icon').click(function(){
		$('.tm-nav').slideToggle();
	});

	$( window ).resize(function() {
		if($( window ).width() > 767) {
			$('.tm-nav').show();
		} else {
			$('.tm-nav').hide();
		}
	});

  $('body').bind('touchstart', function() {});

  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });

});

$(window).load(function() {
	// Remove preloader
	// https://ihatetomatoes.net/create-custom-preloading-screen/
	$('body').addClass('loaded');
});