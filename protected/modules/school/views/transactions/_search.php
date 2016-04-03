<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'htmlOptions'=>array('class' => 'search-form')
)); ?>
<div class="box-body">
	<div class="form-group">
		<div class="col-xs-4">
			<?php echo $form->label($model,'class'); ?>
			<?php echo $form->dropDownList($model,'class',$classes,array('empty'=>'Select Class',
																		'class' => 'form-control',
																		'ajax' => array(
															                'type' => 'POST',
															                'url' => CController::createUrl('sections'),
															                'update' => '#Transactions_section',
															                'data' => array('class' => 'js:this.value'),
													        			))); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->label($model,'section'); ?>
			<?php echo $form->dropDownList($model,'section',[],array(	'empty'=>'Select Section',
																	'class' => 'form-control',
																	'ajax' => array(
														                'type' => 'POST',
														                'url' => CController::createUrl('students'),
														                'update' => '#Transactions_student',
														                'data' => array('section' => 'js:this.value'),
													        		))); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->label($model,'student'); ?>
			<?php echo $form->dropDownList($model,'student',[],array('empty'=>'Select Student','class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			<?php echo $form->label($model,'receipt'); ?>
			<?php echo $form->textField($model,'receipt',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->label($model,'transaction_id'); ?>
			<?php echo $form->textField($model,'transaction_id',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->label($model,'amount'); ?>
			<?php echo $form->textField($model,'amount',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			<?php echo $form->label($model,'month'); ?>
			<?php echo $form->dropDownList($model,'month',getParam('months'),array('empty'=>'Select Month','class' => 'form-control')); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->label($model,'year'); ?>
			<?php echo $form->textField($model,'year',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
		</div>
		<div class="col-xs-4">
			<?php echo $form->label($model,'payment_status'); ?>
			<?php echo $form->dropDownList($model,'payment_status',getParam('gateway_payment_status'),array('empty'=>'Select Payment Status','class' => 'form-control')); ?>
		</div>
		
	</div>
</div>
<div class="box-footer">
	<?php echo CHtml::submitButton('Search',array("class" => 'btn btn-info search-button')); ?>
	<a href="<?php echo base_url().'/admin/transactions/manage' ?>" class="btn btn-warning">Clear</a></div>
<?php $this->endWidget(); ?>