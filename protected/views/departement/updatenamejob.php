<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->breadcrumbs=array(
	//'Departements'=>array('index'),
	//$model->name=>array('view','id'=>$model->id),
	//'Update Name JOb',
);

$this->menu=array(
	//array('label'=>'List Departement', 'url'=>array('index')),
	//array('label'=>'Create Departement', 'url'=>array('create')),
	//array('label'=>'View Departement', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage Departement', 'url'=>array('admin')),
);
?>

<h1>Update Departement <?php echo $model->id; ?></h1>

<?php //$this->renderPartial('addnamejob', array('model'=>$model)); ?>
<?php $this->renderPartial('/departement/addnamejob', 
	array(
		'model'=>$model, 
		'ModelNameJob'=>$NameJob, 
		'dataBack'=>$dataBack
	));
?>
<?php //echo "ID : ".$namejobid;?>
