<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style>
    .alert>p{display: inline-block;}
    .panel-heading .dropdown-menu-right{display:none !important;}
    .wysihtml5-toolbar li:nth-child(5){display:none !important;}
    .wysihtml5-toolbar li:last-child{display:none !important;}
    input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="header-title">
            <h1>Search Student</h1>
            <small>Search Student</small>
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
                       if($this->uri->segment(5))
                       {
                           echo "Search Student";
                       }
                       else
                       {
                           echo "Search Student";
                       }
                       ?>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>admin/student/detail" enctype="multipart/form-data">
                    <?= msg();?>
                      <div class="row">
                   <div class="col-sm-6">
                    <div class="form-group">
                       
                   
                         <select class="form-control  chosen-select" name="student" id="student">
                              <option value="">Select Student</option>
                              <?php
                              //$getcategory =  getcategory();
                              //
                              $student=$this->admin->getRows('SELECT s.*,b.startdate,b.starttime,b.enddate,b.endtime FROM student as s JOIN batch as b ON b.id=s.batch_id where s.status=1');
                                  //print_r($course); exit;
                              if(!empty($student))
                              {
                                  foreach ($student as $studenti)
                                  {
                                      ?>
                                      <option  value="<?php  echo $studenti->id;?>"><?php echo ucfirst($studenti->name).' ('.$studenti->starttime.' - '.$studenti->endtime.' ) '; ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                    </div>
                  
                    </div>
                        <div class="col-sm-6">


                    <div class="reset-button">
                        <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                      
                    </div>
 </div>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>

<!-- include the css and sprite -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
<link rel="image_src" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen-sprite.png">

<!-- include angular -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
<script>
jQuery(document).ready(function(){
  jQuery(".chosen").chosen();
});
  
</script>
<script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
</script>