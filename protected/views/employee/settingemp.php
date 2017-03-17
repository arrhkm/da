<?php
/* @var $this AccountFormController */
/* @var $model AccountForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form-settingemp-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id', array('disabled'=>true)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name', array('disabled'=>true)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'departement_id'); ?>
		
		<?php 

			//$dep = CHtml::listData(Departement::model()->findAll(),'id','name');
          	//echo CHtml::dropDownList('departement_id','', $dep,	
          	echo $form->dropDownList($model,'departement_id',CHtml::listData(Departement::model()->findAll(),'id','name'),	  	
		  	array(
			    'prompt'=>'Pilih Departement',
			    'ajax' => array(
			    	'type'=>'POST', 
			    	//'url'=>Yii::app()->createUrl('Employee/getjob'), //or $this->createUrl('loadcities') if '$this' extends CController
			    	'url'=>CController::createUrl('Employee/getJob'),
			    	//'update'=>'#x', //or 'success' => 'function(data){...handle the data in the way you want...}',
			  		'data'=>array('departement_id'=>'js:this.value'), //id for query search on Jobtitle			  		
                	'update' => '#'.CHtml::activeId($model, 'jobtitle_id')
			  	)
			));  
		?>
		<?php echo $form->error($model,'departement_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'jobtitle_id'); ?>		
		<?php			
			
			$job=array();
		    if(isset($model->jobtitle_id)){			        
		        $list=Jobtitle::model()->findAll("id=$model->jobtitle_id");
		        $job = CHtml::listData($list,'id','name');
		        echo $form->dropDownList($model,'jobtitle_id',$job);
		    }else {		    
				echo $form->dropDownList($model, 'jobtitle_id', array());
			}
			
        ?>
		<?php echo $form->error($model,'jobtitle_id'); ?>
	</div>


	<div class="row buttons">		
		<?php echo CHtml::submitButton('Save'); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php 

if ($model){
	
	
		echo "<br> ID :".$model->id;
		echo "<br> Name: ".$model->name;
		echo "<br> Dep :".$model->departement_id;
		echo "<br> Jobtitle :".$model->jobtitle_id;

	
}