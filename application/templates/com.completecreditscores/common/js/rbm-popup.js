/**
 * Real Bright Media Popup Window Plugin
 * 
 * This plugin enables popup windows for links in browsers that have javascript turned on
 * 
 * @author Christopher Koning <ckoning@realbrightmedia.com>
 */
(function($) {
    /**
     * Add the function to the jQuery namespace
     * @param {Object} p An object defining the shared profile settings to use
     */
    $.fn.popup = function(p)
    {   // Create the profile using the param if presetn
        var profiles = p || {};
    
        // Process all elements in the set
        return this.each(function(index){
            // Declare variables
            var settings, parameters, mysettings, b, a;
            
            // for overrideing the default settings
            mysettings = ($(this).attr("rel") || "").split(",");
    
            // Set the default settings
            settings = {
                height:600,     // sets the height in pixels of the window.
                width:800,      // sets the width in pixels of the window.
                toolbar:0,      // determines whether a toolbar (includes the forward and back buttons) is displayed {1 (YES) or 0 (NO)}.
                scrollbars:1,   // determines whether scrollbars appear on the window {1 (YES) or 0 (NO)}.
                status:0,       // whether a status line appears at the bottom of the window {1 (YES) or 0 (NO)}.
                resizable:1,    // whether the window can be resized {1 (YES) or 0 (NO)}. Can also be overloaded using resizable.
                left:0,         // left position when the window appears.
                top:0,          // top position when the window appears.
                center:1,       // should we center the window? {1 (YES) or 0 (NO)}. overrides top and left
                createnew:1,    // should we create a new window for each occurance {1 (YES) or 0 (NO)}.
                location:0,     // determines whether the address bar is displayed {1 (YES) or 0 (NO)}.
                menubar:0       // determines whether the menu bar is displayed {1 (YES) or 0 (NO)}.
            };
    
            // if mysettings length is 1 and not a value pair then assume it is a profile declaration
            // and see if the profile settings exists
    
            if(mysettings.length == 1 && mysettings[0].split(":").length == 1)
            {
                a = mysettings[0];
                // see if a profile has been defined
                if(typeof profiles[a] != "undefined")
                {
                    settings = $.extend(settings, profiles[a]);
                }
            }
            else
            {
                // overrides the settings with parameter passed in using the rel tag.
                for(var i=0; i < mysettings.length; i++)
                {
                    b = mysettings[i].split(":");
                    if(typeof settings[b[0]] != "undefined" && b.length == 2)
                    {
                        settings[b[0]] = b[1];
                    }
                }
            }
    
            // Center the window based on the current resolution and desired window size
            if (settings.center == 1)
            {
                settings.top = (screen.height-(settings.height + 110))/2;
                settings.left = (screen.width-settings.width)/2;
            }
            
            // Create the parameter string
            parameters = "location=" + settings.location + ",menubar=" + settings.menubar + ",height=" + settings.height + ",width=" + settings.width + ",toolbar=" + settings.toolbar + ",scrollbars=" + settings.scrollbars  + ",status=" + settings.status + ",resizable=" + settings.resizable + ",left=" + settings.left  + ",screenX=" + settings.left + ",top=" + settings.top  + ",screenY=" + settings.top;
            
            // Bind the action to the element
            $(this).bind("click", function(){
                var name = settings.createnew ? "PopUpWindow" + index : "PopUpWindow";
                window.open(this.href, name, parameters).focus();
                return false;
            });
        });
    
    };
})( jQuery );
