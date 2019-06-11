<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
     

                     <?php
                       if($this->uri->segment(2) == "branchreport" && $this->uri->segment(3) == "detail")
                       {?>
                        <title><?php echo $detail->cname; ?>   <?php echo $newDate = date("d-m-Y", strtotime($detail->startdate));

                        ?>   <?php echo $detail->starttime; ?></title> 
                     <?php   }
                     else if($this->uri->segment(2) == "collegereport" && $this->uri->segment(3) == "detail")
                       {?>
                        <title>College Name : <?php echo $detail->cname; ?> ,   Branch Name : <?php echo $detail->bname; ?></title> 
                     <?php   }
                     else if($this->uri->segment(2) == "student" && $this->uri->segment(3) == "detail")
                       {?>
                        <title>Name : <?php echo $selectall->name; ?> ,   Roll No : <?php echo $selectall->roll_no;  ?></title> 
                     <?php   }
                       else
                       {?>
                        <title>Appin Admin panel</title>   
                      <?php  }
                       ?>
                      
      <!-- Favicon and touch icons -->
      <link href="<?php echo base_url();?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="<?php echo base_url();?>assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="<?php echo base_url();?>assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="<?php echo base_url();?>assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="<?php echo base_url();?>assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="<?php echo base_url();?>assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->

      <!--datatable css-->
       <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.css"/>
      <!-- Theme style -->
      <link href="<?php echo base_url();?>assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="<?php echo base_url();?>assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style

         =====================================================================-->
 <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
 <script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="<?= base_url().'assets/admin/js/' ?>jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>


      <link rel="stylesheet" href="<?= base_url().'assets/admin/js/' ?>jquery-confirm.min.css" />
     
      <script src="<?= base_url().'assets/admin/js/' ?>jquery-confirm.min.js"></script>
      <style>
          .activeli{color: #009688!important}
      </style>
      <?php if( $this->uri->segment(2)=='student'){  ?>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap-grid.css">
                                        <style>
                                                body{
                                                  -webkit-print-color-adjust: exact; 
                                                }
                                        
                                                .fee-reciept-heading {
                                                    background-color: #000;
                                                    -webkit-print-color-adjust: exact; 
                                                    width: 18%;
                                                    height: 40px;
                                                    color: #fff;
                                                    font-weight: bold;
                                                    text-align: center;
                                                    font-size: 135%;
                                                }
                                        
                                                hr {
                                                    margin-top: 4px;
                                                    margin-bottom: 5px;
                                                    border-top: 3px solid rgb(0, 0, 0);
                                                }
                                        
                                                .reg-no span {
                                                    color: red;
                                                    font-weight: bold;
                                                    font-size: 20px;
                                                }
                                                .dots{
                                                  position:absolute;
                                                  bottom:-3px;
                                                }
                                            </style>
                                          <?php } ?>

   </head>
   <body class="hold-transition sidebar-mini">
        <div id="preloader">
           <div id="status"></div>
        </div>
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo base_url(); ?>admin/dashboard" class="logo"> 
                    <!-- <img src="<?php echo base_url();?>assets/dist/img/logo.png"  width="140" height="60" alt="user">-->
                   <span class="logo-mini" style="color:white !important; font-weight:bold;">
                        Appin
                   </span>
                   <span class="logo-lg" style="color:white !important; font-weight:bold;">
                        Appin
                   </span>
                </a>
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="pe-7s-angle-left-circle"></span>
                    </a>
                    <a href="#search"><span class="pe-7s-search"></span></a>
                    <div id="search">
                        <button type="button" class="close">×</button>
                        <form>
                            <input type="search" value="" placeholder="Search.." />
                            <button type="submit" class="btn btn-add">Search...</button>
                        </form>
                    </div>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown dropdown-user">
                               <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                               <?php
                               $admindata=$this->admin->getRow('select * from admin where id=1');
                               if(!empty($admindata))
                               {
                                   if($admindata->image && file_exists('uploads/teammember/resize/'.$admindata->image))
                                   {
                                   ?>
                                   <img src="<?php echo base_url(); ?>uploads/teammember/resize/<?php echo $admindata->image; ?>" class="img-circle" width="45" height="45"/>
                                   <?php
                                   }
                                   else
                                   {
                                   ?>
                                   <img src="<?php echo base_url();?>assets/dist/img/avatar5.png" class="img-circle" width="45" height="45" alt="user"></a>
                                   <?php
                                   }
                               }
                               ?>
                                <ul class="dropdown-menu" >
                                    <li><a href="<?php echo base_url();?>admin/userprofile"><i class="fa fa-user"></i> User Profile</a></li>
                                    <li><a href="<?php echo base_url();?>admin/changepassword"><i class="fa fa-inbox"></i> Change Password</a></li>
                                    <li><a href="<?php echo base_url();?>admin/logout"><i class="fa fa-sign-out"></i> Signout</a></li>
                               </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
         </header>
