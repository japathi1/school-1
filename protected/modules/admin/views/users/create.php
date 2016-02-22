<section class="content-header">
  <h1>
    Add
    <small>User</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url().'/admin'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url().'/admin/users'; ?>"><i class="fa fa-dashboard"></i> Users</a></li>
    <li class="active">Add</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">User</h3>
				</div>
				<?php $this->renderPartial('_form', array('model'=>$model,'schools'=>$schools,
			'roles'=>$roles)); ?>
			</div>
		</div>
	</div>
</section>