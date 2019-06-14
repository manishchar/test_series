<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="header-title">
            <h1>Batch Report</h1>
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
                        <div class="btn-group">
                            <div class="buttonexport" id="buttonlist">
              <!--<div class="row">
                    <div class="col-sm-4">
                     <div class="form-group">
                        <select class="form-control chosen-select" name="technology" id="technology">
                              <option value="">Select Technology</option>
                              <?php
                              //$getcategory =  getcategory();
                                  //
                              $technology=$this->admin->getRows('SELECT * FROM technology where status=1');
                                  //print_r($course); exit;
                              if(!empty($technology))
                              {
                                  foreach ($technology as $technologyi)
                                  {
                                      ?>
                                      <option <?php if(!empty($selectall)){if($selectall->technology==$technologyi->id){echo "selected";}}elseif(!empty($form_data)){if($form_data['technology']==$technologyi->id){echo "selected";}} ?> value="<?php  echo $technologyi->id;?>"><?php echo ucfirst($technologyi->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>   
                      
                    </div>


                 
                     </div>
                       
                     
                   <div class="col-sm-4">
                     <div class="form-group">
  <select class="form-control" name="batch_id" id="batch_id">
                             
                        </select>              </div>


                 
                     </div>
                        <div class="col-sm-4">
                       <div class="form-group">
                         <input type="submit" class="btn btn-success w-md m-b-5" value="Search" name=""> 
                    </div>
                     </div>
                     </div>-->
                            </div>
                        </div>
                        <div class="" id="msgdiv"><?= msg();?></div>

                        <div class="">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                      
                                        
                                       
                               
                                <th width="20px">Technology</th>
                                <th width="20px">Faculty</th>
                                <th width="20px">Start_date</th>
                                <th width="10px">Time</th>
                                 <th width="10px">Total Student</th>
                                <th width="20px">Total Fees</th>
                               
                                <th width="20px">Remaining Amount</th>
                                <th width="20px">View Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($datalist))
                                {
                                    foreach ($datalist as $datalisti)
                                    {
                                       //$branch=$this->admin->getVal('SELECT name FROM branch where id='.$datalisti->branch.'');
                                         
                                          $technology=$this->admin->getVal('SELECT name FROM technology where id='.$datalisti->technology.'');
                          $student=$this->admin->getRow('SELECT count(id) as totalstudent, sum(totalfees) as totalfees FROM student where status = 1 and batch_id='.$datalisti->batch_id.'');
                          
                           $paidamount=$this->admin->getVal('SELECT sum(amount) FROM fees_payment where status = 1 and batch_id ='.$datalisti->batch_id.' and s_id IN ('.$datalisti->sid.')');
                                          // $student=$this->admin->getRow('SELECT count(id) as totalstudent, sum(totalfees) as totalfees FROM student where id='.$datalisti->id.'');
                                   $reaminfees = $student->totalfees - $paidamount;    
                                    ?>
                                        <tr data-row-id="<?php echo $datalisti->id;?>">
                                           
                                         
                                            
                                            
                                            <td><?php echo ucfirst($technology); ?></td>
                                            <td><?php echo ucfirst($datalisti->f_name); ?></td>
                                            <td><?php echo date('d-m-Y',strtotime($datalisti->startdate)); ?></td>
                                            <td><?php echo $datalisti->starttime; ?></td>
                                            <td class="text text-center"><?php echo $student->totalstudent; ?></td>
                                            <td><?php echo $student->totalfees;  ?></td>
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
