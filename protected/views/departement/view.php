<?php
/* @var $this DepartementController */
/* @var $model Departement */

$depart= Departement::model()->findByPk($model->id);
$this->breadcrumbs=array(
	'Departements'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Departement', 'url'=>array('index')),
	array('label'=>'Create Departement', 'url'=>array('create')),
	array('label'=>'Update Departement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Departement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Departement', 'url'=>array('admin')),
	array('label'=>'Add Jobtitle '.$depart->name, 'url'=>array('departement/createjobtitle', 'departement_id'=>$model->id)),
);
?>

<h1>View Departement #<?php echo $depart->name." - ".$model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		array(
            'name' => 'Manager',
            'value' => $manager
        ),
	),
)); ?>


<?php 
$model2= new Jobtitle;
/*'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
'id'=>'detil-grid',
'dataProvider'=>$model2->getSummeryDetil($model->id),
'summaryText'=>'',
*/
 $this->widget('booster.widgets.TbGridView',
array(
	'type' => 'striped',
	'dataProvider' => $model2->getSummeryDetil($model->id),
	//'template' => "{create, update, delete}",

	'columns'=>array(
		array(
		'header'=>'No.', // row is zero based
		'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
		'htmlOptions'=>array('width'=>'3%'),
		),
		array(
			'header'=>'Id',
			'value'=>'$data[\'id\']',
			'htmlOptions'=>array('style'=>'text-align:left', 'width'=>'3%'),
		),
		array(
			'header'=>'Departement Id',
			'value'=>'$data[\'departement_id\']',
			'htmlOptions'=>array('style'=>'text-align:left', 'width'=>'3%'),
		),
		array(
			'header'=>'Name',
			'value'=>'$data[\'name\']',
			'htmlOptions'=>array('style'=>'text-align:left', 'width'=>'30%'),
		),
		array(
			'name'=>'Delete',
			'type'=>'raw',
			'value'=>'CHtml::link(X, Yii::app()->controller->createUrl("departement/deletejobtitle", array("jobtitleid"=>$data[id], "depid"=>$data[departement_id])))',
			'htmlOptions'=>array('style'=>'text-align:center', 'width'=>'3%'),
		),
		array(
			'name'=>'Edit',
			'type'=>'raw',
			'value'=>'CHtml::link(Edit, Yii::app()->controller->createUrl("departement/updatejobtitle", array("jobtitleid"=>$data[id], "depid"=>$data[departement_id])))',
			'htmlOptions'=>array('style'=>'text-align:center', 'width'=>'3%'),
		),
		array(
			'class'=>'booster.widgets.TbButtonColumn',//'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'text-align:center', 'class'=>'col-sm-3'),
			'template'=>'{addnamejob}',
			'buttons'=>array(					
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'addnamejob' => array(
	                'label'=>'Add Name Job',
	                'url'=>'Yii::app()->createUrl("/departement/addnamejob", array("jobtitle_id"=>$data[id]))',	                    
		        ),
	            		
            ),            
		),
		
	),
)); ?> 
