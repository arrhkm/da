<?php

class ReportController extends Controller
{
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
			
			array('allow',
				'actions'=>array('admin', 'delete', 'index', 'view', 'create', 'update', 'rptall', 'createreportall', 'createExcelAll'),
				'expression'=>'$user->isAdmin()',
			),
			array('allow',
				'actions'=>array('CreateExcel', 'createreport'),
				'expression'=>'$user->isStaff()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}
	

	/*
	public function actionCreateReport()
	{
		$model= New ReportForm;
		if (isset($_POST['ReportForm']))
		{
			$model->attributes= $_POST['ReportForm'];
			//$this->render('createexcel', array('model'=>$model));
			//$this->createExcel($model->date_start, $model->date_end);
			$this->createExcelAll($model->date_start, $model->date_end);
		}

		$this->render('createreport', array ('model'=>$model));
	}*/

	public function actionRptall()
	{
		$model= New ReportForm;
		
		if (isset($_POST['ReportForm']))
		{
			$model->attributes= $_POST['ReportForm'];
			$this->createexcelall($model->date_start, $model->date_end);
			//$this->createExcelAll($model->date_start, $model->date_end);
			//$this->render('createreportall', array('model'=>$model));
		}

		
		$this->render('rptall', array('model'=>$model));
	}
	public function actionCreatereportall(){
		$model= New ReportForm;
		
		if (isset($_POST['ReportForm']))
		{
			$model->attributes= $_POST['ReportForm'];
			$this->createexcelall($model->date_start, $model->date_end);
			//$this->createExcelAll($model->date_start, $model->date_end);
			//$this->render('createreportall', array('model'=>$model));
		}
		$this->render('createreport', array('model'=>$model));
	}

	public function createExcel($date_start, $date_end)
	{
		$manager_id = Yii::app()->user->id;
		$sql_manage= "SELECT * FROM departement WHERE employee_id = '$manager_id'";
		$dt_manage= Yii::app()->db->createCommand($sql_manage)->queryRow();

		Yii::import('ext.PHPExcel.Classes.XPHPExcel');    
		      $objPHPExcel= XPHPExcel::createPHPExcel();
		      $objPHPExcel->getProperties()->setCreator("Marraf Hakam")
		                             ->setLastModifiedBy("M. Arrfah Hakam")
		                             ->setTitle("Office 2007 XLSX Test Document")
		                             ->setSubject("Office 2007 XLSX Test Document")
		                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
		                             ->setKeywords("office 2007 openxml php")
		                             ->setCategory("Test result file");
		 
		 
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'id')
		            ->setCellValue('B1', 'Name')
		            ->setCellValue('C1', 'Departement')
		            ->setCellValue('D1', 'Jabatan')
		            ->setCellValue('E1', 'Date Report')
		            ->setCellValue('F1', 'List Job')
		            ->setCellValue('G1', 'Describe Job')
		            ->setCellValue('H1', 'Duration');
		            
		 
		// Miscellaneous glyphs, UTF-8
		
		//$data = $this->loadModel($_REQUEST[id]);
		$connect1 = Yii::app()->db;
		
		$sqlDetil= "
			SELECT a.id, a.name, e.name as departement, g.name as job ,b.date_report, c.listjob, c.describejob, c.duration
			FROM employee as a, dailyreport as b, detilreport as c, workin as d, departement as e, group_jobtitle as f, jobtitle as g
			WHERE a.id not in('admin')

			AND b.employee_id= a.id
			AND c.dailyreport_id= b.id
			AND b.date_report between '$date_start' AND '$date_end'
			AND a.id= d.employee_id
			AND d.departement_id = $dt_manage[id]
			AND e.id = d.departement_id
			AND f.employee_id= a.id
			AND g.id= f.jobtitle_id
			ORDER BY a.id
		";
		
		$cmdDetil= $connect1->createCommand($sqlDetil);
		$dataDetil= $cmdDetil->queryAll();	
		
		
		$rowNumber=4;		
		foreach ($dataDetil as $key=>$row)
		{

			$id= $row['id'];
			$name = $row['name']; 
			$dep= $row['departement'];
			$job= $row['job'];
			$date_report= $row['date_report'];
			$listjob=$row['listjob'];
			$describejob=$row['describejob'];
			$duration=$row['duration'];
			

			$rows = array(
				$id, $name, $dep, $job, $date_report, $listjob, $describejob, $duration
			);
			$col = 'A'; //start from column
			foreach($rows as $cell) {
				$objPHPExcel->getActiveSheet(0)->setCellValue($col.$rowNumber,$cell);
				$col++;
			}
			$rowNumber++;
		}
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Daily Activities Report');
		 
		 
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		 
		 
		// Redirect output to a clientâ€™s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="report.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		 
		// If you're serving to IE over SSL, then the following may be needed
		//header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT+07'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		Yii::app()->end();
	}

