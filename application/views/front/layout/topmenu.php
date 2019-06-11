<!-- Social links Start -->
<section class="top-social">
    <div class="container">
        <div class="social-links">
            <label>
                <img src="<?php echo base_url(); ?>assets/front/images/icons/close-envelope.png">
                <?php echo SITEEMAIL;//define in config.php ?>
            </label>&nbsp;
            <label>
                <img src="<?php echo base_url(); ?>assets/front/images/icons/speech-bubble.png">
                +91 <?php echo SITENUMBER;//define in config.php ?>
            </label>
            <ul>
                <li><a target="_blank" href="<?php echo SITEFACEBOOKURL;//define in config.php ?>"> <img src="<?php echo base_url(); ?>assets/front/images/icons/facebook.png"> </a></li>
                <li><a target="_blank" href="<?php echo SITETWITTERURL;//define in config.php ?>"> <img src="<?php echo base_url(); ?>assets/front/images/icons/twitter.png"> </a></li>
                <li><a target="_blank" href="<?php echo SITEINSTAGRAMURL;//define in config.php ?>"> <img src="<?php echo base_url(); ?>assets/front/images/icons/instagram.png"> </a></li>
                <li><a target="_blank" href="<?php echo SITELINKEDINURL;//define in config.php ?>"> <img src="<?php echo base_url(); ?>assets/front/images/icons/linkedin.png"> </a></li>
            </ul>
        </div>
    </div>
</section>
<!-- Social links End -->
<!-- navbar -->
<section class="container-fluid" style="padding-right: 0px;padding-left: 0px;">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php  echo base_url();?>"><img src="<?php echo base_url(); ?>assets/front/images/Logo.png" style="height: 45px;width: auto;"> </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?php if($this->uri->segment(1)=="aboutus"){ echo "active";} ?>" style="text-transform: uppercase;"><a href="<?php echo base_url(); ?>aboutus"><?php echo getcms(1); ?></a></li>
                    <li class="<?php if($this->uri->segment(1)=="resedential"){ echo "active";} ?>" style="text-transform: uppercase;"><a href="<?php echo base_url(); ?>resedential"><?php echo getcms(7); ?></a></li>
                    <li class="<?php if($this->uri->segment(1)=="restaurants"){ echo "active";} ?>" style="text-transform: uppercase;"><a href="<?php echo base_url(); ?>restaurants"><?php echo getcms(8); ?></a></li>
                    <li class="<?php if($this->uri->segment(1)=="franchies"){ echo "active";} ?>" style="text-transform: uppercase;"><a href="<?php echo base_url(); ?>franchies"><?php echo getcms(9); ?></a></li>
                    <li class="<?php if($this->uri->segment(1)=="commercial"){ echo "active";} ?>" style="text-transform: uppercase;"><a href="<?php echo base_url(); ?>commercial"><?php echo getcms(14); ?></a></li>
                    <li class="<?php if($this->uri->segment(1)=="vendor"){ echo "active";} ?>" style="text-transform: uppercase;"><a href="<?php echo base_url(); ?>vendor">VENDOR</a></li>
                    <li class="<?php if($this->uri->segment(1)=="marketing_imagery"){ echo "active";} ?>" style="text-transform: uppercase;"><a href="<?php echo base_url(); ?>marketing_imagery">MARKETING IMAGERY</a></li>
                    <li class="<?php if($this->uri->segment(1)=="contactus"){ echo "active";} ?>" style="text-transform: uppercase;"><a href="<?php echo base_url(); ?>contactus">CONTACT US</a></li>
                </ul>
            </div>
        </div>
    </nav>
</section>