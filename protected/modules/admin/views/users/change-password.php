<section class="content-header">
  <h1>
    Change
    <small>Password</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url().'/admin'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url().'/admin/users'; ?>"><i class="fa fa-dashboard"></i> Users</a></li>
    <li class="active">Change Password</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $user->first_name.' '.$user->last_name; ?></h3>
				</div>
				<?php 
					$form=$this->beginWidget('CActiveForm', array(
						'id'=>'change-password',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// There is a call to performAjaxValidation() commented in generated controller code.
						// See class documentation of CActiveForm for details on this.
						'enableAjaxValidation'=>false,
						)); 
				?>
				<div class="box-body">
					<div class="form-group">
						<div class="col-xs-6">
							<?php echo $form->labelEx($model,'password'); ?>
							<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
							<?php echo $form->error($model,'password'); ?>
						</div>
						<div class="col-xs-6">
							<?php echo $form->labelEx($model,'repassword'); ?>
							<?php echo $form->passwordField($model,'repassword',array('size'=>60,'maxlength'=>255,'class' => 'form-control')); ?>
							<?php echo $form->error($model,'repassword'); ?>
						</div>
					</div>
				</div>
				<div class="box-footer">
				    <?php echo CHtml::link('Back',array('/admin/users'),array("class" => 'btn btn-info pull-right',"style"=>"margin-left:10px;")); ?>
				    <?php echo CHtml::submitButton('Change Password',array("class" => 'btn btn-info pull-right')); ?>
				</div>

				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</section>