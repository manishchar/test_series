<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="header-title">
            <h1>College Report</h1>
            <small>Manage College Report</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>Manage College Report</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group">
                            <div class="buttonexport" id="buttonlist">
              <!--  <div class="row">
                   <div class="col-sm-4">
                     <div class="form-group">
                        <select class="form-control  chosen-select" name="college" id="college">
                              <option value="">Select College</option>
                              <?php
                              //$getcategory =  getcategory();
                              //
                              $collagecode=$this->admin->getRows('SELECT * FROM collagecode where status=1');
                                  //print_r($course); exit;
                              if(!empty($collagecode))
                              {
                                  foreach ($collagecode as $collagecodei)
                                  {
                                      ?>
                                      <option <?php if(!empty($selectall)){if($selectall->college==$collagecodei->id){echo "selected";}}elseif(!empty($form_data)){if($form_data['college']==$collagecodei->id){echo "selected";}} ?> value="<?php  echo $collagecodei->id;?>"><?php echo $collagecodei->code.' '.ucfirst($collagecodei->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                    </div>


                 
                     </div>
                        <div class="col-sm-4">
                       <div class="form-group">
                          <select class="form-control chosen-select" name="degree" id="degree">
                              <option value="">Select Course</option>
                              <?php
                              //$getcategory =  getcategory();
                                  //
                              $degree=$this->admin->getRows('SELECT * FROM branch where status=1');
                                  //print_r($course); exit;
                              if(!empty($degree))
                              {
                                  foreach ($degree as $degreei)
                                  {
                                      ?>
                                      <option <?php if(!empty($selectall)){if($selectall->degree==$degreei->id){echo "selected";}}elseif(!empty($form_data)){if($form_data['degree']==$degreei->id){echo "selected";}} ?> value="<?php  echo $degreei->id;?>"><?php echo ucfirst($degreei->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                    </div>
                     </div>
                     
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
                        </select>                    </div>


                 
                     </div>
                        <div class="col-sm-3">
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
                                       
                                <th width="20px">College</th>
                         
                                <th width="20px">Branch</th>
                                <th width="20px">Technology</th>
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
                                    foreach ($datalist as $datalisti)
                                    {
                                      //print_r($datalisti);
                                      //die;
                                         $branch=$this->db->where('id',$datalisti->branch)->get('branch')->row('name');
                                        // print_r($branch);

                                          $technology=$this->admin->getVal('SELECT name FROM technology where id='.$datalisti->technology.'');
                                           //$student=$this->admin->getRow('SELECT count(id) as totalstudent, sum(totalfees) as totalfees FROM student where batch_id='.$datalisti->batch_id.'');
                                           $student=$this->db->select("count(id) as totalstudent, sum(totalfees) as totalfees")->where(["status" => 1 ,'college'=>$datalisti->college,'branch'=>$datalisti->branch])->get('student')->row();
                                          

                                            $paidamount=$this->admin->getVal('SELECT sum(amount) FROM fees_payment where status = 1 and batch_id ='.$datalisti->batch_id.' and s_id IN ('.$datalisti->sid.')');
                                          // $student=$this->admin->getRow('SELECT count(id) as totalstudent, sum(totalfees) as totalfees FROM student where id='.$datalisti->id.'');
                                           $reaminfees = $student->totalfees - $paidamount;
                                            
                                    ?>
                                        <tr data-row-id="<?php echo $datalisti->id;?>">
                                           
                                           
                                            <td><?php echo ucfirst($datalisti->cname); ?></td>
                                             <td><?php echo ucfirst($branch); ?></td>
                                            <td><?php echo ucfirst($technology); ?></td>
                                            <td><?php echo $student->totalstudent; ?></td>
                                            <td><?php echo $student->totalfees;  ?></td>
                                            <td><?php echo $reaminfees; ?></td>
                                            <td><a href="<?php echo base_url(); ?>admin/collegereport/detail/<?php echo $datalisti->college; ?>/<?php echo $datalisti->branch; ; ?>">View Detail</a></td>
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
$('.remove-row').on('click', function(e){
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
                    url: "<?php echo base_url(); ?>admin/branch/delete/"+id,
                    cache:false,
                    //data: {id:id},
                    success: function(response)
                    {
                        $('table tr').filter("[data-row-id='" + id + "']").remove();
                        var url = '<?php echo base_url();?>admin/branch'; //please insert the url of the your current page here, we are assuming the url is 'admin'
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
