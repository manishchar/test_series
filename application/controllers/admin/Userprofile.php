<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userprofile extends CI_Controller {

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
        $data['country']=$this->admin->getRows('select * from countries');

        $data['selectall']=$this->admin->getRow('select * from admin where id='.$this->session->userdata('admin_id').'');

        $data['form_data']=$this->session->flashdata('postdata');

        $data['template']='admin/profile/userprofile';
        $this->load->view('admin/layout/template',$data);
    }
    public function deleteimage()
    {
        $update = $this->admin->update('admin',array('id'=>$this->session->userdata('admin_id')), array('image'=>''));
        if($update)
        {
            $this->messages->add('Image deleted successfully', "alert-success");
            redirect('admin/userprofile');
        }
    }
    public function updateprofile()
    {
        $id=$this->session->userdata('admin_id');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');

        if($this->session->userdata('admin_type')==3)
        {
            //$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
        }

        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('name'))
            {
                $this->messages->add(form_error('name'), "alert-danger");
                redirect('admin/userprofile');
            }
            elseif(form_error('company_name'))
            {
                $this->messages->add(form_error('company_name'), "alert-danger");
                redirect('admin/userprofile');
            }
            
            elseif(form_error('address'))
            {
                $this->messages->add(form_error('address'), "alert-danger");
                redirect('admin/userprofile');
            }
        }
        else
        {
            $image = '';
            if($_FILES['files']['name'])
            {
                $ext = end((explode(".", $_FILES['files']['name'])));
                $imgname = $ext[0].substr(md5(microtime()),0,8).'.'.$ext;
                if(move_uploaded_file($_FILES["files"]["tmp_name"],"uploads/teammember/".$imgname))
                {
                    copy("uploads/teammember/".$imgname,"uploads/teammember/resize/".$imgname);
                    $image = $imgname;
                }
            }
            $array = array(
                    'name'              =>$this->input->post('name') ,
                    'mobile'              =>$this->input->post('mobile') ,
                    'address'           =>$this->input->post('address'),
                 );
            if($this->session->userdata('admin_type')==3)
            {
                $array['company_name']=$this->input->post('company_name');
            }
            if(!empty($image))
            {
                $array['image']=$image;
            }
            $update = $this->admin->update('admin',array('id'=>$id), $array);
            if($update)
            {
                $this->messages->add('Profile updated successfully', "alert-success");
                redirect('admin/userprofile');
            }


        }
    }

}
