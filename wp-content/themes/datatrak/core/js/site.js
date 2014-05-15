(function(){
	var $j = jQuery.noConflict();

	var datatrak = datatrak || {};

	datatrak.initMainMenu = function() {

		$j('li.primary').hover(function() {
			$j('li.primary').removeClass('hover');
			$j(this).addClass('hover');
			$j('.menu-sub').addClass('open');
		});

		$j('nav.menu-main').mouseleave(function() {
			$j('li.primary').removeClass('hover');
			$j('.menu-sub').removeClass('open');
		});
	}

	$j(document).ready(function() {

		datatrak.initMainMenu();
	});
})();