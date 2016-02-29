<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'fee-label-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>
<div class="box-body">
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="form-group">
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'fee_label'); ?>
            <?php echo $form->textField($model, 'fee_label', array('size' => 60, 'maxlength' => 256)); ?>
            <?php echo $form->error($model, 'fee_label'); ?>
        </div>

    </div>

</div>


<div class="box-footer">
    <?php echo CHtml::link('Back', array('/school/feelabel'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => 'btn btn-info pull-right')); ?>
</div>

<?php $this->endWidget(); ?>