<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_id), array('view', 'id'=>$data->employee_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actived')); ?>:</b>
	<?php echo CHtml::encode($data->actived); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ask_forget_password')); ?>:</b>
	<?php echo CHtml::encode($data->ask_forget_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_forget_password')); ?>:</b>
	<?php echo CHtml::encode($data->question_forget_password); ?>
	<br />


</div>