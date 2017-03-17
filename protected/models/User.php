<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $employee_id
 * @property string $email
 * @property string $password
 * @property integer $level
 * @property integer $actived
 * @property string $ask_forget_password
 * @property string $question_forget_password
 *
 * The followings are the available model relations:
 * @property Employee $employee
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	
	public $password;//tambahan
	public $password_repeat;//tambahan
	public $old_password;
    public $new_password;
    public $repeat_password;


	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id', 'required'),
			array('level, actived', 'numerical', 'integerOnly'=>true),
			array('employee_id', 'length', 'max'=>15),
			array('email, password, ask_forget_password, question_forget_password', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			
			//Tambahn
			array('old_password, new_password, repeat_password', 'required', 'on' => 'changePwd'),
        	array('old_password', 'findPasswords', 'on' => 'changePwd'),
        	array('repeat_password', 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd'),
        	array('repeat_password', 'compare', 'compareAttribute'=>'password', 'on'=>'create'),
        	//end tambahan
			array('employee_id, email, password, level, actived, ask_forget_password, question_forget_password', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_id' => 'Employee',
			'email' => 'Email',
			'password' => 'Password',
			'level' => 'Level',
			'actived' => 'Actived',
			'ask_forget_password' => 'Ask Forget Password',
			'question_forget_password' => 'Question Forget Password',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('actived',$this->actived);
		$criteria->compare('ask_forget_password',$this->ask_forget_password,true);
		$criteria->compare('question_forget_password',$this->question_forget_password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password){
		//$model= New UserAdmin;
		if ($this->password === md5($password)) 
		return true;
	}

	public function findPasswords($attribute, $params)
    {
        //$user = Employee::model()->findByPk(yii::app()->user->id);
        $user = User::model()->findByPk(yii::app()->user->id);
        
        if ($user->password  !== md5($this->old_password))
        {       
            $this->addError($attribute, 'Old password is incorrect.');
        }
    }
}
