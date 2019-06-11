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
            <h1>Test Series</h1>
            <small>List</small>
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
                                    <h4>View Batch</h4>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="btn-group">
                                   <a href="<?php echo base_url();?>admin/batch" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                          
                         
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Course: </strong>
                                <?php if(!empty($selectall))
                                {
                                   // $getcategory =  getcategory($selectall->category_id);
                                     $course=$this->admin->getVal('SELECT title FROM course where id='.$selectall->course_id.'');
                                    echo ucfirst($course);
                                    //echo 'SELECT title FROM course where id = '.$selectall->course.'';
                                }
                                else{ echo "-";} ?>
                            </div>
                        </div>
                          <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Faculty: </strong>
                                <?php if(!empty($selectall))
                                {
                                   // $getcategory =  getcategory($selectall->category_id);
                                    $faculty=$this->admin->getVal('SELECT name FROM faculty where id='.$selectall->faculty_id.'');
                                    echo ucfirst($faculty);
                                    //echo 'SELECT title FROM course where id = '.$selectall->course.'';
                                }
                                else{ echo "-";} ?>
                            </div>
                        </div>
                          <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Lab: </strong>
                                <?php if(!empty($selectall))
                                {
                                   // $getcategory =  getcategory($selectall->category_id);
                                      $lab=$this->admin->getRow('SELECT name,capacity FROM lab where id='.$selectall->lab_id.'');
                                    echo ucfirst($lab->name).'  ('.$lab->capacity .')';
                                    //echo 'SELECT title FROM course where id = '.$selectall->course.'';
                                }
                                else{ echo "-";} ?>
                            </div>
                        </div>
                         
                          <div class="inbox-mail-details p-20 pass">
                            <div class="avatar-name">
                                <strong>Fees: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->fees);}else{ echo "-";} ?>
                            </div>
                        </div>
                      
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Start Date: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->startdate;}else{ echo "-";} ?>
                            </div>
                        </div>
                     
                        <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>End Date: </strong>
                                <?php if(!empty($selectall)){ echo $selectall->enddate;}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20 pass">
                            <div class="avatar-name">
                                <strong>Start Time: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->starttime);}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20 pass">
                            <div class="avatar-name">
                                <strong>End Time: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->endtime);}else{ echo "-";} ?>
                            </div>
                        </div>
                        <div class="inbox-mail-details p-20 pass">
                            <div class="avatar-name">
                                <strong>Description: </strong>
                                <?php if(!empty($selectall)){ echo ucfirst($selectall->description);}else{ echo "-";} ?>
                            </div>
                        </div>
                         <div class="inbox-mail-details p-20 pass">
                            <div class="avatar-name">
                                <strong>Status: </strong>
                               <?php
                                            if ($selectall->status == 1)
                                            {
                                            ?>
                                                <span class="label-custom label label-default">Active</span>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                                <span class="label-danger label label-default">Inctive</span>
                                            <?php
                                            }
                                            ?>
                            </div>
                        </div>
                      
                      
                         
                         <div class="reset-button">
                        <a href="<?php echo base_url(); ?>admin/batch"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
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






