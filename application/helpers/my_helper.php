<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function getQuestionCount($test_id)
{
    $CI =& get_instance();
    $CI->db->where('test_id',$test_id);
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
