<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style>
    .alert>p{display: inline-block;}
    .panel-heading .dropdown-menu-right{display:none !important;}
    .wysihtml5-toolbar li:nth-child(5){display:none !important;}
    .wysihtml5-toolbar li:last-child{display:none !important;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Deduction</h1>
            <small>Manage Deduction</small>
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
                           echo "Edit Deduction";
                       }
                       else
                       {
                           echo "Add Deduction";
                       }
                       ?>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>admin/deduction/add_deduction" enctype="multipart/form-data">
                    <?= msg();?>
                      <div class="form-group">
                        <label>Transaction Type(सौदे का प्रकार)<span style="color:red;">*</span></label>
                        <select class="form-control" name="transaction_type" >
                          <option <?php if($form_data['transaction_type']){if($form_data['transaction_type']=='Salary'){echo "selected";}}elseif(!empty($selectall)){ if($selectall->transaction_type=='Salary'){ echo " selected";}  }  ?> value="Salary">Salary</option>
<option <?php if($form_data['transaction_type']){if($form_data['transaction_type']=='Salary'){echo "selected";}}elseif(!empty($selectall)){ if($selectall->transaction_type=='Salary'){ echo " selected";}  }  ?> value="Office Expenses">Office Expenses</option>
<option <?php if($form_data['transaction_type']){if($form_data['transaction_type']=='Salary'){echo "selected";}}elseif(!empty($selectall)){ if($selectall->transaction_type=='Salary'){ echo " selected";}  }  ?> value="D. Misc">D. Misc</option>
                          
                        </select>
                    </div>

             <div class="form-group">
                        <label>Amount(राशि)<span style="color:red;">*</span></label>
                        <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                        <input type="text"  class="form-control"  name="amount" placeholder="Enter amount"  value="<?php if(!empty($selectall)){ echo $selectall->amount;}elseif($form_data){ echo $form_data['amount'];}?>"  required>
                    </div>
                       <div class="form-group">
                        <label>Remark<span style="color:red;">*</span></label>
                       
                        <input type="text"  class="form-control"  name="remark" placeholder="Enter remark"  value="<?php if(!empty($selectall)){ echo $selectall->remark;}elseif($form_data){ echo $form_data['remark'];}?>"  >
                    </div>
                  

                    <div class="reset-button">
                        <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                        <a href="<?php echo base_url(); ?>admin/addition"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>

                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>
