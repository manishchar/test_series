<style>
    .panel-heading .dropdown-menu-right{display:none !important;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Staff</h1>
            <small>Manage Staff</small>
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
                                    <h4>View Staff</h4>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="btn-group">
                                   <a href="<?php echo base_url();?>index.php/admin/teammember" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
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
                                <strong>Email: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->email;}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20 pass">
                            <div class="avatar-name">
                                <strong>Password: </strong>
                                <?php if(!empty($selectall)){ echo mb_strimwidth($selectall->password,0,25,'...');}else{ echo "-";} ?>
                                <a href="javascript:void(0);" onclick="viewpassword();"><i class=" fa fa-eye"></i></a>
                            </div>
                        </div>
                       <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Country: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->cname);}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20">
                           <div class="avatar-name">
                               <strong>City: </strong>
                               <?php if(!empty($selectall)){ echo ucfirst($selectall->city);}else{ echo "-";} ?>
                           </div>
                       </div>
                        <div class="inbox-mail-details p-20">
                           <div class="avatar-name">
                               <strong>Address: </strong>
                               <?php if(!empty($selectall)){ echo $selectall->address;}else{ echo "-";} ?>
                           </div>
                        </div>
                        <div class="inbox-mail-details p-20">
                           <div class="avatar-name">
                               <strong>User Image: </strong>
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
                        <div class="form-group">
                        <label >Permissions</label>
                            <table  class="table table-bordered table-striped" >
                                <tr>
                                    <td class=""><strong>Page Name</strong></td>
                                    <td class="text-center"><strong>View</strong> </td>
                                    <td class="text-center"> <strong>Add</strong> </td>
                                    <td class="text-center"><strong>Edit</strong> </td>
                                    <td class="text-center"><strong>Delete</strong></td>
                                    <td class="text-center"><strong>No Permission</strong></td>
                                </tr>
                                <?php
                                foreach($padedata  as $key=>$value)
                                {
                                    if(!empty($selectall))
                                    {
                                        $pagevalue=$this->admin->getRow('select * from permissions where admin_id='.$selectall->id.' && page_id='.$key.' ');
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo ucfirst($value);?></td>
                                        <td class="text-center"><input disabled <?php if(!empty($pagevalue) && $pagevalue->view_access==1){echo "checked";} ?>   type="checkbox"></td>
                                        <td class="text-center"><input disabled <?php if(!empty($pagevalue) && $pagevalue->add_access==1){echo "checked";} ?>    type="checkbox"></td>
                                        <td class="text-center"><input disabled <?php if(!empty($pagevalue) && $pagevalue->edit_access==1){echo "checked";} ?>   type="checkbox"></td>
                                        <td class="text-center"><input disabled <?php if(!empty($pagevalue) && $pagevalue->delete_access==1){echo "checked";} ?> type="checkbox"></td>
                                        <td class="text-center"><input disabled <?php if(!empty($pagevalue) && $pagevalue->no_access==1){echo "checked";} ?>    type="checkbox"></td>
                                    </tr>
                                    <?php
                                }
                              ?>
                           </table>
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


