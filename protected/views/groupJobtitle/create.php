<?php
/* @var $this GroupJobtitleController */
/* @var $model GroupJobtitle */

$this->breadcrumbs=array(
	'Group Jobtitles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GroupJobtitle', 'url'=>array('index')),
	array('label'=>'Manage GroupJobtitle', 'url'=>array('admin')),
);
?>

<h1>Create GroupJobtitle</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>