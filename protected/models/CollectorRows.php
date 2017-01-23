<?php

/**
 * This is the model class for table "collector_rows".
 *
 * The followings are the available columns in table 'collector_rows':
 * @property integer $id
 * @property string $time
 * @property string $flight_no
 * @property integer $status
 * @property string $product_name
 * @property integer $quantity
 * @property string $barcode
 */
class CollectorRows extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CollectorRows the static model class
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
		return 'collector_rows';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('flight_no_id, status, product_name, quantity, barcode', 'required'),
			array('status, quantity, flight_no_id', 'numerical', 'integerOnly'=>true),
			array('product_name, barcode, description', 'length', 'max'=>255),
			array('unit, stowage, group_no', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, time, flight_no_id, status, product_name, quantity, barcode, description, unit, stowage, group_no', 'safe', 'on'=>'search'),
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
			'flight_no_id' => 'Lennon ID numero',
			'status' => 'Status',
			'product_name' => 'Nimike',
			'quantity' => 'Määrä',
			'barcode' => 'Viivakoodi',
			'description' => 'Kuvaus',
			'unit' => 'Yksikkö',
			'stowage' => 'Säilytys',
			'group_no' => 'Ryhmä nro.',
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

		if(isset($_GET['flights_id']))
		$criteria->condition = " flight_no_id='".$_GET['flights_id']."' ";

		$criteria->compare('id',$this->id);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('flight_no_id',$this->flight_no_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('barcode',$this->barcode,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('stowage',$this->stowage,true);
		$criteria->compare('group_no',$this->group_no,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		        'pagination' => array(
		            'pageSize' => 50, // montako kpl sivulla
		        ),
		));
	}
}
