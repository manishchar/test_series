  <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
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