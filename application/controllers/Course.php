<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function __construct() {

        parent::__construct();
        $this->load->model('Coursemodel');
    }


	public function index(){

		$this->load->view('courselist');
	}

	public function showDetails(){

		$students = $this->Coursemodel->getDetails();

		// Get the reg_no from the POST request
        $reg_no = $this->input->post('reg_no');

        // Find the student with the given reg_no
        $student = null;
        foreach ($students as $s) {
            if ($s['reg_no'] == $reg_no) {
                $student = $s;
                break;
            }
        }

        if ($student) {
            $data = array(
                'name' => $student['name'],
                'date_of_birth' => $student['date_of_birth'],
                'stu_sem' => $student['stu_sem'],
                'number' => $student['number']
            );
            echo json_encode($data);
        }

	}

	public function savedata(){

		$course_reg = array(
			'reg_no' => $this->input->post('regNo'),
			'student_name' => $this->input->post('name'),
			'mobile_no' => $this->input->post('number'),
			'current_sem' => $this->input->post('sem'),
			'dob' => $this->input->post('dob'),
		);

		$this->Coursemodel->save($course_reg);

	}





	



}
?>