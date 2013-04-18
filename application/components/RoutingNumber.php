<?php

/**
 * This is the model class for table "rbm_routing_number".
 *
 * The followings are the available columns in table 'rbm_routing_number':
 * @property int $record_id
 * @property int $routing_number
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $state
 * @property int $zip
 * @property int $phone
 * @property datetime $created
 * @property datetime $updated
 * 
 * @author Christopher Koning <ckoning@realbrightmedia.com>
 */
class RoutingNumber extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return RBMZipCode the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'rbm_routing_number';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            // Enforce required
            array('routing_number, name, address, city, state, zip, phone', 'required'),

            // Enforce length
            array('name, address, city', 'length', 'max'=>64),
            array('phone', 'length', 'max'=>10),
            array('routing_number', 'length', 'max'=>9),
            array('zip_code', 'length', 'max'=>5),
            array('state', 'length', 'max'=>2),
            
            // Enforce type
            array('routing_number, zip, phone', 'numerical', 'integerOnly'=>true),

            // Set safe search rules
            array('record_id, routing_number, name, address, city, state, zip, phone, created, updated', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'record_id' => 'Record ID',
            'routing_number' => 'Routing Number',
            'name' => 'Bank Name',
            'address' => 'Address',
            'city, state' => 'City',
            'zip' => 'State',
            'phone' => 'Phone',
            'created' => 'Created',
            'updated' => 'Updated'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('record_id',$this->record_id,true);
        $criteria->compare('routing_number',$this->record_id,true);
        $criteria->compare('name',$this->record_id,true);
        $criteria->compare('address',$this->record_id,true);
        $criteria->compare('city',$this->record_id,true);
        $criteria->compare('state',$this->record_id,true);
        $criteria->compare('zip',$this->record_id,true);
        $criteria->compare('phone',$this->record_id,true);
        $criteria->compare('created',$this->record_id,true);
        $criteria->compare('updated',$this->record_id,true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Finds the bank name by a given routing number
     * 
     * @param integer $routing_number - The routing number to look up
     * @return mixed - The bank name if found or false if not found
     */
    public static function getName($routing_number)
    {    // Validate the input to be a 9 digit integer
        if( !is_numeric($routing_number) or $routing_number <= 0 or strlen($routing_number) != 9 or str_pad(intval($routing_number),9,'0',STR_PAD_LEFT) != $routing_number ) {
            return false;
        } else {
            // Look up the bank name
            $bank = RoutingNumber::model()->find(
                                                'routing_number=:routingNumber',
                                                array('routingNumber'=>$routing_number)
                                            );

            if( $bank === null ) {
                // If the result is null, then it isn't valid
                return false;
            } else {
                // Otherwise, return the state code
                return trim($bank->name);
            }
        }
        
    }
} // End RoutingNumber class