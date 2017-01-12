<?php

/**
 * This is the model class for table "flights".
 *
 * The followings are the available columns in table 'flights':
 * @property integer $id
 * @property string $time
 * @property integer $status
 * @property string $flight_no
 * @property string $destination
 * @property string $date
 * @property integer $collector_id
 * @property string $collecting_start
 * @property string $collecting_end
 */
class Flights extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Flights the static model class
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
		return 'flights';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('time, status, flight_no, destination, date, collector_id, collecting_start, collecting_end', 'required'),
			array('status, collector_id', 'numerical', 'integerOnly'=>true),
			array('flight_no, destination', 'length', 'max'=>255),
			array('date, collecting_start, collecting_end', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, time, status, flight_no, destination, date, collector_id, collecting_start, collecting_end', 'safe', 'on'=>'search'),
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
			'time' => 'Time',
			'status' => 'Status',
			'flight_no' => 'Flight No',
			'destination' => 'Destination',
			'date' => 'Date',
			'collector_id' => 'Collector',
			'collecting_start' => 'Collecting Start',
			'collecting_end' => 'Collecting End',
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
		$criteria->compare('time',$this->time,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('flight_no',$this->flight_no,true);
		$criteria->compare('destination',$this->destination,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('collector_id',$this->collector_id);
		$criteria->compare('collecting_start',$this->collecting_start,true);
		$criteria->compare('collecting_end',$this->collecting_end,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}