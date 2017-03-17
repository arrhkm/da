<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="form-horizontal" >
<?php 
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'verticalForm',
		'type' => 'horizontal',

		//'htmlOptions' => array('class' => 'col-md-24'), // for inset effect
	)
);
?>

	<div class="form-group">
		<?php // echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('class'=>'form-control input-lg', 'placeholder'=>'No Induk Karyawan')
		); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php // echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control input-lg', 'placeholder'=>'Password')
		); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			
		</p>
	</div>

	<div class="form-group">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe', array('class'=>'text-white',)); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
<div class="form-group">
	<?php echo CHtml::submitButton('Login',array(
	 'class'=>'btn btn-blue-custom btn-lg btn-block')
	);?>	
	
</div>
	
<?php $this->endWidget(); unset($form);?>
</div><!-- form -->

