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

	public function showtable(){

	$checkroll = $this->input->post('regNo');
    $data['data'] = $this->Coursemodel->getTable($checkroll);

    // check if any data is returned by the model
    if(empty($studentdata['data'])) {
        $data['regNo'] = $checkroll; // send the reg_no to the view
    }

    // echo"<pre>";print_r($checkroll);exit();
    $data['code'] = $this->Coursemodel->getCoursecode($checkroll);
    

    $this->load->view('coursetable',$data);
}
	public function search() {

    $query = $this->input->get('query');
    $data = $this->Coursemodel->searchnum($query);
    echo json_encode($data);
}

	public function deletefun(){

	$course_id = $this->input->post('course_id');

	$this->Coursemodel->deletesecond($course_id);
	$this->Coursemodel->deleteform($course_id);
	echo "Data deleted succesfully"; // Send a response back to the AJAX call
}


	public function updatefun(){

		$data = array(
		'course_code'=>$this->input->post('course_code'),
		'course'=>$this->input->post('course'),
	);
		$datas = array(
			'staff_name' => $this->input->post('staff'),
			'course_code' => $this->input->post('course_code'),
	);
		$datass = array(
			'course_code' => $this->input->post('course_code'),
			'reg_no' => $this->input->post('regno'),
		);

		$this->Coursemodel->updateform($data);
		$this->Coursemodel->updatestaff($datas);
		$this->Coursemodel->updateCS($datass);
		
}



}
?>