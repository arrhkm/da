<?php
/* @var $this WorkinController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Workins',
);

$this->menu=array(
	array('label'=>'Create Workin', 'url'=>array('create')),
	array('label'=>'Manage Workin', 'url'=>array('admin')),
);
?>

<h1>Workins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
