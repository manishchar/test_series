<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('admin_id') == '')
        {
            redirect('admin/login');exit();
        }
    }

    public function index()
    {
        $data['datalist']=$this->db->select('s.*,b.startdate,b.starttime')
        ->join('batch as b','b.id=s.batch_id')
        //->join('tbl_student_login l','l.student_id=s.student_id','left')
        ->where('s.IsDeleted','0')->get('student as s')->result();
        // echo "<pre>";
        // print_r($data['datalist']);
        // die;
        $data['template']='admin/student/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function newList()
    {
        $data['datalist']=$this->db->select('l.*,s.technology,s.batch_id,b.startdate,b.starttime')
        ->join('batch as b','b.id=s.batch_id')
        ->join('tbl_student_login l','l.student_id=s.student_id','left')
        ->where('s.IsDeleted','0')->get('student as s')->result();
        // echo "<pre>";
        // print_r($data['datalist']);
        // die;
        $data['template']='admin/student/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function checkStudentNumber(){
        $sid = $_POST['sid'];
        $res = $this->db->where('student_id',$sid)->get('tbl_student_login');
        if($res->num_rows() >0){
            $detail = $res->row();
            $branch = $this->db->where('id',$detail->branch)->get('branch')->row();
            $data['branch'] = $branch;
            $data['detail'] = $detail;
            $response = array('status'=>'success','results'=>$data);
        }else{
            $response = array('status'=>'failed');
        }
        echo json_encode($response);
    }
     public function generate()
    {
        if($this->input->post()){
            // echo "<pre>";
            // print_r($_SERVER);
            // die;

            $login['name'] = $_POST['name'];
            $login['college'] = $_POST['college'];
            $login['degree'] = $_POST['degree'];
            $login['branch'] = $_POST['branch'];
            $login['semister'] = $_POST['semister'];
            $login['roll_no'] = $_POST['roll_no'];
            $login['email'] = $_POST['email'];
            $login['mobile'] = $_POST['mobile'];

            
            $qur = "?".$_SERVER['QUERY_STRING'];
            if(!isset($_POST['sid'])){
                
                $this->session->set_flashdata('error','Please Select Student');
                redirect(base_url().'admin/student/generate'.$qur);
            }
            $sid= $_POST['sid'];
            $studentNumber= $_POST['studentNumber'];
            $count = $this->db->where('student_id',$studentNumber)->get('tbl_student_login')->num_rows();
            if($count ==0){
                $login['student_id'] = $studentNumber;
                $login['password'] = '123456';
                $this->db->insert('tbl_student_login',$login);    
            }else{
                $this->db->where('student_id',$studentNumber)->update('tbl_student_login',$login);    
            } 
            foreach ($sid as $key => $value) {
               $this->db->where('id',$value)->update('student',array('student_id'=>$studentNumber)); 
            }
            $this->session->set_flashdata('message','Student Number Generate');
            redirect(base_url().'admin/student/generate'.$qur);
        }else{
        if(isset($_GET['mobile'])){
            $mobile = $_GET['mobile'];
            
            $data['datalist']=$this->db->select('s.*,b.startdate,b.starttime')->join('batch as b','b.id=s.batch_id')->where('s.IsDeleted = 0 and s.student_id IS NULL')->where('s.mobile',$mobile)->get('student as s')->result();
            $res = $this->db->select('MAX(id) as maxId')->get('tbl_student_login')->row('maxId');
            if($res == ''){
                $student_no ='1';
            }else{
                $student_no =($res+1);
            }
        }else{
            $data['datalist'] = array();  
            $student_no ='';
        }
            $data['student_no']='cybrom'.$student_no;
            $data['collages']=$this->db->where(['IsDeleted'=>'0','status'=>'1'])->get('collagecode')->result();
            $data['branchs']=$this->db->where(['IsDeleted'=>'0','status'=>'1'])->get('branch')->result();
            $data['degrees']=$this->db->where(['IsDeleted'=>'0','status'=>'1'])->get('degree')->result();
            $data['template']='admin/student/generate';
            $this->load->view('admin/layout/template',$data);
        }
    }

    public function view($id)
    {
        //$id =  $this->input->post('student');
        $data['selectall']=$this->admin->getRow('select * from student where id='.$id.''); 
        $data['template']='admin/student/view';
        $this->load->view('admin/layout/template',$data);
    }

    public function add($id=0)
    {
        if($id)
        {
            $res=$this->admin->getRow('select * from student where id='.$id.'');
            $login=$this->db->where('student_id',$res->student_id)->get('tbl_student_login')->row();
            // print_r($res);
            // die;
            $data['login'] = $login;
            $data['selectall'] = $res;
            $data['batches']=$this->admin->getRows('select * from batch');
            //print_r($data['batches']);die;
        }
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/student/add';
        $this->load->view('admin/layout/template',$data);
    }

    public function repayment()
    {
       
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/student/repayment';
        $this->load->view('admin/layout/template',$data);
    }

    public function detail()
    {
        $id =  $this->input->post('student');
        $data['selectall']=$this->admin->getRow('select * from student where id='.$id.''); 
        $data['template']='admin/student/detail';
        $this->load->view('admin/layout/template',$data);
    }


    public function getbatchfees($id=0)
    {
        if($id)
        {
          // $fees=$this->admin->getRow('select fees from batch where id='.$id.'');
           $batch=$this->admin->getRow('SELECT b.id,b.fees,b.startdate,b.starttime,c.title,l.capacity FROM batch b,course c,lab l where b.course_id=c.id and b.lab_id=l.id and b.id='.$id.'');
           echo $batch->fees.'_'.$batch->startdate.'_'.$batch->starttime.'_'.$batch->capacity; exit;
        }

    }


      public function getcourse()
    {

        $id = $this->input->post('id');
        $batch_id = $this->input->post('batch_id');
        if($id)
        {
            if($id == 'all'){
$batch=$this->admin->getRows('SELECT id,fees,startdate,starttime FROM batch ORDER BY startdate ASC');
            }else{
                $batch=$this->admin->getRows('SELECT id,fees,startdate,starttime FROM batch  where   course_id='.$id.' ORDER BY startdate ASC');     
            }

           
          $html='';
        if(!empty($batch))
                              {
                                $html.= '<option value="">Select Batch</option>';
                                  foreach ($batch as $batchi)
                                  {
                                    $timestamp = strtotime($batchi->startdate);
                              $newDate = date('d-F', $timestamp); 
                           if($batch_id==$batchi->id){ $selected = "selected";}else{$selected = "";}
                                     
                                    $html.= '<option value="'.$batchi->id.'" '.$selected.'>'.$newDate.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp '.$batchi->starttime.'</option>';
                                     
                                  }
                              }
       
  print_r($html); exit;
        }

    }

          public function getbranch()
         {
        $id = $this->input->post('id');
        $branchs = $this->input->post('branch');
       
        if($id)
        {
          // $fees=$this->admin->getRow('select fees from batch where id='.$id.'');
           $branch=$this->admin->getRows('SELECT * FROM branch WHERE degree ='.$id.'');
       //  echo  $this->db->last_query();
         $html='';
           if(!empty($branch))
                              {
                                 $html.= '<option value="">Select Branch</option>';
                                  foreach ($branch as $branchi)
                                  {
                                 // if($degree == $branchi->id){ $selected = "selected";}else{$selected = "";}
                                    if($branchs==$branchi->id){ $selected = "selected";}else{$selected = "";}
 // echo $branchs;echo $branchi->id;

                                    $html.= '<option value="'.$branchi->id.'" '.$selected.'>'.$branchi->name.'</option>';
                                     
                                  }
                              }
       
  print_r($html); exit;
        }

    }

    function valid_url($str)
    {
        $pattern = "/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
        if (!preg_match($pattern, $str))
        {
            return FALSE;
        }
        return TRUE;
    }

      public function add_fees()
    {
        $id=$this->input->post('id');
        $this->form_validation->set_rules('fees', 'Fees amount', 'trim|required');
        $this->form_validation->set_rules('payment_mode', 'Payment mode', 'trim|required');
        $this->form_validation->set_rules('feesdate', 'Fees date', 'trim|required');
        
  
        $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('fees'))
            {
                $this->messages->add(form_error('fees'), "alert-danger");
                redirect(base_url().'admin/student/detail/'.$id);
            }
            elseif(form_error('payment_mode'))
            {
                $this->messages->add(form_error('payment_mode'), "alert-danger");
                redirect(base_url().'admin/student/detail/'.$id);
            }
            elseif(form_error('feesdate'))
            {
                $this->messages->add(form_error('feesdate'), "alert-danger");
                redirect(base_url().'admin/student/detail/'.$id);
            }
           
        }
        elseif($this->input->post('reaminfees') < $this->input->post('fees'))
                {
                    $this->messages->add('Please insert correct amount', "alert-danger");
                    redirect('admin/student/detail/'.$id);
                }
        else
        {


            $feesdate = date('Y-m-d',strtotime($this->input->post('feesdate')));
            $array = array(
                    'amount'           =>$this->input->post('fees') ,
                    'transaction_type' =>$this->input->post('payment_mode') ,
                    'feesdate'         =>$feesdate,
                    's_id'             =>$this->input->post('s_id')  ,
                    'batch_id'         =>$this->input->post('batch_id') ,
                    'status'          =>1
                 );


          // print_r($array); exit;
         
                $insert = $this->admin->insert('fees_payment', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/student/repayment');
                }
            
        }
    }

          public function add_feesdetail()
    {
        $id=$this->input->post('id');
        $this->form_validation->set_rules('fees', 'Fees amount', 'trim|required');
        $this->form_validation->set_rules('payment_mode', 'Payment mode', 'trim|required');
        $this->form_validation->set_rules('feesdate', 'Fees date', 'trim|required');
        
  
        $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('fees'))
            {
                $this->messages->add(form_error('fees'), "alert-danger");
                redirect(base_url().'admin/student/view/'.$id);
            }
            elseif(form_error('payment_mode'))
            {
                $this->messages->add(form_error('payment_mode'), "alert-danger");
                redirect(base_url().'admin/student/view/'.$id);
            }
            elseif(form_error('feesdate'))
            {
                $this->messages->add(form_error('feesdate'), "alert-danger");
                redirect(base_url().'admin/student/view/'.$id);
            }
           
        }
        elseif($this->input->post('reaminfees') < $this->input->post('fees'))
                {
                    $this->messages->add('Please insert correct amount', "alert-danger");
                    redirect('admin/student/view/'.$id);
                }
        else
        {


            $feesdate = date('Y-m-d',strtotime($this->input->post('feesdate')));
            $array = array(
                    'amount'           =>$this->input->post('fees') ,
                    'transaction_type' =>$this->input->post('payment_mode') ,
                    'feesdate'         =>$feesdate,
                    's_id'             =>$this->input->post('s_id')  ,
                    'batch_id'         =>$this->input->post('batch_id'),
                    'status'           => 1 
                 );

          // print_r($array); exit;
         
                $insert = $this->admin->insert('fees_payment', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/student/repayment');
                }
            
        }
    }


    public function add_student()
    {
        $id=$this->input->post('id');
        $this->form_validation->set_rules('batch_id', 'Batch', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

       
        $this->form_validation->set_rules('branch', 'Branch', 'trim');
        $this->form_validation->set_rules('semister', 'Semester', 'trim|required');
         $this->form_validation->set_rules('totalfees', 'totalfees', 'trim|required');
        if($id>0)
        { 
		  $this->form_validation->set_rules('roll_no', 'Roll no', 'trim|required|min_length[10]|max_length[12]');
          $this->form_validation->set_rules('email', 'Email', 'trim|required');
          $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[12]');
        }
        else
        { 
            $this->form_validation->set_rules('roll_no', 'Roll no', 'trim|required|min_length[10]|max_length[12]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[12]');
        }
       
        $this->form_validation->set_rules('alt_mobile', 'Alt mobile', 'trim');  
        $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('batch_id'))
            {
                $this->messages->add(form_error('batch_id'), "alert-danger");
                redirect(base_url().'admin/student/add/'.$id);
            }
            elseif(form_error('name'))
            {
                $this->messages->add(form_error('name'), "alert-danger");
                redirect(base_url().'admin/student/add/'.$id);
            }
            elseif(form_error('email'))
            {
                $this->messages->add(form_error('email'), "alert-danger");
                redirect(base_url().'admin/student/add/'.$id);
            }
           
              elseif(form_error('roll_no'))
            {
                $this->messages->add(form_error('roll_no'), "alert-danger");
                redirect(base_url().'admin/student/add/'.$id);
            }
           
              elseif(form_error('branch'))
            {
                $this->messages->add(form_error('branch'), "alert-danger");
                redirect(base_url().'admin/student/add/'.$id);
            }
            elseif(form_error('semister'))
            {
                $this->messages->add(form_error('semister'), "alert-danger");
                redirect(base_url().'admin/student/add/'.$id);
            }
            
           elseif(form_error('totalfees'))
            {
                $this->messages->add(form_error('totalfees'), "alert-danger");
                redirect(base_url().'admin/student/add/'.$id);
            }
        }
        else
        {

            $image = '';
            if($_FILES['files']['name'])
            {
                $ext = end((explode(".", $_FILES['files']['name'])));
                $imgname = $ext[0].substr(md5(microtime()),0,8).'.'.$ext;
                if(move_uploaded_file($_FILES["files"]["tmp_name"],"uploads/student/".$imgname))
                {
                    copy("uploads/student/".$imgname,"uploads/student/resize/".$imgname);
                    $image = $imgname;
                }
            }
            $feesdate = date('Y-m-d',strtotime($this->input->post('feesdate')));
            $student_id = $this->input->post('student_id');

            $login['name'] = $_POST['name'];
            $login['college'] = $_POST['college'];
            $login['degree'] = $_POST['degree'];
            $login['branch'] = $_POST['branch'];
            //$login['semister'] = $_POST['semister'];
            $login['roll_no'] = $_POST['roll_no'];
            $login['email'] = $_POST['email'];
            $login['mobile'] = $_POST['mobile'];
            $login['IsNew'] = 1;
            //$login['password'] = '123456';
            //$login['student_id'] = $student_no;
            $this->db->where('student_id',$student_id)->update('tbl_student_login',$login);
            //$studentNumber = $this->db->insert_id();

            $array = array(
                    'technology'           =>$this->input->post('technology') ,
                    'batch_id'             =>$this->input->post('batch_id') ,
                    'semister'             =>$this->input->post('semister') ,
                    'totalfees'            =>$this->input->post('totalfees') ,
                    'status'               =>$this->input->post('status'),
		            'IsNew'               =>1,
            );
            if(!empty($image))
            {
                $array['image']=$image;
            }

            if($id>0)
            {
                // $emailcheck = $this->admin->getRow("select email from student where email='".$this->input->post('email')."' && id!='".$id."'");
                // $roll_no = $this->admin->getRow("select roll_no from student where roll_no='".$this->input->post('roll_no')."' && id!='".$id."'");
                // if($emailcheck)
                // {
                //     $this->messages->add('Email field must contain a unique value', "alert-danger");
                //     redirect('admin/student/add/'.$id);
                // }
                // elseif($roll_no)
                // {
                //     $this->messages->add('Roll no field must contain a unique value', "alert-danger");
                //     redirect('admin/student/add/'.$id);
                // }
                // else
                // {
                    $update = $this->admin->update('student',array('id'=>$id), $array);
                    if($update)
                    {
                        $this->messages->add('Updated successfully', "alert-success");
                        redirect('admin/student');
                    }
                //}
            }
            else
            {
                $insert = $this->admin->insert('student', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/student');
                }
            }
        }
    }

    public function delete($id=0)
    {
        if($id)
        {
            $res=$this->db->where('id',$id)->get('student')->row();
            if($res->student_id){
                $count=$this->db->where(array('IsDeleted'=>'0','student_id'=>$res->student_id))->get('student')->num_rows();
                if($count > 1){
                    $delete=$this->admin->delete('student',array('id'=>$id));    
                }else{
                    $delete=$this->admin->delete('tbl_student_login',array('student_id'=>$res->student_id));
                    $delete=$this->admin->delete('student',array('id'=>$id));
                }
            }else{
                $delete=$this->admin->delete('student',array('id'=>$id));    
            }
            
            
            if($delete)
            {
                $this->messages->add("Deleted Successfully", "alert-success");
                echo "sucess";
            }
        }

    }

 public function payment($id=0)
    {
        if($id)
        {

             $s_id=$this->admin->getVal('SELECT s_id FROM fees_payment where id='.$id.'');
           // $delete=$this->admin->delete('student',array('id'=>$id));
              $array = array(
                    'status' =>1
                 );

            $update1 = $this->admin->update('student',array('id'=>$s_id), $array);
            $update2 = $this->admin->update('fees_payment',array('id'=>$id), $array);
            if($update2)
            {
                $this->messages->add("Paid Successfully", "alert-success");
                echo "sucess";
            }
        }

    }

}
