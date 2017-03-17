<div class="form">
 
<?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'chnage-password-form',
            'enableClientValidation' => true,            
     ));
?>
 
  <div class="row"> 
    <?php echo $form->labelEx($model,'eployee_id'); ?> 
    <?php echo $form->textField($model,'id', array('readOnly'=>true)); ?> 
    <?php echo $form->error($model,'employee_id'); ?> 
  </div>
 
  <div class="row"> 
    <?php echo $form->labelEx($model,'password'); ?> 
    <?php echo $form->passwordField($model,'password'); ?> 
    <?php echo $form->error($model,'password'); ?> 
  </div>

  <div class="row"> 
    <?php echo $form->labelEx($model,'level'); ?> 
    <?php echo $form->textField($model,'level', array('value'=>1)); ?> 
    <?php echo $form->error($model,'level'); ?> 
  </div>  
 
  <div class="row submit">
    <?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Change password')); ?>
    <?php echo CHtml::submitButton('Change Password', array('confirm'=>'Are you sure want to change password ?')); ?>
  </div>
  <?php $this->endWidget(); ?>
</div>
<?php echo $msg;?>