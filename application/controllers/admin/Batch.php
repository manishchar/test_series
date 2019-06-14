<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch extends CI_Controller {

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
        $data['datalist']=$this->admin->getRows('select * from batch where IsDeleted = 0');
        $data['template']='admin/batch/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function view($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from batch where id='.$id.'');
        }
        $data['template']='admin/batch/view';
        $this->load->view('admin/layout/template',$data);
    }

    public function getTechnology(){
        // echo "string";
        $tech = $_POST['tech'];
        $results = $this->db->select('tab2.name,tab2.id')->join('admin as tab2','tab1.faculty_id=tab2.id')->where('tab1.technology',$tech)->group_by('tab1.faculty_id')->get('technology_detail as tab1')->result();
        $html = "";
        if(!empty($results)){
           $html .= "<option value=''>Select Faculty</option>";
           foreach ($results as $key => $value) {
                $html .= "<option value='".$value->id."'>".$value->name."</option>";
            } 
        }else{
            $html .= "<option value=''>No Records</option>";
        }
        echo $html;
    }
    public function add($id=0)
    {
        if($id)
        {
            $batch=$this->admin->getRow('select * from batch where id='.$id.'');
            $data['selectall']=$batch;
            //print_r($data['selectall']);die;
            //$data['faculty'] = $this->db->select('tab2.id,tab2.name')->join('admin as tab2','tab1.faculty_id=tab2.id')->where('tab1.technology',$batch->course_id)->get('technology_detail as tab1')->result();

            $data['faculty'] = $this->db->select('tab2.name,tab2.id')->join('admin as tab2','tab1.faculty_id=tab2.id')->where('tab1.technology',$batch->course_id)->group_by('tab1.faculty_id')->get('technology_detail as tab1')->result();
            // print_r($data['faculty']);
            // die;

        }
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/batch/add';
        $this->load->view('admin/layout/template',$data);
    }

    public function getFaculty(){
        $course_id = $_POST['course_id'];
        $res = $this->db->select('tab2.id,tab2.name')->join('admin as tab2','tab1.faculty_id=tab2.id')->where('tab1.technology',$course_id)->get('technology_detail as tab1')->result_array();
        $html = "";
        if(!empty($res)){
             $html = "<option value='0' selected disabled>Select Faculty</option>";
            foreach ($res as $key => $value) {
                $html .= "<option value='".$value['id']."'>".$value['name']."</option>";
            }
            
        }else{
            $html = "<option value='0'>No Result</option>";
        }
        echo $html;
    }
    public function add_batch()
    {
        $id=$this->input->post('id');
        if($id)
        {
            $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        }
        else
        {
            $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        }
        $this->form_validation->set_rules('lab_id', 'Lab id', 'trim|required');
        $this->form_validation->set_rules('faculty_id', 'Faculty', 'trim|required');
        $this->form_validation->set_rules('startdate', 'Start date', 'trim|required');
         $this->form_validation->set_rules('enddate', 'End date', 'trim|required');
          $this->form_validation->set_rules('starttime', 'Start time', 'trim|required');
           $this->form_validation->set_rules('endtime', 'End time', 'trim|required');
        $this->session->set_flashdata('postdata',$_POST);

        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('course_id'))
            {
                $this->messages->add(form_error('course_id'), "alert-danger");
                redirect(base_url().'admin/batch/add/'.$id);
            }
            else if(form_error('lab_id'))
            {
                $this->messages->add(form_error('lab_id'), "alert-danger");
                redirect(base_url().'admin/batch/add/'.$id);
            }
            else if(form_error('faculty_id'))
            {
                $this->messages->add(form_error('faculty_id'), "alert-danger");
                redirect(base_url().'admin/batch/add/'.$id);
            }
             else if(form_error('startdate'))
            {
                $this->messages->add(form_error('startdate'), "alert-danger");
                redirect(base_url().'admin/batch/add/'.$id);
            }
            else if(form_error('enddate'))
            {
                $this->messages->add(form_error('enddate'), "alert-danger");
                redirect(base_url().'admin/batch/add/'.$id);
            }
             else if(form_error('endtime'))
            {
                $this->messages->add(form_error('endtime'), "alert-danger");
                redirect(base_url().'admin/batch/add/'.$id);
            }
           
        }
        else
        {
           $startdate = date('Y-m-d',strtotime($this->input->post('startdate')));
            $enddate = date('Y-m-d',strtotime($this->input->post('enddate')));
            $array = array(
                    'course_id'        =>$this->input->post('course_id') ,
                    'lab_id'           =>$this->input->post('lab_id') ,
                    'faculty_id'       =>$this->input->post('faculty_id'),
                   // 'fees'       =>$this->input->post('fees'),
                    'startdate'         =>$startdate,
                    'enddate'           =>$enddate,
                    'starttime'         =>$this->input->post('starttime') ,
                    'endtime'           =>$this->input->post('endtime'),
                    'description'       =>$this->input->post('description') ,
                    'status'            =>$this->input->post('status'),
                    'IsNew'=>1
                 );

            if($id>0)
            {
                $update = $this->admin->update('batch',array('id'=>$id), $array);
                if($update)
                {
                    $this->messages->add('Updated successfully', "alert-success");
                    redirect('admin/batch');
                }
            }
            else
            {
                $insert = $this->admin->insert('batch', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/batch');
                }
            }
        }
    }

    public function delete($id=0)
    {
        if($id)
        {
            $delete=$this->admin->delete('batch',array('id'=>$id));
            if($delete)
            {
                $this->messages->add("Deleted Successfully", "alert-success");
                echo "success";
            }
        }

    }


}
