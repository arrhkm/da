<?php

/**
 * This is the model class for table "name_job".
 *
 * The followings are the available columns in table 'name_job':
 * @property integer $id
 * @property integer $jobtitle_id
 * @property string $name_job
 *
 * The followings are the available model relations:
 * @property Jobtitle $jobtitle
 */
class NameJob extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'name_job';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, jobtitle_id', 'required'),
			array('id, jobtitle_id', 'numerical', 'integerOnly'=>true),
			array('name_job', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, jobtitle_id, name_job', 'safe', 'on'=>'search'),
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
			'jobtitle' => array(self::BELONGS_TO, 'Jobtitle', 'jobtitle_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'jobtitle_id' => 'Jobtitle',
			'name_job' => 'Name Job',
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
		$criteria->compare('jobtitle_id',$this->jobtitle_id);
		$criteria->compare('name_job',$this->name_job,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchById($jobtitle_id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$this->jobtitle_id = $jobtitle_id;
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('jobtitle_id',$this->jobtitle_id);
		$criteria->compare('name_job',$this->name_job,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>20),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NameJob the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
}
