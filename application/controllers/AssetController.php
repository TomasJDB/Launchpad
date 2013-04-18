<?php

/**
 * AssetController
 * 
 * Serves static assets from template resources
 */

class AssetController extends Controller
{   //// MEMBERS
    /**
     * @var string The filename to open
     */
    protected $_filename = '';
    
    /**
     * @var string Tracks the action
     */
    protected $_action = '';
    
    //// METHODS
    /**
     * Locates a filename from the given path
     * @return boolean A flag indicating that the resource was found
     */
    protected function loadFile()
    {   // Initialize
        $found = false;

        // Look for the file
        switch(true) {
            case (
                file_exists(APPLICATION_PATH.$this->_paths['pkg_template'].'/'.$this->_action.'/'.$this->_filename) and 
                !is_dir(APPLICATION_PATH.$this->_paths['pkg_template'].'/'.$this->_action.'/'.$this->_filename)
            ):
                $this->_filename = APPLICATION_PATH.$this->_paths['pkg_template'].'/'.$this->_action.'/'.$this->_filename;
                $found = true;
                break;
            case (
                file_exists(APPLICATION_PATH.$this->_paths['pkg_common'].'/'.$this->_action.'/'.$this->_filename) and 
                !is_dir(APPLICATION_PATH.$this->_paths['pkg_common'].'/'.$this->_action.'/'.$this->_filename)
            ):
                $this->_filename = APPLICATION_PATH.$this->_paths['pkg_common'].'/'.$this->_action.'/'.$this->_filename;
                $found = true;
                break;
            case (
                file_exists(APPLICATION_PATH.$this->_paths['app_common'].'/'.$this->_action.'/'.$this->_filename) and 
                !is_dir(APPLICATION_PATH.$this->_paths['app_common'].'/'.$this->_action.'/'.$this->_filename)
            ):
                $this->_filename = APPLICATION_PATH.$this->_paths['app_common'].'/'.$this->_action.'/'.$this->_filename;
                $found = true;
                break;
        }

        // Return the flag
        return $found;
    }
     
     
    /**
     * Initialize the paths
     */
    protected function beforeAction($action)
    {   // Get the filename
        $this->_filename = Yii::app()->request->getParam('file');
        
        // Set the action
        switch($action->id) {
            case 'javascript':
                $this->_action = 'js';
                break;
            case 'image':
                $this->_action = 'img';
                break;
            case 'font':
            case 'css':
            default:
                $this->_action = $action->id;
                break;
            
        }

        // Handle 404
        if( !$this->loadFile() ) {
            header('Content-Type: text/Font');
            header('HTTP/1.1 404 Not Found',404);
            Yii::app()->end();
        }

        // Handle 304
        if( 
            isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) and 
            strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= filemtime($this->_filename)
        ) {
            header('Content-Type: text/Font');
            header('HTTP/1.1 304 Not Modified',304);
            header('Last-Modified: '.date('D, j M Y H:i:s e',filemtime($this->_filename)));
            header('Expires: '.date('D, j M Y H:i:s e',time()+3800));
            header('Cache-Control: private');
            header('Cache-Control: max-age=3800,must-revalidate');
            header('Pragma: private');
            Yii::app()->end();
        }
        
        // Return the proper flag
        return parent::beforeAction($action);
    }

    /**
     * Serve CSS files
     */
    public function actionCss()
    {   // Serve the file
        header('Content-Type: text/css');
        header('Content-length: '.filesize($this->_filename));
        header('HTTP/1.1 200 OK',200);
        header('Last-Modified: '.date('D, j M Y H:i:s e',filemtime($this->_filename)));
        header('Expires: '.date('D, j M Y H:i:s e',time()+3800));
        header('Cache-Control: private');
        header('Cache-Control: max-age=3800,must-revalidate');
        header('Pragma: private');
        echo file_get_contents($this->_filename);
        Yii::app()->end();
   }

    /**
     * Serve fonts
     */
    public function actionFont()
    {   // Serve the file
        header('Content-Type: text/Font');
        header('Content-length: '.filesize($this->_filename));
        header('HTTP/1.1 200 OK',200);
        header('Last-Modified: '.date('D, j M Y H:i:s e',filemtime($this->_filename)));
        header('Expires: '.date('D, j M Y H:i:s e',time()+3800));
        header('Cache-Control: private');
        header('Cache-Control: max-age=3800,must-revalidate');
        header('Pragma: private');
        echo file_get_contents($this->_filename);
        Yii::app()->end();
   }

    /**
     * Serve images
     */
    public function actionImage()
    {   // Get the MIME type
        $finfo = new finfo(FILEINFO_MIME);
        $ftype = $finfo->file($this->_filename);
        
        // Serve the file
        header('Content-Type: '.$ftype);
        header('Content-length: '.filesize($this->_filename));
        header('HTTP/1.1 200 OK',200);
        header('Last-Modified: '.date('D, j M Y H:i:s e',filemtime($this->_filename)));
        header('Expires: '.date('D, j M Y H:i:s e',time()+3800));
        header('Cache-Control: private');
        header('Cache-Control: max-age=3800,must-revalidate');
        header('Pragma: private');
        echo file_get_contents($this->_filename);
        Yii::app()->end();
   }

    /**
     * Serve javascript files
     */
    public function actionJavascript()
    {   // Get the contents
        $content = file_get_contents($this->_filename);
        
        // Pack the content if in production
        if( APPLICATION_ENVIRONMENT == 'production' ) {
            $content = jsmin($content);
        }

       // Serve the file
        header('Content-Type: text/javascript');
        header('Content-length: '.filesize($this->_filename));
        header('HTTP/1.1 200 OK',200);
        header('Last-Modified: '.date('D, j M Y H:i:s e',filemtime($this->_filename)));
        header('Expires: '.date('D, j M Y H:i:s e',time()+3800));
        header('Cache-Control: private');
        header('Cache-Control: max-age=3800,must-revalidate');
        header('Pragma: private');
        echo $content;
        Yii::app()->end();
   }
} // End AssetController Class