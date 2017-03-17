<?php
/* @var $this GroupJobtitleController */
/* @var $model GroupJobtitle */

$this->breadcrumbs=array(
	'Group Jobtitles'=>array('index'),
	$model->employee_id=>array('view','id'=>$model->employee_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GroupJobtitle', 'url'=>array('index')),
	array('label'=>'Create GroupJobtitle', 'url'=>array('create')),
	array('label'=>'View GroupJobtitle', 'url'=>array('view', 'id'=>$model->employee_id)),
	array('label'=>'Manage GroupJobtitle', 'url'=>array('admin')),
);
?>

<h1>Update GroupJobtitle <?php echo $model->employee_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>