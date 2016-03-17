<section class="content-header">
    <h1>
        Invoice
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . '/school'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . '/school/students'; ?>"><i class="fa fa-dashboard"></i> Fee Label</a></li>
        <li class="active">View</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <?php //echo $tran_model->fee_label; ?> 
                        <small>
                            Receipt
                        </small>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="col-xs-12 table-responsive">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                Receipt Number
                            </div>
                            <div class="col-xs-6">
                                <?php echo $tran_model->receipt ?>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                Student Name
                            </div>
                            <div class="col-xs-6">
                                <?php echo $student_model->firstname . " " . $student_model->middlename . " " . $student_model->lastname ?>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            School Name
                        </div>
                        <div class="col-xs-6">
                            <?php echo $school_model->name; ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            Class 
                        </div>
                        <div class="col-xs-6">
                            <?php echo $class_model->class; ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            Section 
                        </div>
                        <div class="col-xs-6">
                            <?php echo $section_model->section; ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            Fee Detail : 
                        </div>

                    </div>
                    <?php
                    foreach ($fee_detail as $key => $value) {
                        ?>    
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <?php echo $key; ?>
                            </div>
                            <div class="col-xs-6">
                                Rs <?php echo $value; ?>
                            </div>
                        </div>

                        <?php
                    }
                    ?>




                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            Total Amount  
                        </div>
                        <div class="col-xs-6">
                            <?php echo "Rs " . $tran_model->amount; ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <?php echo CHtml::link('Back', array('/school/feelabel'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</section>