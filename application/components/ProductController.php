<?php
/**
 * ProductController is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
abstract class ProductController extends Controller
{   //// MEMBERS
    
    /**
     * @var array The configuration for the flow
     */
    protected $_config;
    
    /**
     * @var string HitPath Campaign ID
     */
    protected $_cid;

    /**
     * @var string HitPath Affiliate ID
     */
    protected $_affid;

    /**
     * @var string HitPath Sub-affiliate ID
     */
    protected $_subid;

    /**
     * @var string HitPath C1 tracking param
     */
    protected $_c1;

    /**
     * @var string HitPath C2 tracking param
     */
    protected $_c2;

    /**
     * @var string HitPath C3 tracking param
     */
    protected $_c3;

    /**
     * @var string HitPath Hit ID
     */
    protected $_hid;
    
    /**
     * @var string HitPath Transaction ID
     */
    protected $_tid;

    /**
     * @var string The advertisement model to use for the traffic
     */
    protected $_adModel = 'ppa';
    
    /**
     * @var string The provider who bought the lead
     */
    protected $_provider;

    /**
     * @var string Lead Sale Price
     */
    protected $_price;

   /**
    * @var string The HTML output to be shown to the user
    */
    protected $_output = '';
    
    /**
     * @var boolean A flag to indicate whether or not to show the data
     */
    protected $_showData = false;
    
    /**
     * @var string The referring step
     */
    protected $_referrer;
    
    /**
     * @var boolean Whether or not this sale should be treated as a test
     */
    protected $_test = false;
    
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/templates/layouts/column1.php'.
     */
