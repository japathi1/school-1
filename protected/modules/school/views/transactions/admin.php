<section class="content-header">
    <h1>
        Manage
        <small>Transactions</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . '/admin'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . '/admin/transactions'; ?>"><i class="fa fa-dashboard"></i> Transactions</a></li>
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
							$('#transactions-grid').yiiGridView('update', {
								data: $(this).serialize()
							});
							return false;
						});
						");
                $this->renderPartial('_search', array(
                    'model' => $model,
                    'classes'=>$classes,
                ));
                ?>
            </div>
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="box-title">Transactions List</h3>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">

                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <?php
                                $this->widget('zii.widgets.grid.CGridView', array(
                                    'id' => 'transactions-grid',
                                    'itemsCssClass' => 'table table-bordered table-hover dataTable',
                                    'dataProvider' => $model->search(),
                                    'enablePagination' => true,
                                    // 'filter'=>$model,
                                    'columns' => array(
                                        array(
                                            'name' => 'student',
                                            'value' => array($this, 'studentName')
                                        ),
										array(
                                            'name' => 'class',
                                            'value' => array($this, 'className')
                                        ),
										array(
                                            'name' => 'section',
                                            'value' => array($this, 'sectionName')
                                        ),
										'receipt',
                                        'amount',
										'payment_status',
                                        array(
                                            'name' => 'month',
                                            'value' => array($this, 'monthName')
                                        ),
                                        'year',
                                        array(
                                            'class'=>'CButtonColumn',
                                            'template'=>'{v} {d}', // <-- TEMPLATE WITH THE TWO STATES
                                            'htmlOptions'=>array(
                                                    'width'=>80,
                                            ),
                                            'buttons' => array(
                                                'v'=>array(
                                                        'label'=>'<i class="fa fa-search"></i>',
                                                        'url'=>'Yii::app()->createUrl("school/transactions/view", array("id"=>$data->id))',
                                                        'options'=>array('class'=>'view','title'=>'View'),
                                                        // 'imageUrl'=>'images/icons/inactive.png',
                                                        // 'visible'=> '$data->active == 0', // <-- SHOW IF ROW INACTIVE
                                                ),
                                                'd'=>array(
                                                        'label'=>'<i class="fa fa-trash"></i>',
                                                        'url'=>'Yii::app()->createUrl("school/transactions/delete", array("id"=>$data->id))',
                                                        'options'=>array('class'=>'delete','title'=>'Delete'),
                                                        'click'=>'function(){return confirm("are you sure ?");}'
                                                        // 'imageUrl'=>'images/icons/printer.png',
                                                ),
                                            ),
                                        )
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