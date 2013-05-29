
// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console) {
    arguments.callee = arguments.callee.caller;
    var newarr = [].slice.call(arguments);
    (typeof console.log === 'object' ? log.apply.call(console.log, console, newarr) : console.log.apply(console, newarr));
  }
};

// make it safe to use console.log always
(function(b){function c(){}for(var d="assert,clear,count,debug,dir,dirxml,error,exception,firebug,group,groupCollapsed,groupEnd,info,log,memoryProfile,memoryProfileEnd,profile,profileEnd,table,time,timeEnd,timeStamp,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try
{console.log();return window.console;}catch(err){return window.console={};}})());

// place any jQuery/helper plugins in here, instead of separate, slower script files.

/*
 * OneWeb v3.0
 * Author: Seth Warburton
 * Copyright: Seth Warburton - (C) 2013 - All rights reserved
 * Licenses: GNU/GPL v3 or later http://www.gnu.org/licenses/gpl-3.0.html
 *           DBAD License http://philsturgeon.co.uk/code/dbad-license
 * Date: 30 April 2013
 */

(function( $ ) {
  $.fn.deviceHooks = function() {

      var resizer = function() {

          if ($(window).width() > 319) {
              $("html").removeClass("dumb").removeClass("lap").addClass("palm");
          }

          if ($(window).width() > 719) {
              $("html").removeClass("palm").removeClass("portable").addClass("lap");
          }

          if ($(window).width() > 991) {
              $("html").removeClass("lap").removeClass("desk").addClass("portable");
          }

          if ($(window).width() > 1439) {
              $("html").removeClass("portable").removeClass("desk-wide").addClass("desk");
          }

          if ($(window).width() > 1919) {
              $("html").removeClass("desk").addClass("desk-wide");
          }

      };

      // Call once to set.
      resizer();

      // Function for testing touch screens
     function is_touch_device() {
         return !! ('ontouchstart' in window);
      }

      // Set class on html element for touch/no-touch
      if (is_touch_device()) {
         $('html').addClass('touch');
      } else {
          $('html').addClass('no-touch');
      }

      // Call on resize.
      $(window).on('resize', resizer);

  };

})(jQuery);