<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {

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
             $data['datalist']=$this->admin->getRows('select *  from admin where types=3 and IsDeleted = 0');
        $data['template']='admin/faculty/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function view($id)
    {
        if($id)
        {
             $data['selectall']=$this->admin->getRow('select *  from admin where  id='.$id.' && types=3');
        }
        $data['template']='admin/faculty/view';
        $this->load->view('admin/layout/template',$data);
    }

    public function add($id=0)
    {
        if($id)
        {
          $data['selectall']=$this->admin->getRow('select * from admin where id='.$id.' ');
          $res=$this->admin->getRow('select group_concat(technology) as tech from technology_detail where faculty_id='.$id.' and IsActive=1');
          if(!empty($res)){
            $data['tech'] = $res->tech;
          }else{
            $data['tech'] = '';
          }
          
        }
           $data['padedata'] = $this->config->item('padedata');
       // $data['course']=$this->admin->getRow('select * from course');
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/faculty/add';
        $this->load->view('admin/layout/template',$data);
    }

    function valid_url($str)
    {
        $pattern = "/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
        if (!preg_match($pattern, $str))
        {
            return FALSE;
        }
        return TRUE;
    }

    public function add_faculty()
    {
        $id=$this->input->post('id');

        $this->form_validation->set_rules('technology[]', 'Technology', 'trim|required');
        $this->form_validation->set_rules('job_type', 'Job type', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if($id>0)
        {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
          //  $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[12]');
        }
        else
        {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[admin.email]');
            //$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[12]|is_unique[admin.mobile]');
        }
        if($id>0)
        {
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
          //  $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[12]');
        }
        else
        {
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|is_unique[admin.mobile]');
            //$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|min_length[10]|max_length[12]|is_unique[admin.mobile]');
        }
     
     $this->form_validation->set_rules('password', 'Password', 'trim|required');
 
     // $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('technology'))
            {
                $this->messages->add(form_error('technology'), "alert-danger");
                redirect(base_url().'admin/faculty/add/'.$id);
            }
             elseif(form_error('job_type'))
            {
                $this->messages->add(form_error('job_type'), "alert-danger");
                redirect(base_url().'admin/faculty/add/'.$id);
            }
           elseif(form_error('name'))
            {
                $this->messages->add(form_error('name'), "alert-danger");
                redirect(base_url().'/admin/faculty/add/'.$id);
            }
              elseif(form_error('email'))
            {
                $this->messages->add(form_error('email'), "alert-danger");
                redirect(base_url().'/admin/faculty/add/'.$id);
            }
           
          
        }
        else
        {

// print_r($_POST);
// die;
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
            $technology = $this->input->post('technology');
            $array = array(
                    //'technology'    =>$this->input->post('technology'),
                    'job_type'      =>$this->input->post('job_type')  ,
                    'name'          =>$this->input->post('name') ,
                    'email'         =>$this->input->post('email')  ,
                    'password'      =>$this->input->post('password'),
                    'mobile'        =>$this->input->post('mobile'),
     
                    'address'        =>$this->input->post('address'),
                    'status'         =>$this->input->post('status'),
                    'types'          =>3 ,
                    'IsNew'=>1
                 );

            if(!empty($image))
            {
                $array['image']=$image;
            }



            if($id>0)
            {
                $emailcheck = $this->admin->getRow("select email from admin where email='".$this->input->post('email')."' && id!='".$id."'");
                $mobilecheck = $this->admin->getRow("select mobile from admin where mobile='".$this->input->post('mobile')."' && id!='".$id."'");
                if($emailcheck)
                {
                    $this->messages->add('Email field must contain a unique value', "alert-danger");
                    redirect('admin/faculty/add/'.$id);
                }
                elseif($mobilecheck)
                {
                    $this->messages->add('Mobile field must contain a unique value', "alert-danger");
                    redirect('admin/faculty/add/'.$id);
                }
                else
                {
                    $update = $this->admin->update('admin',array('id'=>$id), $array);

                    //$technology
$this->db->where(array('faculty_id'=>$id))->update('technology_detail',array('IsActive'=>'0'));
foreach ($technology as $key => $value) {
    $con = array('faculty_id'=>$id,'technology'=>$value);
    $q = $this->db->where($con)->get('technology_detail');
    if ( $q->num_rows() > 0 ) 
    {
        $this->db->where($con);
        $this->db->update('technology_detail',array('IsActive'=>'1','IsNew'=>1));
    } else {
        $con['IsNew']=1;
        $this->db->insert('technology_detail',$con);
    }
}

                    if($update)
                    {
                        //if(!empty($page_id)){
                            $delete=$this->db->delete('permissions',array('admin_id'=>$id));
                        //}
                         foreach($page_id as $key=>$page_val)
                        {
                         
                         if($no_access[$page_val]==1){$no_access1=1;}else{$no_access1=0;}
                         if($add_access[$page_val]==1){$add_access1=1;}else{$add_access1=0;}
                         if($edit_access[$page_val]==1){$edit_access1=1;}else{$edit_access1=0;}
                         if($delete_access[$page_val]==1){$delete_access1=1;}else{$delete_access1=0;}
                         if($view_access[$page_val]==1){$view_access1=1;}else{$view_access1=0;}
                        $permissions = array(
                                        'admin_id'       => $id,
                                        'page_id'        => $page_val,
                                        'no_access'      => $no_access1,
                                        'add_access'     => $add_access1,
                                        'edit_access'    => $edit_access1,
                                        'delete_access'  => $delete_access1,
                                        'view_access'    => $view_access1
                                    );
                            $this->admin->insert('permissions',$permissions);
                            /*$permissions = array(
                                            'no_access'     =>  $no_access1,
                                            'add_access'     => $add_access1,
                                            'edit_access'    => $edit_access1,
                                            'delete_access'  => $delete_access1,
                                            'view_access'     =>$view_access1
                                    );

                            $this->admin->update('permissions',array('admin_id'=>$id,'page_id'=>$page_val), $permissions);
                            */
                             //echo $this->db->last_query(); 
                        }
                        $this->messages->add('Updated successfully', "alert-success");
                        redirect('admin/faculty');
                    }
                }
            }
            else
            {
                $insert = $this->admin->insert('admin', $array);

                foreach ($technology as $key => $value) {
                  $tech = array(
                    'faculty_id'=>$insert,
                    'technology'=>$value,
                   );  
                  $final[] = $tech;
                }
                $this->db->insert_batch('technology_detail',$final);

                if($insert)
                {
                      foreach($page_id as $key=>$page_val)
                    {
                        if($no_access[$page_val]==1){$no_access1=1;}else{$no_access1=0;}
                        if($add_access[$page_val]==1){$add_access1=1;}else{$add_access1=0;}
                        if($edit_access[$page_val]==1){$edit_access1=1;}else{$edit_access1=0;}
                        if($delete_access[$page_val]==1){$delete_access1=1;}else{$delete_access1=0;}
                        if($view_access[$page_val]==1){$view_access1=1;}else{$view_access1=0;}

                        $permissions = array(
                                        'admin_id'       => $insert,
                                        'page_id'        => $page_val,
                                        'no_access'      => $no_access1,
                                        'add_access'     => $add_access1,
                                        'edit_access'    => $edit_access1,
                                        'delete_access'  => $delete_access1,
                                        'view_access'    => $view_access1
                                        );
                      $this->admin->insert('permissions',$permissions);
                    // echo $this->db->last_query(); exit;
                    }
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/faculty');
                }
            }
        }
    }

    public function delete($id=0)
    {
        if($id)
        {
            $delete=$this->admin->delete('admin',array('id'=>$id));
            if($delete)
            {
                $this->messages->add("Deleted Successfully", "alert-success");
                echo "sucess";
            }
        }

    }

}
