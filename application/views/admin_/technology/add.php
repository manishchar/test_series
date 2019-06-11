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
            <h1>Technology</h1>
            <small>Manage Technology</small>
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
                           echo "Edit Technology";
                       }
                       else
                       {
                           echo "Add Technology";
                       }
                       ?>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>admin/technology/add_technology" enctype="multipart/form-data">
                    <?= msg();?>
                    <div class="form-group">
                        <label>Technology<span style="color:red;">*</span> (eg: JAVA,PYTHON..)</label>
                        <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                        <input type="text" autocomplete="off"  class="form-control"  name="name" placeholder="Enter Name"  value="<?php if(!empty($selectall)){ echo $selectall->name;}elseif($form_data){ echo $form_data['name'];}?>"  required >
                    </div>
                  <div class="form-group">
                    <?php 
                    $topicArr = explode(',', $selectall->topic);
//print_r($topicArr);
                     ?>
                    <input type="checkbox" name="topic[]" value="tranning" id="tranning" <?php if(in_array('tranning',$topicArr)){ echo 'checked'; } ?>>
                    <label for="tranning">Tranning</label>

                    <input type="checkbox" name="topic[]" value="internship" id="internship" <?php if(in_array('internship',$topicArr)){ echo 'checked'; } ?>>
                    <label for="internship">Internship</label>

                    <input type="checkbox" name="topic[]" value="executive_lecture" id="executive_lecture" <?php if(in_array('executive_lecture',$topicArr)){ echo 'checked'; } ?>>
                    <label for="executive_lecture">Executive Lecture</label>

                    <input type="checkbox" name="topic[]" value="project" id="project" <?php if(in_array('project',$topicArr)){ echo 'checked'; } ?>>
                    <label for="project">Project</label>
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
                        <a href="<?php echo base_url(); ?>admin/technology"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>

                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>
