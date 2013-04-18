<?php
/**
 * IndexController
 * 
 * Forwards incoming actions to the correct product controller based on the domain settings
 */
class IndexController extends Controller
{   //// MEMBERS
    
    //// METHODS

    /**
     * Pre action tasks
     * 
     * @param CAction $action The action to consider
     * @return boolean Whether or not to execute the action
     */
    public function missingAction($action)
    {   // Forward to the proper product controller
        $fwdStr = $this->_domain->type.'/'.$action;
        $this->forward($fwdStr);
    }

} // End IndexController Class
