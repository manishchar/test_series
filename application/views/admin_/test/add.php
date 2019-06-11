<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<style>
    .alert>p{display: inline-block;}
    .panel-heading .dropdown-menu-right{display:none !important;}
    .wysihtml5-toolbar li:nth-child(5){display:none !important;}
    .wysihtml5-toolbar li:last-child{display:none !important;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Test Series</h1>
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
                        <?php
                       if($this->uri->segment(4))
                       {
                           echo "Edit Test";
                       }
                       else
                       {
                           echo "Add Test";
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
    $technologyId = $test->technology;
    $series = $test->topic;
  }else{
    $id = '';
    $batchId = '';
    $technologyId = '';
    $series = '';
  }
?>

                    <form class="col-sm-9" method="post">
                   <?php
                   if($this->session->flashdata('message')){ ?>
<div class="alert alert-success"><?= $this->session->flashdata('message'); ?></div>
                   <?php } ?>
                   <?php
                   if($this->session->flashdata('error')){ ?>
<div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                   <?php } ?>
                    <div class="form-group">
                        <label>Technology<span style="color:red;">*</span></label>
                           <input type="hidden" name="test_id" value="<?= $id; ?>" >
                        <select class="form-control" name="technology_id" id="technology_id" required="">
                              <option value="" disabled="" selected="">Select Technology</option>
                              <?php
                            
                              if(!empty($technologies))
                              {
                                  foreach ($technologies as $technology)
                                  {
                                      ?>
                                      <option value="<?php  echo $technology->id;?>" <?php if($technologyId == $technology->id){ echo 'selected'; } ?>><?php echo ucfirst($technology->name); ?></option>
                                      <?php
                                  }
                              }
                              ?>
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label> Topic<span style="color:red;">*</span></label>
                        <input type="text"  class="form-control" id="topic" name="series" placeholder="Enter Series" value="<?= $series; ?>"  required >
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
  // $.ajax({
  //   url:"",
  //   type:"POST",
  // });
</script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    var availableTags = [];
    $('#technology_id').change(function(){
        getTopic();
    });
    function getTopic(){
    $.ajax({
    type: "POST",
    url: "<?php echo base_url().'admin/test/getTopic'; ?>",
    data: {technology_id: $('#technology_id').val()},
    // contentType: "application/json; charset=utf-8",
    // dataType: "json",
    async:false,
    success: function(result){
       // alert(result.d);
        var obj = JSON.parse(result);
        availableTags = obj;
    }
});    
    
  
    $( "#topic" ).autocomplete({
      source: availableTags
    });
  
  }
  </script>