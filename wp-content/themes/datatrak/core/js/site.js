(function(){
	var $j = jQuery.noConflict();

	var datatrak = datatrak || {};

	datatrak.initMainMenu = function() {

		$j('#menu-default-navigation-menu li').hover(function() {
			$j('#menu-default-navigation-menu li').removeClass('hover');
			$j(this).addClass('hover');

			$j('.menu-sub ul > li.primary').removeClass('open');

			if ($j(this).hasClass('menu-item-has-children')) {
				var menuIndex = $j(this).index() + 1;
				$j('.menu-sub ul > li.primary:nth-child(' + menuIndex + ')').addClass('open');
			} else {
				$j(this).find('.active-arrow').hide();
			}			
		});

		$j('nav.menu-main').mouseleave(function() {
			$j('#menu-default-navigation-menu li').removeClass('hover');
			$j('.menu-sub ul > li.primary').removeClass('open');
		});
	}

	datatrak.initMobileMenu = function() {
		$j('#menu-default-navigation-menu-2 li .expand').click(function() {

			if ( $j(this).parent().parent().hasClass('active') ) {
				$j(this).parent().parent().removeClass('active')
			} else {
				$j('#menu-default-navigation-menu-2 li').removeClass('active');
				$j(this).parent().parent().addClass('active');
			}
		});
	}

	$j(document).ready(function() {

		datatrak.initMainMenu();
		datatrak.initMobileMenu();
	});
})();