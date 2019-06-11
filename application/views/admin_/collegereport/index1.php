 <?php 

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="header-title">
            <h1> College Report</h1>
            <small>College Report</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                    <div class="btn-group" id="buttonexport">
                    <h4>College Report</h4>
                    </div>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group">
                            <div class="buttonexport" id="buttonlist">
                           <!-- <a class="btn btn-add" href="<?php echo base_url(); ?>admin/loan/add"><i class="fa fa-plus"></i>Add Loan</a>-->
                          <!--   <div class="row">
                   <div class="col-sm-3">
                     <div class="form-group">
                        <select class="form-control  chosen-select" name="college" id="college">
                              <option value="">Select College</option>
                              <?php
                              //$getcategory =  getcategory();
                              //
                           //   $collagecode=$this->admin->getRows('SELECT * FROM collagecode where status=1');
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
                        <div class="col-sm-3">
                       <div class="form-group">
                          <select class="form-control chosen-select" name="degree" id="degree">
                              <option value="">Select Course</option>
                              <?php
                              //$getcategory =  getcategory();
                                  //
                             // $degree=$this->admin->getRows('SELECT * FROM branch where status=1');
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
                     
                   <div class="col-sm-3">
                     <div class="form-group">
  <select class="form-control chosen-select" name="technology" id="technology">
                              <option value="">Select Technology</option>
                              <?php
                              //$getcategory =  getcategory();
                                  //
                             // $technology=$this->admin->getRows('SELECT * FROM technology where status=1');
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
                        <table id="example" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                               
                               <th width="20px">College</th>
                         
                                <th width="20px">Branch</th>
                                <th width="20px">Technology</th>
                                <th width="20px">Total Student</th>
                                <th width="20px">Total Fees</th>
                               
                                <th width="20px">Remaining Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                         
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--Start delete js
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="  https://code.jquery.com/jquery-3.3.1.js"></script>


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






<!-- include angular -->

        <script>
     

 /*
      $.fn.dataTable.Api.register( 'column().data().sum()', function () {
    return this.reduce( function (a, b) {
        var x = parseFloat( a ) || 0;
        var y = parseFloat( b ) || 0;
        return x + y;
    } );
} );
      $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[3] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);

      $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var user = $('#user').val();
        var cusage = data[0]; // use data for the age column
 
        if ( 
              user == cusage 
            )
        {
            return true;
        }
        return false;
    }
);    

$.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#mindate').datepicker("getDate");
            var max = $('#maxdate').datepicker("getDate");
            var startDate = new Date(data[1]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
            return false;
      }
    );

       
    */        
          
            // Event listener to the two range filtering inputs to redraw on input
          

// Re-draw the table when the a date range filter changes

 
$(document).ready(function() {
   $("#mindate").datepicker({ dateFormat: 'yy/mm/dd',  onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
   $("#maxdate").datepicker({ dateFormat: 'yy/mm/dd', onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
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

<!-- End delete js--->
