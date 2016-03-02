<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'fee-structure-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>
<div class="box-body">
    <div class="form-group">
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'class_id'); ?>
            <?php echo $form->dropDownList($model, 'class_id', $classes, array('empty' => 'Select Classes', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'class_id'); ?>
        </div>
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'fee_label_id'); ?>
            <?php echo $form->dropDownList($model, 'fee_label_id', $fee_labels, array('empty' => 'Select Fee Label', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'fee_label_id'); ?>
        </div>
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'amount'); ?>
            <?php echo $form->textField($model, 'amount', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'amount'); ?>
        </div>
    </div>

</div>


<div class="box-footer">
    <?php echo CHtml::link('Back', array('/school/feestructure'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => 'btn btn-info pull-right')); ?>
</div>

<?php $this->endWidget(); ?>