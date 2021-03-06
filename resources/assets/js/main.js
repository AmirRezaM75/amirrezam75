"use strict";
var scrollDirection, $ = jQuery;

// for scrolling to targeted sections

(function($){
	$.fn.scrollingTo = function( opts ) {
		var defaults = {
			animationTime : 1000,
			easing : '',
			topSpace : 0,
			callbackBeforeTransition : function(){},
			callbackAfterTransition : function(){}
		};

		var config = $.extend( {}, defaults, opts );

	    $(this).on('click', function(e){
	    	var eventVal = e;
	    	e.preventDefault();

	    	var $section = $(document).find( $(this).data('section') );
	    	if ( $section.length < 1 ) {
	    		return false;
	    	}

	        if ( $('html, body').is(':animated') ) {
	            $('html, body').stop( true, true );
	        }

	        var scrollPos = $section.offset().top;

	        if ( $(window).scrollTop() == ( scrollPos + config.topSpace ) ) {
	        	return false;
	        }

	        config.callbackBeforeTransition(eventVal, $section);

	        var newScrollPos = (scrollPos - config.topSpace);

	        $('html, body').animate({
	            'scrollTop' : ( newScrollPos+'px' )
	        }, config.animationTime, config.easing, function(){
	        	config.callbackAfterTransition(eventVal, $section);
	        });

	        return $(this);
	    });

	    $(this).data('scrollOps', config);
	    return $(this);
	};
}(jQuery));

