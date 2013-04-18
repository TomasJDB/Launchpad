<?php

/**
 * PersonalloanController
 * 
 * Handles Personal Loan offers
 * 
 * @todo Refactor form population and error display into ProductController for reuse in other products
 * @todo Implement better XML parsing error handling (rather than just crapping out with the XML parse error to screen)
 */

class PersonalloanController extends ProductController
{   //// MEMBERS
    /**
     * @var array The data submitted by the user
     */
    protected $_data = false;
    
    /**
     * @var string The action to execute
     */
    protected $_action = false;
    
    /**
     * @var string The destination URL to send the client to after a successful sale
     */
    protected $_dest_url = 'http://www.google.com';
    
    /**
     * @var array The list of models to submit the data to
     */
    protected $models = array();
    
    /**
     * @var array The errors found in the current data set
     */
    protected $_errors;

    /**
     * @var boolean $_forwardFlow A flag indicating whether or not the user is moving forward in the process.
     * 
     * A true value indicates the user is moving from the beginning to the end of the flow. Used to enable validation, default value overriding, etc.
     */
    protected $_forwardFlow;

    //// METHODS

    /**
     * Gathers customer data passed as prepop
     */
    public function prepop()
    {
        
    }

    /**
     * Initialize the data object
     */
    public function init()
    {   // Execute parent init
        parent::init();

        // Get the transaction data
        $transData = isset(Yii::app()->session['transData']) ? Yii::app()->session['transData'] : array();
        $this->_tid = isset($transData['tid']) ? $transData['tid'] : false;
        $this->_price = isset($transData['price']) ? $transData['price'] : false;
        $this->_dest_url = isset($transData['dest_url']) ? $transData['dest_url'] : $this->_dest_url;

        // Load the configuration
        $this->_config = $this->getConfig();

        // Get the form data from session
        $this->_data = isset(Yii::app()->session['data']) ? Yii::app()->session['data'] : false;
        if( !$this->_data ) {
            $this->_data = array();
            Yii::app()->session['data'] = $this->_data;
        }
        
        // Get the form errors from session
        $this->_errors = isset(Yii::app()->session['errors']) ? Yii::app()->session['errors'] : false;
        if( !$this->_errors ) {
            $this->_errors = array();
            Yii::app()->session['errors'] = $this->_errors;
        }

        // Process the action
        $this->_action = Yii::app()->request->getParam('action');

        // Update the referring step
        $this->_referrer = isset(Yii::app()->session['referrer']) ? Yii::app()->session['referrer'] : false;

        // Log the action
        $this->log("personalloan/{$this->_action}");

        // Handle specific actions
        switch(true) {
            // Check for index, and forward if necessary
            case ($this->_action == 'index'):
                if( !isset($this->_config->info->index) ) {
                    throw new CHttpException(500,"Invalid index step specified");
                } else {
                    $this->_action = $this->_config->info->index;
                    $this->forward($this->_action);
                }
                break;
            // Check for submit
            case ($this->_action == 'submit'):
                $this->forward($this->_action);
                break;
        }
        
    }
    
