<div class="form">

<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'name_job-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); */?>

<?php

$this->breadcrumbs=array(
	'Home'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Departement', 'url'=>array('index')),
	//array('label'=>'Create Departement', 'url'=>array('create')),
	array('label'=>'Back', 'url'=>array('Departement/view', 'id'=>$dataBack['dep_id']))
);
?>


<?php $form = $this->beginWidget(
'booster.widgets.TbActiveForm',
array(
'id' => 'verticalForm',
'htmlOptions' => array('class' => 'well'), // for inset effect
)
);
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'id'); ?>
		<?php //echo $form->textField($model,'id'); ?>
		<?php //echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'jobtitle_id'); ?>
		<?php echo $form->textFieldGroup($model,'jobtitle_id', 
			array(
				'htmlOptions' => array('class' => 'col-sm-1'),
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-1',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
			
		); ?>
		<?php echo $form->error($model,'jobtitle_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'name_job'); ?>
		<?php echo $form->textField($model,'name_job'); ?>
		<?php echo $form->error($model,'name_job'); ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php 
$this->widget(
	'booster.widgets.TbExtendedGridView', array(
	    'type' => 'striped',
	    'dataProvider' => $ModelNameJob->searchById($model->jobtitle_id),
	    //'template' => "{items}",	    
	    'enablePagination' => true,
	    'responsiveTable'=>true,
	    'columns' => array(
	    	'id',
	    	'jobtitle_id',
	    	'name_job',
	    	array(
	    		'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
				'template'=>'{update}{delete}',
				'buttons'=>array(					
					'htmlOptions' => array('nowrap'=>'nowrap'),
					'update' => array(
		                'label'=>'Update',
		                //'url'=>'Yii::app()->createUrl("departement/updatenamejob", array("namejobid"=>$data[id]))',	
		                'url'=>'Yii::app()->createUrl("/departement/updatenamejob", array("namejobid"=>$data[id], "jobtitle_id"=>$data[jobtitle_id]))',                    
			        ),
		            'delete' => array(
		            	'label'=>'Delete',
		            	'url'=>'Yii::app()->createUrl("/departement/deletenamejob", array("id"=>$data[id], "jobtitle_id"=>$data[jobtitle_id]))', 
		            )			
           		),      	
	    	),
	    ),
    )
 );
echo "ID Dep :".$dataBack['dep_id']. " - ".$dataBack['dep_name'];
 ?>