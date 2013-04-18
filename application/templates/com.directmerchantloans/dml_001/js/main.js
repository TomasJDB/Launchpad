(function( $ ){
  /**
   * The onloan handler to initialize date pickers, overlays, and auto tabbing
   */
  $(document).ready(function(){
    // Bind the overlay event listeners
    $('.rbm_bizdebt_overlay').overlay();
    // Bind the autotab event behaviors
    $('.rbm_bizdebt_autotab').autotab();
    // Initiate any date picker elements
    $(".calendar" ).datepicker();
    $.setClock();
  });
  
})(jQuery);