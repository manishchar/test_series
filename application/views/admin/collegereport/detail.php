<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="header-title">
            <h1>College Report Detail</h1>
            <small>Manage College Report Detail</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>Manage College Report Detail</h4>
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
                                <th width="20px"> Student Name</th>  
                                <th width="20px"> Enrolled number</th>        
                                <th width="20px">College</th>
                         
                                <th width="20px">Branch</th>
                                <th width="20px">Technology</th>
                               
                                <th width="20px">Total Fees</th>
                                <th width="20px">Paid Fees</th>
                                <th width="20px">Remaining Amount</th>
                                

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($datalist))
                                {
                                    foreach ($datalist as $datalisti)
                                    {
                                         $branch=$this->admin->getVal('SELECT name FROM branch where id='.$datalisti->branch.'');
                                          $technology=$this->admin->getVal('SELECT name FROM technology where id='.$datalisti->technology.'');
                                         $paidamount=$this->admin->getVal('SELECT sum(amount) FROM fees_payment where status = 1 and  s_id  ='.$datalisti->id.' and batch_id ='.$datalisti->batch_id.'');
                                          // $student=$this->admin->getRow('SELECT count(id) as totalstudent, sum(totalfees) as totalfees FROM student where id='.$datalisti->id.'');
                                           $reaminfees = $datalisti->totalfees - $paidamount;    $reaminfees;
                                          // $student=$this->admin->getRow('SELECT count(id) as totalstudent, sum(totalfees) as totalfees FROM student where id='.$datalisti->id.'');
                                            
                                    ?>
                                        <tr data-row-id="<?php echo $datalisti->id;?>">
                                           
                                            <td><?php echo ucfirst($datalisti->name); ?></td>
                                             <td><?php echo $datalisti->roll_no; ?></td>
                                            <td><?php echo ucfirst($datalisti->cname); ?></td>
                                             <td><?php echo ucfirst($branch); ?></td>
                                            <td><?php echo ucfirst($technology); ?></td>
                                           
                                            <td><?php echo $datalisti->totalfees; ; ?></td>
                                             <td><?php echo $paidamount; ?></td>
                                            <td><?php echo $reaminfees; ?></td>
                                          
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
  
  $(document).ready(function() {
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
