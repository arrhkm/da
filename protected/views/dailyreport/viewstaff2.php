<?php
/* @var $this DailyreportController */
/* @var $model Dailyreport */

$this->breadcrumbs=array(
	'Dailyreports'=>array('indexstaff'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Dailyreport', 'url'=>array('indexstaff')),
	array('label'=>'Create Dailyreport', 'url'=>array('createstaff')),
	array('label'=>'Update Dailyreport', 'url'=>array('updatestaff', 'id'=>$model->id)),
	array('label'=>'Delete Dailyreport', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dailyreport', 'url'=>array('adminstaff')),
	array('label'=>'Add Detil Dailyreport (Menambah Detil Report)', 'url'=>array('dailyreport/detilreport', 'detil_id'=>$model->id)),
);
?>

<h1>View Dailyreport #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'date_report',
		//'code',
	),
)); ?>

<?php 
//$this->widget('zii.widgets.grid.CGridView', array(

/*
$this->widget('booster.widgets.TbExtendedGridView', array(
	'type' => 'striped', //'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
	'id'=>'detil-grid',	
	'dataProvider'=>$model2->getSummeryDetil($model->id),//'dataProvider'=>$model2->getSummeryDetil($_REQUEST['detil_id']),
	//'summaryText'=>'',
	
	'columns'=>array(

		array(
			'header'=>'No.', // row is zero based
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
			'htmlOptions'=>array('width'=>'3%'),
		),
			
		//'id',
		'dailyreport_id',
		'listjob',
		//'describejob',
		array(
			//'name'=>'Describe',
			//'value'=>'CHtml::textArea("describejob", $data[describejob])',
                        'type' => 'text',
                        //'model2' => $model2,
                        'attribute'=>'describejob',
			'type'=>'raw',
		),
		'duration',
			
		array(
			'class'=>'booster.widgets.TbButtonColumn',//'class'=>'CButtonColumn',
			'htmlOptions'=> array('class'=>'col-sm-1'),
			'template'=>'{update}{delete}',
			'buttons'=>array(					
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'update' => array(
	                'label'=>'Update',
	                'url'=>'Yii::app()->createUrl("/dailyreport/updatedetil", array("id"=>$data[id], "dailyreport_id"=>$data[dailyreport_id], "update"=>1))',	                    
		        	'options'=>array(
			        		'class'=>'btn btn-small btn-warning',
			        		'style'=>'margin:1px; padding:5px',
			        )
		        ),
	            'delete' => array(
	            	'label'=>'Delete',
	            	'url'=>'Yii::app()->createUrl("/dailyreport/deletedetil", array("id"=>$data[id], "detil_id"=>$data[dailyreport_id]))', 
	           		'options'=>array(
			        		'class'=>'btn btn-small btn-danger',
			        		'style'=>'margin:1px; padding:5px',
			        )
	            )			
            ),            
		),
	),
)); 
   */
echo "Total Duration : ".$total_duration;
?> 