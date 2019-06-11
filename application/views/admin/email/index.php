<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-envelope-o"></i>
        </div>
        <div class="header-title">
            <h1>Email</h1>
            <small>Email Template</small>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonexport">
                            <h4>Email Template</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group">
                            <div class="buttonexport" id="buttonlist"></div>
                        </div>
                        <?= msg();?>
                        <div class="">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="info">
                                        <th style="display:none;">id</th>
                                        <th>Email Type</th>
                                        <th>Subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (!empty($datalist))
                                {
                                    foreach ($datalist as $datalisti)
                                    {
                                    ?>
                                        <tr>
                                            <td style="display:none;"><?php echo $datalisti->email_id; ?></td>
                                            <td><?php echo $datalisti->type; ?></td>
                                            <td><?php echo ucfirst($datalisti->subject); ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/email/view/<?php echo $datalisti->email_id; ?>"><button type="button" class="btn btn-add btn-sm" data-toggle="modal" title="View"><i class="fa fa-eye"></i> </button></a>
                                                <a href="<?php echo base_url(); ?>admin/email/edit/<?php echo $datalisti->email_id; ?>"><button type="button" class="btn btn-add btn-sm" data-toggle="modal" title="Edit"><i class="fa fa-pencil"></i></button></a>
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
