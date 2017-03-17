<?php
/* @var $this GroupJobtitleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Group Jobtitles',
);

$this->menu=array(
	array('label'=>'Create GroupJobtitle', 'url'=>array('create')),
	array('label'=>'Manage GroupJobtitle', 'url'=>array('admin')),
);
?>

<h1>Group Jobtitles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
