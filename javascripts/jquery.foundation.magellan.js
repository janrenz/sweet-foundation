/*
 * jQuery Foundation Magellan 0.0.1
 * http://foundation.zurb.com
 * Copyright 2012, ZURB
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
*/

/*jslint unparam: true, browser: true, indent: 2 */

;(function ($, window, undefined) {
  'use strict';

  var options = {
    threshold: 20,
    activeClass: 'active'
  };

  // Indicate we have arrived at a destination
  $(document).on('magellan.arrival', '[data-magellan-arrival]', function(e) {
    $(this)
      .closest('[data-magellan-expedition]')
      .find('[data-magellan-arrival]')
      .not(this)
      .removeClass(options.activeClass);
    $(this).addClass(options.activeClass);
  });

  // Set starting point as the current destination
  $('[data-magellan-expedition]')
    .find('[data-magellan-arrival]:first')
    .addClass('active');

  // Update fixed position
  $('[data-magellan-expedition=fixed]').on('magellan.update-position', function(){
    var $el = $(this);
    $el.data("magellan-fixed-position","");
    $el.data("magellan-top-offset", $el.offset().top);
  });

  $('[data-magellan-expedition=fixed]').trigger('magellan.update-position');

  $(window).on('resize.magellan', function() {
    $('[data-magellan-expedition=fixed]').trigger('magellan.update-position');
  });
  
  $(window).on('scroll.magellan', function() {
    var windowScrollTop = $(window).scrollTop();
    $('[data-magellan-expedition=fixed]').each(function() {
      var $expedition = $(this);
      var fixed_position = (windowScrollTop + options.threshold) > $expedition.data("magellan-top-offset");
      if ($expedition.data("magellan-fixed-position") != fixed_position) {
        $expedition.data("magellan-fixed-position", fixed_position);
        if (fixed_position) {
          $expedition.css({position:"fixed", top:options.threshold});
        } else {
          $expedition.css({position:"", top:""});
        }
      }
    });
  });

  // Determine when a destination has been reached, ah0y!
  $(window).on('scroll.magellan', function(e){
    var windowScrollTop = $(window).scrollTop();
    $('[data-magellan-destination]').each(function(){
      var $destination = $(this),
          destination_name = $destination.attr('data-magellan-destination'),
          topOffset = $destination.offset().top - windowScrollTop;
      if (topOffset <= options.threshold) {
        $('[data-magellan-arrival=' + destination_name + ']')
          .trigger('magellan.arrival');
      }
    });
  });
}(jQuery, this));