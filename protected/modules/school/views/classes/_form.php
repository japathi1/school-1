<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'classes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'class'); ?>
			<?php echo $form->textField($model,'class',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'class'); ?>
		</div>
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'section'); ?>
			<?php echo $form->dropDownList($model,'section', $sections,array('empty' => 'Select Section','class' => 'form-control')); ?>
			<?php echo $form->error($model,'section'); ?>
		</div>
	</div>
</div>


<div class="box-footer">
    <?php echo CHtml::link('Back',array('/school/classes'),array("class" => 'btn btn-info pull-right',"style"=>"margin-left:10px;")); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array("class" => 'btn btn-info pull-right')); ?>
</div>

<?php $this->endWidget(); ?>