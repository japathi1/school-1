<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class' => 'search-form')
)); ?>
<div class="box-body">
	<div class="form-group">
		<div class="col-xs-3">
			<?php echo $form->label($model,'firstname'); ?>
			<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'middlename'); ?>
			<?php echo $form->textField($model,'middlename',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'lastname'); ?>
			<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'roll_number'); ?>
			<?php echo $form->textField($model,'class',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-3">
			<?php echo $form->label($model,'class'); ?>
			<?php echo $form->dropDownList($model,'class',$classes,
											array('empty' => 'Select Classes',
													'class' => 'form-control',
													'ajax' => array(
											                'type' => 'POST',
											                'url' => CController::createUrl('sections'),
											                'update' => '#Students_section',
											                'data' => array('class' => 'js:this.value'),
											        ))); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'section'); ?>
			<?php echo $form->dropDownList($model,'section',[],array('empty' => 'Select Section','class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'emg_contact'); ?>
			<?php echo $form->textField($model,'emg_contact',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
	</div>
</div>
<div class="box-footer">
	<?php echo CHtml::submitButton('Search',array("class" => 'btn btn-info search-button')); ?>
	<a href="<?php echo base_url().'/school/students/manage' ?>" class="btn btn-warning">Clear</a>
</div>
<?php $this->endWidget(); ?>