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
        $data['datalist']=$this->admin->getRows('select * from student');
        $data['template']='admin/student/index';
        $this->load->view('admin/layout/template',$data);
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

       
        $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
        $this->form_validation->set_rules('semister', 'Semester', 'trim|required');
         $this->form_validation->set_rules('totalfees', 'totalfees', 'trim|required');
        if($id>0)
        { $this->form_validation->set_rules('roll_no', 'Roll no', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
          //  $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[12]');
        }
        else
        { $this->form_validation->set_rules('roll_no', 'Roll no', 'trim|required|is_unique[student.roll_no]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[student.email]');
             //$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[admin.email]');
            //$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[12]');
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
            $array = array(
                    'technology'           =>$this->input->post('technology') ,
                    'batch_id'             =>$this->input->post('batch_id') ,
                    'name'                 =>$this->input->post('name') ,
                    'email'                =>$this->input->post('email')  ,
                    'mobile'               =>$this->input->post('mobile') ,
                    'roll_no'              =>$this->input->post('roll_no') ,
                    'college'              =>$this->input->post('college') ,
                    'degree'               =>$this->input->post('degree') ,
                    'branch'               =>$this->input->post('branch') ,
                    'semister'             =>$this->input->post('semister') ,
                    'roll_no'              =>$this->input->post('roll_no') ,
                    'totalfees'            =>$this->input->post('totalfees') ,
                    'status'               =>$this->input->post('status'),
                    
                 );
            if(!empty($image))
            {
                $array['image']=$image;
            }

            if($id>0)
            {
                $emailcheck = $this->admin->getRow("select email from student where email='".$this->input->post('email')."' && id!='".$id."'");
                $roll_no = $this->admin->getRow("select roll_no from student where roll_no='".$this->input->post('roll_no')."' && id!='".$id."'");
                if($emailcheck)
                {
                    $this->messages->add('Email field must contain a unique value', "alert-danger");
                    redirect('admin/student/add/'.$id);
                }
                elseif($roll_no)
                {
                    $this->messages->add('Roll no field must contain a unique value', "alert-danger");
                    redirect('admin/student/add/'.$id);
                }
                else
                {
                    $update = $this->admin->update('student',array('id'=>$id), $array);
                    if($update)
                    {
                        $this->messages->add('Updated successfully', "alert-success");
                        redirect('admin/student');
                    }
                }
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
            $delete=$this->admin->delete('student',array('id'=>$id));
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
