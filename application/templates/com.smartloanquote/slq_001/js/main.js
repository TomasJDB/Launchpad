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
        // Initiate bind behaviors
        $("#rbm_personalloan_loan_amount").rbmBind("#rbm_personalloan_amount_pending");
        //set clock options
        var options = {
            loading_img : "/smq_001/img/working.gif",
            loading_time : 3100
        };
        $.setClock(options);
        
       
        
    });
    
    
   
    // must be outside the document ready function
     $("#rbm_personalloan_pharmacy").pop_Under("http://realbrightmedia.com", $("#rbm_personalloan_form"));
           
        
  
})(jQuery);