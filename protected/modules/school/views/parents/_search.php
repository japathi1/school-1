<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class' => 'search-form')
)); ?>
<div class="box-body">
	<div class="form-group">
		<div class="col-xs-3">
			<?php echo $form->label($model,'child'); ?>
			<?php echo $form->dropDownList($model,'child',$childs,array('empty' => 'Select Child','class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'firstname'); ?>
			<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'firstname'); ?>
			<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-3">
			<?php echo $form->label($model,'parent_type'); ?>
			<?php echo $form->dropDownList($model,'parent_type',getParam('parent_type'),array('empty' => 'Select Parent Type','class' => 'form-control')); ?>
		</div>
	</div>
</div>
<div class="box-footer">
	<?php echo CHtml::submitButton('Search',array("class" => 'btn btn-info search-button')); ?>
	<a href="<?php echo base_url().'/school/parents/manage' ?>" class="btn btn-warning">Clear</a>
</div>
<?php $this->endWidget(); ?>