<?php
class Test extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->model("testModel");
		
	}

	public function index()
	{
		$this->load->view("testView");
	}

	public function insertData(){

		$data = array(
			'name' => $this->input->post("name"),
			'mobile' => $this->input->post("mobile"),
			'email' => $this->input->post("email"),
			'users_ip' => getenv('REMOTE_ADDR') 
		);
		if($this->input->post("submit")=="submit")
		{
			$this->testModel->insertData($data);
		}
		if($this->input->post("submit") == "update")
		{
			$id = $this->input->post("singleID");
			$this->testModel->updateData( $id,$data);
		}
		

		// now load model
		
		
	}

	public function getData(){
		$data = $this->testModel->getData();
		echo json_encode($data);
	}

	public function deleteUserData(){

		$id = $this->input->post("delId");
		$this->testModel->deleteUserData($id);
	}

	public function fetchSingleData(){

		$id= $this->input->post("eID");
		$data = $this->testModel->fetchSingleData($id);
		echo json_encode($data);
	}


	public function searchData(){
		$searchData = $this->input->post("searchData");
		$datadd = $this->testModel->searchData($searchData);
		echo json_encode($datadd);
	}
}


?>