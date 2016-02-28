 <section class="content-header">
  <h1>
    Update
    <small>Student</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url().'/school'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url().'/school/students'; ?>"><i class="fa fa-dashboard"></i> Students</a></li>
    <li class="active">Update</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $model->firstname.' '.$model->middlename.' '.$model->lastname.'('.$model->roll_number.')'; ?></h3>
				</div>
				<?php $this->renderPartial('_form', array('model'=>$model,'classes' => $classes,'sections'=>$sections,'states'=>$states)); ?>
			</div>
		</div>
	</div>
</section>