<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dailyreport extends CI_Controller {

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
         $id=$this->input->post('id');
          $id=$this->input->post('id');
           $id=$this->input->post('id');
            $id=$this->input->post('id');
    $con =" WHERE s.status = 1 and s.batch_id = b.id";
    if(isset($_GET['technology'])){
    if($_GET['technology']){
        if($_GET['technology'] !='all' && $_GET['technology'] !=''){
            $con .= " and s.technology= '".$_GET['technology']."'"; 
        }
        }
    }
    if(isset($_GET['batch_id'])){
    if($_GET['batch_id']){
        if($_GET['batch_id'] !='all' && $_GET['batch_id'] !=''){
            $con .= " and s.batch_id= '".$_GET['batch_id']."'"; 
        }
        }
    }
    if(isset ($_GET['startdate'])){
    if($_GET['startdate']){
        $sdate = date('Y-m-d',strtotime($_GET['startdate']));
        $con .= " and s.date > '".$sdate."'"; 
    }
}
    if(isset($_GET['enddate'])){
    if($_GET['enddate']){
        $edate = date('Y-m-d',strtotime($_GET['enddate']));
        $con .= " and s.date < '".$edate."'"; 
    }
}
$con .= " GROUP BY s.batch_id";       
$data['datalist']=$this->db->query('SELECT  s.*,b.startdate,b.starttime FROM student s,batch b'.$con)->result();
// echo json_encode($data);
// die;
        $data['template']='admin/datereport/index';
        $this->load->view('admin/layout/template',$data);
    }


  public function detail($batch)
    {
         $data['datalist']=$this->admin->getRows('SELECT s.* FROM student s,batch b WHERE s.status = 1 and s.batch_id = b.id  and s.batch_id ='.$batch.'');

         $data['detail']=$this->admin->getRow('SELECT b.* FROM batch b WHERE  b.id ='.$batch.'');
      
        $data['template']='admin/datereport/detail';
        $this->load->view('admin/layout/template',$data);
    }
    public function view($id=0)
    {
        if($id)
        {
        $data['selectall']=$this->admin->getRow('select * from loan where id='.$id.'');
        }
        $data['template']='admin/zeroreport/view';
        $this->load->view('admin/layout/template',$data);
    }

    public function add($id=0)
    {
    if($id)
        {
        $data['selectall']=$this->admin->getRow('select * from loan where id='.$id.'');
        }
    $data['form_data']=$this->session->flashdata('postdata');
    $data['template']='admin/zeroreport/add';
    $this->load->view('admin/layout/template',$data);
    }
    public function add_loan()
    {
        $id=$this->input->post('id');
        $this->form_validation->set_rules('user_id', 'Customer', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
        $this->form_validation->set_rules('period', 'Period', 'trim|required');

        $this->session->set_flashdata('postdata',$_POST);
        if ($this->form_validation->run() == FALSE)
        {
            if(form_error('user_id'))
            {
            $this->messages->add(form_error('user_id'), "alert-danger");
            redirect(base_url().'admin/loan/add/'.$id);
            }
            else if(form_error('amount'))
            {
            $this->messages->add(form_error('amount'), "alert-danger");
            redirect(base_url().'admin/loan/add/'.$id);
            }
            else if(form_error('period'))
            {
            $this->messages->add(form_error('description'), "alert-danger");
            redirect(base_url().'admin/loan/add/'.$id);
            }
           
        }
        else
        {
            $array = array(
                'user_id'           =>$this->input->post('user_id') ,
                'amount'            =>$this->input->post('amount') ,
                'loan_type'         =>$this->input->post('loan_type') ,
                'period'            =>$this->input->post('period') ,
                'rateof_interest'   =>$this->input->post('rateof_interest') ,
                'Interest_amount'   =>$this->input->post('Interest_amount') ,
                'total_amount'      =>$this->input->post('total_amount') ,
                'monthly_reputation' =>$this->input->post('monthly_reputation')
                 );

        
            if(!empty($id))
            {
            $update = $this->admin->update('loan',array('id'=>$id), $array);
            if($update)
                {
                    $this->messages->add('Updated successfully', "alert-success");
                    redirect('admin/loan');
                }
            }
            else
            {
                $insert = $this->admin->insert('loan', $array);
                if($insert)
                {
                    $this->messages->add('Added successfully', "alert-success");
                    redirect('admin/loan');
                }
            }
        }
    }

    public function update($id=0)
    {
        if($id)
        { $array = array(
                'status'           =>1 ,
              
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
