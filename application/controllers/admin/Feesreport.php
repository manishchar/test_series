<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feesreport extends CI_Controller {
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
        $data['course']=0;
        $course=$this->admin->getRows('select * from technology');
        if(!empty($course))
        {
            $data['course']=count($course);
        }

        $data['lab']=0;
        $lab=$this->admin->getRows('select * from lab');
        if(!empty($lab))
        {
            $data['lab']=count($lab);
        }

 $data['batch']=0;
        $batch=$this->admin->getRows('select * from batch');
        if(!empty($batch))
        {
            $data['batch']=count($batch);
        }

      

        $data['faculty']=0;
        $faculty=$this->db->where('types',3)->get("admin")->result();
        if(!empty($faculty))
        {
            $data['faculty']=count($faculty);
        }

        $data['student']=0;
        $student=$this->admin->getRows('select * from student');
        if(!empty($student))
        {
        $data['student']=count($student);
        }

      
        $data['inactivestudent']=$this->admin->getRows('select * from student  WHERE status = 0 order by id desc limit 10');

        $data['activestudent']=0;
        $activestudent=$this->admin->getRows('select * from student  WHERE status = 1');
        if(!empty($activestudent))
        {
        $data['active']=count($activestudent);
        }
       

        $data['template']='admin/feesreport/index';
        $this->load->view('admin/layout/template',$data);
    }
}