    /**
     * Default action
     * 
     * Handles all steps in the form processing exception submission
     */
    public function missingAction($actionID)
    {   // Get the step configuration
        $cfg = (isset($this->_config->views->{$this->_action}))?$this->_config->views->{$this->_action}:false;
        if( $cfg === false ) {
            throw new CHttpException(404,'Page not found for '.$this->_action);
        }

        // Register a click if the config calls for it
        if( 
            isset($this->_config->info) and
            isset($this->_config->info->tracking) and 
            isset($this->_config->info->tracking->method) and
            $this->_config->info->tracking->method == 'server' and
            isset($this->_config->info->tracking->clickAction) and
            $this->_config->info->tracking->clickAction == $this->_action and
            isset($this->_config->info->tracking->campaign)
        ) {
            $this->_cid = $this->_config->info->tracking->campaign;
            $this->_registerFrontEndClick();
        }
        
        // Set the layout, if not default
        if( isset($cfg->layout) ) {
            $this->layout = "//".$this->_paths['pkg_template'].'/layouts/'.$cfg->layout.'.php';
        }
        
        // Get the previous and next step
        $prev = (isset($cfg->logic->default->prev))?$cfg->logic->default->prev:false;
        $next = (isset($cfg->logic->default->next))?$cfg->logic->default->next:false;

        // Set the forward flow flag
        $this->_forwardFlow = ($this->_referrer === $prev);

        // Set the referring action
        Yii::app()->session['referrer'] = $this->_action;

        // Enforce flow control - disabled for troubleshooting
        // if( 
            // $this->_action !== $this->_config->info->index and  // Index action open to all
            // $this->_referrer !== $prev and                      // Can come forward from previous page
            // $this->_referrer !== $next and                      // Can come back from next page
            // $this->_referrer !== $this->_action                 // Can reload the page
        // ) {
            // $this->redirect($prev);
        // }
        
        // Get the previous step's configuration
        $prevCfg = (isset($this->_config->views->{$prev}))?$this->_config->views->{$prev}:false;

        // Collect data submitted
        if( $this->_forwardFlow and isset( $prevCfg->data ) ) {
            $this->_data = array_merge($this->_data,$this->collectData($prevCfg->data));
            Yii::app()->session['data'] = $this->_data;
        }

        // Validate Data
        if( $this->_forwardFlow and isset( $prevCfg->data ) ) {
            // Get the errors
            $this->_errors = $this->validateData($prevCfg->data, $this->_data);
            // Store the errors
            Yii::app()->session['errors'] = $this->_errors;
            // If there are errors, go back to the previous page
            if( count($this->_errors) ) {
                $this->redirect($prev);
            }
        }

        // Gather any prepop data
        if( Yii::app()->request->getParam('prepop') == true ) {
            // Get the data
            $this->_data = array_merge($this->_data,$this->collectData($cfg->data));
            Yii::app()->session['data'] = $this->_data;
        }
        
        // Save the data to the session
        Yii::app()->session['data'] = $this->_data;
        
        // Get view template
        $this->setPageTitle(($this->_action != '' )?ucwords(str_replace('-', ' ', $this->_action)).' | '.$this->_domain['full_name']:$this->_domain['full_name']);
        $this->_output = $this->render($this->_action,null,true);

        if( $this->_output == false ) {
            throw new CHttpException(500,'Resource not found');
        }

        // Process logic
        $redirectBefore = (isset($cfg->logic->default->redirectBefore))?$cfg->logic->default->redirecBefore:false;
        $redirectAfter = (isset($cfg->logic->default->redirectAfter))?$cfg->logic->default->redirectAfter:false;
        
        // Create the pixel tags
        $ppc_pixel = '';
        $ppa_pixel = '';
        
        if( APPLICATION_ENVIRONMENT === 'production') {
            // Create the pixel URL
            $pixel_url = (strtolower($_SERVER['HTTPS']) === 'on') ?
                                    "https://affiliate.rbmtracker.com/rd/ipx.php?hid={$this->_hid}&amp;sid={$this->_cid}&amp;transid={$this->_tid}&amp;ate={$this->_price}":
                                    "http://affiliate.rbmtracker.com/rd/ipx.php?hid={$this->_hid}&amp;sid={$this->_cid}&amp;transid={$this->_tid}&amp;ate={$this->_price}";
            // Set the pixel based on the ad model
            switch($this->_adModel) {
                case 'ppc':
                    $ppc_pixel = "<iframe width='1' height='1' frameborder='0' src='{$pixel_url}'> </iframe>";
                    break;
                case 'ppa':
                default:
                    $ppa_pixel = "<iframe width='1' height='1' frameborder='0' src='{$pixel_url}'> </iframe>";
                    break;
            }
        }

        // Create redirect links
        $rush_link = '';
        switch($this->_affid) {
            case '190052':
            case '200018':
            case '190026':
            case '200079':
                // $rush_link = "https://affiliate.rbmtracker.com/rd/r.php?sid=125&amp;pub={$this->_affid}&amp;c1={$this->_c1}&amp;c2={$this->_c2}&amp;c3={$this->_c3}";
                // break;
            default:
                $rush_link = "https://affiliate.rbmtracker.com/rd/r.php?sid=126&amp;pub=200001&amp;c1={$this->_affid}&amp;c2={$this->_c1}&amp;c3={$this->_c2}";
                break;
        }
        
        // Construct the URLs for abandon and decline
        $first_name = (isset($this->_data['first_name']))?$this->_data['first_name']:'';
        $last_name = (isset($this->_data['last_name']))?$this->_data['last_name']:'';
        $email = (isset($this->_data['email']))?$this->_data['email']:'';
        $zip = (isset($this->_data['zip']))?$this->_data['zip']:'';

        $decline_url = "http://affiliate.rbmtracker.com/rd/r.php?sid=159&amp;pub={$this->_affid}&amp;c1={$this->_c1}&amp;c2={$this->_c2}&amp;c3=&amp;first_name={$first_name}&amp;last_name={$last_name}&amp;email={$email}&amp;zip={$zip}";
        $abandon_url = "http://affiliate.rbmtracker.com/rd/r.php?sid=158&amp;pub={$this->_affid}&amp;c1={$this->_c1}&amp;c2={$this->_c2}&amp;c3=&amp;first_name={$first_name}&amp;last_name={$last_name}&amp;email={$email}&amp;zip={$zip}";

        // Fill out tags
        $this->renderTemplate(
                    array(
                        'host'=>$_SERVER['HTTP_HOST'],
                        'template'=>$this->_template,
                        'action'=>$next,
                        'prev'=>$prev,
                        'affid'=>$this->_affid,
                        'subid'=>$this->_subid,
                        'c1'=>$this->_c1,
                        'c2'=>$this->_c2,
                        'c3'=>$this->_c3,
                        'hid'=>$this->_hid,
                        'ppc_pixel'=>$ppc_pixel,
                        'ppa_pixel'=>$ppa_pixel,
                        'rush_link'=>$rush_link,
                        'dest_url'=>$this->_dest_url,
                        'decline_url'=>$decline_url,
                        'abandon_url'=>$abandon_url,
                     )
                 );

        // Place the data values into the form
        $this->populateForm();

        // Show any errors
        $this->showErrors();

        // Echo markup to user
        echo $this->_output;

        // Show the relevant data arrays if the flag is set
        if( $this->_showData ) {
            echo "Data:<br /><pre>".print_r($this->_data,1)."</pre>";
            echo "Errors:<br /><pre>".print_r($this->_errors,1)."</pre>";
            echo "Affiliate Data:<br /><pre>".print_r(Yii::app()->session['affData'],1)."</pre>";
            echo "Test Mode:<br /><pre>".print_r($this->_test,1)."</pre>";
        }

    }

