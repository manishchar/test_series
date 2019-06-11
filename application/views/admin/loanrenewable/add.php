<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style>
    .alert>p{display: inline-block;}
    .panel-heading .dropdown-menu-right{display:none !important;}
    .wysihtml5-toolbar li:nth-child(5){display:none !important;}
    .wysihtml5-toolbar li:last-child{display:none !important;}
    input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-briefcase"></i>
        </div>
        <div class="header-title">
        <h1>Loan Repayment</h1>
        <small>Loan Repayment</small>
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
                    if($this->uri->segment(3))
                       {
                        echo "Loan Repayment";
                       }
                    else
                       {
                        echo "Loan Repayment";
                       }

                  $getdata=$this->admin->getRow("SELECT * FROM user WHERE id = '".$selectall->user_id."'");   
                  $remaindata=$this->admin->getRow("SELECT sum(amount) as totalamount,sum(penalty) as totalpenalty FROM loan_payment WHERE loan_id = '".$selectall->loan_id."'");   

  
$date = strtotime($selectall->currentdate);
$dat1 = date('Y-m-d', $date);
$dat2 = date("Y-m-d");
//echo  $date1;
//echo  $date2;

$date1 = date_create($dat1);
$date2 = date_create($dat2);

//difference between two dates
$diff = date_diff($date1,$date2);

$diff->format("%a");

