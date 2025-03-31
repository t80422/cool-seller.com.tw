"use strict";
// function revolutionSliderActiver(){

	jQuery(window).on('scroll',function(){(function(jQuery){stickyHeader();})(jQuery);});
	function selectMenu(){if(jQuery('.select-menu').length){jQuery('.select-menu').selectmenu();};}
	function stickyHeader(){if(jQuery('.stricky').length){var strickyScrollPos=100;
	if(jQuery(window).scrollTop()>strickyScrollPos){jQuery('.stricky').removeClass('fadeIn animated');
	
	jQuery('.stricky').addClass('stricky-fixed fadeInDown animated');}else if(jQuery(window).scrollTop()<=strickyScrollPos){jQuery('.stricky').removeClass('stricky-fixed fadeInDown animated');
	jQuery('.stricky').addClass('slideIn animated');}};}function fleetGallery(){if(jQuery('.fleet-gallery').length){jQuery('.fleet-gallery').mixItUp();};}
	
	function typed(){if(jQuery(".typed").length){jQuery(".typed").typed({stringsElement:jQuery('.typed-strings'),typeSpeed:200,backDelay:1500,loop:true,contentType:'html',loopCount:false,callback:function(){null;},resetCallback:function(){newTyped();}});};}
	
	function mobileNavToggler()
	{
		if(jQuery('.nav-holder').length)
		{
			jQuery('.nav-holder .nav-header button').click(function(){
				jQuery('.nav-holder .nav-footer').slideToggle();return false;});
			
			jQuery('.nav-holder li.menu-item-has-children').children('a').append(function(){
				return'<button class="dropdown-expander"><i class="fa fa-chevron-down"></i></button>';});
			
			jQuery('.nav-holder .nav-footer .dropdown-expander').click(function(){
				jQuery(this).parent().parent().children('.sub-menu').slideToggle()
				console.log(jQuery(this).parents('li'));
				return false;
			});
		}
	}
	//  Header
	jQuery(document).ready(function($) {
			$('.cmn-toggle-switch').on('click', function(e){
		        $(this).toggleClass('active');
		        $(this).parents('header').find('.toggle-block').slideToggle();
		        e.preventDefault();
		    });

		// Mobile Menu
		
		    $('.navbar-nav li i').on('click', function() {
		        $(this).toggleClass('DDopen');
		        $(this).closest('ul').find('ul').removeClass('opened');
		        $(this).parent().find('> ul').addClass('opened');
		        $(this).closest('ul').find('ul').not('.opened').slideUp(350);
		        $(this).parent().find('> ul').slideToggle(350);
		        $(this).closest('ul').find('i').not(this).removeClass('DDopen');
		    });
		    $(".navbar-nav li.menu-item-has-children").addClass("dropdown");
		    $(".navbar-nav li.menu-item-has-children ul").addClass("dropdown-submenu");
		    $(".widget_categories ul").addClass("blog-category-cl");
		    $("div#Primary > ul").addClass("nav navbar-nav");
		    $("div#Primary > ul > li.page_item_has_children > ul ").addClass("sub-menu dropdown-submenu");
		    $("div#Primary > ul > li.page_item_has_children > ul > li.page_item_has_children > ul").addClass("sub-menu dropdown-submenu");
		    $( ".main-nav #Primary" ).removeClass( "display_none" );
		    $('div .main-nav ul#Primary  li.menu-item > i').click(function()
		    {
		            $(this).parents('li').siblings('li').find('a').removeClass('clicked_back_color');
		            $(this).prev('a').toggleClass('clicked_back_color');
		    });
	});
	// End Header
		jQuery(document).ready(function(){
		(
			function(jQuery){
			typed();
			mobileNavToggler();
			})
		(jQuery);});
			
		jQuery('#btt').click(function(){jQuery(window).scroll(function(){if(jQuery(this).scrollTop()!=0){jQuery('#btt').fadeIn();}else{jQuery('#btt').fadeOut();}});
		jQuery('#btt').click(function(){jQuery('body,html').animate({scrollTop:0},800);});});
		var activityIndicatorOn=function(){jQuery('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');};
		var activityIndicatorOff=function(){jQuery('#imagelightbox-loading').remove();};
		
		var closeButtonOn=function(instance){jQuery('<button type="button" id="imagelightbox-close" title="Close"></button>').appendTo('body').on('click touchend',function(){jQuery(this).remove();instance.quitImageLightbox();return false;});};
		var closeButtonOff=function(){jQuery('#imagelightbox-close').remove();};var overlayOn=function(){jQuery('<div id="imagelightbox-overlay"></div>').appendTo('body');};
		var overlayOff=function(){jQuery('#imagelightbox-overlay').remove();};var captionOff=function(){jQuery('#imagelightbox-caption').remove();};
		var captionOn=function(){var description=jQuery('a[href="'+jQuery('#imagelightbox').attr('src')+'"] img').attr('alt');
		if(description.length)jQuery('<div id="imagelightbox-caption">'+description+'</div>').appendTo('body');};var arrowsOn=function(instance,selector){var jQueryarrows=jQuery('<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"><i class="fa fa-chevron-left"></i></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"><i class="fa fa-chevron-right"></i></button>');
		jQueryarrows.appendTo('body');
		jQueryarrows.on('click touchend',function(e){e.preventDefault();var jQuerythis=jQuery(this);
		if(jQuerythis.hasClass('imagelightbox-arrow-left')){instance.loadPreviousImage();}else{instance.loadNextImage();}return false;});};var arrowsOff=function(){jQuery('.imagelightbox-arrow').remove();};var selectorG='.lightbox';
		if(jQuery(selectorG).length){var instanceG=jQuery(selectorG).imageLightbox({quitOnDocClick:false,onStart:function(){arrowsOn(instanceG,selectorG);overlayOn();
		closeButtonOn(instanceG);},onEnd:function(){arrowsOff();captionOff();overlayOff();
		closeButtonOff();
		activityIndicatorOff();},onLoadStart:function(){captionOff();
		activityIndicatorOn();},onLoadEnd:function(){jQuery('.imagelightbox-arrow').css('display','block');captionOn();
		activityIndicatorOff();}});}

/** Mobile Menu **/

if ( jQuery(window).width() < 1024 ){
	jQuery( "body" ).addClass(function() {
		return "industMobileHeader";
	});
}
jQuery(document).ready(function() {
	//search
	  jQuery( ".search11" ).on( "click", function() 
	  {
		jQuery( "#cd-search" ).show();
	  });
	jQuery( "#close-search-btn" ).on( "click", function() {
		jQuery( "#cd-search" ).hide();
	});
});

jQuery('.counter h2,.counterbox_plus').each(function () {
   jQuery(this).prop('Counter',0).animate({
        Counter: jQuery(this).text()
    }, {
        duration: 10000,
        easing: 'swing',
        step: function (now) {
            jQuery(this).text(Math.ceil(now));
        }
    });
});