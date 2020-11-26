(function($,root,undefined){
	//$(function(){'use strict';});
		if (window.matchMedia('(max-width: 991px)').matches){
				
				jQuery('#nav-navbar-coll').navAccordion({
					expandButtonText: '<i class="fa fa-plus"></i>',  //Text inside of buttons can be HTML
					collapseButtonText: '<i class="fa fa-minus"></i>'
				});		
		}
	
/* 		function zoosUrl(){
			var openUrl = '';
			openUrl = window.open('http://chat.thienhoa.org/LR/Chatpre.aspx?id=KUZ57484630&lng=en');
			if (window.focus) {openUrl.focus()}
				return false;
		}
		jQuery('#zoosUrl').click(zoosUrl); */

		jQuery( ".widget_categories ul.children li a" ).last().css( "border-bottom", "none"); 
		jQuery('.ads-close').click( function(){
			jQuery('#ads-left').fadeOut(600);
		});
		
		jQuery('#wapper').append('<div id="top"><i class="aaa"><img src="/images/scrolltop.png"></i></div>');
			jQuery(window).scroll(function() {
				if(jQuery(window).scrollTop() != 0) {
					jQuery('#top').fadeIn();
				} else {
					jQuery('#top').fadeOut();
				}
			});
		jQuery('#top').click(function() {
			jQuery('html, body').animate({scrollTop:0},500);
		   });
		   
			/*  }); */ 

})(jQuery,this);