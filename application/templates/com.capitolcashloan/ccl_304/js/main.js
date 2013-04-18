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
        var options = {
            name: "cookie1"
        };
        $("#timer").rbmTimer(options);
        //add support for popup
        $(".popup").popup();
        var bops = {
            submit: false
        }
        $("#rbm_personalloan_loan_ammounts").bubbles(bops);
        //settings for loan pending
        var settings = {
            element : "#loan_pending_", //what element do you want tohave the background
            sprites : {//"value" : background-position
                "$0" : "0px 3px", 
                "$100" : "0px -80px",
                "$200" : "-120px 3px", 
                "$300" : "-241px 3px", 
                "$400" : "-362px 3px", 
                "$500" : "-483px 3px", 
                "$600" : "0px -39px", 
                "$700" : "-120px -39px", 
                "$800" : "-241px -39px", 
                "$900" : "-362px -39px", 
                "$1,000" : "-483px -38px" 
            }
        }
        
        $("#rbm_personalloan_loan_ammount_pending").rbmSpriteValue(settings);
    });
  
})(jQuery);