$(document).ready(function($){

	var sklSlider = $("#skillSlider");

	// sklSlider.owlCarousel({
	// 	slideSpeed: 400,
	// 	items : 6,
	// 	itemsDesktop : false,
	// 	itemsDesktopSmall : [991, 8],
	// 	itemsTablet: [768, 8],
	// 	itemsTabletSmall: [600, 6],
	// 	itemsMobile : [479, 4],
	// 	pagination : false
	// });

	sklSlider.owlCarousel({
		slideSpeed: 400,
        responsiveClass:true,
        responsive:{
            0:{
                items:5,
                nav:true
            },
            576:{
                items:5,
                nav:true
            },
            768:{
                items:5,
                nav:true
            },
            992:{
                items:5,
                nav:true
            }
        },
		pagination : false,
		nav:true,
		dots:false,
        navText: [
            "<a class=\"btn-floating waves-effect waves-light btn-large brand-bg white-text go go-left\"><i class=\"mdi-navigation-chevron-left \"></i></a>",
            "<a class=\"btn-floating waves-effect waves-light btn-large brand-bg white-text go go-right\"><i class=\"mdi-navigation-chevron-right \"></i></a>"
        ]
	});


	var sklData = sklSlider.data('owlCarousel');


	var sklTgt = $('.skl-ctrl').find('.go');
	sklTgt.on('click', function(e){
		e.preventDefault();
		if( $(this).hasClass('go-left') ) {
			sklData.prev();
		} else {
			sklData.next();
		}
	});


	var exSlider = $("#experienceSlider");
	exSlider.owlCarousel({
		items : 3,
		slideSpeed : 600,
		itemsDesktop : [1000,3],
		itemsDesktopSmall : [900,3],
		itemsTablet: [800,2],
		itemsMobile : [500, 1],
		pagination : false
	});
	var exData = exSlider.data('owlCarousel');


	var exTgt = $('.exp-ctrl').find('.go');
	exTgt.on('click', function(e){
		e.preventDefault();
		if($(this).hasClass('go-left')){
			exData.prev();
		} else {
			exData.next();
		}
	});


	var edSlider = $("#educationSlider");
		edSlider.owlCarousel({
		slideSpeed : 600,
		items : 3,
		itemsDesktop : [1000,3],
		itemsDesktopSmall : [900,3],
		itemsTablet: [800,2],
		itemsMobile : [500, 1],
		pagination : false
	});
	var edData = edSlider.data('owlCarousel');


	var edTgt = $('.edu-ctrl').find('.go');
	edTgt.on('click', function(e){
		e.preventDefault();

		if($(this).hasClass('go-left')){
			edData.prev();
		} else {
			edData.next();
		}
	});


	var tmSlider = $("#teamSlider");
	tmSlider.owlCarousel({
		slideSpeed : 600,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            576:{
                items:2,
                nav:true
            },
            768:{
                items:3,
                nav:true
            },
            992:{
                items:3,
                nav:true
            }
        },
        pagination : false,
        nav:true,
        dots:false,
        navText: [
            "<a class=\"btn-floating waves-effect waves-light btn-large white go go-left\"><i class=\"mdi-navigation-chevron-left brand-text\"></i></a>",
            "<a class=\"btn-floating waves-effect waves-light btn-large white go go-right\"><i class=\"mdi-navigation-chevron-right brand-text\"></i></a>"
        ]
	});
	var tmData = tmSlider.data('owlCarousel');


	var tmTgt = $('.tmu-ctrl').find('.go');
	tmTgt.on('click', function(e){
		e.preventDefault();

		if ($(this).hasClass('go-left')){
			tmData.prev();
		} else {
			tmData.next();
		}
	});


	var tesMoSlider = $("#testimonialSlider");
		tesMoSlider.owlCarousel({
		slideSpeed : 600,
		items : 2,
		itemsDesktop : [1000,2],
		itemsDesktopSmall : [900,2],
		itemsTablet: [600,1],
		itemsMobile : false,
		pagination : false
	});

	var tmoData = tesMoSlider.data('owlCarousel');


	var tmoTgt = $('.tmo-ctrl').find('.go');


	tmoTgt.on('click', function(e){
		e.preventDefault();

		if($(this).hasClass('go-left')){
			tmoData.prev();
		} else {
			tmoData.next();
		}
	});

	var instagramSlider = $("#instagramSlider");
	instagramSlider.owlCarousel({
		slideSpeed : 600,
		responsiveClass:true,
		responsive:{
			0:{
				items:2,
				nav:true
			},
			576:{
				items:4,
				nav:true
			}
		},
		pagination : false,
		nav:true,
		dots:false,
		navText: [
			"<a class=\"btn-floating waves-effect waves-light btn-large white go go-left\"><i class=\"mdi-navigation-chevron-left brand-text\"></i></a>",
			"<a class=\"btn-floating waves-effect waves-light btn-large white go go-right\"><i class=\"mdi-navigation-chevron-right brand-text\"></i></a>"
		]
	});


	$('.menu-smooth-scroll').scrollingTo({
		easing : 'easeOutQuart',
		animationTime : 1800,
		callbackBeforeTransition : function(e){
			if (e.currentTarget.hash !== "") {
				if ( e.currentTarget.hash !== '#home' ) {
					$(e.currentTarget).parent().addClass('current').siblings().removeClass('current');
				}
			}

			$('.button-collapse').sideNav('hide');
		},
		callbackAfterTransition : function(e){
			if (e.currentTarget.hash !== "") {
				if ( e.currentTarget.hash === '#home' ) {
					window.location.hash = '';
				} else {
					window.location.hash = e.currentTarget.hash;
				}

			}
		}
	});



	$('.section-call-to-btn').scrollingTo({
		easing : 'easeOutQuart',
		animationTime : 1800,
		callbackBeforeTransition : function(e){

		},
		callbackAfterTransition : function(e){
		}
	});

	// Animate scrolling on hire me button
    $('.hire-me-btn').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: $("#contact").offset().top}, 500);
    });




	// Menu animations plugin
	(function(){
		function Menu($element, options){

			var handler,
			defaults = {
				domObj : $element,
				className : 'small-menu',
				position : '100px',
				onIntellingenceMenu : function(){},
				onNormalMenu : function(){}
			},
			config = $.extend({}, defaults, options),
			coreFuns = {
				displayMenu : function(){
					if ( config.domObj.hasClass(config.className) ) {
						config.domObj.removeClass(config.className);
					}
				},
				hideMenu : function(){
					if ( !config.domObj.hasClass(config.className) ) {
						config.domObj.addClass(config.className);
					}
				}
			},
			publicFuns = {
				intelligent_menu : function(){

					var lastScrollTop = 0, direction;

					if ( handler != undefined ) {
						$(window).unbind('scroll', handler);
					}

					handler = function(e){
						if (e.currentTarget.scrollY > lastScrollTop){
							direction = 'down';
						} else {
							direction = 'up';
						}
						lastScrollTop = e.currentTarget.scrollY;

						// check is user scrolling to up or down?
						if ( direction == 'up' ) {
						// so you are scrolling to up...

							// lets display menu
							coreFuns.displayMenu();

						} else {
						// so you are scrolling to down...

							// se we have to hide only the small menu because the normal menu isn't sticky!
							coreFuns.hideMenu();
						}
					};
					$(window).bind('scroll', handler);

					config.onNormalMenu();
				},
				fixed_menu : function(){
					if ( handler != undefined ) {
						$(window).unbind('scroll', handler);
					}

					handler = function(e){
						// check have we display small menu or normal menu ?
						coreFuns.displayMenu();
					};

					$(window).bind('scroll', handler);

					config.onNormalMenu();
				},
				mobile_intelligent_menu : function(){

					if ( jQuery.browser.mobile === true ) {
						this.intelligent_menu();
					} else {
						this.fixed_menu();
					}
				}
			};

			return publicFuns;
		}

	    $.fn.menu = function( options ){
	        var $element = this.first();
	        var menuFuns = new Menu( $element, options );
	        return menuFuns;
	    };

	})();


	// call to Menu plugin
	var menuFun = $('header').menu({
		className : 'hide-menu',
		position : '100px'
	});

	window.menuFun = menuFun;


	/* Choose your navigation style */

	menuFun.intelligent_menu(); // Hide intelligently
	// menuFun.fixed_menu(); // Always fixed
	// menuFun.mobile_intelligent_menu(); // Hide on Mobile Devices


	$('#switch input').on('change', function(e){

		var menuId = this.id;

		if ( menuId === 'menu1' ) {

			menuFun.fixed_menu();

		} else if( menuId === 'menu2' ) {

			menuFun.intelligent_menu();

		} else {

			menuFun.mobile_intelligent_menu();

		}
	});





	// window scroll Sections scrolling

	(function(){
		var sections = $(".scroll-section");

		function getActiveSectionLength(section, sections) {
			return sections.index(section);
		}

		if ( sections.length > 0 ) {


			sections.waypoint({
				handler: function(event, direction) {
					var active_section, active_section_index, prev_section_index;
					active_section = $(this);
					active_section_index = getActiveSectionLength($(this), sections);
					prev_section_index = ( active_section_index - 1 );

					if (direction === "up") {
						scrollDirection = "up";
						if ( prev_section_index < 0 ) {
							active_section = active_section;
						} else {
							active_section = sections.eq(prev_section_index);
						}
					} else {
						scrollDirection = "Down";
					}


					if ( active_section.attr('id') != 'home' ) {
						var active_link = $('.menu-smooth-scroll[href="#' + active_section.attr("id") + '"]');
						active_link.parent('li').addClass("current").siblings().removeClass("current");
					} else {
						$('.menu-smooth-scroll').parent('li').removeClass('current');
					}
				},
				offset: '35%'
			});
		}

	}());

}(jQuery));



