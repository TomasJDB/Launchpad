<?php
/**
 * Class definition for the Data wrapper class
 */

/**
 * Data containment and validation class
 * 
 * This class captures and validates data similar to the CModel
 */
abstract class DataModel extends CModel
{   //// MEMBERS
    /**
     * @var string The RBM API service URL to send data to
     * @static
     * @abstract
     */    
    protected static $_api_url = '';
    
    /**
     * @var string The RBM API Key to use when interacting with the service
     * @static
     * @abstract
     *      */
    protected static $_api_key = '';

    /**
     * @var boolean Indicates whether or not to use the POST method to send the data to the API
     * @static
     * @abstract
     *      */
    protected static $_post = true;

    /**
     * @var array Maps the internal name of the field to the API field to recieve it
     * @static
     * @abstract
     *      */
    protected static $_fieldMap = false;

    /**
     * @var array The data properties for the data model
     */
    protected $_attributes;
    
    /**
     * @var array The request data in key/value format
     * 
     * Will be sent to the URL via GET or POST depending on the value of the $_post member.
     */
    protected $_request = false;
     
    /**
     * @var array The decoded response from the service
     */
    protected $_response = false;
    
    //// METHODS
    /**
     * Raises an onBeforeDeliver event to process all delivery set up
     * 
     * @return boolean A flag indicating whether or not to complete the delivery
     */
    protected function beforeDeliver()
    {
        if($this->hasEventHandler('onBeforeDeliver'))
        {
            $event=new CModelEvent($this);
            $this->onBeforeDeliver($event);
            return $event->isValid;
        }
        else
            return true;        
    }

    /**
     * Raises an onAfterDeliver event to process all delivery clean up
     */
    protected function afterDeliver()
    {
        if($this->hasEventHandler('onAfterDeliver'))
            $this->onAfterDeliver(new CEvent($this));        
    }

    /**
     * Get the name of the attributes in the model
     * 
     * @return array The names of the attributes
     */
    public function attributeNames()
    {
        return array_keys($this->_attributes);
    }
 
    /**
     * Deliver the lead to the RBM API
     * 
     * @param boolean $runValidation A flag to indicate whether or not the attributes should be validated
     * 
     * Defaults to true, validating the attributes.
     * 
     * @return boolean A flag indicating whether or not the delivery was completed
     */
    public function deliver($runValidation = true)
    {   // Perform set up tasks
        if( $this->beforeDeliver() ) {
            // Validate if desired 
            if(!$runValidation || $this->validate()) {
                // Loop through the field map and set up the request
                $this->_request = array();
                foreach(static::$_fieldMap as $localField=>$remoteField) {
                    $this->_request[$remoteField] = $this->$localField;
                }
                // Add static elements
                $this->_request = array_merge(
                    $this->_request, 
                    array(
                        'token'=>static::$_api_key,
//                        'aid'=>self::$_rbm_affid,
//                        'channel'=>self::$_channel
                    )
                );
                
                // Set up the URL
                $url = static::$_api_url;
                if( !static::$_post ) {
                    $url .= '?';
                    foreach( $this->_request as $key=>$value ) {
                        $url .= "{$key}={$value}&";
                    }
                    $url = rtrim($url,'&');
                }
                
                // Create a cURL handle
                $ch = curl_init();
                // Set options
                curl_setopt($ch, CURLOPT_URL, $url);       // SET THE SERVICE LOCATION
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);            // FOLLOW ANY REDIRECTS
                curl_setopt($ch, CURLOPT_HEADER, 0);                    // DO RETURN HTTP HEADERS (CHANGE TO 0 FOR PRODUCTION)
                if( static::$_post ) {
                    curl_setopt($ch, CURLOPT_POST, 1);                  // POST THE DATA
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $this->_request);        // ADD THE RECORD DATA
                }
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);            // RETURN THE CONTENTS OF THE CALL
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);            // DON'T VERIFY THE VALIDITY OF SSL CERT ON SERVICE SIDE
                // Execute cURL call and decode response
                $this->_response = json_decode(trim(curl_exec($ch)),true);
                // Close cURL handle
                curl_close($ch);
                // Process the response
                $this->afterDeliver();
                // Return a success flag
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * 
     */
    public function onBeforeCustom($event)
    {
        $this->raiseEvent('onBeforeCustom',$event);
    }
    
    /**
     * 
     */
    public function onAfterCustom($event)
    {
        $this->raiseEvent('onAfterCustom',$event);
    }
    
    /**
     * PHP getter magic method.
     * This method is overridden so that AR attributes can be accessed like properties.
     * @param string $name property name
     * @return mixed property value
     * @see getAttribute
     */
    public function __get($name)
    {
        if(isset($this->_attributes[$name]))
                return $this->_attributes[$name];
        else
                return false;
    }

    /**
     * PHP setter magic method.
     * This method is overridden so that AR attributes can be accessed like properties.
     * @param string $name property name
     * @param mixed $value property value
     */
    public function __set($name,$value)
    {
        echo $name.':'.$value;
        $this->_attributes[$name] = $value;
        return true;
    }

    /**
     * Checks if a property value is null.
     * This method overrides the parent implementation by checking
     * if the named attribute is null or not.
     * @param string $name the property name or the event name
     * @return boolean whether the property value is null
     */
    public function __isset($name)
    {
        if(isset($this->_attributes[$name]))
            return true;
        else
            return parent::__isset($name);
    }

    /**
     * Sets a component property to be null.
     * This method overrides the parent implementation by clearing
     * the specified attribute value.
     * @param string $name the property name or the event name
     */
    public function __unset($name)
    {
        if(isset($this->_attributes[$name]))
            unset($this->_attributes[$name]);
        else
            parent::__unset($name);
    }
    
} // End DataModel Class
