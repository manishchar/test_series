<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class course extends CI_Controller {

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
        $data['datalist']=$this->admin->getRows('select * from course');
        $data['template']='admin/course/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function view($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from course where id='.$id.'');
        }
        $data['template']='admin/course/view';
        $this->load->view('admin/layout/template',$data);
    }

    public function add($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from course where id='.$id.'');
        }
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/course/add';
        $this->load->view('admin/layout/template',$data);
    }

    public function add_course()
    {
        $id=$this->input->post('id');
        if($id)
        {
            $this->form_validation->set_rules('title', 'Course Title', 'trim|required');
        }
        else
        {
            $this->form_validation->set_rules('title', 'Course Title', 'trim|required|is_unique[course.title]');
        }
        $this->form_validation->set_rules('technology', 'Technology', 'trim|required');
           $this->form_validation->set_rules('description', 'Course Detail', 'trim|required');
        $this->session->set_flashdata('postdata',$_POST);

        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('title'))
            {
                $this->messages->add(form_error('title'), "alert-danger");
                redirect(base_url().'admin/course/add/'.$id);
            }
            else if(form_error('technology'))
            {
                $this->messages->add(form_error('technology'), "alert-danger");
                redirect(base_url().'admin/course/add/'.$id);
            }
            else if(form_error('description'))
            {
                $this->messages->add(form_error('description'), "alert-danger");
                redirect(base_url().'admin/course/add/'.$id);
            }
        }
        else
        {
            $array = array(
                    'title'              =>$this->input->post('title') ,
                    'technology'           =>$this->input->post('technology') ,
                    'description'           =>$this->input->post('description') ,
                    'status'             =>$this->input->post('status')
                 );

            if($id>0)
            {
                $update = $this->admin->update('course',array('id'=>$id), $array);
                if($update)
                {
                    $this->messages->add('Updated successfully', "alert-success");
                    redirect('admin/course');
                }
            }
            else
            {
                $insert = $this->admin->insert('course', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/course');
                }
            }
        }
    }

    public function delete($id=0)
    {
        if($id)
        {
            $delete=$this->admin->delete('course',array('id'=>$id));
            if($delete)
            {
                $this->messages->add("Deleted Successfully", "alert-success");
                echo "success";
            }
        }

    }


}
