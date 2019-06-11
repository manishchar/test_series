
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Faculty</h1>
            <small>Manage Faculty</small>
             <?php 
                                $technology=$this->admin->getVal('SELECT name FROM technology where id='.$selectall->technology.'');
                                // $getcategory =  getcategory($selectall->category_id);
                                //  $course=$this->admin->getVal('SELECT title FROM course where id = '.$selectall->course.'');
                                echo ucfirst($selectall->technology);
                                    //echo 'SELECT title FROM course where id = '.$selectall->course.'';
                               ?>

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
                                    <h4>View Faculty</h4>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="btn-group">
                                   <a href="<?php echo base_url();?>admin/faculty" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                          <div class="inbox-mail-details p-20">
                           <div class="avatar-name">
                               <strong>Faculty Image: </strong>
                               <?php
                                if(!empty($selectall))
                                {
                                    if($selectall->image && file_exists('uploads/faculty/resize/'.$selectall->image))
                                    {
                                    ?>
                                    <img src="<?php echo base_url(); ?>uploads/faculty/resize/<?php echo $selectall->image; ?>" style="width:100px;height: 100px;" class="form-control"/>
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
                                <strong>Technology: </strong>
                                <?php if(!empty($selectall))
                                {
                                      $technology=$this->admin->getVal('SELECT name FROM technology where id='.$selectall->technology.'');
                                   // $getcategory =  getcategory($selectall->category_id);
                                  //  $course=$this->admin->getVal('SELECT title FROM course where id = '.$selectall->course.'');
                                    echo ucfirst($technology);
                                    //echo 'SELECT title FROM course where id = '.$selectall->course.'';
                                }
                                else{ echo "-";} ?>
                            </div>
                        </div>
                         <div class="inbox-mail-details p-20">
                            <div class="avatar-name">
                                <strong>Job type: </strong>
                                <?php if(!empty($selectall))
                                {
                                   if($selectall->job_type == 1){
                                    echo 'Full Time';
                                   }else{
                                     echo 'Part Time';
                                   }
                                   
                               
                                }
                                else{ echo "-";} ?>
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
                        <a href="<?php echo base_url(); ?>admin/faculty"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>








