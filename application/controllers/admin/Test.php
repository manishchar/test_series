<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('admin_id') == '')
        {
            redirect('admin/login');exit();
        }
    }

      public function activeTest($id){
        $flag = $this->db->where('id',$id)->update('test_series',array('IsActive'=>'1'));
        if($flag){
            $this->session->set_flashdata('message','Record Active');
        }else{
            $this->session->set_flashdata('error','Record Failed');
        }

        redirect(base_url().'admin/test');

    }

    public function deactiveTest($id){
        $flag = $this->db->where('id',$id)->update('test_series',array('IsActive'=>'0'));
        if($flag){
            $this->session->set_flashdata('message','Record Deactive');
        }else{
            $this->session->set_flashdata('error','Record Failed');
        }

        redirect(base_url().'admin/test');

    }
    public function deleteQuestion($id,$test_id){
        $flag = $this->db->where('id',$id)->update('question',array('IsActive'=>0));
        if($flag){
            $this->session->set_flashdata('message','Record Deleted');
        }else{
            $this->session->set_flashdata('error','Record Failed');
        }

        redirect(base_url().'admin/test/question_list/'.$test_id);

    }

    public function index()
    {
        $admin_id = ($this->session->userdata('admin_id'));
        //echo $admin_id;
        $data['batches']=$this->db->query('select b.*,t.name from batch as b INNER JOIN technology as t ON t.id = b.course_id where b.faculty_id='.$admin_id)->result();
        $technology = $this->db->select('group_concat(technology) as technology')->where('faculty_id',$admin_id)->get("technology_detail")->row('technology');
        $query ="select * from technology_detail as t join admin as a ON a.id = t.faculty_id where a.id!= ".$admin_id." and t.technology IN (".$technology.")";
        $data['faculties'] = $this->db->query($query)->result();
        $data['tests']=$this->admin->getRows('select s.*,a.name as faculty_name from test_series as s INNER JOIN admin as a ON a.id = s.faculty_id where s.faculty_id='.$admin_id);
        $data['template']='admin/test/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function copyTestSeries(){
        $test_id = $_POST['test_id'];
        $faculty = $_POST['faculty'];
        $test = $this->db->where('id',$test_id)->get('test_series')->row_array();
        // print_r($test);
        // die;
        unset($test['id']);
        $test['faculty_id'] = $faculty;
        $this->db->trans_begin();
        $flag = $this->db->insert('test_series',$test);
        $new_test_id = $this->db->insert_id();
        $question = $this->db->where(['test_id'=>$test_id,'IsActive'=>1])->get('question')->result_array();
        if(!empty($question)){
            $final=array();
            foreach ($question as $key => $value) {
                unset($value['id']);
                $value['test_id'] = $new_test_id;
                $final[] = $value;
            }
        }
        if(!empty($final)){
            $this->db->insert_batch('question',$final);
        }

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $response = array('status'=>'failed','message'=>'copy failed');

        }
        else
        {
            $this->db->trans_commit();
            $response = array('status'=>'success','message'=>'copy successfuly');
            
        }

        echo json_encode($response);
        die;
       
    }
    public function detail($mid){
        $mapping    = $this->db->where('id',$mid)->get('mapping')->row();
        $bid        = $mapping->batch_id;
        $test_id    = $mapping->test_id;
        $data['mapping_id']=$mapping->id;
        $data['tests']=array();
        $data['students']=$this->db->select('s.* , c.name as college_name')->join('collagecode as c','c.id =s.college')->where('s.batch_id',$bid)->get('student as s')->result();
        $data['template']='admin/test/student_detail';
        $this->load->view('admin/layout/template',$data);
   
    }
    public function batchMapping(){
        //echo json_encode($_POST);
        $count = $this->db->where(array('batch_id'=>$_POST['batch'],'test_id'=>$_POST['test_id'],'IsActive'=>'1'))->get('mapping',$mapping)->num_rows();
        if($count >0){
             $response = array('status'=>'failed','message'=>'already mapping');
        }else{

        
        $mapping = array(
            'batch_id'=>$_POST['batch'],
            'test_id'=>$_POST['test_id'],
        );
        $flag = $this->db->insert('mapping',$mapping);
        if($flag){
            //echo "success";
            $response = array('status'=>'success','message'=>'successfully mapped');
        }
        else{
            $response = array('status'=>'failed','message'=>'failed');
            //echo "failed";
        }
        }
        echo json_encode($response);
    }
    public function getTopic(){
        // echo json_encode($_POST);
        $res = $this->db->select('topic')->where('technology',$_POST['technology_id'])->get('test_series')->result_array();
        foreach ($res as $key => $value) {
            $topic[] = $value['topic'];
        }
        echo json_encode($topic);
        //$admin_id = ($this->session->userdata('admin_id'));
    }
    public function add($id=null)
    {
        if($id){
            $data['test'] = $this->db->where('id',$id)->get('test_series')->row();
        }
        $admin_id = ($this->session->userdata('admin_id'));
        if($this->input->post()){
            
            $tech = $this->db->query("select * from technology where id = '".$_POST['technology_id']."'")->row();
            // echo $this->db->last_query();
            // print_r($batch);
            $test = array(
                'batch_id'=>'',
                'technology'=>$_POST['technology_id'],
                'cource_name'=>$tech->name,
                'topic'=>$_POST['series'],
                'name'=>$_POST['name'],
            );
            $test_id = $_POST['test_id'];
            if($test_id != ''){
                $test['updated_by']=$admin_id;
                $flag = $this->db->where('id',$test_id)->update('test_series',$test);
            }else{
                $test['faculty_id']=$admin_id;
                $test['created_by']=$admin_id;
                $test['updated_date']=date('Y-m-d');
                $flag = $this->db->insert('test_series',$test);
            }
            if($flag){
                $this->session->set_flashdata('message','Record save');
            }else{
                $this->session->set_flashdata('error','Record Failed');
            }

            redirect(base_url().'admin/test');

        }
        $data['batches'] = ($this->db->query("select b.*,c.title from batch as b left JOIN course as c ON c.id = b.course_id where b.faculty_id= ".$admin_id)->result());
        //echo $admin_id;

        $data['technologies'] = $this->db->select('tab1.*')->join('technology as tab1','tab1.id= tab2.technology')->where('tab2.faculty_id',$admin_id)->get("technology_detail as tab2")->result();

        //  echo "<pre>";
        // print_r($data['technologies']);
        // die;
        $data['template']='admin/test/add';
        $this->load->view('admin/layout/template',$data);
    }


    public function add_question($id ,$qid= null)
    {
        if($id){
            $data['test'] = $this->db->where('id',$id)->get('test_series')->row();
        }
        if($qid){
            $data['question'] = $this->db->where('id',$qid)->get('question')->row();
        }
        // echo "<pre>";
        // print_r($data);
        // die;
        if($this->input->post()){
            // echo "<pre>";
            // print_r($_POST);
            // die;
            $admin_id = ($this->session->userdata('admin_id'));
            //$batch = $this->db->query("select c.title from batch as b INNER JOIN course as c ON c.id = b.course_id where b.id = '".$_POST['batch_id']."'")->row();
            // echo $this->db->last_query();
             // print_r($_POST);
            $question = array(
                'test_id'=>$_POST['test_id'],
                'question'=>$_POST['question'],
                'type'=>$_POST['type'],
                'mendetory'=>$_POST['mendetory'],
                'response'=>json_encode($_POST['response']),
                'answare'=>$_POST['answares'],
            );
           // print_r( $question);
           // die;
            $test_id = $_POST['test_id'];
            $qid = $_POST['id'];
            if($test_id != '' && $qid != ''){
                $question['updated_by']=$admin_id;
                $flag = $this->db->where('id',$qid)->update('question',$question);
            }else{
                //$question['faculty_id']=$admin_id;
                $question['created_by']=$admin_id;
                $flag = $this->db->insert('question',$question);
            }
            // echo "flag".$flag;
            // die;
            if($flag){
                $this->session->set_flashdata('message','Record save');
            }else{
                $this->session->set_flashdata('error','Record Failed');
            }
if($this->input->post('update')){
    redirect(base_url().'admin/test/question_list/'.$test_id);
}

if($this->input->post('finish')){
    redirect(base_url().'admin/test');
}
 
 if($this->input->post('next')){
    redirect(base_url().'admin/test/add_question/'.$test_id);
}           

        }
        $data['batches'] = ($this->db->query("select b.*,c.title from batch as b left JOIN course as c ON c.id = b.course_id")->result());
        $data['template']='admin/test/add_question';
        $data['test_id']=$id;
        $this->load->view('admin/layout/template',$data);
    }


