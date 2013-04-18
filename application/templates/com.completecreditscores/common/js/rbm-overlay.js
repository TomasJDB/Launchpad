/**
 * Real Bright Media Overlay Plugin
 * 
 * Initiates actions for overlay items, which are meant to sit over the 
 * presentation of the content.
 * 
 * There are three components to the plugin - the open switch to show the overlay,
 * the close switch to hide the overlay, and the overlay itself. The DOM structure
 * is left up to the presentation. 
 * 
 * The open switch much have the class 
 * rbm_creditscore_overlay_open, and must have a data-target attribute set to the
 * tail of the slug for the element to open. For example, data-target="privacy"
 * will open rbm_creditscore_overlay_privacy. 
 * 
 * The close switch must have the class
 * rbm_creditscore_overlay_close and have the data-target set to tail of the slug 
 * for the element to open. For example, data-target="privacy" will close 
 * rbm_creditscore_overlay_privacy.
 * 
 * @author Christopher Koning <ckoning@realbrightmedia.com>
 * 
 * @todo Make the class names optional parameters. Should default to the id of
 * the element  with _{open|close} appended to the end, as a class.
 * @todo Make fading optional parameter
 * @todo Create addtional methods to remove event triggers/bindings
 */
(function( $ ){
  /**
   * Define the methods available for the plugin
   */
  var methods = {
    /**
     * Initiate overlay behavior
     * 
     * Bind events for the open links, the close links and the window
     */
    init : function( options ) {
      // Bind the overlay on element event listeners
      $('.rbm_creditscore_overlay_open').each(function() {
        // Get a reference to the element
        var el = $(this);
        // Get the name of the target element
        var targetId = el.attr('data-target');
        var target = $('#rbm_creditscore_'+targetId);
        // If the target element exists, then bind the click action to fade in the target
        if(target) {
          el.click(function() {
            target.trigger('rbm-overlay.show');
          });
        }
      });
      // Bind the overlay off element listeners
      $('.rbm_creditscore_overlay_close').each(function(){
        // Get a reference to the element
        var el = $(this);
        // Get the name of the target element
        var targetId = el.attr('data-target');
        var target = $('#rbm_creditscore_'+targetId);
        // If the target element exists, then bind the click action to fade in the target
        if(target) {
          el.click(function() {
            target.trigger('rbm-overlay.hide');
          });
        }
      });
    
      return $(this).each(function(){
        var el = $(this);
        el.bind('rbm-overlay.show',methods.show);
        el.bind('rbm-overlay.hide',methods.hide);
      });
    },
    /**
     * Shows the overlay
     */
    show : function(event) {
      // Get a reference to this
      var el = $(this);
      var content= el.find('.rbm_creditscore_overlay_content:first-child');
      // Get the window height and width
      var winHeight = $(window).height();
      var boxHeight = content.height();
      // Store the original height in the element
      if( ! content.attr('data-orig-hght') ) { 
          content.attr('data-orig-hght',boxHeight);
      }
      // Adjust the size if necessary
      if( winHeight < content.attr('data-orig-hght') + 200 ) {
        content.css('margin-top',32);
        content.height(winHeight-100);
      } else {
        content.height(content.attr('data-orig-hght'));
        content.css('margin-top',100);
      }
      // Check to see if the 
      $(this).fadeIn('fast');
    },
    /**
     * Hides the overlay
     */
    hide : function(event) {
      $(this).fadeOut('fast');
    }
  };

  /**
   * Add the functionality to the jQuery namespace
   * 
   * @param string method The method to call
   */
  $.fn.overlay = function( method ) {
    if ( methods[method] ) {
      return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on rbm-overlay' );
    }    
  };
})( jQuery );