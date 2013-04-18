/* 
 * Author: Felipe Tadeo
 * Date: Dec 7, 2012
 * 
 * This method binds the value of the selected element
 * to the defined element in the argument. This plugin
 * is specific for the "Loan Pending" feature. 
 * 
 */
(function( $ ) {
    var methods ={
        //two elements stored in variables for later use
        elementa : undefined,
        elementb : undefined,
        //init function that puts everything together.
        init : function(elementa, elementb){
            //define the elements
            methods.elementa = elementa;
            methods.elementb = elementb;
            //call the setEventListners to 
            methods.setEventListners();
        },
        //set event listeners 
        setEventListners : function () {
            //add event listner to elementa
            methods.elementa.change(function(){
                //fetch the value of current element
                var valuea = $(this).val();
                //do some cool stuff
                //if value a < 1
                if(valuea == ""){
                    methods.elementb.val("$0").change();//add .change() to trigger the change event
                    return;
                }
                methods.elementb.val("$"+methods.addComma(valuea)).change();
            });
        },
        
        addComma : function (nStr){
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    };
    //the function to be called.
    $.fn.rbmBind = function(elementb) {
        //will bind values of two different elements together.
        methods.init(this, $(elementb));
    };
})( jQuery );