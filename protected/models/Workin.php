<?php

/**
 * This is the model class for table "workin".
 *
 * The followings are the available columns in table 'workin':
 * @property string $employee_id
 * @property integer $departement_id
 * @property string $since
 *
 * The followings are the available model relations:
 * @property Employee $employee
 * @property Departement $departement
 */
class Workin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'workin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, departement_id', 'required'),
			array('departement_id', 'numerical', 'integerOnly'=>true),
			array('employee_id', 'length', 'max'=>15),
			array('since', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('employee_id, departement_id, since', 'safe', 'on'=>'search'),
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
			'employee' => array(self::BELONGS_TO, 'Employee', 'employee_id'),
			'departement' => array(self::BELONGS_TO, 'Departement', 'departement_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_id' => 'Employee',
			'departement_id' => 'Departement',
			'since' => 'Since',
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

		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('departement_id',$this->departement_id);
		$criteria->compare('since',$this->since,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Workin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
