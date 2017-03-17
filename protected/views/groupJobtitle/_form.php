<?php
/* @var $this GroupJobtitleController */
/* @var $model GroupJobtitle */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-jobtitle-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'jobtitle_id'); ?>
		<?php //echo $form->textField($model,'jobtitle_id'); ?>
		<?php 
			echo $form->dropDownList($model, 'jobtitle_id', 
				CHtml::listData(Jobtitle::model()->findAll(), 'id', 'name'),
				array('prompt' => 'Select a Jobtitle')
			); 
		?>
		<?php echo $form->error($model,'jobtitle_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php //echo $form->textField($model,'employee_id',array('size'=>15,'maxlength'=>15)); ?>
		<?php 
			echo $form->dropDownList($model, 'employee_id', CHtml::listData(Employee::model()->findAll(), 'id', 'name'),
				array('prompt' => 'Select Jobtitle')
			); 
		?>
		<?php //echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->