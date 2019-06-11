<style>
    .panel-heading .dropdown-menu-right{display:none !important;}
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
                        <div class="btn-group" id="buttonexport">
                            <h4>Manage Batch</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group">
                            <div class="buttonexport" id="buttonlist">
                 <?php  if(has_permission(8,'add')==true)
                  {
                  ?>
                     <a class="btn btn-add" href="<?php echo base_url(); ?>admin/batch/add"> <i class="fa fa-plus"></i> Add Batch</a> 
                 <?php  }
                  ?>
                            </div>
                        </div>
                        <div class="" id="msgdiv"><?= msg();?></div>
                        <div class="">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                        <th style="display:none;">id</th>
                                        <th>Technology</th>
                                        <th>Lab</th>
                                        <th>Faculty</th>
                                       
                                        <th>Start Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($datalist))
                                {
                                 foreach ($datalist as $datalisti)
                                    {
                         // $course=$this->admin->getVal('SELECT title FROM course where id='.$datalisti->course_id.'');
                           $technology=$this->admin->getVal('SELECT name FROM technology  where id = "'.$datalisti->course_id.'"');
                             $faculty=$this->admin->getVal('SELECT name FROM admin where id='.$datalisti->faculty_id.'');
                             
                               $lab=$this->admin->getVal('SELECT name FROM lab where id='.$datalisti->lab_id.'');
                                    ?>
                                        <tr data-row-id="<?php echo $datalisti->id; ?>">
                                            <td style="display:none;"><?php echo $datalisti->id; ?></td>
                                            <td><?php echo ucfirst($technology); ?></td>
                                            <td><?php echo ucfirst($lab); ?></td>
                                             <td><?php echo ucfirst($faculty); ?></td>
                                            
                                    
                                             <td><?php $date = strtotime($datalisti->startdate);
   echo date('d/m/Y', $date); ?>

                                               </td>
                                            <td><?php echo $datalisti->starttime; ?></td>
                                            <td>
                                            <?php
                                            if ($datalisti->status == 1)
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
                                                <?php
                                                if(has_permission(8,'view')==true)
                                                {
                                                ?>
                                                <a href="<?php echo base_url(); ?>admin/batch/view/<?php echo $datalisti->id; ?>"><button type="button" class="btn btn-primary btn-sm" title="View"><i class="fa fa-eye"></i> </button></a>
                                                <?php
                                                }

                                                if(has_permission(8,'edit')==true)
                                                {
                                                ?>
                                                <a href="<?php echo base_url(); ?>admin/batch/add/<?php echo $datalisti->id; ?>"><button type="button" class="btn btn-add btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></a>
                                                <?php
                                                }

                                                if(has_permission(8,'delete')==true)
                                                {
                                                ?>
                                                <button data-id="<?php echo $datalisti->id; ?>" class="remove-row btn btn-danger btn-sm" title="Delete" type="button"><i class="fa fa-trash-o"></i></button>
                                                <?php
                                                }
                                                ?>
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

