<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

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
        $data['datalist']=$this->admin->getRows('select * from branch where IsDeleted = 0');
        $data['template']='admin/branch/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function view($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from branch where id='.$id.'');
        }
        $data['template']='admin/branch/view';
        $this->load->view('admin/layout/template',$data);
    }

    public function add($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from branch where id='.$id.'');
        }
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/branch/add';
        $this->load->view('admin/layout/template',$data);
    }

    public function add_branch()
    {
        $id=$this->input->post('id');
        if($id)
        {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
        }
        else
        {
            $this->form_validation->set_rules('name', 'Branch Name', 'trim|required|is_unique[branch.name]');
        }
        $this->form_validation->set_rules('degree', 'Degree', 'trim|required');
       
        $this->session->set_flashdata('postdata',$_POST);

        if ($this->form_validation->run() == FALSE)
        {
           
             if(form_error('degree'))
            {
                $this->messages->add(form_error('degree'), "alert-danger");
                redirect(base_url().'admin/branch/add/'.$id);
            }
           else if(form_error('name'))
            {
                $this->messages->add(form_error('name'), "alert-danger");
                redirect(base_url().'admin/branch/add/'.$id);
            }
         
        }
        else
        {
            $array = array(
                    'name'    =>$this->input->post('name') ,
                    'degree'  =>$this->input->post('degree') ,
                    'status'  =>$this->input->post('status'),
                    'IsNew'   =>1
                   );

            if($id>0)
            {
                $update = $this->admin->update('branch',array('id'=>$id), $array);
                if($update)
                {
                    $this->messages->add('Updated successfully', "alert-success");
                    redirect('admin/branch');
                }
            }
            else
            {
                $insert = $this->admin->insert('branch', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/branch');
                }
            }
        }
    }

    public function delete($id=0)
    {
        if($id)
        {
            $delete=$this->admin->delete('branch',array('id'=>$id));
            if($delete)
            {
                $this->messages->add("Deleted Successfully", "alert-success");
                echo "success";
            }
        }

    }


}
