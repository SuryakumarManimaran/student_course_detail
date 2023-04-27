<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createstudentmodel extends CI_Model {

	public function index($data){
		$this->db->insert('students_detail',$data);
	}

}
?>