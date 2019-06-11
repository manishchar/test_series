

<?php  
   $batch=$this->admin->getRow('SELECT * FROM batch where id='.$selectall->batch_id.'');
 $paidamount=$this->admin->getVal('SELECT sum(amount) FROM fees_payment where status = 1 and s_id  ='.$selectall->id.' and batch_id ='.$selectall->batch_id.'');
?>
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
            <h1>Student Fees Repayment</h1>
            <small> Student Fees Repayment</small>
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
                       if($this->uri->segment(4))
                       {
                           echo "Student Fees Repayment";
                       }
                       else
                       {
                           echo "Student Fees Repayment";
                       }
                       ?>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">
                 
                

                   <h2>Student Details</h2>
      <div class="row">
             <div class="col-sm-6">
                  <div class="form-group">
                        <label>Name :</label>
                        <label><?php  echo $selectall->name; ?></label>
                    </div>
                     </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>College :</label>
                         <label><?php if(!empty($selectall))
                                {
                                   $college=$this->admin->getRow('SELECT name,code FROM collagecode  where id = "'.$selectall->college.'"');
                                    echo ucfirst($college->name).' ['.$college->code.']';
                                }
                                else{ echo "-";} ?></label>
                    </div>
                    </div>
                     </div>
                    <div class="row">
                   <div class="col-sm-6">
     <div class="form-group">
                        <label>Technology : </span></label>
                        <label><?php if(!empty($selectall))
                                {
                                   $technology=$this->admin->getVal('SELECT name FROM technology  where id = "'.$selectall->technology.'"');
                                    echo ucfirst($technology);
                                }
                                else{ echo "-";} ?></label>
                    </div>

              
                     </div>
                        <div class="col-sm-6">
                    <div class="form-group">
                        <label>Batch : </label> <label><?php if(!empty($selectall))
                                {
                                   $date1 = strtotime($batch->startdate);
   echo date('d/m/Y', $date1); ?>&nbsp;&nbsp;  <?php echo $batch->starttime; 
                                }
                                else{ echo "-";} ?></label>
                    </div>
                      </div>
                     </div>
             
         <div class="row">
             <div class="col-sm-6">
                   <div class="form-group">
                        <label>Degree : </label>
                         <label><?php if(!empty($selectall))
                                {
                                   $degree=$this->admin->getVal('SELECT name FROM degree  where id = "'.$selectall->degree.'"');
                                    echo ucfirst($degree);
                                }
                                else{ echo "-";} ?></label>
                        
                    </div>
                     </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label>Branch :</label>
                          
                          <label><?php if(!empty($selectall))
                                {
                                   $branch=$this->admin->getVal('SELECT name FROM branch  where id = "'.$selectall->branch.'"');
                                    echo ucfirst($branch?$branch:'NA');
                                }
                                else{ echo "-";} ?></label>
                    </div>
                    </div>
                     </div>
                  
                   <div class="row">
                   <div class="col-sm-6">
 <div class="form-group">
                     <label>Semester :</label>
                      <label><?php if($selectall->semister==1){echo " 1 st Semester";}if($selectall->semister==2){echo " 2 nd Semester";}if($selectall->semister==3){echo " 3 rd Semester";}if($selectall->semister==4){echo " 4 rd Semester";}if($selectall->semister==5){echo " 5 rd Semester";}if($selectall->semister== 6){echo " 6 nd Semester";} if($selectall->semister==7){echo " 7 rd Semester";} if($selectall->semister==8){echo " 8 rd Semester";}   ?></label>
                    </div>

                    
                     </div>
                        <div class="col-sm-6">
                     <div class="form-group">
                      <label> Enrollment No. :</label>
                       <label><?php  echo $selectall->roll_no; ?></label>
                     
                    </div>
                      </div>
                     </div>
                       <div class="row">
                   <div class="col-sm-6">
                     <div class="form-group">
                        <label> Email :</label>
                           <label><?php  echo $selectall->email; ?></label>
                     
                    </div>




                 
                     </div>

