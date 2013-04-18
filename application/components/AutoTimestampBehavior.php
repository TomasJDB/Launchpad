<?php
/**
 * A behavior to automatically update the created and updated datetimes for a record
 * 
 */
class AutoTimestampBehavior extends CActiveRecordBehavior
{   //// MEMBERS
    /**
    * The field that stores the creation time
    */
    public $created = 'created';

    /**
    * The field that stores the modification time
    */
    public $updated = 'updated';

    //// METHODS 
    /**
     * The validation adjustment
     */
    public function beforeValidate($on)
    {   // If the record is new, set up the created date
        if ($this->Owner->isNewRecord)
            $this->Owner->{$this->created} = new CDbExpression('NOW()');
        // Always set the updated date
        $this->Owner->{$this->updated} = new CDbExpression('NOW()');
 
        return parent::beforeValidate($on);
    }

} // End of AutoTimestampBehavior