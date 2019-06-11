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
        <h1>Fees Repayment</h1>
        <small>Fees Repayment</small>
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
                        echo "Fees Repayment";
                       }
                    else
                       {
                        echo "Fees Repayment";
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
                <label>Choose a Student<span style="color:red;">*</span></label>
              <!--  <select data-placeholder="Search email" name="s_id" id="s_id"  class="form-control input-sm m-bot15 chosen-select" onChange="window.document.location.href=this.options[this.selectedIndex].value;">
                  <option value="">Select Customer</option>
                            <?php
                           
                             $user=$this->admin->getRows('SELECT id, name FROM student WHERE ststus = 1');
                            if(!empty($user))
                            {
                          foreach ($user as $useri)
                              { 
                              ?>
                          <option <?php if($form_data['s_id']){if($form_data['s_id']==$useri->id){echo "selected";}}elseif(!empty($selectall)){ if($selectall->s_id==$useri->id){ echo " selected";}  }  ?> value="<?php echo base_url(); ?>agent/loanrepayment/add/<?php echo $useri->id; ?>"><?php echo ucfirst($useri->name); ?></option>
                            <?php
                              }
                            }
                            ?>      
                                                    
                                           
                      </select>  -->
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

        </script>