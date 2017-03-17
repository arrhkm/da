<?php 
Class FormSetPassword extends CFormModel
{
	//variable fields
	public $id;
	public $password;
	public $name;
	public $level;

	//rules 
	Public function rules()
	{
		return array(
			array('id, password, level', 'required'),

		);
	}
	public function attributelabels()
	{
		return array(
			array('id'=>'Id'),
			array('password'=> 'Password'),
			array('level'=> 'Level'),			
			
		);
	}
}


?>