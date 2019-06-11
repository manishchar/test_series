

  <!-- Start your project here-->
  <section class="theme-color-bg py-2">
    <div class="container white-text font-weight-500 my-1">
      <ul class="nav">
        <li class="mr-4"><i class="fas fa-map-marker-alt fa-lg mr-2"></i>185, 3rd Floor, Zone-I, M.P. Nagar, Bhopal, M.P. 462011</li>
        <li class="mr-4"><i class="fas fa-phone-volume fa-lg mr-2"></i>97559 96968</li>
        <li class="mr-4"><i class="fas fa-envelope fa-lg mr-2"></i>info@cybrom.com</li>
      </ul>
    </div>
  </section>
  <section class="">
    <div class="streak streak-photo registration-form" style="background-image:url(<?php echo base_url(); ?>assets/front/img/bg.jpg);">
      <div class="flex-center rgba-black-strong pb-5">
        <div class="container">
            <div class="row">
          <div class="col-lg-6 text-center white-text py-5">
            <img src="<?php echo base_url(); ?>assets/front/img/logo/cyborm-2.png" width="200">
            <h1 class="text-uppercase font-weight-700 mt-4">REGISTRATION <span class="theme-color-text">Form</span></h1>
            <p class="font-weight-600 mt-3 text-center text-light-grey">We provides always our best educational services for our all students
                and always try to achieve our students trust and satisfaction
                </p>
                <h5 class="h5-responsive font-weight-600 text-light-grey mt-2">Trusted Partner Of</h5>
                <div class="d-flex justify-content-center">
                  <div class="p-2">
                    <img src="<?php echo base_url(); ?>assets/front/img/logo/AppIn.png" height="95px">
                  </div>
                  <div class="p-2">
                      <img src="<?php echo base_url(); ?>assets/front/img/logo/RedHat.png" height="95px">
                  </div>
                </div>
          </div>
          <div class="col-lg-6 ">
    
              <form class="col-sm-9 white rounded px-3 py-4" method="post" action="<?php echo base_url(); ?>home/add_student" enctype="multipart/form-data">
                   <?= msg();?>
              <h4 class="h4-responsive text-uppercase text-center font-weight-600 mb-4">Student <span class="blue-text-theme">Detail</span></h4>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="text-uppercase font-weight-700 font-13">Technology *</label>
                        <select class="browser-default form-control " name="technology" id="technology">
                              <option value="">Select Technology</option>
                              <?php
                              //$getcategory =  getcategory();
                                  //
                              $technology=$this->admin->getRows('SELECT * FROM technology where status=1');
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
                <div class="col-md-6">
                    <div class="form-group">
                
                     <label>Batch<span style="color:red;">*</span></label>
                        <select class="browser-default form-control" name="batch_id" id="batch_id">
                             
                        </select>

                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                       <label>Name<span style="color:red;">*</span></label>
                        <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                        <input type="text"  class="form-control"  name="name" placeholder="Enter  Name"  value="<?php if(!empty($selectall)){ echo $selectall->name;}elseif($form_data){ echo $form_data['name'];}?>"  required>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="text-uppercase font-weight-700 font-13">college *</label>
                         <label>College<span style="color:red;">*</span></label>
                        <select class="browser-default form-control " name="college" id="college">
                              <option value="">Select College</option>
                              <?php
                              //$getcategory =  getcategory();
                              //
                              $collagecode=$this->admin->getRows('SELECT * FROM collagecode where status=1');
                                  //print_r($course); exit;
                              if(!empty($collagecode))
                              {
                                  foreach ($collagecode as $collagecodei)
                                  {
                                      ?>
                                      <option <?php if(!empty($selectall)){if($selectall->college==$collagecodei->id){echo "selected";}}elseif(!empty($form_data)){if($form_data['college']==$collagecodei->id){echo "selected";}} ?> value="<?php  echo $collagecodei->id;?>"><?php echo $collagecodei->code.' '.ucfirst($collagecodei->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="text-uppercase font-weight-700 font-13">degree *</label>
                           <select class="browser-default form-control" name="degree" id="degree">
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
                                      <option <?php if(!empty($selectall)){if($selectall->degree==$degreei->id){echo "selected";}}elseif(!empty($form_data)){if($form_data['degree']==$degreei->id){echo "selected";}} ?> value="<?php  echo $degreei->id;?>"><?php echo ucfirst($degreei->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="text-uppercase font-weight-700 font-13">branch *</label>
                               <select class="browser-default form-control" name="branch" id="branch">
                             
                        </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                 <label>Semester<span style="color:red;">*</span></label>
                        <select class="browser-default form-control" name="semister" >
                             <option value="">Select Semester</option>
                            <option <?php if($form_data['semister']){if($form_data['semister']==1){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==1){ echo " selected";}  }  ?> value="1">1 st Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==2){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==2){ echo " selected";}  }  ?> value="2">2 nd Semester</option>
                             <option <?php if($form_data['semister']){if($form_data['semister']==3){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==3){ echo " selected";}  }  ?> value="3">3 rd Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==4){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==4){ echo " selected";}  }  ?> value="4">4 rd Semester</option>
                             <option <?php if($form_data['semister']){if($form_data['semister']==5){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==5){ echo " selected";}  }  ?> value="5">5 rd Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==6){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==6){ echo " selected";}  }  ?> value="6">6 rd Semester</option>
                             <option <?php if($form_data['semister']){if($form_data['semister']==7){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==7){ echo " selected";}  }  ?> value="7">7 rd Semester</option>
                            <option  <?php if($form_data['semister']){if($form_data['semister']==8){echo "selected";}}elseif(!empty($selectall)){ if($selectall->semister==8){ echo " selected";}  }  ?> value="8">8 rd Semester</option>
                        </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                     
                                 <label> Enrollment No.<span style="color:red;">*</span></label>
                      <input type="text"  class="form-control"  name="roll_no" placeholder="Enter   Enrollment No."  value="<?php if(!empty($selectall)){ echo $selectall->roll_no;}elseif($form_data){ echo $form_data['roll_no'];}?>"  required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="text-uppercase font-weight-700 font-13">Email id *</label>
                                     <label> Email<span style="color:red;">*</span></label>
                        <input type="email"  class="form-control" name="email" placeholder="Enter  Email" value="<?php if(!empty($selectall)){ echo $selectall->email;}elseif($form_data){ echo $form_data['email'];}?>"  required >
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <label>Mobile<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control" name="mobile" placeholder="Enter  Mobile Number" value="<?php if(!empty($selectall)){ echo $selectall->mobile;}elseif($form_data){ echo $form_data['mobile'];}?>"  required >
                                    </div>
                                  </div>
                                  <div class="col-12 mt-2">
                                      <button type="submit" class="btn btn-pink btn-block font-weight-700 font-16">Submit</button>
                                    </div>
              </div>
              
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
</section>

