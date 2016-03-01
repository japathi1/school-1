<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'students-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="box-body">
	<div class="form-group">
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'firstname'); ?>
			<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'firstname'); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'middlename'); ?>
			<?php echo $form->textField($model,'middlename',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'middlename'); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'lastname'); ?>
			<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'lastname'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'roll_number'); ?>
			<?php echo $form->textField($model,'roll_number',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'roll_number'); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'class'); ?>
			<?php echo $form->dropDownList($model,'class',$classes,
											array('empty' => 'Select Classes',
													'class' => 'form-control',
													'ajax' => array(
											                'type' => 'POST',
											                'url' => CController::createUrl('sections'),
											                'update' => '#Students_section',
											                'data' => array('class' => 'js:this.value'),
											        ))); ?>
			<?php echo $form->error($model,'class'); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'section'); ?>
			<?php echo $form->dropDownList($model,'section',[],array('empty' => 'Select Section','class' => 'form-control')); ?>
			<?php echo $form->error($model,'section'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'address_line_1'); ?>
			<?php echo $form->textField($model,'address_line_1',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'address_line_1'); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'address_line_2'); ?>
			<?php echo $form->textField($model,'address_line_2',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'address_line_2'); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'city'); ?>
			<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'city'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'state'); ?>
			<?php echo $form->dropDownList($model,'state',$states,array('empty' => 'Select State','class' => 'form-control')); ?>
			<?php echo $form->error($model,'state'); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'pin'); ?>
			<?php echo $form->textField($model,'pin',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'pin'); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->labelEx($model,'emg_contact'); ?>
			<?php echo $form->textField($model,'emg_contact',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
			<?php echo $form->error($model,'emg_contact'); ?>
		</div>
	</div>
</div>


<div class="box-footer">
    <?php echo CHtml::link('Back',array('/school/students'),array("class" => 'btn btn-info pull-right',"style"=>"margin-left:10px;")); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array("class" => 'btn btn-info pull-right')); ?>
</div>

<?php $this->endWidget(); ?>