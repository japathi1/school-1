 <section class="content-header">
  <h1>
    Update
    <small>Parent</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url().'/school'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url().'/school/parents'; ?>"><i class="fa fa-dashboard"></i> Parents</a></li>
    <li class="active">Update</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $model->firstname.' '. $model->lastname; ?></h3>
				</div>
				<?php $this->renderPartial('_form', array('model'=>$model,'childs' => $childs,'states' => $states)); ?>
			</div>
		</div>
	</div>
</section>