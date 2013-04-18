(function( $ ){
  /**
   * The onloan handler to initialize date pickers, overlays, and auto tabbing
   */
  $(document).ready(function(){
      var options = {
            name : "rbm_timer",
            method: 'text',
            format: '@m minutes and @s seconds.'
        };
    $("#clocks").rbmTimer(options);
    // Bind the overlay event listeners
    $('.rbm_personalloan_overlay').overlay();
    // Bind the autotab event behaviors
    $('.rbm_personalloan_autotab').autotab();
    // Initiate any date picker elements
    $(".calendar" ).datepicker();
    //Initiate dropdown emmulation
    $("select").rbm_dropdown();
    //Set up timer
    
  });
  
})(jQuery);