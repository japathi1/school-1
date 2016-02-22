<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'states-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="box-body">
	<div class="form-group">
		<div class="col-xs-12">
			<?php echo $form->labelEx($model,'state'); ?>
			<?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>512,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'state'); ?>
		</div>
	</div>
</div>

<div class="box-footer">
    <?php echo CHtml::link('Back',array('/admin/states'),array("class" => 'btn btn-info pull-right',"style"=>"margin-left:10px;")); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array("class" => 'btn btn-info pull-right')); ?>
</div>

<?php $this->endWidget(); ?>