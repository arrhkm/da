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
	<?php 	
			$bUrl=Yii::app()->baseUrl; //base URL	
			//$tUrl=Yii::app()->theme->baseUrl;
			
		?>
</head>

<body>

<!-- div class="container" id="login-center" style="padding: 0; margin: 0; width:100%; border:0px; height:100vh; background: url('<?php echo Yii::app()->baseUrl ?>/images/carousel/2.jpg'); background-size: cover;" -->
<div class="container" id="login-center" style="padding: 0; margin: 0; width:100%; border:0px; height:100vh; background: black; background-size: cover;">
	<!-- div id="header" >
		<div id="logo">
		
		</div>
	</div --><!-- header -->

	<!-- div id="TbNavbar" ></div -->
	<!-- div id="mainMbMenu" -->
	<div class="cover-overlay" style="background: rgba(0, 0, 0, 0.5); height: 100%; width: 100%;">
		<div class="sembarang" style="display:table; height:100%; width:100%;">
			
				<div class="formlogin" style="display:table-cell; vertical-align:middle; ">
					<div class="row">
						
						<div class="col-sm-12 col-md-4 col-md-offset-4">
							
							<?php 
								$this->beginWidget(
									'booster.widgets.TbPanel',
									array(
									'title' => 'Authentication PT. LINTECH DUTA PRATAMA',
									'context' => 'info',
									'headerIcon' => 'lock',
									'content' => '',
									'htmlOptions'=>array(
										'style'=>
										'
											background:rgba(0, 0, 0, 0.5);											
											border:0px;

										'
										),
									)
								);
								echo $content; 
								$this->endWidget();
							?>
						</div>		
						
					</div>
				</div>		
		</div>
	</div>

	<!-- div id="footer">
		Copyright &copy; <?php echo '2014'; ?> by IT PT. LINTECH.<br/>
		All Rights Reserved.<br/>
		<?php //echo Yii::powered(); 
		echo "Powered By TEAM HRD Lintech";?>
	</div--><!-- footer -->

</div><!-- page -->

</body>
</html>
