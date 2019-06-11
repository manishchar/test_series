<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //For home decsription
       
 //$data['form_data']=$this->session->flashdata('postdata');
        $data['template']='front/index';
        $this->load->view('front/layout/template',$data);
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
          // $fees=$this->admin->getRow('select fees from batch where id='.$id.'');
           $batch=$this->admin->getRows('SELECT id,fees,startdate,starttime FROM batch  where   course_id='.$id.' ORDER BY startdate ASC');
       //  echo  $this->db->last_query();
         $html='';
        if(!empty($batch))
        {
            $html.= '<option value="">Select Batch</option>';
            foreach ($batch as $batchi)
            {
                $timestamp = strtotime($batchi->startdate);
                $newDate = date('d-F', $timestamp); 
                if($batch_id==$batchi->id){ $selected = "selected";}else{$selected = "";}

                $html.= '<option value="'.$batchi->id.'" '.$selected.'>'.$newDate.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$batchi->starttime.'</option>';

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

    public function checkForm(){
        // echo json_encode($_POST);
        // die;
        $this->form_validation->set_rules('batch_id', 'Batch Date', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        //$this->form_validation->set_rules('roll_no', 'Roll no', 'trim|required');
        $this->form_validation->set_rules('college', 'College', 'trim|required');
        $this->form_validation->set_rules('semister', 'Semester', 'trim|required');
        $this->form_validation->set_rules('degree', 'Degree', 'trim|required');
        $this->form_validation->set_rules('fees', 'Fees', 'trim|required');
        $this->form_validation->set_rules('totalfees', 'Total Fees', 'trim|required');
        
       
       $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
       
       $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]|max_length[10]');

       $this->form_validation->set_rules('roll_no', 'Roll no', 'trim|required|min_length[10]|max_length[12]');
  
       // $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            $error = array();
            if(form_error('roll_no'))
            {
                $error['roll_no'] = form_error('roll_no');
            }
            if(form_error('degree'))
            {
                $error['degree'] = form_error('degree');
            }
            if(form_error('name'))
            {
                $error['name'] = form_error('name');
            }
            if(form_error('college'))
            {
                $error['college'] = form_error('college');
            }
            if(form_error('totalfees'))
            {
                $error['totalfees'] = form_error('totalfees');
            }

            if(form_error('fees'))
            {
                $error['fees'] = form_error('fees');
            }

            
            if(form_error('batch_id'))
            {
                $error['batch_id'] = form_error('batch_id');
            }
            if(form_error('name'))
            {
                 $error['name'] = form_error('name');
                // $this->messages->add(form_error('name'), "alert-danger");
                // redirect(base_url().'home/'.$id);
            }
            if(form_error('email'))
            {
                $error['email'] = form_error('email');
                // $this->messages->add(form_error('email'), "alert-danger");
                // redirect(base_url().'home/'.$id);
            }
           
            if(form_error('branch'))
            {
                $error['branch'] = form_error('branch');
                // $this->messages->add(form_error('branch'), "alert-danger");
                // redirect(base_url().'home/'.$id);
            }
            if(form_error('semister'))
            {
                $error['semister'] = form_error('semister');
                // $this->messages->add(form_error('semister'), "alert-danger");
                // redirect(base_url().'home/'.$id);
            }
            if(form_error('mobile'))
            {
                $error['mobile'] = form_error('mobile');
            }  
           $response = array('status'=>'failed','error'=>$error);
        }
         
        else
        {
            if($this->input->post('totalfees') < $this->input->post('fees'))
            {
                
                $error['totalfees'] = 'invalid';
                $error['fees'] = 'invalid';
                $response = array('status'=>'failed','error'=>$error);
            }else{
                // $error['mobile'] = 'invalid';
                // $response = array('status'=>'failed','error'=>$error);
               $response = array('status'=>'success'); 
            }

        }
        echo json_encode($response);
    }
    public function add_student()
    {

        $id=$this->input->post('id');
        $this->form_validation->set_rules('batch_id', 'Batch Date', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

        //$this->form_validation->set_rules('roll_no', 'Roll no', 'trim|required');
    //   $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
        $this->form_validation->set_rules('semister', 'Semester', 'trim|required');
        
        if($id>0)
        {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[12]');
        }
        else
        {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[12]');
             $this->form_validation->set_rules('roll_no', 'Roll no', 'trim|required|numeric|min_length[10]|max_length[12]');
        }
       
        $this->form_validation->set_rules('alt_mobile', 'Alt mobile', 'trim');
  
        $this->session->set_flashdata('postdata',$_POST);

        if ($this->form_validation->run() == FALSE)
        {

            if(form_error('batch_id'))
            {
                $this->messages->add(form_error('batch_id'), "alert-danger");
                redirect(base_url().'home/'.$id);
            }
            elseif(form_error('name'))
            {
                $this->messages->add(form_error('name'), "alert-danger");
                redirect(base_url().'home/'.$id);
            }
            elseif(form_error('email'))
            {
                $this->messages->add(form_error('email'), "alert-danger");
                redirect(base_url().'home/'.$id);
            }
           
             elseif(form_error('roll_no'))
             {
                $this->messages->add(form_error('roll_no'), "alert-danger");
                redirect(base_url().'home/'.$id);
             }
            elseif(form_error('semister'))
            {
                $this->messages->add(form_error('semister'), "alert-danger");
                redirect(base_url().'home/'.$id);
            }
            elseif(form_error('alt_mobile'))
            {
                $this->messages->add(form_error('alt_mobile'), "alert-danger");
                redirect(base_url().'home/'.$id);
            }  
           
        }
         elseif($this->input->post('totalfees') < $this->input->post('fees'))
                {
                    $this->messages->add('Please insert correct amount', "alert-danger");
                    redirect('home/'.$id);
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
            $topic = $this->input->post('topic')?$this->input->post('topic'):array();
            $feesdate = date('Y-m-d',strtotime($this->input->post('feesdate')));
            $array = array(
                     'topic'           =>implode(',', $topic) ,
                     'technology'           =>$this->input->post('technology') ,
                    'batch_id'             =>$this->input->post('batch_id') ,
                    'name'                 =>$this->input->post('name') ,
                    'email'                 =>$this->input->post('email')  ,
                    'mobile'                =>$this->input->post('mobile') ,
                    'roll_no'               =>$this->input->post('roll_no') ,
                    'college'               =>$this->input->post('college') ,
                    'degree'               =>$this->input->post('degree') ,
                    'branch'               =>$this->input->post('branch')?$this->input->post('branch'):'',
                    'semister'               =>$this->input->post('semister') ,
                    'totalfees'             =>$this->input->post('totalfees') ,
                    // 'fees'                  =>$this->input->post('fees') ,
                    // 'payment_mode'             =>$this->input->post('payment_mode'),
                    'testseries'             =>$this->input->post('testseries'),
                     
                 );
            if(!empty($image))
            {
                $array['image']=$image;
            }

            if($id>0)
            {
                $emailcheck = $this->admin->getRow("select email from student where email='".$this->input->post('email')."' && id!='".$id."'");
                $mobilecheck = $this->admin->getRow("select mobile from student where mobile='".$this->input->post('mobile')."' && id!='".$id."'");
                if($emailcheck)
                {
                    $this->messages->add('Email field must contain a unique value', "alert-danger");
                    redirect('home/'.$id);
                }
                elseif($mobilecheck)
                {
                    $this->messages->add('Mobile field must contain a unique value', "alert-danger");
                    redirect('home/'.$id);
                }
                else
                {
                    $update = $this->admin->update('student',array('id'=>$id), $array);
                    if($update)
                    {
                        $this->messages->add('Updated successfully', "alert-success");
                        redirect('home');
                    }
                }
            }
            else
            {
                $insert = $this->admin->insert('student', $array);
                if($insert)
                {
        $feesdate = date('Y-m-d',strtotime($this->input->post('feesdate')));
            $array = array(
                    'amount'           =>$this->input->post('fees') ,
                    'transaction_type' =>$this->input->post('payment_mode') ,
                    'feesdate'         =>date('Y-m-d'),
                    's_id'             =>$insert,
                    'batch_id'         =>$this->input->post('batch_id') 
                 );


          // print_r($array); exit;
         
                $insert = $this->admin->insert('fees_payment', $array);
                    $this->messages->add('Register successfully', "alert-success");
                    redirect('home');
                }
            }
        }
    }

}

