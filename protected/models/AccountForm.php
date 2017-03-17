<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class AccountForm extends CFormModel
{
	public $id;
	public $name;
	public $email; 
	public $employee_id;
	public $departement_id;
	public $jobtitle_id;

	//private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('id, departement_id, jobtitle_id', 'required'),
			array('id, name,  email, employee_id, departement_id, jobtitle_id', 'safe', 'on'=>'search'),
			
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'id'=>'SSN ID',
			'name'=>'Employee Name',
			'departement_id'=>'Departement',
			'jobtitle_id'=>'Job Title',
			'email'=>'Email',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	
}
