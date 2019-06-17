  <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

    $('.type').change(function(){
      var type = $(this).val();
      if(type == '2'){
        $('#studentNumberSection').show();
        $("#college option").attr("disabled","disabled");
        $("#degree option").attr("disabled","disabled");
        $('#name,#email,#mobile,#roll_no').prop('readonly',true);
        // $("select option").prop("disabled", false);
        
      }

      if(type == '1'){
        $('#studentNumberSection').hide();
        $("#college option").prop("disabled",false);
        $("#degree option").prop("disabled",false);
        $('#name,#email,#mobile,#roll_no').prop('readonly',false);
        $('#name,#email,#mobile,#roll_no,#studentNumber').val('');
        // $("select option").prop("disabled", false);
        
      }
    });

     $('.studentNumber').change(function(){
        var sid = $(this).val();
        $('#generateBtn').attr('disabled',true);
         $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/student/checkStudentNumber",
            cache:false,
            data: {sid:sid},
            success: function(response)
            {
               // console.log(response);
                var obj = JSON.parse(response);
                if(obj.status == 'success'){
                  //console.log(obj.results);
                  var detail =obj.results.detail;
                  var branch =obj.results.branch;
                  console.log(detail);
                  console.log(branch);
                  $('#name').val(detail.name);
                  $('#email').val(detail.email);
                  $('#mobile').val(detail.mobile);
                  $('#roll_no').val(detail.roll_no);
                  $("#college option[value='"+detail.college+"']").prop("disabled", false);
                  $("#degree option[value='"+detail.degree+"']").prop("disabled", false);
                  $('#college').val(detail.college);
                  $('#degree').val(detail.degree);
                  var semester =($('#degree').find(':selected').attr('sid'));
                  
                  
                  var htm = "";
                  if(branch != null){
                  htm += '<option value="" selected> Select Branch</option>';
                  htm += '<option value="'+branch.id+'" selected>'+branch.name+'</option>';
                  }else{
                   htm += '<option value="" selected> No Branch</option>'; 
                  }
                  $('#branch').html(htm);
                  var html = "";
                  if(semester != ''){
                  html += '<option value="" selected> Select Semester</option>';
                  var arrTopc = semester.split(',');
                  if(arrTopc.length >0){
                  $("#semister").attr('required',true);      

                  for(var i=0;i<arrTopc.length;i++){
                  //console.log(arrTopc[i]);
                  html += '<option value="'+arrTopc[i]+'">'+arrTopc[i]+' Semester</option>';
                  }
                  }
                  }else{
                  html += '<option value="0" selected disabaled> No Result</option>';
                  }

                  $('#semister').html(html);
                  //$('#college').val(obj.results.college);

                    $('#generateBtn').attr('disabled',false);
                }

                if(obj.status == 'failed'){
                    $('#generateBtn').attr('disabled',true);
                }
            }
        });
        
    });
    //jquery script
    <?php if($form_data['technology'] != ''){?>
    
     var id = <?php  if($form_data['technology'] != ''){ echo $form_data['technology']; }?>;
     var batch_id = <?php if($form_data['batch_id'] != ''){ echo $form_data['batch_id'];} ?>;
   
      $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>home/getcourse",
                    cache:false,
                    data: {id:id,batch_id:batch_id},
                    success: function(response)
                    {
                      $("#batch_id").html(response); 
                    }
  });

 

<?php } ?>
    <?php if($form_data['degree'] != ''){?>

// echo $selectall->alt_mobile;

 var degree = <?php if($form_data['degree'] != ''){  echo $form_data['degree'];} ?>;
 var branch = <?php if($form_data['branch'] != ''){  echo $form_data['branch'];} ?>;


      $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>home/getbranch/"+degree+"/"+branch,
                    cache:false,
                    data: {id:degree,branch:branch},
                    success: function(response)
                    {
                      $("#branch").html(response);    
                    }
  });

<?php } ?>

  $("#technology").change(function(){
var topic =($(this).find(':selected').attr('topic'));
console.log(topic);
var html = "";
if(topic != ''){
var arrTopc = topic.split(',');
for(var i=0;i<arrTopc.length;i++){
  console.log(arrTopc[i]);
  html += '<div class="form-check form-check-inline"><input type="checkbox" class="form-check-input" name="topic[]" value="'+arrTopc[i]+'" id="'+arrTopc[i]+'"><label for="'+arrTopc[i]+'">'+arrTopc[i]+'</label></div>';

}
}
$('#topicSection').html(html);

// echo $selectall->alt_mobile;
    var id = $(this).val();
    var batch_id = '0';
     // alert(id);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>home/getcourse",
        cache:false,
        data: {id:id,batch_id:batch_id},
        success: function(response)
        {
          // alert(response);
          $("#batch_id").html(response);  
        }
  });

     });


$("#degree").change(function(){

    $("#branch").attr('required',false);   
    var semester =($(this).find(':selected').attr('sid'));
    //console.log(semester);
    var html = "";
    if(semester != ''){
      html += '<option value="" selected> Select Semester</option>';
      var arrTopc = semester.split(',');
      if(arrTopc.length >0){
         

        for(var i=0;i<arrTopc.length;i++){
          console.log(arrTopc[i]);
          html += '<option value="'+arrTopc[i]+'">'+arrTopc[i]+' Semester</option>';
        }
      }
    }else{
          html += '<option value="0" selected disabaled> No Result</option>';
    }

    $('#semister').html(html);
    var id = $(this).val();
    var branch = '0';
    $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>home/getbranch",
          cache:false,
          data: {id:id,branch:branch},
          success: function(response)
          {  
            if(response != ''){
              $("#branch").attr('required',true);
            }

            $("#branch").html(response);
            
          }
    });

});


 
  });
</script>
</body>

</html>