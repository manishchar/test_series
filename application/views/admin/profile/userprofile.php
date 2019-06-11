<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-user"></i>
        </div>
        <div class="header-title">
            <h1>User Profile</h1>
            <small>Manage Profile</small>
        </div>
    </section>
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonlist">
                       <h4>
                        Manage Profile
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>admin/userprofile/updateprofile" enctype="multipart/form-data">
                    <?= msg();?>
                    <div class="form-group">
                        <label>Name<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="name" placeholder="Enter Name"  value="<?php if(!empty($selectall)){ echo $selectall->name;}elseif($form_data){ echo $form_data['name'];}?>"  required>
                    </div>
                    <div class="form-group">
                        <label> Mobile<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control" name="mobile" placeholder="Enter  Mobile Number" value="<?php if(!empty($selectall)){ echo $selectall->mobile;}elseif($form_data){ echo $form_data['mobile'];}?>"  required >
                    </div>
                    <div class="form-group">
                        <label> Email<span style="color:red;">*</span></label>
                        <input  disabled  class="form-control"  value="<?php if(!empty($selectall)){ echo $selectall->email;}?>" >
                    </div>

                  
              
                    <div class="form-group">
                        <label>Address<span style="color:red;">*</span> </label>
                        <textarea name="address"  class="form-control" placeholder="Enter Address" required><?php if(!empty($selectall)){ echo $selectall->address;}elseif($form_data){ echo $form_data['address'];}?></textarea>
                    </div>
                    <div class="form-group">
                        <label>User Image</label>
                        <input type="file" name="files" class="" >
                    </div>
                    <div class="form-group">
                        <?php
                        if(!empty($selectall))
                        {
                            if($selectall->image && file_exists('uploads/teammember/resize/'.$selectall->image))
                            {
                            ?>
                            <img src="<?php echo base_url(); ?>uploads/teammember/resize/<?php echo $selectall->image; ?>" style="width:100px;height: 100px;" class="form-control"/>
                            <span style="margin-left:40px;"><a href="<?php echo base_url(); ?>admin/userprofile/deleteimage" ><i class="fa fa-close"></i></a></span>
                            <?php
                            }
                        }
                        ?>
                    </div>


                    <div class="reset-button">
                        <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                    </div>

                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>

</div>