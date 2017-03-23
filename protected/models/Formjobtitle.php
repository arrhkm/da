<?php 
Class Formjobtitle extends CFormModel
{
	//variable fields
	public $id;
	public $departement_id;
	public $name;

	//rules 
	Public function rules()
	{
		return array(
			array('departement_id, name', 'required'),

		);
	}
	public function attributelabels()
	{
		return array(
			array('id'=>'Id'),
			array('departement_id'=> 'Departement'),
			array('name'=>'Name Jobtitle'),
			
		);
	}

}


?>