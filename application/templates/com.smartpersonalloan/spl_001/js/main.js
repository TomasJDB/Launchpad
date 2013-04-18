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
                "$0" : "10px 3px", 
                "$1,000.00" : "-105px 3px",
                "$2,000.00" : "5px -50px", 
                "$3,000.00" : "-120px -50px", 
                "$4,000.00" : "5px -103px", 
                "$5,000.00" : "-120px -103px", 
                "$6,000.00" : "5px -156px", 
                "$7,000.00" : "-120px -156px", 
                "$7,500.00" : "5px -209px" 
            }
        }
        
        $("#rbm_personalloan_loan_ammount_pending").rbmSpriteValue(settings);
    });
  
})(jQuery);