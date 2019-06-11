<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
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
        $data['tables'] = $this->db->list_tables();
        // print_r($data['tables']);
        // die;
        $data['template']='admin/setting/index';
        $this->load->view('admin/layout/template',$data);
    }
}
