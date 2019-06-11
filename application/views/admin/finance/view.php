<link href="<?php echo base_url(); ?>assets/plugins/modals/component.css" rel="stylesheet" type="text/css"/>
<style>
    .panel-heading .dropdown-menu-right{display:none !important;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Finance</h1>
            <small>Manage Finance</small>
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
                                    <h4>View Finance</h4>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="btn-group">
                                   <a href="<?php echo base_url();?>admin/finance" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                          <div class="inbox-mail-details p-20">
                           <div class="avatar-name">
                               <strong> Image: </strong>
                               <?php
                                if(!empty($selectall))
                                {
                                    if($selectall->image && file_exists('uploads/teammember/resize/'.$selectall->image))
                                    {
                                    ?>
                                    <img src="<?php echo base_url(); ?>uploads/teammember/resize/<?php echo $selectall->image; ?>" style="width:100px;height: 100px;" class="form-control"/>
                                    <?php
                                    }
                                }
                                ?>
                           </div>
                         </div>
                           <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Name: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->name);}else{ echo "-";} ?>
                            </div>
                        </div>

                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Email: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->email;}else{ echo "-";} ?>
                            </div>
                        </div>
                     
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Mobile: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->mobile;}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20 pass">
                            <div class="avatar-name">
                                <strong>Address: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->address);}else{ echo "-";} ?>
                            </div>
                        </div>
                       
                      
                         
                         <div class="reset-button">
                        <a href="<?php echo base_url(); ?>admin/finance"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function viewpassword()
{
    <?php
    $plantext='';
    if(!empty($selectall))
    {
        $plantext=$this->encryption->decrypt($selectall->password);
    }
    ?>
    $(".pass").html('');
    $(".pass").html('<div class="avatar-name"><strong>Password: <?php echo $plantext; ?> </strong></div>');

}
</script>






