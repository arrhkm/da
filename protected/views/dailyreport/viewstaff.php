<style>
.blink_text {
  animation:1s blinker linear infinite;
  -webkit-animation:1s blinker linear infinite;
  -moz-animation:1s blinker linear infinite;

  color: red;
}
@-moz-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@-webkit-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
}
</style>
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
	array('label'=>'Add Detil Dailyreport (Menambah Detil Report)', 'url'=>array('dailyreport/detilreport', 'dailyreport_id'=>$model->id)),
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
$this->widget('booster.widgets.TbExtendedGridView', array(
	//'type' => 'striped', //'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
	//'id'=>'detil-grid',	
	'dataProvider'=>$model2->getSummeryDetil($model->id),//'dataProvider'=>$model2->getSummeryDetil($_REQUEST['detil_id']),	
	//'filter'=>false,
	'columns'=>array(

            array(
                    'header'=>'No.', // row is zero based
                    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                    'htmlOptions'=>array('width'=>'3%'),
            ),
			
            'id',
            'dailyreport_id',
            'listjob',            
            array(
            'name'=>'describejob',			
			'value'=>function($data){
               return '<textarea rows="4" cols="50">'.$data['describejob'].'</textarea>';
            },                        		
			'type'=>'raw',
            ),           
			array(
                'name'=>'duration',
                'type'=>'raw',
				'value'=>$model2->duration,
                'footer'=>"Total Duration : <br>".$model2->getTotalDuration($model->id),
				'footerHtmlOptions' => array('class'=>'grid-footer'),
            ),
			/*
            array(
                'htmlOptions' => array('nowrap' => 'nowrap'),
                'class' => 'booster.widgets.TbButtonColumn',
                'viewButtonUrl' => null,
                'updateButtonUrl' => null,
                'deleteButtonUrl' => null,
            ),*/			
            array(
                'class'=>'booster.widgets.TbButtonColumn',//'class'=>'CButtonColumn',
                'htmlOptions'=> array('class'=>'col-sm-1'),
				'viewButtonUrl' => null,
                'updateButtonUrl' =>function($data){ 
					return Yii::app()->createUrl("/dailyreport/updatedetil", array("id"=>$data['id'], "dailyreport_id"=>$data['dailyreport_id'], "update"=>1));
				},
                'deleteButtonUrl' => null,
                //'template'=>'{update}{delete}',
			/*
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
                ),*/            
            ),
	),
)); 

echo "<span class='blink_text'>Total Duration : ".$total."</sapan>";//$total_duration;
?> 
