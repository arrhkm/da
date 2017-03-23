<?php

/**
 * This is the model class for table "departement".
 *
 * The followings are the available columns in table 'departement':
 * @property integer $id
 * @property string $name
 * @property string $employee_id
 *
 * The followings are the available model relations:
 * @property Employee $employee
 * @property Jobtitle[] $jobtitles
 * @property Manages $manages
 * @property Workin[] $workins
 */
class Departement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $employee_name;

	public function tableName()
	{
		return 'departement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('employee_id', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, employee_id', 'safe', 'on'=>'search'),
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
			'jobtitles' => array(self::HAS_MANY, 'Jobtitle', 'departement_id'),
			'manages' => array(self::HAS_ONE, 'Manages', 'departement_id'),
			'workins' => array(self::HAS_MANY, 'Workin', 'departement_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'employee_id' => 'Employee',
			'employee_name'=> 'employee_name'
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

		$criteria->alias = 'a';
		$criteria->select = 'a.id, a.name, b.name as employee_name';
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->join = 'LEFT JOIN employee  b ON b.id = a.employee_id';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>20),
		));
	}

	protected function beforeValidate() 
	{
		parent::beforeValidate();
	   	$date = new DateTime();
	   	if($this->isNewRecord)
	   	{
	    	$criteria=new CDbCriteria;      //kita menggunakan criteria untuk mengetahui nomor terakhir dari database
	     	$criteria->select = 'id';   //yang ingin kita lihat adalah field "nilai1"
	     	$criteria->limit=1;             // kita hanya mengambil 1 buah nilai terakhir
		    $criteria->order='id DESC';  //yang dimbil nilai terakhir
		    $last = $this->find($criteria);
	     	if($last)   // jika ternyata ada nilai dalam data tersebut maka nilai nya saat ini tinggal di tambah 1 dari data sebelumya
	     	{
		       $newID = (int)$last->id+ 1;
		       //$newID = 'sabit-'.$newID;
	     	}
	     	else  //jika ternyata pada tabel terebut masih kosong, maka akan di input otomatis nilai "sabit-1" karena memang belum ada sebelumnya nilai lain
	     	{
	       		$newID = 1;
	     	}
	     	$this->id=$newID; // nilai1 di set nilai yang sudah di dapat tadi
	  	} 
	  	return true;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Departement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