?> 
                    </h4>
                   </div>
                </div>
                <div class="panel-body">
                    <form class="col-sm-9" method="post" action="<?php echo base_url(); ?>agent/loanrenewable/add_loan" enctype="multipart/form-data">
                    <?= msg();?>
      <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
           <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">
                <label>Loan ID :</label>
                <label><?php if(!empty($selectall)){ echo $selectall->loan_id;}?>
                <input type="hidden" name="loan_id" value="<?php if(!empty($selectall)){ echo $selectall->loan_id;}?>">
                </label>
                </div>
       </div> </div>
        <div class="col-sm-6">
              <div class="form-group">
              <label>User ID :</label>
              <label><?php if(!empty($selectall)){ echo $selectall->user_id;}?>
                <input type="hidden" name="user_id" value="<?php if(!empty($selectall)){ echo $selectall->user_id;}?>">
              </label>
              </div>
      </div>
      </div>
           <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
           <div class="form-group">
  <label>Name :</label>
                <label><?php if(!empty($getdata)){ echo $getdata->fname.' '.$getdata->lname;}?></label>               
                </div>
       </div> </div>
        <div class="col-sm-6">
                <div class="form-group">
  <label>Mobile :</label>
                <label><?php if(!empty($getdata)){ echo $getdata->mobile;}?></label>              
                </div>
      </div>
      </div>
           <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
           <div class="form-group">
  <label>Loan Amount :</label>
                <label><?php if(!empty($selectall)){ echo $selectall->amount;}?></label>               
                </div>
       </div> </div>
        <div class="col-sm-6">
                <div class="form-group">
  <label>Total amount :</label>
                <label><?php if(!empty($selectall)){ echo $selectall->total_amount;}?></label>              
                </div>
      </div>
      </div>
        <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
           <div class="form-group">
   <label>Loan Start Date :</label>
                <label><?php if(!empty($selectall)){
   $date = strtotime($selectall->currentdate);
   //$date = strtotime($date);
   echo date(' d M, Y', $date);
                 }?></label>               
                </div>
   </div> </div>
   <div class="col-sm-6">
   <div class="form-group">
   <label>Loan End Date :</label>
   <label><?php if(!empty($selectall)){$date1 = strtotime($selectall->currentdate);
   $date1 = strtotime("+".$selectall->period." day", $date1);
   echo date('d M, Y', $date1);
                }?></label>              
                </div>
   </div>
   </div>
         <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
      <div class="form-group">
     <label>Loan Period :</label>
       <label><?php if(!empty($selectall)){ echo $selectall->period;}?></label>               
    </div>
    </div> </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label>Daily Installment :</label>
    <label><?php if(!empty($selectall)){ echo $selectall->monthly_reputation;}?></label>              
                </div>
      </div>
      </div>
     

  <h3>Make Deposit</h3>
  </br>
  <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
       <div class="form-group">
       <label>Remaining Loan :</label>
       <label><?php if(!empty($remaindata)){ $a = $selectall->total_amount - $remaindata->totalamount;  echo $a;}?></label>               
       </div>
       </div> </div>
       <div class="col-sm-6">
    <div class="form-group">
    <label>Paid Loan :</label>
    <label><?php if(!empty($remaindata)){ echo $remaindata->totalamount;}?></label>              
    </div>
      </div>
      </div>
       <!--  <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
      <div class="form-group">
     <label>Today collection  :</label>
       <label><?php if(!empty($selectall)){ $b = $selectall->monthly_reputation * $diff->format("%a"); echo $b;}?></label>               
    </div>
    </div> </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label>Remain collection  :</label>
    <label><?php if(!empty($selectall)){ $c = $b - $remaindata->totalamount; //echo $c;
if ($c < 0)
{
echo 0;
}
else{
echo $c;
}
    }?></label>              
                </div>
      </div>
      </div>-->
       <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
      <div class="form-group">
      <label>Penalty Loan :</label>
       <label><?php if(!empty($remaindata)){ echo $remaindata->totalpenalty;}?></label>               
       </div>
       </div> </div>
       <div class="col-sm-6">
    
      </div>
      </div>

      <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
        <div class="form-group">
           <div class="form-group">
                <label>Amount(राशि)<span style="color:red;">*</span></label>
                <input type="hidden" name="id" value="<?php if(!empty($selectall)){ echo $selectall->id;}?>" >
                <input type="text" id="Amount"  onchange="txtAmountChanged()" class="form-control"  name="amount" id="amount" placeholder="Enter amount"  value="<?php if(!empty($remaindata)){ $a = $selectall->total_amount - $remaindata->totalamount;  echo $a;}?>"  readonly>
                </div>
               
                </div>
       </div></div>
       <div class="col-sm-6">
                 
      </div>
      </div>
         <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
                 <label>Loan type(ऋण प्रकार)<span style="color:red;">*</span></label>
                <select class="form-control" name="loan_type" id="IDLoanType" onchange="drbLoanTypeChanged()" >
                
                <option <?php if($form_data['loan_type']){if($form_data['loan_type']==1){echo "selected";}}elseif(!empty($selectall)){ if($selectall->loan_type==1){ echo " selected";}  }  ?> value="1">Short Term - 55 - (10.00%)</option>
                <option <?php if($form_data['loan_type']){if($form_data['loan_type']==2){echo "selected";}}elseif(!empty($selectall)){ if($selectall->loan_type==2){ echo " selected";}  }  ?> value="2">Long Term - 100 - (20.00%)</option>
                 <option <?php if($form_data['loan_type']){if($form_data['loan_type']==3){echo "selected";}}elseif(!empty($selectall)){ if($selectall->loan_type==3){ echo " selected";}  }  ?> value="3">Long Term - 120 - (20.00%)</option>
                <option <?php if($form_data['loan_type']){if($form_data['loan_type']==4){echo "selected";}}elseif(!empty($selectall)){ if($selectall->loan_type==4){ echo " selected";}  }  ?> value="4">Long Term - 200 - (20.00%)</option>
                </select>
                </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
                <label>Period(अवधि)<span style="color:red;">*</span> </label>
                         <input type="text"  class="form-control" id="Tenor" name="period" placeholder="Enter Created By"  value=""  required>
                </div>
      </div>
      </div>
       <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
                <label>Rate of interest(ब्याज की दर) <span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="rateof_interest" id="InterestRate" placeholder="Enter Created By"  value=""  required>
                </div>
        </div>
        <div class="col-sm-6">
                <div class="form-group">
                   <label>Interest amount(ब्याज राशि )<span style="color:red;">*</span></label>
                    <input type="text"  class="form-control"  name="Interest_amount" id="InterestAmount"  placeholder="Enter Interest amount"  value=""  required>
              
                </div>
      </div>
      </div>
       <div class="row">
       <div class="col-sm-6">
       <div class="form-group">
          <label>Total value(कुल मूल्य)<span style="color:red;">*</span> </label>
                    <input type="text"  class="form-control"  name="total_amount"  id="TotalValue"  placeholder="Enter Total value"  value=""  required>
              
                </div>
        </div>
        <div class="col-sm-6">
              <label>Monthly Reputation(मासिक प्रतिष्ठा) <span style="color:red;">*</span></label>
                        <input type="text"  class="form-control"  name="monthly_reputation" id="MonthlyRepayment"  placeholder="Enter Monthly Reputation"  value=""  required>   
      </div>
      </div> 
               <div class="reset-button">
                  <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                  <a href="<?php echo base_url(); ?>agent/currentloans"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                </div>
                 <h2>User Payment Detail</h2>
    <!--  <div class="row">
       <div class="col-sm-4">
       <div class="form-group">
        <div class="form-group">
                <label>Amount</label>
                <select id="user" name="user">
                <option value="" selected="">please select</option>
                <option value="1">Tiger Nixon</option>
                <option value="2">Garrett Winters</option>
                <option value="3">Ashton Cox</option>
                <option value="4">Cedric Kelly</option>
                <option value="5">Airi Satou</option>
                <option value="6">Tiger Nixon</option>
                <option value="7">Tiger Nixon</option>
       </select>
       </div>
       </div></div>
       <div class="col-sm-4">
                <div class="form-group">
                <label>Start date</label>
                <input name="mindate" id="mindate" type="text">
                </div>
      </div>
       <div class="col-sm-4">
                <div class="form-group">
                <label>End date</label>
                <input name="maxdate" id="maxdate" type="text">
                </div>
      </div>
      </div>-->

            </form>

             </br></br>

             <div class="">
             
                        <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                               
                               <th width="250px">SN</th>
                                <th width="250px">Date</th>
                                <th width="250px">Loan Repayment</th>
                                <th width="250px">Loan Penalty</th>
                                
                                </tr>
                                </thead>
                                <tbody>
                                <?php
              $datalist=$this->admin->getRows("SELECT *  FROM loan_payment WHERE loan_id = '".$selectall->loan_id."'");   

                                if(!empty($datalist))
                                {$i=0;
                                foreach ($datalist as $datalisti)
                                {$i++
                                
                                ?>
                                        <tr data-row-id="<?php echo $datalisti->id;?>">
                                           
                                            <td><?php echo $i; ?></td>
                                            <td><?php //echo $datalisti->datetimes;
   $date = strtotime($datalisti->datetimes);
   echo date('d/m/Y', $date);

                                             ?></td>
                                            <td><?php echo $datalisti->amount; ?></td>
                                            <td><?php echo $datalisti->penalty; ?></td>
                                           
                                          
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


<script src="  https://code.jquery.com/jquery-3.3.1.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
           // alert(min); alert(max);
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
    var table = $('#example').DataTable();
      /*$('<button>Click to sum age in all rows</button>')
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
            });  */ 
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
   $('#user').change( function() {
        table.draw();
    } );
} );

  </script>
