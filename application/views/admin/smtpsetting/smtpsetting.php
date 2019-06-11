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
            <i class="fa fa-gear"></i>
        </div>
        <div class="header-title">
            <h1>SMTP Setting</h1>
            <small>Manage SMTP Setting</small>
        </div>
    </section>
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonlist">
                       <h4>
                        SMTP Setting
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>admin/smtpsetting/update_smtpsetting" enctype="multipart/form-data">
                    <?= msg();?>
                    <div class="form-group">
                        <label>Username<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="smtp_username" placeholder="Enter SMTP User Name"  value="<?php if(!empty($selectall)){ echo $selectall['smtp_username'];}elseif($form_data){ echo $form_data['smtp_username'];}?>"  required>
                    </div>
                    <div class="form-group">
                        <label>Password<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="smtp_password" placeholder="Enter SMTP Pssword"  value="<?php if(!empty($selectall)){ echo $selectall['smtp_password'];}elseif($form_data){ echo $form_data['smtp_password'];}?>"  required>
                    </div>
                    <div class="form-group">
                        <label>Host<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="smtp_host" placeholder="Enter SMTP Host"  value="<?php if(!empty($selectall)){ echo $selectall['smtp_host'];}elseif($form_data){ echo $form_data['smtp_host'];}?>"  required>
                    </div>
                    <div class="form-group">
                        <label>Port<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="smtp_port" placeholder="Enter SMTP Post"  value="<?php if(!empty($selectall)){ echo $selectall['smtp_port'];}elseif($form_data){ echo $form_data['smtp_port'];}?>"  required>
                    </div>
                    <div class="reset-button">
                        <?php
                        if(has_permission(12,'edit')==true)
                        {
                        ?>
                        <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                        <?php
                        }
                        ?>
                    </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>
