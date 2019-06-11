<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style>
    .alert>p{display: inline-block;}
    .panel-heading .dropdown-menu-right{display:none !important;}
    .wysihtml5-toolbar li:nth-child(5){display:none !important;}
    .wysihtml5-toolbar li:last-child{display:none !important;}
    input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="header-title">
        <h1>Loan</h1>
        <small>Manage Loan</small>
        </div>
    </section>
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonlist">
                     <h4>
                    <?php
                    if($this->uri->segment(4))
                       {
                        echo "Edit Loan";
                       }
                    else
                       {
                        echo "Add Loan";
                       }
                    ?>
                    </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>admin/loan/add_loan" enctype="multipart/form-data">
                    <?= msg();?>
                <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
              <label>Choose a customer(एक ग्राहक चुनें)<span style="color:red;">*</span></label>
                  <select data-placeholder="Search email" name="user_id"  class="form-control input-sm m-bot15 chosen-select">
                  <option value="">Select Customer</option>
                            <?php
                             $user=$this->admin->getRows('SELECT * FROM user WHERE status = 1');
                            if(!empty($user))
                            {
                           foreach ($user as $useri)
                              { 
                              ?>
                           <option <?php if($form_data['user_id']){if($form_data['user_id']==$useri->is){echo "selected";}}elseif(!empty($selectall)){ if($selectall->user_id==$useri->id){ echo " selected";}  }  ?> value="<?php echo $useri->id; ?>"><?php echo ucfirst($useri->fname.' '.$useri->lname.' '.$useri->id); ?></option>
                            <?php
                              }
                            }
                            ?>      
                                                    
                                           
                      </select>         
                </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
                <label>Amount(राशि)<span style="color:red;">*</span></label>
                <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                <input type="text" id="Amount"  onchange="txtAmountChanged()" class="form-control"  name="amount" id="amount" placeholder="Enter amount"  value="<?php if(!empty($selectall)){ echo $selectall->amount;}elseif($form_data){ echo $form_data['amount'];}?>"  required>
                </div>
      </div>
      </div>

       <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
                 <label>Loan type(ऋण प्रकार)<span style="color:red;">*</span></label>
                <select class="form-control" name="loan_type" id="IDLoanType" onchange="drbLoanTypeChanged()" >
                
                <option <?php if($form_data['loan_type']){if($form_data['loan_type']==1){echo "selected";}}elseif(!empty($selectall)){ if($selectall->loan_type==1){ echo " selected";}  }  ?> value="1">Short Term - 55 - (10.00%)</option>
                <option <?php if($form_data['loan_type']){if($form_data['loan_type']==2){echo "selected";}}elseif(!empty($selectall)){ if($selectall->loan_type==2){ echo " selected";}  }  ?> value="2">Long Term - 100 - (20.00%)</option>
                 <option <?php if($form_data['loan_type']){if($form_data['loan_type']==3){echo "selected";}}elseif(!empty($selectall)){ if($selectall->loan_type==3){ echo " selected";}  }  ?> value="3">Long Term - 120 - (20.00%)</option>
                <option <?php if($form_data['loan_type']){if($form_data['loan_type']==4){echo "selected";}}elseif(!empty($selectall)){ if($selectall->loan_type==4){ echo " selected";}  }  ?> value="4">Long Term - 200 - (20.00%)</option>
                </select>
                </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
                <label>Period(अवधि)<span style="color:red;">*</span> </label>
                         <input type="text"  class="form-control" id="Tenor" name="period" placeholder="Enter Created By"  value="<?php if(!empty($selectall)){ echo $selectall->period;}elseif($form_data){ echo $form_data['period'];}?>"  required>
                </div>
      </div>
      </div>
       <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
                <label>Rate of interest(ब्याज की दर) <span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="rateof_interest" id="InterestRate" placeholder="Enter Created By"  value="<?php if(!empty($selectall)){ echo $selectall->rateof_interest;}elseif($form_data){ echo $form_data['rateof_interest'];}?>"  required>
                </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
                   <label>Interest amount(ब्याज राशि )<span style="color:red;">*</span></label>
                    <input type="text"  class="form-control"  name="Interest_amount" id="InterestAmount"  placeholder="Enter Interest amount"  value="<?php if(!empty($selectall)){ echo $selectall->Interest_amount;}elseif($form_data){ echo $form_data['Interest_amount'];}?>"  required>
              
                </div>
      </div>
      </div>
       <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
          <label>Total value(कुल मूल्य)<span style="color:red;">*</span> </label>
                    <input type="text"  class="form-control"  name="total_amount"  id="TotalValue"  placeholder="Enter Total value"  value="<?php if(!empty($selectall)){ echo $selectall->total_amount;}elseif($form_data){ echo $form_data['total_amount'];}?>"  required>
              
                </div>
        </div>
        <div class="col-sm-6">
              <label>Monthly Reputation(मासिक प्रतिष्ठा) <span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="monthly_reputation" id="MonthlyRepayment"  placeholder="Enter Monthly Reputation"  value="<?php if(!empty($selectall)){ echo $selectall->monthly_reputation;}elseif($form_data){ echo $form_data['monthly_reputation'];}?>"  required>   
      </div>
      </div>
                <div class="reset-button">
                     <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                     <a href="<?php echo base_url(); ?>admin/loan"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>

<!-- include the css and sprite -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
<link rel="image_src" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen-sprite.png">

<!-- include angular -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
<script>
jQuery(document).ready(function(){
  jQuery(".chosen").chosen();
});
  
</script>
<script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
</script>
<script type="text/javascript">

        function drbLoanTypeChanged()
        {
            performCalculations();
        }


        function txtAmountChanged()
        {
            performCalculations();
        }

        function performCalculations()
        {
            if ($('#Amount').val() > 0 && $('#IDLoanType').val() > 0) {

                try {
                    var irate = 0.0, iamount = 0.0, amount;

                    var rawRateData = $('#IDLoanType option:selected').text();
                    var arrayRate = rawRateData.split('-');

                    var duration = arrayRate[1].trim();
                    var rateString = arrayRate[2].trim();
                    //remove percentage
                    rateString = rateString.replace("%", "");
                    //remove brackets
                    rateString = rateString.replace("(", "");
                    rateString = rateString.replace(")", "");
                    //perform calculation
                    irate = parseFloat(rateString);
                    amount = parseFloat($('#Amount').val());
                    iamount = Math.round(amount * (irate / 100));

                    //set the textboxes
                    //Tenor  InterestRate   InterestAmount  TotalValue
                    $('#Tenor').val(duration);
                    $('#InterestRate').val(irate);
                    $('#InterestAmount').val(iamount);
                    $('#TotalValue').val(iamount + amount);
                    $('#MonthlyRepayment').val(Math.round((iamount + amount) / parseFloat(duration)));
                }
                catch (ex) {

                }


            }
        }
        </script>
