<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class' => 'search-form')
)); ?>
<div class="box-body">
	<div class="form-group">
		<div class="col-xs-6">
			<?php echo $form->label($model,'class'); ?>
			<?php echo $form->dropDownList($model,'class',$classes,array('empty' => 'Select Classes','class' => 'form-control')); ?>
		</div>
		<div class="col-xs-6">
			<?php echo $form->label($model,'section'); ?>
			<?php echo $form->textField($model,'section',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
	</div>
</div>
<div class="box-footer">
	<?php echo CHtml::submitButton('Search',array("class" => 'btn btn-info search-button')); ?>
	<a href="<?php echo base_url().'/school/sections/manage' ?>" class="btn btn-warning">Clear</a>
</div>
<?php $this->endWidget(); ?>