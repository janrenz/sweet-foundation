
/**
 * jQuery Montage plugin
 * http://www.codrops.com/, http://www.digiden.de
 *
 * Copyright 2011, Pedro Botelho
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Date: November 2012
 * 
 * probs: http://blog.vjeux.com/2012/javascript/image-layout-algorithm-google-plus.html
 */
(function( window, $, undefined ) {

	/*
	* smartresize: debounced resize event for jQuery
	*
	* latest version and complete README available on Github:
	* https://github.com/louisremi/jquery.smartresize.js
	*
	* Copyright 2011 @louis_remi
	* Licensed under the MIT license.
	*/

	var $event = $.event, resizeTimeout;

	$event.special.smartresize 	= {
		setup: function() {
			$(this).bind( "resize", $event.special.smartresize.handler );
		},
		teardown: function() {
			$(this).unbind( "resize", $event.special.smartresize.handler );
		},
		handler: function( event, execAsap ) {
			// Save the context
			var context = this,
				args 	= arguments;

			// set correct event type
			event.type = "smartresize";

			if ( resizeTimeout ) { clearTimeout( resizeTimeout ); }
			resizeTimeout = setTimeout(function() {
				jQuery.event.handle.apply( context, args );
			}, execAsap === "execAsap"? 0 : 10 );
		}
	};

	$.fn.smartresize 			= function( fn ) {
		return fn ? this.bind( "smartresize", fn ) : this.trigger( "smartresize", ["execAsap"] );
	};
	
	$.Montage 					= function( options, element ) {
		this.element 	= $( element ).show();
		this.cache		= {};
		this.heights	= new Array();
		this._create( options );
	};
	
	$.Montage.defaults 			= {
        maxh                    : 250,  // the maximum height that a picture should have.
        margin: 5
    };
	
	$.Montage.prototype 		= {
        getheight: function (images, width) {
            width -= images.length * 5;
            var h = 0;
            for (var i = 0; i < images.length; ++i) {
                h +=  $(images[i]).data('width') / ($(images[i]).data('height'));
            }
            return width / h;
        },
        setheight: function (images, height) {;
          this.heights.push(height);
          for (var i = 0; i < images.length; ++i) {
            $(images[i]).css({
              width: height * $(images[i]).data('width') / $(images[i]).data('height'),
              height: height,
              marginRight:6
            });
            if (i == images.length -1){
                 $(images[i]).css({
                    marginRight: 0
                 });
            }
            //$(images[i]).attr('src', $(images[i]).attr('src').replace(/w[0-9]+-h[0-9]+/, 'w' + $(images[i]).width() + '-h' + $(images[i]).height()));
          }
        },
		_reload				: function() {
			// container's width
			var new_el_w = this.element.width();
			// if different, something changed...
			if( new_el_w !== this.cache.container_w ) {
	           this._render();
			}
		},
		_render : function(){
	      var instance        = this;
	      var images          = instance.$imgs;
          el_w                = this.cache.container_ = instance.element.width();
          w: while (images.length > 0) {
            for (var i = 1; i < images.length + 1; ++i) {
              var slice = images.slice(0, i);
              var h = this.getheight(slice, el_w);
              if (h <  this.options.maxh) {
   
                this.setheight(slice, h);
                images = images.slice(i);
                continue w;
              }
            }
            this.setheight(slice, Math.min( this.options.maxh, h));
            break;
          }
		},
		_newImagesLoaded     : function(){
		      var instance        = this;
		      instance.$imgs      = instance.element.find('img');  
		},
		_create 			: function( options ) {
			this.options 	    = $.extend( true, {}, $.Montage.defaults, options );
			var instance 		= this;
			instance.$imgs		= instance.element.find('img');
            this._render();
       		// window resize event : reload the container.
			$(window).bind('smartresize.montage', function() { 
				instance._reload();
			});
		}
		
	
	};
	   
    // Structure taken from jquery.masonry
    //   https://github.com/desandro/masonry
    // =======================  Plugin bridge  ===============================
    // leverages data method to either create or return $.Montage constructor
    // A bit from jQuery UI
    //   https://github.com/jquery/jquery-ui/blob/master/ui/jquery.ui.widget.js
    // A bit from jcarousel 
    //   https://github.com/jsor/jcarousel/blob/master/lib/jquery.jcarousel.js

    $.fn.montage                = function( options ) {
        if ( typeof options === 'string' ) {
            // call method
            var args = Array.prototype.slice.call( arguments, 1 );

            this.each(function() {
                var instance = $.data( this, 'montage' );
                if ( !instance ) {
                    logError( "cannot call methods on montage prior to initialization; " +
                    "attempted to call method '" + options + "'" );
                    return;
                }
                if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {
                    logError( "no such method '" + options + "' for montage instance" );
                    return;
                }
                // apply method
                instance[ options ].apply( instance, args );
            });
        } 
        else {
            this.each(function() {
                var instance = $.data( this, 'montage' );
                if ( instance ) {
                    // apply options & reload
                    instance.option( options || {} );
                    instance._reload();
                } 
                else {
                    // initialize new instance
                    $.data( this, 'montage', new $.Montage( options, this ) );
                }
            });
        }
        
        return this;
    };
	
})( window, jQuery );