<?php if($selectall->topic){ ?> 
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label> Topic :</label>
                           <label><?php  echo $selectall->topic; ?></label>
                          </div>
                        </div>
<?php } ?>

<?php if($selectall->testseries){ ?> 
                        <div class="col-sm-6">
                          <div class="form-group">
                          <label> Test Series :</label>
                           <label>Yes</label>
                          </div>
                        </div>
<?php } ?>
                        <div class="col-sm-6">
                       <div class="form-group">
                        <label>Mobile :</label>
                          <label><?php  echo $selectall->mobile; ?></label>
                       
                    </div>
                     </div>
                     </div>
                       <div class="row">
                   <div class="col-sm-6">
                     <div class="form-group">
                        <label> Total Fees :</label>
                           <label><?php  echo $selectall->totalfees; ?></label>
                     
                    </div>


                 
                     </div>
                        <div class="col-sm-6">
                       <div class="form-group">
                        <label>Paid Fees :</label>
                          <label><?php  echo $paidamount; ?></label>
                       
                    </div>
                     </div>
                     </div>
<div class="row">
              <div class="col-sm-6">
               <div class="form-group">
                  <label>Remaning Fees :</label>
                 <label><?php  $reaminfees = $selectall->totalfees - $paidamount;   echo $reaminfees; ?></label>   
                </div>
