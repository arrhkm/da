<?php
/* @var $this WorkinController */
/* @var $data Workin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_id), array('view', 'id'=>$data->employee_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departement_id')); ?>:</b>
	<?php echo CHtml::encode($data->departement_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('since')); ?>:</b>
	<?php echo CHtml::encode($data->since); ?>
	<br />


</div>