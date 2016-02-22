<section class="content-header">
    <h1>
        Manage
        <small>Users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . '/admin'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . '/admin/users'; ?>"><i class="fa fa-dashboard"></i> Users</a></li>
        <li class="active">Manage</li>
    </ol>
</section>
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Search</h3>
                </div>
                <?php
                Yii::app()->clientScript->registerScript('search', "
						$('form.search-form').submit(function(){
							$('#users-grid').yiiGridView('update', {
								data: $(this).serialize()
							});
							return false;
						});
						");
                $this->renderPartial('_search', array(
                    'model' => $model,
                ));
                ?>
            </div>
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="box-title">Users List</h3>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?php echo base_url() . '/admin/users/create'; ?>">
                                <button class="btn btn-block btn-primary">Add User</button>
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?php echo base_url() . '/admin/userCredit/create'; ?>">
                                <button class="btn btn-block btn-primary">Add Payment</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">

                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <?php
                                $this->widget('zii.widgets.grid.CGridView', array(
                                    'id' => 'users-grid',
                                    'itemsCssClass' => 'table table-bordered table-hover dataTable',
                                    'dataProvider' => $model->search(),
                                    'enablePagination' => false,
                                    // 'filter'=>$model,
                                    'columns' => array(
                                        'username',
                                        'first_name',
                                        'last_name',
                                        'mobile',
                                        array(
                                            'name' => '<a href="#">Balance</a>',
                                            //call the method 'gridDataColumn' from the controller
                                            'value' => array($this, 'gridDataColumn'),
                                        ),
                                        array
                                            (
                                            'class' => 'CButtonColumn',
                                            'template' => '{transaction}',
                                            'buttons' => array
                                                (
                                                'transaction' => array
                                                    (
                                                    'label' => 'View Transaction',
                                                    'url' => 'Yii::app()->createUrl("admin/users/transaction", array("id"=>$data->id))',
                                                ),
                                            ),
                                        ),
                                        array
                                            (
                                            'class' => 'CButtonColumn',
                                            'template' => '{transaction}',
                                            'buttons' => array
                                                (
                                                'transaction' => array
                                                    (
                                                    'label' => 'Change Password',
                                                    'url' => 'Yii::app()->createUrl("admin/users/changepassword", array("id"=>$data->id))',
                                                ),
                                            ),
                                        ),
                                        array(
                                            'class' => 'CButtonColumn',
                                        ),
                                    ),
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>