<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Degree extends CI_Controller {

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
        $data['datalist']=$this->admin->getRows('select * from degree');
        $data['template']='admin/degree/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function view($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from degree where id='.$id.'');
        }
        $data['template']='admin/degree/view';
        $this->load->view('admin/layout/template',$data);
    }

    public function add($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from degree where id='.$id.'');
        }
        // print_r($data['selectall']);
        // die;
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/degree/add';
        $this->load->view('admin/layout/template',$data);
    }

    public function add_degree()
    {
        $id=$this->input->post('id');
        if($id)
        {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
        }
        else
        {
            $this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[degree.name]');
        }
      
        $this->session->set_flashdata('postdata',$_POST);

        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('name'))
            {
                $this->messages->add(form_error('name'), "alert-danger");
                redirect(base_url().'admin/degree/add/'.$id);
            }
          
        }
        else
        {
            $array = array(
                    'name'      =>$this->input->post('name') ,
                    'semester'  =>implode(',', $this->input->post('semester')) ,
                    'status'    =>$this->input->post('status'),          
                    'IsNew'     =>1
                   );

            if($id>0)
            {
                $update = $this->admin->update('degree',array('id'=>$id), $array);
                if($update)
                {
                    $this->messages->add('Updated successfully', "alert-success");
                    redirect('admin/degree');
                }
            }
            else
            {
                $insert = $this->admin->insert('degree', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/degree');
                }
            }
        }
    }

    public function delete($id=0)
    {
        if($id)
        {
            $delete=$this->admin->delete('degree',array('id'=>$id));
            if($delete)
            {
                $this->messages->add("Deleted Successfully", "alert-success");
                echo "success";
            }
        }

    }


}
