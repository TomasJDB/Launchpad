<?php
/**
 * The RBM Personal Loan API Wrapper Class File
 * 
 * @author Chris Koning <ckoning@realbrightmedia.com>
 */

/**
 * A Model Wrapper to Interact with the RBM API for personal loans
 * 
 * @author Chris Koning <ckoning@realbrightmedia.com>
 */
class RBMPersonalLoan
{    //// MEMBERS
    /**
     * @var string A regular expression for validating email addresses
     * @static
     */
    protected static $_email_regex = '/[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/';

    /**
     * @var string The RBM API service URL to send data to
     * @static
     */    
    protected static $_service_url = 'https://api.rbmleads.com/personalloan/';
    
    /**
     * @var string The RBM API Key to use when interacting with the service
     */
    protected static $_api_key = '2db6617ad6013b85386f4513c2e687d4';
    
    /**
     * @var string The name of the marketing channel to register as the 
     * lead origin
     */
    protected $_channel = 'launchpad';
    
    /**
     * @var int The RBM Hitpath Affiliate ID to access the RBM API with
     */
    protected static $_api_affid = 200001;

    /**
     * @var integer The record ID used to reference the entry in the API
     */
    protected $_record_id;

    /**
     * @var string The IP address of the client
     */
    protected $_ip_addr;
    
    /**
     * @var string The service provider, if any, that is to service the 
     * customer
     */
    protected $_provider = 0;       // Default path
    
    /**
     * @var boolean A flag indicating whether or not the data stored in the 
     * model is valid
     * 
     * Validity is determined by the criteria set in the validate() method. 
     * These are the minimum requirements for all providers. The API will 
     * validate the incoming data on a per provider basis.
     * 
     * A value of true indicates that the data is valid.
     */
    protected $_valid;
    
    /**
     * @var string The raw response received from the API
     */
    protected $_response;
    
    /**
     * @var array The attributes of the model.
     */
    protected $_attributes;
    
    /**
     * @var int A mode setting indicating whether or not this is a test. The mode values are
     * 
     * -2: Provider reject
     * -1: RBM reject
     * 0: Live submission
     * 1: RBM accept
     * 2: Provider accept
     */
    protected $_test = 0;
    
    /**
     * @var array The mapping of attribute names to API fields used to 
     * populate the data for posting. Keys are API field names, values 
     * are 
     */
    protected $_fieldMap = array(
        'first_name'=>'first_name',
        'last_name'=>'last_name',
        'birthdate'=>'birthdate',
        'ssn'=>'ssn',
        'drivers_license'=>'license_number',
        'drivers_license_state'=>'license_state', 
        'maiden_name'=>'maiden_name', 
        'credit_score'=>'credit_score',
        'email'=>'email',
        'home_phone'=>'home_phone',
        'work_phone'=>'work_phone',
        'cell_phone'=>'mobile_phone',
        'best_contact'=>'contact_time',
        'address_1'=>'address_1',
        'address_2'=>'address_2',
        'city'=>'city',
        'zip'=>'zip',
        'addr_years'=>'residence_date',
        'addr_months'=>'residence_date',
        'addr_type'=>'residence_type',
        'loan_amount'=>'loan_amount',
        'loan_amount_min'=>'min_amount',
        'loan_type'=>'loan_type',
        'employ_title'=>'employ_title',
        'employ_name'=>'employ_name',
        'employ_city'=>'city',
        'employ_zip'=>'zip',
        'employ_months'=>'employ_date',
        'military'=>'military',
        'income'=>'income',
        'income_type'=>'income_type',
        'pay_method'=>'direct_deposit',
        'pay_date_1'=>'pay_date_1',
        'pay_date_2'=>'pay_date_2',
        'pay_schedule'=>'pay_schedule',
        'bank_name'=>'bank_name',
        'bank_type'=>'bank_account_type',
        'bank_months'=>'bank_date',
        'bank_account'=>'bank_account_number',
        'bank_routing'=>'bank_routing_number',
        'bank_phone'=>'bank_phone',
        'bank_months'=>'bank_months'
    );
    

