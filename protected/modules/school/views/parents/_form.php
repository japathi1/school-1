<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parents-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="box-body">
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'child'); ?>
			<?php echo $form->dropDownList($model,'child',$childs,array('empty'=>'Select Class','class' => 'form-control')); ?>
			<?php echo $form->error($model,'child'); ?>
		</div>
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'parent_type'); ?>
			<?php echo $form->dropDownList($model,'parent_type',getParam('parent_type'),array('class' => 'form-control')); ?>
			<?php echo $form->error($model,'parent_type'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'firstname'); ?>
			<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'firstname'); ?>
		</div>
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'lastname'); ?>
			<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'lastname'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'contact'); ?>
			<?php echo $form->textField($model,'contact',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'contact'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'address_line_1'); ?>
			<?php echo $form->textField($model,'address_line_1',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'address_line_1'); ?>
		</div>
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'address_line_2'); ?>
			<?php echo $form->textField($model,'address_line_2',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'address_line_2'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'city'); ?>
			<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>128,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'city'); ?>
		</div>
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'state'); ?>
			<?php echo $form->dropDownList($model,'state',$states,array('empty' => 'Select State','class' => 'form-control')); ?>
			<?php echo $form->error($model,'state'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->labelEx($model,'pincode'); ?>
			<?php echo $form->textField($model,'pincode',array('size'=>6,'maxlength'=>128,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'pincode'); ?>
		</div>
		<div class="col-xs-6">
		</div>
	</div>
</div>


<div class="box-footer">
    <?php echo CHtml::link('Back',array('/school/parents'),array("class" => 'btn btn-info pull-right',"style"=>"margin-left:10px;")); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array("class" => 'btn btn-info pull-right')); ?>
</div>

<?php $this->endWidget(); ?>