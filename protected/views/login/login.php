<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';

$this->breadcrumbs=array(
	'Login',
);
?>


<div class="form">
<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
	'id' => 'verticalForm',

	'htmlOptions' => array('class' => '', 'style'=>'font: 15px arial, sans-serif, arial; color: rgb(255,255,255);'), // for inset effect
	)
);
?>
	

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php //echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textFieldGroup($model,'username'); ?>
		<?php //echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordFieldGroup($model,'password'); ?>
		<?php //echo $form->error($model,'password'); ?>
		<p class="hint">
			
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBoxGroup($model,'rememberMe'); ?>
		<?php //echo $form->label($model,'rememberMe'); ?>
		<?php //echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php //echo CHtml::submitButton('Login'); 
			$this->widget(
				'booster.widgets.TbButton',
				array(
				'label' => 'Login',
				'buttonType'=>'submit',
				)
			);
			
		?>

	</div>

<?php 
$this->endWidget();
unset($form);
//$this->endWidget(); ?>
</div><!-- form -->
