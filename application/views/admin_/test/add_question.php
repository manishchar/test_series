<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style>
    .alert>p{display: inline-block;}
    .panel-heading .dropdown-menu-right{display:none !important;}
    .wysihtml5-toolbar li:nth-child(5){display:none !important;}
    .wysihtml5-toolbar li:last-child{display:none !important;}
    .label {    background: gray;
    line-height: 34px;
    color: #fff;}
    .removeBtn{
      position: absolute;
    right: 8px;
    top: 0px;
    /*border: 1px solid red;*/
    line-height: 15px;
    padding: 10px;
    color: #cc2020;
    background: #e0bfbf
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Test Series</h1>
            <small>Manage Batch</small>
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
                           echo "Edit Batch";
                       }
                       else
                       {
                           echo "Add Batch";
                       }
                       ?>
                       </h4>
                   </div>
                </div>
                <div class="panel-body">

<?php

  if($question){
    $id = $question->id;
    $ques = $question->question;
    $type = $question->type;
    $response = $question->response;
    $answare = $question->answare;
    
  }else{
    $id = '';
    $ques = '';
    $type = '';
    $response = '';
    $answare = '';
    
   // $test_id = '';
  }
  $test_id = $test->id;
?>

                    <form class="col-sm-12" method="post">
                   <?php
                   if($this->session->flashdata('message')){ ?>
<div class="alert alert-success"><?= $this->session->flashdata('message'); ?></div>
                   <?php } ?>
                   <?php
                   if($this->session->flashdata('error')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                   <?php } ?>
                    <div class="form-group">
                        <label>Question<span style="color:red;">*</span></label>
                        <input type="hidden" name="test_id" value="<?= $test_id; ?>" >
                        <input type="hidden" name="id" value="<?= $id; ?>" >
                        <input type="text" name="question" placeholder="Enter Question" class="form-control" value="<?= $ques; ?>" >
                      
                    </div>

                     <div class="col-sm-6 form-group">
                        <label class="col-sm-4 label"> Type <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                          <select class="form-control" required="" name="type">
                            <option value="1" <?php if($type == '1'){ echo 'selected'; } ?>>Objective</option>
                            <option value="2" <?php if($type == '2'){ echo 'selected'; } ?>>Multi choice</option>
                          </select>
                          
                        </div>
                    </div>

                     <div class="col-sm-6 form-group">
                          <input type="checkbox"  name="mendetory" id="mendetory" value="1">
                          <label for="mendetory"> Mendetory </label>
                    </div>
                    <div id="responseSection">
                      <?php
                      $arr=$answare_arr= array();
if($response == ''){
  $count = 4;
}else{
  $answare_arr = explode(',',$answare);
  $arr = json_decode($response);
  $count = count($arr);
}                      
for($i = 0; $i<$count;$i++){ ?>


                    <div class="col-sm-12 form-group">
                      <label class="col-sm-1 label">
                        <?php if(in_array( ($i+1),$answare_arr)){
                          $text = "checked";
                        }else{
                          $text = "";
                        } ?>
                        <input type="checkbox" <?= $text; ?> class="answares" id="<?= ($i+1); ?>" name="ans[]" value="<?= ($i+1); ?>"> <span for="<?= $i; ?>">Is Ans</span>
                      </label>
                        <label class="col-sm-1 label"> Response <?= ($i+1); ?><span style="color:red;">*</span></label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" name="response[]" placeholder="Enter Series" value="<?= $arr[$i]; ?>"  required >
                          
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                    
                  
                    
                    <div class="col-sm-12 text-right" >
                      <button type="button" id="addMoreBtn" rid="<?= ($i+1); ?>" onclick="addMore(this)" class="btn btn-default "><i class="fa fa-plus"></i>&nbsp;Add More</button>
                    </div>
                    <input type="hidden" name="answares" id="ansValue" class="form-control" value="<?= $answare; ?>">
                    <div class="col-sm-12 reset-button">
                      <?php
                        if($id != ''){ ?>
<input type="submit" name="update" class="btn btn-warning w-md m-b-5" value="Update" />
                        <?php }else{ ?>
<input type="submit" name="next" class="btn btn-warning w-md m-b-5" value="Save & Next" />
<input type="submit" name="finish" class="btn btn-success w-md m-b-5" type="submit" value="Finish" /> 
                        <?php } ?>
                        
                        
                        <a href="<?php echo base_url(); ?>admin/test"><button class="btn btn-danger w-md m-b-5" type="button">Back</button></a>
                    </div>

                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
</div>

<script type="text/javascript">
  $(document).on('change','.answares' ,function(){
    getAnsware();
    //alert($(this).val());
  });
  function getAnsware(){
    var asn = [];
    var i = 1;
    $('.answares').each(function(){
      if($(this).prop('checked')){
      asn.push(i);  
      }
      i++;
    });
    //alert(asn);
    $('#ansValue').val(asn);
  }
  function removeItem(obj){
    $(obj).parent().parent().remove();
    getAnsware();
  }
  function addMore(obj){
    var number = $(obj).attr('rid');
    $('#addMoreBtn').attr('rid',(parseInt(number)+1) );
    var html = '';
    html += '<div class="col-sm-12 form-group">';
    html += '<label class="col-sm-1 label"><input type="checkbox" class="answares" id="'+number+'" name="ans[]" value="'+number+'"> <label for="'+number+'">Is Ans</label></label>';
    html += '<label class="col-sm-1 label"> Response '+number+'<span style="color:red;">*</span></label>';
    html += '<div class="col-sm-10">';
    html += ' <input type="text"  class="form-control" name="response[]" placeholder="Enter Series" value="<?= $series; ?>"  required >';
    html += ' <i onclick="removeItem(this)" class="fa fa-trash removeBtn"></i>';
    html += ' </div>';
    html += '</div>';

    $('#responseSection').append(html);
  }
  // $.ajax({
  //   url:"",
  //   type:"POST",
  // });
</script>