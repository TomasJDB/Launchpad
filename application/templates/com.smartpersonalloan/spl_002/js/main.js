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
    //Bind the bind behavior
    $("#rbm_personalloan_loan_amount").rbmBind("#rbm_personalloan_loan_ammount_pending");
    //add timer behaivior
    var options = {name: "cookie1"};
    $("#timer").rbmTimer(options);
    //add support for popup
     $(".popup").popup();
  });
  
})(jQuery);