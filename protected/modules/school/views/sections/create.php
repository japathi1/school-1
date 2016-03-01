 <section class="content-header">
  <h1>
    Add
    <small>Section</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url().'/school'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url().'/school/sections'; ?>"><i class="fa fa-dashboard"></i> Sections</a></li>
    <li class="active">Add</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Section</h3>
				</div>
				<?php $this->renderPartial('_form', array('model'=>$model,'classes' => $classes)); ?>
			</div>
		</div>
	</div>
</section>