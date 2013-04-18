/* 
 * rbm-dropdown jQuery Plugin
 * Author: Felipe Tadeo
 * Date: Jan 24, 2013
 * 
 * This plugin provides support for custom created dropdown menus. 
 * 
 * NOTE: 
 * Before you use this, make sure that any class changes to the select element you wish
 * to customize trigger a custom event called "classChanged" otherwise the class
 * of the new custom dropdown will go unchanged. Specifecly ment for the errors.
 * 
 * $('some_dropdown_menu').addClass('some-new-class').trigger('classChanged');
 * 
 * How it works:
 * 
 * Takes a select element and hides then inserts the follwoing element after:
 * 
 * <div id="rbm-drop-@selector-id@">
 *      <span id="rbm-drop-@selector-id@-val"> selected option text </span>
 *      <ul class="same as selector">
 *      <li>selector options</li>
 *      <li>selector options</li>
 *      <li>selector options</li>
 *      </ul>
 * </div>
 * 
 * You may stylize this how ever you want. The display toggle is handled
 * by the plugin and behaves like a normal dropdown. The div replacing the
 * select element display is inline-block and has a pointer cursor. Changes
 * made to the psudo select element affect the hidden one as well, so basically
 * this psudo element changes the selected value of the element it is emulating
 * it also tirggers the change event.
 * 
 */

(function( $ ) {
    /**
         * helperClass
         * 
         * an class with a series of helper methods inside.
         */
    var helperClass  = {
        /**
                 * options
                 * 
                 * Default options of the helperClass
                 * 
                 * @value object element The object of the element that will be emmulated.
                 */
        options : {
            element : undefined
        },
        /**
                 * start
                 * 
                 * This is the innit function
                 * 
                 * @param el object Provide the element to emulate (must be a select)
                 */
        start : function (el){
            //define the element to emmulate
            helperClass.options.element = el;
            //shortcut 
            var ops = helperClass.options,
            el = ops.element;//shortcut to element
            //hide element to emmulate
            helperClass.hideDropdown();
            //get class, if not add rbm-dropdown-class
            var div = $("<div id='rbm-drop-"+ el.attr('id') + "' class='"+ el.attr('class') +" rbm-dropdown-class' ><span id='rbm-drop-"+ el.attr('id') + "-val'>"+$("#"+el.attr('id')+" option:selected").text()+"</span></div>")
            .css({
                "cursor" : "pointer", 
                "display" : "inline-block"
            }); //create drop menu and add basic dropdown CSS properties 
            //create list
            var ops = helperClass.createList();
            //insert list into div
            div.append(ops);
            //insert div after the element to emulate
            div.insertAfter(el); 
            //add event listener to behave like a dropdown
            $("#rbm-drop-"+ el.attr('id')).click(function (event){
                //check if the display is set to none
                if(ops.css("display") == 'none'){
                    //prevents html.click event from happening
                    event.stopPropagation();
                    $(".rbm-drop-list").fadeOut('fast');//fades out any other dropdowns that may be open
                    ops.show();//show this event
                }
            });
            //DRY prevention hides all dropdown menus should be hidden already though in css
            var hide = function (){
                $(".rbm-drop-list").fadeOut('fast');
            };
            //click out event
            $('html').click(function() {
                hide();
            });
            //blur window and hide
            $(window).blur(function() {//window on blur
                hide();
            });
            //listen for form submit to check for errors
            el.on('classChanged', function() {
                
                div.attr('class', el.attr("class"));//this will trigger
            });
        },
        /**
                 * hideDropdown
                 * 
                 * Hides the select element that is going to be emmulated.
                 */

        hideDropdown: function (){
            helperClass.options.element.hide();
        },
        /**
                 * createList
                 * 
                 * Creates a un-ordered list based on the values inside the
                 * select element that is being emulated.
                 * 
                 * @return obj returns an un-ordered list.
                 */
        createList : function () {
            //shortcut
            var ops = helperClass.options, el = ops.element;

            var list = $("<ul class='rbm-drop-list' id='rbm-drop-list-"+el.attr('id') +"' />");
            el.find("option").each(function(index){
                var diz = $(this);
                var option = $("<li>"+$(this).text()+"</li>").click(function (){
                    //REMOVE ALL 'SELECTED' CLASSES
                    $(this).parent().find('li').removeClass('selected');
                    $(this).addClass('selected');//ADD 'SELECTED' CLASS TO this one
                    $("#rbm-drop-"+ el.attr('id') + "-val").text(diz.text());
                    $('#'+el.attr('id')+' option')[index].selected = true;
                    $('#'+el.attr('id')+' option').select();
                });
                if($(this).attr('selected') == 'selected'){
                    option.addClass('selected')
                }
                list.append(option);//append and add text

            });
            return list;
        }
    };


    /**
   * rbm_dropdown
   * 
   * Call this function to initiate the dropdown emmulation.
   */
    $.fn.rbm_dropdown = function() {

        // Do your awesome plugin stuff here
        this.each(function(){
            helperClass.start($(this));
        });

    };
})( jQuery );
