<section class="content-header">
    <h1>
        User
        <small>Detail</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . '/admin'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . '/admin/users'; ?>"><i class="fa fa-dashboard"></i> Users</a></li>
        <li><a href="<?php echo base_url() . '/admin/donation'; ?>"><i class="fa fa-dashboard"></i> Donation</a></li>
        <li class="active">Manage</li>
    </ol>
</section>
<section class="content">

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $user->first_name.' '.$user->last_name.'('.$user->username.')'; ?></h3>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div>
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>User</th>
                                        <td><?php echo $user->first_name.' '.$user->last_name; ?></th>
                                    </tr>
                                    <tr>
                                        <th>Available Funds</th>
                                        <td>$<?php echo $balance; ?></th>
                                    </tr>
                                    <tr>
                                        <th>Total Donated</th>
                                        <td>$<?php echo $debit; ?></th>
                                    </tr>
                                    <tr>
                                        <th>Total Credited</th>
                                        <td>$<?php echo $credit; ?></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Donations
                    </h3>
                    <div class="row">
                        <div class="col-xs-4" style="float:right;">
                            <a href="<?php echo base_url().'/admin/donation/create?user='.$user->id; ?>" class="btn btn-info" style="float:right;">Add Donation</a>
                        </div>    
                    </div>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <?php
                                $this->widget('zii.widgets.grid.CGridView', array(
                                    'id' => 'donation-grid',
                                    'itemsCssClass' => 'table table-bordered table-hover dataTable',
                                    'dataProvider' => $donations->users($user->id),
                                    'enablePagination' => true,
                                    'columns' => array(
                                        array(
                                              'name' => 'solicitor_id',
                                              'value' => array($this, 'gridSolicitor'),
                                          ),
                                        array(
                                              'name' => 'visit_id',
                                              'value' => array($this, 'gridVisit'),
                                          ),
                                        'amount',
                                        'date_entered',
                                        array
                                            (
                                            'class' => 'CButtonColumn',
                                            'template' => '{edit}',
                                            'buttons' => array
                                                (
                                                'edit' => array
                                                    (
                                                    'label' => 'EDIT',
                                                    'url' => 'Yii::app()->createUrl("admin/donation/update", array("id"=>$data->id))',
                                                ),
                                            ),
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
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Payments
                    </h3>
                    <div class="row">
                        <div class="col-xs-4" style="float:right;">
                            <a href="<?php echo base_url().'/admin/userCredit/create?user='.$user->id; ?>" class="btn btn-info" style="float:right;">Add Credits</a>
                        </div>    
                    </div>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <?php
                                $this->widget('zii.widgets.grid.CGridView', array(
                                    'id' => 'payments-grid',
                                    'itemsCssClass' => 'table table-bordered table-hover dataTable',
                                    'dataProvider' => $payments->users($user->id),
                                    'enablePagination' => true,
                                    'columns' => array(
                                        'amount',
                                        'mode',
                                        'date_entered',
                                        array
                                            (
                                            'class' => 'CButtonColumn',
                                            'template' => '{edit}',
                                            'buttons' => array
                                                (
                                                'edit' => array
                                                    (
                                                    'label' => 'EDIT',
                                                    'url' => 'Yii::app()->createUrl("admin/userCredit/update", array("id"=>$data->id))',
                                                ),
                                            ),
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
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Logins
                    </h3>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <?php
                                $this->widget('zii.widgets.grid.CGridView', array(
                                    'id' => 'logs-grid',
                                    'itemsCssClass' => 'table table-bordered table-hover dataTable',
                                    'dataProvider' => $logs->users($user->id),
                                    // 'enablePagination' => true,
                                    'columns' => array(
                                        'ip_address',
                                        'browser',
                                        'os',
                                        'platform',
                                        'user_agent',
                                        'date_entered',
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