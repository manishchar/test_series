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
            <h1>Student</h1>
            <small>Manage Student</small>
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
                           echo "Edit Student";
                       }
                       else
                       {
                           echo "Add Student";
                       }
                       ?>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>admin/student/add_student" enctype="multipart/form-data">
                   <?= msg();?>

                   <h2>Student Details</h2>

                    <div class="row">
                   <div class="col-sm-6">
     <div class="form-group">
                        <label>Technology<span style="color:red;">*</span></label>
                           <input type="text" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                           <input type="text" name="student_id" value="<?php if(!empty($selectall)){ echo $selectall->student_id;}?>" >
                        <select class="form-control chosen-select" name="technology" id="technology">
                              <option value="">Select Technology</option>
                              <?php
                              //$getcategory =  getcategory();
                                  //
                              $technology=$this->admin->getRows('SELECT * FROM technology where status=1 ORDER BY name ASC');
                                  //print_r($course); exit;
                              if(!empty($technology))
                              {
                                  foreach ($technology as $technologyi)
                                  {
                                      ?>
                                      <option <?php if(!empty($selectall)){if($selectall->technology==$technologyi->id){echo "selected";}}elseif(!empty($form_data)){if($form_data['technology']==$technologyi->id){echo "selected";}} ?> value="<?php  echo $technologyi->id;?>"><?php echo ucfirst($technologyi->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                    </div>

              
                     </div>
                        <div class="col-sm-6">
                    <div class="form-group">
                        <label>Date</label> <label  >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTime</label>
                        <select class="form-control" name="batch_id" id="batch_id">
                             <?php 
                              if(!empty($batches)){
                                foreach ($batches as $key => $batch) { ?>
                                  <option <?php if($selectall->batch_id ==$batch->id ){ echo "selected"; }else{ echo "disabled"; } ?> value="<?= $batch->id; ?>"><?= date('d-M',strtotime($batch->startdate)).'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$batch->starttime ?></option>
                                <?php }
                              }
                              ?>
                        </select>
                    </div>
                      </div>
                     </div>
                   <div class="row">
             <div class="col-sm-6">
                  <div class="form-group">
                        <label>Name<span style="color:red;">*</span></label>
                        <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                        <input type="text"  class="form-control"  name="name" placeholder="Enter  Name"  value="<?php if(!empty($login)){ echo $login->name;}elseif($form_data){ echo $form_data['name'];}?>"  required>
                    </div>
                     </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>College<span style="color:red;">*</span></label>
                        <select class="form-control  chosen-select" name="college" id="college">
                              <option value="">Select College</option>
                              <?php
                              //$getcategory =  getcategory();
                              //
                              $collagecode=$this->admin->getRows('SELECT * FROM collagecode where status=1 ORDER BY name ASC');
                                  //print_r($course); exit;
                              if(!empty($collagecode))
                              {
                                  foreach ($collagecode as $collagecodei)
                                  {
                                      ?>
                                      <option <?php if(!empty($login)){if($login->college==$collagecodei->id){echo "selected";}}elseif(!empty($form_data)){if($form_data['college']==$collagecodei->id){echo "selected";}} ?> value="<?php  echo $collagecodei->id;?>"><?php echo $collagecodei->code.' '.ucfirst($collagecodei->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                    </div>
                    </div>
                     </div>
         <div class="row">
             <div class="col-sm-6">
                   <div class="form-group">
                        <label>Degree<span style="color:red;">*</span></label>
                           <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                        <select class="form-control chosen-select" name="degree" id="degree">
                              <option value="">Select Degree</option>
                              <?php
                              //$getcategory =  getcategory();
                                  //
                              $degree=$this->admin->getRows('SELECT * FROM degree where status=1');
                                  //print_r($course); exit;
                              if(!empty($degree))
                              {
                                  foreach ($degree as $degreei)
                                  {
                                      ?>
                                      <option <?php if(!empty($login)){if($login->degree==$degreei->id){echo "selected";}}elseif(!empty($form_data)){if($form_data['degree']==$degreei->id){echo "selected";}} ?> value="<?php  echo $degreei->id;?>"><?php echo ucfirst($degreei->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                    </div>
                     </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label>Branch<span style="color:red;">*</span></label>
                          
                        <select class="form-control" name="branch" id="branch">
                             
                        </select>
                    </div>
                    </div>
                     </div>
                  
                   <div class="row">
                   <div class="col-sm-6">
 <div class="form-group">
                        <label>Semester<span style="color:red;">*</span></label>
                        <select class="form-control" name="semister" >
                             <option value="">Select Semester</option>
                            <option <?php if($form_data['semister']){if($form_data['semister']==1){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==1){ echo " selected";}  }  ?> value="1">1 Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==2){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==2){ echo " selected";}  }  ?> value="2">2 Semester</option>
                             <option <?php if($form_data['semister']){if($form_data['semister']==3){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==3){ echo " selected";}  }  ?> value="3">3 Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==4){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==4){ echo " selected";}  }  ?> value="4">4 Semester</option>
                             <option <?php if($form_data['semister']){if($form_data['semister']==5){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==5){ echo " selected";}  }  ?> value="5">5 Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==6){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==6){ echo " selected";}  }  ?> value="6">6 Semester</option>
                             <option <?php if($form_data['semister']){if($form_data['semister']==7){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==7){ echo " selected";}  }  ?> value="7">7 Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==8){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==8){ echo " selected";}  }  ?> value="8">8 Semester</option>
                        </select>
                    </div>

                    
                     </div>
                        <div class="col-sm-6">
                     <div class="form-group">
                      <label> Enrollment No.</label>
                      <input type="text"  class="form-control"  name="roll_no" placeholder="Enter   Enrollment No."  value="<?php if(!empty($selectall)){ echo $selectall->roll_no;}elseif($form_data){ echo $form_data['roll_no'];}?>"  required>
                    </div>
                      </div>
                     </div>
                       <div class="row">
                   <div class="col-sm-6">
                     <div class="form-group">
                        <label> Email<span style="color:red;">*</span></label>
                        <input type="email"  class="form-control" name="email" placeholder="Enter  Email" value="<?php if(!empty($selectall)){ echo $selectall->email;}elseif($form_data){ echo $form_data['email'];}?>"  required >
                    </div>


                 
                     </div>
                        <div class="col-sm-6">
                       <div class="form-group">
                        <label>Mobile</label>
                        <input type="number"  class="form-control" name="mobile" placeholder="Enter  Mobile Number" value="<?php if(!empty($selectall)){ echo $selectall->mobile;}elseif($form_data){ echo $form_data['mobile'];}?>"  required >
                    </div>
                     </div>
                     </div>
                      
  <div class="row">
                 <div class="col-sm-6">
                  
                 </div>
                   <div class="col-sm-6">
             
                   </div>
                     </div>
                    
                      <div class="row">
                   <div class="col-sm-6">
                       <div class="form-group">
                        <label>Total Fees<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control" name="totalfees"  id="totalfees" placeholder="Enter  Fees" value="<?php if(!empty($selectall)){ echo $selectall->totalfees;}elseif($form_data){ echo $form_data['totalfees'];}?>"  required>
                    </div>
                   </div>
                     <div class="col-sm-6">
               
                        <div class="form-group">
                        <label>Status<span style="color:red;">*</span></label>
                        <select class="form-control" name="status" >
                            <option <?php if($form_data['status']){if($form_data['status']==1){echo "selected";}}elseif(!empty($selectall)){ if($selectall->status==1){ echo " selected";}  }  ?> value="1">Active</option>
                            <option  <?php if($form_data['status']){if($form_data['status']==0){echo "selected";}}elseif(!empty($selectall)){ if($selectall->status==0){ echo " selected";}  }  ?> value="0">Inactive</option>
                        </select>
                    </div>
                    </div>
                            
                  
                     </div>
                    
                    <div class="reset-button">
                        <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                        <a href="<?php echo base_url(); ?>admin/student"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
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
  $(document).ready(function(){
    //jquery script
<?php if($selectall->technology != ''){?>
  var id = <?php  if($selectall->technology != ''){ echo $selectall->technology; }?>;
  var batch_id = <?php if($selectall->batch_id != ''){ echo $selectall->batch_id;} ?>;
  $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>admin/student/getcourse/"+id+"/"+batch_id,
      cache:false,
      data: {id:id,batch_id:batch_id},
      success: function(response)
      {

        $("#batch_id").html(response);
        
      }
  });
<?php } ?>

<?php if($login->degree != ''){?>
  var degree = <?php if($login->degree != ''){  echo $login->degree;} ?>;
  var branch = <?php if($login->branch != ''){  echo $login->branch;} ?>;
  $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>admin/student/getbranch/"+degree+"/"+branch,
      cache:false,
      data: {id:degree,branch:branch},
      success: function(response)
      { 
        $("#branch").html(response); 
      }
  });
<?php } ?>

$("#technology").change(function(){
    var id = $(this).val();
    var batch_id = '0';
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>admin/student/getcourse/"+id+"/"+batch_id,
        cache:false,
        data: {id:id,batch_id:batch_id},
        success: function(response)
        {
          $("#batch_id").html(response);
        }
    });

});


$("#degree").change(function(){
  var id = $(this).val();
  var branch = '0';
  $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>admin/student/getbranch/"+id+"/"+branch,
        cache:false,
        data: {id:id,branch:branch},
        success: function(response)
        {
          $("#branch").html(response);    
        }
  });
});


 
  });
</script>