/**
 * Real Bright Media Form Validation Plugin
 * 
 * This plugin pulls data out of form elements, and then checks them for presence, format, and range.
 * 
 * @author Christopher Koning <ckoning@realbrightmedia.com>
 */
(function( $ ){
  /**
   * Define the patterns to match againts
   */
  var patterns = {
    'name' : /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/,
    'email' : /^(([^<>()[\]\\.,;:@\"]+(\.[^<>()[\]\\.,;:@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
    'zip' : /^[0-9]{5}$/,
    'integer' : /^(-)?([0-9])+$/,
    'phone' : /^[0-9]{10}$/,
//  'phoneNumber' : /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/,
    'dateMonthYearSlash' : /^[0-9]{1,2}\/[0-9]{1,2}$/,
    'dateMonthYearDash' : /^[0-9]{1,2}-[0-9]{1,2}$/,
    'dateAmericanSlash' : /^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/,
    'dateAmericanDash' : /^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/,
    'dateIso8601' : /^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/,
    'ssn' : /^[0-9]{9}$/,
    'creditCardNum' : /^[0-9]{15,16}$/,
    'creidtCardExpiry' : /^[0-9]{1,2}-01-[0-9]{4}$/,
    'creditCardCvv' : /^[0-9]{3,4}$/,
    'bankAccountNumber' : /^\w{1,17}$/,
    'bankRoutingNumber' : /^[0-9]{9}$/,
    'alphanumeric' : /^\w+$/,
    'license' : /^[A-Za-z0-9\-]+$/,
    'initials' : /^[A-Za-z]{2,3}$/
  };

  /**
   * The options to use with the display elements of the error reporting
   */
  var options = {};

  /**
   * Store the errors found in validation
   */
  var errors = {};
  
  /**
   * The data fields to validate
   */
  var data = {};

  /**
   * Gets a date string from a date element
   */
  function _getDateVal( item ) {
    // Don't act unless the form element is defined in the config
    if( typeof data[item] !== 'undefined' ) {
      // Define the prefix
      var prefix = '#'+options.prefix || '#';

      // Pull the configuration
       var config = data[item];

      // Get the value
      var val = null;
      if( typeof config.components === 'object' ) {
        // Create a value obj to store submissions
        var valObj = {
          day : '',
          month : '',
          year : ''
        };
        // Create an expected value obj
        var expValObj = {
          day : false,
          month : false,
          year : false
        }

        // Get component values
        for( var i in config.components ) {
          var component = config.components[i];
          switch(true) {
            case (/month/g.test(component)):
              expValObj.month = true;
              valObj.month = $(prefix+component).val();
              break;
            case (/day/g.test(component)):
              expValObj.day = true;
              valObj.day = $(prefix+component).val();
              break;
            case (/year/g.test(component)):
              expValObj.year = true;
              valObj.year = $(prefix+component).val();
              break;
          }
        }
        
        // Check for SOMETHING to have been input
        var input = false;
        for( var d in valObj ) {
          if( valObj[d] ) {
            input = true;
          }
        }
        // If there was input, then construct the valu, otherwise return the empty string
        if( input ) {
          // Compensate for missing data
          if( !expValObj.day && !valObj.day ) {
            valObj.day = '01';
          }
          if( !expValObj.month && !valObj.month ) {
            valObj.month = '01';
          }
          if( !expValObj.year && !valObj.year ) {
            valObj.year = Date.today().toString('yyyy');
          }
          // Create the value string
          val = valObj.year+'-'+valObj.month+'-'+valObj.day;
        } else {
          val = '';
        }
      } else {
        val = $(prefix+item).val();
      }
    }

    return val;
  }
  
  /**
   * Gets a date object from a string
   */
  function _getDateObj( dateStr ) {
    // Create a valid flag
    var valid = false;
    // Handle relative dates
    switch( true ) {
        case ( dateStr === 'today' ):
          return Date.today();
          break;
        case ( dateStr.match(/^today\ /) !== null):
          // Initialize the return value to null
          var date = null
          // Split on spaces to parse
          var dateArr = dateStr.split(' ');
          // Ensure there are at least three elements
          if( dateArr.length !== 3 ) {
            return date;
          }
          // Proess parts
          var op = dateArr[1].charAt(0);
          var num = parseInt(dateArr[1]);
          var period = dateArr[2].toLowerCase();
          // Return the relevant date
          switch(true) {
            case(period == 'days'):
              date = Date.today().add(num).days();
              break;
            case(period == 'months'):
              date = Date.today().add(num).months();
              break;
            case(period == 'years'):
              date = Date.today().add(num).years();
              break;
          }
          
          // Return the result
          return date;
          
          break;
    }
    // Check for rough formatting
    switch( true ) {
      case ( patterns.dateIso8601.test(dateStr) ):
        valid = true;
        break;
      case ( patterns.dateAmericanSlash.test(dateStr) ):
        valid = true;
        break;
      case ( patterns.dateAmericanDash.test(dateStr) ):
        valid = true;
        break;
      case ( patterns.dateMonthYearSlash.test(dateStr) ):
        valid = true;
        break;
      case ( patterns.dateMonthYearDash.test(dateStr) ):
        valid = true;
        break;
    }

    // Return null if patterns don't match
    if( !valid ) return null;
    
    // Otherwise parse and return the date string with Date.js
    var date = Date.parse(dateStr);
    return date;
  }
    
  /**
   * Define the methods available for the plugin
   */
  var methods = {
    /**
     * Initiate validator behavior
     * 
     * Bind events for the open links, the close links and the window
     */
    init : function( pageData, userOptions ) {
      // Get a reference to the form
      var form = $(this);
      // Load options into the plugin
      for( var option in userOptions ) {
          options[option] = userOptions[option];
      }
      // Check for appropriate config
      data = pageData || {};
      // Reset errors
      errors = {};
      // Set the prefix to use
      var prefix = options.prefix || '';
      // Attach change listeners to the elements to validate them immediately after
      // loosing focus
      for( var item in data ) {
        // Handle different types of elements
        switch(true) {
          // Handle composite elements
          case ( typeof data[item].components === 'object' ):
            // Loop through all components
            for( var i in data[item].components ) {
              // Attach blur listeners
              $('#'+prefix+data[item].components[i]).blur(function(){
                // Check for the data-validate element
                if( $(this).attr('data-validate') == 'true' ) {
                  // Find the name of the element
                  var itemName = $(this).attr('id').replace(prefix,'');
                  // Find the parent of the element
                  var parent = null;
                  for( var candidate in data ) {
                    if( 
                      typeof data[candidate].components === 'object' &&
                      $.inArray(itemName,data[candidate].components) >= 0
                    ) {
                        parent = candidate;
                    }
                  }
                  // If the parent wasn't found, something went wrong - abort
                  if( parent === null ) return this;              
                  // Otherwise, validate
                  form.validate('validate',parent);
                }
              });
 
            }
            break;
          case( data[item].type == 'radio' ):
            // Attach the change listener
            $('input:radio[name='+prefix+item+']').change(function(){
              var item = $(this).attr('name').replace(prefix,'');
              form.validate('validate',item);
            });
            // Attach the blur listener
            $('input:radio[name='+prefix+item+']').blur(function(){
              var item = $(this).attr('name').replace(prefix,'');
              form.validate('validate',item);
            });
            break;
          default:
            // Attach the change listener
            $('#'+prefix+item).change(function(){
              var item = $(this).attr('id').replace(prefix,'');
              form.validate('validate',item);
            });
            // Attach the blur listener
            $('#'+prefix+item).blur(function(){
              var item = $(this).attr('id').replace(prefix,'');
              form.validate('validate',item);
            });
            break;
        }
      }
      // Maintain chainability
      return this;
    },
    /**
     * Validates a form
     * 
     * @param string elements The name of the element or elements to validate. 
     * If left blank, then all elements in the configuration are validated.
     * @return boolean Whether or not the given element or elements is/are valid.
     */
    validate : function( elements ) {
      // Validate the given items
      switch(true) {
        case typeof elements === 'object':
          for( var el in elements ) {
            methods.validateItem( el );
          }
          break;
        case typeof elements === 'string':
          methods.validateItem( elements );
          break;
        default:
          for( var el in data ) {
            methods.validateItem(el);
          }
          break;
      }
      // Count up the errors
      var errCount = 0;
      for( var err in errors ) {
        errCount++;
      }
      // Get a reference to the current element
      var el = $(this);
      // Remove any errors that were present
      el.validate('removeErrors');
      // If there are errors, show the box and apply the classes
      if( errCount !== 0 ) {
        el.validate('showErrors');
        el.validate('applyErrors');
      }
      // Return a boolean 
      return (errCount === 0);
    },
    /**
     * Validate a single item
     * 
     * @param string item The name of the data item to validate
     */
    validateItem : function( item ) {
      // Don't act unless the form element is defined in the config
      if( typeof data[item] !== 'undefined' ) {

        // Erase any old errors
        if( typeof errors[item] !== 'undefined' ) {
          delete errors[item];
        }

        // Define the prefix
        var prefix = '#'+options.prefix || '#';

        // Pull the configuration
        var config = data[item];

        // Get the value
        var val = null;
        switch(config.type) {
          case 'checkbox':
            val = ($(prefix+item).is(':checked'));
            break;
          case 'radio':
            val = $('input:radio[name='+prefix.replace('#','')+item+']:checked').val();
            if( typeof val == 'undefined' ) {
              val ='';
            }
            break;
          case 'integer':
            val = $(prefix+item).val();
            break;
          case 'phone':
          case 'ssn':
            if( typeof config.components === 'object' ) {
              val = '';
              for( var i in config.components ) {
                val += $(prefix+config.components[i]).val();
              }  
            } else {
              val = $(prefix+item).val();
            }
            break;
          case 'date':
            val = _getDateVal(item);
            break;
          case 'name':
          case 'email':
          case 'bankRoutingNumber':
          case 'bankAccountNumber':
          default:
            val = $(prefix+item).val();
            break;
        }

        // Enforce the presence of required elements
        if( config.required === true ) {
          switch(config.type) {
            case 'checkbox':
              if( val !== true ) {
                errors[item] = 'Please provide your '+item.replace(/\_/g,' ');
                return;
              }
              break;
            case 'radio':
            case 'list':
              if( !val ) {
                errors[item] = 'Please choose your '+item.replace(/_/g,' ');
                return;
              }
            default:
              if( !val ) {
                errors[item] = 'Please provide your '+item.replace(/_/g,' ');
                return;
              }
              break;
          }
        }

        // Enforce formatting
        switch(config.type) {
          case 'list':
            var found = false;
            for( var i in config.values ) {
              if( config.values[i] === val ) {
                found = true;
                break;
              }
            }
            if( !found ) {
              errors[item] = 'Please choose a valid '+item.replace(/_/g,' ');
              return;
            }
            break;
          case 'zip':
            // Test against the zip pattern
            if( !patterns.zip.test(val) ) {
              errors[item] = 'Please provide a valid '+item.replace(/_/g,' ');
              return;
            }
            break;
          case 'integer':
            // Test against the integer pattern
            if( !patterns.integer.test(val) ) {
              errors[item] = 'Please provide a valid '+item.replace(/_/g,' ');
              return;
            }
            // Enforce range
            if( typeof config.range !== 'undefined' ) {
              if( typeof config.range.min === 'number' && val < config.range.min ) {
                errors[item] = item.replace(/_/g,' ') + ' must be at least '+ config.range.min;
                return;
              }
              if( typeof config.range.max === 'number' && val > config.range.max ) {
                errors[item] = item.replace(/_/g,' ') + ' cannot exceed '+ config.range.max;
                return;
              }
            }
            break;
          case 'name':
            // Test against the name pattern
            if( !patterns.name.test(val) ) {
              errors[item] = 'Please provide a valid '+item.replace(/_/g,' ');
              return;
            }
            break;
          case 'email':
            // Test against the email pattern
            if( !patterns.email.test(val) ) {
              errors[item] = 'Please provide a valid '+item.replace(/_/g,' ');
              return;
            }
            break;
          case 'checkbox':
            break;
          case 'phone':
            // Test against the phone pattern
            if( !patterns.phone.test(val) ) {
              errors[item] = 'Please provide a valid '+item.replace(/_/g,' ');
              return;
            }
            break;
          case 'ssn':
            // Test against the phone pattern
            if( !patterns.ssn.test(val) ) {
              errors[item] = 'Please provide a valid '+item.replace(/_/g,' ');
              return;
            }
            break;
          case 'date':
            // Check for valid date
            var usrDate = _getDateObj(val);
            if( usrDate === null ) {
              errors[item] = 'Please provide a valid '+item.replace(/_/g,' ');
              return;
            }
            
            // Check for restrictions
            if( typeof config.range === 'object' ) {
              // Absolute restrictions
              if( typeof config.range.absolute === 'object' ) {
                // Check against absolute minimum date
                if( typeof config.range.absolute.min === 'string' ) {
                  var minDate = _getDateObj(config.range.absolute.min)
                  if( usrDate.compareTo(minDate) < 0 ) {
                    errors[item] = item.replace(/_/g,' ').capitalize()+' must be after '+minDate.toString('MM/dd/yyyy');
                    return;
                  }
                }
                // Check against absolute maximum date
                if( typeof config.range.absolute.max === 'string' ) {
                  var maxDate = _getDateObj(config.range.absolute.max)
                  if( usrDate.compareTo(maxDate) > 0 ) {
                    errors[item] = item.replace(/_/g,' ').capitalize()+' must be before '+maxDate.toString('MM/dd/yyyy');
                    return;
                  }
                }
              }
              // Relative restrictions
              if( typeof config.range.relative === 'object' ) {
                // Check against user input minimum date
                if( typeof config.range.relative.min === 'string' ) {
                  // Find the config for the comparison element
                  var minDateItem = config.range.relative.min;
                  var minDateVal = _getDateVal(minDateItem);
                  // Get the comparison date object
                  var minDate = _getDateObj(minDateVal);                        
                  // Compare dates
                  if( usrDate.compareTo(minDate) < 0 ) {
                    errors[item] = item.replace(/_/g,' ').capitalize()+' must be after '+minDateItem.replace(/_/g,' ');
                    return;
                  }
                }
                // Check against user input maximum date
                if( typeof config.range.relative.max === 'string' ) {
                  // Find the config for the comparison element
                  var maxDateItem = config.range.relative.max;
                  var maxDateVal = _getDateVal(maxDateItem);
                  // Get the comparison date object
                  var maxDate = _getDateObj(maxDateVal);                        
                  // Compare dates                        
                  if( usrDate.compareTo(maxDate) < 0 ) {
                    errors[item] = item.replace(/_/g,' ').capitalize()+' must be after '+maxDateItem.replace(/_/g,' ');
                    return;
                  }
                }
              }
            }

            break;
          case 'bankAccountNumber':
            // Test against the zip pattern
            if( !patterns.bankAccountNumber.test(val) ) {
              errors[item] = 'Please provide a valid '+item.replace(/_/g,' ');
              return;
            }
            break;
          case 'bankRoutingNumber':
            // Test against the zip pattern
            if( !patterns.bankRoutingNumber.test(val) ) {
              errors[item] = 'Please provide a valid '+item.replace(/_/g,' ');
              return;
            }
          case 'alphanumeric':
            // Test against the zip pattern
            if( !patterns.alphanumeric.test(val) ) {
              errors[item] = 'Please provide a valid '+item.replace(/_/g,' ');
              return;
            }
            break;
          case 'ssn':
            // Test against the zip pattern
            if( !patterns.ssn.test(val) ) {
              errors[item] = 'Please provide a valid '+item.replace(/_/g,' ');
              return;
            }
            break;
        }
      }
    },
    /**
     * Removes the errors and highlighting from the display
     */
    removeErrors : function() {
      // Set the parent
      var parent = $(options.errorBoxParent) || $(this);

      // Remove any old error boxes
      parent.find('.errorBox').each(function() {
        $(this).remove();
      });
        
      // Remove existing error markings
      parent.find('.error').each(function(){
        $(this).removeClass('error').trigger('classChanged');
      });
    },
    /**
     * Show the errors on in an error box
     */
    showErrors : function() {
      // Set the parent
      var parent = $(options.errorBoxParent) || $(this);

      // Create the error box
      var errorBox = $('<div>')
        .addClass('errorBox');

      // Attach the error box to the page
      parent.prepend(errorBox);

      // Populate error box
      var notice = $('<h2>')
        .html('Please fix the following errors')
        .appendTo(errorBox);

      var errorList = $('<ul>')
        .appendTo(errorBox);

      for( var item in errors ) {
        var li = $('<li>')
          .html(errors[item])
          .appendTo(errorList);
      }

      // Maintain chainability
      return this;
    },
    /**
     * Applies the errors to form DOM elements
     */
    applyErrors : function() {
      // Loop through the error messages and apply them
      for( var item in errors ) {
        // Apply the error classes according to the element type
        methods.applyError(item)
      }

      // Maintain chainability
      return this;        
    },
    /**
     * Applies errors to DOM elements for a single item
     * 
     * @param string item The name of the item to apply the error to
     */
    applyError : function( item ) {
      // Ensure the data item exists
      if( typeof data[item] === 'object' ) {
        // Set the prefix to use
        var prefix = '#'+options.prefix || '#';
        // Handle composite elements
        if( typeof data[item].components === 'object' ) {
          // Apply to parent element, if there is one
          $('label[for='+prefix.replace('#','')+item+']').addClass('error');
          $(prefix+item).addClass('error').trigger('classChanged');
          // Apply to components
          var components = data[item].components;
          for( var i in components ) {
            // Apply the error class to the label and the inputs
            $('label[for='+prefix.replace('#','')+components[i]+']').addClass('error');
            $(prefix+components[i]).addClass('error').trigger('classChanged');
          }
        } else {
          // Apply the error class to the label and the inputs
          $('label[for='+prefix.replace('#','')+item+']').addClass('error');
          $(prefix+item).addClass('error').trigger('classChanged');
        }
      }
    }
  };

  /**
   * Add the functionality to the jQuery namespace
   * 
   * @param string method The method to call
   */
  $.fn.validate = function( method ) {
    if ( methods[method] ) {
      return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.validate.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on rbm-validator' );
    }    
  };
})( jQuery );