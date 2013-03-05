;(function ($, window, undefined) {
  'use strict';

  var $doc = $(document),
      Modernizr = window.Modernizr;

  // Hide address bar on mobile devices
  if (Modernizr.touch) {
    $(window).load(function () {
      setTimeout(function () {
        window.scrollTo(0, 1);
      }, 0);
    });
  }
  jQuery(document).ready(function(){
          // banner size fix
          /**
			 * Give all objects and embed taht should remin ther html size a
			 * surrounding div with the banner class
			 * 
			 */
    jQuery('.banner embed').each(
        function(){
            jQuery(this).css('height', jQuery(this).attr('height')+'px');
        }
      );
        jQuery('.banner embed').each(
        function(){
            jQuery(this).css('width', jQuery(this).attr('width')+'px');
            jQuery(this).css('max-width', jQuery(this).attr('width')+'px');
        }
      );
        jQuery('.banner object').each(
        function(){
            jQuery(this).css('height', jQuery(this).attr('height')+'px');
        }
      );
        jQuery('.banner object').each(
        function(){
            jQuery(this).css('width', jQuery(this).attr('width')+'px');
            jQuery(this).css('max-width', jQuery(this).attr('width')+'px');
        }
      );
        jQuery(document).ready(function() {
	        $('#leave_a_comment').click(function() {
	            $('#comment_form_wrapper').show();
	            $('#leave_a_comment').hide();
	            return false;
	        });
	    });
  });

})(jQuery, this);
