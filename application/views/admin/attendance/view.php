<link href="<?php echo base_url(); ?>assets/plugins/modals/component.css" rel="stylesheet" type="text/css"/>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group" id="">
                                    <h4>View</h4>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="btn-group">
                                   <a href="<?php echo base_url();?>admin/attendance" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                          
                         
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SNO</th>
                                        <th>Name</th>
                                        <?php
                                        $start_date =$batch->startdate; 
for($i=0;$i <= $batch->diff; $i++){ ?>
    <th><?= date('d-m',strtotime($start_date . "+".$i." days"));; ?></th>
<?php }
                                        ?>
                                    </tr>
                                </thead>

<tbody>
    <?php
    $a_total = $p_total = 0;
foreach ($students as $key => $student) { ?>
    <tr>
        <td><?= ($key+1); ?></td>
        <td><?= ucfirst($student->name); ?></td>
        <?php
        $start_date =$batch->startdate; 
        for($i=0;$i <= $batch->diff; $i++){ ?>
        <td><?php 
            $row_date = date('Y-m-d',strtotime($start_date . "+".$i." days"));
            $flag = getattendance($student->id,$batch->id,$row_date);
            if($flag == 'P'){ echo "P"; $p_total++; }else if($flag == 'A'){ echo "A";$a_total++; }
        ?></td>
        <?php } ?>
    </tr>
<?php } ?>
</tbody>                                
                            </table>
                        </div>  
                        
                         
                          
                        
                        
                      
                         
                         <div class="alert alert-primary">
                            Present Total : <span class="badge badge-success"><strong><?= $p_total; ?></strong></span>
                            Absent Total : <span class="badge badge-warning"><strong><?= $a_total; ?></strong></span>
                        <!-- <a href="<?php echo base_url(); ?>admin/batch"><button class="btn btn-warning w-md m-b-5" type="button">Back</button></a> -->
                    </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function viewpassword()
{
    <?php
    $plantext='';
    if(!empty($selectall))
    {
        $plantext=$this->encryption->decrypt($selectall->password);
    }
    ?>
    $(".pass").html('');
    $(".pass").html('<div class="avatar-name"><strong>Password: <?php echo $plantext; ?> </strong></div>');

}
</script>






