<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

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
    public function index()
    {
        // echo "string";
        // die;
        $admin_id = $this->session->userdata('admin_id');
        $batch=$this->db->select('tab1.*,tab2.name')->join('technology as tab2','tab1.course_id=tab2.id')->where('tab1.faculty_id',$admin_id)->get('batch as tab1')->result();
        // echo "<pre>";
        // print_r($batch);
        // die;
        $data['batches'] = $batch;
        $data['template']='admin/attendance/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function add($id = '')
    {
        if($id == ''){
            redirect(base_url().'admin/attendance');
        }
        if($this->input->post()){

            // print_r($_POST);
            // die;
            if(empty($_POST['date'])){
                $this->session->set_flashdata('error','Invalid Date: please select date');
                redirect(base_url().'admin/attendance/add/'.$id);
            }
            $flag = false;
            $batch_id = $_POST['batch_id'];
            $date = $_POST['date'];
            $atendance = $_POST['atendance']?$_POST['atendance']:array();
            $admin_id = ($this->session->userdata('admin_id'));
            if(!empty($atendance)){
                foreach ($atendance as $key => $value) {
                    $att = array(
                        'atte_date'=>date('Y-m-d',strtotime($date)),
                        'batch_id'=>$batch_id,
                        'student_id'=>$key,
                    );
                    
                    $res = $this->db->where($att)->get('attendance')->row();
                    
                    if(empty($res)){
                        $att['status']=$value;
                        $att['created_by']=$admin_id;
                        $att['updated_by']=$admin_id;
                        $final[] =$att;
                    }else{
                        $update_flag = $this->db->where('id',$res->id)->update('attendance',array('status'=>$value));
                    }
                }
            }
            if(!empty($final)){
                $flag = $this->db->insert_batch('attendance',$final);
            }
           if($flag || $update_flag){
                $this->session->set_flashdata('message','Record save');
            }else{
                $this->session->set_flashdata('error','Record Failed');
            } 
            redirect(base_url().'admin/attendance/add/'.$id);
            
        }
        $admin_id = $this->session->userdata('admin_id');
        //die;
        $con ="where b.faculty_id = ".$admin_id;
        $con .=" and s.batch_id = ".$id;
        $con .=" and s.status = 1";
        $data['students'] = $this->db->query("select b.*,s.name,s.id as student_id from batch as b INNER JOIN student as s ON b.id = s.batch_id ".$con)->result();
        $batch = $this->db->select("DATEDIFF(enddate, startdate) as diff,batch.*")->where('id',$id)->get('batch')->row();
        $data['studentIds'] = array();
        if($_GET['date']){
            //echo 'Batch id ='.$id."<br/>";
            $atte_date = $_GET['date'];
            $attResult = $this->db->select("group_concat(student_id) as sid")->where(['status'=>'A','batch_id'=>$id,'atte_date'=>$atte_date])->get('attendance')->row('sid');
            if(!empty($attResult)){
            $data['studentIds']= explode(',', $attResult);
            }
            //die;
        }
        // print_r($batch);
        // die;
       // $data['students']=$this->db->where('batch_id',$bid)->get('student')->result();
        $data['batch']=$batch;
        
        $data['batch_id']=$id;
        $data['template']='admin/attendance/add';
        $this->load->view('admin/layout/template',$data);
    }


   public function view($bid = null)
   {
        $batch = $this->db->select("DATEDIFF(enddate, startdate) as diff,batch.*")->where('id',$bid)->get('batch')->row();
        // print_r($batch);
        // die;
        $data['students']=$this->db->where(['batch_id'=>$bid,'status'=>'1'])->get('student')->result();
        $data['batch']=$batch;
        $data['batch_id']=$bid;
        $data['template']='admin/attendance/view';
        $this->load->view('admin/layout/template',$data);
    }
   
}
