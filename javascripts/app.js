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
  $(document).ready(function(){
	  $(document).foundation();
          // banner size fix
          /**
			 * Give all objects and embed taht should remin ther html size a
			 * surrounding div with the banner class
			 * 
			 */
    $('.banner embed').each(
        function(){
            $(this).css('height', jQuery(this).attr('height')+'px');
        }
      );
        $('.banner embed').each(
        function(){
            $(this).css('width', jQuery(this).attr('width')+'px');
            $(this).css('max-width', jQuery(this).attr('width')+'px');
        }
      );
        $('.banner object').each(
        function(){
            $(this).css('height', jQuery(this).attr('height')+'px');
        }
      );
        $('.banner object').each(
        function(){
            $(this).css('width', jQuery(this).attr('width')+'px');
            $(this).css('max-width', jQuery(this).attr('width')+'px');
        }
      );
        $(document).ready(function() {
	        $('#leave_a_comment').click(function() {
	            $('#comment_form_wrapper').show();
	            $('#leave_a_comment').hide();
	            return false;
	        });
	    });
  });

})($, this);
