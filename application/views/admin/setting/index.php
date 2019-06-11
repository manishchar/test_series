<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-dashboard"></i>
        </div>
        <div class="header-title">
            <h1>Setting</h1>
            <small></small>
        </div>
    </section>
    <section class="content">
      
        <?= msg();?>
       
               <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-bd lobidisable">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Table List</h4>
                        </div>
                    </div>
                    <?php  ?>
                    <div class="panel-body">
                    <div class="col-sm-12 form-group">
                    <div class="col-sm-4"><strong>Table</strong></div>    
                    <div class="col-sm-2"><strong>Panding Records</strong></div>    
                    <div class="col-sm-4"><strong>Download</strong></div>    
                    <div class="col-sm-2">Action</strong></div>    
                    </div>
                        <?php foreach ($tables as $key => $value) { 
if(in_array('tbl_'.$value,array('tbl_admin','tbl_student','tbl_batch','tbl_branch','tbl_collagecode','tbl_degree','tbl_technology','tbl_technology_detail','tbl_lab'))){ 
    if($value == 'collagecode'){
        $data = array();
        $ress = $this->db->where('IsNew','1')->get($value)->result_array();
        if(!empty($ress)){
            foreach ($ress as $key => $val) {
                $val['name'] = str_replace("'"," ",$val['name']);
                $data[] = $val;
            }
        }else{
           $data = array();
        }
    }else{
        $data = $this->db->where('IsNew','1')->get($value)->result_array();      
    }

//print_r($data);

if(true){
//if(!empty($data)){
$count = count($data);
$res = json_encode($data);
                            ?>
<input type="hidden" id="data_<?= $value; ?>" value='<?= $res; ?>'>
                            <div class="col-sm-4">
                                <?= $value; ?>
                                    
                            </div>
                            <div class="col-sm-2 text-right">
                                <?= $count; ?>
                            </div>
                            <div class="col-sm-4 text-right">
                                <a class="btn btn-warning" href="<?= base_url().'admin/api/download/'.$value; ?>">Download</a>
                               
                            </div>
                            <div class="col-sm-2">
                                <?php if($count > 0){ ?> 
                                <a class="btn btn-danger" href="#" onclick="checkRecords('<?= $value; ?>')">Push</a>
                            <?php } ?> 
                            </div>
                        <?php } } } ?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              
            </div>
        </div>
    </section>
</div>


<script type="text/javascript">

    function updateRecords(name,ids){
        //alert(name);
        //alert(ids);
        // var data = $('#data_'+name).val();
        //alert(data);
         $.ajax({
          type: 'POST',
          url: "<?= base_url() ?>admin/api/updateTable",
         // processData: true,
          data: {"ids":ids,"name":name},
          //dataType: "json",
          success: function (data) { console.log(data); 
            location.reload();
            }
          });
    }
    function checkRecords(name){
       var r= confirm('Are you sure?');
       if(r){
        var data = $('#data_'+name).val();
        //alert(data);
         $.ajax({
          type: 'POST',
          url: "http://crm.cybrom.com/api/checkTable",
         // processData: true,
          data: {"data":data,"name":name},
          //dataType: "json",
          success: function (data) { 
                console.log(data);
                var obj = JSON.parse(data);
                if(obj.status == 'success'){
                    console.log(obj.ids);
                    updateRecords(name,obj.ids);
                }

                if(obj.status == 'failed'){

                }
            }
            
          });
        }
    }
</script>