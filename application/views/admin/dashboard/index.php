<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-dashboard"></i>
        </div>
        <div class="header-title">
            <h1>Appin Admin Dashboard</h1>
            <small>Very detailed & featured admin.</small>
        </div>
    </section>
    <section class="content">
        <?php 

        $totalfees=$this->admin->getVal('SELECT sum(totalfees) FROM student where status=1');
      
        
        $paidfees=$this->admin->getVal('SELECT sum(f.amount) FROM student s,fees_payment f WHERE s.id = f.s_id and f.status = 1');
        //echo "string".$paidfees;
      
        $remainfees=  $totalfees - $paidfees;
       
        ?>
        <?= msg();?>
        <div class="row">
               <?php  if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  )
                  {
                  ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <a href="<?php echo base_url(); ?>index.php/admin/technology">
                    <div id="cardbox1">
                        <div class="statistic-box">
                            <i class="fa fa-users fa-3x"></i>
                            <div class="counter-number pull-right">
                                <span class="count-number"><?=$course;?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                </span>
                            </div>
                            <h3>Technology</h3>
                        </div>
                    </div>
                </a>
            </div>
              <?php } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  )
                  {
                  ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <a href="<?php echo base_url(); ?>index.php/admin/lab">
                    <div id="cardbox2">
                        <div class="statistic-box">
                            <i class="fa fa-newspaper-o fa-3x"></i>
                            <div class="counter-number pull-right">
                                <span class="count-number"><?=$lab;?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                </span>
                            </div>
                            <h3>Lab</h3>
                        </div>
                    </div>
                </a>
            </div>
              <?php } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  )
                  {
                  ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <a href="<?php echo base_url(); ?>index.php/admin/faculty">
                    <div id="cardbox2">
                        <div class="statistic-box">
                            <i class="fa fa-list fa-3x"></i>
                            <div class="counter-number pull-right">
                                <span class="count-number"><?=$faculty;?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                </span>
                            </div>
                            <h3>Faculty</h3>
                        </div>
                    </div>
                </a>
            </div>
              <?php } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  || $this->session->userdata('admin_type') == 4)
                  {
                  ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <a href="<?php echo base_url(); ?>index.php/admin/batch">
                    <div id="cardbox2">
                        <div class="statistic-box">
                            <i class="fa fa-users fa-3x"></i>
                            <div class="counter-number pull-right">
                                <span class="count-number"><?=$batch;?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                </span>
                            </div>
                            <h3>Batch</h3>
                        </div>
                    </div>
                </a>
            </div>
              <?php } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  || $this->session->userdata('admin_type') == 4)
                  {
                  ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <a href="<?php echo base_url(); ?>index.php/admin/student">
                    <div id="cardbox2">
                        <div class="statistic-box">
                            <i class="fa fa-industry fa-3x"></i>
                            <div class="counter-number pull-right">
                                <span class="count-number"><?=$student;?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                </span>
                            </div>
                            <h3>Student</h3>
                        </div>
                    </div>
                </a>
            </div>
              <?php } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  || $this->session->userdata('admin_type') == 4)
                  {
                  ?>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <a href="<?php echo base_url(); ?>index.php/admin/student">
                    <div id="cardbox2">
                        <div class="statistic-box">
                            <i class="fa fa-industry fa-3x"></i>
                            <div class="counter-number pull-right">
                                <span class="count-number"><?=$totalfees?$totalfees:0;?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                </span>
                            </div>
                            <h3>Total Fees</h3>
                        </div>
                    </div>
                </a>
            </div>
              <?php } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  || $this->session->userdata('admin_type') == 4)
                  {
                  ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <a href="<?php echo base_url(); ?>index.php/admin/student">
                    <div id="cardbox2">
                        <div class="statistic-box">
                            <i class="fa fa-industry fa-3x"></i>
                            <div class="counter-number pull-right">
                                <span class="count-number"><?=$paidfees?$paidfees:0;?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                </span>
                            </div>
                            <h3>Total Collect Fees</h3>
                        </div>
                    </div>
                </a>
            </div>
              <?php } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  || $this->session->userdata('admin_type') == 4)
                  {
                  ?>
             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <a href="<?php echo base_url(); ?>index.php/admin/student">
                    <div id="cardbox2">
                        <div class="statistic-box">
                            <i class="fa fa-industry fa-3x"></i>
                            <div class="counter-number pull-right">
                                <span class="count-number"><?=$remainfees?$remainfees:0;?></span>
                                <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                                </span>
                            </div>
                            <h3>Total Remain Fees</h3>
                        </div>
                    </div>
                </a>
            </div>
              <?php }
                  ?>
           
        </div>

               <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Pending Student Registration</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php
                        if(!empty($inactivestudent))
                        {
                            foreach ($inactivestudent as $inactivestudenti)
                            {
                            ?>
                            <div>
                                <div class="work-touchpoint">
                                    <div class="work-touchpoint-date">
                                        <span class="day"><?php echo date("d",strtotime($inactivestudenti->date)); ?></span>
                                        <span class="month"><?php echo date("F",strtotime($inactivestudenti->date)); ?></span>
                                    </div>
                                </div>
                                <div class="detailswork">
                                    <a href="<?php  echo base_url();?>admin/student/view/<?php echo $inactivestudenti->id ?>">
                                        <span class="label-custom label label-default pull-right">View</span>
                                    </a>
                                    <a href="#" title="headings"><?php echo ucfirst($inactivestudenti->name); ?></a> <br>
                                    <p><?php echo $inactivestudenti->roll_no; ?> &nbsp;</p>
                                </div>
                            </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <!--  <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php
                        if(!empty($letestpatners))
                        {
                            foreach ($letestpatners as $letestpatnersi)
                            {
                            ?>
                            <div>
                                <div class="work-touchpoint">
                                    <div class="work-touchpoint-date">
                                        <span class="day"><?php echo date("d",strtotime($letestpatnersi->date)); ?></span>
                                        <span class="month"><?php echo date("F",strtotime($letestpatnersi->date)); ?></span>
                                    </div>
                                </div>
                                <div class="detailswork">
                                    <a href="<?php  echo base_url();?>admin/patners/view/<?php echo $letestpatnersi->id ?>">
                                        <span class="label-custom label label-default pull-right">View</span>
                                    </a>
                                    <a href="#" title="headings"><?php echo ucfirst($letestpatnersi->name); ?></a> <br>
                                    <p>&nbsp; </p>
                                </div>
                            </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>-->
            </div>
        </div>
    </section>
</div>