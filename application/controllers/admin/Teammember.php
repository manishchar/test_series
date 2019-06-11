<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teammember extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('admin_id') == '')
        {
            redirect('login');exit();
        }
       //  $this->load->model('user');
        $this->encryption->initialize(array('cipher' => 'aes-256', 'key' => 'e7f28994b001a435121751928ec653fb','mode' => 'cbc','driver' => 'openssl'));
    }

    public function index()
    {
        //permission check
        if(has_permission(4, 'view')==false){ $this->messages->add("Access denied", "alert-danger");return redirect(base_url('admin/dashboard')); }

        $data['datalist']=$this->admin->getRows('select *  from admin where types=2');
        $data['template']='admin/teammember/index';
        $this->load->view('admin/layout/template',$data);
    }
    public function view($id)
    {
        //permission check
        if(has_permission(4, 'view')==false){ $this->messages->add("Access denied", "alert-danger");return redirect(base_url('admin/dashboard')); }

        $data['padedata'] = $this->config->item('padedata');
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select *  from admin where  id='.$id.' && types=2');
        }
        $data['template']='admin/admin/teammember/view';
        $this->load->view('admin/layout/template',$data);
    }
    public function add($id=0)
    {
        //permission check
        if(has_permission(4, 'add')==false){ $this->messages->add("Access denied", "alert-danger");return redirect(base_url('admin/dashboard')); }
        $data['padedata'] = $this->config->item('padedata');

        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from admin where id='.$id.' ');
        }

        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/teammember/add';
        $this->load->view('admin/layout/template',$data);
    }

    public function add_teammember()
    {
        $id=$this->input->post('id');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if($id>0)
        {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
       // $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');

        }
        else
        {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[admin.email]');
       // $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|is_unique[admin.mobile]');

        }
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
 
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('name'))
            {
                $this->messages->add(form_error('name'), "alert-danger");
                redirect(base_url().'index.php/admin/teammember/add/'.$id);
            }
            elseif(form_error('email'))
            {
                $this->messages->add(form_error('email'), "alert-danger");
                redirect(base_url().'index.php/admin/teammember/add/'.$id);
            }
            elseif(form_error('password'))
            {
                $this->messages->add(form_error('password'), "alert-danger");
                redirect(base_url().'index.php/admin/teammember/add/'.$id);
            }
          
        }
        else
        {

            $add_access    =$this->input->post('add_access');
            $edit_access    =$this->input->post('edit_access');
            $delete_access  =$this->input->post('delete_access');
            $view_access     =$this->input->post('view_access');
            $no_access      =$this->input->post('no_access');
            $page_id        =$this->input->post('page_id');

            if(count($add_access)==0)$add_access=array();
            if(count($edit_access)==0)$edit_access=array();
            if(count($delete_access)==0)$delete_access=array();
            if(count($view_access)==0)$view_access=array();
            if(count($no_access)==0)$no_access=array();

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
                    'name'          =>$this->input->post('name') ,
                    'email'         =>$this->input->post('email')  ,
                    'password'      =>$this->input->post('password'),
                    'mobile'        =>$this->input->post('mobile'),
     
                    'address'        =>$this->input->post('address'),
                    'status'         =>$this->input->post('status'),
                    'types'          =>2 ,
                 );
            if(!empty($image))
            {
                $array['image']=$image;
            }

            if($id>0)
            {
                $emailcheck = $this->admin->getRow("select email from admin where email='".$this->input->post('email')."' && id!='".$id."'");
                if($emailcheck)
                {
                    $this->messages->add('Email field must contain a unique value', "alert-danger");
                    redirect('teammember/add');
                }
                else
                {
                    $update = $this->admin->update('admin',array('id'=>$id), $array);
                    if($update)
                    {
                        $delete=$this->db->delete('permissions',array('admin_id'=>$id));
                        foreach($page_id as $key=>$page_val)
                        {
                            
                         if($no_access[$page_val]==1){$no_access1=1;}else{$no_access1=0;}
                         if($add_access[$page_val]==1){$add_access1=1;}else{$add_access1=0;}
                         if($edit_access[$page_val]==1){$edit_access1=1;}else{$edit_access1=0;}
                         if($delete_access[$page_val]==1){$delete_access1=1;}else{$delete_access1=0;}
                         if($view_access[$page_val]==1){$view_access1=1;}else{$view_access1=0;}
                        $permissions = array(
                                        'admin_id'       =>	$id,
                                        'page_id'        =>	$page_val,
                                        'no_access'      =>	$no_access1,
                                        'add_access'     =>	$add_access1,
                                        'edit_access'    =>	$edit_access1,
                                        'delete_access'  =>	$delete_access1,
                                        'view_access'    => $view_access1
                                    );
                            $this->admin->insert('permissions',$permissions);
                            /*$permissions = array(
                                            'no_access'     =>	$no_access1,
                                            'add_access'     =>	$add_access1,
                                            'edit_access'    =>	$edit_access1,
                                            'delete_access'  =>	$delete_access1,
                                            'view_access'     =>$view_access1
                                    );

                            $this->admin->update('permissions',array('admin_id'=>$id,'page_id'=>$page_val), $permissions);
                            */
                             //echo $this->db->last_query(); 
                        }
                        $this->messages->add('Updated successfully', "alert-success");
                        redirect('admin/teammember');
                    }
                }
            }
            else
            {
                $insert = $this->admin->insert('admin', $array);
                $insert_id = $this->db->insert_id();

                if($insert)
                {
                    $var = array (
                                'NAME' => $this->input->post('name'),
                                'EMAILID' => $this->input->post('email'),
                                'PASSWORDS' =>$this->input->post('password')
                            );
               // $temp_id = 1;
               // $data = $this->sendRegisterVerificationMail($insert_id, $temp_id);
                    


                    //send_mail_temp($this->input->post('email'),'user_signup',$var);

                    foreach($page_id as $key=>$page_val)
                    {
                        if($no_access[$page_val]==1){$no_access1=1;}else{$no_access1=0;}
                        if($add_access[$page_val]==1){$add_access1=1;}else{$add_access1=0;}
                        if($edit_access[$page_val]==1){$edit_access1=1;}else{$edit_access1=0;}
                        if($delete_access[$page_val]==1){$delete_access1=1;}else{$delete_access1=0;}
                        if($view_access[$page_val]==1){$view_access1=1;}else{$view_access1=0;}

                        $permissions = array(
                                        'admin_id'       =>	$insert,
                                        'page_id'        =>	$page_val,
                                        'no_access'      =>	$no_access1,
                                        'add_access'     =>	$add_access1,
                                        'edit_access'    =>	$edit_access1,
                                        'delete_access'  =>	$delete_access1,
                                        'view_access'    => $view_access1
                                        );
                      $this->admin->insert('permissions',$permissions);
                    // echo $this->db->last_query(); exit;
                    }

                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/teammember');
                }
            }
        }
    }

    public function delete($id=0)
    {
        //permission check
        //if(has_permission(4, 'delete')==false){ $this->messages->add("Access denied", "alert-danger");return redirect(base_url()); }
        if($id)
        {
            $delete=$this->admin->delete('admin',array('id'=>$id));
            if($delete)
            {
                $this->messages->add("Deleted Successfully", "alert-success");
                //redirect('teammember');
                echo "sucess";
            }
        }

    }


    public function sendRegisterVerificationMail($insert_id,$temp_id)
    {
        $this->load->library('email');
        $tableName1 ="smtp_details";
        $smtp_details = $this->user->selectRow($tableName1);

        //templateDetails
        $table_name2="email_template";
        $table_name3="template_type";
        $on = "email_template.type = template_type.temp_id";
        $where = array("email_template.type" => $temp_id);
        $emailTemplateData = $this->user->joinAll($table_name2,$table_name3,$on,$where);


        $table_name4 = "admin";
        $adminTableData = $this->user->selectRow($table_name4);
        $where5 = array("id"=>$insert_id);
        $recruiterDetails = $this->user->getRecruiterRowDataByJoinWhere($where5);

        //admin table data
        $template = $emailTemplateData[0]->content;
        $template = str_replace('{id}', $recruiterDetails->id, $template);
        $template = str_replace('{name}','<b>'.$recruiterDetails->name.'</b>'.' ', $template);
        $template = str_replace('{email}', $recruiterDetails->email, $template);
        $template = str_replace('{mobile}', $recruiterDetails->mobile, $template);
        $template = str_replace('{address}', $recruiterDetails->address, $template);
        $template = str_replace('{country}', $recruiterDetails->country_name, $template);
        $template = str_replace('{city}', $recruiterDetails->city, $template);
        $template = str_replace('{password}', base64_decode($recruiterDetails->password), $template);
        $template = str_replace('{types}', $recruiterDetails->types, $template);

        //smtp table data
        $template = str_replace('{smtp_id}', $smtp_details->smtp_id, $template);
        $template = str_replace('{smtp_host}', $smtp_details->smtp_host, $template);
        $template = str_replace('{smtp_username}', $smtp_details->smtp_username, $template);
        $template = str_replace('{smtp_password}', $smtp_details->smtp_password, $template);
        $template = str_replace('{smtp_port}', $smtp_details->smtp_port, $template);
        $template = str_replace('{sender_name}', $smtp_details->sender_name, $template);
        $template = str_replace('{sender_email_id}', $smtp_details->sender_email_id, $template);
        
        $subject = $emailTemplateData[0]->subject;
        $body = $template; 
        $adminmail=$recruiterDetails->email;

        $config['protocol']     = 'smtp';
        $config['smtp_host']    = $smtp_details->smtp_host;
        $config['smtp_port']    = $smtp_details->smtp_port;
        $config['smtp_user']    = $smtp_details->smtp_username; 
        $config['smtp_pass']    = $smtp_details->smtp_password;
        $config['newline']      = "\r\n";
        $config['mailtype']     = 'html'; // or html

        $this->email->initialize($config);
        $this->email->clear();
        $this->email->from($smtp_details->sender_email_id, $smtp_details->sender_name);
        $this->email->to($adminmail);
        $this->email->subject($subject);    
        $this->email->message($body);

                    
        if($this->email->send()){
            return true;
        }
        else
        {
            return false;
        }
    }
    
}
