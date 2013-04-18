(function( $ ){
  /**
   * The onloan handler to initialize date pickers, overlays, and auto tabbing
   */
  $(document).ready(function(){
    // Bind the overlay event listeners
    $('.rbm_creditscore_overlay').overlay();
    // Bind the autotab event behaviors
    $('.rbm_creditscore_autotab').autotab();
    // Initiate any date picker elements
    $(".calendar" ).datepicker();
    // Initiate the bind method
  });
  
})(jQuery);