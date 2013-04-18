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
        //settings for loan pending
        var settings = {
      
            element : "#loan_pending_box", //what element do you want tohave the background
            sprites : {
            "$0" : "-5px -1px", //bg position if val is 100
            "$1,000" : "-5px -78px",//bg position if val is 200
            "$1,500" : "-5px -156px", //bg position if val is 300
            "$2,000" : "-5px -234px", //bg position if val is 300
            "$3,000" : "-5px -311px", //bg position if val is 300
            "$4,000" : "-5px -389px", //bg position if val is 300
            "$5,000" : "-5px -467px", //bg position if val is 300
            "$6,000" : "-5px -545px", //bg position if val is 300
            "$7,000" : "-5px -622px", //bg position if val is 300
            "$7,500" : "-5px -700px" //bg position if val is 300
        }
        }
        $("#rbm_personalloan_loan_ammount_pending").rbmSpriteValue(settings);
    });
  
})(jQuery);