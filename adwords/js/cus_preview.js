wp.customize('header_menu_pos_setting', function(value) {
	value.bind(function(to) {
		$('.adwords-overview header').removeClass('topleft topright bottomleft bottomright');
		$('.adwords-overview header').addClass(to);

		$('.adwords-overview .topleft').css({"height": "80px"});
		$('.adwords-overview .topleft .main-navigation').css({"top": "-60px", "left": "150px","width": "89%"});
		$('.adwords-overview .topleft .cta-wrapper').css({"transition": "top 0s ease 0s, opacity 300ms ease 0s", "transform": "translate(0px, 0px)", "top": "-10px", "opacity": "1"});

		$('.adwords-overview .bottomleft').css({"height":"auto"});
		$('.adwords-overview .bottomleft .main-navigation').css({"top": "0px", "left": "0px","width": "100%"});
		$('.adwords-overview .bottomleft .cta-wrapper').css({"transition": "top 0s ease 0s, opacity 300ms ease 0s", "transform": "translate(0px, 0px)", "top": "-48px", "opacity": "1"});

		$(window).scroll(function() {
		 	var height = $(window).scrollTop().valueOf();
		 	var width = $(window).width();

		 	if( height < 105 ) {
		 		$('.adwords-overview .topleft .main-navigation').css({"transition": "top 0s ease 0s", "top": "-60px", "left": "150px", "width": "89%"});
		 		$('.adwords-overview .bottomleft .main-navigation').css({"transition": "top 0s ease 0s", "top": "0px", "left": "0px"});
		 	} 

		 	if( height < 550 && height > 500) {
		 		$('.adwords-overview .topleft .main-navigation').css({"transition": "top 400ms ease 0s, opacity 300ms ease 0s", "top": "-60px", "left": "150px", "width": "100%"});
		 	}

		 	if( height >= 550 ) { 
		 		$('.adwords-overview .topleft .main-navigation').css({"transition": "top 400ms ease 0s, opacity 300ms ease 0s", "top": "0px", "left": "0px", "width": "100%"});
		 	}
		});
	});
});
