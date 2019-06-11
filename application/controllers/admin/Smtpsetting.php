<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Smtpsetting extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('admin_id') == '' )
        {
            redirect('admin/login');exit();
        }
    }

    public function index()
    {
        $array=array(
                    'smtp_username',
                    'smtp_password',
                    'smtp_host',
                    'smtp_port',
                );
        $data['selectall']=$this->admin->fetchSetting('settings',$array);
        $data['template']='admin/smtpsetting/smtpsetting';
        $this->load->view('admin/layout/template',$data);
    }

    public function update_smtpsetting()
    {
        
        $this->form_validation->set_rules('smtp_username', 'SMTP User Name', 'trim|required|valid_email');
        $this->form_validation->set_rules('smtp_password', 'SMTP Password', 'trim|required');
        $this->form_validation->set_rules('smtp_host', 'SMTP Host', 'trim|required');
        $this->form_validation->set_rules('smtp_port', 'SMTP Port', 'trim|required');
        $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('smtp_username'))
            {
                $this->messages->add(form_error('smtp_username'), "alert-danger");
                redirect('admin/smtpsetting');
            }
            elseif(form_error('smtp_password'))
            {
                $this->messages->add(form_error('smtp_password'), "alert-danger");
                redirect('admin/smtpsetting');
            }
            elseif(form_error('smtp_host'))
            {
                $this->messages->add(form_error('smtp_host'), "alert-danger");
                redirect('admin/smtpsetting');
            }
            elseif(form_error('smtp_port'))
            {
                $this->messages->add(form_error('smtp_port'), "alert-danger");
                redirect('admin/smtpsetting');
            }
        }
        else
        {
            foreach($_POST as $field=>$value)
            {
                $query="update settings set value='".$value."' where field='".$field."' ";
                $this->db->query($query);
            }
            $this->messages->add("Updated successfylly", "alert-success");
            redirect('admin/smtpsetting');
        }
    }
}

