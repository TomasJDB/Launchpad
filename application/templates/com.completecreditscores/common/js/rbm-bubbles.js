/* 
 * Real Bright Media Bubbles_grid Plugin
 * 
 * Author: Felipe Tadeo Dec 3, 2012
 * Last Update: Dec 4, 2012 (Felipe Tadeo)
 * This plugin adds support for 'bubbles' buttons in the presentation of the
 * content.
 * 
 */
(function ( $ ){
    /*
     * Private class methods
     * will hold all methods for this plugin
     */
    var methods = {
        default_options : {
            submit : true
        },
        
        /*
         * initial function
         */
        
        ini : function(parent, options){
            $.extend(methods.default_options, options);
            //go through each element
            $.each(parent, function(){
                var parentEl = $(this);
                //Part 1, check if there is a value in the hidden input field
                //if there is, give the element inside the class 'parent_name+selected'
                //This will let the user know what button (value) was selected last.
                //get the hidden input
                var hiddenInput = parentEl.find("[type=hidden]");
                if(methods.exists(hiddenInput)){
                    //get the value of the hidden element
                    methods.selected(parentEl, hiddenInput.val());
                }
                //part 2, bind the methods that will change the hidden input field value
                $('.rbm_creditscore_bubble_option').click(function (){
                    var el = $(this);
                    //sets the value of the hidden element
                    methods.setValue(parentEl, $(this).val());
                    //changes teh class to selected element
                    methods.selected(parentEl, hiddenInput.val());
                    //finaly, submit form
                    //self.handleSubmit();
                    if(methods.default_options.submit)
                    $('#rbm_creditscore_form').trigger('auto.submit');
                });  
            })
        },
        /*
         * @exists()
         * 
         * This method varifies that the element exists.
         * 
         * @param element object Provide the object you want to check.
         * 
         * @return Boolean Returns true if the object exists, false if it doesn't
         * 
         */
        exists: function(element){
            if (element.length) { // implies *not* zero
                return true;
            } else {
                return false;
            }
        },
        /*
         * @selected
         * 
         * Will look for an element with the value of @value and add a class
         * parent_element_selected. The class name will be prefixed with the name
         * of the parent element.
         * 
         * @element object Expecting the parent element.
         * @value string Expecting the value it's looking for.
         * 
         */
        selected : function (element, value){
            //check if the value's length is greater than zero
            if(value.length > 0){
                //if so, find the button with the matching value and give it the selected class.
                var changeToSelected = element.find("[value="+value+"]");
                if(this.exists(changeToSelected) && changeToSelected.attr('type') != "hidden" ){//if such element with the value exists
                    //get the name of the element
                    var el_name = changeToSelected.attr("name");
                    //removes previus class el_name+ "selected"
                    element.find(".rbm_creditscore_bubble_option").each(function(){
                        var elName = $(this).attr('name');
                        
                        $(this).removeClass(elName + "_selected");
                        
                    });
                    //add class el_name+ "selected"
                    changeToSelected.addClass(el_name+ "_selected");
                }
            }
        },
        setValue : function (element, value){
            element.find("[type=hidden]").val(value).change(); //add the .change event to trigher a browser like change
        }  
    }

    $.fn.bubbles = function (options){       
        //go through elements with the elements.
        methods.ini(this, options);    
    }  
})(jQuery);