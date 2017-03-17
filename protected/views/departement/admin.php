<?php
/* @var $this DepartementController */
/* @var $model Departement */

$this->breadcrumbs=array(
	'Departements'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Departement', 'url'=>array('index')),
	array('label'=>'Create Departement', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#departement-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Departements</h1>

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
	'id'=>'departement-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
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
  		'headerOffset' => 20, // 40px is the height of the main navigation at bootstrap
	    'enablePagination' => true,
	    'columns' => array(
	    	//'id',
	    	//'name',
	    	array(
	    		'header'=>'ID', 
	    		'name'=>'id', 
	    		'value'=>$data[id],
	    		'htmlOptions'=>array('class'=>'col-sm-2'),
	    	),	
	    	array(
	    		'header'=>'Nama Departement', 
	    		'name'=>'name', 
	    		'value'=>$data[name],
	    		'htmlOptions'=>array('class'=>'col-sm-6', 'style'=>'padding:5px'),
	    	),
	    	array(
	    		'header'=>'Manager', 
	    		'name'=>'employee_name', 
	    		'value'=>$data[employee_name],
	    		'htmlOptions'=>array('class'=>'col-sm-6', 'style'=>'padding:5px'),
	    	),	  	    	
	    	array(
	    		'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
				//'class'=>'CButtonColumn', 
				'template'=>'{view}{update}{delete}{manager}',
				'buttons'=>array(
					       
			        'manager' => array(
			            'label' => 'Manager',     // text label of the button
			            //'label'=>'<i class="fa fa-camera-retro fa-lg"></i>',
			            'url' => 'Yii::app()->createUrl("departement/manager/", array("id"=>$data[id]))',       // the PHP expression for generating the URL of the button
			            //'imageUrl' => '',  // image URL of the button. If not set or false, a text link is used
			            //'options' => array('class'=>'col-sm-4'), // HTML options for the button tag
			            //'click' => '...',     // a JS function to be invoked when the button is clicked
			            'icon'=>'fa fa-sitemap',
			            'options'=>array(
                        	'class'=>'btn btn-small btn-success',
                        	'style'=>'margin:1px; padding:5px 5px 5px 5px'
                 		),
                    	
			        ),
			       




			        'view'=>array(  
			        	//'htmlOptions'=>array('style'=>'width:5px'),
			        	'options'=>array(
			        		'class'=>'btn btn-small btn-info', 
			        		'style'=>'margin:1px; padding:5px',                        	
			        	)
			        ),
			        'update'=>array(  			        	
			        	'options'=>array(
			        		'class'=>'btn btn-small btn-warning',
			        		'style'=>'margin:1px; padding:5px',
			        	)
			        ),
			        'delete'=>array(  
			        	'icon'=>'fa fa-trash-o ',
			        	'options'=>array(
			        		'class'=>'btn btn-small btn-danger', 
			        		'style'=>'margin:1px; padding:5px',                        	
			        	)
			        ),
			        
			    ),
	    	),
	    ),
    )
 );
?>
