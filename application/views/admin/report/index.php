<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="header-title">
            <h1>Report</h1>
            <small>Batch Report</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>Manage Batch Report</h4>
                        </div>
                    </div>
                    <div class="panel-body">

                        <div class="" id="msgdiv"><?= msg();?></div>

                        <div class="">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                                <th width="20px">Student</th>
                                <th width="20px">Batch</th>
                                <th width="20px">College</th>
                                <th width="20px">Branch</th>
                                <th width="20px">Attendance</th>
                                <th width="20px">Minor Project</th>
                                <th width="20px">Major Project</th>
                                <th width="20px">Test Series</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($students))
                                {
                                  //$paidamount=$totalstudent=$totalfees=$reaminfees=0;
                                    foreach ($students as $student)
                                    {

                                    ?>
                                        <tr data-row-id="<?php echo $datalisti->id;?>">
                                          <td><?= $student['name'] ?></td>
                                          <td><?= $student['starttime'].' - '.$student['endtime'] ?></td>
                                          <td><?= $student['collageName'] ?></td>
                                          <td><?= $student['branchName'] ?></td>
                                          <td><?php

 $att = getTotalattendance($student['id'],$student['batch_id']);
 //print_r($att);
 $total = $totalPrasent = $totalAbsent=0;
 if($att){
 foreach ($att as $key => $value) {
  $total += $value->total;
  if($value->status == 'P'){
    $totalPrasent = $value->total;
  }else{
    $totalAbsent = $value->total;
  }
 }
 echo $totalPrasent .'/'.$total;
 }else{
  echo "NA";
 }
   //echo $student['id'].' = '.$student['batch_id'];
   
?></td>
<td><?php echo "NA"; ?></td>
<td><?php echo "NA"; ?></td>
<td><?php
  $tests = getStudentTestSeries($student['id'],$student['batch_id']);
  //print_r($tests);
  if($tests){
  foreach ($tests as $key => $value) { ?>
  <input type="checkbox" name="" <?php if(!empty($value->student_id)){ echo 'checked'; } ?> title="<?= $value->cource_name ?>" disabled>
  <label><?= ($key+1) ?></label>
  <?php }
  }else{
  echo "NA";
  }
  //echo $student['batch_id'].' '.$student['id']
?></td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!--Start delete js-->
<script>
    $(document).ready(function(){







  $("#technology").change(function(){

     


// echo $selectall->alt_mobile;


    var id = $(this).val();
    var batch_id = '0';

    
    //   alert(id);
      $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admin/student/getcourse/"+id+"/"+batch_id,
                    cache:false,
                    data: {id:id,batch_id:batch_id},
                    success: function(response)
                    {

                     // alert(response);
                      $("#batch_id").html(response);
                      
                }
  });

     });
   });
</script>
<!-- End delete js--->
