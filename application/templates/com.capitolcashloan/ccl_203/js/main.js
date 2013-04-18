(function( $ ){
  /**
   * The onloan handler to initialize date pickers, overlays, and auto tabbing
   */
  $(document).ready(function(){
    // Bind the overlay event listeners
    $('.rbm_personalloan_overlay').overlay();
    // Bind the autotab event behaviors
    $('.rbm_personalloan_autotab').autotab();
    // Initiate any date picker elements
    $(".calendar" ).datepicker();
    // Initiate popup links
    $(".popup").popup();
  });
  
})(jQuery);