$(window).load(function(){

	// section calling
	$('.section-call-to-btn.call-to-home').waypoint({
		handler: function(event, direction) {
			var $this = $(this);
			$this.fadeIn(0).removeClass('btn-hidden');
			var showHandler = setTimeout(function(){
				$this.addClass('btn-show').removeClass('btn-up');
				clearTimeout(showHandler);
			}, 1500);
		},
		offset: '90%'
	});


	$('.section-call-to-btn.call-to-about').delay(1000).fadeIn(0, function(){
		var $this = $(this);
		$this.removeClass('btn-hidden');
		var showHandler = setTimeout(function(){
			$this.addClass('btn-show').removeClass('btn-up');
			clearTimeout(showHandler);
		}, 1600);
	});


	// skills animation
	$('#skillSlider').waypoint({
		handler: function(event, direction) {
			$(this).find('.singel-hr-inner').each(function(){
				var height = $(this).data('height');
				$(this).css('height', height);
			});
		},
		offset: '60%'
	});
});


//$('#contactForm').on('submit', function(e){
//	e.preventDefault();
//	var $this = $(this),
//		data = $(this).serialize(),
//		name = $this.find('#contact_name'),
//		email = $this.find('#email'),
//		message = $this.find('#textarea1'),
//		loader = $this.find('.form-loader-area'),
//		submitBtn = $this.find('button, input[type="submit"]');
//
//	loader.show();
//	submitBtn.attr('disabled', 'disabled');
//
//	function success(response) {
//		swal("Thanks!", "Your message has been sent successfully!", "success");
//		$this.find("input, textarea").val("");
//	}
//
//	function error(response) {
//		$this.find('input.invalid, textarea.invalid').removeClass('invalid');
//		if ( response.name ) {
//			name.removeClass('valid').addClass('invalid');
//		}
//
//		if ( response.email ) {
//			email.removeClass('valid').addClass('invalid');
//		}
//
//		if ( response.message ) {
//			message.removeClass('valid').addClass('invalid');
//		}
//	}
//
//	$.ajax({
//		type: "POST",
//		url: "inc/sendEmail.php",
//		data: data
//	}).done(function(res){
//
//		var response = JSON.parse(res);
//
//		if ( response.OK ) {
//			success(response);
//		} else {
//			error(response);
//		}
//
//
//		var hand = setTimeout(function(){
//			loader.hide();
//			submitBtn.removeAttr('disabled');
//			clearTimeout(hand);
//		}, 1000);
//
//	}).fail(function(){
//		sweetAlert("Oops...", "Something went wrong, Try again later!", "error");
//		var hand = setTimeout(function(){
//			loader.hide();
//			submitBtn.removeAttr('disabled');
//			clearTimeout(hand);
//		}, 1000);
//	});
//});
