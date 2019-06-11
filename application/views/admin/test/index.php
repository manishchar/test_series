<style>
    .panel-heading .dropdown-menu-right{display:none !important;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Test Series</h1>
            <small>List</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>Manage Test Series</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group">
                            <div class="buttonexport" id="buttonlist">
                 <?php  //if(has_permission(8,'add')==true){ ?>
                     <a class="btn btn-add" href="<?php echo base_url(); ?>admin/test/add"> <i class="fa fa-plus"></i> Add Test Series </a> 
                 <?php  //} ?>
                            </div>
                        </div>
                        <div class="" id="msgdiv"><?= msg();?></div>
                        <div class="">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                        <th style="display:none;">id</th>
                                        <th>Topic</th>
                                        <th>Name</th>
                                        
                                        <th>Technology</th>
                                        <th>Batch</th>

                                        <th>Question</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($tests))
                                {
                                 foreach ($tests as $test)
                                    { ?>
                                        <tr data-row-id="<?php echo $test->id; ?>">
                                            <td style="display:none;"><?php echo $test->id; ?></td>
                                            <td><?php echo ucfirst($test->topic); ?></td>
                                            <td><?php echo ucfirst($test->name); ?></td>
                                             <td><?php echo ucfirst($test->cource_name); ?></td>
                                             <td><?php 
                                             $mappings = getMapping($test->id);

                                              ?>
                                                 <ul>
                                                    <?php
                                                    foreach ($mappings as $key => $value) { ?>
                             <li><a href="<?= base_url().'admin/test/detail/'.$value->id; ?>"><?= ucfirst($test->cource_name).' ( '.$value->starttime.' - '.$value->endtime.' )' ?> </a>
                                 <a target="_blank" href="<?php echo base_url(); ?>test/index/<?php echo $value->id; ?>"><button type="button" class="btn btn-primary btn-sm" title="Test Series Link"><i class="fa fa-link"></i></button></a>
                             </li>
                                                    <?php }
                                                    ?>
                                                     
                                                     <!-- <li>two</li> -->
                                                 </ul>
                                             </td>
                                             <td><?php echo getQuestionCount($test->id); ?></td>
                                            
                                 
                                            <td>
                                            <?php
                                            if ($test->IsActive == 1)
                                            {
                                            ?>
                                                <span class="label-custom label label-default">Active</span>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                                <span class="label-danger label label-default">Inctive</span>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                            <td>

                              
<div class="dropdown">
<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
<span class="caret"></span></button>
<ul class="dropdown-menu">
    <li>
         <a href="<?php echo base_url(); ?>admin/test/add/<?php echo $test->id; ?>" class="text text-warning" title="Edit"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
    </li>
<li>
    <?php if ($test->IsActive == 1){ ?> 
    <a href="<?php echo base_url(); ?>admin/test/deactiveTest/<?php echo $test->id; ?>" class="text text text-danger" title="Deactive"><i class="fa fa-remove"></i>&nbsp;Deactive</a>
    <?php }else{ ?> 
    <a href="<?php echo base_url(); ?>admin/test/activeTest/<?php echo $test->id; ?>" class="text text-success" title="Active"><i class="fa fa-check"></i>&nbsp;Active</a>
    <?php } ?>
</li>
<li>
    <a href="<?php echo base_url(); ?>admin/test/add_question/<?php echo $test->id; ?>" class="text text-primary" title="Add Question"><i class="fa fa-plus"></i>&nbsp;Add Question</a>
</li>
<li>
    <a href="javascript:void(0)" class="text text-primary" onclick="uploadModel('<?= $test->id; ?>')"><i class="fa fa-upload"></i>&nbsp;Bulk Upload</a>
</li>
<li>
     <a  href="<?php echo base_url(); ?>admin/test/question_list/<?php echo $test->id; ?>" class="text text-danger" title="Question List"><i class="fa fa-eye"></i>&nbsp;Question List</a>
</li>
<li>
<a  href="<?php echo base_url(); ?>admin/test/view_question/<?php echo $test->id; ?>" class="text text-primary" title="Question graphical View"><i class="fa fa-indent"></i>&nbsp;Graphical List</a>
</li>
<li>
    <button tid="<?= $test->id; ?>" onclick="mappingPopup('<?= $test->id; ?>')" class="btn btn-info btn-sm" title="Batch Mapping" type="button"><i class="fa fa-indent"></i>Mapping</button>
</li>
</ul>
</div>                  
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

<div id="mapping" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Batch Mapping</h4>
      </div>
      <div class="modal-body">
        <form id="mappedForm" onsubmit="return mappedForm(this)">
            <input type="hidden" name="test_id" id="test_id">
        
        <div class="col-sm-12 form-group">
            <label>Select Batch</label>
            <select class="form-control" name="batch" id="batch" required="">
                <option value="0" selected="" disabled="">Select Betch</option>
                <?php
if($batches){
    foreach ($batches as $key => $batch) { ?>
        <option value="<?= $batch->id ?>"><?= $batch->name.'('.$batch->startdate.' : '.$batch->starttime.' - '.$batch->endtime.')' ?></option>
    <?php }
}
                ?>
                
            </select>
        </div>
        <div class="col-sm-12 form-group">
            <button type="submit">Batch Mapping</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--Start delete js-->

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
            <input type="hidden" name="test_id" id="upload_test_id" value="">
            
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

  function uploadModel(test_id){

    //fileNumber search oldFileNumber 
    $('#upload_test_id').val(test_id);
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
               location.reload();
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
</script>
<script>
    function mappingPopup(id){
        $('#test_id').val(id);
        $('#mapping').modal('show');
    }
    function mappedForm(obj){
        if($('#batch').val() != '' && $('#batch').val() != null){


        $.ajax({
    type: "POST",
    url: "<?php echo base_url().'admin/test/batchMapping'; ?>",
    data: $(obj).serialize(),
    // contentType: "application/json; charset=utf-8",
    // dataType: "json",
    async:false,
    success: function(result){
        console.log(result);
        
         var obj = JSON.parse(result);
         if(obj.status == 'success'){
          location.reload();  
         }
         if(obj.status == 'failed'){
            alert('Aleady Mapped');
         }
        // availableTags = obj;
    }
});
         }else{
            alert('please select batch');
        }
        return false;
    }
$('.remove-row').on('click', function(e) {
var id=$(this).attr('data-id');
if(id!='')
{
    $.confirm({
        theme: 'light',
        title: 'Confirmation',
        content: 'Are you sure you want to delete',
        icon: 'fa fa-question-circle',
        animation: 'scale',
        closeAnimation: 'scale',
        opacity: 0.5,
        buttons: {
            'OK': function () {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admin/batch/delete/"+id,
                    cache:false,
                    //data: {id:id},
                    success: function(response)
                    {
                        $('table tr').filter("[data-row-id='" + id + "']").remove();
                        var url = '<?php echo base_url();?>admin/batch'; //please insert the url of the your current page here, we are assuming the url is 'index.php'
                        $('#msgdiv').load(url + ' #msgdiv');
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


<!-- End delete js--->

