 jQuery(function($) {	
 	$('#adw-primary-menu li').each(function() {
		if( $(this).hasClass('current-menu-item') && !$(this).hasClass('menu-item-has-children') ) {
			$(this).addClass('active');
		}

		if( $(this).hasClass('current-menu-item') || $(this).hasClass('current_page_parent') && $(this).hasClass('menu-item-has-children') ) {
			$(this).addClass('parent');
		}

		if( $(this).hasClass('menu-item-has-children') ) {
			$(this).children('.sub-menu').addClass('sub-nav');
		}

		if(  $(this).hasClass('parent') ) {
			$(this).children('.sub-menu').css("display", "-webkit-box");
			if( $(this).children('.sub-menu').children('li:not(:first-child)').hasClass('current-menu-item') ) {
				$(this).children('.sub-menu').children('li:first-child').removeClass('active');
			} else {
				$(this).children('.sub-menu').children('li:first-child').addClass('active');
			}
		} else {
			$(this).children('.sub-menu').hide();
		}
	});

	$('.google-blue').click(function() {
		if(  $("#benefits").length > 0 ) {
	 		$('html, body').animate({ scrollTop: $("#benefits").offset().top }, 1000);
	 	}

	 	if(  $("#cards").length > 0 ) {
    		$('html, body').animate({ scrollTop: $("#cards").offset().top }, 1000);
    	}

    	if(  $("#quotation").length > 0 ) {
    		$('html, body').animate({ scrollTop: $("#quotation").offset().top }, 1000);
    	}

    	if(  $("#section-1").length > 0 ) {
    		$('html, body').animate({ scrollTop: $("#section-1").offset().top }, 1000);
    	}

    	if(  $("#section-2").length > 0 ) {
    		$('html, body').animate({ scrollTop: $("#section-2").offset().top }, 1000);
    	}
	});

	$('.idle-widget .idle-widget__collapse').click(function() {
		if($(this).parent().hasClass('is-collapsed')) {
			$(this).parent().removeClass('is-collapsed');
		} else {
			$(this).parent().addClass('is-collapsed');
		}
	});

	if( $(window).width() >= 768 ) {
		$('.adwords-overview .topleft').css({"height": "80px"});
		$('.adwords-overview .bottomleft').css({"height":"auto"});
		$('.adwords-overview .topleft .main-navigation').css({"top": "-60px", "left": "150px","width": "87%"});
		$('.adwords-overview .topleft .cta-wrapper').css({"transition": "top 0s ease 0s, opacity 300ms ease 0s", "transform": "translate(0px, 0px)", "top": "-10px", "opacity": "1"});
		$('.adwords-overview .bottomleft .main-navigation').css({"top": "0px", "left": "0px","width": "100%"});
		$('.adwords-overview .bottomleft .cta-wrapper').css({"transition": "top 0s ease 0s, opacity 300ms ease 0s", "transform": "translate(0px, 0px)", "top": "-48px", "opacity": "1"});

	}

	$('body.long-l10n .cta-wrapper').css({"transition": "transform 300ms ease 500ms, opacity 300ms ease 0s", "transform": "translate(0px, 0px)", "top": "0px", "opacity": "1"});
 	$('body.long-l10n .cta-wrapper').css({"transition": "opacity 300ms ease 0s", "transform": "translate(0px, 0px)", "top": "-48px", "opacity": "1"});
	$(window).scroll(function() {
	 	var height = $(window).scrollTop().valueOf();
	 	var width = $(window).width();
	 	// console.log(height);
	 	
	 	if( width >= 768 ) {
	 		if( height == 0 ) {
	 			$('body.adwords-overview .cta-wrapper').css({"transition": "transform 300ms ease 500ms, opacity 300ms ease 0s", "transform": "translate(0px, 0px)", "opacity": "1"});
	 		} else {
	 			$('body.adwords-overview .topleft .cta-wrapper').css({"transition": "top 0s ease 0s, opacity 300ms ease 0s", "transform": "translate(180px, 0px)", "top": "-10px", "opacity": "1"});
		 		$('body.adwords-overview .bottomleft .cta-wrapper').css({"transition": "top 0s ease 0s, opacity 300ms ease 0s", "transform": "translate(160px, 0px)", "top": "-48px", "opacity": "1"});
		 	}

		 	if( height < 105) {
		 		$('body').css({"padding-top":"0px"});
		 		$('header').removeClass("fixed-nav");

		 		$('.adwords-overview .topleft .main-navigation').css({"top": "-60px", "left": "150px", "width": "87%"});
		 		$('.adwords-overview .bottomleft .main-navigation').css({"top": "0px", "left": "0px", "width": "100%"});

		 		$('.long-l10n .main-navigation').css({"transition": "top 0s ease 0s", "top": "0px"});
		 		$('body.long-l10n .cta-wrapper').css({"transition": "top 0s ease 0s", "transform": "translate(0px, 0px)", "top": "-48px", "opacity": "1"});
		 	} 

	 		if( height >= 105 ) {
		 		$('.long-l10n .main-navigation').css({"transition": "top 0s ease 0s", "top": "-112px"});
		 		$('body.long-l10n .cta-wrapper').css({"transition": "top 0s ease 0s, opacity 300ms ease 0s", "transform": "translate(147px, 0px)", "top": "0px", "opacity": "1"});
		 	}
		 	

		 	if( height >= 200 ) {
		 		$('body.long-l10n').css({"padding-top":"112px"});
		 		$('body.adwords-overview').css({"padding-top":"60px"});
		 		$('header').addClass("fixed-nav");
		 		$('header').css({"min-height":"0"});
		 		$('.adwords-overview .main-navigation').css({"transition": "top 0s ease 0s", "top": "-60px", "left": "0px", "width": "100%"});
		 		$('.long-l10n .main-navigation').css({"transition": "top 400ms ease 0s, opacity 300ms ease 0s", "top": "0px"});
		 	}

		 	if( height < 550 && height > 500) {
		 		$('.adwords-overview .topleft .main-navigation').css({"transition": "top 400ms ease 0s, opacity 300ms ease 0s", "top": "-60px", "width": "100%"});
		 		$('.idle-widget').removeClass('is-hidden');
		 	}

		 	if( height >= 550 ) {
		 		$('header').css({"min-height": "0px", "top": "0px", "transition": "top 400ms ease 0s, opacity 300ms ease 0s"});
		 		$('.adwords-overview .main-navigation').css({"transition": "top 400ms ease 0s, opacity 300ms ease 0s", "top": "0px", "left": "0px", "width": "100%"});
		 		$('body.adwords-overview .cta-wrapper').css({"transition": "transform 300ms ease 500ms, opacity 300ms ease 0s", "transform": "translate(0px, 0px)", "top": "0px", "opacity": "1"});
		 	} 
		}

		if( $('.benefitsreach-animation').hasClass('ng-cloak') ) {
		 	if( height >= 1515 ) {
		 		$('.benefitsreach-animation').removeClass('ng-cloak');
		 		$('.benefitsreach-animation').addClass('benefitsreach-animation-start');
		 		setTimeout(function() {
		 			$('.section-benefits-reach-map>.benefitsreach-animation').removeClass('benefitsreach-animation-start');
		 		}, 300);
		 		setTimeout(function() {
		 			$('.section-benefits-reach-map .benefitsreach-animation').removeClass('benefitsreach-animation-start');
		 		}, 800);
		 	} 
		}

		if( !$('.benefitsmeasureads-animation').hasClass('type-start') ) {
			if( height >= 2650 ) {
				$('.benefitsmeasureads-animation').addClass('type-start');
				var text = $('.benefitsmeasureads-name').text();
				$('.benefitsmeasureads-name').text('');
				typeWriter(0, text, '.benefitsmeasureads-name');
				setTimeout(function() {
					text = $('.benefitsmeasureads-sub').text();
					$('.benefitsmeasureads-sub').text('');
					typeWriter(0, text, '.benefitsmeasureads-sub');
				}, 800);
				setTimeout(function() {
					text = $('.benefitsmeasureads-desc').text();
					$('.benefitsmeasureads-desc').text('');
					typeWriter(0, text, '.benefitsmeasureads-desc');
				}, 2000);
				setTimeout(function() {
					text = $('.benefitsmeasureads-url').text();
					$('.benefitsmeasureads-url').text('');
					typeWriter(0, text, '.benefitsmeasureads-url');
				}, 4700);
			}
		}
	});


	$('button.nav-toggle-button').click(function() {
		if( $('.logo-mobile-nav').is(':hidden') ) {
			if( !$('.main-navigation').hasClass('open-nav') ) {
				$('.main-navigation').addClass('open-nav');
			}
			$('.logo-mobile-nav').css({"display": "block", "opacity": "1"});			
			$(this).children().children('.menu-bar:first-child').css({"margin-top": "4px", "opacity": "1", "transform": "rotate(45deg) translate(5px,5px)"});
			$(this).children().children('.menu-bar:nth-child(2)').css({"opacity": "0"});
			$(this).children().children('.menu-bar:last-child').css({"opacity": "1", "transform": "rotate(-45deg) translate(5px,-5px)"});
			$('body').addClass('no-scroll');
			$('html').addClass('no-scroll');
			$('header button.nav-toggle-button').addClass('fixed');
		} else { 
			$('.main-navigation').removeClass('open-nav');
			$('.logo-mobile-nav').css({"display": "none", "opacity": "0"});
			$(this).children().children('.menu-bar:first-child').css({"margin-top": "0px", "opacity": "1", "transform": "rotate(0deg)", "transform-origin": "center"});
			$(this).children().children('.menu-bar:nth-child(2)').css({"opacity": "1"});
			$(this).children().children('.menu-bar:last-child').css({"opacity": "1", "transform": "rotate(0deg)", "transform-origin": "center"});
			$('body').removeClass('no-scroll');
			$('html').removeClass('no-scroll');
			$('header button.nav-toggle-button').removeClass('fixed');
		}
	});

	// $(document).mouseup(function(e) 
	// {
	//     var container = $(".main-navigation");

	//     // if the target of the click isn't the container nor a descendant of the container
	//     if (!container.is(e.target) && container.has(e.target).length === 0) 
	//     {
	//         container.removeClass('open-nav');
	//         $('.logo-mobile-nav').css({"display": "none", "opacity": "0"});
	// 		$('button.nav-toggle-button').children().children('.menu-bar:first-child').css({"margin-top": "0px", "opacity": "1", "transform": "rotate(0deg)", "transform-origin": "center"});
	// 		$('button.nav-toggle-button').children().children('.menu-bar:nth-child(2)').css({"opacity": "1"});
	// 		$('button.nav-toggle-button').children().children('.menu-bar:last-child').css({"opacity": "1", "transform": "rotate(0deg)", "transform-origin": "center"});
	//     }
	// });

	$(window).resize(function() {
		if( $(window).width() >= 768 ) {
			$('.logo-mobile-nav').css({"display": "none", "opacity": "0"});
			$('.main-navigation').removeClass('open-nav');
			$('button.nav-toggle-button .menu-bar:first-child').css({"margin-top": "0px", "opacity": "1", "transform": "rotate(0deg)", "transform-origin": "center"});
			$('button.nav-toggle-button .menu-bar:nth-child(2)').css({"opacity": "1"});
			$('button.nav-toggle-button .menu-bar:last-child').css({"opacity": "1", "transform": "rotate(0deg)", "transform-origin": "center"});
		} else {
			$('body.long-l10n').css({"padding-top": "0px"});
		}
	});

	function typeWriter(i, txt, selector) {
		$(selector).removeClass('typer-start');
		if (i < txt.length) {
	    	$(selector).append(txt.charAt(i));
	    	i++;
	    	setTimeout(function() {
	    		typeWriter(i, txt, selector);
	    	}, 40);
		}
	}

 	$('.side-container .item-side-title>div').each(function() {
 		// console.log($(this).height());
 		if( $(this).height() < 60 ) {
 			$(this).addClass('translate-x');
 		}
 	});
});

// CHATBOX

$(document).ready(function(){
	$(".left-first-section").click(function(){
		$('.main-section').toggleClass("open-more");
		$('.main-section-contact-form-chatbox').toggleClass("open-more");
		$('.idle-widget').hide();
	});
	$(".fa-minus").click(function(){
		$('.main-section').toggleClass("open-more");
		$('.main-section-contact-form-chatbox').toggleClass("open-more");
		$('.idle-widget').hide();
	});
	$(".fa-times").click(function(){
		$('.main-section').toggleClass("open-more");
		$('.main-section-contact-form-chatbox').toggleClass("open-more");
		$('.idle-widget').hide();
	});
});



