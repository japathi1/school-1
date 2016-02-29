<section class="content-header">
    <h1>
        Sections
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . '/school'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . '/school/sections'; ?>"><i class="fa fa-dashboard"></i> Sections</a></li>
        <li class="active">View</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                    	<?php echo $model->section; ?> 
                    		<small>
                    			<a href="<?php echo base_url() . '/school/section/update?id=' . $model->id; ?>">EDIT</a>
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
                                array(
                                        'label'=>'Class',
                                        'type'=>'raw',
                                        'value'=>Classes::model()->findByPk($model->class)->class,
                                    ),
                                'section'
                            ),
                        ));
                        ?>
                        <div class="col-xs-12">
                             <?php echo CHtml::link('Back', array('/school/sections'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>