<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class' => 'search-form')
)); ?>
<div class="box-body">
	<div class="form-group">
		<div class="col-xs-4">
			<?php echo $form->label($model,'school'); ?>
			<?php echo $form->dropDownList($model,'school',$schools,array('empty' => 'Choose School','class' => 'form-control')); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->label($model,'amount'); ?>
			<?php echo $form->textField($model,'amount',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->label($model,'type'); ?>
			<?php echo $form->dropDownList($model,'type',getParam('charge_type'),array('empty' => 'Choose Type','class' => 'form-control')); ?>
		</div>
	</div>
</div>
<div class="box-footer">
	<?php echo CHtml::submitButton('Search',array("class" => 'btn btn-info search-button')); ?>
	<a href="<?php echo base_url().'/admin/schoolCharges/manage' ?>" class="btn btn-warning">Clear</a></div>
<?php $this->endWidget(); ?>
