<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Technology extends CI_Controller {

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
        $data['datalist']=$this->admin->getRows('select * from technology ORDER BY name ASC');
        $data['template']='admin/technology/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function view($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from technology where id='.$id.'');
        }
        $data['template']='admin/technology/view';
        $this->load->view('admin/layout/template',$data);
    }

    public function add($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from technology where id='.$id.'');
        }
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/technology/add';
        $this->load->view('admin/layout/template',$data);
    }

    public function add_technology()
    {
        // print_r($_POST);
        // die;
        $id=$this->input->post('id');
        if($id)
        {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
        }
        else
        {
            $this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[technology.name]');
        }
      
        $this->session->set_flashdata('postdata',$_POST);

        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('name'))
            {
                $this->messages->add(form_error('name'), "alert-danger");
                redirect(base_url().'admin/technology/add/'.$id);
            }
          
        }
        else
        {
            $topic = $this->input->post('topic')?$this->input->post('topic'):array();
            $array = array(
                    'name'              =>$this->input->post('name') ,
                    'topic'              =>implode(',', $topic),
                    'status'             =>$this->input->post('status')
                   );

            if($id>0)
            {
                $update = $this->admin->update('technology',array('id'=>$id), $array);
                if($update)
                {
                    $this->messages->add('Updated successfully', "alert-success");
                    redirect('admin/technology');
                }
            }
            else
            {
                $insert = $this->admin->insert('technology', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/technology');
                }
            }
        }
    }

    public function delete($id=0)
    {
        if($id)
        {
            $delete=$this->admin->delete('technology',array('id'=>$id));
            if($delete)
            {
                $this->messages->add("Deleted Successfully", "alert-success");
                echo "success";
            }
        }

    }


}