//  public $layout='//layouts/default';

    //// METHODS

    /**
     * Add the filters
     */
    // public function filters()
    // {
        // return array(
            // 'accessControl',
        // );
    // }
    
    /**
     * Set the default access rules
     * 
     * Permit everyone to see the login page, allow authenticated users to do anything, and
     * deny by default
     */
    // public function accessRules()
    // {
        // return array(
            // array('allow'),
        // );
    // }

    /**
     * Get the affiliate information
     */
    protected function getAffiliateInfo()
    {   // Set the affiliate parameters from session
        $affData = isset(Yii::app()->session['affData']) ? Yii::app()->session['affData'] : array();
        $this->_cid = isset($affData['cid']) ? $affData['cid'] : false;
        $this->_affid = isset($affData['aid']) ? $affData['aid'] : false;
        $this->_subid = isset($affData['subid']) ? $affData['subid'] : false;
        $this->_c1 = isset($affData['c1']) ? $affData['c1'] : false;
        $this->_c2 = isset($affData['c2']) ? $affData['c2'] : false;
        $this->_c3 = isset($affData['c3']) ? $affData['c3'] : false;
        $this->_hid = isset($affData['hid']) ? $affData['hid'] : false;
        $this->_adModel = isset($affData['adModel']) ? $affData['adModel'] : 'ppa';
        
        // Check for affiliate information in request
        $cid = $this->_request->getParam('cid');
        $affid = $this->_request->getParam('aid');
        $subid = $this->_request->getParam('subid');
        $c1 = $this->_request->getParam('c1');
        $c2 = $this->_request->getParam('c2');
        $c3 = $this->_request->getParam('c3');
        $hid = $this->_request->getParam('hid');
        $adModel = $this->_request->getParam('admodel');

        // Update non null parameters
        $this->_cid = ($cid !== null)?$cid:$this->_cid;
        $this->_affid = ($affid !== null)?$affid:$this->_affid;
        $this->_subid = ($subid !== null)?$subid:$this->_subid;
        $this->_c1 = ($c1 !== null)?$c1:$this->_c1;
        $this->_c2 = ($c2 !== null)?$c2:$this->_c2;
        $this->_c3 = ($c3 !== null)?$c3:$this->_c3;
        $this->_hid = ($hid !== null)?$hid:$this->_hid;
        $this->_adModel = ($adModel !== null)?$adModel:$this->_adModel;
        
        // Store the affiliate parameters
        $affData['cid'] = $this->_cid;
        $affData['aid'] = $this->_affid;
        $affData['subid'] = $this->_subid;
        $affData['c1'] = $this->_c1;
        $affData['c2'] = $this->_c2;
        $affData['c3'] = $this->_c3;
        $affData['hid'] = $this->_hid;
        $affData['adModel'] = $this->_adModel;
        Yii::app()->session['affData'] = $affData;
        
        // Get the showData parameter
        $this->_showData = isset(Yii::app()->session['showData']) ? Yii::app()->session['showData'] : null;
        if( $this->_showData === null ) $this->_showData = false;
        if( Yii::app()->request->getParam('showData') == 1 ) $this->_showData = true;
        Yii::app()->session['showData'] = $this->_showData;

        // Get the test parameter
        $this->_test = isset(Yii::app()->session['test']) ? Yii::app()->session['test'] : null;
        if( $this->_test === null or Yii::app()->request->getParam('test') === '0' ) $this->_test = 0;
        if( Yii::app()->request->getParam('test') == -2 ) $this->_test = -2;
        if( Yii::app()->request->getParam('test') == -1 ) $this->_test = -1;
        if( Yii::app()->request->getParam('test') == 1 ) $this->_test = 1;
        if( Yii::app()->request->getParam('test') == 2 ) $this->_test = 2;
        Yii::app()->session['test'] = $this->_test;
    }

    /**
     * Gets a value from the request
     * 
     * @param string $name The name of the value to get
     * @return mixed The value of the found value, or null if not found
     */
    protected function getValue($name)
    {   // Initialize to null
        $value = null;
        $value = Yii::app()->request->getParam('rbm_'.$this->_domain->type.'_'.$name);        
        if( $value === null ) $value = Yii::app()->request->getParam('rbm_'.$name);
        if( $value === null ) $value = Yii::app()->request->getParam($name);
        // Return the value
        return $value;
    }
    
    /**
     * Collect the data from the request item
     * 
     * Note that if the value is invalid it must be set to null, or risk overwriting correct non null data.
     * 
     * @param StdClass $cfg The configuration to use when collecting the data
     * @return array The collected data
     */
    protected function collectData($cfg)
    {   // Initialize the return value
        $data = array();
        // Loop through all the data fields specified in the configuration
        foreach( $cfg as $field => $info ) {
            // Get the value of the incoming item
            $value = $this->getValue($field);
            // Process any values that need to be manipulated
            switch( true ) {
                // Handle boolean
                case ($value === "true" ):
                    $value = true;
                    break;
                case ($value === "false" ):
                    $value = false;
                    break;
                // Handle zip
                case ($info->type === 'zip'):
                    if(!$value) $value = null;
                    break;
                // Handle Phones & SSN
                case ($info->type === 'phone'):
                case ($info->type === 'ssn'):
                    if( $value === null and isset($info->components) and is_array($info->components)) {
                        $value = '';
                        foreach($info->components as $name) {
                            $value .= $this->getValue($name);
                        }
                        // If the value is blank, return to null state
                        if ($value === '' ) $value = null;
                    }
                    break;
                // Handle Dates
                case ($info->type === 'date'):
                    if( $value === null and isset($info->components) and is_array($info->components)) {
                        // Initialize the components
                        $month = false;
                        $day = false;
                        $year = false;
                        // Look for the components
                        foreach($info->components as $name) {
                            switch(true) {
                                case preg_match('/month/',$name):
                                    $month = $name;
                                    break;
                                case preg_match('/day/',$name):
                                    $day = $name;
                                    break;
                                case preg_match('/year/',$name):
                                    $year = $name;
                                    break;
                            }
                        }
                        // Build a value
                        $value .= ($year)?$this->getValue($year).'-':date('Y');
                        $value .= ($month)?$this->getValue($month).'-':date('m');
                        $value .= ($day)?$this->getValue($day):'01';
                    }
                    // Parse a non null date string into a timestamp
                    $value = $value ? strtotime($value) : false;
                    // If a valid timestamp is found, convert it into an ISO 8601 representation
                    $value = ($value !== false) ? date('Y-m-d',$value) : false;
                    
                    // If the value is fale, return to null state for catch below
                    if ($value === false ) $value = null;
                    break;
                // Handle integers
                case ((string)$info->type === "integer"):
                    // Strip out $ and ,
                    $value = str_replace(array('$',','),array('',''),$value);
                    break;
                case ((string)$info->type === 'name'):
                    // Strip unauthorized characters
                    $newVal = '';
                    for($i=0;$i<strlen($value);$i++) {
                        $char = substr($value,$i,1);
                        if( preg_match('/^[A-Za-z\ \-\'\.]{1}/',$char) ) {
                            $newVal .= $char;
                        }
                    }
                    $value = $newVal;
                    // Null blank results
                    if( !$value ) $value = null;
                    break;
                case ((string)$info->type === 'address'):
                    // Strip unauthorized characters
                    $newVal = '';
                    for($i=0;$i<strlen($value);$i++) {
                        $char = substr($value,$i,1);
                        if( preg_match('/^[A-Za-z0-9\ \-\'\.\#]{1}/',$char) ) {
                            $newVal .= $char;
                        }
                    }
                    $value = $newVal;
                    // Null blank results
                    if( !$value ) $value = null;
                    break;
                default:
                    if( !$value ) $value = null;
                    break;
            }

            // Store data if it is non-null or required
            $data[$field] = $value;
        }

        // Return the collected data
        return $data;
    }

    /**
     * Validates the data according to a given configuration
     * 
     * @param StdClass $cfg The configuration to use when validating the data
     * @param array $data The data to validate
     * @return array The errors encountered
     */
    protected function validateData($cfg,$data)
    {   // Initialize the response
        $errors = array();
        
        // Loop through each data element and validate based on the type
        foreach( $cfg as $field => $info ) {
            // Get the value of the incoming field
            $value = isset($data[$field])?$data[$field]:null;

            // Get the data name
            $fieldName = str_replace('_',' ',$field);

            // Process any values that need to be manipulated
            switch( true ) {
                // Handle Zip Codes
                case ((string)$info->type === 'zip'):
                    // Check if it is required
                    if( $info->required and $value === null ) {
                        $errors[$field] = "Please provide your {$fieldName}";
                        break;
                    }
                    // Look up the state
                    $data['state'] = ZipCode::getState($value);
                    if( $data['state'] === false ) {
                        $errors[$field] = "Please provide a valid {$fieldName}";
                        $data['state'] = null;
                        break;
                    }
                    break;
                // Handle Integers
                case ((string)$info->type === 'integer'):
                    // Check if it is required
                    if( $info->required and $value === null ) {
                        $errors[$field] = "Please provide your {$fieldName}";
                        break;
                    }
                    // Ensure a proper value
                    if( !is_numeric($value) or "".intval($value) !== $value or $value < 0) {
                        $errors[$field] = "Please provide a valid {$fieldName}";
                        break;
                    }
                    
                    break;
                // Handle Phones
                case ($info->type === 'phone'):
                    // Check if it is required
                    if( $info->required and $value === null ) {
                        $errors[$field] = "Please provide your {$fieldName}";
                        break;
                    }
                    // Ensure a proper value
                    if (
                        !is_numeric($value) or 
                        ("".intval($value) !== $value) or 
                        $value < 0 or strlen($value) < 10 or
                        preg_match('/^([2-9]{1}\d{2})([2-9]{1}\d{2})\d{4}$/',$value) == false
                    ) {
                        $errors[$field] = "Please provide a valid {$fieldName}";
                        break;
                    }
                    break;
                // Handle SSN
                case ($info->type === 'ssn'):
                    // Check if it is required
                    if( $info->required and $value === null ) {
                        $errors[$field] = "Please provide your {$fieldName}";
                        break;
                    }
                    // Ensure a proper value
                    if( 
                        !is_numeric($value) or 
                        "".intval($value) !== ltrim($value,'0') or 
                        $value < 0 or strlen($value) < 9  or 
                        substr($value,0,3) == '666' or
                        substr($value,0,1) == '9' or
                        substr($value,0,3) == '000' or
                        substr($value,3,2) == '00' or
                        substr($value,6,4) == '0000'
                    ) {
                        $errors[$field] = "Please provide a valid {$fieldName}";
                        break;
                    }
                    break;
                // Handle Dates
                case ($info->type === 'date'):
                    // Check if it is required
                    if( $info->required and $value === null ) {
                        $errors[$field] = "Please provide your {$fieldName}";
                        break;
                    }
                    // Ensure that the value can be translated to a time
                    $time = strtotime($value);
                    if( $time === false ) {
                        $errors[$field] = "Please provide a valid {$fieldName}";
                        break;
                    }
                    // Check for absolute range settings
                    if( isset($info->range->absolute) ) {
                        // Check for min
                        if( isset($info->range->absolute->min) ) {
                            // Get the minimum date as a timestamp
                            $min = $info->range->absolute->min;
                            $limit = false;
                            switch(true) {
                                case ($min == 'today'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'));
                                    break;
                                case ($min == 'yesterday'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'))-86400;
                                    break;
                                case ($min == 'tomorrow'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'))+86400;
                                    break;
                                case (in_array($min,array_keys($data))):
                                    $limit = strtitime($data[$min]);
                                    break;
                                default:
                                    $limit = strtotime($min);
                                    break;
                            }
                            // Enforce ordering
                            if( $time <= $limit ) {
                                $errors[$field] = ucfirst($fieldName)." must be after ".str_replace('_',' ',$min);
                                break;
                            }
                        }
                        // Check for max
                        if( isset($info->range->absolute->max) ) {
                            // Get the maximum date as a timestamp
                            $max = $info->range->absolute->max;
                            $limit = false;
                            switch(true) {
                                case ($max == 'today'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'));
                                    break;
                                case ($max == 'yesterday'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'))-86400;
                                    break;
                                case ($max == 'tomorrow'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'))+86400;
                                    break;
                                case (in_array($max,array_keys($data))):
                                    $limit = strtotime($data[$max]);
                                    break;
                                default:
                                    $limit = strtotime($max);
                                    break;
                            }
                            // Enforce ordering
                            if( $time >= $limit ) {
                                $errors[$field] = ucfirst($fieldName)." must be before ".str_replace('_',' ',$max);
                                break;
                            }
                        }
                    }
                    // Check for relative range settings
                    if( isset($info->range->relative) ) {
                        // Check for min
                        if( isset($info->range->relative->min) ) {
                            // Get the minimum date as a timestamp
                            $min = $info->range->relative->min;
                            $limit = false;
                            switch(true) {
                                case ($min == 'today'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'));
                                    break;
                                case ($min == 'yesterday'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'))-86400;
                                    break;
                                case ($min == 'tomorrow'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'))+86400;
                                    break;
                                case (in_array($min,array_keys($data))):
                                    $limit = strtotime($data[$min]);
                                    break;
                                default:
                                    $limit = strtotime($min);
                                    break;
                            }
                            // Enforce ordering
                            if( $time <= $limit ) {
                                $errors[$field] = ucfirst($fieldName)." must be after ".str_replace('_',' ',$min);
                                break;
                            }
                        }
                        // Check for max
                        if( isset($info->range->relative->max) ) {
                            // Get the maximum date as a timestamp
                            $max = $info->range->relative->max;
                            $limit = false;
                            switch(true) {
                                case ($max == 'today'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'));
                                    break;
                                case ($max == 'yesterday'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'))-86400;
                                    break;
                                case ($max == 'tomorrow'):
                                    $limit = strtotime(date('Y-m-d 00:00:00'))+86400;
                                    break;
                                case (in_array($max,array_keys($data))):
                                    $limit = strtotime($data[$max]);
                                    break;
                                default:
                                    $limit = strtotime($max);
                                    break;
                            }
                            // Enforce ordering
                            if( $time >= $limit ) {
                                $errors[$field] = ucfirst($fieldName)." must be before ".str_replace('_',' ',$max);
                                break;
                            }
                        }
                    }
                    // Check for bank holidays
                    if( isset($info->bankDay) and $info->bankDay ) {
                        // Check for weekends
                        $day = date('D',$time);
                        if( $day == 'Sat' or $day == 'Sun' ) {
                            $errors[$field] = ucfirst($fieldName)." cannot fall on a weekend";
                            break;
                        }
                        // Check for bank holidays
                        if( Holiday::check(date('Y-m-d',$time)) ) {
                            $errors[$field] = ucfirst($fieldName)." cannot fall on a federal holiday";
                            break;
                        }
                    }
                    break;
                // Handle pay schedules
                case ((string)$field == 'pay_schedule'):
                    // Check if it is required
                    if( $info->required and $value === null ) {
                        $errors[$field] = "Please choose your {$fieldName}";
                        break;
                    }
                    // Check for valid entries
                    if( !in_array($value,$info->values) ) {
                         $errors[$field] = "Please choose a valid {$fieldName}";
                         break;
                    }
                    // Enforce schedule limits
                    if( 
                        in_array($info->match->start,array_keys($data)) and
                        in_array($info->match->end,array_keys($data))
                    ) {
                        // Get the start and end timestamps
                        $start = strtotime($data[$info->match->start]);
                        $end = strtotime($data[$info->match->end]);
                        // Get the longest time lapse allowed
                        switch($value) {
                            case "weekly":
                                $lapse = 10*86400;
                                break;
                            case "biweekly":
                                $lapse = 17*86400;
                                break;
                            case "semimonthly":
                                $lapse = 18*86400;
                                break;
                            case "monthly":
                                $lapse = 33*86400;
                                break;
                        }
                        // Check to make sure the actual time lapse is inside the range
                        if( $end - $start >= $lapse ) {
                            $errors[$field] = "Paydates do not match pay schedule";
                            break;
                        }
                    }
                    break;
                // Handle lists
                case ((string)$info->type === 'list'):
                    // Handle 'true' and 'false' values
                    $listval = $value;
                    if( $listval === true ) $listval = 'true';
                    if( $listval === false ) $listval = 'false';
                    // Check if it is required
                    if( $info->required and $listval === null ) {
                        $errors[$field] = "Please choose your {$fieldName}";
                        break;
                    }
                    // Check for valid entries
                    if( !in_array($listval,$info->values) ) {
                        $errors[$field] = "Please choose a valid {$fieldName}";
                        break;
                    }
                    break;
                // Handle email addresses
                case ((string)$info->type === 'email'):
                    if( $info->required and !isset($data[$field]) and $data[$field] === null) {
                        $errors[$field] = "Please provide your {$fieldName}";
                        break;
                    }
                    if( filter_var($value,FILTER_VALIDATE_EMAIL) === false ) {
                        $errors[$field] = "Please provide a valid {$fieldName}";
                        break;
                    }
                    break;
                // Handle terms
                case ((string)$field == 'terms'):
                    if( $info->required and !isset($data[$field]) and $data[$field] === null) {
                        $errors[$field] = "You must agree to the terms and privacy policy to continue";
                        break;
                    }
                    break;
                // Handle bank name
                case ((string)$info->type == 'bankRoutingNumber'):
                    // Check for valid entry
                    if( $info->required and !isset($data[$field]) and $data[$field] === null) {
                        $errors[$field] = "Please provide your {$fieldName}";
                        break;
                    }
                    // Check for entry in table
                    if( RoutingNumber::getName($value) === false ) {
                        $errors[$field] = "Please provide a valid {$fieldName}";
                        break;
                    }
                    break;
                // Handle bank name
                case ((string)$info->type == 'bankName'):
                    // Check for valid entry
                    if( $info->required and !isset($data[$field]) and $data[$field] === null) {
                        $errors[$field] = "Please provide your {$fieldName}";
                        break;
                    }
                    // Check for match to router number
                    if( isset($info->match) and in_array($info->match,array_keys($data)) ) {
                        // Get the name by the routing number
                        $name = RoutingNumber::getName($data[$info->match]);
                        // If the name and the value are non null and don't match, show error and replace user entered name with the one from the DB
                        if( $name !== false and strtolower($name) != strtolower($value) ) {
                            $errors[$field] = ucfirst($fieldName) ." does not match ".str_replace($info->match,'_',' ').". Did you mean {$name}?";
                            // Store the updated data
                            $sessData = $this->_data;
                            $sessData[$field] = $name;
                            $this->_data = $sessData;
                            // Save the data to the session
                            Yii::app()->session['data'] = $this->_data;
                        }
                        break;
                    }
                    break;
                // Default behavior
                default:
                    // Check if it is required
                    if( $info->required and !isset($data[$field]) and $data[$field] === null) {
                        $errors[$field] = "Please provide your {$fieldName}";
                    }
                    break;
            }
        }

        // Return the collected errors
        return $errors;
        
    }

    /**
     * Populates form elements using the data stored in session
     * 
     * @return string The populated HTML template
     * @todo Implement better XML parse error handling
     */
    protected function populateForm()
    {   // Log the action
        $this->log('Populating');

        // Process the data
        if(
            isset($this->_config->views->{$this->_action}->data) and
            $this->_config->views->{$this->_action}->data
        ) {
            // Grab a reference to the data element obj from the configuration
            $dataCfg = $this->_config->views->{$this->_action}->data;

            // Create a SimpleXML element out of the HTML
            libxml_use_internal_errors(true);
            
            // Strip out the doctype
            $doctypes = array();
            if( preg_match_all('/\<!doctype[^>]*>/i',$this->_output,$doctypes) === false ) {
                throw new CHttpException(500,'Internal Error');
            }
            $doctypes = count($doctypes)?$doctypes[0]:array();
            
            $this->_output = trim(str_replace($doctypes,'',$this->_output));

            // Load the template into an XML object
            $xml = simplexml_load_string($this->_output);

            // Process any errors found loading the XML
            // Need better error handling here, but XML parsing errors are show stoppers and should be caught in testing
            if($xml === false) {
                // Loop through the errors and log an error event for each
                $errors = [];
                foreach(libxml_get_errors() as $error) {
                    $errors[] = $error->message;
                }

                // Handle appropriately
                if( APPLICATION_ENVIRONMENT == 'production' ) {
                    // In production environment, log the errors and throw an exception
                    $this->log('Error loading output: '.print_r($errors,1));
                    throw new CHttpException(500,'Internal Error');
                } else {
                    // In development/testing environments, show errors on screen and exit
                    foreach($errors as $error) {
                        echo $error."\n<br />";
                    }
                    die();
                }
                // Should never make it here, but return anyway
                return;
            }

            // Loop through the config elements and replace the values
            foreach( $dataCfg as $dataId => $dataEl ) {
                switch(true) {
                    // Handle date form elements
                    case ((string)$dataEl->type == 'date'):
                        // Process the value into it's month, day and year components
                        $value = ( isset( $this->_data[$dataId] ) ) ? $this->_data[$dataId] : null;
                        $value = ( $value ) ? strtotime($value) : false;
                        // If no timestamp, invalid time, move on
                        if( $value === false ) break;
                        // Parse the date components
                        $month = date('m',$value);
                        $day = date('d',$value);
                        $year = date('Y',$value);
                        // Process component elements
                        if( isset($dataEl->components) and is_array($dataEl->components ) ) {
                            // Loop through the components
                            foreach($dataEl->components as $id => $component) {
                                // Check for input element - Note the naming convention that must be used for form input elements in the config and HTML
                                $result = $xml->xpath("//input[@id='rbm_{$this->_domain->type}_{$component}']");
                                // If the element is a single input element, process the contents
                                if( count( $result ) ) {
                                    // Grab the element
                                    $el = $result[0];
                                    // Fill in the right part of the date
                                    $dataVal = '';
                                    switch(true) {
                                        case (preg_match('/_month$/',"rbm_{$this->_domain->type}_{$component}")):
                                            $dataVal = $month;
                                            break;
                                        case (preg_match('/_day$/',"rbm_{$this->_domain->type}_{$component}")):
                                            $dataVal = $day;
                                            break;
                                        case (preg_match('/_year$/',"rbm_{$this->_domain->type}_{$component}")):
                                            $dataVal = $year;
                                            break;
                                    }                                    
                                    // Add the value attribute if it doesn't exist
                                    if( !$el->attributes()->value ) {
                                        // Add the value attribute with the stored value
                                        $el->addAttribute('value',$dataVal);
                                    } else {
                                        $el->attributes()->value = $dataVal;
                                    }
                                    // Done processing this component
                                    continue;
                                }
                                // Check for select element
                                $result = $xml->xpath("//select[@id='rbm_{$this->_domain->type}_{$component}']/option");
                                // If the element was not found, move on to the next element
                                if( !count( $result ) ) continue;
                                // // Loop through the options
                                foreach($result as $option) {
                                    // Fill in the right part of the date
                                    $dataVal = '';
                                    switch(true) {
                                        case (preg_match('/_month$/',"rbm_{$this->_domain->type}_{$component}")):
                                            $dataVal = $month;
                                            break;
                                        case (preg_match('/_day$/',"rbm_{$this->_domain->type}_{$component}")):
                                            $dataVal = $day;
                                            break;
                                        case (preg_match('/_year$/',"rbm_{$this->_domain->type}_{$component}")):
                                            $dataVal = $year;
                                            break;
                                    }
                                    // If the option's value is the same as the current value, set the selected attribute
                                    if( $option->attributes()->value == $dataVal ) {
                                        // Add the value attribute if it doesn't exist, set it if it does
                                        if( !$option->attributes()->selected ) {
                                            // Add the value attribute
                                            $option->addAttribute('selected','selected');
                                        } else {
                                            // Set the value attribute
                                            $option->attributes()->selected = 'selected';
                                        }
                                    } else {
                                        unset($option->attributes()->selected);
                                    }
                                }
                            }
                        } else {
                            // Handle single input date elements (date pickers)
                            
                            // Convert the timestamp back into a date string
                            $value = date('m/d/Y',$value);
                            // Get the element from markup using XPath
                            $result = $xml->xpath("//input[@id='rbm_{$this->_domain->type}_{$dataId}']");
                            // If the element was not found, move on to the next element
                            if( !count( $result ) ) break;
                            // Grab the element
                            $el = $result[0];
                            // Add the value attribute if it doesn't exist
                            if( !$el->attributes()->value ) {
                                // Add the value attribute
                                $el->addAttribute('value',$value);
                            } else {
                                $el->attributes()->value = $value;
                            }
                        }
                        break;
                    // Handle List drop down elements
                    case ((string)$dataEl->type == 'list'):
                        // Get the data value
                        $value = (isset($this->_data[$dataId]))?$this->_data[$dataId]:null;
                        // Change the value to a string for boolean
                        if( $value === true ) {
                             $value = "true";
                        }
                        if( $value === false ) {
                            $value = "false";
                        }
                        // If there is a value to set, update the element
                        if( $value !== null ) {
                            // Get the element from markup using XPath
                            $result = $xml->xpath("//select[@id='rbm_{$this->_domain->type}_{$dataId}']/option");
                            // If the element was not found, move on to the next element
                            if( !count( $result ) ) break;
                            // // Loop through the options
                            foreach($result as $option) {
                                // If the option's value is the same as the current value, set the selected attribute
                                if( $option->attributes()->value == $value ) {
                                    // Add the value attribute if it doesn't exist, set it if it does
                                    if( !$option->attributes()->selected ) {
                                        // Add the value attribute
                                        $option->addAttribute('selected','selected');
                                    } else {
                                        // Set the value attribute
                                        $option->attributes()->selected = 'selected';
                                    }
                                } else {
                                    unset($option->attributes()->selected);
                                }
                            }
                        }
                        break;
                    // Handle Checkbox elements
                    case ((string)$dataEl->type == 'checkbox'):
                        // Get the data value
                        $value = (isset($this->_data[$dataId]))?$this->_data[$dataId]:null;
                        // Get the element from markup using XPath
                        $result = $xml->xpath("//input[@id='rbm_{$this->_domain->type}_{$dataId}']");
                        // If the element was not found, move on to the next element
                        if( !count( $result ) ) break;
                        // Grab the element
                        $el = $result[0];
                        // If the checkbox is checked, then add the checked attribute
                        if( $value ) {
                            // Add the value attribute if it doesn't exist
                            if( !$el->attributes()->checked ) {
                                // Add the value attribute
                                $el->addAttribute('checked','checked');
                            } else {
                                $el->attributes()->checked = 'checked';
                            }
                        } else {
                            unset($el->attributes()->checked);
                        }
                        break;
                    // Handle radio elements
                    case ((string)$dataEl->type == 'radio'):
                        // Get the data value
                        $value = (isset($this->_data[$dataId]))?$this->_data[$dataId]:null;
                        if( $value === true ) {
                             $value = "true";
                        }
                        if( $value === false ) {
                            $value = "false";
                        }
                        // Get the element from markup using XPath
                        $result = $xml->xpath("//input[@name='rbm_{$this->_domain->type}_{$dataId}']");
                        // If the element was not found, move on to the next element
                        if( !count( $result ) ) break;
                        // Loop through the elements
                        foreach($result as $el) {
                            // If there is a value to set, update the element whose value matches the submitted data
                            if( 
                                $value !== null and
                                (
                                    $el->attributes()->value and
                                    $el->attributes()->value == $value
                                )
                            ) {
                                // Add the value attribute if it doesn't exist
                                if( !$el->attributes()->checked ) {
                                    // Add the value attribute
                                    $el->addAttribute('checked','checked');
                                } else {
                                    $el->attributes()->checked = 'checked';
                                }
                            } else {
                                unset($el->attributes()->checked);
                            }
                        }
                        break;
                    // Handle everything else
                    case ((string)$dataEl->type == 'ssn'):
                    case ((string)$dataEl->type == 'phone'):
                    default:
                        // If there is a value, add it
                        $value = (isset($this->_data[$dataId]))?$this->_data[$dataId]:null;
                        if( $value ) {
                            if( isset($dataEl->components) and is_array($dataEl->components ) ) {
                                // Initialize the counters
                                $pos = 0;
                                // Loop through the components
                                foreach($dataEl->components as $id => $component) {
                                    // Get the element from markup using XPath
                                    $result = $xml->xpath("//input[@id='rbm_{$this->_domain->type}_{$component}']");
                                    // If the element was not found, move on to the next element
                                    if( !count( $result ) ) break;
                                    // Grab the element
                                    $el = $result[0];
                                    // Get the max length value
                                    $max = $el->attributes()->maxlength;
                                    // Grab the set of characters
                                    $subval = substr($value,$pos,(int)$max);
                                    // Add the value attribute if it doesn't exist
                                    if( !$el->attributes()->value ) {
                                        // Add the value attribute
                                        $el->addAttribute('value',$subval);
                                    } else {
                                        $el->attributes()->value = $subval;
                                    }
                                    // Update the tracker
                                    $pos += $max;
                                }
                            } else {
                                // Get the element from markup using XPath
                                $result = $xml->xpath("//input[@id='rbm_{$this->_domain->type}_{$dataId}']");
                                // If the element was not found, move on to the next element
                                // Grab the element
                                $el = $result[0];
                                // Add the value attribute if it doesn't exist
                                if( !$el->attributes()->value ) {
                                    // Add the value attribute
                                    $el->addAttribute('value',$value);
                                } else {
                                    $el->attributes()->value = $value;
                                }
                            }
                        }
                        break;
                }
            }

            // Fetch and process output
            $this->_output = str_replace('<?xml version="1.0"?>','',$xml->asXML());
            foreach($doctypes as $doctype) {
                $this->_output = $doctype."\n".$this->_output;
            }
        }
    }

    /**
     * Shows errors on the form
     * 
     * @todo Implement better XML parse error handling
     * @todo Abstract error display markup to use a template
     */
    protected function showErrors()
    {   // Process the data
        if(
            isset($this->_config->views->{$this->_action}->data) and
            $this->_config->views->{$this->_action}->data
        ) {
            // Grab a reference to the data element obj from the configuration
            $dataCfg = $this->_config->views->{$this->_action}->data;

            // Create a SimpleXML element out of the HTML
            libxml_use_internal_errors(true);
            
            // Strip out the doctype
            $doctypes = array();
            if( preg_match_all('/\<!doctype[^>]*>/i',$this->_output,$doctypes) === false ) {
                throw new CHttpException(500,'Internal Error');
            }
            $doctypes = count($doctypes)?$doctypes[0]:array();
            
            $this->_output = trim(str_replace($doctypes,'',$this->_output));
            // Load the template into an XML object
            $xml = simplexml_load_string($this->_output);

            // Process any errors found loading the XML
            if($xml === false)
            {   // Loop through the errors and log an error event for each
                foreach(libxml_get_errors() as $error)
                {
                    echo $error->message."\n<br />";
                    
    //              error_log('Error parsing XML file ' . $file . ': ' . $error->message);
                }

                // Report an error back to the caller
                throw new CHttpException(500,'Internal Error');
                return;
            }

            // Initialize the message vars
            $showMsg = false;
            $msgBox = '<div class="errorBox"><h2>Please fix the following errors</h2><ul>';

            // Loop through the config elements and add the error class
            foreach( $dataCfg as $dataId => $dataEl ) {
                // Check for an error for the data element
                if( in_array($dataId,array_keys($this->_errors)) ) {
                    // Indicate that there are errors to show
                    $showMsg = true;
                    
                    //// MESSAGE
                    $msgBox .= '<li>'.$this->_errors[$dataId].' </li>';
                    
                    //// LABEL
                    // Get the element from markup using XPath
                    $result = $xml->xpath("//label[@for='rbm_{$this->_domain->type}_{$dataId}']");
                    // If the element was not found, move on to the next element
                    if( count( $result ) ) {
                        // Grab the element
                        $el = $result[0];
                        // Add the value attribute if it doesn't exist
                        if( !$el->attributes()->class ) {
                            // Add the value attribute
                            $el->addAttribute('class','error');
                        } else {
                            $val = $el->attributes()->class;
                            $val .= ' error';
                            $el->attributes()->class = $val;
                        }
                    }

                    //// ELEMENT(S)
                    if( isset($dataEl->components) and is_array($dataEl->components) ) {
                        foreach($dataEl->components as $id => $component) {
                            $result = $xml->xpath("//*[@id='rbm_{$this->_domain->type}_{$component}']");
                            // If the element was not found, move on to the next element
                            if( count( $result ) ) {
                                // Grab the element
                                $el = $result[0];
                                // Add the value attribute if it doesn't exist
                                if( !$el->attributes()->class ) {
                                    // Add the value attribute
                                    $el->addAttribute('class','error');
                                } else {
                                    $val = $el->attributes()->class;
                                    $val .= ' error';
                                    $el->attributes()->class = $val;
                                }
                            }
                        }
                    } else {
                        $result = $xml->xpath("//*[@id='rbm_{$this->_domain->type}_{$dataId}']");
                        // If the element was not found, move on to the next element
                        if( count( $result ) ) {
                            // Grab the element
                            $el = $result[0];
                            // Add the value attribute if it doesn't exist
                            if( !$el->attributes()->class ) {
                                // Add the value attribute
                                $el->addAttribute('class','error');
                            } else {
                                $val = $el->attributes()->class;
                                $val .= ' error';
                                $el->attributes()->class = $val;
                            }
                        }
                    }
                }
            }

            // Wrap up the message box
            $msgBox .= ' </ul></div>';
            
            // Show the message if errors were found
            if( $showMsg ) {
                
                // Convert output to a DOMDocument for prepend operation (SimpleXML cannot do prepend)
                $dom = new DOMDocument('1.0');
                $dom->loadXML($xml->asXML());

                // Query for content
                $xpath = new DOMXPath($dom);
                $query = "//*[@id='rbm_{$this->_domain->type}_content']";
                $results = $xpath->query($query);                
                $msg = dom_import_simplexml(simplexml_load_string($msgBox));
                $msg = $dom->importNode($msg,true);

                // Loop through the results and add the new message box (should only execute once - IDs are unique)
                foreach($results as $content) {
                    $content->insertBefore($msg, $content->firstChild);
                }

                // Convert back to SimpleXML
                $xml = simplexml_import_dom($dom);
            }
            
            // Fetch and process output
            $this->_output = str_replace('<?xml version="1.0"?>','',$xml->asXML());
            foreach($doctypes as $doctype) {
                $this->_output = $doctype."\n".$this->_output;
            }
        }
    }

    /**
     * Controller specific initialization
     */
    public function init()
    {   // Run the parent init behavior
        parent::init();
        
        // Pull affiliate information out of request
        $this->getAffiliateInfo();
    }
    
    /**
     * getViewFile
     * 
     * Finds the path of a view file by it's name
     * 
     * @param String $viewName The name of the view to find
     * @return the view file path, false if the view file does not exist
     */
    public function getViewFile($viewName)
    {   // Try the template specific path first
        $path = APPLICATION_PATH.$this->_paths['pkg_template'].'/html/'.$viewName.'.php';
        if( file_exists($path) ) return $path;
        // Next try the domain common path
        $path = APPLICATION_PATH.$this->_paths['pkg_common'].'/html/'.$viewName.'.php';
        if( file_exists($path) ) return $path;
        // Finally, try the app common path
        $path = APPLICATION_PATH.$this->_paths['app_common'].'/html/'.$viewName.'.php';
        if( file_exists($path) ) return $path;
        // If none of these files were found, return false to indicate failure
        return false;
    }
    
    /**
     * getConfig
     * 
     * Retrieves the template configuration from disk
     * 
     * @todo Implement config merging, so that common portions of configuration; may be saved
     * in the domain or common levels.
     */
    public function getConfig()
    {   // Try the template specific path first
        $fname = APPLICATION_PATH.$this->_paths['pkg_template'].'/config.json';
        if( file_exists($fname) ) {
            return json_decode(file_get_contents($fname));
        }
        // Next try the domain common path
        $fname = APPLICATION_PATH.$this->_paths['pkg_common'].'/config.json';
        if( file_exists($fname) ) {
            return json_decode(file_get_contents($fname));
        }
        // Finally, try the app common path
        $fname = APPLICATION_PATH.$this->_paths['app_common'].'/config.json';
        if( file_exists($fname) ) {
            return json_decode(file_get_contents($fname));
        }
        // If none of these files were found, return false to indicate failure
        if( !$this->_config) throw new CException('Configuration not found');
    }

    /**
     * render
     * 
     * Render the view file
     * 
     * @param string $view The name of the view to be rendered
     * @param array $data The data to be made available to the view
     * @param boolean $return A flag to indicate whether or not the view contents should be rendered
     * @return mixed The contents of the view file if return flag is true
     */
    public function render($view,$data=null,$return=false) 
    {
        if($this->beforeRender($view))
        {
            $output=$this->renderPartial($view,$data,true);
            $layoutFile = str_replace('//',APPLICATION_PATH,$this->layout);
            
            if((file_exists($layoutFile))!==false)
                $output=$this->renderFile($layoutFile,array('content'=>$output),true);
    
            $this->afterRender($view,$output);
    
            $output=$this->processOutput($output);
    
            if($return)
                return $output;
            else
                echo $output;
        }
    }

    /**
     * Renders a partial view
     * 
     * Overrides the parent behavior to throw a 404 instead of a 500 when a view isn't found
     */
    public function renderPartial($view,$data=null,$return=false,$processOutput=false)
    {
        if(($viewFile=$this->getViewFile($view))!==false)
        {
            $output=$this->renderFile($viewFile,$data,true);
            if($processOutput)
                $output=$this->processOutput($output);
            if($return)
                return $output;
            else
                echo $output;
        }
        else
            throw new CHttpException(404,'The page you requested does not exist.');
    }

    /**
     * Fills a view template with the given values
     * 
     * This method can be run on any string, but is intended to be run on output from the render() {@link render()}
     * method. The input template is parsed, and the keys from the data array will be wrapped in the delimiter
     * string and 
     */
    public function renderTemplate(array $data,$delimiter='@') // Changed from @@ to @
    {   // loop through the data set and replace the keys with their values
        // foreach( $data as $key=>$value) {
            // $this->_output = str_replace("{$delimiter}{$key}{$delimiter}","{$value}",$this->_output);
        // }
        
        // Initialize
        $input = $this->_output;
        $output = '';
        $keyBuffer = '';
        $buffer = false;
        $dest =& $output;

        // Loop through the input
        for( $i=0; $i<strlen($input); $i++) {
            // Check for characters
            if( !isset($input[$i]) ) break;
            
            // Check for buffer characters
            if( isset($input[$i+1]) and $input[$i] == $delimiter and $input[$i+1] == $delimiter ) {
                if( !$buffer ) {
                    $buffer = true;
                    $dest =& $keyBuffer;
                    $dest = '';
                } else {
                    // Turn off character buffering
                    $buffer = false;
                    $dest =& $output;
                    // Check for the key in the data set, and add the value to the output if it is present
                    if( isset($data[$keyBuffer]) ) {
                        $dest .= $data[$keyBuffer];
                    }
                }
                // Skip forward, jumping past the delimiters
                $i++;
            } else {
                 $dest .= $input[$i];
            }
        }

        // Set the output
        $this->_output = $output;
    }

    /**
     * Registers a click with the front end tracking
     * 
     * @todo Track failures in click tracking via logs
     * @todo Limit tracking to only production environments
     */
    protected function _registerFrontEndClick()
    {   // Create a hit id if none present
        if( !$this->_hid /* and APPLICATION_ENVIRONMENT == 'production' */) {
            // Construct the URL
            $url = "https://affiliate.rbmtracker.com/rd/r.php?pub={$this->_affid}&sid={$this->_cid}&c1={$this->_c1}&c2={$this->_c2}&c3={$this->_c3}";
            // Mark the click
            $response = file_get_contents($url);
            // Check for permission denied from HitPath
            if( $response == 'The link you have requested is not available, please try your request later.') return;
            // Decode response
            $json = json_decode($response);
            // Check for invalid response
            if( $json === null ) return;
            // Validate the HID
            if( !$json->hid || !is_numeric($json->hid) ) return;
            // Store the HID
            $this->_hid = $json->hid;
            $affData = Yii::app()->session['affData'];
            $affData['hid'] = $this->_hid;
            Yii::app()->session['affData'] = $affData;
            // Log the click
            $this->log('Click registered: '.$this->_hid);
        }
    }

    /**
     * Registers a click with the front end tracking
     */
    protected function _registerFrontEndSale($data=false,$log=false)
    {   // Check for a hit ID
        if( !$this->_hid ) return;
        // Construct the URL
        $url = "https://affiliate.rbmtracker.com/rd/px.php?hid={$this->_hid}&sid={$this->_cid}&transid={$this->_tid}";
        if( 
            $data and 
            is_array($data) and 
            isset($data['payin']) and 
            is_numeric($data['payin']) and
            $data['payin'] >= 0.0 
        ) {
            $url.="&ate={$data['payin']}";
        }
        if( 
            $data and 
            is_array($data) and 
            isset($data['payout']) and 
            is_numeric($data['payout']) and
            $data['payout'] >= 0.0 
        ) {
            $url.="&atp={$data['payout']}";
        }
        // Mark the sale
        file_get_contents($url);
        $this->log('Sale registered: '.$url);
    }


} // End ProductController class