    // METHODS

    /**
     * Logs to the action log
     */
    protected function log($str)
    {
        $fh = fopen(APPLICATION_PATH.'/runtime/action.log','a');
        fputs($fh,"'".REAL_IP."','".Yii::app()->getSession()->getSessionID()."','".date('Y-m-d H:i:s')."','".get_class($this)."','{$str}'\n");
        fclose($fh);
    }    
        
    /**
     * Gettor to enforce read/write restrictions
     * 
     * @param string $name
     */
    public function __get($name)
    {    // Create the member name string
            $memberName = "_".$name;
        // Act based on the name of the property
        switch( $name )
        {    // Read protection
            case ($name == 'fieldMap'):
                throw new Zend_Exception("RBMPersonalLoan property {$name} is not readable");
                break;
            // Handle native properties
            case ($name == 'record_id'):
            case ($name == 'ip_addr'):
            case ($name == 'valid'):
            case ($name == 'provider'):
            case ($name == 'response'):
            case ($name == 'test'):
                return $this->$memberName;
                break;
            // Set the attribute otherwise
            default:
                return isset($this->_attributes[$name]) ? $this->_attributes[$name] : null;
                break;
        }
    }

    /**
     * Settor to enforce read/write restrictions
     * 
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {   // Create the member name string
        $memberName = "_".$name;
        // Act based on the name of the property
        switch( true )
        {   // Handle the attributes set
            case ($name == 'attributes'):
                // Ensure that an array has been passed
                if( !is_array($value) ) {
                    throw new Zend_Exception("RBMConsumerDebt property {$name} must be an array");
                }
                // Loop through the keys and set the values
                foreach($value as $key => $value) {
                    foreach($this->_fieldMap as $fieldName => $dataName) {
                        if ($key == $dataName) {
                            switch(true) {
//                                case ($fieldName == 'bank_months'):
                                case ($fieldName == 'employ_months'):
                                    // Parse the dates
                                    $startDate = new DateTime($value);
                                    $endDate = new DateTime();
                                    // Check for valid dates
                                    if( $startDate === false or $endDate === false ) break;
                                    // Format the time period
                                    $interval = $endDate->diff($startDate);
                                    $this->$fieldName = 12*((int) $interval->format('%y'))+$interval->format('%m');
                                    break;
                                case ($fieldName == 'addr_years'):
                                    // Parse the dates
                                    $startDate = new DateTime($value);
                                    $endDate = new DateTime();
                                    // Check for valid dates
                                    if( $startDate === false or $endDate === false ) break;
                                    // Format the time period
                                    $this->$fieldName = $endDate->diff($startDate)->format('%y');
                                    break;
                                case ($fieldName == 'addr_months'):
                                    // Parse the dates
                                    $startDate = new DateTime($value);
                                    $endDate = new DateTime();
                                    // Check for valid dates
                                    if( $startDate === false or $endDate === false ) break;
                                    // Format the time period
                                    $this->$fieldName = (int) $endDate->diff($startDate)->format('%m');
                                    break;
                                case ($fieldName == 'pay_method'):
                                    switch($value) {
                                        case true:
                                            $this->$fieldName = 'direct deposit';
                                            break;
                                        default:
                                            $this->$fieldName = 'paper check';
                                            break;
                                    }
                                    break;
                                case ($fieldName == 'bank_type'):
                                    switch($value) {
                                        case 'savings':
                                            $this->$fieldName = 'Saving';
                                            break;
                                        default:
                                            $this->$fieldName = 'Checking';
                                            break;
                                    }
                                    break;
                                case ($fieldName == "income_type"):
                                    switch($value) {
                                        case 'employed':
                                        case 'self_employed':
                                        case 'employed_part_time':
                                        case 'military':
                                            $this->$fieldName = 'Employment';
                                            break;
                                        default:
                                            $this->$fieldName = 'Benefits';
                                            break;
                                    }
                                    break;
                                default:
                                    $this->$fieldName = $value;
                                    break;
                            }
                        }
                    }
                }
                break;
            // Write protection
            case ($name == 'record_id'):
            case ($name == 'ip_addr'):
            case ($name == 'valid'):
            case ($name == 'response'):
            case ($name == 'fieldMap'):
                // Protect non-writable properties
                throw new Zend_Exception("RBMPersonalLoan property {$name} isn't writable");
                break;
            // Handle native properties
            case ($name == 'provider'):
            case ($name == 'test'):
                // If the member is writable
                if( $this->$memberName !== $value ) {
                    // change the value
                    $this->$memberName = $value;
                }
                break;
            // Set the attribute otherwise
            default:
                $this->_attributes[$name] = $value;
                break;
        }
    }
    
    /**
     * Submit the record to the API
     * 
     * @todo Handle uncollected values
     */
    public function deliver()
    {   // Create a row with all the necessary data
        $data = array();
        
        foreach( $this->_fieldMap as $field => $attribute ) {
            try {
                $data[$field] = $this->$field;
            } catch( Exception $e ) {
                $this->log("ERROR: ".$field." | ".$attribute);
            }
        }

        // Create data array
        $data = array_merge(
            $data,
            array(
                // Add uncollected values
                'employ_title'=>'Unknown',
                'bank_phone'=>'8002129523',
                'provider'=>$this->_provider,
                'c1'=>$this->c1,
                'c2'=>$this->c2,
                'c3'=>$this->r1,
                'r1'=>$this->r1,
                'r2'=>$this->r2,
                'r3'=>$this->r3,
                'src'=>$_SERVER['HTTP_HOST'],
                'user_agent'=>(isset($_SERVER['HTTP_USER_AGENT']))?$_SERVER['HTTP_USER_AGENT']:'Unknown',
                'ip_addr'=>REAL_IP,
                'test'=>"{$this->_test}"
            )
        );

        // Check for record
        $results = false;
        if( false ) {
            // If it exists, update it
        } else {
            // Otherwise, create it
            $results = $this->_makeCall('create',$data);
        }
        // Set the record ID
        $this->_record_id = $results['record_id'];
        // Return the results
        return $results;
    }
    
