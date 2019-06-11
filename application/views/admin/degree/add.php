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
            <h1>Degree</h1>
            <small>Manage Degree</small>
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
                           echo "Edit Degree";
                       }
                       else
                       {
                           echo "Add Degree";
                       }
                       ?>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>admin/degree/add_degree" enctype="multipart/form-data">
                    <?= msg();?>
                    <div class="form-group">
                        <label>Degree<span style="color:red;">*</span> (eg: BE,MCA..)</label>
                        <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                        <input type="text"  class="form-control"  name="name" placeholder="Enter Name"  value="<?php if(!empty($selectall)){ echo $selectall->name;}elseif($form_data){ echo $form_data['name'];}?>"  required>
                    </div>
                  
                  <div class="form-group">
                    <?php
if(!empty($selectall)){
  $arr = explode(',', $selectall->semester);
}
                    ?>
                        <label>Semester<span style="color:red;">*</span></label>
                        <div class="col-sm-12">
                         <input id="1" type="checkbox" name="semester[]" value="1" <?php if(in_array('1',$arr)){ echo "checked"; } ?>>
                         <label for="1">1 Semester</label>
                         <input id="2" type="checkbox" name="semester[]" value="2" <?php if(in_array('2',$arr)){ echo "checked"; } ?>>
                         <label for="2">2 Semester</label>
                         <input id="3" type="checkbox" name="semester[]" value="3" <?php if(in_array('3',$arr)){ echo "checked"; } ?>>
                         <label for="3">3 Semester</label>
                         <input id="4" type="checkbox" name="semester[]" value="4" <?php if(in_array('4',$arr)){ echo "checked"; } ?>>
                         <label for="4">4 Semester</label>
                       </div>
                         <div class="col-sm-12">
                         <input id="5" type="checkbox" name="semester[]" value="5" <?php if(in_array('5',$arr)){ echo "checked"; } ?>>
                         <label for="5">5 Semester</label>
                         <input id="6" type="checkbox" name="semester[]" value="6" <?php if(in_array('6',$arr)){ echo "checked"; } ?>>
                         <label for="6">6 Semester</label>
                          <input id="7" type="checkbox" name="semester[]" value="7" <?php if(in_array('7',$arr)){ echo "checked"; } ?>>
                         <label for="7">7 Semester</label>

                          <input id="8" type="checkbox" name="semester[]" value="8" <?php if(in_array('8',$arr)){ echo "checked"; } ?>>
                         <label for="8">8 Semester</label>
                       </div>
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
                        <a href="<?php echo base_url(); ?>admin/degree"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>

                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>
