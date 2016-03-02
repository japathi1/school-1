<section class="content-header">
    <h1>
        Users
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . '/school'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . '/school/users'; ?>"><i class="fa fa-dashboard"></i> Users</a></li>
        <li class="active">View</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $model->firstname . ' ' . $model->lastname; ?> <small><a href="<?php echo base_url() . '/school/users/update?id=' . $model->id; ?>">EDIT</a></small></h3>
                </div>
                <div class="box-body">
                    <div class="col-xs-12 table-responsive">
                        <?php
                        $this->widget('zii.widgets.CDetailView', array(
                            // 'itemsCssClass' => 'table table-bordered table-hover dataTable',
                            'htmlOptions' => array("class" => "table table-bordered table-hover dataTable"),
                            'data' => $model,
                            'attributes' => array(
                                'username',
                                array(
                                    'name' => 'role',
                                    'value' => Roles::model()->findByPk($model->role)->role
                                ),
                                'firstname',
                                'lastname',
                                'email',
                                'mobile'
                            ),
                        ));
                        ?>
                        <div class="col-xs-12">
                             <?php echo CHtml::link('Back', array('/school/users'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>