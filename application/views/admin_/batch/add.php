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
            <h1>Batch</h1>
            <small>Manage Batch</small>
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
                           echo "Edit Batch";
                       }
                       else
                       {
                           echo "Add Batch";
                       }
                       ?>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>admin/batch/add_batch" enctype="multipart/form-data">
                   <?= msg();?>
                    <div class="form-group">
                        <label>Technology<span style="color:red;">*</span></label>
                           <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                        <select class="form-control" name="course_id" id="course_id">
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
                                      <option <?php if(!empty($selectall)){if($selectall->course_id==$technologyi->id){echo "selected";}}elseif(!empty($form_data)){if($form_data['technology']==$technologyi->id){echo "selected";}} ?> value="<?php  echo $technologyi->id;?>"><?php echo ucfirst($technologyi->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Faculty<span style="color:red;">*</span></label>
                        <select class="form-control" name="faculty_id" id="faculty_id">
                              <option value="">Select Faculty</option>
                              <?php
                              //$getcategory =  getcategory();
                                  //
                              if(empty($faculty)){
                              $faculty=$this->admin->getRows('select *  from admin where types=3 and status =1');
                              }
                                  //print_r($course); exit;
                              if(!empty($faculty))
                              {
                                  foreach ($faculty as $facultyi)
                                  {
                                      ?>
                                      <option <?php if(!empty($selectall)){if($selectall->faculty_id==$facultyi->id){echo "selected";}}elseif(!empty($form_data)){if($form_data['course']==$facultyi->id){echo "selected";}} ?> value="<?php  echo $facultyi->id;?>"><?php echo ucfirst($facultyi->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lab<span style="color:red;">*</span></label>
                        <select class="form-control" name="lab_id" id="lab_id">
                              <option value="">Select Lab</option>
                              <?php
                              //$getcategory =  getcategory();
                                  //
                              $lab=$this->admin->getRows('SELECT * FROM lab');
                                  //print_r($course); exit;
                              if(!empty($lab))
                              {
                                  foreach ($lab as $labi)
                                  {
                                      ?>
                                      <option <?php if(!empty($selectall)){if($selectall->lab_id==$labi->id){echo "selected";}}elseif(!empty($form_data)){if($form_data['course']==$labi->id){echo "selected";}} ?> value="<?php  echo $labi->id;?>"><?php echo ucfirst($labi->name.'  ('.$labi->capacity .')'); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                    </div>
                     
                    
                    <div class="form-group">
                        <label>Start Date<span style="color:red;">*</span></label>
                       
                      
                        <input type="text" autocomplete="off"  class="form-control datepicker" name="startdate" placeholder="Enter  Start Date" value="<?php if(!empty($selectall)){ echo $selectall->startdate;}elseif($form_data){ echo $form_data['startdate'];}?>"  required  >
                    </div>

                     <div class="form-group">
                        <label>End Date<span style="color:red;">*</span></label>
                     
                         <input type="text" autocomplete="off"  class="form-control datepicker" name="enddate" placeholder="Enter  End Date" value="<?php if(!empty($selectall)){ echo $selectall->enddate;}elseif($form_data){ echo $form_data['enddate'];}?>"  required >
                    
                    </div>

                    <div class="form-group">
                        <label> Start Time<span style="color:red;">*</span></label>
                        <input type="time"  class="form-control" name="starttime" placeholder="Enter  Start Time" value="<?php if(!empty($selectall)){ echo $selectall->starttime;}elseif($form_data){ echo $form_data['starttime'];}?>"  required >
                    </div>
                     <div class="form-group">
                        <label> End Time<span style="color:red;">*</span></label>
                        <input type="time"  class="form-control" name="endtime" placeholder="Enter  End Time" value="<?php if(!empty($selectall)){ echo $selectall->endtime;}elseif($form_data){ echo $form_data['endtime'];}?>"  required >
                    </div>
                   
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control textarea" name="description"  placeholder="Enter  Description" ><?php if(!empty($selectall)){ echo $selectall->description;}elseif($form_data){ echo $form_data['description'];}?></textarea>
                    </div>
                   
                    <div class="form-group">
                        <label>Status<span style="color:red;">*</span></label>
                        <select class="form-control" name="status">
                            <option <?php if($form_data['status']){if($form_data['status']==1){echo "selected";}}elseif(!empty($selectall)){ if($selectall->status==1){ echo " selected";}  }  ?> value="1">Active</option>
                            <option  <?php if($form_data['status']){if($form_data['status']==0){echo "selected";}}elseif(!empty($selectall)){ if($selectall->status==0){ echo " selected";}  }  ?> value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="reset-button">
                        <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                        <a href="<?php echo base_url(); ?>admin/faculty"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>

                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>

<script type="text/javascript">
$('#course_id').change(function(){
  var course_id = $(this).val();
  $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>admin/batch/getFaculty",
      cache:false,
      data: {course_id:course_id},
      success: function(response)
      {
        //console.log(response);
        $("#faculty_id").html(response); 
      }
  });
});
</script>