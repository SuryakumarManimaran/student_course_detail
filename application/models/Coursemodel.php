<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coursemodel extends CI_Model {

	public function getDetails(){

		return $this->db->select('*')->get('students_detail')->result_array();

	}

	public function save($course_reg){

		$this->db->insert('course_registered',$course_reg);
	}

	public function getTable($checkroll){
    $this->db->select('S.staff_name,CD.course_id, CD.course_code, CD.course, CS.reg_no');
    $this->db->from('course_students CS');
    $this->db->join('course_detail CD', 'CD.course_code=CS.course_code');
    $this->db->join('students_detail SD', 'SD.reg_no=CS.reg_no');
    $this->db->join('staff S','S.course_code=CD.course_code');
    $this->db->where('SD.reg_no', $checkroll);
    return $this->db->get()->result_array();
}

	public function getCoursecode($checkroll){
		$this->db->select('course_code');
		$this->db->where('reg_no',$checkroll);
		return $this->db->get('course_students')->result_array();
	}

	public function searchnum($query) {
        $this->db->like('reg_no', $query);
        $query = $this->db->get('students_detail');
        return $query->result_array();
    }

    public function deleteform($course_id){

	$this->db->where('course_id', $course_id);
	$this->db->delete('course_detail');
}

	public function deletesecond($course_id){

	$this->db->where('s_id', $course_id);
	$this->db->delete('staff');
} 

    public function updateform($data){

		$this->db->insert('course_detail',$data);

	}

	public function updatestaff($datas){

		$this->db->insert('staff',$datas);

	}

	public function updateCS($datass){

		$this->db->insert('course_students',$datass);

	}

	public function courseCode($course_code)
	{
		$this->db->select('S.course_code,CD.course,S.staff_name');
		$this->db->from('course_detail CD');
		$this->db->join('staff S','S.course_code = CD.course_code');
		$this->db->where('S.course_code',$course_code);
		return $this->db->get()->result_array();

	}


}
?>