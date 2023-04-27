<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createstudent extends CI_Controller {

	public function index(){
		$this->load->view('createstudentview');
	}

	public function savedata(){
		$data = array(
			'name' => $this->input->post('name'),
			'stu_sem' => $this->input->post('sem'),
			'number' => $this->input->post('number'),
			'date_of_birth' => $this->input->post('dob'),
			'reg_no' => $this->input->post('rollnum'),
		);

		$this->load->model('Createstudentmodel');
		$this->Createstudentmodel->index($data);
		redirect('Createstudent/index');
	}

	public function check_number() {

    $phone_number = $this->input->post('phone_number');
    $result = $this->db->get_where('students_detail', array('number' => $phone_number))->result();
    if (!empty($result)) {
        echo json_encode(array('valid' => false));
    } else {
        echo json_encode(array('valid' => true));
    }
}
	public function check_roll_num() {

    $roll_number = $this->input->post('roll_number');
    $result = $this->db->get_where('students_detail', array('reg_no' => $roll_number))->result();
    if (!empty($result)) {
        echo json_encode(array('valid' => false));
    } else {
        echo json_encode(array('valid' => true));
    }
}

}
?>