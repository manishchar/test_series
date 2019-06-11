<style>
    .alert>p{display: inline-block;}
    .panel-heading .dropdown-menu-right{display:none !important;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1> Staff</h1>
            <small>Manage Staff</small>
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
                       if($this->uri->segment(3))
                       {
                           echo "Edit Staff";
                       }
                       else
                       {
                           echo "Add Staff";
                       }
                       ?>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>index.php/admin/teammember/add_teammember" enctype="multipart/form-data">
                    <?= msg();?>
                    <div class="form-group">
                    <label>Name<span style="color:red;">*</span></label>
                    <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                    <input type="text"  class="form-control"  name="name" placeholder="Enter Name"  value="<?php if(!empty($selectall)){ echo $selectall->name;}elseif($form_data){ echo $form_data['name'];}?>"  required>
                    </div>
                    <div class="form-group">
                        <label> Mobile</label>
                        <input type="number"  class="form-control" name="mobile" placeholder="Enter  Mobile Number" value="<?php if(!empty($selectall)){ echo $selectall->mobile;}elseif($form_data){ echo $form_data['mobile'];}?>"   >
                    </div>
                    <div class="form-group">
                    <label> Email<span style="color:red;">*</span></label>
                    <input type="email"  class="form-control" name="email" placeholder="Enter  Email" value="<?php if(!empty($selectall)){ echo $selectall->email;}elseif($form_data){ echo $form_data['email'];}?>"  required >
                    </div>
                    <div class="form-group">
                    <label> Password<span style="color:red;">*</span></label>
                    <input type="password"  class="form-control" name="password" placeholder="Enter  Password" value="<?php if(!empty($selectall)){ echo $this->encryption->decrypt($selectall->password);}elseif($form_data){ echo $form_data['password'];}?>"  required >
                    </div>

                    
                  
                    <div class="form-group">
                    <label>Address</label>
                    <textarea name="address"  class="form-control" placeholder="Enter Address" required><?php if(!empty($selectall)){ echo $selectall->address;}elseif($form_data){ echo $form_data['address'];}?></textarea>
                    </div>
                    <div class="form-group">
                        <label>User Image</label>
                        <input type="file" name="files" >
                    </div>
                       <div class="form-group">
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
                    <div class="form-group">
                        <label>Status<span style="color:red;">*</span></label>
                        <select class="form-control" name="status">
                            <option <?php if($form_data['status']){if($form_data['status']==1){echo "selected";}}elseif(!empty($selectall)){ if($selectall->status==1){ echo " selected";}  }  ?> value="1">Active</option>
                            <option  <?php if($form_data['status']){if($form_data['status']==0){echo "selected";}}elseif(!empty($selectall)){ if($selectall->status==0){ echo " selected";}  }  ?> value="0">Inactive</option>
                        </select>
                    </div>

                 


                     <div class="form-group">
                        <label for="exampleInputEmail1">Select Permissions*</label>
                        <table  class="table table-bordered table-striped" >
                            <tr>
                                <td class="text-center"><strong>Page Name</strong></td>
                                <td class="text-center"><strong>View</strong> </td>
                                <td class="text-center"><strong>Add</strong> </td>
                                <td class="text-center"><strong>Edit</strong> </td>
                                <td class="text-center"><strong>Delete</strong></td>
                                <td class="text-center"><strong>No Permission</strong></td>
                            </tr>
                            <?php

                           // print_r($padedata); exit;
                            foreach($padedata  as $key=>$value)
                            {
                              if(!empty($selectall))
                                {
                                    $pagevalue=$this->admin->getRow('select * from permissions where admin_id='.$selectall->id.' && page_id='.$key.' ');
                                }
                                ?>
                                <tr>
                                    <td><?php echo ucfirst($value);?><input  type="hidden" name="page_id[]" value="<?php echo $key;?>"></td>
                                  <td class="text-center"><input <?php if(!empty($pagevalue) && $pagevalue->view_access==1){echo "checked";} ?> type="checkbox" name='view_access[<?php echo $key;?>]' value="1"  id="view_access<?php echo $key;?>" onchange="uncheckno(<?php echo $key; ?>)" > </td>
                                    <td class="text-center"><input <?php if(!empty($pagevalue) && $pagevalue->add_access==1){echo "checked";} ?> type="checkbox" name='add_access[<?php echo $key;?>]' value="1"  id="add_access<?php echo $key;?>"  onchange="uncheckno(<?php echo $key; ?>)"> </td>
                                    <td class="text-center"><input <?php if(!empty($pagevalue) && $pagevalue->edit_access==1){echo "checked";} ?> type="checkbox" name='edit_access[<?php echo $key;?>]' value="1"  id="edit_access<?php echo $key;?>"  onchange="uncheckno(<?php echo $key; ?>)"> </td>
                                    <td class="text-center"><input <?php if(!empty($pagevalue) && $pagevalue->delete_access==1){echo "checked";} ?> type="checkbox" name='delete_access[<?php echo $key;?>]' value="1"  id="delete_access<?php echo $key;?>"  onchange="uncheckno(<?php echo $key; ?>)" > </td>
                                    <td class="text-center"><input  <?php if(!empty($pagevalue) && $pagevalue->no_access==1){echo "checked";}elseif($this->uri->segment(3)==''){ echo "checked";} ?> type="checkbox" name='no_access[<?php echo $key;?>]' value="1"  id="no_access<?php echo $key;?>" onchange="uncheckall(<?php echo $key; ?>)"> </td>
                                </tr>
                                <?php
                            }
                           ?>
                          </table>
                    </div>
                    <div class="reset-button">
                        <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                        <a href="<?php echo base_url(); ?>index.php/admin/teammember"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>

                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>
<script>
function uncheckno(id)
{
    $('#no_access'+id).prop( "checked", false );
}
function uncheckall(id)
{
    if($("#no_access"+id).is(':checked'))
    {
        $('#view_access'+id).prop( "checked", false );
        $('#add_access'+id).prop( "checked", false );
        $('#edit_access'+id).prop( "checked", false );
        $('#delete_access'+id).prop( "checked", false );
    }
}
</script>