<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="header-title">
            <h1>Daily Report</h1>
            <small>Manage Batch Report</small>
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
<div class="row">
  <div class="buttonexport" id="buttonlist">
    <form class="">
      <div class="col-sm-12 row">
        <div class="col-sm-4">
            <div class="form-group">
            <label>Start Date</label>
            <input type="text" autocomplete="off"  class="form-control datepicker" name="startdate" placeholder="Enter  Start Date" value="<?= $_GET['startdate']; ?>">
        </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
          <label>End Date</label>
          <input type="text" autocomplete="off"  class="form-control datepicker" name="enddate" placeholder="Enter End Date" value="<?= $_GET['enddate']; ?>">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label>Technology</label>
            
            <select class="form-control chosen-select" name="technology" id="technology">
            <option value="">Select Technology</option>
            <option value="all" <?php if(isset($_GET['technology'])){ if($_GET['technology'] =='all' ){ echo 'selected'; }} ?>>ALL</option>
              <?php
              $technology=$this->admin->getRows('SELECT * FROM technology where status=1 ORDER BY name ASC');
              if(!empty($technology))
              {
              foreach ($technology as $technologyi)
              {
              ?>
              <option <?php if(isset($_GET['technology'])){ if($_GET['technology'] ==$technologyi->id ){ echo 'selected'; }} ?> value="<?php  echo $technologyi->id;?>"><?php echo ucfirst($technologyi->name); ?></option>
              <?php
              }
              }
              ?>
            </select>   

          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
          <label>Batch</label>
          <select class="form-control" name="batch_id" id="batch_id">

             <option value="">Select Technology</option>
            <option value="all" <?php if(isset($_GET['technology'])){ if($_GET['batch_id'] =='all' ){ echo 'selected'; }} ?>>ALL</option>
              <?php
              $cons = "where status=1";
              if(isset($_GET['batch_id'])){
                if($_GET['batch_id'] !=''){
                  $cons .= " and course_id='".$_GET['technology']."'";
                }
              }
              $batches=$this->admin->getRows('SELECT * FROM batch '.$cons.' ORDER BY startdate ASC');
              if(!empty($batches))
              {
              foreach ($batches as $batch)
              {
              ?>
              <option <?php if(isset($_GET['batch_id'])){ if($_GET['batch_id'] ==$batch->id ){ echo 'selected'; }} ?> value="<?php  echo $technologyi->id;?>"><?= date('d-M',strtotime($batch->startdate)).'     '.$batch->starttime; ?></option>
              <?php
              }
              }
              ?>
            </select> 
          </select>              
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
          <label>Payment</label>
          <select class="form-control" name="payment" id="payment">

             <option value="">Select Payment</option>
            <option value="all" <?php if(isset($_GET['payment'])){ if($_GET['payment'] =='all' ){ echo 'selected'; }} ?>>ALL</option>
             <option value="1">Cash</option>
            </select> 
          </select>              
          </div>
        </div>

        <div class="col-sm-4">
        <div class="form-group">
        <input type="submit" class="btn btn-success w-md m-b-5" value="Search" name=""> 
        <a href="<?= base_url().'admin/dailyreport'; ?>" class="btn btn-warning">Reset</a>
        </div>
        </div>
      </div>
    </form>
  </div>
</div>
                        <div class="" id="msgdiv"><?= msg();?></div>

                        <div class="">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                                <th width="20px">Technology</th>
                                <th width="20px">College</th>
                                <th width="20px">Date</th>
                                <th width="20px">Time</th>
                                <th width="20px">Total Student</th>
                                <th width="20px">Total Fees</th>
                                <th width="20px">Remaining Amount</th>
                                <th width="20px">View Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($datalist))
                                {
                                  $paidamount=$totalstudent=$totalfees=$reaminfees=0;
                                    foreach ($datalist as $datalisti)
                                    {

                                      // / $branch=$this->admin->getVal('SELECT name FROM branch where id='.$datalisti->branch.'');
                                       $college=$this->admin->getRow('SELECT name,code FROM collagecode where id='.$datalisti->college.'');
                                         
                                          $technology=$this->admin->getVal('SELECT name FROM technology where id='.$datalisti->technology.'');
                                           $student=$this->admin->getRow('SELECT count(id) as totalstudent, sum(totalfees) as totalfees FROM student where status=1 and batch_id='.$datalisti->batch_id.'');
                          
                           $paidamount=$this->admin->getVal('SELECT sum(amount) FROM fees_payment where status= 1 and batch_id ='.$datalisti->batch_id.'');
                                          // $student=$this->admin->getRow('SELECT count(id) as totalstudent, sum(totalfees) as totalfees FROM student where id='.$datalisti->id.'');
                                   $reaminfees = $student->totalfees - $paidamount;  
                                   $rreaminfees  += $reaminfees;  
                                   $totalstudent  += $student->totalstudent;  
                                   $totalfees     +=$student->totalfees;
                                   $paidamount    +=$student->paidamount;

                                    ?>
                                        <tr data-row-id="<?php echo $datalisti->id;?>">
                                            <td><?php echo ucfirst($technology); ?></td>
                                            <td><?php echo $college->code.' '.ucfirst($college->name); ?></td>
                                            <td><?php echo $datalisti->startdate; ?></td>
                                            <td><?php echo $datalisti->starttime; ?></td>
                                            <td><?php echo $student->totalstudent; ?></td>
                                            <td><?php echo $student->totalfees; ?></td>
                                            <td><?php echo $reaminfees; ?></td>
                                            <td><a href="<?php echo base_url(); ?>admin/batchreport/detail/<?php echo $datalisti->batch_id; ?>">View Detail</a></td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="alert alert-danger pull-right">
                        Total : <span><strong><?= $totalfees; ?></strong></span>
                        Remaining : <span><strong><?= $rreaminfees; ?></strong></span>

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
