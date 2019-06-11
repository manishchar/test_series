<style>
    .panel-heading .dropdown-menu-right{display:none !important;}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-list"></i>
        </div>
        <div class="header-title">
            <h1>Marketing Imagery</h1>
            <small>Manage Marketing Imagery</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group" id="">
                                    <h4>View Marketing Imagery</h4>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="btn-group">
                                   <a href="<?php echo base_url();?>admin/marketing_imagery" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Title: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->title);}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Short Description: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->short_description;}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Description: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->description;}else{ echo "-";} ?>
                            </div>
                        </div>

                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Created By: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->created_by;}else{ echo "-";} ?>
                            </div>
                        </div>

                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Presented By: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->presented_by;}else{ echo "-";} ?>
                            </div>
                        </div>

                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Video Code: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->video_code;}else{ echo "-";} ?>
                            </div>
                        </div>

                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Meta Title: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->meta_title);}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Meta Keywords: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->meta_keywords;}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Meta Description: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->meta_description;}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Order No: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->order_no;}else{ echo "-";} ?>
                            </div>
                        </div>
                         <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>URL: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->url;}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20">
                           <div class="avatar-name">
                               <strong>Gallery LOGO: </strong>
                               <div style="margin-left: 15px;">
                                   <?php
                                    if(!empty($selectall))
                                    {
                                        if($selectall->gallery_logo && file_exists('uploads/marketing_imagery/resize/'.$selectall->gallery_logo))
                                        {
                                        ?>
                                        <img src="<?php echo base_url(); ?>uploads/marketing_imagery/resize/<?php echo $selectall->gallery_logo; ?>" style="width:100px;height: 100px;" class="form-control"/>
                                        <?php
                                        }
                                    }
                                    ?>
                                </div>
                           </div>
                        </div>

                        <div class="inbox-mail-details p-20">
                           <div class="avatar-name">
                               <strong>Image: </strong>
                               <?php
                                if(!empty($selectall))
                                {
                                    if($selectall->image && file_exists('uploads/marketing_imagery/resize/'.$selectall->image))
                                    {
                                    ?>
                                    <img src="<?php echo base_url(); ?>uploads/marketing_imagery/resize/<?php echo $selectall->image; ?>" style="width:100px;height: 100px;" class="form-control"/>
                                    <?php
                                    }
                                }
                                ?>
                           </div>
                         </div>

                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Status: </strong>
                                <?php
                                if(!empty($selectall))
                                {
                                   if($selectall->status==1)
                                   {
                                       echo "Active";
                                   }
                                   else
                                   {
                                       echo "Inactive";
                                   }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




