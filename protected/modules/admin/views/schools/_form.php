<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/themes/admin/dist/css/mdp/mdp.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/themes/admin/dist/css/mdp/prettify.css">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'schools-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        ));
?>
<div class="box-body">
    <div class="form-group">
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'name'); ?>
<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 512, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'school_logo'); ?>
<?php echo $form->fileField($model, 'school_logo', array('size' => 60, 'maxlength' => 512, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'school_logo'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'payment_api_key'); ?>
<?php echo $form->textField($model, 'payment_api_key', array('size' => 60, 'maxlength' => 512, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'payment_api_key'); ?>
        </div>
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'payment_secret_key'); ?>
<?php echo $form->textField($model, 'payment_secret_key', array('size' => 60, 'maxlength' => 512, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'payment_secret_key'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'sms_api_key'); ?>
            <?php echo $form->textField($model, 'sms_api_key', array('size' => 60, 'maxlength' => 512, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'sms_api_key'); ?>
        </div>
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'sms_count'); ?>
            <?php echo $form->textField($model, 'sms_count', array('size' => 60, 'maxlength' => 512, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'sms_count'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12">
            <?php echo $form->labelEx($model, 'sms_dates'); ?>
            <?php echo $form->textField($model, 'sms_dates', array('size' => 60, 'maxlength' => 512, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'sms_dates'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'address_line_1'); ?>
<?php echo $form->textField($model, 'address_line_1', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'address_line_1'); ?>
        </div>
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'address_line_2'); ?>
<?php echo $form->textField($model, 'address_line_2', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'address_line_2'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'city'); ?>
<?php echo $form->textField($model, 'city', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'city'); ?>
        </div>
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'state'); ?>
<?php echo $form->dropDownList($model, 'state', $states, array('empty' => 'Select State', 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'state'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'pin'); ?>
<?php echo $form->textField($model, 'pin', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'pin'); ?>
        </div>
        <div class="col-xs-6">
            <?php echo $form->labelEx($model, 'contact'); ?>
<?php echo $form->textField($model, 'contact', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'contact'); ?>
        </div>
    </div>

</div>
<div class="box-footer">
<?php echo CHtml::link('Back', array('/admin/schools'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => 'btn btn-info pull-right')); ?>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>/themes/admin/dist/js/jquery-ui-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/themes/admin/dist/js/jquery-ui.multidatespicker.js"></script>
<script>
    var selectedDates = "<?php echo $model->sms_dates; ?>";
    if(selectedDates.length > 0){
        var d = selectedDates.split(",");
        var dates = [];
        $.each(d, function(k,v){
            dates.push($.trim(v));
        });
        $('#Schools_sms_dates').multiDatesPicker({
            addDates: dates,
            numberOfMonths: [1,4],
        });    
    } else {
        $('#Schools_sms_dates').multiDatesPicker({
            numberOfMonths: [1,4],
        });
    }
    
</script>