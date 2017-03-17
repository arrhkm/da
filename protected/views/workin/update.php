<?php
/* @var $this WorkinController */
/* @var $model Workin */

$this->breadcrumbs=array(
	'Workins'=>array('index'),
	$model->employee_id=>array('view','id'=>$model->employee_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Workin', 'url'=>array('index')),
	array('label'=>'Create Workin', 'url'=>array('create')),
	array('label'=>'View Workin', 'url'=>array('view', 'id'=>$model->employee_id)),
	array('label'=>'Manage Workin', 'url'=>array('admin')),
);
?>

<h1>Update Workin <?php echo $model->employee_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>