<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getTestStatus($mapping_id,$sid){
$CI =& get_instance();
    $CI->db->select('tab1.*,tab2.IsCorrect');
    $CI->db->join('test_answares as tab2','tab1.id=tab2.test_attempt_id');
    $CI->db->where(['tab1.student_id'=>$sid,'tab1.mapping_id'=>$mapping_id]);
    $query = $CI->db->get('test_attempt as tab1');

    if($query->num_rows() >0){
        $results = $query->result_array();
        $total = $correct=$incorrect = 0;
        foreach ($results as $key => $value) {
            if($value['IsCorrect'] == 1){
                $correct++;
            }else{
                $incorrect++;
            }
            $total++;
            
        }
        $data['total_question']=$total_question;
        $data['total']=$total;
        $data['correct']=$correct;
        $data['incorrect']=$incorrect;

        $response = array('status'=>'success','data'=>$data);
      //return true;
    }else{
        $response = array('status'=>'failed');
        
    }
    return $response;
}
function getattendance($sid,$batch_id,$date)
{
    $CI =& get_instance();

    $CI->db->where(['student_id'=>$sid,'batch_id'=>$batch_id,'atte_date'=>$date]);
    $query = $CI->db->get('attendance');
    if($query->num_rows() >0 ){
        return $query->row('status');
    }
    return false;
}

function getTotalattendance($sid,$batch_id)
{
    $CI =& get_instance();
    $query = "SELECT status,count(status) as total FROM `attendance` WHERE batch_id = ".$batch_id." and student_id = ".$sid." group by status";
    $query = $CI->db->query($query);
    if($query->num_rows() >0 ){
        return $query->result();
    }
    return false;
}

function getStudentTestSeries($sid,$batch_id)
{
    $CI =& get_instance();
    $CI->db->select('tab1.batch_id,tab2.student_id,tab3.cource_name');
    //$CI->db->join('test_attempt as tab2','tab1.id = tab2.mapping_id ','left');
    $CI->db->join('test_attempt as tab2','tab1.id = tab2.mapping_id and tab2.student_id= '.$sid,'left');
    $CI->db->join('test_series as tab3','tab3.id = tab1.test_id');
    //$CI->db->where('tab2.student_id',$sid);
    $CI->db->where('tab1.batch_id',$batch_id);
    $CI->db->where('tab1.Isactive','1');
    $query = $CI->db->get('mapping as tab1');
    $result =  $query->result();
    return $result;
}

function getQuestionCount($test_id)
{
    $CI =& get_instance();
    $CI->db->where(['test_id'=>$test_id,'IsActive'=>1]);
    $query = $CI->db->get('question');
    $result =  $query->num_rows();
    return $result;
}

function getTechnology($faculty_id)
{
    $CI =& get_instance();

    $CI->db->select('tab2.*');
    $CI->db->join('technology as tab2','tab2.id = tab1.technology');
    $CI->db->where('tab1.faculty_id',$faculty_id);
    $CI->db->where('tab1.Isactive','1');
    $query = $CI->db->get('technology_detail as tab1');
    $result =  $query->result();
    return $result;
}
function getMapping($test_id)
{
    $CI =& get_instance();
    $CI->db->select('m.*, b.starttime,b.endtime');
    $CI->db->join('batch as b','m.batch_id = b.id');
    $CI->db->where('test_id',$test_id);
    $query = $CI->db->get('mapping as m');
    $result =  $query->result();
    return $result;
}
