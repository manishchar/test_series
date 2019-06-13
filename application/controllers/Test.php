
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//ALTER TABLE `test_series` ADD `technology` INT(11) NULL AFTER `batch_id`;

class Test extends CI_Controller
{

 function __construct()
    {
        parent::__construct();
    }

    public function index($id=null)
    {
        if($this->input->post()){
            $mapping_id = $_POST['mapping_id'];
            $rollNumber = $_POST['rollNumber'];
            $batch_id = $_POST['batch_id'];
            $con = " select * from student where ( roll_no = '".$rollNumber."' OR mobile = '".$rollNumber."' ) AND batch_id = '".$batch_id."'";
            $student = $this->db->query($con)->row_array();
           // $student = $this->db->where(['roll_no'=>$rollNumber,'batch_id'=>$batch_id])->get('student')->row_array();
            //echo $this->db->last_query();
            // print_r($student);
            // die;
            if(!empty($student)){
               $attemptResult =  $this->db->where(['student_id'=>$student['id'],'mapping_id'=>$mapping_id])->get('test_attempt')->row();
               if(!empty($attemptResult)){
                   if($attemptResult->IsComplete =='1'){
                        $this->session->set_flashdata('error','Aleady attempt this test series');
                        redirect(base_url().'test/index/'.$mapping_id);    
                   }else{
                    $this->session->set_userdata('test',array('aid'=>$attemptResult->id,'test_id'=>$attemptResult->test_id));
                        redirect(base_url().'test/start/');
                   }
               }else{
                    $mapping = $this->db->where('id',$mapping_id)->get('mapping')->row();
                    $attempt = array(
                        'student_id'=>$student['id'],
                        'mapping_id'=>$mapping_id,
                        'test_id'=>$mapping->test_id,
                        'updated_date'=>date('Y-m-d')
                    );
                    // print_r($attempt);
                    // die;
                    $this->db->insert('test_attempt',$attempt);
                    $aid = $this->db->insert_id();
                    // id ,student_id,mappint_id
                    $this->session->set_userdata('test',array('aid'=>$aid,'test_id'=>$mapping->test_id));
                    redirect(base_url().'test/start/');
               }
                
            }else{
                $this->session->set_flashdata('error','Invalid rollNumber');
                redirect(base_url().'test/index/'.$mapping_id);
            }
        }else{
            $mapping = $this->db->where('id',$id)->get('mapping')->row();
            $data['mapping_id']=$id;
            $data['batch_id']=$mapping->batch_id;
            $data['test_id']=$mapping->test_id;
            $data['template']=array();
            $this->load->view('test/welcome',$data);    
        }
        
    }

    public function save(){
// if(array_diff(array(1,2),array(2,4))){
//     echo "in coorect";
// }else{
//     echo "coorect";
// }
        // die;
        $test_attempt_id = $_POST['test_attempt_id'];
        $mapping_id = $_POST['mapping_id'];
        $student_id = $_POST['student_id'];
        $test_id = $_POST['test_id'];
        $answares = $_POST['answare'];
        $type = $_POST['type'];
        $i=0;
        $con['test_attempt_id']=$test_attempt_id;
        // $ans['test_id']=$test_id;
        // $ans['student_id']=$student_id;
        // $ans['mapping_id']=$mapping_id;
         
        foreach ($answares as $key => $value) {
            $question = $this->db->where('id',$key)->get('question')->row();
            $con['question_id']=$key;
            //echo "type ".$type[$key];
            $ans['IsCorrect']=0;
            if($type[$i] == '1'){
                $ans['type'] = $type[$i];
                $ans['answare'] = $value;
                if($question->answare == $value){
                   $ans['IsCorrect']=1; 
                }
                
            }else{
                $ans['type'] = $type[$i];
                $ans['answare'] = json_encode($value);
                //echo "Answare" . json_encode($value);
                $correctAns = explode(',', $question->answare);
                if( !array_diff($correctAns,$value)){
                   $ans['IsCorrect']=1; 
                }
            }


            $count = $this->db->where($con)->get('test_answares')->num_rows();
            if($count>0){
                echo "update";
                $this->db->where($con)->update('test_answares',$ans);
            }else{
                $ans =array_merge($ans,$con);
                $this->db->insert('test_answares',$ans);
                echo "insert";
            }



            print_r($ans);
            //echo "type ".$type[$key];
            $i++;
        }
        // print_r($_POST);
        die;
    }

    public function save_old(){
        $test_attempt_id = $_POST['test_attempt_id'];
        $mapping_id = $_POST['mapping_id'];
        $student_id = $_POST['student_id'];
        $test_id = $_POST['test_id'];
        $answares = $_POST['answare'];
        $type = $_POST['type'];
        $i=0;
        $ans['test_attempt_id']=$test_attempt_id;
        $ans['test_id']=$test_id;
        $ans['student_id']=$student_id;
        $ans['mapping_id']=$mapping_id;
        foreach ($answares as $key => $value) {
            //echo "type ".$type[$key];
            if($type[$i] == '1'){
                $ans['type'] = $type[$i];
                $ans['ans'] = $value;
                
            }else{
                $ans['type'] = $type[$i];
                $ans['ans'] = json_encode($value);
                //echo "Answare" . json_encode($value);
            }
            print_r($ans);
            //echo "type ".$type[$key];
            $i++;
        }
        //print_r($_POST);
        die;
    }
    public function logout(){
        $session = $this->session->userdata('test');
        if( !empty($session) ){
            $aid = $session['aid'];
            $test_id = $session['test_id'];
            $this->db->where('id',$aid)->update('test_attempt',array('IsComplete'=>'1'));
        }

        $this->session->unset_userdata('test');
        redirect(base_url().'test/thankyou');
    }
    public function thankyou(){
        //print_r($this->session->userdata('test'));
        //print_r($this->session->userdata());
        $this->load->view('test/thanks');
    }
    public function result(){
        $session = $this->session->userdata('test');
        if( !empty($session) ){
            $aid = $session['aid'];
            $test_id = $session['test_id'];
            $this->db->where('id',$aid)->update('test_attempt',array('IsComplete'=>'1'));
        }
        //print_r($session);
        if( !empty($session) ){
            $aid = $session['aid'];
            $test_id = $session['test_id'];
        }
        $total_question = $this->db->where('test_id',$test_id)->get('question')->num_rows();
        $results = $this->db->where('test_attempt_id',$aid)->get('test_answares')->result_array();

     //   echo "<pre>";
        $total = $correct=$incorrect = 0;
        foreach ($results as $key => $value) {
            if($value['IsCorrect'] == 1){
                $correct++;
            }else{
                $incorrect++;
            }
            $total++;
            
        }
        $data['total_question']=$total_question;
        $data['total']=$total;
        $data['correct']=$correct;
        $data['incorrect']=$incorrect;
        $this->load->view('test/result',$data);
    }
    public function start()
    {
        $aid = $this->session->userdata('test')['aid'];
        $test_id = $this->session->userdata('test')['test_id'];
        if($aid == ''){
            $this->session->set_flashdata('error','Invalid Test');
            redirect(base_url().'test/index/');    
        }
        $test_attempt = $this->db->where('id',$aid)->get('test_attempt')->row();
        $data['mapping_id']=$test_attempt->mapping_id;
        $data['student_id']=$test_attempt->student_id;
        $data['test_attempt_id']=$test_attempt->id;
        $data['test_id']=$test_id;
        $data['questions'] = $this->db->where('test_id',$test_id)->get('question')->result();
        // echo $aid;
        // die;
        $data['template']=array();
        $this->load->view('test/test',$data);
    }
}
  