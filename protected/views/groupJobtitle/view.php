<?php
/* @var $this GroupJobtitleController */
/* @var $model GroupJobtitle */

$this->breadcrumbs=array(
	'Group Jobtitles'=>array('index'),
	$model->employee_id,
);

$this->menu=array(
	array('label'=>'List GroupJobtitle', 'url'=>array('index')),
	array('label'=>'Create GroupJobtitle', 'url'=>array('create')),
	array('label'=>'Update GroupJobtitle', 'url'=>array('update', 'id'=>$model->employee_id)),
	array('label'=>'Delete GroupJobtitle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GroupJobtitle', 'url'=>array('admin')),
);
?>

<h1>View GroupJobtitle #<?php echo $model->employee_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'jobtitle_id',
		'employee_id',
	),
)); ?>
