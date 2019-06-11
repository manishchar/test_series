<style>
    .panel-heading .dropdown-menu-right{display:none !important;}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group" id="">
                                    <h4>View Course</h4>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="btn-group">
                                   <a href="<?php echo base_url();?>admin/course" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Course title: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->title);}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Technology: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->lab_no);}else{ echo "-";} ?>
                            </div>
                        </div>
                          <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Course Detail: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->description);}else{ echo "-";} ?>
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




