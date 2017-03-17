<?php
/* @var $this DepartementController */
/* @var $modelJobtitle Departement */

$this->breadcrumbs=array(
	'Departements'=>array('view', 'id'=>$model->departement_id),
	'Update Jobtitle',
);
$departement= Departement::model()->findByPk($model->departement_id);

$this->menu=array(
	array('label'=>'List Departement', 'url'=>array('index')),
	array('label'=>'Back', 'url'=>array('view', 'id'=>$model->departement_id)),
);
?>
<h1><?php echo "UPDATE Departement ".$departement->name." Jobtitle";?></h1>


<?php $this->renderPartial('_form_jobtitle', array('model'=>$model)); ?>
