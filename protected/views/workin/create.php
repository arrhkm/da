<?php
/* @var $this WorkinController */
/* @var $model Workin */

$this->breadcrumbs=array(
	'Workins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Workin', 'url'=>array('index')),
	array('label'=>'Manage Workin', 'url'=>array('admin')),
);
?>

<h1>Create Workin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>