

  <!-- Start your project here-->
  <section class="theme-color-bg py-2">
    <div class="container white-text font-weight-500 my-1">
      <ul class="nav">
        <li class="mr-4"><img src="<?php echo base_url(); ?>assets/front/img/Icons_0006_maps-and-flags-(3).png" class="valign-middle mr-1">185, 3rd Floor,
          Zone-I, M.P. Nagar, Bhopal, M.P. 462011</li>
        <li class="mr-4"><img src="<?php echo base_url(); ?>assets/front/img/Icons_0005_phone-receiver-(1).png" class="valign-middle mr-1">97559 96968</li>
        <li class="mr-4"><img src="<?php echo base_url(); ?>assets/front/img/Icons_0004_close-envelope.png" class="valign-middle mr-2">info@cybrom.com</li>
      </ul>
    </div>
  </section>
  <section class="" >
    <div class="streak streak-photo registration-form" style="height:1000px;background-image:url(<?php echo base_url(); ?>assets/front/img/Icons_0007_bg5.png);">
      <div class="flex-center rgba-black-light py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 text-center white-text py-5">
                <div class="flex-center flex-column h-50">
              <img src="<?php echo base_url(); ?>assets/front/img/logo/cyborm-2.png" width="170" >
              <h1 class="h1-responsive text-uppercase font-weight-700 mt-4">REGISTRATION <span class="theme-color-text">Form</span>
              </h1>
              <h5 class="h5-responsive font-weight-700 white-text mt-3">Trusted Partner Of</h5>
              <div class="d-flex justify-content-center">
                <div class="p-2">
                  <img src="<?php echo base_url(); ?>assets/front/img/Icons_0001_TEch-Cover.png" height="65px">
                </div>
                <div class="p-2">
                  <img src="<?php echo base_url(); ?>assets/front/img/Icons_0000_redhat.png" height="65px">
                </div>
              </div>
            </div>
            </div>
            <div class="col-lg-7 ">
             <form class="white rounded px-3 py-4" method="post" onsubmit="return formSubmit(this)" action="<?php echo base_url(); ?>home/add_student" enctype="multipart/form-data">
                   <?= msg();?>
              <h4 class="h4-responsive text-uppercase text-center font-weight-600 mb-4">Student <span class="blue-text-theme">Detail</span></h4>
              <div class="row text-center">
              
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input type" name="type" value="1" id="new" checked="">
                  <label for="new">New</label>
                </div>
                <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input type" name="type" value="2" id="old">
                <label for="old">Existing</label>
                </div>
              

              </div>
              <div class="row form-group" id="studentNumberSection">
                <input type="text" name="studentNumber" id="studentNumber" class="form-control studentNumber" placeholder="Student Id">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="font-weight-700 font-13">Technology <span style="color:red;">*</span></label>
                        <select class="browser-default form-control myform " name="technology" id="technology" required>
                              <option value="">Select Technology</option>
                              <?php
                              //$getcategory =  getcategory();
                                  //
                              $technology=$this->admin->getRows('SELECT * FROM technology where status=1 ORDER BY name ASC');
                                  //print_r($course); exit;
                              if(!empty($technology))
                              {
                                  foreach ($technology as $k=>$technologyi)
                                  {
                                      ?>
                                      <option topic="<?= $technologyi->topic; ?>" <?php if(!empty($form_data)){if($form_data['technology']==$technologyi->id){echo "selected";}} ?> value="<?php  echo $technologyi->id;?>"><?php echo ucfirst($technologyi->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                
                     <label class="font-weight-700 font-13">Date</label> <label class="font-weight-700 font-13"  >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTime <span style="color:red;">*</span></label>
                        <select class="browser-default form-control myform" name="batch_id" id="batch_id">
                             
                        </select>

                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                       <label class="font-weight-700 font-13">Name<span style="color:red;">*</span></label>
                        <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                        <input type="text" autocomplete="off"   class="form-control myform existUser"  name="name" id="name" placeholder="Enter  Name"  value="<?php if(!empty($selectall)){ echo $selectall->name;}elseif($form_data){ echo $form_data['name'];}?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                       
                         <label class="font-weight-700 font-13">College<span style="color:red;">*</span></label>
                        <select class="browser-default form-control myform existUser" name="college" id="college"s>
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
                                      <option <?php if(!empty($form_data)){if($form_data['college']==$collagecodei->id){echo "selected";}} ?> value="<?php  echo $collagecodei->id;?>"><?php echo $collagecodei->code.' '.ucfirst($collagecodei->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="font-weight-700 font-13">Degree <span style="color:red;">*</span></label>
                           <select class="browser-default form-control myform" name="degree" id="degree">
                              <option value="">Select Degree</option>
                              <?php
                              //$getcategory =  getcategory();
                                  //
                              $degree=$this->admin->getRows('SELECT * FROM degree where status=1 ORDER BY name ASC');
                                  //print_r($course); exit;
                              if(!empty($degree))
                              {
                                  foreach ($degree as $degreei)
                                  {
                                      ?>
                                      <option sid = "<?= $degreei->semester; ?>" <?php if(!empty($form_data)){if($form_data['degree']==$degreei->id){echo "selected";}} ?> value="<?php  echo $degreei->id;?>"><?php echo ucfirst($degreei->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="font-weight-700 font-13">Branch <span style="color:red;">*</span></label>
                               <select class="browser-default form-control myform" name="branch" id="branch">
                             
                        </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                 <label class="font-weight-700 font-13">Semester<span style="color:red;">*</span></label>
                        <select class="browser-default myform form-control" name="semister" id="semister">
                             <option value="" selected="">Select Semester</option>
                            <option <?php if($form_data['semister']){if($form_data['semister']==1){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==1){ echo " selected";}  }  ?> value="1">1 st Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==2){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==2){ echo " selected";}  }  ?> value="2">2 nd Semester</option>
                             <option <?php if($form_data['semister']){if($form_data['semister']==3){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==3){ echo " selected";}  }  ?> value="3">3 th Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==4){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==4){ echo " selected";}  }  ?> value="4">4 th Semester</option>
                             <option <?php if($form_data['semister']){if($form_data['semister']==5){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==5){ echo " selected";}  }  ?> value="5">5 th Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==6){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==6){ echo " selected";}  }  ?> value="6">6 th Semester</option>
                             <option <?php if($form_data['semister']){if($form_data['semister']==7){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==7){ echo " selected";}  }  ?> value="7">7 th Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==8){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==8){ echo " selected";}  }  ?> value="8">8 th Semester</option>
                        </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                     
                                 <label class="font-weight-700 font-13"> Enrollment No.<span style="color:red;">*</span></label>
                      <input type="text" autocomplete="off"   class="form-control myform"  id="roll_no" name="roll_no" placeholder="Enter   Enrollment No."  value="<?php if($form_data){ echo $form_data['roll_no'];}?>" >
                                </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                              
                                     <label class="font-weight-700 font-13"> Email<span style="color:red;">*</span></label>
                        <input type="email" autocomplete="off"  class="form-control myform" name="email" id="email" placeholder="Enter  Email" value="<?php if($form_data){ echo $form_data['email'];}?>"  >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <label class="font-weight-700 font-13">Mobile<span style="color:red;">*</span></label>
                        <input type="number" autocomplete="off"   class="form-control myform" name="mobile" id="mobile" placeholder="Enter  Mobile Number" value="<?php if($form_data){ echo $form_data['mobile'];}?>"   >
                                    </div>
                                  </div>
                   <div class="col-md-12" id="topicSection">
                    <!-- <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" name="topic[]" value="tranning" id="tranning">
                    <label for="tranning">Tranning</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input type="checkbox"  class="form-check-input" name="topic[]" value="internship" id="internship">
                      <label for="internship">Internship</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" name="topic[]" value="executive_lecture" id="executive_lecture">
                      <label for="executive_lecture">Executive Lecture</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" name="topic[]" value="project" id="project">
                      <label for="project">Project</label>
                    </div>
                     -->
                   </div>                                   
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="font-weight-700 font-13">Test Series </label>
                        <select class="browser-default form-control" name="testseries">
                          <!-- <option disabled selected>Select Test Series</option> -->
                          <option value="1" <?php if($form_data['testseries']){if($form_data['testseries']==1){echo "selected";}}  ?>>Yes</option>
                           <option value="0" <?php if($form_data['testseries']){if($form_data['testseries']==0){echo "selected";}}  ?>>No</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <p class="font-weight-600 font-14" style="color:red">* Condition: 90% attendance + 80% in Test Series + Project submission within 3 days</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="font-weight-700 font-13">Fees Amount </label>
                   <input type="text" autocomplete="off"   class="form-control myform" name="totalfees" id="totalfees" value="<?php if($form_data){ echo $form_data['totalfees'];}?>" placeholder="Enter  Fees amount"  >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="font-weight-700 font-13">Registration Amount </label>
                     <input type="text" autocomplete="off"  class="form-control myform" name="fees" id="fees" value="<?php if($form_data){ echo $form_data['fees'];}?>" placeholder="Enter  Fees amount" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                     <label class="font-weight-700 font-13">Payment Mode<span style="color:red;">*</span></label>
                        <select class="browser-default form-control" name="payment_mode" >
                          <option  value="Cash">Cash</option>
                          <option  value="Paytm">Paytm</option>
                           <option value="Bhim">Bhim</option>
                          <option  value="Cheque">Cheque</option>
                          <option  value="Bank Transfer">Bank Transfer</option>
                      </select>
                    </div>
                  </div>
               <!--     <div class="col-sm-6">
                     <div class="form-group">
                        <label>Fees Date<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control datepicker" name="feesdate" placeholder="Enter Fees Date" value="" autocomplete="off"  required >
                    </div>
                     </div>-->

                  <div class="col-12 mt-2">
                    <button class="btn btn-pink btn-block font-weight-700 font-16">Submit</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Start your project here-->
<script type="text/javascript">
  function formSubmit(obj){
    //alert();
    var flag = false;
$('.myform').css('border','1px solid #fff');
    $.ajax({
    type: "POST",
    url: "<?= base_url().'home/checkForm'; ?>",
    data: $(obj).serialize(),
    //contentType: "application/json; charset=utf-8",
    async: false,
    success: function(result){
        //alert(result.d);
        var objs = JSON.parse(result);
        if(objs.status=='failed'){
          target=objs.error;
          for (var k in target){
          if (target.hasOwnProperty(k)) {
          console.log("Key is " + k + ", value is" + target[k]);
          $('#'+k).css('border','1px solid red');
          }
          }
          flag = false;
        }

        if(objs.status=='success'){
         // alert('form submit');
          flag = true;
        }
        console.log(result);
    }
});

//alert('final = '+flag);
    return flag;
  }
</script>