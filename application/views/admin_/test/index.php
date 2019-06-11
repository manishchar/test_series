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
                                             <td><?php echo ucfirst($test->cource_name); ?></td>
                                             <td><?php 
                                             $mappings = getMapping($test->id);

                                              ?>
                                                 <ul>
                                                    <?php
                                                    foreach ($mappings as $key => $value) { ?>
                             <li><a href="<?= base_url().'admin/test/detail/'.$test->id.'/'.$value->batch_id; ?>"><?= ucfirst($test->cource_name).' ( '.$value->starttime.' - '.$value->endtime.' )' ?> </a>
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

                                                <a href="<?php echo base_url(); ?>admin/test/add/<?php echo $test->id; ?>"><button type="button" class="btn btn-add btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></a> |
                                                
<?php if ($test->IsActive == 1){ ?> 
<a href="<?php echo base_url(); ?>admin/test/deactiveTest/<?php echo $test->id; ?>" class="btn btn-danger" title="Deactive"><i class="fa fa-remove"></i></a> |
<?php }else{ ?> 
<a href="<?php echo base_url(); ?>admin/test/activeTest/<?php echo $test->id; ?>" class="btn btn-success" title="Active"><i class="fa fa-check"></i></a> |
<?php } ?>
                                                

                                                <a href="<?php echo base_url(); ?>admin/test/add_question/<?php echo $test->id; ?>"><button type="button" class="btn btn-primary btn-sm" title="Add Question"><i class="fa fa-plus"></i></button></a>

                                                
                                                <a  href="<?php echo base_url(); ?>admin/test/question_list/<?php echo $test->id; ?>" class="remove-row btn btn-danger btn-sm" title="Question List" type="button"><i class="fa fa-eye"></i></a>

                                                <a  href="<?php echo base_url(); ?>admin/test/view_question/<?php echo $test->id; ?>" class="remove-row btn btn-info btn-sm" title="Question graphical View" type="button"><i class="fa fa-indent"></i></a>

                                                <button tid="<?= $test->id; ?>" onclick="mappingPopup('<?= $test->id; ?>')" class="btn btn-info btn-sm" title="Batch Mapping" type="button"><i class="fa fa-indent"></i>Mapping</button>



                                               
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
        <option value="<?= $batch->id ?>"><?= $batch->name ?></option>
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