    /**
     * Handle submission to API and process the response
     * 
     * @todo Update error checking for multiple models
     * @todo Update delivery for multiple models
     * @todo Add email message delivery
     */
     public function actionSubmit()
     {  // Log the submitting action
         $this->log('Submitting');

        // Get the step configuration
        $cfg = (isset($this->_config->views->{$this->_action}))?$this->_config->views->{$this->_action}:false;
        if( $cfg === false ) {
            throw new CHttpException(404,'Page not found for '.$this->_action);
        }

        // Set the layout, if not default
        if( isset($cfg->layout) ) {
            $this->layout = "//".$this->_paths['pkg_template'].'/layouts/'.$cfg->layout.'.php';
        }

        // Get the previous and next step
        $prev = (isset($cfg->logic->default->prev))?$cfg->logic->default->prev:false;
        $next = (isset($cfg->logic->default->next))?$cfg->logic->default->next:false;

        // Set the forward flow flag
        $this->_forwardFlow = ($this->_referrer === $prev);

        // Set the referring action
        Yii::app()->session['referrer'] = 'submit';
        
        // Get the previous step's configuration
        $prevCfg = (isset($this->_config->views->{$prev}))?$this->_config->views->{$prev}:false;

        // Collect data submitted
        if( $this->_forwardFlow and isset( $prevCfg->data ) ) {
            $this->_data = array_merge($this->_data,$this->collectData($prevCfg->data));
            Yii::app()->session['data'] = $this->_data;
        }

        // Validate Data
        if( $this->_forwardFlow and isset( $prevCfg->data ) ) {
            // Get the errors
            $this->_errors = $this->validateData($prevCfg->data, $this->_data);
            // Store the errors
            Yii::app()->session['errors'] = $this->_errors;
            // If there are errors, go back to the previous page
            if( count($this->_errors) ) {
                $this->redirect($prev);
            }
        }
        
        // Save the data to the session
        Yii::app()->session['data'] = $this->_data;

        // Load the models
        $models = $this->models;
        foreach($this->_config->models as $model) {
            $models[] = new $model;
        }
        $this->models = $models;

        // Check for errors
        $errors = array();
        foreach( $this->models as $model ) {
            $model->attributes = $this->_data;
            // Potential conflict when two models have different, conflicting  errors for the same data element
            $errors = array_merge($errors, $model->validate());
        }
                        
        // Set up tracking
        $success = false;
        
        $this->log(count($this->models).' models');
        
        $count = 0;
        $primary = true;
        
        // Deliver models to their destination
        foreach( $this->models as $model ) {
            
            $count++;
            
            $this->log('Delivery '.$count);
            
            // Set up common tracking information
            $model->c1 = $this->_c1;
            $model->c2 = $this->_hid;
            $model->c3 = '';
            $model->r1 = $this->_affid;
            $model->r2 = $this->_hid;
            $model->r3 = $this->_cid;
            $model->source = '';
            $model->test = $this->_test;
            $model->channel = 'CCL';

            $this->log('Delivering '.get_class($model));

            // Deliver the lead
            $response = $model->deliver();

            // Parse response
            if( $response['status'] == 'success' ) {
                $success = true;

                $this->log('Delivery successful');
                
                // if tis is the primary offer (first one) then record the information
                if( $primary ) {
                    $primary = false;
                    
                    // Set the price and transaction id
                    $this->_price = $response['price'];
                    $this->_tid = $response['record_id'];
                    $this->_dest_url = $response['url'];
                
                    // Store affiliate data to session
                    $transData = array(
                        'tid'=>$this->_tid,
                        'price'=>$this->_price,
                        'dest_url'=>$this->_dest_url
                    
                    );
                    Yii::app()->session['transData'] = $transData;
                    
                    // If the tracking is server side, fire sales pixel
                    if( 
                        isset($this->_config->info) and
                        isset($this->_config->info->tracking) and 
                        isset($this->_config->info->tracking->method) and
                        $this->_config->info->tracking->method == 'server' and
                        $this->_cid and
                        $this->_hid and
                        $this->_tid
                    ) {
                        $this->_cid = $this->_config->info->tracking->campaign;
                        $this->_registerFrontEndSale(array('payin'=>0.0,'payout'=>$this->_price));
                    }
                    
                }    
            } else {
                    $this->log('Delivery failed');
            }
        }

        // Redirect to the appropriate page
        if( $success ) {
            if( $this->_dest_url ) {
                $this->log('Redirecting to approved');
                $this->redirect('approved');
            } else {
                $this->log('Redirecting to success');
                $this->redirect('success');
            }
        } else {
            $this->log('Redirecting to declined');
            $this->redirect('declined');
        }
     }
    
} // End PersonalloanController Class