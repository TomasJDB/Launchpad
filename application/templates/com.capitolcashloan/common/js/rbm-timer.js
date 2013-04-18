/* 
 * Author: Felipe Tadeo
 * Date created: Dec 7, 2012
 * 
 * Modified: March 11, 2013
 * Changes: 
 * Fixed an issue that caused @S to not show correctly
 * 
 * Modified: Jan 30, 2013
 * Changes: 
 * Added support for formatting.
 * Added support for method to support more than just input elements.
 * 
 * Creates a timer that will work through out all pages and displays the value in
 * the selected element. !Must be an input. You may create multiple instances of
 * of this behaivior. You must provide a unique name per object in the options.
 * You have four options when setting the options.
 * options : {
 * h: 0 set the ammount of hours to count down from
 * m: 10 set the number of minutes to count down from (default is 10)
 * s: 0 set the nubmer of seconds to count down from.
 * name: "rbm_timer" Set the name of the cookie, provide different name for
 * different timers
 * }
 */
(function( $ ) {
    //the class tha the plugin will use/
    var methods ={
        /**
         * default_options
         * 
         * This object contains the default settings for the rbm-timer plugin.
         * 
         * @var h number looking for the number of hours to count down to. Default is set to 0
         * @var m number looking for the number of minutes to count down to. Default is set to 10
         * @var m number looking for the number of seconds to count down to. Default is set to 0
         * @var name string This is the name of the cookie. By default it is called "rbm_timer"
         * @var method string define the what method to use to replace the text of the element. IE (val (val()) for inputs, text or html (html() | text())for divs)
         * @var format string Define the format you want the time to be displayed in. ex: @m:@s = 10:
         */
        default_options : {
            h: 0,
            m: 10,
            s: 0,
            name : "rbm_timer",
            method : 'val',
            format: '@M:@S'
        },
        /**
         * init
         * 
         * This method brings everything together. This method performs the following order:
         * Merges options with default options.
         */
        init : function (options, el) {
            // return "10";
            //merge options
            $.extend(methods.default_options, options);
            // fetch target time or set target time
            var d2 = methods.handleCookie(methods.default_options.name);
            // set function to loop 
            var refresh = function(){
                //create new date to compare target time to 
                var date1 = new Date();
                //get the miliseconds from jan, 1970 or whatever
                var d1 = date1.getTime();
                // subtract the miliseconds from the target time (d2) to the current time
                //this also returns the remaining time in the proper format (h:m:s)
                var tm = methods.subtractTime(d1, d2);
                //set the value of the defined element object
                el[methods.default_options.method](tm.format);
                //if the time is == 00 then do this
                if(tm.time <= 0){
                    //reset the cookie because it's not there anymore
                    d2 = methods.handleCookie(methods.default_options.name)
                }
            }//refresh function end
            //call refresh() function to start off the timer.
            refresh();//this prevents the slight dely from happening
            //set up the refresh interval every 1000 miliseconds
            var refreshId = setInterval(function (){
                refresh();//call the refresh function
            }, 1000);  
        },
        /**
         * subtractTime
         * 
         * returns the difference in time from the date2 - date1 objects in h:m:s
         * 
         * @param date1 number Expecting a date in miliseconds from the greater date time.
         * @param date2 number Expecting a date in miliseconds from the less date time.
         * 
         * @return string returns a string with the time format in h:m:s or 00 if no time is left.
         * 
         */
        subtractTime : function (date1, date2) {
            //perform difference operation
            var timer_difference = date2 - date1;
            
            //convert to proper format using the convertMiliseconds method and return
            return methods.convertMiliseconds(timer_difference);
        },
        /**
         * handleCookie
         * 
         * This method handles the cookie. If the cookie is set, it returns it's value.
         * If the cookie is not set, then it creates a cookie based on the cookie_name and
         * sets the target time to the appropriate time based on the h, m, s values provided
         * in the default_options object.
         * 
         * @return number returns the number of miliseconds since jan 1970 or whatever plus the number of miliseconds of the target time
         * 
         */
        handleCookie : function (){
            //get the name of the cookie from the default options
            var cookie_name = methods.default_options.name;
            //attempt to get the value of the cookie by name.
            var timedestination=methods.getCookie(cookie_name);
            //check if the cookie exists
            if (timedestination!=null && timedestination!="")
            {//if exists, return time in miliseconds stored in cookie's value
                return Number(timedestination);
            }else 
            {//if the cookie doesn't exits, then check to make sure the name in the options is not a bad string.
                if (cookie_name!=null && cookie_name!="")//if the name is not a bad string, the do the following:
                {//cookie is NOT set continue
                    //shortcut to default options
                    var d = methods.default_options;
                    //set up time from now
                    var t = new Date();
                    //add hours
                    t.setHours(t.getHours() + d.h);
                    //add minutes
                    t.setMinutes(t.getMinutes() + d.m);
                    //add seconds
                    t.setSeconds(t.getSeconds() + d.s);
                    //convert this into miliseconds
                    var timed = t.getTime();
                    var exp = methods.convertToMiliSeconds(d.h, d.m, d.s)
                    //Store time in miliseconds to cookie named
                    methods.setCookie(cookie_name,timed,exp);
                    //Return time in miliseconds stored in cookie
                    return timed;
                }else{
                    alert("Error: Timer name is not properly set.")
                }//alert developer that name is not set properly
            }
        },
        /**
         * setCookie
         * 
         * This method will set the cookie by the name of c_cookie, value, and will expire in expiration
         * 
         * @param c_name String Expecting the name that the cookie should be named cookie
         * @param value String Expecting the value that the cookie should store
         * @param expiration Number Expecting the time in miliseconds from the current time the cookie should expire
         */
        setCookie: function(c_name,value,expiration)
        {//convert expiration to number
            var expiration = Number(expiration);
            var exdate=new Date();//create new date
            exdate.setTime(exdate.getTime() + expiration); //calculate date to expire
            //set cookie value, and experation date. If experation arguement is null, then set to session expiration
            var c_value=escape(value) + ((expiration==null) ? "" : "; expires="+exdate.toUTCString());
            //set cookie
            document.cookie=c_name + "=" + c_value;
        },
        /**
         * getCookie
         * 
         * fetch the cookie by name (c_name)
         * 
         * @param c_name string Provide the name of the cookie you who's value you want
         * 
         * @return string Will return the value of the cookie, or null or undfined on no value.
         */
        getCookie: function(c_name)
        {
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
         * convertMiliseconds
         * 
         * converts seconds to time
         * 
         * @param ms number expecting the seconds converted to time
         * 
         * @return string "h:m:s" If no hour, will return m:s, if no minutes, will return "00:s"
         */
        convertMiliseconds : function (ms){
            // convert to seconds
            var seconds = ms/1000;
            //convertToTime : function (seconds){
            // carve out minutes out of these seconds.
            var s  = seconds % 60;
            // s is now how many seconds there are
            // Get the remainding secons out of var seconds to get a nice even minutes
            var timeWithout_seconds= seconds - s;
            // TimeWithoug_seconds is now seconds without the remainding secons
            // Convert timeWithout_seconds to minutes by dividing by 60
            var m  = timeWithout_seconds/60;
            // Get the raw minutes out of m to get the minutes in the time
            var mt = m%60;
            // mt is now the raw minutes in the time
            // take out the remainding minutes out of m to get an even hour.
            var hours = m - mt;
            // convert the minutes to hours
            var h  = hours/60;
            // here you would add support for hours and days minutes.
            // we can't do lightyears because lightyears is a form of measurement
            // and time isn't... or is it?
            // now we do some cleanup. so that we don't end up with stuff like:
            // "0:1:36"
            // this will return an empty string if hours are less than 1 and add
            // a zero prefix if the string is less than one character.
            s = Math.round(s);
            h = (h < 1) ? "" : (h.toString().length < 2)? "0" + h + ":" : h + ":";
            MT = (mt < 1 && h == "00:") ? "" : (mt.toString().length == 1)? "0" + mt : mt;
            S = (s < 1 && mt == "00") ? "00" : (s.toString().length == 1)? "0" + s  : s;
            
           var replacement ={
                
                '@h' : h,
                '@s' : s,
                '@m' : mt,
                '@M' : MT,
                '@S' : S
              
            }
            var str = methods.default_options.format;
            var regex = /\@[mhsSMT]/g;
            var format = str.replace(regex, function(match){
                return replacement[match];
            });
            
            var product = {
                format : format,
                time : h+s
            }
            return product
        // return product obj;
        },
        /**
         * convertToMiliSeconds
         * 
         * Takes [h]ours, [m]inutes, [s]econds and turns them int milisecons.
         * 
         * @param h number The number of hours.
         * @param m number The Number of minutes.
         * @param s number The number of seconds.
         * 
         * @return string Returns the provided information into miliseconds.
         */
        convertToMiliSeconds : function (h, m, s){
            //convert hours to minutes
            var min = h * 60;
            //add minutes to new hours
            min +=m;
            //convert minutes to seconds
            var sec = min*60
            //add seconds to new sec
            sec += s
            //convert seconds to miliseconds and return
            return sec*1000;
        }
    };
    /**
     * fn.rbmTimer
     * 
     * Sets the element plugin in motion.
     * 
     * @param options obj Expecting the options (optional)
     * 
     */
    $.fn.rbmTimer = function(options) {
        methods.init(options, this);
    };
})( jQuery );