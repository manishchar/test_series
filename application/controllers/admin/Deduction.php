<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deduction extends CI_Controller {

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
    $data['datalist']=$this->admin->getRows('select * from loan');
    $data['template']='admin/deduction/index';
    $this->load->view('admin/layout/template',$data);
    }

    public function view($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from loan where id='.$id.'');
        }
        $data['template']='admin/deduction/view';
        $this->load->view('admin/layout/template',$data);
    }

    public function add($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from loan where id='.$id.'');
        }
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='admin/deduction/add';
        $this->load->view('admin/layout/template',$data);
    }

    public function add_deduction()
    {
//print_r($this->input->post());

       $id=$this->input->post('id');
        if($id)
        {
            $this->form_validation->set_rules('transaction_type', 'Transaction type', 'trim|required');
        }
        else
        {
            $this->form_validation->set_rules('transaction_type', 'Transaction type', 'trim|required');
        }
        $this->session->set_flashdata('postdata',$_POST);
        
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('transaction_type'))
            {
                $this->messages->add(form_error('transaction_type'), "alert-danger");
                redirect(base_url().'admin/deduction/add/'.$id);
            }
        }
        else
        {
           
           $array = array(
                    'transaction_type' =>$this->input->post('transaction_type') ,
                    'amount'           =>$this->input->post('amount') ,
                    'remark'           => $this->input->post('remark'),
                    'type'           => 2,
                     'status'           => 1,
                    'created_by'        => $this->session->userdata('admin_name')
                 );
            
           

            if($id>0)
            {
                $update = $this->admin->update('loan',array('id'=>$id), $array);
                if($update)
                {
                $this->messages->add('Updated successfully', "alert-success");
                redirect('admin/deduction');
                }
            }
            else
            {
                $insert = $this->admin->insert('loan', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/deduction');
                }
            }
        }
    }

    public function delete($id=0)
    {
        if($id)
        {
            $delete=$this->admin->delete('loan_deduction',array('id'=>$id));
            if($delete)
            {
                $this->messages->add("Deleted Successfully", "alert-success");
                echo "success";
            }
        }

    }


}
