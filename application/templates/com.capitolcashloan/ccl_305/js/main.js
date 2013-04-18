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
            "$0" : "-5px -10px", //bg position if val is 100
            "$100" : "-5px -87px",//bg position if val is 200
            "$200" : "-5px -124px", //bg position if val is 300
            "$300" : "-5px -181px", //bg position if val is 300
            "$400" : "-5px -238px", //bg position if val is 300
            "$500" : "-5px -295px", //bg position if val is 300
            "$600" : "-5px -352px", //bg position if val is 300
            "$700" : "-5px -409px", //bg position if val is 300
            "$800" : "-5px -466px", //bg position if val is 300
            "$900" : "-5px -523px", //bg position if val is 300
            "$1,000" : "-7px -580px",//bg position if val is 300
            "$1,500" : "-7px -639px", //bg position if val is 300
            "$2,000" : "-7px -698px", //bg position if val is 300
            "$2,500" : "-7px -757px", //bg position if val is 300
            "$3,000" : "-7px -816px", //bg position if val is 300
            "$3,500" : "-7px -875px", //bg position if val is 300
            "$4,000" : "-7px -934px", //bg position if val is 300
            "$4,500" : "-7px -993px", //bg position if val is 300
            "$5,000" : "-7px -1052px" //bg position if val is 300
        }
        }
        $("#rbm_personalloan_loan_ammount_pending").rbmSpriteValue(settings);
    });
  
})(jQuery);