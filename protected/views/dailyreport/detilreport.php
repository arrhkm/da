<?php
/* @var $this DetilreportController */
/* @var $detil Detilreport */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'Dailyreports'=>array('indexstaff'),
    $model2->id,
);
?>
<h1> Detil Daily Report</h1>
<div class="form">


<?php 
/*
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'detilreport-detilreport-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); 

*/
?>

<?php


$form = $this->beginWidget(
'booster.widgets.TbActiveForm',
	array(
		'id' => 'horizontalForm',
		'type' => 'horizontal',
                'htmlOptions' => array('class' => 'well'), // for inset effect
	)
); 
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($detil); ?>

	

	<div class="row">
		<?php echo $form->labelEx($detil,'dailyreport_id'); ?>
		<?php echo $form->textField($detil,'dailyreport_id', array('value'=>$_REQUEST['detil_id'], 'readOnly'=>true)); ?>
		
		<?php echo $form->error($detil,'dailyreport_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($detil,'listjob'); ?>
		<?php //echo $form->textField($detil,'listjob', array('size'=>45,'maxlength'=>45, 'style' => 'text-transform: uppercase', 'value'=>strtoupper($detil->listjob))); ?>
		<?php 
		$gJob = GroupJobtitle::model()->findByPk(yii::app()->user->id);				
		$list = CHtml::listData(NameJob::model()->findAllBySql("SELECT * FROM name_job WHERE jobtitle_id= $gJob->jobtitle_id"), 'name_job', 'name_job'); 
		echo $form->dropDownList($detil, 'listjob', $list, array('empty'=>''));
		
		?>
		<?php echo $form->error($detil,'listjob'); ?>
	</div>

	<div class="row">
	<div class="col-sm5">
		<?php echo $form->labelEx($detil,'describejob'); ?>
		<?php echo $form->textArea($detil,'describejob', array('rows'=>5,'cols'=>50, 'value'=>$detil->describejob)); ?>
                <?php //echo $form->textField($detil, 'describejob', array('value'=>$_REQUEST['describejob']));?>
		<?php echo $form->error($detil,'describejob'); ?>
	</div>
	</div>
	<div class="row">
		<?php echo $form->labelEx($detil,'duration'); ?>
		<?php //echo $form->textField($detil,'duration', array('size'=>8, 'maxlength'=>8)); ?>
		<?php
			$this->widget('application.extensions.timepicker.timepicker', array(
			    'model'=>$detil,
			    'name'=>'duration',
			    'select'=> 'time',
	            'options' => array(
	           		'showOn'=>'focus',
	                'timeFormat'=>'hh:mm:ss',
	                //'hourMin'=> (int) $hourMin,
	                //'hourMax'=> (int) $hourMax,
	                'hourGrid'=>4,
	                'minuteGrid'=>10,
	                'secondGrid'=>10,
	                //'showsecond'=>true,
	                //'showOn'=>'button',
					'showSecond'=>true,
					'changeMonth'=>false,
					'changeYear'=>false,
					'tabularLevel'=>null,
	            ),
			));
		?>
		<?php echo " <br>Waktu yang anda butuhkan dalam bekerja"; echo $form->error($detil,'duration'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($detil->isNewRecord ? 'Add' : 'Save'); ?>
		<?php 
			if (!isset($_REQUEST['update'])) 
			{ 
					echo CHtml::Button('Back', array('submit'=>array('dailyreport/viewstaff/', 'id'=>$_REQUEST['detil_id']))); 
			}
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php 
//$this->widget('zii.widgets.grid.CGridView', array(

$this->widget('booster.widgets.TbGridView', array(
	//'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
	'id'=>'detil-grid',
	'type'=>'striped',
	'responsiveTable'=>true,
	'dataProvider'=>$model2->getSummeryDetil($_REQUEST['detil_id']),
	'summaryText'=>'',	
	
	'columns'=>array(
		array(
			'header'=>'No.', // row is zero based
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array(
				//'width'=>'3%',
				'class'=>'col-sm-1px col-md-3-px col-lg-6px'
			),
		),
		'id',
		'dailyreport_id',
		'listjob',
		//'describejob',		
		'duration',		
		array(
			'class'=>'booster.widgets.TbButtonColumn',//'class'=>'CButtonColumn',
			'htmlOptions'=> array('class'=>'col-sm-1 col-md-3px col-lg-6px'),
			'buttons'=>array(
	            /*'view' => array(
	                'label'=>'view',
	                'url'=>'Yii::app()->createUrl("/dailyreport/viewstaff", array("id"=>$data->id))',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/password.png',
	            ),*/
	            'update' => array(
	                'label'=>'Update',
	                'url'=>'Yii::app()->createUrl("/dailyreport/updatedetil", array("id"=>$data[id], "dailyreport_id"=>$data[dailyreport_id], "update"=>1))',
                    //'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/password.png',
                    //'icon'=>'fa fa-facebook',
                    'options'=>array(			        		
			        		'class'=>'btn btn-small btn-warning',
			        		'style'=>'margin:1px; padding:5px',
			        )
	            ),
	            'delete' => array(
	            	'label'=>'Delete',
	            	'url'=>'Yii::app()->createUrl("/dailyreport/deletedetil", array("id"=>$data[id], "detil_id"=>$data[dailyreport_id]))', 
	            	'options'=>array(			        		
			        		'class'=>'btn btn-small btn-danger',
			        		'style'=>'margin:1px; padding:5px',
			        )
	            )
            ),
            'template'=>'{update}{delete}'
		),
	),
)); 
echo "Total Duration : ".$total_duration;
?> 