<?php
/* @var $this JobtitleController */
/* @var $model Jobtitle */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Jobtitle',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'id'); ?>
		<?php //echo $form->textField($model,'id'); ?>
		<?php //echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departement_id'); ?>
		<?php echo $form->textField($model,'departement_id', array('readOnly'=>true, 'value'=>$_GET['departement_id'])); ?>
		<?php echo $form->error($model,'departement_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name', array('size'=>'50')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php 
echo "<br> ".$model->id;
echo "<br> ".$model->departement_id;
echo "<br> ".$model->name;
?>