<script type="text/javascript">

        function drbLoanTypeChanged()
        {
            performCalculations();
        }


        function txtAmountChanged()
        {
            performCalculations();
        }

        function performCalculations()
        {
            if ($('#Amount').val() > 0 && $('#IDLoanType').val() > 0) {

                try {
                    var irate = 0.0, iamount = 0.0, amount;

                    var rawRateData = $('#IDLoanType option:selected').text();
                    var arrayRate = rawRateData.split('-');

                    var duration = arrayRate[1].trim();
                    var rateString = arrayRate[2].trim();
                    //remove percentage
                    rateString = rateString.replace("%", "");
                    //remove brackets
                    rateString = rateString.replace("(", "");
                    rateString = rateString.replace(")", "");
                    //perform calculation
                    irate = parseFloat(rateString);
                    amount = parseFloat($('#Amount').val());
                    iamount = Math.round(amount * (irate / 100));

                    //set the textboxes
                    //Tenor  InterestRate   InterestAmount  TotalValue
                    $('#Tenor').val(duration);
                    $('#InterestRate').val(irate);
                    $('#InterestAmount').val(iamount);
                    $('#TotalValue').val(iamount + amount);
                    $('#MonthlyRepayment').val(Math.round((iamount + amount) / parseFloat(duration)));
                }
                catch (ex) {

                }


            }
        }
        </script>