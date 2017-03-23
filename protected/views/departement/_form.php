<?php
/* @var $this DepartementController */
/* @var $model Departement */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'departement-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<?php if ($edit){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php 
			//echo $form->textField($model,'employee_id'); 
			//$list= CHtml::ListData(Employee::model()->findAll(array("order"=>"name")), 'id', 'name');
			echo $form->dropDownList($model, 'employee_id', CHtml::listData(Employee::model()->findAll(array("order"=>"name")), 'id', 'name'));
		?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>
	<?php } ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->