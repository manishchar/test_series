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
        <h1>Loan Repayment</h1>
        <small>Loan Repayment</small>
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
                        echo "Loan Repayment";
                       }
                    else
                       {
                        echo "Loan Repayment";
                       }
                    ?>
                    </h4>
                   </div>
                </div>
                <div class="panel-body">
               <form class="col-sm-9"  enctype="multipart/form-data">
               <?= msg();?>
 
                 <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
                <label>Choose a customer(एक ग्राहक चुनें)<span style="color:red;">*</span></label>
                <select data-placeholder="Search email" name="user_id" id="user_id"  class="form-control input-sm m-bot15 chosen-select" onChange="window.document.location.href=this.options[this.selectedIndex].value;">
                  <option value="">Select Customer</option>
                            <?php
                            $agent_id = $this->session->userdata('agent_id');
                             $user=$this->admin->getRows('SELECT l.id,l.amount,u.fname,u.lname FROM loan l, user u WHERE l.user_id = u.id and l.agent_id="'.$agent_id.'"');
                            if(!empty($user))
                            {
                          foreach ($user as $useri)
                              { 
                              ?>
                          <option <?php if($form_data['user_id']){if($form_data['user_id']==$useri->id){echo "selected";}}elseif(!empty($selectall)){ if($selectall->user_id==$useri->id){ echo " selected";}  }  ?> value="<?php echo base_url(); ?>agent/loanrepayment/add/<?php echo $useri->id; ?>"><?php echo ucfirst($useri->fname.' '.$useri->lname.' '.$useri->id); ?></option>
                            <?php
                              }
                            }
                            ?>      
                                                    
                                           
                      </select>  
                </div>
        </div>
        <div class="col-sm-6">
               
      </div>
      </div>

     
                  
                   
                 
                   <!--  
                    <div class="reset-button">
                        <button onclick="repayment()" class="btn btn-success w-md m-b-5" type="button">Save</button>
                        <a href="<?php echo base_url(); ?>agent/loan"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>-->
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
function repayment() {
var userid = $("#userid").val();
alert(userid);
}
$('.dropone').change(function() {    
    var item=$(this);
    alert(item.val())
    $(".droptwo").empty();
    $(".droptwo").load("ajaxdropdown.aspx?drpType=room
                        &roomid=" +item.attr("value") + "&ts=" + $.now());
});

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