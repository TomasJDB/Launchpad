/* 
 * Author: Felipe Tadeo
 * Date: Jan 8, 2013
 * 
 * This plugin drops a gif for a designated number of time then replaces it with
 * a live clock and a message. It is a stand-alone method called directly from the
 * $ variable example: $.setClock(); You may provide an options object with the
 * values described bellow:
 * date_element the DOM element in which you want the date displayed ex: $("#some_element")
 * message_element the DOM element in which you want the message to be displayed $("#some_other")
 * loading_time the amount of time you want displayed before the timer is displayed the first time
 * in miliseconds. NOTE: a cookie is set to prevent this from happening every time the page loads
 * Once the cookie is expired, this effect will take place again.
 * loading_img the img path you want the loading gif example "/img/loading.gif"
 * Note: If not defined,  there will be no img displayed, instead the word "checking..."
 * will be displayed.
 * messagea A string message while the action is "looking" ex: "Please wait"
 * messageb A string message that will display after the plugin is done looking example "Done."
 * 
 * 
 */
(function( $ ) {
    //methods class contains all the methods needed to make this possible
    var methods= {
        //default options, pass your own options through the arguments of the jQuery plugin
        default_options : {
            date_element : $("#date"), //set the element where you want the gif and date to go
            message_element : $("#message"), //set the element where you want the message to go
            loading_time : 1010, //set the amount of time you want to elapse before the time displays
            loading_img : false, //set the image you want to display while "loading"
            messagea : "One moment", // Set message while "searching"
            messageb : "Lenders are online &amp; accepting requests." //Set message after done "searching"
        },
        /**
         * init()
         * 
         * The function that brings everything together with the given @options
         * 
         * @param options Object Provide values that have options (optional).
         * 
         */
        init : function (options){
            $.extend(methods.default_options, options);
            //set message while "searching"
            //shortcut to options object
            var e = methods.default_options;
            //get loading time
            var d = e.loading_time;
            var customer = methods.cookie('liveTime');//check if customer is here
            if(customer == null || customer == ""){
                methods.setCookie("liveTime", "true", 1);
                methods.setLoadingMessage();
            }else{
                d = 0;
            }
            setTimeout(function(){
                methods.setDoneMessage();
                e.date_element.html(methods.returnDateTime());
                //set interval to display clock
                setInterval(function(){
                    e.date_element.html(methods.returnDateTime());
                }, 100);
            },  d);
        },
        /**
         * setLoadingMessage
         * 
         * This method sets the loading message predefined in the options object
         * and sets the loading img or 'loading...' string if no image is defined.
         * 
         */
        setLoadingMessage : function () {
            //short cut to method
            var e = methods.default_options;
            //create image html
            var img = (e.loading_img ? "<img src=\""+e.loading_img+"\" alt=\"Checking for lenders\" />": "Checking...");
            // set message
            e.message_element.html(e.messagea);
            e.date_element.html(img);
        },
        /**
         * setDoneMessage
         * 
         * this method sets the done message.
         */
        setDoneMessage : function () {
            //short cut to method
            var e = methods.default_options;
            //create image html
            // set message
            e.message_element.html(e.messageb);
            e.date_element.html("");
        },
        /**
         * returnDateTime
         * 
         * returns current date and time in the following format:
         * mm/dd/yyyy hh:mm:ss PM/AM
         */
        returnDateTime : function () {
            var d = new Date();//set new date
            var  mm = d.getMonth() + 1; //get date (add 1 to make hr)
            mm = methods.addZero(mm); //adds zero to month
            var dd = d.getDate(); //get date
            dd = methods.addZero(dd); //adds zero to date
            var yyyy = d.getFullYear(); //gets full year
            //time
            var h = d.getHours(); //get the hour
            var ap = (h <= 12) ? "AM" : "PM"; 
            //conver to normal time
            h = (h <= 12) ? h : h -12; 
            var m = d.getMinutes(); //get minutes
            m = methods.addZero(m);//add zero in front of minutes if minutes < 10
            var s = d.getSeconds();//get the seconds
            //add zero to seconds if < 10
            s = methods.addZero(s);
            //return a formated date
            return mm + "/" + dd + "/" + yyyy + " " + h + ":" + m +":" + s + " " + ap;
        },
        /**
         * addZero
         * 
         * Adds a zero infront of a number if the value is less than 10
         * 
         * @param d int provide the number to be evaluated for an extra zero
         * 
         * @return string returns a string with the number 0 in front of it if the value is less than 10
         */
        addZero : function (d) {
            return (d < 10) ? '0' + d : d; //adds zero to month  
        },
        /**
         * cookie
         * 
         * returns the value of the cookie with the name c_name
         * 
         * @param c_name string provide the name of the cookie's value you would like.
         * 
         * @return null | string this may return null if the cookie is not set or a string with it's value if it is.
         * 
         */
        cookie : function (c_name){
            var i,x,y,ARRcookies=document.cookie.split(";");
            for (i=0;i<ARRcookies.length;i++)
            {
                x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
                y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
                x=x.replace(/^\s+|\s+$/g,"");
                if (x==c_name)
                {
                    return unescape(y);
                }
            }
        },
        /**
         * setCookie
         * 
         * Sets a cookie with its name c_name and value and will expire in exdays
         * 
         * @param c_name string Provide the name of the cookie to set.
         * @param value string provide the value of the cookie you would like to set.
         * @param exdays int provide the number of days you would like the cookie to expire in.
         * 
         */
        setCookie : function (c_name, value, exdays){
            var exdate=new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
            document.cookie=c_name + "=" + c_value;
        }  
    }
    /**
     * setClock
     * 
     * A jQuery plugin that sets the clock in with the options
     * 
     * @param options object (Optional) provide the options you would like to have.
     * 
     */
    $.setClock = function(options) {
        // Do your awesome plugin stuff here
        methods.init(options);
    };
})( jQuery );