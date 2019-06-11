<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style>
    .alert>p{display: inline-block;}
    .panel-heading .dropdown-menu-right{display:none !important;}
    .wysihtml5-toolbar li:nth-child(5){display:none !important;}
    .wysihtml5-toolbar li:last-child{display:none !important;}
    .label {    
    background: gray;
    line-height: 34px;
    color: #ffffff;
  }
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
<div class="col-md-12 text-right">
                        <button type="button" class="btn btn-info" onclick="uploadModel()">Upload Record</button>
                      </div>
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

                    <form class="col-sm-12" method="post" onsubmit="return myform(this)">
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
                        <!-- <input type="text" name="question" placeholder="Enter Question" class="form-control" value="<?= $ques; ?>" > -->
                        <textarea name="question" placeholder="Enter Question" class="form-control" rows="3"><?= $ques; ?></textarea>
                      
                    </div>

                     <div class="col-sm-6 form-group">
                        <label class="col-sm-4 label"> Type <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                          <select class="form-control" required="" name="type" id="type">
                            <option value="1" <?php if($type == '1'){ echo 'selected'; } ?>>Objective</option>
                            <option value="2" <?php if($type == '2'){ echo 'selected'; } ?>>Multi choice</option>
                          </select>
                          
                        </div>
                    </div>

                     <div class="col-sm-6 form-group">
                          <input type="checkbox"  name="mendetory" class="mendetory" id="mendetory" value="1">
                          <label for="mendetory"> Mandatory </label>
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
                      <label class="col-sm-2 label"> Response <?= ($i+1); ?><span style="color:red;">*</span></label>
                      <label class="col-sm-2 label">
                        <?php if(in_array( ($i+1),$answare_arr)){
                          $text = "checked";
                        }else{
                          $text = "";
                        } ?>
                        <input type="checkbox" <?= $text; ?> class="answares" id="<?= ($i+1); ?>" name="ans[]" value="<?= ($i+1); ?>"> <span for="<?= $i; ?>">Is Ans</span>
                      </label>
                        
                        <div class="col-sm-12">
                          <!-- <input type="text"  class="form-control" name="response[]" placeholder="Enter Series" value="<?= $arr[$i]; ?>"  required > -->
                          <textarea class="form-control" name="response[]" placeholder="Enter Series" required><?= $arr[$i]; ?></textarea>
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


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bulk Upload</h4>
      </div>
      <div class="modal-body">
      <span class="text text-danger">Condition : </span>
      <span id="conditionMsg"> </span>
      <br/>
      <div class="file-upload">
      
        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger('click')">Add File</button>
        <form  class="form-horizontal" role="form" id="uploadForm" onsubmit="return uploadForm(this)">
          <div class="col-sm-12 form-group">
            <input type="hidden" name="test_id" id="test_id" value="<?= $test_id ?>">
            
            <!-- <input type="file" name="files" id="selectfile"> -->

            <div class="image-upload-wrap">
              <input class="file-upload-input" type="file" id="selectfile" name="files"/>
              <div class="drag-text">
              <h3>Drop Your File here</h3>
              </div>
            </div>
            <div class="col-sm-12 form-group">
                
                <i id="show" style="display: none;" class="text text-success fa fa-check" aria-hidden="true"></i>
                <i id="hide" class="text text-danger fa fa-times" aria-hidden="true"></i>
                <span id="fileName">&nbsp;No File Selected</span>
            </div>
          </div>
          <div class="col-sm-12 form-group">

          <input type="submit" class="btn btn-info" name="upload"  id="upload" value="Upload">
            <span id="errorMessage"></span>
          </div>
        </form>
      </div>
      </div>

      <div class="modal-footer">
            
            </div>

      
    </div>

  </div>
</div>

<style type="text/css">
.file-upload {
  background-color: #ffffff;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 5px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 10px;
  border: 4px dashed #1FB264;
  position: relative;
  width: 106%;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
  line-height:100px;
}

.drag-text h3 {
  font-weight: 20;
  text-transform: uppercase;
  color: #15824B;
  padding: 0px 0;
  display: inline-table;
}

.file-upload-image {
  max-height: 200px;
  max-width: 250px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}

</style>
<script type="text/javascript">

  function uploadModel(){

    //fileNumber search oldFileNumber 
    $('#selectfile').val('');
    $('#errorMessage').html('');
    $('#fileName').html('&nbsp;No File Selected');
    $('#show').hide();
    $('#hide').show();
    
    $('#myModal').modal('show');

    //conditionMsg
}

  $('#selectfile').change(function(){
    if($(this).val() == ''){
      $('#hide').show();
      $('#show').hide();
       $('#fileName').html(' No File Selected');
    }else{
      $('#hide').hide();
      $('#show').show();
      var url = $(this).val();
      var arrVars = url.split("\\");
      var name = arrVars.pop();
      $('#fileName').html(' '+name);
    }
  });
var base_url = "<?= base_url() ?>";
//alert(base_url);
function uploadForm(obj){
  //alert();

var formData = new FormData(obj);
   $.ajax({
        type: "POST",
        url: base_url+"/admin/test/uploadData",
        cache:false,
        contentType: false,
        processData: false,
        data:formData,
        beforeSend(xhr){     
                $('#upload').val('Loding.....');
                $('#errorMessage').html('');
                $('#upload').prop('disabled',true);
        },
         success: function(result){
            //getRecords();
            console.log(result);
            // return false;
            var obj = JSON.parse(result);
            if(obj.result == 'success'){
              alert(obj.message);
              $('#errorMessage').html('<span class="text text-success">'+obj.message+'</span>');
               //location.reload();
               $('#myModal').modal('hide');
            }

            if(obj.result == 'failed'){
              
              $('#errorMessage').html('<span class="text text-danger">'+obj.message+'</span>');

            }
       
       
       
         },error: function(data){
                //alert("error111");
                console.log(data);
            },complete: function(){
                //alert('complete');
               $('#upload').val('Upload');
               $('#upload').prop('disabled',false);
               // $('#saveLoader').hide();
         }  
    });



  return false;
}
  function myform(obj){
    if($('input[type="checkbox"]:checked').not('.mendetory').length > 0){
          // alert('invalid answare');
          // $(this).attr('checked',false);
          // return false;
    }else{
      alert('please select correct answer');
      return false;
    }
    return true;
  }
   $(document).on('change','#type' ,function(){
    //alert();
    $('.answares').each(function(){
      $(this).attr('checked',false);
    });
  });
  $(document).on('change','.answares' ,function(){
    if($('#type').val() == '1'){
        if($('input[type="checkbox"]:checked').not('.mendetory').length > 1){
          alert('invalid answare');
          $(this).attr('checked',false);
          return false;
        }
    }
    
    getAnsware();
    
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
    html += '<label class="col-sm-2 label"> Response '+number+'<span style="color:red;">*</span></label>';
    html += '<label class="col-sm-2 label"><input type="checkbox" class="answares" id="'+number+'" name="ans[]" value="'+number+'"> <label for="'+number+'">Is Ans</label></label>';
    html += '<div class="col-sm-12">';
    //html += ' <input type="text"  class="form-control" name="response[]" placeholder="Enter Series" value="<?= $series; ?>"  required >';
    html += ' <textarea type="text"  class="form-control" name="response[]" placeholder="Enter Series"  required ><?= $series; ?></textarea>';
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