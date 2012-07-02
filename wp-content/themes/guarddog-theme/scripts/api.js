//slideshow handler
jQuery.noConflict();
(function($){
	$(document).ready(function() {
		
		  $('#slideshow').cycle({fx: 'fade', timeout:5000, speed:1000});
		  $('#slideshow img').click(function (){
		    document.location.href = $(this).attr('rel');
		  }).css('cursor', 'pointer');
		
		$('.sliding-widget').cycle({ 
		    fx:     'scrollHorz', 
		    timeout: 5000,
			speed:1000
		});
		
		
		$('#tabs ul li:first').addClass('active');
		$('#tabs div').hide();			
		$('#tabs div:first').show();
		
			
		$('#tabs ul a').click(function(){
			$(this).parent().parent().find('li').removeClass('active');
			$(this).parent().addClass('active')
			var attr = $(this).attr('href').replace('#','');
			$('#tabs div').hide();
			$('#' + attr).show();
			return false;
		})
	});
})(jQuery)



