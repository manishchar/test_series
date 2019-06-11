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
            <h1>Course</h1>
            <small>Manage Course</small>
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
                           echo "Edit Course";
                       }
                       else
                       {
                           echo "Add Course";
                       }
                       ?>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>admin/course/add_course" enctype="multipart/form-data">
                    <?= msg();?>
                      <div class="form-group">
                        <label>Technology<span style="color:red;">*</span></label>
                           <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                        <select class="form-control" name="technology" id="technology">
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

                    <div class="form-group">
                        <label>Course title<span style="color:red;">*</span></label>
                        <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                        <input type="text"  class="form-control"  name="title" placeholder="Enter title"  value="<?php if(!empty($selectall)){ echo $selectall->title;}elseif($form_data){ echo $form_data['title'];}?>"  required>
                    </div>
                  
                    <div class="form-group">
                        <label>Course Detail<span style="color:red;">*</span> </label>
                        <textarea name="description"  class="form-control textarea1" placeholder="Enter Course Detail" ><?php if(!empty($selectall)){ echo $selectall->description;}elseif($form_data){ echo $form_data['description'];}?></textarea>
                    </div>
                  
                    <div class="form-group">
                        <label>Status<span style="color:red;">*</span></label>
                        <select class="form-control" name="status" >
                            <option <?php if($form_data['status']){if($form_data['status']==1){echo "selected";}}elseif(!empty($selectall)){ if($selectall->status==1){ echo " selected";}  }  ?> value="1">Active</option>
                            <option  <?php if($form_data['status']){if($form_data['status']==0){echo "selected";}}elseif(!empty($selectall)){ if($selectall->status==0){ echo " selected";}  }  ?> value="0">Inactive</option>
                        </select>
                    </div>


                    <div class="reset-button">
                        <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                        <a href="<?php echo base_url(); ?>admin/course"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>

                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>
