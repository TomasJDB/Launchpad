<?php

/**
 * This is the model class for table "rbm_zip_code".
 *
 * The followings are the available columns in table 'rbm_zip_code':
 * @property string $zip_code
 * @property double $lat
 * @property double $lon
 * @property string $city
 * @property string $state_prefix
 * @property string $county
 * @property string $z_type
 * @property double $xaxis
 * @property double $yaxis
 * @property double $zaxis
 * @property string $z_primary
 * @property string $worldregion
 * @property string $country
 * @property string $locationtext
 * @property string $location
 * @property string $population
 * @property integer $housingunits
 * @property integer $income
 * @property string $landarea
 * @property string $waterarea
 * @property string $decommisioned
 * @property string $militaryrestrictioncodes
 * @property string $decommisionedplace
 * 
 * @author Christopher Koning <ckoning@realbrightmedia.com>
 */
class ZipCode extends CActiveRecord
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
        return 'rbm_zip_code';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('zip_code, lat, lon, city, state_prefix, county, z_type, xaxis, yaxis, zaxis, z_primary, worldregion, country, locationtext, location, population, housingunits, income, landarea, waterarea, decommisioned, militaryrestrictioncodes, decommisionedplace', 'required'),
            array('housingunits, income', 'numerical', 'integerOnly'=>true),
            array('lat, lon, xaxis, yaxis, zaxis', 'numerical'),
            array('zip_code', 'length', 'max'=>5),
            array('city, state_prefix, county, z_type, z_primary, worldregion, country, decommisioned', 'length', 'max'=>100),
            array('locationtext, location, population, landarea, waterarea, militaryrestrictioncodes, decommisionedplace', 'length', 'max'=>255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('zip_code, lat, lon, city, state_prefix, county, z_type, xaxis, yaxis, zaxis, z_primary, worldregion, country, locationtext, location, population, housingunits, income, landarea, waterarea, decommisioned, militaryrestrictioncodes, decommisionedplace', 'safe', 'on'=>'search'),
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
            'zip_code' => 'Zip Code',
            'lat' => 'Lat',
            'lon' => 'Lon',
            'city' => 'City',
            'state_prefix' => 'State Prefix',
            'county' => 'County',
            'z_type' => 'Z Type',
            'xaxis' => 'Xaxis',
            'yaxis' => 'Yaxis',
            'zaxis' => 'Zaxis',
            'z_primary' => 'Z Primary',
            'worldregion' => 'Worldregion',
            'country' => 'Country',
            'locationtext' => 'Locationtext',
            'location' => 'Location',
            'population' => 'Population',
            'housingunits' => 'Housingunits',
            'income' => 'Income',
            'landarea' => 'Landarea',
            'waterarea' => 'Waterarea',
            'decommisioned' => 'Decommisioned',
            'militaryrestrictioncodes' => 'Militaryrestrictioncodes',
            'decommisionedplace' => 'Decommisionedplace',
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

        $criteria->compare('zip_code',$this->zip_code,true);
        $criteria->compare('lat',$this->lat);
        $criteria->compare('lon',$this->lon);
        $criteria->compare('city',$this->city,true);
        $criteria->compare('state_prefix',$this->state_prefix,true);
        $criteria->compare('county',$this->county,true);
        $criteria->compare('z_type',$this->z_type,true);
        $criteria->compare('xaxis',$this->xaxis);
        $criteria->compare('yaxis',$this->yaxis);
        $criteria->compare('zaxis',$this->zaxis);
        $criteria->compare('z_primary',$this->z_primary,true);
        $criteria->compare('worldregion',$this->worldregion,true);
        $criteria->compare('country',$this->country,true);
        $criteria->compare('locationtext',$this->locationtext,true);
        $criteria->compare('location',$this->location,true);
        $criteria->compare('population',$this->population,true);
        $criteria->compare('housingunits',$this->housingunits);
        $criteria->compare('income',$this->income);
        $criteria->compare('landarea',$this->landarea,true);
        $criteria->compare('waterarea',$this->waterarea,true);
        $criteria->compare('decommisioned',$this->decommisioned,true);
        $criteria->compare('militaryrestrictioncodes',$this->militaryrestrictioncodes,true);
        $criteria->compare('decommisionedplace',$this->decommisionedplace,true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Finds the state by a given zip code
     * 
     * @param integer $zip - The zip code to look up
     * @return mixed - The two letter state abbreviation if found or false if not found
     */
    public static function getState($zip)
    {   // Validate the input to be a 5 digit integer
        if( !is_numeric($zip) or $zip <= 0 or strlen($zip) != 5 or str_pad(intval($zip),5,'0',STR_PAD_LEFT) != $zip ) {
            return false;
        } else {
            // Look up the zip code
            $zipCode = ZipCode::model()->find(
                                                'zip_code=:zipCode and z_primary=:primary',
                                                array('zipCode'=>$zip,'primary'=>'Yes')
                                            );

            if( $zipCode === null ) {
                // If the result is null, then it isn't valid
                return false;
            } else {
                // Otherwise, return the state code
                return strtoupper(trim($zipCode->state_prefix));
            }
        }
        
    }
} // End ZipCode class