 <section class="content-header">
  <h1>
    Bulk Upload
    <small>Students</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url().'/school'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Bulk Upload</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Bulk Upload Class Wise</h3>
				</div>
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'bulkupload-form',
					'enableAjaxValidation'=>false,
					'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				)); ?>
				<div class="box-body">
					<div class="form-group">
						<div class="col-xs-6">
				            <?php echo $form->labelEx($model, 'class'); ?>
				            <?php
				            echo $form->dropDownList($model, 'class', $classes, array('empty' => 'Select Classes',
				                'class' => 'form-control',
				                'ajax' => array(
				                    'type' => 'POST',
				                    'url' => CController::createUrl('sections'),
				                    'update' => '#BulkUpload_section',
				                    'data' => array('class' => 'js:this.value'),
				            )));
				            ?>
				            <?php echo $form->error($model, 'class'); ?>
				        </div>
				        <div class="col-xs-6">
				            <?php echo $form->labelEx($model, 'section'); ?>
				            <?php echo $form->dropDownList($model, 'section', [], array('empty' => 'Select Section', 'class' => 'form-control')); ?>
				            <?php echo $form->error($model, 'section'); ?>
				        </div>
					</div>
					<div class="form-group">
						<div class="col-xs-6">
							<?php echo $form->labelEx($model,'excelFile'); ?>
							<?php echo $form->fileField($model,'excelFile',array('class' => 'form-control')); ?>
							<p><b>Note: </b>Upload Only <b>xls file of excel not xlsx.</b></p>
							<?php echo $form->error($model,'excelFile'); ?>
						</div>
						<div class="col-xs-6">
						</div>
					</div>
				</div>
				<div class="box-footer">
				    <?php echo CHtml::link('Students List',array('/school/students'),array("class" => 'btn btn-info pull-right',"style"=>"margin-left:10px;")); ?>
				    <?php echo CHtml::submitButton('Upload',array("class" => 'btn btn-info pull-right')); ?>
				</div>

				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</section>