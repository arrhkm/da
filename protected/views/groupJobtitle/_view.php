<?php
/* @var $this GroupJobtitleController */
/* @var $data GroupJobtitle */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_id), array('view', 'id'=>$data->employee_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobtitle_id')); ?>:</b>
	<?php echo CHtml::encode($data->jobtitle_id); ?>
	<br />


</div>