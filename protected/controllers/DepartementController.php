<?php

class DepartementController extends Controller
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
			*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(
					'index', 
					'view', 
					'create', 
					'update', 
					'admin',
					'delete',
					'jobtitle',  
					'deletejobtitle',  
                    'createjobtitle', 
                    'addnamejob', 
                    'deletenamejob', 
                    'updatenamejob', 
                    'updatejobtitle', 
                    'manager'),
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
		$employee_id = $this->loadModel($id)->employee_id;
		$emp = Employee::model()->findByPk($employee_id);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'manager'=>$emp->name,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Departement;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Departement']))
		{
			$model->attributes=$_POST['Departement'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionCreateJobtitle()
	{
		$model= new Jobtitle;
		if (isset($_POST['Jobtitle]']))
		{
			$model->attributes=$_POST['Jobtitle'];
			if ($model->save())
			{
				$this->redirect(array('view', 'id'=>$model->departement_id));
			}
		}
		$this->render('createjobtitle', array('model'=>$model));
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

		if(isset($_POST['Departement']))
		{
			$model->attributes=$_POST['Departement'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionManager($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Departement']))
		{
			$model->attributes=$_POST['Departement'];
			if($model->save())
				$this->redirect(array('admin','id'=>$model->id));
		}

		$this->render('manager',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
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
		/*
		$dataProvider=new CActiveDataProvider('Departement');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		$this->redirect(Yii::app()->createUrl('departement/admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Departement('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Departement']))
			$model->attributes=$_GET['Departement'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionJobtitle()
	{
	    $model=new Jobtitle;    

	    if(isset($_POST['Jobtitle']))
	    {
	        $model->attributes=$_POST['Jobtitle'];
	        if($model->validate())
	        {
	           $model->attributes=$_POST['Jobtitle'];
				if ($model->save())
				{
					$this->redirect(array('view', 'id'=>$model->departement_id));
				}
	        }
	    }
	    $this->render('jobtitle',array('model'=>$model));
	}

	public function actionUpdateJobtitle($jobtitleid)
	{
		
		$model = Jobtitle::model()->findByAttributes(array('id'=>$jobtitleid)); // <-- iki wes bener
		//$model = New Jobtitle; <-- iki selalu output nol, dd sakmarine di save g diredirect ng ndi2 karena redirect butuh nilai variable departement_id
		
		//$model = Jobtitle::model()->findByPk($_REQUEST['id']);
		//$model->id= $model2->id;
		//$model->departement_id = $model2->departement_id;
		//$model->name = $model2->name;
		//if($modelJobtitle===null)
		//	throw new CHttpException(404,'The requested page does not exist.');
		//return $model;
		//$model = Jobtitle::model()->findByAttributes(array('id'=>$jobtitleid));
		if (isset($_POST['Jobtitle']))
		{
			//$sql = "UPDATE jobtitle SET name = '$_POST[Jobtitle][name]' WHERE id = $model->id";
			//$update = Yii::app()->db->createCommand($sql)->query();

			$model->attributes = $_POST['Jobtitle'];
			//$model->id = 1;
			//$model->departement_id = 2;
			//$model->name = "HKAM";
			if($model->save())
			//if ($update)
			{
				$this->redirect(array('view', 'id'=>$model->departement_id));
				/*$this->render('updatejobtitle', 
					array(
						'model'=>$model, 
						//'departementid'=>$model->departement_id
					)
				);*/

			}
			
		}
		
		
		$this->render('updatejobtitle', 
			array(
				'model'=>$model, 
				//'departementid'=>$model->departement_id
			)
		);
	}

	public function actionDeleteJobtitle($jobtitleid, $depid)
	{
		//$rsJobtitle = Jobtitle::model()->findByAttributes(array('id'=>$jobtitleid));
		//$departement_id= $rsJobtitle->departement_id;
		
			$sqlDelJob = "DELETE FROM name_job WHERE jobtitle_id = $jobtitleid";
			$delNameJOb=  Yii::app()->db->createCommand($sqlDelJob)->query();
			if ($delNameJOb)
			{
				$sqlGroup = "DELETE FROM group_jobtitle WHERE jobtitle_id = $jobtitleid";
				Yii::app()->db->createCommand($sqlGroup)->query();
				$sql_del = "DELETE FROM jobtitle WHERE id= $jobtitleid";
				$delJobtitle = Yii::app()->db->createCommand($sql_del)->query();
			}
			else {
				throw new CHttpException(404,'Tidak bisa di delete.');
			}

			
		
		//$test->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view', 'id'=>$depid));
	}

	public function actionAddNameJob($jobtitle_id)
	{
		$sql_back = "
			SELECT a.*, b.id as dep_id , b.name as dep_name
			FROM  jobtitle a, departement b
			WHERE b.id= a.departement_id
			AND a.id=$jobtitle_id
		";
		$dataBack= yii::app()->db->createCommand($sql_back)->queryRow();
		$model = new NameJob;
		$model->jobtitle_id= $jobtitle_id;
		if (isset($_POST['NameJob']))		{
			
			$model->attributes= $_POST['NameJob'];
			//$model->jobtitle_id= $jobtitle_id;
			if ($model->validate())
			{
				if ($model->save())
				{
					$this->redirect(array('Departement/view', 'id'=>$dataBack['dep_id']));
					//$this->render('addnamejob', array('model'=>$model, 'ModelNameJob'=>$NameJob, 'dataBack'=>$dataBack));
				}
			}

		}
                
		$NameJob=new NameJob('search');
		$NameJob->unsetAttributes();  // clear any default values
		if(isset($_GET['NameJob']))
                    $NameJob->attributes=$_GET['NameJob'];
			
		$this->render('addnamejob', array('model'=>$model, 'ModelNameJob'=>$NameJob, 'dataBack'=>$dataBack));
	}
        
    public function actionUpdateNamejob($namejobid, $jobtitle_id)
    {          
		$sql_back = "
			SELECT a.*, b.id as dep_id , b.name as dep_name
			FROM  jobtitle a, departement b
			WHERE b.id= a.departement_id
			AND a.id=$jobtitle_id
		";
		$dataBack= yii::app()->db->createCommand($sql_back)->queryRow();
		//$model = new NameJob;
		//$model->jobtitle_id= $jobtitle_id;
		$model= NameJob::model()->findByAttributes(array('id'=>$namejobid));
		if (isset($_POST['NameJob']))		{
			
			$model->attributes= $_POST['NameJob'];
			//$model->jobtitle_id= $jobtitle_id;
			if ($model->validate())
			{
				if ($model->save())
				{
					$this->redirect(array('Departement/view', 'id'=>$dataBack['dep_id']));
					//$this->render('addnamejob', array('model'=>$model, 'ModelNameJob'=>$NameJob, 'dataBack'=>$dataBack));
				}
			}

		}
                
		$NameJob=new NameJob('search');
		$NameJob->unsetAttributes();  // clear any default values
		if(isset($_GET['NameJob']))
                    $NameJob->attributes=$_GET['NameJob'];
			
		$this->render('addnamejob', array('model'=>$model, 'ModelNameJob'=>$NameJob, 'dataBack'=>$dataBack));
	}
        

    public function actionDeleteNameJob($id, $jobtitle_id)
	{
		$sql = "DELETE FROM name_job WHERE id = $id";
		$delete = yii::app()->db->createCommand($sql)->query();
		if ($delete)
		{
			$this->redirect(array('departement/addnamejob', 'jobtitle_id'=>$jobtitle_id));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Departement the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Departement::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Departement $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='departement-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
