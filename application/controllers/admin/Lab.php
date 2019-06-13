<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lab extends CI_Controller {

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
        $data['datalist']=$this->admin->getRows('select * from lab');
        $data['template']='admin/lab/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function view($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from lab where id='.$id.'');
        }
        $data['template']='admin/lab/view';
        $this->load->view('admin/layout/template',$data);
    }

    public function add($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from lab where id='.$id.'');
        }
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/lab/add';
        $this->load->view('admin/layout/template',$data);
    }

    public function add_lab()
    {
        $id=$this->input->post('id');
        if($id)
        {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
        }
        else
        {
            $this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[lab.name]');
        }
      //  $this->form_validation->set_rules('zone', 'Zone', 'trim|required');
      //  $this->form_validation->set_rules('capacity', 'Capacity', 'trim|required');
        $this->session->set_flashdata('postdata',$_POST);

        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('name'))
            {
                $this->messages->add(form_error('name'), "alert-danger");
                redirect(base_url().'admin/lab/add/'.$id);
            }
           
        }
        else
        {
            $array = array(
                    'name'              =>$this->input->post('name') ,
                    'zone'           =>$this->input->post('zone') ,
                    'capacity'           =>$this->input->post('capacity') ,
                    'status'             =>$this->input->post('status')
                   );

            if($id>0)
            {
                $update = $this->admin->update('lab',array('id'=>$id), $array);
                if($update)
                {
                    $this->messages->add('Updated successfully', "alert-success");
                    redirect('admin/lab');
                }
            }
            else
            {
                $insert = $this->admin->insert('lab', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/lab');
                }
            }
        }
    }

    public function delete($id=0)
    {
        if($id)
        {
            $delete=$this->admin->delete('lab',array('id'=>$id));
            if($delete)
            {
                $this->messages->add("Deleted Successfully", "alert-success");
                echo "success";
            }
        }

    }


}
