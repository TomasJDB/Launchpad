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
                "$0" : "0px -307px", 
                "$1,000" : "-3px -3px",
                "$2,000" : "-3px -41px", 
                "$3,000" : "-3px -79px", 
                "$4,000" : "-3px -117px", 
                "$5,000" : "-3px -155px", 
                "$6,000" : "-3px -193px", 
                "$7,000" : "-3px -231px", 
                "$7,500" : "-3px -269px" 
            }
        }
        
        $("#rbm_personalloan_loan_ammount_pending").rbmSpriteValue(settings);
    });
  
})(jQuery);