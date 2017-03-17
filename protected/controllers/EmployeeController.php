<?php

class EmployeeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('allow',
				'actions'=>array('view', 'update', 'changepassword', 'settingemp', 'GetJob'),
				'expression'=>'$user->isStaff()',
			),
			array('allow',
				'actions'=>array('admin', 'delete', 'index', 'view', 'create', 'update', 
				'changepassword', 'setpassword', 'settingemp'),
				'expression'=>'$user->isAdmin()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Employee;
			
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->setScenario('create');
		if(isset($_POST['Employee']))
		{
			$model->attributes=$_POST['Employee'];						
			//$model->password= md5($model->password);
			//$model->repeat_password= md5($model->repeat_password);
			
			if($model->save())
			{
				$user = new User;	
				$user->employee_id= $model->id;
				$user->save();
				$this->redirect(array('view','id'=>$model->id));
			}		
			
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Employee']))
		{
			//$model->attributes=$_POST['Employee'];
			//$model->password= md5($model->password);
			$model->id= $_POST['Employee']['id'];
			//$model->jobtitle_id =$_POST['Employee']['jobtitle_id'];
			$model->name = $_POST['Employee']['name'];
			$model->level = $_POST['Employee']['level'];
			$model->email =$_POST['Employee']['email'];
			//$model->password= md5($_POST['Employee']['password']);

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			//'update'=>1,
		));
	}

	public function actionSetPassword($id)
	{
		$emp= $this->loadModel($id);
		$model= new FormSetPassword;
		$model->id= $emp->id;
		if (isset($_POST['FormSetPassword']))
		{
			$emp->password= md5($_POST['FormSetPassword']['password']);
			if ($emp->save())
			{
				$this->redirect(array('employee/view', 'id'=>$id));
			}
		}
		$this->render('setpassword', array('model'=>$model, 'emp'=>$emp));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$user= User::model()->findByPk($id);
		$user->delete();
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Employee', array(
			'pagination'=>array('pageSize'=>10),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Employee('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Employee']))
			$model->attributes=$_GET['Employee'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Employee the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Employee::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionChangepassword($id)
	{      
	    $model = new Employee;
	 
	    $model = Employee::model()->findByAttributes(array('id'=>$id));
	    $model->setScenario('changePwd');
	 
	 
	    if(isset($_POST['Employee']))
	    {	 
	        $model->attributes = $_POST['Employee'];
	        $valid = $model->validate();
	 
	        if($valid)
	        {	 
	          	$model->password = md5($model->new_password);	 
	          	if($model->save())
	             	//$this->redirect(array('changepassword','msg'=>'successfully changed password'));
	             	$msg= 'successfully changed password';
	          	else
	             	//$this->redirect(array('changepassword','msg'=>'password not changed'));
	             	$msg="password not changed";
	        }
	    }
	 
	    $this->render('changepassword',array('model'=>$model, 'msg'=>$msg)); 
	}

	public function actionSettingEmp()
	{
		$user= yii::app()->user->id;
		$model = new AccountForm;
		$sql_account= "
			SELECT a.id, a.name as employee_name,
			c.jobtitle_id, 
			e.name as jobtitle_name,
			b.departement_id, 
			d.name as dep_name

			FROM  employee a
				LEFT JOIN 
				group_jobtitle c ON(c.employee_id= a.id )
				LEFT JOIN (	jobtitle e ) ON (e.id= c.jobtitle_id)
				LEFT JOIN (workin b, departement d) ON (b.employee_id= a.id AND d.id= b.departement_id)
			WHERE 
				a.id= '$user'
		";
		$dtacc= yii::app()->db->createCommand($sql_account)->queryRow();
		$model->id= yii::app()->user->id;
	    $model->name = $dtacc['employee_name'];
	    $model->departement_id= $dtacc['departement_id'];
	    $model->jobtitle_id= $dtacc['jobtitle_id'];


		   
	

		if(isset($_POST['AccountForm']))
	    {
	        $model->attributes=$_POST['AccountForm'];
	        $model->departement_id=$_POST['AccountForm']['departement_id']; 

	        
	        if($model->validate())
	        {
	           		$work= Workin::model()->findByAttributes(array('employee_id'=>$model->id));
	           		if (empty($work->employee_id)){
	           			$mWork = new Workin;
	           			$mWork->employee_id= $model->id;
	           			$mWork->departement_id= $model->departement_id;
	           			$mWork->save();

	           		}
	           		else {
	           			$work->employee_id= $model->id;
	           			$work->departement_id= $model->departement_id;
	           			$work->save();
	           		}
	           		$gJob =GroupJobtitle::model()->findByAttributes(array('employee_id'=>$model->id));
	           		if (empty($gJob->employee_id)){
	           			$mGJob= new GroupJobtitle;
	           			$mGJob->employee_id= $model->id;
	           			$mGJob->jobtitle_id= $model->jobtitle_id;
	           			$mGJob->save();

	           		} else {
	           			$gJob->jobtitle_id= $model->jobtitle_id;
	           			$gJob->save();

	           		}
	            //return;
	        }
	    }
	    $this->render('/employee/settingemp',
	    	array(
	    		'model'=>$model, 
	    		//'dtacc'=>$dtacc
	    ));
	}

	public function actionGetJob()
	{
	   	$data=Jobtitle::model()->findAll('departement_id=:parent_id', 
	   		array(':parent_id'=>(int) $_POST['departement_id'])	   		
	   	);	 
	 
	  	$data = CHtml::listData($data,'id', 'name');
	  	foreach($data as $value=>$name)
	  	{
		    echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	  	}
	}

	/**
	 * Performs the AJAX validation.
	 * @param Employee $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='employee-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
