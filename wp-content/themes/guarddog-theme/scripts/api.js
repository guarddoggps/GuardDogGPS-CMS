//slideshow handler
jQuery.noConflict();
jQuery(document).ready(function() {
  jQuery('#slideshow').cycle({fx: 'fade', timeout:5000, speed:1000});
  jQuery('#slideshow img').click(function (){
    document.location.href = jQuery(this).attr('rel');
  }).css('cursor', 'pointer');
});