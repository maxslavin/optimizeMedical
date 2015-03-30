/* ================================================================= */
/* CSS Style Switcher By FIFO THEMES
====================================================================== */

window.console = window.console || (function(){
	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
	return c;
})();


jQuery(document).ready(function(jQuery) {
	
		// Color Changer
		
		jQuery(".blue" ).click(function(){
			jQuery("#colors" ).attr("href", "css/colors/blue.css" );
			return false;
		});
		
		jQuery(".green" ).click(function(){
			jQuery("#colors" ).attr("href", "css/colors/green.css" );
			return false;
		});
		
		jQuery(".orange" ).click(function(){
			jQuery("#colors" ).attr("href", "css/colors/orange.css" );
			return false;
		});
		
		
		jQuery(".purple" ).click(function(){
			jQuery("#colors" ).attr("href", "css/colors/purple.css" );
			return false;
		});

		jQuery(".red" ).click(function(){
			jQuery("#colors" ).attr("href", "css/colors/red.css" );
			return false;
		});

		jQuery(".magenta" ).click(function(){
			jQuery("#colors" ).attr("href", "css/colors/magenta.css" );
			return false;
		});
		
		
		jQuery(".brown" ).click(function(){
			jQuery("#colors" ).attr("href", "css/colors/brown.css" );
			return false;
		});
		
		jQuery(".gray" ).click(function(){
			jQuery("#colors" ).attr("href", "css/colors/gray.css" );
			return false;
		});
		
		jQuery(".teal" ).click(function(){
			jQuery("#colors" ).attr("href", "css/colors/teal.css" );
			return false;
		});
		
		jQuery(".golden" ).click(function(){
			jQuery("#colors" ).attr("href", "css/colors/golden.css" );
			return false;
		});
		
	
		
	

		jQuery("#style-switcher h2 a").click(function(e){
			e.preventDefault();
			var div = jQuery("#style-switcher");
			console.log(div.css("left"));
			if (div.css("left") === "-206px") {
				jQuery("#style-switcher").animate({
					left: "0px"
				}); 
			} else {
				jQuery("#style-switcher").animate({
					left: "-206px"
				});
			}
		});



//Header Color Change
jQuery(".header-bg").spectrum({
    showInitial: true,
	color: "#323B44",
	preferredFormat: "hex6",
    showInput: true,
	move: updateHeader
});
//Changing the header color instantly
function updateHeader(color) {
    jQuery("#header .main-header").css("background", color.toHexString());
}



//Footer Top Color Change
jQuery(".footer-bg").spectrum({
    showInitial: true,
	color: "#323B44",
	preferredFormat: "hex6",
    showInput: true,
	move: updateFooterTop
});
//Changing the header color instantly
function updateFooterTop(color) {
    jQuery(".footer-top").css("background", color.toHexString());
}


//Footer Top Color Change
jQuery(".footer-bottom").spectrum({
    showInitial: true,
	color: "#898989",
	preferredFormat: "hex6",
    showInput: true,
	move: updateFooterBottom
});
//Changing the header color instantly
function updateFooterBottom(color) {
    jQuery(".footer-bottom").css("background", color.toHexString());
}



		// Footer Style Switcher
	   jQuery("#footer-style").change(function(e){
			if( jQuery(this).val() == 1){
				jQuery("#footer").removeClass("dark");        
				jQuery("#footer-bottom").removeClass("dark");
			} else{
				jQuery("#footer").addClass("dark");        
				jQuery("#footer-bottom").addClass("dark");  
			}
		});

		//Layout Switcher
	   jQuery("#layout-style").change(function(e){
			if( jQuery(this).val() == 1){
				jQuery("body").removeClass("boxed"), 
				jQuery(window).resize();
			} else{
				jQuery("body").addClass("boxed"),
				jQuery(window).resize();
			}
		});

		jQuery("#layout-switcher").on('change', function() {
			jQuery('#layout').attr('href', jQuery(this).val() + '.css');
		});

		jQuery(".colors li a").click(function(e){
			e.preventDefault();
			jQuery(this).parent().parent().find("a").removeClass("active");
			jQuery(this).addClass("active");
		});
		
		jQuery('.bg li a').click(function() {
			//var current = jQuery('#style-switcher select[id=layout-style]').find('option:selected').val();
			//if(current == '1') {
				var bg = jQuery(this).css("backgroundImage");
				jQuery("body").css("backgroundImage",bg);
			//}/*} else {
				//alert('Please select boxed layout');
			//}*/
		});	

		jQuery("#reset a").click(function(e){
			var bg = jQuery(this).css("backgroundImage");
			
			jQuery("body").css("backgroundImage","url(./images/bg/noise.png)");
			jQuery("#navigation" ).removeClass("style-2")
		});
			

	});
	
	
	
/*----------------------------------------------------*/
/*	Scroll To Top Section
/*----------------------------------------------------*/
	jQuery(document).ready(function () {
	
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.hc_scrollup').fadeIn();
			} else {
				jQuery('.hc_scrollup').fadeOut();
			}
		});
	
		jQuery('.hc_scrollup').click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	
	});	