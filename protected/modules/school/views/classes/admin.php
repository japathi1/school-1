<section class="content-header">
    <h1>
        Manage
        <small>Classes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . '/school'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . '/school/classes'; ?>"><i class="fa fa-dashboard"></i> Classes</a></li>
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
							$('#schools-grid').yiiGridView('update', {
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
                            <h3 class="box-title">Classes List</h3>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo base_url() . '/school/classes/create'; ?>">
                                <button class="btn btn-block btn-primary">Add Class</button>
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
                                    'id' => 'schools-grid',
                                    'itemsCssClass' => 'table table-bordered table-hover dataTable',
                                    'dataProvider' => $model->search(),
                                    'enablePagination' => true,
                                    // 'filter'=>$model,
                                    'columns' => array(
                                        'class',
                                        array(
                                            'class'=>'CButtonColumn',
                                            'template'=>'{v} {u} {d}', // <-- TEMPLATE WITH THE TWO STATES
                                            'htmlOptions'=>array(
                                                    'width'=>80,
                                            ),
                                            'buttons' => array(
                                                'v'=>array(
                                                        'label'=>'<i class="fa fa-search"></i>',
                                                        'url'=>'Yii::app()->createUrl("school/classes/view", array("id"=>$data->id))',
                                                        // 'imageUrl'=>'images/icons/inactive.png',
                                                        // 'visible'=> '$data->active == 0', // <-- SHOW IF ROW INACTIVE
                                                ),
                                                'u'=>array(
                                                        'label'=>'<i class="fa fa-edit"></i>',
                                                        'url'=>'Yii::app()->createUrl("school/classes/update", array("id"=>$data->id))',
                                                        // 'imageUrl'=>'images/icons/active.png',
                                                        // 'visible'=> '$data->active == 1', // <-- SHOW IF ROW ACTIVE
                                                ),
                                                'd'=>array(
                                                        'label'=>'<i class="fa fa-trash"></i>',
                                                        'url'=>'Yii::app()->createUrl("school/classes/delete", array("id"=>$data->id))',
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