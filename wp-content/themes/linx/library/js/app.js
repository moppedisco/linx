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
  var attrName = 'data-scroll-speed';
  var elementsNl = document.querySelectorAll('[' + attrName + ']');
  var items = [];
  var viewport = {};
  var scrollPosition;

  function getYScrollPosition() {
    return window.pageYOffset;
  }

  function layout() {
    var scrollPosition = getYScrollPosition();

    viewport.height = window.innerHeight;
    viewport.halfHeight = viewport.height / 2;

    items.forEach(function(item) {
      var bounds = item.element.getBoundingClientRect();
      item.bounds = {
        top: bounds.top + scrollPosition - item.offsetY,
        center: bounds.top + scrollPosition - item.offsetY + (bounds.height / 2),
        bottom: bounds.bottom + scrollPosition - item.offsetY
      };
    });

    render();
  }

  function render() {
    var position = getYScrollPosition();
    var delta;
    var offsetY;

    window.removeEventListener('scroll', render);

    if (position === scrollPosition) {
      waitForScroll();
      return;
    }

    items.forEach(function(item) {
      delta = item.bounds.center - (position + viewport.halfHeight);
      offsetY = delta * item.speed;
      item.element.style.transform = 'translateY(' + offsetY + 'px)';
      item.offsetY = offsetY;
    });

    scrollPosition = position;
    window.requestAnimationFrame(render);
  }

  function waitForScroll() {
    window.addEventListener('scroll', render);
  }

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
				TweenMax.to(jQuery(elem).find('.text-image--image').eq(0), 1, {y: "-150px", ease: Linear.easeNone}),
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

  function init(){
    breakpoint();
    reSizeVideoWrapper();
    stickyNav();
		addParallax();

    // elements = Array.prototype.slice.call(elementsNl);
    // elements.forEach(function(element) {
    //   items.push({
    //     element: element,
    //     speed: element.attributes[attrName].value,
    //     offsetY: 0
    //   });
    //
    //   element.style.willChange = 'transform';
    // });
    //
    //   window.addEventListener('resize', layout);

    //   waitForScroll();
    //

    // var carouselTop = jQuery('.homepage--carousel').offset().top;
    // window.addEventListener('scroll', function(event){
    //   // var attrName = 'data-scroll-speed';
    //   // var elementsNl = document.querySelectorAll('[' + attrName + ']');
    //
    //   var elTop = jQuery('.carousel__feature__leftcol:first-of-type').offset().top;
    //   // var carouselTop = jQuery('.homepage--carousel').offset().top;
    //   var pelle = (carouselTop - jQuery(window).scrollTop() - jQuery(window).outerHeight()*0.3)*1
    //   if((carouselTop - jQuery(window).scrollTop() - jQuery(window).outerHeight()*0.3)<= 0){
    //       console.log("rumpa");
    //       // jQuery('.carousel__feature__leftcol:first-of-type').css('transform','translateY(-'+pelle+'px)');
    //       jQuery('.carousel__feature__leftcol:first-of-type').css({"-webkit-transform":"translate3d(0,"+pelle+"px,0)"});​
    //   }
    //
    //   // console.log(pelle);
    // });

    // var controller = new ScrollMagic.Controller();
    // // console.log(getYScrollPosition());
    // var carheight = jQuery('.homepage--carousel').height();
    // //
    // // var tween = TweenMax.to(".carousel__feature__leftcol", 1, {y: -carheight});
    // var tween = TweenMax.to(".carousel__feature__rightcol", 1, {autoAlpha: 1,paused: true});
    // var carousel = new ScrollMagic.Scene({
    //   triggerElement: ".homepage--carousel",
    //   triggerHook: "0.2",
    //   duration: jQuery('.homepage--carousel').height()
    // })
    // .setPin(".homepage--carousel")
    // // .setTween(tween)
    // .on("start", function(event){
    //
    // }).on("progress", function (event) {
    //   console.log("Scene progress changed to " + event.progress);
    //   jQuery('.carousel__feature__leftcol').css('transform','translateY(-'+carheight*event.progress+'px)');
    //   if(event.progress >= 0.33){
    //     tween.play();
    //     // console.log('asdasd');
    //   }
    // })
    //
    // .setClassToggle(".homepage--carousel", "active")
    // // .addTo(controller);
    //
    //
    //
    // // console.log(jQuery('.homepage--carousel').height());
    // var height;
    // var textHeights = [200,1200,2000];
    // jQuery(".homepage--carousel__feature").each(function(index,elem) {
      // var height = jQuery(elem).height();
      // var offset = jQuery('.homepage--carousel').offset().top - jQuery(elem).find('.carousel__feature__leftcol').offset().top;
      // console.log(offset);
      // jQuery(elem).css('position',"absolute").css('z-index',index*20).css('top',"0");
      // jQuery(elem).find('.carousel__feature__leftcol').css('top',textHeights[index]);
      // jQuery(elem).find('.carousel__feature__leftcol').css('position',"relative").css('top',carheight/3*index);
      // console.log(elem);
    // });

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
    var slideDownNav = TweenMax.to(".menu-main-nav", 0.8, {top:"0%", onReverseComplete:function(){
      jQuery('.menu-main-nav').removeClass('sticky').attr('style','');
    }});

    // build scene
    var stickyNav = new ScrollMagic.Scene({
      triggerElement: ".homepage--video-intro",
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
      adjustVideoPositioning('.homepage--video-intro__video','video');
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
