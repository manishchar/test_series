<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style>
    .alert>p{display: inline-block;}
    .panel-heading .dropdown-menu-right{display:none !important;}
    .wysihtml5-toolbar li:nth-child(5){display:none !important;}
    .wysihtml5-toolbar li:last-child{display:none !important;}
</style>
<?php  
echo "string";
?>
<script>
  var start_date = '<?php echo date('Y-m-d',strtotime($batch->startdate)); ?>';
  var end_date = '<?php echo date('Y-m-d',strtotime($batch->enddate)); ?>';
  $( function() {
  
    $( "#attendance" ).datepicker({
      dateFormat: 'yy-mm-dd',
      minDate: start_date,
      maxDate: end_date,
      onSelect: function(dateText) {
        //console.log("Selected date: " + dateText + "; input's current value: " + this.value);
        $('#attendanceValue').val(dateText);
        $('#searchForm').submit();
      }
    });

  } );

  // function getAttendance(date){

  // }
  </script>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Attendance</h1>
            <small>Add</small>
        </div>
    </section>
    <section class="content">
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonlist">
                       <h4>
                       <span>Date <?= date('d-M-Y');  ?></span>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">

<?php
  if($test){
    $id = $test->id;
    $batchId = $test->batch_id;
    $series = $test->series;
  }else{
    $id = '';
    $batchId = '';
    $series = '';
  }
?>
<div class="col-sm-12 pull-right">
<form id="searchForm">
  <input type="text" placeholder="Select Date" id="attendance" name="date" required="" 
                autocomplete="off"  value="<?= $_GET['date']; ?>">
</form>
</div>

                    <form class="col-sm-12" method="post">
                   <?php
                   if($this->session->flashdata('message')){ ?>
<div class="alert alert-success"><?= $this->session->flashdata('message'); ?></div>
                   <?php } ?>
                   <?php
                   if($this->session->flashdata('error')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                   <?php } ?>
                <!-- <form> -->
                <input type="hidden" placeholder="Select Date" id="attendanceValue" name="date" required="" 
                autocomplete="off" value="<?= $_GET['date']; ?>">

                <input type="hidden" name="batch_id" id="batch_id" value="<?= $batch_id; ?>">
                <!-- </form> -->
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>SNO</th>
                            <th>Name</th>
                            <th>Present</th>
                            <th>SNO</th>
                            <th>Name</th>
                            <th>Present</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if($students){
                              foreach ($students as $key => $student) { 
if ($key % 2 == 0){
 echo " <tr>"; 
}
                                ?>
                                
                         
                            <td style="border-left: 1px solid gray "><?= ($key+1) ?></td>
                            <td><span id="<?= $student->student_id; ?>"><?= $student->name ?></span></td>
                            <td>
                              <!-- <input type="checkbox" name="atendance[]" for="<?= $student->student_id; ?>" value="<?= $student->student_id; ?>" <?php if(in_array($student->student_id,$studentIds)){ echo 'checked'; } ?>> -->
<input type="radio" name="atendance[<?= $student->student_id; ?>]" value="A" <?php if(in_array($student->student_id,$studentIds)){ echo 'checked'; }else{ $text = 'checked'; } ?> >A
<input type="radio" name="atendance[<?= $student->student_id; ?>]" value="P" <?= $text ?>>P
                            </td>
                          <!-- </tr> -->

                              <?php
if ($key % 2 != 0){
 echo " </tr>"; 
}
                               }
                            }
                           ?>
                        </tbody>
                      </table>
                    </div>
                    
                    <div class="reset-button">
                        <button class="btn btn-success w-md m-b-5" type="submit">Save</button>
                        <a href="<?php echo base_url(); ?>admin/test"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a>
                    </div>

                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>

<script type="text/javascript">
//   $('#attendance').change(function(){
// alert();
//   });
  // $.ajax({
  //   url:"",
  //   type:"POST",
  // });
</script>