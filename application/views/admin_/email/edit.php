<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<style>
    .alert>p{display: inline-block;}
    .panel-heading .dropdown-menu-right{display:none !important;}
    .wysihtml5-toolbar li:nth-child(5){display:none !important;}
    .wysihtml5-toolbar li:last-child{display:none !important;}
</style>
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-envelope-o"></i>
               </div>
               <div class="header-title">
                  <h1>Email Template</h1>
                  <small>Edit Template</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="javascript:;"> 
                              <i class="fa fa-list"></i> Email Template</a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-9" method="post" action="">
                           <?php
							$all = $this->messages->get();
							foreach($all as $type=>$messages)
							{
								foreach($messages as $message)
								{
								?>
									<div class="alert  alert-dismissable <?php echo $type; ?>">
										<a href="javascript:;" class="close" data-dismiss="alert" aria-label="close">×</a>
										<?php
										if($type=='alert-danger')
										{ 
										?>
											<span class="glyphicon glyphicon-exclamation-sign"></span>
										<?php
										}
										if($type=='alert-success')
										{ 
										?>
											<span class="glyphicon glyphicon-ok"></span>
										<?php
										}
										if($type=='alert-info')
										{ 
										?>
											<span class="glyphicon glyphicon-info-sign"></span>
										<?php
										}
										if($type=='alert-warning')
										{ 
										?>
											<span class="glyphicon glyphicon-alert"></span>
										<?php
										}
										?>
										<?php echo $message; ?> 
									</div>
								<?php
								}
							}
                   		   ?> 
                               <div class="form-group">
                                 <label>Type  </label>
                                 <input type="text" name="type" id="type"  class="form-control" placeholder="Enter Type"  value="<?php echo $details[0]->type;?>" required>
                              </div>
                              <div class="form-group">
                                 <label>From Name </label>
                                 <input type="text"  class="form-control" name="from_name" id="from_name" placeholder="Enter From Name " value="<?php echo $details[0]->from_name;?>" required>
                              </div>
                              <div class="form-group">
                                 <label>From Email</label>
                                 <input type="email"  class="form-control" name="from_email" id="from_email" value="<?php echo $details[0]->from_email;?>" placeholder="Enter From Email"  required>
                              </div>
                              <div class="form-group">
                                 <label>Subject </label>
                                 <input type="text" name="subject" id="subject"  class="form-control" placeholder="Enter Subject" value="<?php echo $details[0]->subject;?>"   required>
                              </div>
                              
                              <div class="form-group">
                                 <label>Body  </label>
                                 <textarea name="body" id="body"  class="form-control textarea" placeholder="Enter Mail Body" required><?php echo $details[0]->body;?></textarea>
                                
                              </div>
                              
                            
                              <div class="reset-button">
                              
                                 <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                                <button class="btn btn-warning w-md m-b-5" type="reset">Reset</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>