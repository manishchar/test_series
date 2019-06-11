<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('admin_id') != '')
        {
            redirect('admin/dashboard');exit();
        }
        $this->encryption->initialize(array('cipher' => 'aes-256', 'key' => 'e7f28994b001a435121751928ec653fb','mode' => 'cbc','driver' => 'openssl'));
    }

    public function index()
    {
        if(isset($_POST))
        {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->session->set_flashdata('postdata',$_POST);
            if ($this->form_validation->run() == FALSE)
            {
                if(form_error('email'))
                {
                    $this->messages->add(form_error('email'), "alert-danger");
                    redirect('admin/forgotpassword');
                }
            }
            else
            {
                $userdata = $this->admin->getWhere('admin',array('email'=>$this->input->post('email')));
                if($userdata)
                {
                    $random=random_string('alnum', 8);
                    $update = $this->admin->update('admin', array('id'=>$userdata[0]->id), array('password'=>$this->encryption->encrypt($random)));
                    if($update)
                    {
                        $var = array ('usr' => $this->input->post('email'), 'passwords' =>$random);
                        send_mail_temp(trim($this->input->post('email')),'forgot_password_admin',$var);

                        $this->messages->add('Check your email account for new password', "alert-success");
                        redirect('admin/forgotpassword');
                    }
                }
                else
                {
                    $this->messages->add('Invalid email id', "alert-danger");
                    redirect('admin/forgotpassword');
                }
            }
        }
        $data['form_data']=$this->session->flashdata('postdata');
        $this->load->view('admin/login/forgotpassword',$data);
    }
}
