<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<?php echo Yii::app()->booster->init();?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page" style="width:100%;">

	<div id="header">
		<div id="logo">
		<?php 
			$bUrl=Yii::app()->baseUrl; //base URL
			//$tUrl=Yii::app()->theme->baseUrl;
			//echo CHtml::encode(Yii::app()->name);
			//echo CHtml::image($bUrl."/images/dailyactivity_logo.png"); 
		?>
		</div>
	</div><!-- header -->

	<div id="TbNavbar" >
	<!-- div id="mainMbMenu" -->
	<?php 
	$_menu_staff= 
	array(
		array(
			'class' => 'booster.widgets.TbMenu',
			'type' => 'navbar',
			'items' => array(
				array('label'=>'Home', 'url'=>array('/site/index'), 'icon'=>'fa fa-home fa-1x'),				
				array('label'=>'Change Password', 'url'=>array('User/changepassword/', 'id'=>yii::app()->user->id), 'icon'=>'fa fa-key'),				
				array('label'=>'Staff', 'url'=>array('#'), 'icon'=>'fa fa-users', 'items'=>array(
					array('label'=>'Daily Report Staff', 'url'=>array('dailyreport/indexstaff')),
					array('label'=>'Setting', 'url'=>array('employee/settingemp')),
					
				)),
				//array('label'=>'Report', 'url'=>array('#')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'icon'=>'fa fa-sign-in', 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')','icon'=>'fa fa-sign-out', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			)
		)
	);
	$_menu_manager= 
	array(
		array(
			'class' => 'booster.widgets.TbMenu',
			'type' => 'navbar',
			'items' => array(
				array('label'=>'Home', 'url'=>array('/site/index'), 'icon'=>'fa fa-home fa-1x'),				
				array('label'=>'Change Password', 'url'=>array('User/changepassword/', 'id'=>yii::app()->user->id), 'icon'=>'fa fa-key'),				
				array('label'=>'Staff', 'url'=>array('#'), 'icon'=>'fa fa-users', 'items'=>array(
					array('label'=>'Daily Report Staff', 'url'=>array('dailyreport/indexstaff')),
					array('label'=>'Setting', 'url'=>array('employee/settingemp')),
					
				)),
				array('label'=>'Create Report ', 'url'=>array('report/createreport')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'icon'=>'fa fa-sign-in', 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')','icon'=>'fa fa-sign-out', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			)
		)
	);
	$_menu_admin= 
	array(
		array(
			'class' => 'booster.widgets.TbMenu',
			'type' => 'navbar',
			'items' => array(
				array('label'=>'Home', 'url'=>array('/site/index'), 'icon'=>'fa fa-home fa-1x'),
				//array('label'=>'Gii', 'url'=>array('gii/')),
				array('label'=>'Change Password', 'url'=>array('User/changepassword/', 'id'=>yii::app()->user->id), 'icon'=>'fa fa-key'),				
				array('label'=>'Staff', 'url'=>array('#'), 'icon'=>'fa fa-users', 'items'=>array(
					array('label'=>'Daily Report Staff', 'url'=>array('dailyreport/indexstaff')),
					array('label'=>'Setting', 'url'=>array('employee/settingemp')),
					
				)),
				array('label'=>'Admin', 'url'=>array('#'), 'icon'=>'fa fa-cog','items'=>array(					
					//array('label'=>'Work In', 'url'=>array('workin/')),
					//array('label'=>'Group Jobtitle', 'url'=>array('groupjobtitle/')),
					array('label'=>'Master', 'url'=>array('#'), 'items'=> array(
						array('label'=>'Employee (Staff)', 'url'=>array('Employee/admin')),
						array('label'=>'Departement', 'url'=>array('departement/')),

					)),							
					array('label'=>'Report', 'url'=>array('#'), 'items'=>array(
						array('label'=>'Create Report All', 'url'=>array('report/createreportall')),
						array('label'=>'Daily Report Admin', 'url'=>array('dailyreport/admin/')),
					)),											
				)),
				array('label'=>'Gii', 'url'=>array('gii/')),				
				array('label'=>'Login', 'url'=>array('/site/login'), 'icon'=>'fa fa-sign-in', 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')','icon'=>'fa fa-sign-out', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			)
		)
	);
	$manager_id= Yii::app()->user->id;
	$sql_manage= "SELECT * FROM departement WHERE employee_id = '$manager_id'";
	$dt_manage= Yii::app()->db->createCommand($sql_manage)->queryRow();

	if (Yii::app()->user->level == 1){
		if($dt_manage){
			$item_menu = $_menu_manager;
		} else
		$item_menu = $_menu_staff;
	} else{
		$item_menu= $_menu_admin;
	}
	
    $this->widget('booster.widgets.TbNavbar',
		array(
			'brand' => CHtml::image($bUrl."/images/dailyactivity_logo.png"),
			'fixed' => 'top',
			'fluid' => true,
			'collapse' => true, // requires bootstrap-responsive.css
			'items' => $item_menu,

		)
    );
	
	?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php 
		//$this->widget('zii.widgets.CBreadcrumbs', array(
		$this->widget('booster.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php 
		//echo "<br>level User : ".Yii::app()->user->getRoleName();
		//echo "<br>Id User : ".Yii::app()->user->id;		
	 ?>
	<?php echo $content; 
		//echo Yii::app()->user->id;
		//echo "<br> dep : ".$dt_manage['name'];
		
	?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo '2014'; ?> by IT PT. LINTECH.<br/>
		All Rights Reserved.<br/>
		<?php //echo Yii::powered(); 
		echo "Powered By TEAM HRD Lintech";?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
