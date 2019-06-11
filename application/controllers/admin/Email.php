<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

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
        //permission check
        if(has_permission(10, 'view')==false){ $this->messages->add("Access denied", "alert-danger");return redirect(base_url()); }

        $data['datalist']=$this->admin->getAll('email');
        $data['template']='admin/email/index';
        $this->load->view('admin/layout/template',$data);
    }
    public function view($id)
    {
        if($id)
        {
            $where= array('email_id'=>$id);
            $data['details']=$this->admin->getWhere('email',$where);
        }
        $data['template']='admin/email/view';
        $this->load->view('admin/layout/template',$data);
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('from_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('body', 'Email Body', 'trim|required');
        $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('from_email'))
            {
                $this->messages->add(form_error('from_email'), "alert-danger");
                redirect(base_url().'admin/email/edit/'.$id);
            }
            elseif(form_error('subject'))
            {
                $this->messages->add(form_error('subject'), "alert-danger");
                redirect(base_url().'admin/email/edit/'.$id);
            }
            elseif(form_error('body'))
            {
                $this->messages->add(form_error('body'), "alert-danger");
                redirect(base_url().'admin/email/edit/'.$id);
            }
        }
        elseif($id>0)
        {
            $array = array(
                    'type'            =>$this->input->post('type') ,
                    'from_email'      =>addslashes($this->input->post('from_email')) ,
                    'subject'         =>$this->input->post('subject'),
                    'body'            =>$this->input->post('body'),
                    'from_name'       =>$this->input->post('from_name')
                 );
            $where = array('email_id'=>$id);
            $update = $this->admin->update('email',$where, $array);
            if($update)
            {
                $this->messages->add('Saved successfully', "alert-success");
                redirect('admin/email');
            }

        }
        $where= array('email_id'=>$id);
        $data['details']=$this->admin->getWhere('email',$where);
        $data['template']='admin/email/edit';
        $this->load->view('admin/layout/template',$data);
    }

}