</div>
               <div class="col-sm-6">
               </div>
                    

    <div>                    
 <div>
                  <?php
            //  $datalist=$this->admin->getRows("SELECT *  FROM fees_payment WHERE s_id = '".$selectall->loan_id."'"); 
                 
               $datalist1=$this->admin->getRows('SELECT * FROM fees_payment where  s_id  ='.$selectall->id.' and batch_id ='.$selectall->batch_id.'');  

                                if(!empty($datalist1))
                                {$i=0;
                                foreach ($datalist1 as $datalisti)
                                {$i++
                                

                                ?>
                                                          
     <section  style="display: none" class="reciept-view" id='printMe<?php  echo $datalisti->id; ?>'>
                                       
<section class="mx-auto my-5" style="border:1.5px solid; width:863px; height:400px">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="fee-reciept-heading">
                        Fee Receipt
                    </div>
                    <div class="institute-name pt-4">
                        <h2 class="font-weight-bold text-center">Cybrom Technology Pvt. Ltd.</h2>
                        <hr>
                        <p class="font-small" style="font-weight: 500;">185, 1st Floor, Zone-1, M.P. Nagar, Near Milan
                            Restaurant, Bhopal</p>
                    </div>
                    <div class="logo pt-3 pr-3 text-right">
                        <img src="<?php echo base_url();?>assets/dist/img/logo1.png" style="height: 81px;">
                    </div>
                </div>
                <div class="p-3">
                    <div class="d-flex justify-content-between">
                        <div class="reg-no">
                                <span lang="EN-US" style="font-size:11.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;
                                mso-bidi-font-family:Roboto;color:#191919;position:relative;top:.5pt;
                                mso-text-raise:-.5pt">No.<span style="letter-spacing:.15pt"> </span></span> <span><?php  echo $datalisti->id; ?></span>
                        </div>
                        <div class="date">
                                <span lang="EN-US" style="font-size:11.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;
                                mso-bidi-font-family:Roboto;color:#191919;position:relative;top:.5pt;
                                mso-text-raise:-.5pt">Date<span style="letter-spacing:.25pt"> </span>:<span style="letter-spacing:-1.05pt"> </span></span><span lang="EN-US" style="font-size:11.0pt;font-family:Roboto;mso-fareast-font-family:
                            Roboto;mso-bidi-font-family:Roboto;color:#191919;position:relative;top:.5pt;
                            mso-text-raise:-.5pt;letter-spacing:-1.05pt"><span
                                    style="mso-spacerun:yes">&nbsp;</span></span><span lang="EN-US" style="font-size:14.0pt;
                            font-family:Roboto;mso-fareast-font-family:Roboto;mso-bidi-font-family:Roboto;
                            color:#191919;position:relative;top:.5pt;mso-text-raise:-.5pt;mso-font-width:
                            101%"><?php $date = strtotime($datalisti->datetimes);
   echo date('d/m/Y', $date); ?></span>
                        </div>
                    </div>
                    <div class="py-2"></div>
                    <p class="MsoNormal" style="margin-top:.85pt;margin-right:0cm;margin-bottom:0cm;
margin-bottom:.0001pt;line-height:16.0pt;mso-line-height-rule:
exactly"><span lang="EN-US" style="font-size:11.0pt;font-family:Roboto;
mso-fareast-font-family:Roboto;mso-bidi-font-family:Roboto;color:#191919;
position:relative;top:.5pt;mso-text-raise:-.5pt">Recei<span style="letter-spacing:
-.1pt">v</span>ed<span style="letter-spacing:.65pt"> </span>with<span style="letter-spacing:.4pt"> </span>thanks<span
                                style="letter-spacing:.65pt"> </span>f<span
                                style="letter-spacing:-.15pt">r</span>om<span style="letter-spacing:-.15pt">
                            </span>M<span style="letter-spacing:-.95pt">r</span>.<span style="letter-spacing:.05pt">
                            </span>/
                            <span class="GramE">Ms.</span><span style="letter-spacing:.3pt"> </span></span><span
                            lang="EN-US"
                            style="font-size:14.0pt;font-family:Roboto;mso-fareast-font-family:
Roboto;mso-bidi-font-family:Roboto;color:#191919;position:relative;top:.5pt;
mso-text-raise:-.5pt;mso-font-width:101%"><span class="dots">......................................................................................................................</span><span style="font-size: 12.0pt; font-weight: bold"><?php  echo $selectall->name; ?></span></span><span
                            lang="EN-US" style="font-size:14.0pt;font-family:Roboto;mso-fareast-font-family:
Roboto;mso-bidi-font-family:Roboto">
                            <o:p></o:p>
                        </span></p>

                    <div class="py-3"></div>

                    <p><span lang="EN-US" style="font-size:11.0pt;font-family:Roboto;
                        mso-fareast-font-family:Roboto;mso-bidi-font-family:Roboto;color:#191919;
                        position:relative;top:.5pt;mso-text-raise:-.5pt;letter-spacing:-.1pt;
                        mso-font-width:105%">F</span><span lang="EN-US" style="font-size:11.0pt;
font-family:Roboto;mso-fareast-font-family:Roboto;mso-bidi-font-family:Roboto;
color:#191919;position:relative;top:.5pt;mso-text-raise:-.5pt">ee</span> <span
                        lang="EN-US"
                        style="font-size:14.0pt;font-family:Roboto;mso-fareast-font-family:
Roboto;mso-bidi-font-family:Roboto;color:#191919;position:relative;top:.5pt;
mso-text-raise:-.5pt;mso-font-width:101%"><span class="dots" style="bottom:-5px!important">.................................................................................................................................................................</span><span style="font-size: 12.0pt; font-weight: bold"><?php echo $datalisti->amount; ?></span></span></p>

                    <div class="py-1"></div>
                    <div class="row">
                      <div class="col-7">
                         <p class="MsoNormal" style="margin-top:.85pt;margin-right:0cm;margin-bottom:0cm;
;margin-bottom:.0001pt"><span lang="EN-US" style="font-size:
11.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;mso-bidi-font-family:
Roboto;color:#191919">Course Name<span style="letter-spacing:.3pt"> </span></span><span lang="EN-US"
                            style="font-size:14.0pt;font-family:Roboto;mso-fareast-font-family:
Roboto;mso-bidi-font-family:Roboto;color:#191919"><span class="dots" style="bottom:4px!important">................................................................................</span><span style="font-size: 12.0pt; font-weight: bold"><?php   echo ucfirst($technology); ?></span><span style="letter-spacing:1.15pt"> </span></span></p>
                      </div>
                      <div class="col-5">
                        <p><span
                            lang="EN-US" style="font-size:
11.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;mso-bidi-font-family:
Roboto;color:#191919">Batch<span style="letter-spacing:.55pt"> </span>(Time<span class="GramE">)<span
                                    style="letter-spacing:-.1pt"> </span><span style="font-size:
14.0pt;mso-font-width:101%"></span></span></span><span lang="EN-US" style="font-size:14.0pt;font-family:Roboto;mso-fareast-font-family:
Roboto;mso-bidi-font-family:Roboto"><span class="dots" style="bottom:4px!important">.............................................</span><span style="font-size: 12.0pt; font-weight: bold">&nbsp;<?php $date1 = strtotime($batch->startdate);
   echo date('d/m/Y', $date1); ?>&nbsp;&nbsp;  <?php echo $batch->starttime; ?></span>
                            <o:p></o:p>
                        </span></p>
                      </div>
                    </div>
                   

                    <div class="py-2"></div>

                    <p style="position:relative" class="MsoNormal"><span lang="EN-US" style="font-size:11.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;
    mso-bidi-font-family:Roboto;color:#191919">Mode of<span style="letter-spacing:
    -.1pt"> </span><span class="GramE">p<span style="letter-spacing:-.1pt">a</span>yment<span
                                    style="letter-spacing:.75pt"> </span>:</span><span style="letter-spacing:.1pt">
                            </span>Cash / <span class="SpellE">Cheque</span> / DD Details<span
                                style="letter-spacing:.35pt"> </span>:<span style="letter-spacing:-.35pt">
                            </span></span><span lang="EN-US"
                            style="font-size:14.0pt;font-family:Roboto;mso-fareast-font-family:
    Roboto;mso-bidi-font-family:Roboto;color:#191919;mso-font-width:101%"><span class="dots">.......................................................................................................</span><span style="font-size: 12.0pt; font-weight: bold"><?php echo $datalisti->transaction_type; ?></span></span><span
                            lang="EN-US" style="font-size:14.0pt;font-family:Roboto;mso-fareast-font-family:
    Roboto;mso-bidi-font-family:Roboto">
                            <o:p></o:p>
                        </span></p>


                    <div class="py-3"></div>


                    <p class="MsoNormal" style="margin-bottom:0px"><span lang="EN-US" style="font-size:11.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;
                            mso-bidi-font-family:Roboto;color:red">*</span><span lang="EN-US" style="font-size:9.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;
                            mso-bidi-font-family:Roboto;color:#191919;letter-spacing:-.1pt">F</span><span lang="EN-US"
                            style="font-size:9.0pt;font-family:Roboto;mso-fareast-font-family:
                            Roboto;mso-bidi-font-family:Roboto;color:#191919">ee<span style="letter-spacing:
                            .25pt"> </span>once<span style="letter-spacing:.2pt"> </span>paid<span
                                style="letter-spacing:.15pt"> </span>will<span style="letter-spacing:.25pt">
                            </span>not<span style="letter-spacing:.25pt"> </span>be <span
                                style="letter-spacing:-.1pt">r</span>efunded<span style="letter-spacing:.35pt">
                            </span>or non<span style="letter-spacing:.15pt"> </span>-
                            <span style="mso-font-width:102%">trans<span
                                    style="letter-spacing:-.1pt">f</span></span><span
                                style="mso-font-width:101%">erable.</span></span><span lang="EN-US" style="font-size:9.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;
                            mso-bidi-font-family:Roboto">
                            <o:p></o:p>
                        </span></p>


                    <p class="MsoNormal" style="margin-top:.6pt;margin-right:0cm;margin-bottom:0cm;
margin-bottom:.0001pt"><span lang="EN-US" style="font-size:
11.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;mso-bidi-font-family:
Roboto;color:red">*</span><span class="SpellE"><span lang="EN-US" style="font-size:
9.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;mso-bidi-font-family:
Roboto;color:#191919">Cheques</span></span><span lang="EN-US" style="font-size:
9.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;mso-bidi-font-family:
Roboto;color:#191919"> a<span style="letter-spacing:-.1pt">r</span>e<span style="letter-spacing:.1pt">
                            </span>subject<span style="letter-spacing:.6pt"> </span>to<span
                                style="letter-spacing:.15pt"> </span><span class="SpellE"><span style="letter-spacing:
-.1pt;mso-font-width:101%">r</span><span style="mso-font-width:102%">ealisation</span></span><span
                                style="mso-font-width:102%">.</span></span><span lang="EN-US" style="font-size:
9.0pt;font-family:Roboto;mso-fareast-font-family:Roboto;mso-bidi-font-family:
Roboto">
                            <o:p></o:p>
                        </span></p>

                </div>
            </div>
        </div>
    </section>
    </section>
                            <?php

                               }}
                                ?>
