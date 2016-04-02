<section class="content-header">
    <h1>
        Transaction
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . '/school'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . '/school/transactions'; ?>"><i class="fa fa-dashboard"></i> Transactions</a></li>
        <li class="active">View</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                    	<?php
                    		$s = Students::model()->findByPk($model->student);
                        	echo $name = $s->firstname.' '.$s->middlename.' '.$s->lastname.'-(Roll: '.$s->roll_number.')'; 
                        ?> 
                		<small>
                			<a href="<?php echo base_url() . '/school/transactions/update?id=' . $model->id; ?>">EDIT</a>
                		</small>
                    </h3>
                    <a class="btn-warning" href="<?php echo base_url() . '/school/transactions/sendsms?id=' . $model->id; ?>">SEND SMS</a>
                </div>
                <div class="box-body">
                    <div class="col-xs-12 table-responsive">
                        <?php
                        $t = getParam('months');
                        $this->widget('zii.widgets.CDetailView', array(
                            // 'itemsCssClass' => 'table table-bordered table-hover dataTable',
                            'htmlOptions' => array("class" => "table table-bordered table-hover dataTable"),
                            'data' => $model,
                            'attributes' => array(
                            	'receipt',
                                array(
                                        'label'=>'Student',
                                        'type'=>'raw',
                                        'value'=> $name,
                                    ),
                                array(
                                        'label'=>'Class',
                                        'type'=>'raw',
                                        'value'=>Classes::model()->findByPk($model->class)->class,
                                    ),
                                array(
                                        'label'=>'Section',
                                        'type'=>'raw',
                                        'value'=>Sections::model()->findByPk($model->section)->section
                                    ),
								'transaction_id',
								'amount',
								'payment_status',
								'month',
								array(
                                        'label'=>'Month',
                                        'type'=>'raw',
                                        'value'=>$t[$model->month]
                                    ),
								'year',
				            ),
                        ));
                        ?>
                    </div>

                </div>
            </div>

                        
            <div class="box box-info">
            	<div class="box-header with-border">
            		<?php if(!empty($model->transaction_details)): ?>
                    	<h3 class="box-title">Payment Gateway Response</h3>
                    <?php endif; ?>
            	</div>
            	<div class="box-body">
            		<div class="col-xs-12 table-responsive">
            			<?php if(!empty($model->transaction_details)): ?>
                        	<?php 
                        		$trans = unserialize($model->transaction_details);
                        	?>
                        	<table class="table table-bordered table-hover dataTable">
                        		<tbody>
                        			<tr>
                        				<th>Transaction Status</th>
                        				<th>Transaction ID</th>
                        				<th>Merchant Name</th>
                        				<th>Coupon</th>
                        				<th>Coupon Discount</th>
                        				<th>Net Amount</th>
                        				<th>Amount Charged</th>
                        			</tr>
                        			<tr>
                        				<td><?php echo $trans['status']  ?></td>	
                        				<td><?php echo $trans['transactionId']  ?></td>
                        				<td><?php echo $trans['merchantName']  ?></td>
                        				<td><?php echo $trans['couponCode']  ?></td>
                        				<td><?php echo $trans['couponDiscount']  ?></td>
                        				<td><?php echo $trans['netAmount']  ?></td>
                        				<td><?php echo $trans['amount']  ?></td>
                        			</tr>
                        			
                        		</tbody>
                        	</table>
                        <?php endif; ?>
            			<div class="col-xs-12">
                             <?php echo CHtml::link('Back', array('/school/transactions'), array("class" => 'btn btn-info pull-right', "style" => "margin-left:10px;")); ?>
                        </div>
            		</div>
            	</div>
            </div>



        </div>
    </div>
</section>