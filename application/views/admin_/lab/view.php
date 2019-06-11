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
            <h1>Lab</h1>
            <small>Manage Lab</small>
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
                                    <h4>View Lab</h4>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="btn-group">
                                   <a href="<?php echo base_url();?>admin/category" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Name: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->name);}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Zone: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->zone);}else{ echo "-";} ?>
                            </div>
                        </div>
                          <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Capacity: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->capacity);}else{ echo "-";} ?>
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




