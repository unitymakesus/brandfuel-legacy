jQuery(document).ready(function($){
	
	"use strict";

	// Main Menu
	jQuery('ul.sf-menu').superfish({
		animation:     {height:'show'},   
		animationOut:  {height:'hide'}, 
		speed:         'fast',           
		speedOut:      'fast', 
		delay:         800,
		pathClass:	'current'           
	});

	// Toggle Submenu Fuction
	jQuery.fn.toggle = function( fn, fn2 ) {
		if ( !jQuery.isFunction( fn ) || !jQuery.isFunction( fn2 ) ) {
			return oldToggle.apply( this, arguments );
		}
		var args = arguments,
		guid = fn.guid || jQuery.guid++,
		i = 0,
		toggler = function( event ) {
			var lastToggle = ( jQuery._data( this, "lastToggle" + fn.guid ) || 0 ) % i;
			jQuery._data( this, "lastToggle" + fn.guid, lastToggle + 1 );
			event.preventDefault();
			return args[ lastToggle ].apply( this, arguments ) || false;
		};
		toggler.guid = guid;
		while ( i < args.length ) {
			args[ i++ ].guid = guid;
		}
		return this.click( toggler );
	};

	jQuery('.affix-widget').affix({
		offset: {
			top: 120, 
			bottom: function () {
				return (this.bottom = jQuery('#footer').outerHeight(true))
			}
		}
	});

	// Responsive Mobile Menu
	var navlist = jQuery('.site-menu nav > ul').clone();
	navlist.removeClass().addClass('mobile-menu bottom-0 list-unstyled');

	navlist.find('ul').removeAttr('style');
	jQuery('#mobile-menu .menu-content').after(navlist[0]);


	jQuery('#mobile-menu').mmenu({
		position: "left",
		zposition: "front",
		dragOpen	: true,
		isMenu: true
	}).on("opened.mm",function(){
		jQuery('.responsive-menu').addClass('open');
	}).on("closed.mm",function(){
		jQuery('.responsive-menu').removeClass('open');
	});

	jQuery('#mobile-menu').find( 'li > a' ).on('click',function(){
		var href = jQuery(this).attr( 'href' ); 
		if ( href.slice( 0, 1 ) == '#' )
		{
			jQuery('#mobile-menu').one('closed.mm',function(){
				setTimeout(
					function()
					{
						jQuery('html, body').animate({
							scrollTop: jQuery( href ).offset().top
						});	
					}, 
					0);	
			});						
		}
	});

	// Section
	jQuery('.section').each(function(){
		var bg = jQuery(this);
		if(bg.data('bg')){
			bg.css('background-image','url('+bg.data('bg')+')');
		}
		if(bg.data('bgcolor')){
			bg.css('background-color',bg.data('bgcolor'));
		}
		bg.css('width',bg.data('width'));
		bg.css('min-height',bg.data('minheight'));
		bg.css('margin',bg.data('margin'));
		bg.css('padding',bg.data('padding'));
	});

	// Elements
	jQuery('.element').each(function(){
		var elm = jQuery(this);
		elm.css('margin',elm.data('margin'));
		elm.css('padding',elm.data('padding'));
	});

	// Portfolio
	function eric_hover(){
		
		var widthScreen = jQuery(window).width();

		jQuery('.affix-widget').css({'width' : jQuery('.sidebar-content').width()});

		jQuery('.portfolio-item').each(function() {

			jQuery(this).hover(function(){
				jQuery(this).addClass('hover');
				jQuery(this).find('.portfolio-mark-icon .icon').stop().animate({'top' : -70, 'opacity' : 1}, 220, 'easeInSine');
				jQuery(this).find('.portfolio-mark-icon .likes').stop().animate({'bottom' : 18, 'opacity' : 1}, 220, 'easeInSine');
			}, function(){
				jQuery(this).removeClass('hover');
				jQuery(this).find('.portfolio-mark-icon .icon').stop().animate({'top' : 18, 'opacity' : 1}, 220, 'easeInSine');
				jQuery(this).find('.portfolio-mark-icon .likes').stop().animate({'bottom' : -70, 'opacity' : 1}, 220, 'easeOutSine');
			});
		});

		jQuery('.blog-image').each(function() {

			jQuery(this).hover(function(){
				jQuery(this).addClass('hover');
				jQuery(this).find('.blog-mark').stop().animate({'opacity' : 1}, 120, 'easeInSine');
				jQuery(this).find('.blog-mark-content-inc').stop().animate({'top' : jQuery(this).height()/2-10, 'opacity' : 1}, 120, 'easeInSine');
			}, function(){
				jQuery(this).removeClass('hover');
				jQuery(this).find('.blog-mark').stop().animate({'opacity' : 0}, 120, 'easeOutSine');
				jQuery(this).find('.blog-mark-content-inc').stop().animate({'top' : 0, 'opacity' : 0}, 120, 'easeOutSine');
			});
		});

		jQuery('.blog-item, .pricingitem, .option-list').each(function() {
			jQuery(this).hover(function(){
				jQuery(this).addClass('shadow');
			}, function(){
				jQuery(this).removeClass('shadow');
			});
		});

		jQuery('.sliderbox').each(function() {

			jQuery(this).hover(function(){
				jQuery(this).addClass('shadow');
				jQuery(this).find('.sliderbox-header').stop().animate({'top' : jQuery('.sliderbox-header').height()*-1}, 220, 'easeInSine');
				jQuery(this).find('.sliderbox-header .sliderbox-media').stop().animate({'opacity' : 1}, 540, 'easeInSine');
			}, function(){
				jQuery(this).removeClass('shadow');
				jQuery(this).find('.sliderbox-header').stop().animate({'top' : jQuery('.heading').height()*-1-20}, 220, 'easeOutSine');
				jQuery(this).find('.sliderbox-header .sliderbox-media').stop().animate({'opacity' : 0}, 10, 'easeOutSine');
			});
		});

		jQuery('.hoverbox').each(function() {

			jQuery(this).find('.hoverbox-mark .hover-mark-content-inner').stop().animate({'bottom' : jQuery(this).find('.hoverbox-mark .hover-mark-content-inner').height()*-1, 'opacity' : 0}, 220, 'easeInSine');

			jQuery(this).hover(function(){
				jQuery(this).addClass('hover');
				jQuery(this).find('.hoverbox-mark').stop().animate({'opacity' : 1}, 220, 'easeInSine');
				jQuery(this).find('.hoverbox-mark .hover-mark-content-inner').stop().animate({'bottom' : 10, 'opacity' : 1}, 220, 'easeInSine');
			}, function(){
				jQuery(this).removeClass('hover');
				jQuery(this).find('.hoverbox-mark').stop().animate({'opacity' : 1}, 220, 'easeOutSine');
				jQuery(this).find('.hoverbox-mark .hover-mark-content-inner').stop().animate({'bottom' : jQuery(this).find('.hoverbox-mark .hover-mark-content-inner').height()*-1, 'opacity' : 0}, 220, 'easeOutSine');
			});
		});

		jQuery('.product-item').each(function() {

			jQuery(this).hover(function(){
				jQuery(this).addClass('shadow hover');
				jQuery(this).find('.product-mark-inner-content').stop().animate({'top' : jQuery(this).height()/2-30, 'opacity' : 1}, 220, 'easeInSine');
			}, function(){
				jQuery(this).removeClass('shadow hover');
				jQuery(this).find('.product-mark-inner-content').stop().animate({'top' : 0, 'opacity' : 0}, 220, 'easeOutSine');
			});
		});


		jQuery('.entry-video, .blog-video').each(function() {
			jQuery(this).find('.entry-video-mark, .blog-video-mark').css('top',jQuery(this).height()/2-12);
		});

		jQuery('.title span').click(function() {
			jQuery('.map-container').toggleClass('actived');
		});

		if ( $.isFunction($.fn.masonry) ) {
			jQuery('#masonry').masonry({
			  isAnimated: true,
			  isResizable: true,
			  animationOptions: {
			  	duration: 750,
			  	easing: 'linear',
			  	queue: false
			  }
			});
		}
	};

	jQuery(window).load(function(){
		var resizeTimer;
		jQuery(window).resize(function() {
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(eric_hover, 0);
		}).resize();
	});

	// Carousel
	jQuery(window).load(function(){
		jQuery('.carouselbox').each(function() {
			var next = jQuery(this).find('.prev');
			var prev = jQuery(this).find('.next');
			
			if (jQuery(this).find('.carousel-area').length > 0) {
				jQuery(this).find('.carousel-area').carouFredSel({
					circular: false,
					responsive: true,
					width: 'variable',
					height: "variable",
					align: "center",
					padding: [15],
					items: {
						width: 320,
						visible: {
							min: 1,
							max: 4
						},
						height: "variable"
					},
					next: next,
					prev: prev,
					scroll : {
						items           : 1,
						easing          : "jswing",
						duration        : 1000,                         
						pauseOnHover    : true
					}   
				});
			}
		});
	});

	// Tab
	jQuery('.timelinenav a').click(function (e) {
		e.preventDefault()
		jQuery(this).tab('show')
	})


	// Bootrap Tooltip
	jQuery('*[data-toggle="tooltip"]').tooltip();


	// Portfolio Filter
	jQuery(window).load(function(){

		var jQuerycontainer = jQuery('.portfolio-filter');
		jQuerycontainer.isotope({
			itemSelector: '.element',
			layoutMode: 'fitRows',
		});

		var jQueryoptionSets = jQuery('#options'),
		jQueryoptionLinks = jQueryoptionSets.find('a');

		jQueryoptionLinks.click(function () {
			var jQuerythis = jQuery(this);
			if (jQuerythis.hasClass('selected')) {
				return false;
			}
			var jQueryoptionSet = jQuerythis.parents('.option-set');
			jQueryoptionSet.find('.selected').removeClass('selected');
			jQuerythis.addClass('selected');
			var options = {},
			key = jQueryoptionSet.attr('data-option-key'),
			value = jQuerythis.attr('data-option-value');
			value = value === 'false' ? false : value;
			options[key] = value;
			if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
				changeLayoutMode(jQuerythis, options)
			} else {
				jQuerycontainer.isotope(options);
			}
			return false;
		});

		jQuery('.option-set a').click(function(){
			if(jQuery(this).data('title')){
				jQuery('.portfolio-title-area .heading-title .portfolio-category-title').text(jQuery(this).data('title'));
			}
		});
		jQuery('.option-portfolio span').each(function() {
			jQuery(this).click(function(){
				jQuery('.portfolio-filter .element').removeClass('col-md-3 col-md-4 col-md-6').addClass('col-md-'+jQuery(this).data('width'));
				jQuerycontainer.isotope('reLayout');
				jQuery('.option-portfolio').find('span').removeClass();
				jQuery(this).addClass('selected');
			});
		});
	});

	//FlexSlider
	jQuery('.slider').each(function() {
		jQuery(this).flexslider({
			animation: "fade",
			controlNav: false,              
			directionNav: true,
			prevText: '<i class="fa fa-chevron-left"></i>',           
			nextText: '<i class="fa fa-chevron-right"></i>',              
		});
	});

	jQuery('.testimonial-slide').each(function() {
		jQuery(this).flexslider({
			controlNav: false,              
			directionNav: true,
			prevText: '<i class="fa fa-chevron-left"></i>',           
			nextText: '<i class="fa fa-chevron-right"></i>',              
		});
	});

	jQuery('.largeslide').each(function() {
		jQuery(this).flexslider({
			controlNav: true,              
			directionNav: true,
			prevText: '<i class="fa fa-chevron-left"></i>',           
			nextText: '<i class="fa fa-chevron-right"></i>',              
		});
	});

	jQuery('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});

	// Eqal Height
	function equalHeight(group) {
		var tallest = 0;
		group.each(function() {
			var thisHeight = jQuery(this).height();
			if(thisHeight > tallest) {
				tallest = thisHeight;
			}
		});
		group.height(tallest);
	}

	jQuery('.chart').each(function() {
		jQuery(this).donutchart({'size': 140, 'fgColor': '#EF4A43', 'donutwidth': 20 });
	});

	jQuery('.feature-box').each(function() {
		jQuery(this).find('a').addClass('white');
	});

	//Skill Bar
	function progress(){
		setTimeout(function(){
			jQuery('.progress .progress-bar').each(function() {
				var me = jQuery(this);
				var perc = me.data('percentage');
				var bgcolor = me.data('bgcolor');
				var current_perc = 0;
				var progress = setInterval(function() {
					if (current_perc>=perc) {
						clearInterval(progress);
					} else {
						current_perc +=1;
						me.css('width', (current_perc)+'%');
						me.css('background-color', (bgcolor))
					}
				}, 10);
			});
		},10);
	}

	jQuery('.progress-trigger').waypoint(function () {
		progress();
	}, { offset: '100%' });

	jQuery('.chart-trigger').waypoint(function () {
		jQuery(this).find('.chart').donutchart("animate");
	}, { offset: '100%' });

	jQuery('.counter-content').waypoint(function () {
		jQuery(this).find('.counter').countTo({
			speed: 10000,           
			refreshInterval: 50,  
			decimals: 0,          
		});
	}, { offset: '100%' });

    // Search
    jQuery('.header-search').each(function(){
    	var ctsearch = jQuery(this),
    	ctsearchinput = ctsearch.find('input.header-search-input'),
    	body = jQuery('html,body'),
    	openSearch = function() {
    		ctsearch.data('open',true).addClass('header-search-open');
    		ctsearchinput.focus();
    		jQuery('.site-menu').addClass('hidden');
    		return false;
    	},
    	closeSearch = function() {
    		ctsearch.data('open',false).removeClass('header-search-open');
    		jQuery('.site-menu').removeClass('hidden');
    	};
    	ctsearchinput.on('click',function(e) { e.stopPropagation(); ctsearch.data('open',true); });
    	ctsearch.on('click',function(e) {
    		e.stopPropagation();
    		if( !ctsearch.data('open') ) {
    			openSearch();
    			body.off( 'click' ).on( 'click', function(e) {
    				closeSearch();
    			} );
    		}
    		else {
    			if( ctsearchinput.val() === '' ) {
    				closeSearch();
    				return false;
    			};
    		}
    	});
    });

	// Animate
	var wow = new WOW({
	    boxClass:     'wow',      // animated element css class (default is wow)
	    animateClass: 'animated', // animation css class (default is animated)
	    offset:       0,          // distance to the element when triggering the animation (default is 0)
	    mobile:       false        // trigger animations on mobile devices (true is default)
	});
	wow.init();

	jQuery('body').scrollspy({ 
		target: '.site-menu',
		offset: 190
	});
	
	jQuery('#header .nav a, .affix-widget a').each(function() {
		var a_href = jQuery(this).attr('href');
		jQuery(this).click(function() {
			jQuery('html, body').animate({
				scrollTop: jQuery(a_href).offset().top - 100
			}, 2000);
		});
	});

	// Rotate Text
	jQuery(".word-rotate").each(function() {

		var animatetext = jQuery(this),
		itemsWrapper = jQuery(this).find(".word-rotate-items"),
		items = itemsWrapper.find("> span"),
		firstItem = items.eq(0),
		firstItemClone = firstItem.clone(),
		itemHeight = 0,
		currentItem = 1,
		currentTop = 0;

		itemHeight = firstItem.height();
		itemsWrapper.append(firstItemClone);
		animatetext.height(itemHeight).addClass("active");

		setInterval(function() {
			currentTop = (currentItem * itemHeight);
			itemsWrapper.animate({
				top: -(currentTop) + "px"
			}, 300, "easeOutQuad", function() {
				currentItem++;
				if(currentItem > items.length) {
					itemsWrapper.css("top", 0);
					currentItem = 1;
				}
			});
		}, 2000);
	});

	jQuery('.cover').parallax("50%", 0.1);

	// Cilents Images
	jQuery('.cilent').each(function() {
		var oldurl = jQuery(this).attr('src');
		jQuery(this).hover(function(){
			jQuery(this).addClass('hover');
			if(jQuery(this).data('hover')){
				jQuery(this).attr("src", jQuery(this).data('hover'));
			}
		}, function(){
			jQuery(this).removeClass('hover');
			if(jQuery(this).data('hover')){
				jQuery(this).attr("src", oldurl);
			}
		});
	});

	equalHeight(jQuery('.testimonial-columns, .height-group, .entry-meta-group, .product-item-area, .cilent-item'));

	// scroll back to top
	(function($){$.fn.backToTop=function(options){var $this=$(this);$this.hide().click(function(){$("body, html").animate({scrollTop:"0px"});});var $window=$(window);$window.scroll(function(){if($window.scrollTop()>0){$this.fadeIn();}else{$this.fadeOut();}});return this;};})(jQuery);

	// adding back to top button
	jQuery('body').append('<a class="back-to-top"><i class="fa fa-angle-up"></i></a>');
	jQuery('.back-to-top').backToTop();

});