<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
           
        </div>
        <div class="header-title">
            <h1>Fees Report Dashboard</h1>
          
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

              <?php  if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  || $this->session->userdata('admin_type') == 4)
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

     
        </div>
    </section>
</div>