<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL);
    }

    public function index()
    {
		$tables = $this->db->list_tables();

		foreach ($tables as $k=>$table)
		{
		echo $table;
		echo $k."<br/>";
		}
    }

     public function mydb()
    {
        //$tables = $this->db->query("DROP TABLE IF EXISTS `question`;");
        $tables = $this->db->query("CREATE TABLE IF NOT EXISTS `mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active,0=delete',
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
");
        //$tables = $this->db->query("UPDATE `admin` SET `password` = 'd13aa16ea1173e28157d328c8e13bf58638e0a51aec0ca508a26248fa9cfda5fb26d4a11522babd1ddb27971bb93ec8cae765e778bf5b5d1cb631683d0466acfiK63YoU/XEYYYlSJ10NsovLxePARG7OjmoXgbp5SRDA=' WHERE `admin`.`id` = 19;");

        // foreach ($tables as $k=>$table)
        // {
        // echo $table;
        // echo $k."<br/>";
        // }
    }


public function strecture(){
  $fields = $this->db->get('technology')->result();
  //$fields = $this->db->field_data('batch');
        //$tables = $this->db->query("SELECT course FROM INFORMATION_SCHEMA.TABLES");
      echo "<pre>";
        print_r($fields);
}

}

