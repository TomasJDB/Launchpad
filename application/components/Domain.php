<?php

/**
 * This is the model class for table "domain".
 *
 * The followings are the available columns in table 'domain':
 * @property string $id
 * @property string $hostname
 * @property string $full_name
 * @property string $short_name
 * @property string $default_template
 * @property string $type
 * @property string $tracking
 * @property integer $active
 * @property string $created
 * @property string $updated
 */
class Domain extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Domain the static model class
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
		return 'domain';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hostname, full_name, short_name, default_template, type, tracking, active', 'required'),
			array('hostname, short_name', 'unique'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('hostname', 'length', 'max'=>64),
			array('full_name, type', 'length', 'max'=>32),
			array('short_name, default_default', 'length', 'max'=>16),
			array('tracking','in','range'=>array('client','server'),'allowEmpty'=>false),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hostname, full_name, short_name, default_template, type, tracking, active, created, updated', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'hostname' => 'Hostname',
			'full_name' => 'Full Name',
			'short_name' => 'Short Name',
			'default_template' => 'Default Template',
			'type' => 'Type',
			'active' => 'Active',
			'created' => 'Created',
			'updated' => 'Updated',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('hostname',$this->hostname,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('short_name',$this->short_name,true);
		$criteria->compare('default_template',$this->default_template,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    /**
     * Retrieve the reverse FQDN from the host name to use as a path element
     * 
     * @return string The reverse FQDN
     */
    public function getReverseFQDN()
    {   // Set up the reverse FQDN for use
        $FQDNArr = explode('.', $this->hostname);
        $rFQDNArr = array();
        foreach($FQDNArr as $key => $value) {
            switch($value) {
                case 'sandbox':
                case 'dev':
                case 'stage':
                    break;
                default:
                    $rFQDNArr[] = $value;
                    break;
            }
        }
        $rFQDNArr = array_reverse($rFQDNArr);
        $rFQDN = join('.',$rFQDNArr);
        
        return $rFQDN;
    }
}