<?php
/**
 * Site Wide Error Controller
 */
class ErrorController extends ProductController
{
    /**
     * Main error action
     */
    public function actionError()
    {   // Create the view path name
        if($error=Yii::app()->errorHandler->error)
        {   // Attempt to fetch the view
            $this->_output = $this->render('error',null,true);

            // Check for a valid view
            if( $this->_output == false ) {
                $this->log('Error view not found');
                return;
            }
            // Init the trackers
            $msg = '';
            $code = '';
            $trace = '';

            // Set up the page depending on environment
            switch(APPLICATION_ENVIRONMENT) {
                case 'production':
                    $msg = $error['message'];
                    $code = '';
                    $trace = '';
                    break;
                default:
                    $msg = $error['message'];
                    $code = $error['code'];
                    $trace="<pre>".$error['trace']."</pre>";
                    break;
                    
            }

            // Log the error
            $this->log( "Error {$error['code']}: {$error['message']}\n {$error['trace']}" );

            // Fill out tags
            $this->renderTemplate(
                        [
                            'message'=> $msg,
                            'trace'=> $trace,
                            'code'=> $code
                         ]
                     );
                                 
            // Echo markup to user
            echo $this->_output;
        }
        
    }

} // End ErrorController Class
