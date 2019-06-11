<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style>
    .alert>p{display: inline-block;}
    .panel-heading .dropdown-menu-right{display:none !important;}
    .wysihtml5-toolbar li:nth-child(5){display:none !important;}
    .wysihtml5-toolbar li:last-child{display:none !important;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Attendance</h1>
            <small>Add</small>
        </div>
    </section>
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonlist">
                       <h4>
                       <span>Date <?= date('d-M-Y');  ?></span>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">

<?php
  if($test){
    $id = $test->id;
    $batchId = $test->batch_id;
    $series = $test->series;
  }else{
    $id = '';
    $batchId = '';
    $series = '';
  }
?>

                    <form class="col-sm-9" method="post">
                   <?php
                   if($this->session->flashdata('message')){ ?>
<div class="alert alert-success"><?= $this->session->flashdata('message'); ?></div>
                   <?php } ?>
                   <?php
                   if($this->session->flashdata('error')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                   <?php } ?>
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>SNO</th>
                            <th>Name</th>
                            <th>Prasent</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if($students){
                              foreach ($students as $key => $student) { ?>
                                
                          <tr>
                            <td><?= ($key+1) ?></td>
                            <td><?= $student->name ?></td>
                            <td><input type="checkbox" name="" value="<?= $student->student_id; ?>"></td>
                          </tr>

                              <?php }
                            }
                           ?>
                        </tbody>
                      </table>
                    </div>
                    
                    <div class="reset-button">
                        <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                        <a href="<?php echo base_url(); ?>admin/test"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>

                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>

<script type="text/javascript">
  // $.ajax({
  //   url:"",
  //   type:"POST",
  // });
</script>