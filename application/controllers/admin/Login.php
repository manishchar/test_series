<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
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
        $this->session->set_flashdata('postdata',$_POST);
        if($_POST)
        {
            $email = trim($this->input->post('email', TRUE));
            $password = trim($this->input->post('password', TRUE));
            $getDetails = $this->admin->getWhere('admin', array('email'  => $email));
            if($getDetails && $getDetails[0]->name)
            {
                $dbpass=$getDetails[0]->password;
                if($dbpass==$password)
                {
                    $permission=array();
                    $permissions = $this->admin->getRows('select * from permissions where admin_id='.$getDetails[0]->id.'');
                    if(!empty($permissions))
                    {
                        foreach ($permissions as $permissionsi)
                        {
                           $permissions1[$permissionsi->page_id] = array(
                                                                'view_access'=>$permissionsi->view_access,
                                                                'add_access'=>$permissionsi->add_access,
                                                                'edit_access'=>$permissionsi->edit_access,
                                                                'delete_access'=>$permissionsi->delete_access,
                                                                );
                        }
                        $permission=$permissions1;
                    }
                    $session = array(
                                    'admin_id'=>$getDetails[0]->id,
                                    'admin_name'=>$getDetails[0]->name,
                                    'admin_email'=>$getDetails[0]->email,
                                    'admin_type'=>$getDetails[0]->types,
                                    'permission'=>$permission,
                                    'logged_in' => TRUE
                                );
                    $this->session->set_userdata($session);
                    redirect('admin/dashboard');

                }
                else
                {
                    $this->messages->add('Invalid Username or Password', "alert-danger");
                    redirect('admin/login');
                }
            }
            else
            {
                $this->messages->add('Invalid Username or Password', "alert-danger");
                redirect('admin/login');
            }
        }
        $this->load->view('admin/login/login');
    }
}
