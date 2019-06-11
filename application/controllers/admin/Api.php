<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('admin_id') == '')
        {
            redirect('admin/login');exit();
        }
    }
    public function index(){
    }

public function download1() {
    echo "string";
    $this->load->library('excel');
    $objPHPExcel = new PHPExcel();
    $sheetsstitle=array("Group","Subgroup","Brand","UQC","Products");
    $i=0;
    $columnarray = array('A','B','C','D','E','F','G','H','I','J','K');

        $group    = array(['id'=>1,'name'=>'name'],['id'=>1,'name'=>'name']);
        $subgroup = array(['id'=>1,'name'=>'name','title'=>'title'],['id'=>1,'name'=>'name','title'=>'title']);
        $brand    = array(['id'=>1,'name'=>'name'],['id'=>1,'name']);    
        $uqc      = array(['id'=>1,'name'=>'name','title'=>'title'],['id'=>1,'name'=>'name','title'=>'title']);;    

         while ($i < 5) {
            // Add new sheet
            $objWorkSheet = $objPHPExcel->createSheet($i); //Setting index when creating
            ////Write cells
            if($i==0){
                //group data
                $objWorkSheet->setCellValue('A1', 'Group ID');
                $objWorkSheet->setCellValue('B1', 'Group Name');
                $row=2;
                foreach($group as $idata){
                    $col=0;
                    $objWorkSheet->setCellValue($columnarray[$col].$row, $idata['id']);
                    $col++;
                    $objWorkSheet->setCellValue($columnarray[$col].$row, $idata['name']);
                    $row++;
                }
            }
            elseif($i==1){
                //subgroup data
                $objWorkSheet->setCellValue('A1', 'Subgroup ID');
                $objWorkSheet->setCellValue('B1', 'Group Name');
                $objWorkSheet->setCellValue('C1', 'Subgroup Name');
                $row=2;
                foreach($subgroup as $idata){
                    $col=0;
                    $objWorkSheet->setCellValue($columnarray[$col].$row, $idata['id']);
                    $col++;
                    $objWorkSheet->setCellValue($columnarray[$col].$row, $idata['name']);
                    $col++;
                    $objWorkSheet->setCellValue($columnarray[$col].$row, $idata['title']);
                    $row++;
                }
            }
            elseif($i==2){
                //brand data
                $objWorkSheet->setCellValue('A1', 'Brand ID');
                $objWorkSheet->setCellValue('B1', 'Brand Name');
                $row=2;
                foreach($brand as $idata){
                    $col=0;
                    $objWorkSheet->setCellValue($columnarray[$col].$row, $idata['id']);
                    $col++;
                    $objWorkSheet->setCellValue($columnarray[$col].$row, $idata['name']);
                    $row++;
                }
            }
            elseif($i==3){
                //UQC data
                $objWorkSheet->setCellValue('A1', 'UQC ID');
                $objWorkSheet->setCellValue('B1', 'UQC Name');
                $objWorkSheet->setCellValue('C1', 'Description');
                $row=2;
                foreach($uqc as $idata){
                    $col=0;
                    $objWorkSheet->setCellValue($columnarray[$col].$row, $idata['id']);
                    $col++;
                    $objWorkSheet->setCellValue($columnarray[$col].$row, $idata['name']);
                    $col++;
                    $objWorkSheet->setCellValue($columnarray[$col].$row, $idata['title']);
                    $row++;
                }
            }
            else{
                $objWorkSheet->setCellValue('A1', 'Product Code');
                $objWorkSheet->setCellValue('B1', 'Product Name');
                $objWorkSheet->setCellValue('C1', 'Group ID/Name');
                $objWorkSheet->setCellValue('D1', 'Subgroup ID/Name');
                $objWorkSheet->setCellValue('E1', 'Brand ID/Name');
                $objWorkSheet->setCellValue('F1', 'UQC ID/Name');
                $objWorkSheet->setCellValue('G1', 'Size');
                $objWorkSheet->setCellValue('H1', 'Alert Quantity');
                $objWorkSheet->setCellValue('I1', 'Product Detail');
            }
          // Rename sheet
          $objWorkSheet->setTitle($sheetsstitle[$i]);
          $i++;
        }
        $objPHPExcel->setActiveSheetIndex($i-1);
        //Freeze pane
        //$objPHPExcel->getActiveSheet()->freezePane('A2');
        //Save as an Excel BIFF (xls) file
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="filename.xlsx"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
        //
        exit();
}
public function updateTable() {
    $name = $_POST['name'];
    $ids = $_POST['ids'];
    $arr = json_decode($ids,true);
   // print_r($arr);
    echo $this->db->where_in('id', $arr)->update($name,['IsNew'=>'2']);
    //echo json_encode($_POST);
}
public function download($table) {

   // $table = " admin";
    $fields = $this->db->field_data($table);
    foreach ($fields as $key => $value) {
        $field[]=$value->name;
    }

    $data['list'] = $this->db->get($table)->result_array();
    $csv_file = $table.'_'.time().".csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $csv_file . '"');

    $fp = fopen('php://output', 'wb');
    fputcsv($fp, $field);

    foreach ($data['list'] as $row) {
        fputcsv($fp, $row);
    }

    fclose($fp);
}

public function upload_form() { 
    $this->load->view('upload');
}

public function upload() {
    // echo "string";
    // die;
    $table = " login_user_new";
    if ($this->input->post()) {
        if (isset($_FILES['myfile']['name']) && $_FILES['myfile']['name'] != "") {
            $file_type = explode('.', $_FILES['myfile']['name']);
            print_r($file_type);
            if ($file_type[1] == 'csv') {
                $filename = $_FILES["myfile"]["tmp_name"];
                $file = fopen($filename, "r");
                $row = 1;
                while (($data = fgetcsv($file, "", ",")) !== FALSE) {
                    echo "<pre>";
                    //print_r($data);
                    if ($row == 1) {
                        $header = $data;
                        //die;
                        $row++;
                        continue;
                    }
                    // print_r($data);
                    // $owner_id='0';
                    // if(!empty(trim($data[1])) ){
                    // $logindetail = $this->admin_model->get_table_row("login_user", "id", array("email" => trim($data[1])));
                    // if(!empty($logindetail)){
                    // $owner_id=$logindetail['id'];
                    // }
                    // }
                    if (!empty(trim($data[1]))) {
                        // echo "string";
                        $con = array("email" => trim($data[1]));

                        $leveldetail = $this->db->where($con)->get("login_user_old")->result_array();
                        // echo $this->db->last_query();
                        // print_r($leveldetail);
                        if (empty($leveldetail)) {
                            if(!empty(trim($data[1]))){
                            $new = array_combine($header,$data);
                            //print_r($new);
                            $this->db->insert("login_user_old", $new);
                            }
                        } else {
                        //$this->admin_model->update_tbl_data("manage_business_level_1", array("owner_id" => $owner_id), array("id" => $leveldetail["id"]));
                        }
                    }
                }

                die;
                // $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><b>Record Updated Successfully.</b></div>');
                // redirect(site_url("manage-business-level-1/"));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><b>Please upload correct file (*.csv).</b></div>');
                // redirect(site_url("manage-business-level-1/"));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><b>Please Select CSV File.</b></div>');

        }
        redirect(base_url("api/upload_form"));
    }
}
    
}
