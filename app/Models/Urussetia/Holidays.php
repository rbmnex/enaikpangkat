<?php

/**
 * This is the model class for table "holidays".
 *
 * The followings are the available columns in table 'holidays':
 * @property integer $id
 * @property string $holiday_name
 * @property string $description
 * @property integer $length
 * @property string $holiday_date
 */
class Holidays extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Holidays the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->pgsqletass;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'holidays';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, holiday_name, holiday_date', 'required'),
			array('id, length', 'numerical', 'integerOnly'=>true),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, holiday_name, description, length, holiday_date', 'safe', 'on'=>'search'),
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
			'holiday_name' => 'Holiday Name',
			'description' => 'Description',
			'length' => 'Length',
			'holiday_date' => 'Holiday Date',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('holiday_name',$this->holiday_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('length',$this->length);
		$criteria->compare('holiday_date',$this->holiday_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        function getCuti($tahun) 
        {
            
            $cuti = array();

            $year = date("Y");
            $result=$this->findAll(array('condition'=>"date_part('year'::text, holiday_date)='$year'"));
     
            foreach ($result as $r) {
                
                    $cuti[] = $r->holiday_date;
            }
            return $cuti;

        }
}