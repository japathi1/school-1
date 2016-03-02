<?php
$form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
    'htmlOptions' => array('class' => 'search-form')
        ));
?>
<div class="box-body">

    <div class="form-group">
        <div class="col-xs-3">
            <?php echo $form->label($model, 'class_id'); ?>
            <?php
            echo $form->dropDownList($model, 'class_id', $classes, array('empty' => 'Select Classes',
                'class' => 'form-control',
            ));
            ?>
        </div>
    </div>
</div>
<div class="box-footer">
    <?php echo CHtml::submitButton('Search', array("class" => 'btn btn-info search-button')); ?>
    <a href="<?php echo base_url() . '/school/feestructure/manage' ?>" class="btn btn-warning">Clear</a>
</div>
<?php $this->endWidget(); ?>