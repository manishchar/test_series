<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collegereport extends CI_Controller {

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

        $data['datalist']=$this->admin->getRows('SELECT s.*,group_concat(s.id) as sid,c.name as cname FROM student s,collagecode c WHERE s.status = 1 and s.college = c.id GROUP BY c.id,s.branch');

        //$data['datalist']=$this->admin->getRows('SELECT s.*,c.name as cname FROM student s,collagecode c JOIN branch as b on s.branch = b.id WHERE s.status = 1 and s.college = c.id GROUP BY c.id,s.branch');
        // echo "<pre>";
        // print_r($data['datalist']);
        // die;
        $data['template']='admin/collegereport/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function view($id=0)
    {
        if($id)
        {
        $data['selectall']=$this->admin->getRow('select * from loan where id='.$id.'');
        }
        $data['template']='admin/zeroreport/view';
        $this->load->view('admin/layout/template',$data);
    }

      public function detail($college,$branch)
    {
       $data['datalist']=$this->admin->getRows('SELECT s.*,c.name as cname FROM student s,collagecode c WHERE s.status = 1 and s.college = c.id and s.college  ='.$college.' and s.branch ='.$branch.' ');

        $data['detail']=$this->admin->getRow('SELECT c.name as cname,b.name as bname FROM student s,collagecode c,branch b WHERE s.status = 1 and s.college = c.id and b.id=s.branch and s.college  ='.$college.' and s.branch ='.$branch.'');
        $data['template']='admin/collegereport/detail';
        $this->load->view('admin/layout/template',$data);
    }


    public function add($id=0)
    {
    if($id)
        {
        $data['selectall']=$this->admin->getRow('select * from loan where id='.$id.'');
        }
    $data['form_data']=$this->session->flashdata('postdata');
    $data['template']='admin/zeroreport/add';
    $this->load->view('admin/layout/template',$data);
    }
    public function add_loan()
    {
        $id=$this->input->post('id');
        $this->form_validation->set_rules('user_id', 'Customer', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
        $this->form_validation->set_rules('period', 'Period', 'trim|required');

        $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('user_id'))
            {
            $this->messages->add(form_error('user_id'), "alert-danger");
            redirect(base_url().'admin/loan/add/'.$id);
            }
            else if(form_error('amount'))
            {
            $this->messages->add(form_error('amount'), "alert-danger");
            redirect(base_url().'admin/loan/add/'.$id);
            }
            else if(form_error('period'))
            {
            $this->messages->add(form_error('description'), "alert-danger");
            redirect(base_url().'admin/loan/add/'.$id);
            }
           
        }
        else
        {
            $array = array(
                'user_id'           =>$this->input->post('user_id') ,
                'amount'            =>$this->input->post('amount') ,
                'loan_type'         =>$this->input->post('loan_type') ,
                'period'            =>$this->input->post('period') ,
                'rateof_interest'   =>$this->input->post('rateof_interest') ,
                'Interest_amount'   =>$this->input->post('Interest_amount') ,
                'total_amount'      =>$this->input->post('total_amount') ,
                'monthly_reputation' =>$this->input->post('monthly_reputation')
                 );

        
            if(!empty($id))
            {
            $update = $this->admin->update('loan',array('id'=>$id), $array);
            if($update)
                {
                    $this->messages->add('Updated successfully', "alert-success");
                    redirect('admin/loan');
                }
            }
            else
            {
                $insert = $this->admin->insert('loan', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/loan');
                }
            }
        }
    }

    public function update($id=0)
    {
        if($id)
        { $array = array(
                'status'           =>1 ,
              
                 );
           // $delete=$this->admin->delete('loan',array('id'=>$id));
            $update = $this->admin->update('loan',array('id'=>$id), $array);
            if($delete)
            {
                $this->messages->add("Approved successfully", "alert-success");
                echo "success";
            }
        }

    }


}
