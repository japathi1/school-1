<div id="container">
      <div class="left-stripes">
        <div class="circle c-upper"></div>
        <div class="circle c-lower"></div>
      </div>

      <div class="right-invoice">
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
            <tr class="amount-total">
              <td class="ibcl_amount_total" colspan="2">
                <button class="ibcl_amount_total">Pay Now</button>
              </td>
            </tr>
            
            <!--<tr>
              <td class="ibcl_amount_total" colspan="2"><button class="ibcl_pay_invoice">Pay Now</button></td>
            </tr>-->
          </tbody></table>
          <?php
          //Need to change with your Access Key
            $access_key = "4552853632807c30f335615c0fa1953c";

            //Need to change with your Secret Key
            $secret_key = "e5f6519354cea4d0c18967e70e8b7d1e7e77caa1";

            //Should be unique for every transaction
            $trackid = $tran_model->receipt;

            //Need to change with your Order Amount
            $amount = $total; 

            //Need to change with your Return URL
            $returnURL = domainUrl()."/school/response";

            //Need to change with your Notify URL
            $notifyUrl = domainUrl()."/school/notify";

            $data = "merchantAccessKey=" . $access_key
                        . "&transactionId="  . $trackid 
                        . "&amount="         . $amount;

            $signature = hash_hmac('sha1', $data, $secret_key);
            echo $signature;

          ?>
        </section>
        
        <div class="clearfix"></div>
        
        <section id="terms">
        
          <span class="ibcl_terms_label">Terms</span>
          <div class="ibcl_terms">Fred, thank you very much. We really appreciate your business.<br>Please send payments before the due date.</div>
          
        </section>
      </div>
    </div>