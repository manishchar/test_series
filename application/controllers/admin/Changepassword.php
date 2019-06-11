<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('admin_id') == '')
        {
            redirect('admin/login');exit();
        }
        $this->encryption->initialize(array('cipher' => 'aes-256', 'key' => 'e7f28994b001a435121751928ec653fb','mode' => 'cbc','driver' => 'openssl'));
    }

    public function index()
    {
        $data['form_data']=$this->session->flashdata('postdata');

        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('con_password', 'Confirm Password', 'required|matches[new_password]');
        $this->session->set_flashdata('postdata',$_POST);
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('postdata',$_POST);
            if(form_error('old_password'))
            {
                $this->messages->add(form_error('old_password'), "alert-danger");
                redirect('admin/changepassword');
            }
            elseif(form_error('new_password'))
            {
                $this->messages->add(form_error('new_password'), "alert-danger");
                redirect('admin/changepassword');
            }
            elseif(form_error('con_password'))
            {
                $this->messages->add(form_error('con_password'), "alert-danger");
                 redirect('admin/changepassword');
            }
        }
        else
        {
            $old_pass=$this->input->post('old_password');
            $new_pass=$this->input->post('new_password');
            $c_pass=$this->input->post('con_password');
            if($_SESSION['admin_id'])
            {
                $where= array('id'=>$_SESSION['admin_id']);
                $config=$this->admin->getWhere('admin',$where);
                if($config)
                {
                    $dbpass=$config[0]->password;
                    $new_passenc=$new_pass;
                    $data=array('password'=>$new_passenc,'IsNew'=>1);

                    if($dbpass==$old_pass)
                    {
                        $where= array('id'=>$_SESSION['admin_id']);
                        $update = $this->admin->update('admin',$where,$data);
                        $this->messages->add('Password change successfully', "alert-success");
                        redirect('admin/changepassword');
                    }
                    else
                    {
                        $this->session->set_flashdata('postdata',$_POST);
                        $this->messages->add('Invalid old password', "alert-danger");
                        redirect('admin/changepassword');
                    }
                }
                else
                {
                    $this->session->set_flashdata('postdata',$_POST);
                    $this->messages->add('Invalid old password', "alert-danger");
                    redirect('admin/changepassword');
                }
            }
        }


        $data['template']='admin/profile/changepassword';
        $this->load->view('admin/layout/template',$data);
    }
}
