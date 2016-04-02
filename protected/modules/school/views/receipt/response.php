<div id="container">
      <div class="left-stripes">
        <div class="circle c-upper"></div>
        <div class="circle c-lower"></div>
      </div>

      <div class="right-invoice">
        <section id="response">
        	<?php if($status == "SUCCESS"): ?>
        	<div class="success">
        		<div class="success_img"></div>
        		<div class="response">
        			Your Payment is successful Your transaction id is 
        			<b><?php echo $response['transactionId']; ?></b>
        		</div>
        	</div>
        	<?php else: ?>
        	<div class="failed">
        		<div class="failed_img"></div>
        		<div class="response">Your Payment has been failed.</div>
        	</div>
        	<?php endif; ?>
        </section>
        <section id="memo">
          <div class="company-info">
            <div class="ibcl_company_name"><?php echo $school_model->name; ?></div>
            <br>
            <span class="ibcl_company_address"><?php echo $school_model->address_line_1; ?></span>
            <?php if(!empty($school_model->address_line_2)): ?>
            <span class="ibcl_company_city_zip_state"><?php echo $school_model->address_line_2; ?></span>
            <br>
            <?php endif; ?>
            <span class="ibcl_company_city_zip_state"><?php echo $school_model->city; ?> <?php echo States::model()->findByPk($school_model->state)->state; ?></span>
            <br>
            <span class="ibcl_company_phone_fax">Phone: <?php echo $school_model->contact; ?></span>
        </div>

          <div class="logo">
            <img src="<?php echo base_url(); ?>/assets/school-logo/<?php echo $school_model->school_logo; ?>" width="200" height="200" />
          </div>
        </section>

        <section id="invoice-title-number">
          <div class="title-top">
            <span class="ibcl_issue_date_label">Receipt - <?php echo $tran_model->receipt; ?></span>
            <br/>
            <span class="ibcl_issue_date">Fee For Month - 
            <?php
                $time=strtotime($tran_model->date_entered);
                echo $month =  date("F",$time);
                
            ?>
            </span> 
          </div>
        
          <div class="ibcl_invoice_title">INVOICE</div>
          
        </section>

        <section id="client-info">
          <span class="ibcl_bill_to_label">Student Details</span>
          <div class="client-name">
            <span class="ibcl_client_name">
                <?php echo $student_model->firstname.' '.$student_model->middlename.' '.$student_model->lastname; ?>
            </span>
          </div>
          <div>
            <span class="ibcl_client_address">Roll Number: <?php echo $student_model->roll_number; ?></span>
          </div>
          
          <div>
            <span class="ibcl_client_city_zip_state">Class: <?php echo $class_model->class; ?> <?php echo $section_model->section; ?></span>
          </div>
          
        </section>
        
        <div class="clearfix"></div>
        
        <div class="currency">
          <span class="ibcl_currency_label">* All prices are in </span>
          <span class="ibcl_currency">Rs.</span>
        </div>
        
        <section id="items">
          
          <table cellpadding="0" cellspacing="0">
          
            <tbody><tr>
              <th class="ibcl_item_row_number_label"></th> <!-- Dummy cell for the row number and row commands -->
              <th class="ibcl_item_description_label">Fee Details</th>
              <th class="ibcl_item_description_label">Amount</th>
            </tr>
            <?php
                $i = 1;
                $total = 0;
                foreach ($fee_detail as $key => $value) {

                    ?>    
                    <tr data-iterate="item">
                      <td style="position: relative;" class="ibcl_item_row_number">
                        <?php echo $i; ?>
                      </td>
                      <td class="ibcl_item_description"><?php echo $key; ?></td>
                      <td class="ibcl_item_quantity"><?php echo $value; ?></td>
                    </tr>
                    <?php
                    $total = $total + $value;
                    $i++;
                }
            ?>
          </tbody></table>
          
        </section>
        
        <section id="sums">
        
          <table cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
              <th class="ibcl_amount_subtotal_label">Total</th>
              <td class="ibcl_amount_subtotal">Rs. <?php echo $total; ?></td>
            </tr>
            <!--
            <tr style="display: table-row;">
              <th class="ibcl_tax_name">Tax 1</th>
              <td class="ibcl_tax_value">$4.80</td>
            </tr>
            -->
            <?php if($status != "SUCCESS"): ?>
            <tr class="amount-total">
            <?php
	            $access_key = "97d9c40647e78f2d66042e5a2222691a";
	  			$secret_key = "1d8d438cc68d4a7b72985b298402caa12d9f21ea";
				$trackid = $tran_model->receipt;
				$amount = $total; 
				$data = "merchantKey=" . $access_key
	                        . "&trackId=". $trackid;
				$signature = hash_hmac('sha1', $data, $secret_key);
        	?>
              <td class="ibcl_amount_total" colspan="2">
                <form action=" https://sandboxpay.cirklepay.com/Pay/Proceed " method="POST" /> 

                  <input type="hidden" name="merchantKey" value="97d9c40647e78f2d66042e5a2222691a" /> 

                  <input type="hidden" name="signature" value="<?php echo $signature; ?>" /> 

                  <input type="hidden" name="trackId" value="<?php echo $trackid; ?>" /> 

                  <input type="hidden" name="returnUrl" value="<?php echo domainUrl().'/school/receipt/success'; ?>" /> 

                  <input type="hidden" name="notifyUrl" value="<?php echo domainUrl().'/school/receipt/notify'; ?>" /> 

                  <input type="hidden" name="amount" value="<?php echo $total; ?>" class="form-control"  /> 

                  <input type="submit" class="ibcl_amount_total" name="payWithCirkle" value="Pay" id="payWithCirkle" />

                </form>
              </td>
            </tr>
            <?php endif; ?>
          </tbody>
          </table>
          
        </section>
        
        <div class="clearfix"></div>
        
        <section id="terms">
        
          <span class="ibcl_terms_label">Terms</span>
          <div class="ibcl_terms">Fred, thank you very much. We really appreciate your business.<br>Please send payments before the due date.</div>
          
        </section>
      </div>
    </div>