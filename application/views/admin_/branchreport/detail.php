<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="header-title">
            <h1>Batch Report Detail</h1>
            <small>Manage Batch Report Detail</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>Manage Batch Report Detail</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group">
                            <div class="buttonexport" id="buttonlist">
       
                            </div>
                        </div>
                        <div class="" id="msgdiv"><?= msg();?></div>

                        <div class="">
                            <table id="example" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                                <th width="20px">Student Name</th>  
                                <th width="20px">Enrolled Number</th>   
                                <th width="20px">Batch</th>     
                                <th width="20px">College</th>
                                <th width="20px">Total Fees</th>
                                <th width="20px">Paid Fees</th>
                                <th width="20px">Remaining Amount</th>
                                <th width="20px">Action</th>
                               </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($datalist))
                                {
                                    foreach ($datalist as $datalisti)
                                    {
                                         //$branch=$this->admin->getVal('SELECT name FROM branch where id='.$datalisti->branch.'');
                                         $college=$this->admin->getVal('SELECT name FROM collagecode where id='.$datalisti->college.'');
                                          $technology=$this->admin->getVal('SELECT name FROM technology where id='.$datalisti->technology.'');
                                          $paidamount=$this->admin->getVal('SELECT sum(amount) FROM fees_payment where status = 1 and s_id  ='.$datalisti->id.' and batch_id ='.$datalisti->batch_id.'');
                                          //$student=$this->admin->getRow('SELECT count(id) as totalstudent, sum(totalfees) as totalfees FROM student where id='.$datalisti->id.'');
                                          $reaminfees = $datalisti->totalfees - $paidamount;   
                                            
                                    ?>
                                        <tr data-row-id="<?php echo $datalisti->id;?>">
                                           
                                            <td><?php echo ucfirst($datalisti->name); ?></td>
                                             <td><?php echo $datalisti->roll_no; ?></td>
                                            <td><?php echo ucfirst($technology); ?></td>
                                            <td><?php echo ucfirst($college); ?></td>
                                            <td><?php echo $datalisti->totalfees; ; ?></td>
                                            <td><?php echo $paidamount;  ?></td>
                                            <td><?php echo $reaminfees;  ?></td>
                                           <td> <button onclick="myFunction('<?php echo $datalisti->id; ?>','<?php echo $datalisti->batch_id; ?>','<?php echo ucfirst($datalisti->name); ?>','<?php echo $datalisti->roll_no; ?>')" type="button" class="btn btn-info btn-lg myBtn" >Fees</button></td>
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


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Student Name: <span id='username'></span>&nbsp;&nbsp;&nbsp;&nbsp;  Roll No:<span id='userroll'></span></h4>
        </div>
        <div class="modal-body">
          
                      <?= msg();?>
                       <div class="form-group">
                          <input type="hidden" name="s_id"  id="s_id" value="" >
                            <input type="hidden" name="batch_id" id="batch_id" value="" >
                        <label>Fees amount<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control" name="fees" id="fees"  placeholder="Enter  Fees amount" required  autocomplete="off">
                    </div>
                
                     <div class="form-group">
                        <label>Payment Mode<span style="color:red;">*</span></label>
                        <select class="form-control" name="payment_mode" id="payment_mode" >
                          <option  value="Cash">Cash</option>
                          <option   value="Paytm">Paytm</option>
                           <option  value="Bhim">Bhim</option>
                          <option   value="Cheque">Cheque</option>
                          <option  value="Bank Transfer">Bank Transfer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Fees Date<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control datepicker" name="feesdate" id="feesdate" placeholder="Enter Fees Date" value=""  required autocomplete="off" >
                    </div>  
                    <div class="reset-button">
                      <button class="btn btn-success w-md m-b-5" type="button" onclick="saveFunction()">Save</button>
                      <button class="btn btn-warning w-md m-b-5" type="button" data-dismiss="modal">Close</button>
                    </div>
        </div>
      
      </div>
      
    </div>
  </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                     <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
                            <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<!-- End delete js--->
<script type="text/javascript">
function myFunction(id,batch_id,name,roll) {
 //document.getElementById("demo").innerHTML = "Hello World";
 //alert(id); alert(name); alert(roll);
 $('#s_id').val(id);
 $('#batch_id').val(batch_id);
 $('#username').html(name);
 $('#userroll').html(roll);
 $('#myModal').modal('show');
}

function saveFunction() {

    var s_id = $('#s_id').val();
    var batch_id = $('#batch_id').val();
    var fees = $('#fees').val();
    var payment_mode = $('#payment_mode').val();
    var feesdate = $('#feesdate').val();
   //SS alert(id);

    $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admin/student/add_fees",
                    cache:false,
                    data: {s_id:s_id,batch_id:batch_id,fees:fees,payment_mode:payment_mode,feesdate:feesdate},
                    success: function(response)
                    { 
                      //alert(response);
                     location.reload();
                }
  });
}



  $(document).ready(function() {



   /* $(".myBtn").click(function(){
         $('#myModal').modal('show');
    });*/

   //$("#mindate").datepicker({ dateFormat: 'yy/mm/dd',  onSelect: function () { table.draw(); }, changeMonth: true, /changeYear: true });
   //$("#maxdate").datepicker({ dateFormat: 'yy/mm/dd', onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
    var table = $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
      $('<button>Click to sum age in all rows</button>')
        .prependTo( '#demo' )
        .on( 'click', function (){
        alert('Column sum is: '+ table.column( 3 ).data().sum());
       });
 
    $('<button>Click to sum age of visible rows</button>')
        .prependTo( '#demo' )
        .on( 'click', function () {
            alert( 'Column sum is: '+ table.column( 3, {page:'current'} ).data().sum() );
        } );
          $('#mindate, #maxdate').change(function () {
                table.draw();
            });   
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
   /* $('#user').change( function() {
        table.draw();
    } );*/
} );
$(document).ready(function() {
  $('#example33').DataTable({
    });
});
</script>
