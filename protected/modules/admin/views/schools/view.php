<section class="content-header">
    <h1>
        Schools
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . '/admin'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . '/admin/schools'; ?>"><i class="fa fa-dashboard"></i> Schools</a></li>
        <li class="active">View</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                    	<?php echo $model->name; ?> 
                    		<small>
                    			<a href="<?php echo base_url() . '/admin/schools/update?id=' . $model->id; ?>">EDIT</a>
                    		</small>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="col-xs-12 table-responsive">
                        <?php
                        $this->widget('zii.widgets.CDetailView', array(
                            // 'itemsCssClass' => 'table table-bordered table-hover dataTable',
                            'htmlOptions' => array("class" => "table table-bordered table-hover dataTable"),
                            'data' => $model,
                            'attributes' => array(
                                'name',
								'address_line_1',
								'address_line_2',
								'city',
								'state',
								'pin',
								'contact',
                            ),
                        ));
                        ?>
                        <div class="col-xs-12">
                             <?php echo CHtml::link('Back', array('/admin/schools'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>