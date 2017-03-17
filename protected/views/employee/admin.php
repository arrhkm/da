<?php
/* @var $this EmployeeController */
/* @var $model Employee */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Employee', 'url'=>array('index')),
	array('label'=>'Create Employee', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#employee-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Employees</h1>

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

<?php /* $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'jobtitle_id',
		'name',
		//'password',
		//'level',
		'email',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); */?>

<?php 
$this->widget(
	'booster.widgets.TbExtendedGridView', array(
	    'type' => 'striped',
	    'dataProvider' => $model->search(),
	    'filter'=>$model,
	    //'template' => "{items}",
	    'responsiveTable' => true,
  		//'headerOffset' => 30, // 40px is the height of the main navigation at bootstrap
	    'enablePagination' => true,
	    'columns' => array(
	    	'id',
			//'jobtitle_id',
			'name',
			//'password',
			//'level',
			'email',    	
	    	array(
	    		'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
				'template'=>'{view}{update}{delete}',
				'buttons'=>array(					
					'htmlOptions' => array('nowrap'=>'nowrap'),
					'update' => array(
		                'label'=>'Update',
		                'url'=>'Yii::app()->createUrl("/employee/update", array("id"=>$data[id]))',	                    
			        ),
		            'delete' => array(
		            	'label'=>'Delete',
		            	'url'=>'Yii::app()->createUrl("/employee/delete", array("id"=>$data[id]))', 
		            )			
           		),      	
	    	),
	    ),
    )
 );
?>