</div>



                  
               



             <div class="container">
             
                    <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                               
                               <th width="250px">ID</th>
                                <th width="250px">Date</th>
                                <th width="250px">Fees Amount</th>
                             
                                 <th width="250px">Payment Method</th>
                                 <th width="250px">Status</th>
                                 <th width="250px">Print</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
            //  $datalist=$this->admin->getRows("SELECT *  FROM fees_payment WHERE s_id = '".$selectall->loan_id."'"); 
               $datalist=$this->admin->getRows('SELECT * FROM fees_payment where  s_id  ='.$selectall->id.' and batch_id ='.$selectall->batch_id.'');  

                                if(!empty($datalist))
                                {$i=0;
                                foreach ($datalist as $datalisti)
                                {$i++
                                
                                ?>
                                        <tr data-row-id="<?php echo $datalisti->id;?>">
                                           
                                            <td><?php echo $datalisti->id; ?></td>
                                            <td><?php //echo $datalisti->datetimes;
   $date = strtotime($datalisti->datetimes);
   echo date('d/m/Y', $date);

                                             ?></td>
                                            <td><?php echo $datalisti->amount; ?></td>
                                           
                                             <td><?php echo $datalisti->transaction_type; ?></td>
                                               <td>  <?php if($datalisti->status == 1){?>
<span class="label-custom label label-default">Paid</span>
                                               
                                           <?php }else{?>
                                             <button data-id="<?php echo $datalisti->id; ?>" class="remove-row btn btn-danger btn-sm" title="Delete" type="button">Unpaid</i></button>
                                           <?php }?>
                                              </td>
                                          <td>
<?php if($datalisti->status == 1){?>
 <button onclick="printDiv('printMe<?php  echo $datalisti->id; ?>')">Print</button>
                                               
                                           <?php }else{?>
                                           
                                           <?php }?>


                                           </td>
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


<script type="text/javascript">

    function printDiv(divName){
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }

  

$(document).ready(function() {
  $('#example33').DataTable({
    });
});
</script>
<script>
$('.remove-row').on('click', function(e) {
var id=$(this).attr('data-id');
if(id!='')
{
    $.confirm({
        theme: 'light',
        title: 'Confirmation',
        content: 'Confirm the payment',
        icon: 'fa fa-question-circle',
        animation: 'scale',
        closeAnimation: 'scale',
        opacity: 0.5,
        buttons: {
            'OK': function () {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admin/student/payment/"+id,
                    cache:false,
                    //data: {id:id},
                    success: function(response)
                    {
                      location.reload();
                       // $('table tr').filter("[data-row-id='" + id + "']").remove();
                      //  var url = '<?php echo base_url();?>admin/student/view/14'; //please insert the url of the your current page here, we are assuming the url is 'index.php'
                      //  $('#msgdiv').load(url + ' #msgdiv');
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
