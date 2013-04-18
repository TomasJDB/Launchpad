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
    var options = {
            loading_time : 3100,
            loading_img : "/fcq_001/img/working.gif"
        };
        $.setClock(options);
  });
  
})(jQuery);