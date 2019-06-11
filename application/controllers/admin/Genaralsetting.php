<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Genaralsetting extends CI_Controller
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
                    'contact_email',
                    'contact_number',
                    'contact_address',
                    'contact_name',
                    'general_meta_tags',
                    'general_meta_desc',
                    'general_meta_title',
                    'facebook_url',
                    'twitter_url',
                    'instagram_url',
                    'linkedin_url',
                );
        $data['selectall']=$this->admin->fetchSetting('settings',$array);
        $data['template']='admin/genaralsetting/genaralsetting';
        $this->load->view('admin/layout/template',$data);
    }

    public function update_genaralsetting()
    {
        $this->form_validation->set_rules('contact_name', 'Contact Name', 'trim|required');
        $this->form_validation->set_rules('contact_email', 'Contact Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('contact_number', 'Contact Number', 'trim|required|numeric|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('contact_address', 'Contact Address', 'trim|required');
        $this->form_validation->set_rules('general_meta_title', 'General Meta Title', 'trim|required');
        $this->form_validation->set_rules('general_meta_tags', 'General Meta Tag', 'trim|required');
        $this->form_validation->set_rules('general_meta_desc', 'General Meta Description', 'trim|required');
        $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('contact_name'))
            {
                $this->messages->add(form_error('contact_name'), "alert-danger");
                redirect('admin/genaralsetting');
            }
            elseif(form_error('contact_email'))
            {
                $this->messages->add(form_error('contact_email'), "alert-danger");
                redirect('admin/admin/admin/genaralsetting');
            }
            elseif(form_error('contact_number'))
            {
                $this->messages->add(form_error('contact_number'), "alert-danger");
                redirect('admin/admin/genaralsetting');
            }
            elseif(form_error('contact_address'))
            {
                $this->messages->add(form_error('contact_address'), "alert-danger");
                redirect('admin/genaralsetting');
            }
            elseif(form_error('general_meta_title'))
            {
                $this->messages->add(form_error('general_meta_title'), "alert-danger");
                redirect('admin/admin/genaralsetting');
            }
            elseif(form_error('general_meta_tags'))
            {
                $this->messages->add(form_error('general_meta_tags'), "alert-danger");
                redirect(base_url().'admin/genaralsetting');
            }
            elseif(form_error('general_meta_desc'))
            {
                $this->messages->add(form_error('general_meta_desc'), "alert-danger");
                redirect(base_url().'admin/genaralsetting');
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
            redirect('admin/genaralsetting');
        }
    }
}

