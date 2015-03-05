<?php

/**
 * This is the model class for table "place".
 *
 * The followings are the available columns in table 'place':
 * @property integer $id
 * @property string $place_name
 * @property string $address
 * @property string $phone
 * @property double $lat
 * @property double $long
 * @property string $create_time
 * @property string $update_time
 */
class Place extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'place';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lat, long', 'numerical'),
			array('place_name, address, phone', 'length', 'max'=>255),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, place_name, address, phone, lat, long, create_time, update_time', 'safe', 'on'=>'search'),
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
			'id' => 'ไอดี',
			'place_name' => 'ชื่อสถานที่',
			'address' => 'ที่อยู่',
			'phone' => 'เบอร์โทรศัพท์',
			'lat' => 'ละติจูด',
			'long' => 'ลองติจูด',
			'create_time' => 'เวลาสร้าง',
			'update_time' => 'เวลาอัพเดท',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('place_name',$this->place_name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('long',$this->long);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Place the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
