<section class="content-header">
    <h1>
        Sections
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . '/school'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . '/school/parents'; ?>"><i class="fa fa-dashboard"></i> Parents</a></li>
        <li class="active">View</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                    	<?php echo $model->firstname.' '.$model->lastname; ?> 
                    		<small>
                    			<a href="<?php echo base_url() . '/school/parents/update?id=' . $model->id; ?>">EDIT</a>
                    		</small>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="col-xs-12 table-responsive">
                        <?php
                        $s = Students::model()->findByPk($model->child);
                        $name = $s->firstname.' '.$s->middlename.' '.$s->lastname.'-('.$s->roll_number.')';
                        $t = getParam('parent_type');
                        $this->widget('zii.widgets.CDetailView', array(
                            // 'itemsCssClass' => 'table table-bordered table-hover dataTable',
                            'htmlOptions' => array("class" => "table table-bordered table-hover dataTable"),
                            'data' => $model,
                            'attributes' => array(
                                array(
                                        'label'=>'Student',
                                        'type'=>'raw',
                                        'value'=> $name,
                                    ),
                                'firstname',
								'lastname',
								array(
                                        'label'=>'Parent Type',
                                        'type'=>'raw',
                                        'value'=>$t[$model->parent_type],
                                    ),
								'email',
								'contact',
								'address_line_1',
								'address_line_2',
								'city',
								array(
                                        'label'=>'State',
                                        'type'=>'raw',
                                        'value'=>States::model()->findByPk($model->state)->state,
                                    ),
								'pincode',
                            ),
                        ));
                        ?>
                        <div class="col-xs-12">
                             <?php echo CHtml::link('Back', array('/school/parents'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>