    /**
     * Makes a call to the RBM API
     * 
     * @param boolean $test Indicates whether or not the transaction is a test 
     * or not
     */
    protected function _makeCall($action, $data, $test = false)
    {   // Only submit valid data
        if( !$this->_valid ) return false;
        // Add static elements
        $data = array_merge(
            $data, 
            array(
                'token'=>self::$_api_key,
                'aid'=>self::$_api_affid,
                'channel'=>$this->channel
            )
        );

        // Log the request
        $this->log("API Request: ".print_r($data,1));
        // Create a cURL handle
        $ch = curl_init();
        // Set options
        curl_setopt($ch, CURLOPT_URL, self::$_service_url.$action); // SET THE SERVICE LOCATION
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);                // FOLLOW ANY REDIRECTS
        curl_setopt($ch, CURLOPT_HEADER, 0);                        // DO RETURN HTTP HEADERS (CHANGE TO 0 FOR PRODUCTION)
        curl_setopt($ch, CURLOPT_POST, 1);                          // POST THE DATA
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);               // ADD THE RECORD DATA
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);                // RETURN THE CONTENTS OF THE CALL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);                // DON'T VERIFY THE VALIDITY OF SSL CERT ON SERVICE SIDE
        // Execute cURL call and decode response
        $this->_response = trim(curl_exec($ch));
        $this->log("API Response: ".$this->_response);
        $this->_response = json_decode($this->_response,true);
        // Close cURL handle
        curl_close($ch);
        // Prepare service response
        if( $this->_response === null ) {
            // Error decoding JSON - Return error message
            return array('status'=>'failure','lead_id'=>false,'errors'=>array('general'=>'Error communicating with API'));
        } else {
            // Initialize method response elements
            $status = 'failure';
            $errors = array();
            $lead_id = false;
            $provider = false;
            $price = false;
            $url = false;
            // Process service response
            switch(true) {
                case ($this->_response['success'] and $this->_response['code'] == 200):
                    // Set the status and lead ID
                    $status = 'success';
                    $lead_id = "{$this->_response['data']['record_id']}";
                    $provider = "{$this->response['data']['provider']}";
                    $url = "{$this->response['data']['url']}";
                    $price = "{$this->response['data']['price']}";
                    break;
                case (!$this->_response['success'] and $this->_response['code'] == 200):
                    $status = 'failure';
                    $lead_id = "{$this->_response['data']['record_id']}";
                    $errors['general'] = "Lead Declined";
                    break;
                case (!$this->_response['success'] and $this->_response['code'] == 400):
                    // Set the status and lead ID
                    $status = 'failure';
                    // Process errors
                    $errors = $this->_response['errors'];
                    break;
            }

            // Return the results
            $result = array('status'=>$status,'record_id'=>$lead_id,'provider'=>$provider,'price'=>$price,'url'=>$url,'errors'=>$errors);
            $this->log('Delivery result: '.print_r($result,1));
            return $result;
        }
    }
    
    /**
     * Validates the record to make sure that the required data is present and of the appropriate types
     * 
     * @return array - The list of errors to display
     */
    public function validate()
    {    // Create the errors array
        $errors = array();
/*        // Validate the first name
        if( $this->first_name == '' ) $errors['first_name'] = 'Please provide your first name';
        // Validate the last name
        if( $this->last_name == '' ) $errors['last_name'] = 'Please provide your last name';
        // Validate the email
        if( $this->email == '' ) $errors['email'] = 'Please provide an email address';
        else if( !preg_match(self::$_email_regex,$this->email) ) $errors['email'] = 'Please provide a valid email address';
        // Validate the phone number
        if( $this->phone == '' ) $errors['phone'] = 'Please enter your phone number';
        else if( !is_numeric( $this->phone ) || !ctype_digit($this->phone) || strlen($this->phone) != 10 ) $errors['phone'] = 'Please provide a valid phone number';
        // Validate the zip code
        if( $this->zip == '' ) $errors['zip'] = 'Please provide a zip code';
        else if( !is_numeric($this->zip) || !ctype_digit($this->zip) || strlen($this->zip) != 5 ) $errors['zip'] = 'Please provide a valid zip code';
        // Validate the amount of debt
        if( $this->debt_amount == '' ) $errors['debt_amount'] = 'Please provide your current amount of debt';
        else if( !is_numeric($this->debt_amount) ) $errors['debt_amount'] = "Please provide a numeric debt amount without '$' or ',' (e.g. 15000.00)";
*/        // Set the valid flag
        if( !count($errors) ) $this->_valid = true;
        // Return the errors array
        return $errors;
    }

    /**
     * Qualifies a record based on the business criteria
     * 
     * @return boolean - A flag indicating whether or not the record is a qualified lead
     */
    public function qualify()
    {   // Qualify everyone by default
        $qualified = true;
        // Create a new ServiceObjects Lead for Validation
//        $lead = new SOLead();
//        // Populate
//        $lead->first_name = $this->_first_name;
//        $lead->last_name = $this->_last_name;
//        $lead->zip = $this->_zip;
//        $lead->email = $this->_email;
//        $lead->phone = $this->_phone;
//        $lead->ip_addr = $_SERVER['REMOTE_ADDR'];
//        
//        $lead->validate();
        
        return $qualified;
    }
    
} // End RBMPersonalLoan Class