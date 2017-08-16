'use strict';

;$(function() {

	var windowWidth = $(window).width()
		,	leftAsideHeight = $('.aside--left-block').height()
	  , rightAsideHeight = $('.aside--right-block').height()
	  , $mainList = $('.js--main--list')
	  , maxAsideHeight = Number;

	if (leftAsideHeight > rightAsideHeight) {
		maxAsideHeight = leftAsideHeight;
	} else {
		maxAsideHeight = rightAsideHeight;
	}

	if ( $mainList.height() < maxAsideHeight ) {
		$mainList.height(maxAsideHeight);
	}

	// main menu dropdown hover
	$('.js--nav-menu--list-item').hover(
		function () {
			$(this).find('.nav-menu--dropdown').addClass('hover');
			$(this).find('.nav-menu--item-link').addClass('hover');
		},
		function () {
			$(this).find('.nav-menu--dropdown').removeClass('hover')
			$(this).find('.nav-menu--item-link').removeClass('hover');
		}
	);

  $('.aside--left--dropdown-list span').click( function() {
  	var $dropdownList = $(this).parent().find('.dropdown-list');

  	if ( !$dropdownList.hasClass('open') ) {
  		$dropdownList.addClass('open').show('swing');
  	}
  	else {
      $dropdownList.removeClass('open').hide('swing');
  	}

  });

});


/* Object-fit css3 property polifill */

objectFit.polyfill({
  selector: 'img',
  fittype: 'cover',
  disableCrossDomain: 'true'
});
