<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schools-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
	<div class="form-group">
		<div class="col-xs-12">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>512,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'address_line_1'); ?>
			<?php echo $form->textField($model,'address_line_1',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'address_line_1'); ?>
		</div>
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'address_line_2'); ?>
			<?php echo $form->textField($model,'address_line_2',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'address_line_2'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'city'); ?>
			<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'city'); ?>
		</div>
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'state'); ?>
			<?php echo $form->dropDownList($model,'state', $roles,array('empty' => 'Select State','class' => 'form-control')); ?>
			<?php echo $form->error($model,'state'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'pin'); ?>
			<?php echo $form->textField($model,'pin',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'pin'); ?>
		</div>
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'contact'); ?>
			<?php echo $form->textField($model,'contact',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'contact'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'mobile'); ?>
			<?php echo $form->textField($model,'mobile',array('size'=>16,'maxlength'=>16,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'mobile'); ?>
		</div>
		<div class="col-xs-6">
			
		</div>
	</div>
</div>


<div class="box-footer">
    <?php echo CHtml::link('Back',array('/admin/students'),array("class" => 'btn btn-info pull-right',"style"=>"margin-left:10px;")); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array("class" => 'btn btn-info pull-right')); ?>
</div>

<?php $this->endWidget(); ?>