<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'students-form',
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
            <?php echo $form->labelEx($model, 'firstname'); ?>
            <?php echo $form->textField($model, 'firstname', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'firstname'); ?>
        </div>
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'middlename'); ?>
            <?php echo $form->textField($model, 'middlename', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'middlename'); ?>
        </div>
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'lastname'); ?>
            <?php echo $form->textField($model, 'lastname', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'lastname'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'roll_number'); ?>
            <?php echo $form->textField($model, 'roll_number', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'roll_number'); ?>
        </div>
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'class'); ?>
            <?php
            echo $form->dropDownList($model, 'class', $classes, array('empty' => 'Select Classes',
                'class' => 'form-control',
                'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('sections'),
                    'update' => '#Students_section',
                    'data' => array('class' => 'js:this.value'),
            )));
            ?>
            <?php echo $form->error($model, 'class'); ?>
        </div>
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'section'); ?>
            <?php echo $form->dropDownList($model, 'section', [], array('empty' => 'Select Section', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'section'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'address_line_1'); ?>
            <?php echo $form->textField($model, 'address_line_1', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'address_line_1'); ?>
        </div>
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'address_line_2'); ?>
            <?php echo $form->textField($model, 'address_line_2', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'address_line_2'); ?>
        </div>
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'city'); ?>
            <?php echo $form->textField($model, 'city', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'city'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'state'); ?>
            <?php echo $form->dropDownList($model, 'state', $states, array('empty' => 'Select State', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'state'); ?>
        </div>
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'pin'); ?>
            <?php echo $form->textField($model, 'pin', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'pin'); ?>
        </div>
        <div class="col-xs-4">
            <?php echo $form->labelEx($model, 'emg_contact'); ?>
            <?php echo $form->textField($model, 'emg_contact', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'emg_contact'); ?>
        </div>
    </div>
</div>


<div class="box-footer">
    <?php echo CHtml::link('Back', array('/school/students'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => 'btn btn-info pull-right')); ?>
</div>

<?php $this->endWidget(); ?>


<?php
$action = Yii::app()->createUrl("school/students/feeoptions/", array("id" => $model->id));
?>
<?php
if (!empty($model->id)) {
    ?>
    <form action="<?php echo $action ?>"  method="POST" name="fee_structure_form" id="fee_structure_form"> 
        <div class="box-header with-border">
            <h3 class="box-title">Fee Options</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <?php
                foreach ($fee_structure as $fee) {
                    ?>
                    <div class="col-xs-4">
                        <label><?php echo $fee->fee_label->fee_label; ?></label>
                        <input type="checkbox" <?php echo (in_array($fee->id, $fee_options_arr) ? "checked" : ''); ?>  name="fee_options[]" value="<?php echo $fee->id ?>" >
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="box-footer">
            <?php echo CHtml::link('Back', array('/school/students'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => 'btn btn-info pull-right')); ?>
        </div>
    </form>


<?php
$action = Yii::app()->createUrl("school/students/extrafee/", array("id" => $model->id));
?>
<form action="<?php echo $action ?>"  method="POST" name="extra_fee_form" id="extra_fee_form"> 
    <div class="box-header with-border">
        <h3 class="box-title">Extra Fee</h3>
    </div>
    <?php   
    if(!empty($model->extra_fee))
    {    
    foreach($model->extra_fee as $fee)
    {
    ?>
     <div class="box-body">
        <div class="form-group">
            <div class="col-xs-4">
                <label><?php echo $fee->label  ?> </label>
            </div>
            <div class="col-xs-4">
               <label><?php echo $fee->amount  ?> </label>
            </div>
            <div class="col-xs-4">
                <a id="<?php echo $fee->id  ?>" class="remove_extra_fee" href="javascript:void(0)">Remove</a>
            </div>
        </div>
    </div>
    <?php  } 
    }
    ?>
    <div class="box-body">
        <div class="form-group">
            <div class="col-xs-4">
                <label>Label</label>
                <input type="text" name="extra_label[]" class="form-control" >
            </div>
            <div class="col-xs-4">
               <label>Amount</label>
               <input type="text" name="extra_amount[]" class="form-control" >
            </div>
        </div>
    </div>
    <div class="box-body" id="add_more_div">
         <a id="add_more" href="javascript:void()">Add More</a>
    </div>    
    <div class="box-footer">
        <?php echo CHtml::link('Back', array('/school/students'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => 'btn btn-info pull-right')); ?>
    </div>
</form>

    <?php
}
?>

<script>
        $(document).ready(function() {
            $("#add_more").click(function() {
                $("#add_more_div").before('<div class="box-body"><div class="form-group"><div class="col-xs-4"><label>Label</label><input type="text" name="extra_label[]" class="form-control" ></div><div class="col-xs-4"><label>Amount</label><input type="text" name="extra_amount[]" class="form-control" ></div><div class="col-xs-4"><a class="remove_div" href="javascript:void(0)">Remove</a></div></div></div>');
            });
            $("body").on("click", ".remove_div", function() {
                $(this).closest("div .box-body").remove();
            });

            $(".remove_extra_fee").click(function() {
                var id = $(this).attr('id');
                var ele = $(this);
                $.ajax({
                    method: "POST",
                    url: '<?php echo base_url();?>/school/students/removefee',
                    data: {'id':id},
                    success: function(data) {
                       ele.closest("div .box-body").remove();
                    }
                });
            });

        });
    </script>



