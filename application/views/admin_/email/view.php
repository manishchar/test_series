<div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="mailbox">
                        <div class="mailbox-header">
                           <div class="row">
                              <div class="col-xs-4">
                                 <div class="inbox-avatar">
                                    <i class="fa fa-user-secret"> </i>
                                    <div class="inbox-avatar-text hidden-xs hidden-sm">
                                       <div class="avatar-name"><?php echo $details[0]->type;?></div>
                                       <div><small>Mailbox</small></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xs-8">
                                 <div class="inbox-toolbar btn-toolbar">
                                    <div class="btn-group">
                                       <a href="<?php echo base_url();?>admin/email" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
                                    </div>
                                  
                                   
                                    <div class="btn-group">
                                       <button type="button" class="btn btn-default" onclick="window.print()"><span class="fa fa-print"></span></button>
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="mailbox-body">
                           <div class="row m-0">
                              
                              <div class="col-xs-12 col-sm-12 col-md-12 p-0 inbox-mail">
                                 <div class="inbox-avatar p-20 border-btm">
                                    <img src="assets/dist/img/avatar5.png" class="border-green hidden-xs hidden-sm" alt="">
                                    <div class="inbox-avatar-text">
                                       <div class="avatar-name"><strong>From: </strong>
                                          <?php echo $details[0]->from_name;?> - <em><a href="javascript:;" class="__cf_email__" data-cfemail="">[<?php echo $details[0]->from_email;?>]</a></em>
                                       </div>
                                       <div><small><strong>Subject: </strong><?php echo $details[0]->subject;?></small></div>
                                    </div>
                                    <div class="inbox-date text-right hidden-xs hidden-sm">
                                       <div><span class="bg-custom badge"><small>Email Template</small></span></div>
                                       <div><small><?php echo date('M d , Y');?></small></div>
                                    </div>
                                 </div>
                                   <div class="inbox-mail-details p-20">
                                   <?php echo $details[0]->body;?>
                                   </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>