/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * NOTE: This plugin requires jQuery 1.8.3 to work effectively on chrome and firefox
 */
(function($) {
    /**
     * Create a popunder
     *
     * @param  sUrl Url to open as popunder
     *
     * @return jQuery
     */
    $.popunder = function(sUrl) {
        var bSimple = $.browser.msie,
        run = function() {
            $.popunderHelper.open(sUrl, bSimple);
        };
        (bSimple) ? run() : window.setTimeout(run, 1);
        return $;
    };
    /* several helper functions */
    $.popunderHelper = {
        /**
         * Helper to create a (optionally) random value with prefix
         *
         * @param  name string Provide a name.
         * @param rand boolean provide true or false.
         *
         * @return string
         */
        rand: function(name, rand) {
            var p = (name) ? name : 'pu_';
            return p + (rand === false ? '' : Math.floor(89999999*Math.random()+10000000));
        },
        /**
         * Open the popunder
         *
         * @param  sUrl string The URL to open
         * @param  bSimple boolean Use the simple popunder
         *
         * @return boolean
         */
        open: function(sUrl, bSimple) {
            var _parent = self,
            sToolbar = (!$.browser.webkit && (!$.browser.mozilla || parseInt($.browser.version, 10) < 12)) ? 'yes' : 'no',
            sOptions,
            popunder;
                
            if (top != self){
                try {
                    if (top.document.location.toString()) {
                        _parent = top;
                    }
                }
                catch(err) { }
            }
            /* popunder options */
            sOptions = 'toolbar=' + sToolbar + ',scrollbars=yes,location=yes,statusbar=yes,menubar=no,resizable=1,width=' + (screen.availWidth - 10).toString();
            sOptions += ',height=' + (screen.availHeight - 122).toString() + ',screenX=0,screenY=0,left=0,top=0';
        
            /* create pop-up from parent context */
            popunder = _parent.window.open(sUrl, $.popunderHelper.rand(), sOptions);
            if (popunder) {
                popunder.blur();
                if (bSimple) {
                    /* classic popunder, used for ie*/
                    window.focus();
                    try {
                        opener.window.focus();
                    }
                    catch (err) { }
                }
                else {
                    /* popunder for e.g. ff4+, chrome */
                    popunder.init = function(e) {
                        with (e) {
                            (function() {
                                if (typeof window.mozPaintCount != 'undefined' || typeof navigator.webkitGetUserMedia === "function") {
                                    var x = window.open('about:blank');
                                    x.close();
                                //window.alert("d");
                                }
        
                                try {
                                    opener.window.focus();
                                }
                                catch (err) { }
                            })();
                            }
                    };
                    popunder.params = {
                        url: sUrl
                    };
                    popunder.init(popunder);
                }
            }   
            return true;
        }
    };
    var methods = {
        /**
         * options
         *
         * Options object has predefined values, but may also be passed in the parameter or the
         * popunder function.
         *
         * @value String url Provide the url to open.
         * @value String name Optional. Specifies the target attribute or the name of the window.
         * @value String specs Optional. A comma-separated list of items.
         * @value String replace Optional. Specifies whether the URL creates a new entry or replaces the current entry in the history list.
         * @value bool flag
         * @value bool flag
         */
        options: {
            url: "",
            name: "",
            specs: "scrollbars=yes,location=yes,statusbar=yes,menubar=no,resizable=1",
            replace: "",
            form: "",
            popUnderCookieName : "rbm_rx",
            trigger : "",
            triggered : false
        },
        /**
         * controller
         *
         * This overloaded method executes methods based on the navigator. Each method that follows
         * is named after a popular navigator and will be executed if the user is using this navigator. Before doing so, it
         * checks the argument type. If it's a string it assumes it's the URL of the page
         * the popunder should open and assigns it to the methods.options.url object. If it's
         * not, it should be an object and merges that object with the methods.options object.
         *
         * @param options string|Object Provide the URL the popunder should open or an object with options. (see options documentation above)
         * @param form_id Object provide the jquery object for the form element. Required for Chrome compatibility
         * @param trigger_obj Object The element that will trigger the popunder (not the form);
         */
        controller: function(options, form_id, trigger_obj) {
            //check if browser cookie has been set and triggered, if so that 
            //means that the popup has already been made so stop making more popus
            
            var cookie = methods.checkForPopunder();
            if (cookie == 'true')
                return;//kills the function here if the popunder has already been set.
            //merge options
            //if type of variable is a string
            if(typeof options == "string" && typeof form_id == "object") {
                //assign the value of 'options' to methods.options.url.
                methods.options.url = options;
                //set the id of the form
                methods.options.form = form_id;
                methods.options.trigger = trigger_obj;
            //if type of variable is an object
            } else if(typeof options == "object") {
                //merge options object values with methods.options
                methods.options = $.extend(methods.options, options);
                methods.options.trigger = trigger_obj;
            } //kill operation if it is any other type of object.
            else { //alert developer
                alert("Improper value set as options or form_id Please see documentation.");
                return; //end method
            } // Otherwise fetch browser version 
            
            var browser = methods.getBrowser();
            //call a method based on the browser type.
            methods[browser]();
        },
        /**
         * Safari
         *
         * Safari popunder uses classicPopunder. See classicPopunder documentation.
         */
        Safari: function() {
            //shortcut
            var opts = methods.options;
            
            opts.trigger.click(function (){
                if(opts.triggered == false){
                    opts.triggered = true;
                    methods.classicPopUnder(); 
                }
                    
                    
            });
        },
        /**
         * Opera
         *
         * Opera is not supported.
         */
        Opera: function() {
        //Not supported
        },
        /**
         * Firefox
         *
         * uses the "change" event listener.
         */
        Firefox: function() {
            var opts = methods.options;
            opts.trigger.on("click", function (){
                if(opts.triggered == false){
                    opts.triggered = true;
                    jQuery.popunder(methods.options.url); 
                    methods.setCookie(opts.popUnderCookieName, true, 1);
                }
                    
                  
            });
        },
        /**
         * MSIE
         *
         * [Internet Explorer] See classicPopUnder method documentation.
         */
        MSIE: function() {
            var opts = methods.options;
            opts.trigger.click(function (){
                if(opts.triggered == false){
                    methods.classicPopUnder();
                }
            });
        },
        /**
         * Chrome
         *
         * See advancedPopUnder method documentation.
         */
        Chrome: function() {
            
            //triger window from context of iFrame
           
           
           
            //short cut
            var opts = methods.options;
            var parent = opts.trigger.parent();
            
            //create iframe
            var iframe = $("<iframe id='rbm_pu' />");
            parent.append(iframe);
            $("#rbm_pu")
            .contents()
            .find('html').click(function (){
                
                myWindow=window.open(opts.url,'',opts.specs);
                myWindow.blur();
                var x = window.open('about:blank');
                x.close();
                myWindow.opener.focus();
                opts.trigger.click();
                methods.setCookie(opts.popUnderCookieName, true, 1);
            }).css({
                "min-height" : 100,
                "min-width" : 100,
                "overflow" : "hidden"
            });
            var pos = opts.trigger.position();
            $("#rbm_pu").css({
                "position" : "absolute",
                "top" : pos.top,
                "left" : pos.left,
                "width" : opts.trigger.css('width'),
                "height" : opts.trigger.css('height'),
                "margin-left" : opts.trigger.css('margin-left'),
                "margin-right" : opts.trigger.css('margin-right')
            });
        },
        /**
         * other
         *
         * This method is meant for any other browser no supported. See classicPopUnder documentation.
         */
        other: function() {
            var opts = methods.options;
            
            opts.trigger.click(function (){
                if(opts.triggered == false){
                    opts.triggered = true;
                    methods.classicPopUnder(); 
                }
                    
                    
            });
        },
        /**
         * classicPopUnder
         *
         * This method utilizes the conventional way of generating a popunder.
         * It generates a window open event the blurs that window and focuses on this window.
         */
        classicPopUnder: function() {
            var opts = methods.options;
         
            var a = window.open(opts.url, opts.name, opts.specs, opts.replace)
            
            //if the page was succesfully created add cookie
            //set cookie for 1 day.
            methods.setCookie(opts.popUnderCookieName, true, 1);
            
            a.blur();
            window.focus();
        },
        /**
         * advancedPopUnder
         * 
         * This method assigns an event handler to the assigned triger in the params.
         * Uses the $.popunder plugin before this plugin. See documentation for this plugin.
         */
        advancedPopUnder : function (){
            //shortcut
            methods.options.trigger.on("click", function (){
                jQuery.popunder(methods.options.url); 
            });
        },
        /**
         * getBrowser
         *
         * Fetches the browser name of the navigator. Will return the name of the four popular browsers in
         * in string format or "Other" if it's another browser.
         *
         * @return string returns the name of the one of 5 popular browsers or "other" if it's a different type of browser.
         */
        getBrowser: function() {
            var regex = /(Safari|Chrome|Firefox|Opera|MSIE)/;
            var browser = navigator.userAgent
            browser = browser.match(regex);
            return(browser == null) ? "other" : browser[0];
        },
        /**
         * getCookie
         * 
         * Fetches the value of a cookie.
         * 
         * @param c_name String Provide the name of the cookie who's value you  you want returned.
         * 
         * @return string|null Returns the string or null of the cookie with the name c_name 
         */
        getCookie : function (c_name) {
            
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
            return null;
        },
        /**
         * setCookie
         * 
         * Sets a cookie by the name c_name and value. Set to expire in exdays days.
         * 
         * @param c_name string Provide the name of the cookie.
         * @param value string Provide the value of the cookie.
         * @param exdays number Provide the number of days the cookie will expire in.
         */
        setCookie : function (c_name, value, exdays){
            var exdate=new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
            document.cookie=c_name + "=" + c_value;
        },
        /**
         * checkForPopunder
         * 
         * Checks if the cookie for the popunder has been set.If it has, then return string, else return null
         * 
         * @return String|null returns value of cookie if set otherwise returns null.
         */
        checkForPopunder : function (){
            //options shortcut
            var opt = methods.options;
            //check if popunder has already been called
            var cookie = methods.getCookie(opt.popUnderCookieName);
            return (cookie == "" || cookie == null)?null : cookie; 
        }
    }; 
    /**
     * popUnder
     *
     * This method is a standalone function that can be called to open a popunder with the url specified
     * in the options object or options as a string.
     *
     * @param options String|Object A string containing the URL or an object containing the options for the open method.
     * 						See options documentation.
     * @param formObj Object if options param is string, then provide the jQuery object form. This is required for Chrome support.
     */
    $.fn.pop_Under = function(options, formObj) {
        //initiate controller method
        methods.controller(options, formObj, this);
    };
    
    $.rbm_popunder = function (){
        myWindow=window.open('','','width=200,height=100');
        myWindow.document.write("<p>This is 'myWindow'</p>");
        myWindow.blur();
        var x = window.open('about:blank');
        x.close();
        //myWindow.opener.document.write("<p>This is the source window!</p>");
        myWindow.opener.focus();   
    };
})(jQuery);