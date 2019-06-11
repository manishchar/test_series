<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-users"></i>
        </div>
        <div class="header-title">
            <h1>Deduction</h1>
            <small>Manage Deduction</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>Manage Deduction</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group">
                            <div class="buttonexport" id="buttonlist">
                                <a class="btn btn-add" href="<?php echo base_url(); ?>admin/deduction/add"> <i class="fa fa-plus"></i> Add Deduction</a>
                            </div>
                        </div>
                        <div class="" id="msgdiv"><?= msg();?></div>

                        <div class="">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                        <th style="display:none;">id</th>
                                        <th width="20%">Transaction Type</th>
                                        <th width="20%">Amount</th>
                                        <th width="20%">Date</th>
                                        <th width="20%">Created By</th>
                                    
                                        <th width="20%">Remark</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($datalist))
                                {
                                    foreach ($datalist as $datalisti)
                                    {
                                    ?>
                                        <tr data-row-id="<?php echo $datalisti->id;?>">
                                            <td style="display:none;"><?php echo $datalisti->id; ?></td>
                                            <td><?php echo ucfirst($datalisti->transaction_type); ?></td>
                                            <td><?php echo ucfirst($datalisti->amount); ?></td>
                                            <td><?php echo ucfirst($datalisti->currentdate); ?></td>
                                            <td><?php echo ucfirst($datalisti->created_by); ?></td>
                                            <td><?php echo ucfirst($datalisti->remark); ?></td>
                                           
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
                    url: "<?php echo base_url(); ?>admin/patners/delete/"+id,
                    cache:false,
                    //data: {id:id},
                    success: function(response)
                    {
                        $('table tr').filter("[data-row-id='" + id + "']").remove();
                        var url = '<?php echo base_url();?>admin/patners'; //please insert the url of the your current page here, we are assuming the url is 'admin'
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
