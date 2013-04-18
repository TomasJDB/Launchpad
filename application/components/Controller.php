<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
abstract class Controller extends CController
{   //// MEMBERS
    /**
     * @var CHttpRequest The request recieved from web server
     */
    protected $_request;
    
    /**
     * @var String the template to use to fulfill the request
     */
    protected $_template;

    /**
     * @var Domain The domain object that represents the domain in question
     */
    protected $_domain;
    
    /**
     * @var array The paths used to retrieve the resources
     */
    protected $_paths;

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
     * Set the default accss rules
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
     * Logs to the action log
     */
    protected function log($str)
    {
        $fh = fopen(APPLICATION_PATH.'/runtime/action.log','a');
        fputs($fh,"'".REAL_IP."','".Yii::app()->getSession()->getSessionID()."','".date('Y-m-d H:i:s')."','".get_class($this)."','{$str}'\n");
        fclose($fh);
    }
        
    /**
     * Controller specific intialization
     */
    public function init()
    {   // Run the parent init behavior
        parent::init();
        
           // Disable inclusion of jQuery and jQuery UI since they are hard coded into layout
        Yii::app()->getClientScript()
                        ->scriptMap = array(
                            'jquery.js'=>false,
                            'jquery-ui.js'=>false,
                        );

        // Check for supported domain
        $this->_domain = Domain::model()->findByAttributes(array('hostname'=>$_SERVER['HTTP_HOST']));
        if( !$this->_domain or !$this->_domain->active ) $this->redirect('http://google.com');

        // Get the reverse FQDN for path use
        $rFQDN = $this->_domain->getReverseFQDN();

        // Set the template
        $this->_template = Yii::app()->request->getParam('template');
        if(!$this->_template) {
            $this->_template = $this->_domain->default_template;
            $this->redirect('/'.$this->_domain->default_template.Yii::app()->request->getRequestUri());
        }
        
        // Set up paths
        $this->_paths = array(
            'app_common' => "templates/common",
            'pkg_common' => "templates/{$rFQDN}/common",
            'pkg_template' => "templates/{$rFQDN}/{$this->_template}",
        );
        
         // Set the layout
        $this->layout = "//templates/{$rFQDN}/{$this->_template}/layouts/default.php";
        
        // Set the request
        $this->_request = Yii::app()->request;
    }

} // End Controller class