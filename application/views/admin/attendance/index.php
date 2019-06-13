<style>
    .panel-heading .dropdown-menu-right{display:none !important;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Attendance</h1>
            <small>List</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>Attendance List</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group">
                            <div class="buttonexport" id="buttonlist">
                 <?php  //if(has_permission(8,'add')==true){ ?>
                     <!-- <a class="btn btn-add" href="<?php echo base_url(); ?>admin/attendance/add"> <i class="fa fa-plus"></i> Add Batch</a>  -->
                 <?php  //} ?>
                            </div>
                        </div>
                        <div class="" id="msgdiv"><?= msg();?></div>
                        <div class="">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                        <th>SNO</th>
                                        <th>Technology</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                       <!--  <th>Prasent</th>
                                        <th>Absend</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($batches))
                                {
                                 foreach ($batches as $k=>$batch)
                                    { ?>
                                        <tr data-row-id="<?php echo ($k+1); ?>">
                                            <td><?php echo ($k+1); ?></td>
                                            <td><?php echo ucfirst($batch->name); ?></td>
                                            <td><?php echo date('d-M-Y',strtotime($batch->startdate)).' - '.date('d-M-Y',strtotime($batch->enddate)); ?></td>
                                            <td><?php echo $batch->starttime.' - '.$batch->endtime; ?></td>
                                             <!-- <td></td>
                                             <td></td> -->
                                            
                                            <td>

                                                <a href="<?php echo base_url(); ?>admin/attendance/add/<?php echo $batch->id; ?>"><button type="button" class="btn btn-add btn-sm" title="Edit"><i class="fa fa-plus"></i> Add</button></a>
                                                <a href="<?php echo base_url(); ?>admin/attendance/view/<?php echo $batch->id; ?>"><button type="button" class="btn btn-add btn-sm" title="List"><i class="fa fa-list"></i> List</button></a>
                                                
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