	public function createExcelAll($date_start, $date_end)
	{
		//$manager_id = Yii::app()->user->name;
		//$sql_manage= "SELECT * FROM departement WHERE employee_id = '$manager_id'";
		//$dt_manage= Yii::app()->db->createCommand($sql_manage)->queryRow();

		Yii::import('ext.PHPExcel.Classes.XPHPExcel');    
		      $objPHPExcel= XPHPExcel::createPHPExcel();
		      $objPHPExcel->getProperties()->setCreator("Marraf Hakam")
		                             ->setLastModifiedBy("M. Arrfah Hakam")
		                             ->setTitle("Office 2007 XLSX Test Document")
		                             ->setSubject("Office 2007 XLSX Test Document")
		                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
		                             ->setKeywords("office 2007 openxml php")
		                             ->setCategory("Test result file");
		 
		 
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Employee ID')
		            ->setCellValue('B1', 'Employee Name')
		            ->setCellValue('C1', 'Departement')
		            ->setCellValue('D1', 'Jabatan')
		            ->setCellValue('E1', 'Date Report');
		            //->setCellValue('F1', 'List Job')
		            //->setCellValue('G1', 'Describe Job')
		            //->setCellValue('H1', 'Duration');
		            
		 
		// Miscellaneous glyphs, UTF-8
		
		//$data = $this->loadModel($_REQUEST[id]);
		$connect1 = Yii::app()->db;		
		
		/*$sqlDetil= "
			SELECT a.id, a.name, e.name as departement, g.name as job ,b.date_report, c.listjob, c.describejob, c.duration
			FROM employee as a, dailyreport as b, detilreport as c, workin as d, departement as e, group_jobtitle as f, jobtitle as g
			WHERE a.id not in('admin')

			AND b.employee_id= a.id
			AND c.dailyreport_id= b.id
			AND b.date_report between '$date_start' AND '$date_end'
			AND a.id= d.employee_id
			AND e.id = d.departement_id
			AND f.employee_id= a.id
			AND g.id= f.jobtitle_id
			ORDER BY d.departement_id, a.id
		";*/
		$sqlDetilOk = "
		SELECT 
		    b.id ,b.date_report, b.employee_id, a.name, e.name AS departement, g.name AS job
		FROM
		    employee AS a,
		    dailyreport AS b,
		    workin AS d,
		    departement AS e,
		    group_jobtitle AS f,
		    jobtitle AS g
		    
		WHERE
		    a.id NOT IN ('admin')
		        AND a.id = b.employee_id
		        AND b.date_report BETWEEN '$date_start' AND '$date_end'
		        AND d.employee_id = a.id
		        AND e.id = d.departement_id
		        AND f.employee_id = a.id
		        AND g.id = f.jobtitle_id
		       
		ORDER BY  e.id, b.employee_id, b.date_report
		";
		
		$cmdDetil= $connect1->createCommand($sqlDetilOk);
		$dataDetil= $cmdDetil->queryAll();	
		
		
		$rowNumber=4;		
		foreach ($dataDetil as $key=>$row)
		{

			$id= $row['employee_id'];
			$name = $row['name']; 
			$dep= $row['departement'];
			$job= $row['job'];
			$date_report= $row['date_report'];
			//$listjob=$row['listjob'];
			//$describejob=$row['describejob'];
			//$duration=$row['duration'];
			

			$rows = array(				
				$id, $name, $dep, $job, $date_report
				//, $listjob, $describejob, $duration
			);
			$col = 'A'; //start from column
			foreach($rows as $cell) {
				$objPHPExcel->getActiveSheet(0)->setCellValue($col.$rowNumber,$cell);
				$col++;
			}
			$rowNumber++;
		}
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Daily Activities Report');
		
		$styleArray = array(
	    'font'  => array(
	        //'bold'  => true,
	        'color' => array('rgb' => 'FF0000'),
	        'size'  => 10,
	        'name'  => 'Verdana'
	    ));

	    $objPHPExcel->getActiveSheet()->getStyle('A$1:E$1')->applyFromArray($styleArray);
		 
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		 
		// Redirect output to a clientâ€™s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="report.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		 
		// If you're serving to IE over SSL, then the following may be needed
		//header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT+07'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		Yii::app()->end();
	}
	

	
}
