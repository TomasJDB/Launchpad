/* 
 * Value Sprites
 * Author: Felipe Tadeo
 * Dec 13, 2012
 * 
 * Changes the background position based on a given value.
 * Provide an object with the settings as follows:
 *  settings : {
     
      element : "#some_element", //what element do you want tohave the background
      sprites : array (){
          "100" : "0px 0px", //bg position if val is 100
          "200" : "0px -10px", //bg position if val is 200
          "300" : "0px -20px" //bg position if val is 300
      }
    },
 * 
 */
(function( $ ) {
//methods
var methods ={
    /**
     * init
     * 
     * Starts the function.
     * 
     * @param mainelement object Provide the element who's value your going use.
     * @param settings object Provide the object with the settings.
     *
     */
    init : function (mainelement, settings){
        //merge settings
        methods.settings = settings;//set the settings
        methods.el = mainelement; //make el available for all methods
        var v = $(methods.el).val(); //get it's value'
        var bg = methods.getBg(v);//get bg
        if(!bg){
            //alert("No assigned action for value: " + v);
            return;//break
        }
        methods.setBg(methods.settings.element, bg);//changes the background of the element
    },
    /**
    * getBg
    * 
    * Looks for the key's value in the settings.sprites object. If there is no
    * such key then it will return false;
    * 
    * @param key string Provide the key of the value you want returned.
    * 
    * @return string|bool returns a string containing the value or false on undefined
    *  
    */
    getBg : function (key){
        var sprite = methods.settings.sprites[key];
        if(sprite != undefined ){
            return sprite
        }
            return false;
    },
    /**
     * setBg
     * 
     * Sets the background image position of el to val.
     * 
     * @param el object Expects the object who's bg position will change.
     * @param val string Expects the 
     * 
     */
    setBg : function (el, val){//changes the background-position
        $(methods.settings.element).css('background-position', val);
    }   
}
//call
 $.fn.rbmSpriteValue = function (settings){
     this.change(function (){
         //set up function
        methods.init(this, settings); 
     });
     methods.init(this, settings); //triger on start
 }
})(jQuery);