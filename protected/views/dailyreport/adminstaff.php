<?php
/* @var $this DailyreportController */
/* @var $model Dailyreport */

$this->breadcrumbs=array(
	'Dailyreports'=>array('indexstaff'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Dailyreport', 'url'=>array('indexstaff')),
	array('label'=>'Create Dailyreport', 'url'=>array('createstaff')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dailyreport-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Dailyreports</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'dailyreport-grid',
	'type'=>'stripted',
	'dataProvider'=>$model->getSummeryDetil(yii::app()->user->id),
	'filter'=>$model,
	'responsiveTable' => true,
	'columns'=>array(
		'id',
		'employee_id',
		'date_report',
		//'code',
		array(
			'class'=>'booster.widgets.TbButtonColumn',
			'htmlOptions'=>array('class'=>'col-sm-2'),
			'buttons'=>array(
				'tempalte'=>'{view}{update}{delete}',
				//'viewButtonUrl'=>'Yii::app()->createUrl("/dailyreport/viewstaff", array("id"=>$data->id))',
				//'updateButtonUrl'=>'Yii::app()->createUrl("/dailyreport/updatestaff", array("id"=>$data->id))', 
				//'deleteButtonUrl'=>'Yii::app()->createUrl("/dailyreport/deletedetil", array("id"=>$data[id], "detil_id"=>$data[dailyreport_id]))',

	            'view' => array(
	                'label'=>'view',
	                'url'=>'Yii::app()->createUrl("/dailyreport/viewstaff", array("id"=>$data->id))',                  
                    'options'=>array(
			        		'class'=>'btn btn-small btn-info', 
			        		'style'=>'margin:1px; padding:5px',                        	
			        )
	            ),
	            'update' => array(
	                'label'=>'Update',
	                'url'=>'Yii::app()->createUrl("/dailyreport/updatestaff", array("id"=>$data->id))',
                    'options'=>array(
			        		'class'=>'btn btn-small btn-warning',
			        		'style'=>'margin:1px; padding:5px',
			        )
	            ),
	            'delete' =>array(
	            	'options'=>array(
			        		'class'=>'btn btn-small btn-danger',
			        		'style'=>'margin:1px; padding:5px',
			        )
	            )
            ),
            //'template'=>'{view}{update}{delete}'
		),
	),
)); ?>
