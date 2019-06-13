<style>
    .panel-heading .dropdown-menu-right{display:none !important;}
    .qsList{
            border-bottom-style: ridge;
            margin-top: 10px;
        }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Test Series</h1>
            <small>Question List</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>Question List Page</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        
                            <div class="col-sm-12 text-right">
                 <?php  //if(has_permission(8,'add')==true){ ?>
                     <a class="btn btn-add" href="<?php echo base_url(); ?>admin/test"> Back</a> 
                 <?php  //} ?>
                            </div>
                        <!-- </div> -->
                        <div class="" id="msgdiv"><?= msg();?></div>
                        <div class="">
                               
                                <?php
                                if(!empty($questions))
                                {
                                 foreach ($questions as $k=>$question)
                                    { 
                                        if($question->type== '1'){
                                            $type = 'radio';
                                        }else{
                                             $type = 'checkbox';
                                        }
                                        $arr = json_decode($question->response);
                                        ?>
                                        <div class="col-sm-12 form-group">
                                        <div class="col-sm-12" style="padding: 10px;font-weight: bolder;"><?= ($k+1).' )'.$question->question; ?></div>
                                            <?php
                                             foreach($arr as $key=>$value){ ?>
                                            <div class="col-sm-12 qsList">
                                                <div class="col-sm-1">
                                                <input type="<?= $type ?>" id="<?=  $key; ?>" name="" disabled>
                                                </div>
                                                <div class="col-sm-11">
                                                    <label for="<?=  $key; ?>"><?= $value; ?></label>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            
                                            <!-- <div class="col-sm-12">Title</div>
                                            <div class="col-sm-12">Title</div>
                                            <div class="col-sm-12">Title</div>
                                             -->
                                        </div>
                                    <?php
                                    }
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--Start delete js-->
<script>
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

