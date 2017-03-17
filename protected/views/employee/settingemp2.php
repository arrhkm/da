<?php
/* @var $this AccountFormController */
/* @var $model AccountForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form-settingemp-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id', array('disabled'=>true)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name', array('disabled'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'departement_id'); ?>
		<?php //echo $form->textField($model,'departement_id'); ?>
		<?php 
			$dep = CHtml::listData(Departement::model()->findAll(),'id','name');
			echo $form->dropDownList($model, 'departement_id', $dep, array('empty'=>''));
		?>
		<?php echo $form->error($model,'departement_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'jobtitle_id'); ?>
		<?php //echo $form->textField($model,'jobtitle_id'); ?>
		<?php 
			$job = CHtml::listData(Jobtitle::model()->findAll(),'id','name');
			echo $form->dropDownList($model, 'jobtitle_id', $job, array('empty'=>''));
		?>
		<?php echo $form->error($model,'jobtitle_id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->