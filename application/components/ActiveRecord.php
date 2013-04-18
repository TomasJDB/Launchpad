<?php
/**
 * An extension of the CActiveRecord class with additional behaviors
 * 
 */
abstract class ActiveRecord extends CActiveRecord
{   //// MEMBERS
    /**
     * The HitPath API Key
     */     
    protected static $_apiKey = '29eee10fda5f9d25584ff07c2ea89bd5';
    
    //// METHODS
    public function behaviors()
    {   // Specify behaviors
        return array(
            'AutoTimestampBehavior' => array(
                'class' => 'AutoTimestampBehavior',
                //You can optionally set the field name options here
            )
        );
    }

} // End ActiveRecord class    