<aside class="main-sidebar">
    <div class="sidebar">
        <ul class="sidebar-menu" >
            <li class="<?php if($this->uri->segment(2)=='dashboard'){ echo "active";} ?>" >
                <a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-tachometer"></i><span>Dashboard</span><span class="pull-right-container"></span></a>
            </li>
             <?php $access = $this->session->userdata();
             //print_r($access['permission'][3]);
              ?>
             <?php if( $this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  )
                  { if($this->session->userdata('admin_type') == 1 || ( $access['permission'][1]['view_access'] == '1' && $access['permission'][1]['add_access'] == '1')){

                  
                  ?>
             <li class="treeview <?php if($this->uri->segment(2)=='degree'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-folder-open-o"></i><span>Manage Degree</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li><a class="" href="<?php echo base_url(); ?>admin/degree/add">Add Degree</a></li>
                <li><a class="" href="<?php echo base_url(); ?>admin/degree">List Degree</a></li>
                </ul>
            </li>
              <?php } } if( $this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  )
                  {
                    if($this->session->userdata('admin_type') == 1 || ( $access['permission'][2]['view_access'] == '1' && $access['permission'][2]['add_access'] == '1')){
                  ?>
             <li class="treeview <?php if( $this->uri->segment(2)=='branch'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-folder-open-o"></i><span>Manage Branch</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                 <li><a class="" href="<?php echo base_url(); ?>admin/branch/add">Add Branch</a></li>

                    <li><a href="<?php echo base_url(); ?>admin/branch">List Branch</a></li>
                  
                </ul>
            </li>
              <?php } } if( $this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  )
                  {
                    if($this->session->userdata('admin_type') == 1 || ( $access['permission'][3]['view_access'] == '1' && $access['permission'][3]['add_access'] == '1')){
                  ?>
             <li class="treeview <?php if( $this->uri->segment(2)=='collagecode'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-folder-open-o"></i><span>Manage College Code</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li><a class="" href="<?php echo base_url(); ?>admin/collagecode/add">Add College Code</a></li>
                <li><a href="<?php echo base_url(); ?>admin/collagecode">List College Code</a></li>
                </ul>
            </li>
            <?php } } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  )
                  {
                    if($this->session->userdata('admin_type') == 1 || ( $access['permission'][4]['view_access'] == '1' && $access['permission'][4]['add_access'] == '1')){
                  ?>
             <li class="treeview <?php if(  $this->uri->segment(2)=='technology'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-folder-open-o"></i><span>Manage Technology</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                 <li><a class="" href="<?php echo base_url(); ?>admin/technology/add">Add Technology</a></li>
                 <li><a href="<?php echo base_url(); ?>admin/technology">List Technology</a></li>
                </ul>
            </li>
             <?php } } /*if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  )
                  {
                  ?>
            <li class="treeview <?php if($this->uri->segment(2)=='course' ){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>Manage Course</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="" href="<?php echo base_url(); ?>admin/course/add">Add Course</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/course">List Course</a></li>
                </ul>
            </li>
    <?php } */if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  )
                  {
                    if($this->session->userdata('admin_type') == 1 || ( $access['permission'][6]['view_access'] == '1' && $access['permission'][6]['add_access'] == '1')){
                  ?>
             <li class="treeview <?php if($this->uri->segment(2)=='lab' ){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-folder-open-o"></i> <span> Manage Lab</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="" href="<?php echo base_url(); ?>admin/lab/add">Add Lab</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/lab">List Lab</a></li>
                </ul>
            </li>
           
            <?php } } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  )
                  {
                    if($this->session->userdata('admin_type') == 1 || ( $access['permission'][8]['view_access'] == '1' && $access['permission'][8]['add_access'] == '1')){
                  ?>
             <li class="treeview <?php if($this->uri->segment(2)=='batch'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-folder-open-o"></i> <span> Manage Batch</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="" href="<?php echo base_url(); ?>admin/batch/add">Add Batch</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/batch">List Batch</a></li>
                </ul>
            </li>
            <?php } } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2   || $this->session->userdata('admin_type') == 4)
                  {
                    if($this->session->userdata('admin_type') == 1 || ( $access['permission'][9]['view_access'] == '1' && $access['permission'][9]['add_access'] == '1')){
                  ?>
             <li class="treeview <?php if($this->uri->segment(2)=='student' ){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-user-circle-o"></i> <span>Manage Student</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="" href="<?php echo base_url(); ?>admin/student/generate">Generate</a></li>
                    <li><a class="" href="<?php echo base_url(); ?>admin/student/newList">List New Student</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/student">List Student</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/student/repayment">Fees Repayment</a></li>
                </ul>
            </li>
             <?php } } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2 )
                  {
                    if($this->session->userdata('admin_type') == 1 || ( $access['permission'][7]['view_access'] == '1' && $access['permission'][7]['add_access'] == '1')){
                  ?>
             <li class="treeview <?php if($this->uri->segment(2)=='faculty'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-user-circle-o"></i> <span>Manage Faculty</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="" href="<?php echo base_url(); ?>admin/faculty/add">Add Faculty</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/faculty">List Faculty</a></li>
                </ul>
            </li>
               <?php } } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2 )
                  {
                    if($this->session->userdata('admin_type') == 1 || ( $access['permission'][12]['view_access'] == '1' && $access['permission'][12]['add_access'] == '1')){
                  ?>
             <li class="treeview <?php if($this->uri->segment(2)=='finance'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-user-circle-o"></i> <span>Manage Finance</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="" href="<?php echo base_url(); ?>admin/finance/add">Add Finance</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/finance">List Finance</a></li>
                </ul>
            </li>
          <?php  } } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2 )
                  {
                    if($this->session->userdata('admin_type') == 1 || ( $access['permission'][10]['view_access'] == '1' && $access['permission'][10]['add_access'] == '1')){
                  ?>
              <li class="treeview <?php if($this->uri->segment(2)=='teammember' ){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-user-circle-o"></i> <span>Manage Staff</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                      <li><a class="" href="<?php echo base_url(); ?>admin/teammember/add">Add Staff</a></li>
                   <li><a href="<?php echo base_url(); ?>admin/teammember">List Staff</a></li>
                  
                </ul>
            </li>
            <?php } } if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 2  || $this->session->userdata('admin_type') == 4)
                  {
                    if($this->session->userdata('admin_type') == 1 || ( $access['permission'][11]['view_access'] == '1' && $access['permission'][11]['add_access'] == '1')){
                  ?>
             <li class="treeview <?php if($this->uri->segment(2)=='collegereport' || $this->uri->segment(2)=='branchreport' || $this->uri->segment(2)=='datereport' ){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li><a href="<?php echo base_url(); ?>admin/collegereport"> College Report</a></li>

                    <li><a class="" href="<?php echo base_url(); ?>admin/batchreport">Batch Report</a></li>
                     <li><a class="" href="<?php echo base_url(); ?>admin/dailyreport">Daily Report</a></li>                   
			<li><a class="" href="<?php echo base_url(); ?>admin/feesreport">Fees Report</a></li> 
                </ul>
            </li>
          <?php  } } ?>

             <?php
