<?php
class Check extends CI_Controller{

	public function index(){


		$this->load->library('datatables');
		$data = $this->datatables->select('*')->from('students_detail');
		echo $this->datatables->generate();

	}

	public function indextwo(){
		
		 $this->load->view('checkview');
	}
}
?>
