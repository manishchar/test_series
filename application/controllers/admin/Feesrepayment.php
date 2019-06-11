<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feesrepayment extends CI_Controller {

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
        //$data['datalist']=$this->admin->getRows('select * from loan');
        $data['template']='admin/repayment/index';
        $this->load->view('admin/layout/template',$data);
    }

    public function view($id=0)
    {
        if($id)
        {
            $data['selectall']=$this->admin->getRow('select * from student where id='.$id.'');
        }
        $data['template']='agent/repayment/view';
        $this->load->view('agent/layout/template',$data);
    }

    public function add($id=0)
    {
    if($id)
       {
    $data['selectall']=$this->admin->getRow('select * from loan where id='.$id.'');  
       }
        $data['form_data']=$this->session->flashdata('postdata');
        $data['template']='agent/repayment/add';
        $this->load->view('agent/layout/template',$data);
    }

    public function add_loan()
    {
    //$this->form_validation->set_rules('amount', 'Amount', 'trim|required');
    $this->session->set_flashdata('postdata',$_POST);
       
    if($this->input->post('amount') != ''){
    $array = array(
                'loan_id'  => $this->input->post('loan_id'),
                'user_id'   => $this->input->post('user_id'),
                'amount'    => $this->input->post('amount'),
                'transaction_type'  => 'Daily Collection',
                'type'       => 1,
                'remark'     =>'Loan Daily Collection',
                'created_by' =>$this->session->userdata('agent_username')
                 );
            }
            if($this->input->post('penalty') != ''){
    $array = array(
                'loan_id'  => $this->input->post('loan_id'),
                'user_id'   => $this->input->post('user_id'),
                'penalty'    => $this->input->post('penalty'),
                'transaction_type'  => 'Penalty',
                'type'    => 2,
                'remark' =>'Loan Penalty',
                'created_by' =>$this->session->userdata('agent_username')
                 );      
            }
           $lid = $this->input->post('id');
            if(!empty($id))
            {
            $update = $this->admin->update('loan_payment',array('id'=>$id), $array);
            if($update)
                {
                $this->messages->add('Updated successfully', "alert-success");
                redirect('agent/loanrepayment/add/'.$lid);
                }
            }
            else
            {
                $insert = $this->admin->insert('loan_payment', $array);
                if($insert)
                {
                $this->messages->add('Added successfully', "alert-success");
                redirect('agent/loanrepayment/add/'.$lid);
                }
            }
        
    }

    public function update($id=0)
    {
        if($id)
        { 
        $array = array(
                'status'  => 1,
                 );
           // $delete=$this->admin->delete('loan',array('id'=>$id));
            $update = $this->admin->update('loan',array('id'=>$id), $array);
            if($delete)
            {
                $this->messages->add("Approved successfully", "alert-success");
                echo "success";
            }
        }

    }


}
