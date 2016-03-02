 <section class="content-header">
  <h1>
    Update
    <small>Fee Structure</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url().'/school'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url().'/school/feestructure'; ?>"><i class="fa fa-dashboard"></i> Fee Structure</a></li>
    <li class="active">Update</li>
  </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<?php $this->renderPartial('_form', array('model'=>$model,'classes'=>$classes,'fee_labels'=>$fee_labels)); ?>
			</div>
		</div>
	</div>
</section>