///////////////////

    /////////////////////////////
public function uploadData(){
    $test_id = $_POST['test_id'];
    $filled=array('sno','question','type','response','answare');
    $this->load->library('excel');
    $path = 'uploads/test/';
    $config['upload_path']   = $path;
    $config['allowed_types'] = '*';
    //$config['allowed_types'] = 'xlsx|csv|xls';
    $config['file_name'] = time();

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
if($this->upload->do_upload('files')){
    $data = array('upload_data' => $this->upload->data());

    if(!empty($data['upload_data']['file_name'])){
        $import_xls_file = $data['upload_data']['file_name'];
    }else{
        $import_xls_file = 0;
    }

    $inputFileName = $path . $import_xls_file;
    $inputfilename = $inputFileName;
    $exceldata = array();

    //  Read your Excel workbook
    try
    {
        $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
        $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
        $objPHPExcel = $objReader->load($inputfilename);
    }catch(Exception $e){

        die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
    }

    //  Get worksheet dimensions
    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); 
    $highestColumn = $sheet->getHighestColumn();
    if($highestRow > 1001){
    $response = array('result'=>'failed','status'=>'0','message'=>'File To Large');
    unlink($inputFileName);
    echo json_encode($response);
    die;
    }
    //  Read a row of data into an array
    $row = 1;
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    $exceldata[] = $rowData[0];
           
    $headers = $exceldata[0];
    // print_r($headers);
    // echo "highestRow".$highestRow;
    // echo "success";
    // die;
    // echo $row;die;

    if (count(array_diff($filled, $headers)) === 0) {
         $final = array();
        for ($key = 2; $key <= $highestRow; $key++)
        { 
            //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $key . ':' . $highestColumn . $key, NULL, TRUE, FALSE);
                       
            $value = $rowData[0];
            //echo "count = ".count($value);
            //print_r($value);
            // echo json_encode($value);
            $response_arr = explode(',',$value[3]);
            if( !in_array('',$value) ){
            if(count($response_arr) >=2 && $value[4] !='' && count($value) ==5){
            if($value[2] == 1){
                $answare = trim($value[4]);
            }else{
                $answare = trim($value[4]);
            }
            $question = array(
                'test_id'       =>$test_id,
                'question'     =>trim($value[1]),
                'type'       =>trim($value[2]),
                'mendetory'    =>trim($value[0]),
                'response' =>json_encode($response_arr),
                'answare' =>$answare,
            );
                $final[] = $question;
            }        
            } else{
                //echo "blank";
            } 
                  
            
                            // $isExist = $this->db->where($condition)->get('dynamicrecords')->result();
                
                            // if($isExist){
                            //     $updateflag = $this->db->where($condition)->update('dynamicrecords',$record);
                            //     //$response = array('result'=>'success','status'=>'1','message'=>'Records Update Successfull','data'=>'');
                            //     //update
                            // }else{
                            //     //save
                            //     //$saveflag=1;
                            //     $saveflag = $this->db->insert('dynamicrecords',$record);
                    //$response = array('result'=>'success','status'=>'1','message'=>'Records Save Successfull','data'=>'');
                            // }
            
        }
        // print_r(count($final));
        // print_r($final);
        $saveflag = $this->db->insert_batch('question',$final);
        $response = array('result'=>'success','status'=>'1','message'=>'Records Save Successfull','data'=>$final);
        // echo json_encode($response);       
        // die;              
        if($saveflag || $updateflag){
                $response = array('result'=>'success','status'=>'1','message'=>'File data uploaded','data'=>'');
        }else{
                $response = array('result'=>'failed','status'=>'0','message'=>'Nothig to be uploaded','data'=>'');
        }
                
    }else{
        $response = array('result'=>'failed','status'=>'0','message'=>'File not comfortable selected Form');
        $this->session->set_flashdata('error','Form field not matched in excel....');

    }
    echo json_encode($response);
die;
            
}else{
        $response = array('result'=>'failed','status'=>'0','message'=>'File uploading Error','data'=>'');
        $this->session->set_flashdata('error','File uploading Error');
}
        echo json_encode($response);
        //redirect('admin/selectForm');
}



//////////////////



    public function question_list($id = null)
    {
        $data['questions'] = $this->db->where(['test_id'=>$id,'IsActive'=>1])->get('question')->result();
         // $data['batches'] = ($this->db->query("select b.*,c.title from batch as b left JOIN course as c ON c.id = b.course_id")->result());
        $data['template']='admin/test/view_question';
        $this->load->view('admin/layout/template',$data);
    
    }

    public function view_question($id = null)
    {
            $data['questions'] = $this->db->where('test_id',$id)->get('question')->result();
         // $data['batches'] = ($this->db->query("select b.*,c.title from batch as b left JOIN course as c ON c.id = b.course_id")->result());
        $data['template']='admin/test/detail';
        $this->load->view('admin/layout/template',$data);
    
    }
}