if($this->session->userdata('admin_type') == 3){ ?>
<li class="treeview <?php if($this->uri->segment(2)=='deduction' || $this->uri->segment(2)=='addition'){ echo "active";} ?>">
<a href="<?php echo base_url(); ?>admin/test">
<i class="fa fa-list"></i><span>Test Series</span>
<span class="pull-right-container">
</span>
</a>
</li>

<li class="treeview <?php if($this->uri->segment(2)=='deduction' || $this->uri->segment(2)=='addition'){ echo "active";} ?>">
<a href="<?php echo base_url(); ?>admin/attendance">
<i class="fa fa-list"></i><span>Attendance</span>
<span class="pull-right-container">
</span>
</a>
</li>


<?php }
?>
<?php if($this->session->userdata('admin_type') == 1){ ?>
<li class="<?php if($this->uri->segment(2)=='setting'){ echo "active";} ?>" >
    <a href="<?php echo base_url(); ?>admin/setting"><i class="fa fa-tachometer"></i><span>Setting</span><span class="pull-right-container"></span></a>
</li>
<?php } ?>
<?php if($this->session->userdata('admin_type') == 1111 || $this->session->userdata('admin_type') == 3){ ?>
<li class="<?php if($this->uri->segment(2)=='setting'){ echo "active";} ?>" >
    <a href="<?php echo base_url(); ?>admin/report"><i class="fa fa-tachometer"></i><span>Report</span><span class="pull-right-container"></span></a>
</li>
<?php } ?>
               <!--<li class="treeview <?php if($this->uri->segment(2)=='deduction' || $this->uri->segment(2)=='addition'){ echo "active";} ?>">
                <a href="#">
                <i class="fa fa-list"></i><span>Ledger</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="" href="<?php echo base_url(); ?>admin/deduction">Deductions </a></li>
                    <li><a href="<?php echo base_url(); ?>admin/addition">Additions</a></li>
                </ul>
              </li>
            -->

           <!-- <li class="treeview <?php if($this->uri->segment(2)=='category'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-briefcase"></i> <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="" href="<?php echo base_url(); ?>admin/category/add">Add Category</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/category">List Category</a></li>
                </ul>
            </li>

            <li class="treeview <?php if($this->uri->segment(2)=='news'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i> <span>News</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="" href="<?php echo base_url(); ?>admin/news/add">Add News</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/news">List News</a></li>
                </ul>
            </li>

            <li class="treeview <?php if($this->uri->segment(2)=='portfolio'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>Portfolio</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="" href="<?php echo base_url(); ?>admin/portfolio/add">Add Portfolio</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/portfolio">List Portfolio</a></li>
                </ul>
            </li>


            <li class="treeview <?php if($this->uri->segment(2)=='testimonial'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-address-book"></i> <span>Testimonial</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a class="" href="<?php echo base_url(); ?>admin/testimonial/add">Add Testimonial</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/testimonial">List Testimonial</a></li>
                </ul>
            </li>

            <li class="treeview <?php if($this->uri->segment(2)=='vendor'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-users"></i><span>Manage Vendors</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active "><a href="<?php echo base_url(); ?>admin/vendor/add">Add Vendor</a></li>
                    <li ><a href="<?php echo base_url(); ?>admin/vendor">List Vendor</a></li>
                </ul>
            </li>

            <li class="treeview <?php if($this->uri->segment(2)=='patners'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-users"></i><span>Manage Clients</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active "><a href="<?php echo base_url(); ?>admin/patners/add">Add Clients</a></li>
                    <li ><a href="<?php echo base_url(); ?>admin/patners">List Clients</a></li>
                </ul>
            </li>
            <li class="treeview <?php if($this->uri->segment(2)=='marketing_imagery'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-users"></i><span>Marketing Imagery</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active "><a href="<?php echo base_url(); ?>admin/marketing_imagery/add">Add Marketing Imagery</a></li>
                    <li ><a href="<?php echo base_url(); ?>admin/marketing_imagery">List Marketing Imagery</a></li>
                </ul>
            </li>-->

            <!--<li class="treeview <?php if($this->uri->segment(2)=='user'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-users"></i><span>Manage Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active "><a href="<?php echo base_url(); ?>admin/user/add">Add User</a></li>
                    <li ><a href="<?php echo base_url(); ?>admin/user">List Users</a></li>
                </ul>
            </li>-->

          <!--    <li class="treeview <?php if($this->uri->segment(2)=='contactus'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-envelope"></i><span>Contact Us</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>admin/contactus">List Contact Us</a></li>
                </ul>
            </li>

          <li class="treeview <?php if($this->uri->segment(2)=='newsletter'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-list-alt"></i><span>Newsletter</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>admin/newsletter">List Newsletter</a></li>
                </ul>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>admin/email"><i class="fa fa-envelope-o"></i> <span>Email Template</span> <span class="pull-right-container"></span></a>
            </li>

            <li class="treeview <?php if($this->uri->segment(2)=='managevideo' || $this->uri->segment(2)=='genaralsetting'){ echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-gear"></i><span>Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url(); ?>admin/genaralsetting">General Setting</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/smtpsetting">SMTP Setting</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/managevideo">Manage Video</a></li>
                </ul>
            </li>-->

        </ul>
    </div>
</aside>