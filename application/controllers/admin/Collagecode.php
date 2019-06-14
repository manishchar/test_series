<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collagecode extends CI_Controller {

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
        $data['datalist']=$this->admin->getRows('select * from collagecode where IsDeleted = 0');
        $data['template']='admin/collagecode/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function view($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from collagecode where id='.$id.'');
        }
        $data['template']='admin/collagecode/view';
        $this->load->view('admin/layout/template',$data);
    }

    public function add($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from collagecode where id='.$id.'');
        }
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/collagecode/add';
        $this->load->view('admin/layout/template',$data);
    }

    public function add_collagecode()
    {
        $id=$this->input->post('id');
        if($id)
        {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
        }
        else
        {
            $this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[collagecode.name]');
        }
        $this->form_validation->set_rules('code', 'code No', 'trim|required');

        $this->session->set_flashdata('postdata',$_POST);

        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('name'))
            {
                $this->messages->add(form_error('name'), "alert-danger");
                redirect(base_url().'admin/collagecode/add/'.$id);
            }
            else if(form_error('collagecode_no'))
            {
                $this->messages->add(form_error('code'), "alert-danger");
                redirect(base_url().'admin/collagecode/add/'.$id);
            }

        }
        else
        {
            $array = array(
                    'name'              =>$this->input->post('name') ,
                    'code'           =>$this->input->post('code') ,
                    'status'             =>$this->input->post('status'),
                    'IsNew'=>1
                   );

            if($id>0)
            {
                $update = $this->admin->update('collagecode',array('id'=>$id), $array);
                if($update)
                {
                    $this->messages->add('Updated successfully', "alert-success");
                    redirect('admin/collagecode');
                }
            }
            else
            {
                $insert = $this->admin->insert('collagecode', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/collagecode');
                }
            }
        }
    }

    public function delete($id=0)
    {
        if($id)
        {
            $delete=$this->admin->delete('collagecode',array('id'=>$id));
            if($delete)
            {
                $this->messages->add("Deleted Successfully", "alert-success");
                echo "success";
            }
        }

    }


}
