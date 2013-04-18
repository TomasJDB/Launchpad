/**
 * Real Bright Media Autotab Plugin
 * 
 * This plugin handles the autotab behavior for multi field input boxes, such
 * as those used to input phone or social security numbers. The length of the 
 * input is determined by the HTML attributes in the presentation.
 * 
 * Each composite input component needs to have one a data-next attribute and 
 * a maxlength attribute to function properly. If either of these attributes is
 * not present or improperly set, the behavior will not be bound.
 * 
 * data-next: The id of the next field in the tab sequence. If not present, no
 * further tabbing is performed, and the user must manually tab to the next 
 * element.
 * 
 * @author Christopher Koning <ckoning@realbrightmedia.com>
 * 
 * @todo Add type filtering to remove content that doesn't match allowed characters
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
      // Bind the keyup and focus behaviors for the elements
      return this.each(function() {
        // Store a reference
        var el = $(this);
        // Check for the required elements
        var next = $('#'+el.attr('data-next'));
        var limit = el.attr('maxlength');
        // IF configured properly, bind the behavior
        if( typeof next !== 'undefined' && next !== [] && typeof limit !== 'undefined') {
          $(this).bind('keyup',function(event){
            // Make sure that the element is in focus
            el.focus();
            var currentLength = el.val().length;
            // Check to see if the element is already selected
            var selectionLength = null;
            switch(true) {
              case ('selectionStart' in el.get(0) ):
                selectionLength = el.get(0).selectionEnd - el.get(0).selectionStart;
                break;
              case (document.selection ):
                var r = document.selection.createRange();
                if (r === null) {
                  selectionLength = 0;
                } else {
                  selectionLength = r.text.length;
                }
                break;
            }
            // If the elements have been configured correctly and the value is not selected, tab on
            if ( currentLength >= limit && el.val().length !== selectionLength ) {
              next.focus();
              next.select();
            }
          });
        }
      });
     }
  };

  /**
   * Add the functionality to the jQuery namespace
   * 
   * @param string method The method to call
   */
  $.fn.autotab = function( method ) {
    if ( methods[method] ) {
      return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on rbm-autotab' );
    }    
  };
})( jQuery );