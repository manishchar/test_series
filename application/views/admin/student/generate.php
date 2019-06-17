<style>
    .panel-heading .dropdown-menu-right{display:none !important;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Student</h1>
            <small>Manage Student</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>Manage Student</h4>
                        </div>
                    </div>
                    <div class="container well">
                        <form>
                            <div class="col-sm-2">
                                <label>Mobile</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="mobile" class="form-control" value="<?php if(isset($_GET['mobile'])){ echo $_GET['mobile']; } ?>">
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" name="search" class="btn" value="Search">
                            </div>
                        </form>
                    </div>

                    <div class="panel-body">
                        
                        <div><?php
                         if($this->session->flashdata('error')){ ?>
<div class="alert alert-danger"> <?= $this->session->flashdata('error'); ?></div>
                         <?php }
                         ?></div>

                          <div><?php
                         if($this->session->flashdata('message')){ ?>
<div class="alert alert-success"> <?= $this->session->flashdata('message'); ?></div>
                         <?php }
                         ?></div>

                        <div class="table-responsive">
                            <form method="POST">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="info">
                                            <th>id</th>
                                            <th>Name</th>
                                            <th> Student Id</th>
                                            <th> mobile</th>
                                            <th> Enrollment No.</th>
                                            <th>Technology</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(!empty($datalist))
                                    {
                                        foreach ($datalist as $k=>$datalisti)
                                        { 
if($k == 0){
$name = $datalisti->name;
$college = $datalisti->college;
$degree = $datalisti->degree;
$branch = $datalisti->branch;
$semester = $datalisti->semister;
$roll_no = $datalisti->roll_no;
$email = $datalisti->email;
$mobile = $datalisti->mobile;

}

                                            $batch=$this->admin->getVal('SELECT c.title FROM batch b,course c,lab l where b.course_id=c.id and b.lab_id=l.id and b.id = "'.$datalisti->batch_id.'"');
                                     
                                              $technology=$this->admin->getVal('SELECT name FROM technology where id='.$datalisti->technology.'');
                                        ?>
                                            <tr data-row-id="<?php echo $datalisti->id; ?>">
                                                <td><input type="checkbox" name="sid[]" value="<?php echo $datalisti->id; ?>"></td>
                                                <td><?php echo ucfirst($datalisti->name); ?></td>
                                                <td><?php echo ucfirst($datalisti->student_id); ?></td>
                                                <td><?php echo ucfirst($datalisti->mobile); ?></td>
                                                <td><?php echo ucfirst($datalisti->roll_no); ?></td>
                                                <td><?php echo ucfirst( $technology); ?></td>

                                                 <td><?php echo date('d-m-Y',strtotime($datalisti->startdate)); ?></td>
                                                 <td><?php echo $datalisti->starttime; ?></td>
                                                <td>
                                                <?php
                                                if ($datalisti->status == 1)
                                                {
                                                ?>
                                                    <span class="label-custom label label-default">Active</span>
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                    <span class="label-danger label label-default">Inctive</span>
                                                <?php
                                                }
                                                ?>
                                                </td>
                                                
                                            </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
<?php if(!empty($datalist)){ ?>


                                <div class="container">
                                    <div class="col-sm-4 form-group">
                                        <label>Student Number</label>
                                        <input type="text" class="form-control studentNumber" name="studentNumber" value="<?= $student_no; ?>" >
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Student Name</label>
                                        <input type="text" class="form-control" name="name" value="<?= $name;?>" placeholder="Name" required="">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>College</label>
                                        <select class="form-control" name="college">
                                            <option>Select College</option>
                                            <?php

                                            foreach ($collages as $key => $value) { ?>
                                                <option value="<?= $value->id ?>" <?php if($college == $value->id){ echo "selected"; } ?>><?= $value->name ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                        <!-- <input type="text" class="form-control" name="college" value="" placeholder="College" > -->
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Degree</label>
                                        <select class="form-control" name="degree" id="degree">
                                            <option>Select Degree</option>
                                            <?php
                                             $sems = '';
                                            foreach ($degrees as $key => $value) { ?>
                                                <option sid="<?= $value->semester ?>" value="<?= $value->id ?>"  <?php if($degree == $value->id){ echo "selected";$sems = $value->semester; } ?>><?= $value->name ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Branch</label>
                                         <select class="form-control" name="branch" id="branch">
                                            <option>Select Branch</option>
                                            <?php
                                            foreach ($branchs as $key => $value) { ?>
                                                <option value="<?= $value->id ?>"  <?php if($branch == $value->id){ echo "selected"; } ?>><?= $value->name ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-4 form-group">
                                        <label>Semester</label>
                                        <select id="semister" class="form-control" name="semister">
                                            <option>Select Semester</option>
                                            <?php
if($sems !=''){
    $sems_arr = explode(',', $sems);
    foreach ($sems_arr as $key => $value) { ?>
        <option value="<?= $value; ?>" <?php if($semester == $value){ echo "selected"; } ?>><?= 'Semester '.$value; ?></option>
    <?php }
}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Roll Number</label>
                                        <input type="text" class="form-control" name="roll_no" value="<?= $roll_no ?>"  placeholder="Roll Number" >
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="<?= $email; ?>"  placeholder="Email" >
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile" value="<?= $mobile ?>"  placeholder="Mobile" >
                                    </div>
                                    <div class="col-sm-2">

                                        <input type="submit" name="generate" id="generateBtn" class="btn" value="Generate">
                                    </div>
                                </div>
<?php } ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--Start delete js-->
<script>

    $("#degree").change(function(){

    $("#branch").attr('required',false); 
    $("#semister").attr('required',false);        
    var semester =($(this).find(':selected').attr('sid'));
    //console.log(semester);
    var html = "";
    if(semester != ''){
      html += '<option value="" selected> Select Semester</option>';
      var arrTopc = semester.split(',');
      if(arrTopc.length >0){
      $("#semister").attr('required',true);      

        for(var i=0;i<arrTopc.length;i++){
          console.log(arrTopc[i]);
          html += '<option value="'+arrTopc[i]+'">'+arrTopc[i]+' Semester</option>';
        }
      }
    }else{
          html += '<option value="0" selected disabaled> No Result</option>';
    }

    $('#semister').html(html);
    var id = $(this).val();
    var branch = '0';
    $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>home/getbranch",
          cache:false,
          data: {id:id,branch:branch},
          success: function(response)
          {  
            if(response != ''){
              $("#branch").attr('required',true);
            }

            $("#branch").html(response);
            
          }
    });

});
    $('.studentNumber').change(function(){
        var sid = $(this).val();
        $('#generateBtn').attr('disabled',true);
         $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/student/checkStudentNumber",
            cache:false,
            data: {sid:sid},
            success: function(response)
            {
                console.log(response);
                var obj = JSON.parse(response);
                if(obj.status == 'success'){
                    $('#generateBtn').attr('disabled',false);
                }

                if(obj.status == 'failed'){
                    $('#generateBtn').attr('disabled',true);
                }
            }
        });
        
    });
$('.remove-row').on('click', function(e) {
var id=$(this).attr('data-id');
if(id!='')
{
    $.confirm({
        theme: 'light',
        title: 'Confirmation',
        content: 'Are you sure you want to delete',
        icon: 'fa fa-question-circle',
        animation: 'scale',
        closeAnimation: 'scale',
        opacity: 0.5,
        buttons: {
            'OK': function () {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admin/student/delete/"+id,
                    cache:false,
                    //data: {id:id},
                    success: function(response)
                    {
                        $('table tr').filter("[data-row-id='" + id + "']").remove();
                        var url = '<?php echo base_url();?>admin/student'; //please insert the url of the your current page here, we are assuming the url is 'index.php'
                        $('#msgdiv').load(url + ' #msgdiv');
                    }
                });
            },
            cancel: function () {
                //$.alert('you clicked on <strong>cancel</strong>');
            },
        }
    });
}

});
</script>
<!-- End delete js--->

