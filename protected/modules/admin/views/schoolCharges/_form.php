<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'school-charges-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="box-body">
	<div class="form-group">
		<div class="col-xs-12">
			<?php echo $form->labelEx($model,'amount'); ?>
			<?php echo $form->textField($model,'amount',array('size'=>60,'maxlength'=>512,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'amount'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'school'); ?>
			<?php echo $form->dropDownList($model,'school', $schools,array('empty' => 'Select School','class' => 'form-control')); ?>
			<?php echo $form->error($model,'school'); ?>
		</div>
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'type'); ?>
			<?php echo $form->dropDownList($model,'type', getParam('charge_type'),array('empty' => 'Select Type','class' => 'form-control')); ?>
			<?php echo $form->error($model,'type'); ?>
		</div>
	</div>
	
</div>

<div class="box-footer">
    <?php echo CHtml::link('Back',array('/admin/schoolCharges'),array("class" => 'btn btn-info pull-right',"style"=>"margin-left:10px;")); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array("class" => 'btn btn-info pull-right')); ?>
</div>

<?php $this->endWidget(); ?>
