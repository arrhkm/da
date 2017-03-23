<?php
/* @var $this WorkinController */
/* @var $model Workin */

$this->breadcrumbs=array(
	'Workins'=>array('index'),
	$model->employee_id,
);

$this->menu=array(
	array('label'=>'List Workin', 'url'=>array('index')),
	array('label'=>'Create Workin', 'url'=>array('create')),
	array('label'=>'Update Workin', 'url'=>array('update', 'id'=>$model->employee_id)),
	array('label'=>'Delete Workin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Workin', 'url'=>array('admin')),
);
?>

<h1>View Workin #<?php echo $model->employee_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'employee_id',
		'departement_id',
		'since',
	),
)); ?>
