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
            <h1>Genaral Setting</h1>
            <small>Manage Genaral Setting</small>
        </div>
    </section>
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonlist">
                       <h4>
                        Genaral Setting
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>admin/genaralsetting/update_genaralsetting" enctype="multipart/form-data">
                    <?= msg();?>

                    <div class="form-group">
                        <label>Contact Name<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="contact_name" placeholder="Enter Contact Name"  value="<?php if(!empty($selectall)){ echo $selectall['contact_name'];}elseif($form_data){ echo $form_data['contact_name'];}?>"  required>
                    </div>
                    <div class="form-group">
                        <label>Contact Email<span style="color:red;">*</span></label>
                        <input type="email"  class="form-control"  name="contact_email" placeholder="Enter Contact Email"  value="<?php if(!empty($selectall)){ echo $selectall['contact_email'];}elseif($form_data){ echo $form_data['contact_email'];}?>"  required>
                    </div>
                    <div class="form-group">
                        <label>Contact Number<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="contact_number" placeholder="Enter Contact Number"  value="<?php if(!empty($selectall)){ echo $selectall['contact_number'];}elseif($form_data){ echo $form_data['contact_number'];}?>"  required>
                    </div>
                    <div class="form-group">
                        <label>Contact Address<span style="color:red;">*</span> </label>
                        <textarea name="contact_address"  class="form-control" placeholder="Enter Contact Address" required><?php if(!empty($selectall)){ echo $selectall['contact_address'];}elseif($form_data){ echo $form_data['contact_address'];}?></textarea>
                    </div>

                    <div class="form-group">
                        <label>General Meta Title<span style="color:red;">*</span> </label>
                        <input type="text"  class="form-control"  name="general_meta_title" placeholder="Enter General Meta Title"  value="<?php if(!empty($selectall)){ echo $selectall['general_meta_title'];}elseif($form_data){ echo $form_data['general_meta_title'];}?>" >
                    </div>
                    <div class="form-group">
                        <label>General Meta Tag<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="general_meta_tags" placeholder="Enter General Meta Tag"  value="<?php if(!empty($selectall)){ echo $selectall['general_meta_tags'];}elseif($form_data){ echo $form_data['general_meta_tags'];}?>" >
                    </div>
                    <div class="form-group">
                        <label>General Meta Description<span style="color:red;">*</span></label>
                        <textarea name="general_meta_desc"  class="form-control" placeholder="Enter General Meta Description"><?php if(!empty($selectall)){ echo $selectall['general_meta_desc'];}elseif($form_data){ echo $form_data['general_meta_desc'];}?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Facebook Url</label>
                        <input type="text"  class="form-control"  name="facebook_url" placeholder="Enter Facebook Url"  value="<?php if(!empty($selectall)){ echo $selectall['facebook_url'];}elseif($form_data){ echo $form_data['facebook_url'];}?>"  required>
                    </div>
                    <div class="form-group">
                        <label>Twitter Url</label>
                        <input type="text"  class="form-control"  name="twitter_url" placeholder="Enter Twitter Url"  value="<?php if(!empty($selectall)){ echo $selectall['twitter_url'];}elseif($form_data){ echo $form_data['twitter_url'];}?>"  required>
                    </div>
                    <div class="form-group">
                        <label>Instagram Url</label>
                        <input type="text"  class="form-control"  name="instagram_url" placeholder="Enter Instagram Url"  value="<?php if(!empty($selectall)){ echo $selectall['instagram_url'];}elseif($form_data){ echo $form_data['instagram_url'];}?>"  required>
                    </div>
                    <div class="form-group">
                        <label>Linkedin Url</label>
                        <input type="text"  class="form-control"  name="linkedin_url" placeholder="Enter Linkedin Url"  value="<?php if(!empty($selectall)){ echo $selectall['linkedin_url'];}elseif($form_data){ echo $form_data['linkedin_url'];}?>"  required>
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
