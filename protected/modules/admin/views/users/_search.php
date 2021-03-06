<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class' => 'search-form')
)); ?>
<div class="box-body">
	<div class="form-group">
		<div class="col-xs-3">
			<?php echo $form->label($model,'username'); ?>
			<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'firstname'); ?>
			<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'lastname'); ?>
			<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-3">
			<?php echo $form->label($model,'school_id'); ?>
			<?php echo $form->dropDownList($model,'school_id',$schools,array('empty' => 'Select School','class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'role'); ?>
			<?php echo $form->dropDownList($model,'role', $roles,array('empty' => 'Select Role','class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			
		</div>
		<div class="col-xs-3">
			
		</div>
	</div>
</div>
<div class="box-footer">
	<?php echo CHtml::submitButton('Search',array("class" => 'btn btn-info search-button')); ?>
	<a href="<?php echo base_url().'/admin/users/manage' ?>" class="btn btn-warning">Clear</a>
</div>
<?php $this->endWidget(); ?>
