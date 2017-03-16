/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/


/*
 * Put all your regular jQuery in here.
*/
(function(window){

  var $window = jQuery(window);

	function addParallax(){
		var controller = new ScrollMagic.Controller();

		jQuery('.section--text-3-columns.columns--vertical').each(function(index,elem){
			var tween = new TimelineMax()
			.add([
				TweenMax.to(jQuery(elem).find('.text-columns'), 1, {y: "-200px", ease: Linear.easeNone}),
				TweenMax.to(jQuery(elem).find('.text-columns--image'), 1, {y: "-100px", ease: Linear.easeNone})
			]);

			// build scene
			var scene = new ScrollMagic.Scene({
				triggerElement: elem,
				triggerHook: '0.8',
				duration: jQuery(elem).height()
			})
			.setTween(tween)
			.addTo(controller);
		})


		jQuery('.section--text-image').each(function(index,elem){
			var tween = new TimelineMax()
			.add([
				TweenMax.to(jQuery(elem).find('.text-image--image').eq(0), 1, {y: "-250px", ease: Linear.easeNone}),
				TweenMax.to(jQuery(elem).find('.text-image--image').eq(1), 1, {y: "-100px", ease: Linear.easeNone})
			]);

			// build scene
			var scene = new ScrollMagic.Scene({
				triggerElement: elem,
				triggerHook: '0.8',
				duration: jQuery(elem).height()*1.5
			})
			.setTween(tween)
			.addTo(controller);
		})
	}

	function mobileNav(){

		var slideOut = new TimelineMax({ paused: true,
		onReverseComplete:function(){
			jQuery('body').attr('style','');
			jQuery('.menu-main-nav').fadeIn();
		},onComplete: function(){
			jQuery('body').attr('style','overflow: hidden;');
			jQuery('.menu-main-nav').fadeOut();

		}});

		slideOut.to(".menu-main-nav", 0.8, {autoAlpha:"0", ease:Power4.easeInOut},'one')
						.to("#mobile-navigation-wrapper", 0.8, {x:0, ease:Power4.easeInOut},'one')
						.from(".mobile-background", 0.8, {autoAlpha:0},'one');

		jQuery('.main-nav-link--mobile a').on('click',function(){
			slideOut.play();
			return false;
		});

		jQuery('.mobile-background,#mobile-navigation-wrapper .close-button').on('click',function(){
			slideOut.reverse();
		});
	}

	var wipeAnimation;
	var isPaused = [];

	function pause(){
		wipeAnimation.pause();
		console.log("is it paused");
	}

	function newCarousel(){
		var controller = new ScrollMagic.Controller();
		var firstElement;
		var carouselItems = jQuery('.desktop-carousel .homepage--carousel__feature');
		var carouselItemsTotal = carouselItems.length;
		var rightCol = jQuery(".desktop-carousel").find('.homepage--carousel__feature:eq(0) .carousel__feature__rightcol')[0];

		new ScrollMagic.Scene({
				triggerElement: ".desktop-carousel",
				triggerHook: "onLeave",
				duration: (carouselItemsTotal-1)*100+'%'
			})
			.setPin(rightCol)
			.addTo(controller);

		carouselItems.each(function(index,element){
			new ScrollMagic.Scene({
					triggerElement: element,
					triggerHook: 0.5,
					duration: "100%"
				})
				.on("enter", function(event){
					console.log("start");
					// TweenMax.fromTo(jQuery(firstElement).find('.image-box-wrap').eq(index-1),0.5,{autoAlpha: '1'}, {autoAlpha: '0', ease: Power4.easeInOut});
					if(event.scrollDirection == 'FORWARD' && index > 0){
						if(index != carouselItemsTotal){
							TweenMax.fromTo(jQuery(rightCol).find('.image-box-wrap').eq(index-1),0.5,{autoAlpha: '1'}, {autoAlpha: '0', ease: Power4.easeInOut});
						}
						TweenMax.fromTo(jQuery(rightCol).find('.image-box-wrap').eq(index),0.5,{autoAlpha: '0'}, {autoAlpha: '1', ease: Power4.easeInOut});
					} else if(event.scrollDirection == 'REVERSE') {
						TweenMax.fromTo(jQuery(rightCol).find('.image-box-wrap').eq(index+1),0.5,{autoAlpha: '1'}, {autoAlpha: '0', ease: Power4.easeInOut});
						if(index != carouselItemsTotal-1){
							TweenMax.fromTo(jQuery(rightCol).find('.image-box-wrap').eq(index),0.5,{autoAlpha: '0'}, {autoAlpha: '1', ease: Power4.easeInOut});
						}
					}
				})
				.addTo(controller);
		});
	}

  function init(){
    breakpoint();
    reSizeVideoWrapper();
    stickyNav();
		addParallax();
		mobileNav();
		videoHeroPlay();
		if(window.breakpoint != 'mobile'){
			newCarousel();
		} else {
			createOwlCarousel();
		}

  }

	function createOwlCarousel(){
		jQuery('.mobile-carousel').owlCarousel({
			items: 1,
			dots: true,
			margin: 40,
			nav: true,
			navText: ["keyboard_arrow_left","keyboard_arrow_right"]
		})
	}

	function videoHeroPlay(){
		jQuery(".section--video-hero.showBG").each(function(index,element){

			var videoHero = new TimelineMax({paused: true,onReverseComplete:function(){
				jQuery(element).find('.video-hero__video').hide();
			},onComplete: function(){
				jQuery(element).find('.video-hero__video')[0].play();
			}});

			videoHero.set(jQuery(element).find('.video-hero__button'), {clearProps:"all"})
				.staggerTo(jQuery(element).find('.video-hero-text > *'), 0.8, {y: '-20px', autoAlpha: 0, ease:Back.easeInOut.config(1.7)},0.1)
				// .to(jQuery(element).find('.video-hero'), 1, {css:{backgroundImage:"none"}})
				.to(jQuery(element).find('.inner-wrap'), 0.1, {css:{zIndex:"-1"}})
				.to(jQuery(element).find('.video-hero__bg'), 1, {autoAlpha: 0, display:'none', ease:Power4.easeInOut})
				.to(jQuery(element).find('.video-hero__video'), 1, {autoAlpha: 1, display:'block', ease:Power4.easeInOut});



			jQuery(element).find('.video-hero__button').on('click',function(){
				jQuery(element).find('.video-hero__video').show();
				videoHero.play();
			});

			jQuery(element).find('.video-hero__video').on('click',function(){

				jQuery(element).find('.video-hero__video')[0].pause();
				videoHero.reverse();
			});
		})
	}

	function carousel(){
		var scrollDuration = 900;
		var tl = new TimelineMax({paused: true});
		var controller = new ScrollMagic.Controller();
		var carouselItems = jQuery('.homepage--carousel__feature');
		var scrollDistance = carouselItems.length * scrollDuration;
		var tween = TweenMax.to(".carousel__feature__rightcol", 1, {autoAlpha: 1,paused: true});

		var scroll1;
		var scroll2;
		var scroll3;
		var carousel = new ScrollMagic.Scene({
			triggerElement: ".section--carousel",
			triggerHook: "0.2",
			duration: scrollDistance
		})
		.setPin(".section--carousel")
		.setTween(tween)
		.on("end", function(event){
			// isScrolling = 1;
			scroll1 = false;
			scroll2 = false;
			scroll3 = false;
		}).on("progress", function (event) {
			// console.log(event);

			jQuery('.carousel__feature__leftcol').each(function(index,element){
				jQuery(element).css('transform','translateY(-'+ scrollDistance*event.progress + 'px)');
			})

			if(event.progress > 0 && event.progress < 0.3 && !scroll1) {
				console.log("1");
				// oldscrollTimestamp = scrollTimestamp;
				// tl.play();
				if(event.scrollDirection == "FORWARD"){
					// tl.play();
				} else {
					tl.reverse();
				}
				scroll1 = true;
				scroll2 = false;
				scroll3 = false;
			} else if(event.progress > 0.3 && event.progress < 0.6 && !scroll2){
				if(event.scrollDirection == "FORWARD"){
					tl.play();
				} else {
					tl.reverse();
				}
				console.log('2');
				scroll1 = false;
				scroll2 = true;
				scroll3 = false;

			} else if(event.progress > 0.6 && event.progress < 1 && !scroll3){
				if(event.scrollDirection == "FORWARD"){
					tl.play();
				} else {
					// tl.reverse();
				}
				console.log('3');
				scroll1 = false;
				scroll2 = false;
				scroll3 = true;
			}

			scrollTimestamp = event.timeStamp;

		})
		.setClassToggle(".section--carousel", "active")
		.addTo(controller);

		console.log(jQuery(".section--carousel").height());
		var textHeights = [0,900,1800];
		jQuery(".homepage--carousel__feature").each(function(index,elem) {
			tl.to(jQuery(elem).find('.carousel__feature__rightcol'), 0.7, {autoAlpha:0}).addPause();
			// var height = jQuery(elem).height();
			// var offset = jQuery(elem).offset().top - jQuery(elem).find('.carousel__feature__leftcol').offset().top;
			// console.log(offset);
			jQuery(elem).css('position',"absolute").css('top',"0");
			jQuery(elem).find('.carousel__feature__leftcol').css('top',textHeights[index]);
			// jQuery(elem).find('.carousel__feature__leftcol').css('position',"relative").css('top',carheight/3*index);
			// console.log(elem);
		});

		// jQuery('.homepage--carousel__feature').css('position',"absolute").css('height',height);
		//

		// jQuery(".homepage--carousel__feature").each(function(index,elem) {
		//   _this = this;
		//
		//   // jQuery(elem).css('position',"absolute");
		//   // jQuery(elem).find('.carousel__feature__leftcol').css('top',textHeights[index]);
		//
		//   new ScrollMagic.Scene({
		//     triggerElement: this,
		//     // triggerHook: "1",
		//     duration: 900,
		//     // offset: '-50%'
		//   })
		//   .setClassToggle(jQuery(this)[0], "active")
		//   .on("start", function(event){
		//     // jQuery(_this).addClass('active');
		//     // console.log(jQuery(_this)[0]);
		//   }).on("progress", function (event) {
		//     // console.log("Scene progress changed to " + event.progress);
		//   })


			// .setPin(jQuery(_this).find('.carousel__feature__rightcol')[0])
			// .setTween(tween)
			// .addTo(controller);
		// });
	}

  function stickyNav(){
    var controller = new ScrollMagic.Controller();
    var slideDownNav = TweenMax.to(".menu-main-nav", 0.8, {y:0,top:"0%", onReverseComplete:function(){
      jQuery('.menu-main-nav').removeClass('sticky').attr('style','');
    }});

    // build scene
    var stickyNav = new ScrollMagic.Scene({
      triggerElement: ".header",
      triggerHook: "onLeave",
      offset: '700px'
    })
    .setTween(slideDownNav)
    .on("enter", function(){
      jQuery('.menu-main-nav').addClass('sticky');
    })
    .addTo(controller);
  }

  function reSizeVideoWrapper(){
    if(window.breakpoint != 'mobile'){
      adjustVideoPositioning('.video-hero__video','video');
    } else {
      // adjustVideoPositioning('.homepage-hero','img');

    }
  }

  function adjustVideoPositioning(element,type) {
		var windowW = $window.width();
		var windowH = $window.height();
		var mediaAspect = 16/9;
		var windowAspect = windowW/windowH;
		if (windowAspect < mediaAspect) {
			// taller
			jQuery(element).find(type)
				.width(windowH*mediaAspect)
				.height(windowH);
			jQuery(element)
				.css('top',0)
				.css('left',-(windowH*mediaAspect-windowW)/2)
				.css('height',windowH);
			jQuery(element+'_html5_api').css('width',windowH*mediaAspect);
			jQuery(element+'_flash_api')
				.css('width',windowH*mediaAspect)
				.css('height',windowH);
		} else {
			// wider
			jQuery(element).find(type)
				.width(windowW)
				.height(windowW/mediaAspect);
			jQuery(element)
				.css('top',-(windowW/mediaAspect-windowH)/2)
				.css('left',0)
				.css('height',windowW/mediaAspect);
			jQuery(element+'_html5_api').css('width','100%');
			jQuery(element+'_flash_api')
				.css('width',windowW)
				.css('height',windowW/mediaAspect);
		}
	}

  function breakpoint() {
    var breakpoint;
    var breakpoint_refreshValue;
    breakpoint_refreshValue = function () {
      window.breakpoint = window.getComputedStyle(document.querySelector('html'), ':before').getPropertyValue('content').replace(/\"/g, '');
    };

    jQuery(window).resize(function () {
      breakpoint_refreshValue();
    }).resize();
  }

  window.Application = {
    init: init
  };

}(window));  // Self execute

Application.init();
