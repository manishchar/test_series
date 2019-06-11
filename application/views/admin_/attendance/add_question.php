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
            <h1>Batch</h1>
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
                        <input type="hidden" name="test_id" value="<?= $id; ?>" >
                        <input type="text" name="question" placeholder="Enter Question" class="form-control" value="<?= $id; ?>" >
                      
                    </div>

                     <div class="col-sm-6 form-group">
                        <label class="col-sm-4 label"> Type <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                          <select class="form-control" required="" name="type">
                            <option value="1">Objective</option>
                            <option value="2">Multi choice</option>
                          </select>
                          
                        </div>
                    </div>

                     <div class="col-sm-6 form-group">
                          <input type="checkbox"  name="mendetory" id="mendetory" value="1">
                          <label for="mendetory"> Mendetory </label>
                    </div>
                    <div id="responseSection">
                      <?php
for($i = 1; $i<5;$i++){ ?>


                    <div class="col-sm-12 form-group">
                        <label class="col-sm-2 label"> Response <?= $i; ?><span style="color:red;">*</span></label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" name="response[]" placeholder="Enter Series" value="<?= $series; ?>"  required >
                          
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                    
                  
                    
                    <div class="col-sm-12 text-right" >
                      <button type="button" id="addMoreBtn" rid="<?= $i; ?>" onclick="addMore(this)" class="btn btn-default "><i class="fa fa-plus"></i>&nbsp;Add More</button>
                    </div>
                    <div class="col-sm-12 reset-button">
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
  function removeItem(obj){
    $(obj).parent().parent().remove();
  }
  function addMore(obj){
    var number = $(obj).attr('rid');
    $('#addMoreBtn').attr('rid',(parseInt(number)+1) );
    var html = '';
    html += '<div class="col-sm-12 form-group">';
    html += '<label class="col-sm-2 label"> Response '+number+'<span style="color:red;">*</span></label>';
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