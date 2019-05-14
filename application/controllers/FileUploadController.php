<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FileUploadController extends CI_Controller{

public function __construct(){
	parent::__construct();
	$this->load->library('pagination');

}

public function index(){

	$this->load->view('fileUpload');
}

public function uploadImage(){
	if($this->input->post("name") !='')
	{

		$this->load->library("form_validation");
		$this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('mobile','mobile','trim|required');
		$this->form_validation->set_rules('email','email','trim|required|valid_email');
		if($this->form_validation->run() == true)
		{
						//$email = $this->input->post("email");
			$studetnIdMatch = $this->input->post("studetnIdMatch");
			$data['name'] = $this->input->post("name");
			$data['mobile'] = $this->input->post("mobile");
			$data['email'] = $this->input->post("email");
			$data['StudentId'] = $studetnIdMatch;
			if(isset($_FILES['file_img']['name']))
			{
				$fileData['upload_path'] = './upload/';
				$fileData['allowed_type'] = 'jpg|png|jpge';
				$this->load->library('upload', $fileData);
				$this->upload->do_upload("file_img");
				$im_name = $this->upload->data();
				$data['file_name'] = $im_name['file_name'];
				$data['date_entered'] = date('D-m-y H:m:s');
				$this->load->model("FileUploadModel");
				$message = $this->FileUploadModel->imageupload($data,$studetnIdMatch);
				if($message)
				{
					if($message == 1)
					{
						echo "Your sutdent id all ready registered.";
					}
					if($message == 2)
					{
						echo "You registered successfully. Please login";
					}
					if($message == 3)
					{
						echo "Your student id has not matched!";
					}
					
				}
			}
		}
		else
		{
			echo validation_errors();
		}

	}
	else
	{
		echo "All fields are required!";
	}
	
}


	public function signUser(){

		$username = $this->input->post("username");
		$password = $this->input->post("password");
		if($username != '' && $password !='')
		{
			$this->load->model("FileUploadModel");
			$data = $this->FileUploadModel->signUserId($username, $password);
			if($data == 1)
			{
				echo 1;
			}
			else
			{
				echo '<h>Your username and password not matched. Please try again<h>';
			}
		}
	}

	public function logoutUser(){
			$this->session->unset_userdata('username');
			echo "You are successfully logout";
		
	}

	public function studentFeeSubmit(){
		  $studentId = $this->input->post("sId");
		$studentData = array(
			'sId'    => $this->input->post("sId") ,
			'sem5'   => $this->input->post("sem") ,
			'mobile' => $this->input->post("mob") ,
			'amount' => $this->input->post("amount") , 
		);

		$this->load->model("FileUploadModel");
		$data = $this->FileUploadModel->studentFeeModel($studentId, $studentData);
		if($data)
		{
			echo json_encode($data);
		}
	}

	public function finalFeeData(){
		$ididi = $this->input->post("sid");
		$this->load->model("FileUploadModel");
		$feeData = $this->FileUploadModel->finalFeeModel($ididi);
		echo json_encode($feeData);
	}

	public function resetUserPass(){

		if($this->input->post("oldpass") != '' && $this->input->post("newpass") == $this->input->post("confnewpass"))
		{
			$sid = $this->input->post("sid");
			$oldpass = $this->input->post("oldpass");
			$password = $this->input->post("newpass");			

			$this->load->model("FileUploadModel");
			$returnData = $this->FileUploadModel->resetPassModel($sid,$oldpass,$password);
				if($returnData == 1)
				{
					echo "Your password updated successfully";
				}
				if($returnData == 2)
				{
					echo "Your old password not mached. Try again";
				}

		}
		else
		{
			echo "New password and confirm password not mached! try again";
		}
	}

	// public function adminPage(){
	// 	$this->load->view("adminPage");

		
	// }

	public function adminLogin(){

		if($this->input->post("adminusername") !='' && $this->input->post("adminpassword") !='')
		{
			$username = $this->input->post("adminusername");
			$password = $this->input->post("adminpassword");
			$this->load->model("FileUploadModel");
			$data = $this->FileUploadModel->adminModelAutho($username, $password);
			if($data == 1)
			{
				echo 3;
			}
			if($data == 2)
			{
				echo $data;
			}
		}
		else
		{
			echo 1;
		}
	}

	public function uploadStudentInfo(){
		$fileee["upload_path"] = "./upload/";
		$fileee["allowed_type"] = "jpg|png|jpge";
		$this->load->library("upload",$fileee);
		$this->upload->do_upload("simg");
		$filename = $this->upload->data();
		$data = array(
			'sname' => $this->input->post("sname"),
			'fname' => $this->input->post("fname"),
			'studentClass' => $this->input->post("sclass"),
			'mname' => $this->input->post("mname"),
			'pcontact' => $this->input->post("pcontact"),
			'scontact' => $this->input->post("scontact"),
			'address' => $this->input->post("address"), 
			'img'	=> $filename["file_name"],
			'del'	=> 0,		
		);

		$this->load->model("FileUploadModel");
		$returnid = $this->FileUploadModel->uploadStudent($data);
		if($returnid)
		{
			echo "Student id=".$returnid;
		}
	}

	public function showAllRecords(){

		// $this->load->model("FileUploadModel");
		// $showData = $this->FileUploadModel->showStudentDetails();
		// if($showData)
		// {
		// 	echo json_encode($showData);
		// }


		$this->load->model("FileUploadModel");
		  $this->load->library("pagination");
		  $config = array();
		  $config["base_url"] = "#";
		  $config["total_rows"] = $this->FileUploadModel->count_all();
		  $config["per_page"] = 5;
		  $config["uri_segment"] = 3;
		  $config["use_page_numbers"] = TRUE;
		  $config["full_tag_open"] = '<ul class="pagination">';
		  $config["full_tag_close"] = '</ul>';
		  $config["first_tag_open"] = '<li>';
		  $config["first_tag_close"] = '</li>';
		  $config["last_tag_open"] = '<li>';
		  $config["last_tag_close"] = '</li>';
		  $config['next_link'] = '&gt;';
		  $config["next_tag_open"] = '<li>';
		  $config["next_tag_close"] = '</li>';
		  $config["prev_link"] = "&lt;";
		  $config["prev_tag_open"] = "<li>";
		  $config["prev_tag_close"] = "</li>";
		  $config["cur_tag_open"] = "<li class='active'><a href='#'>";
		  $config["cur_tag_close"] = "</a></li>";
		  $config["num_tag_open"] = "<li>";
		  $config["num_tag_close"] = "</li>";
		  $config["num_links"] = 1;
		  $this->pagination->initialize($config);
		  $page = $this->uri->segment(3);
		  $start = ($page - 1) * $config["per_page"];

		  $output = array(
		   'pagination_link'  => $this->pagination->create_links(),
		   'student_records'   => $this->FileUploadModel->showStudentDetails($config["per_page"], $start)
		  );
		  echo json_encode($output);



	}

	public function deleteStudent(){
		$deleStudentid = $this->input->post("deletI");
		$this->load->model("FileUploadModel");
		$data = $this->FileUploadModel->deleteStudenId($deleStudentid);
		if($data ==1)
		{
			echo "Student deleted from record successfully";
		}
	}

	public function fetchSingleRecord(){

		$updateId = $this->input->post("updateId");
		$this->load->model("FileUploadModel");
		$signle = $this->FileUploadModel->fetchSingleData($updateId);
		echo json_encode($signle);
	}

	public function updateRecord(){
		$updateuserId = $this->input->post("updateuserId");
		$updateData = array(
			'studentClass' => $this->input->post("usclass"),
			'pcontact' => $this->input->post("upmobile"),
			'scontact' => $this->input->post("uscontact"),
			'address' => $this->input->post("uadress"),
		);

		$this->load->model("FileUploadModel");
		$messageUpdate = $this->FileUploadModel->updateStudentRecord($updateuserId,$updateData);
		if($messageUpdate)
		{
			echo $messageUpdate;
		}

	}


	// public function loadRecord($rowno=0){
 
 //        $rowperpage = 2;
 
 //        if($rowno != 0){
 //          $rowno = ($rowno-1) * $rowperpage;
 //        }
  
 //        $allcount = $this->db->count_all('addStudent');
 
 //        $this->db->limit($rowperpage, $rowno);
 //        $users_record = $this->db->get('addStudent')->result_array();
  
 //        $config['base_url'] = base_url().'FileUploadController/loadRecord';
 //        $config['use_page_numbers'] = TRUE;
 //        $config['total_rows'] = $allcount;
 //        $config['per_page'] = $rowperpage;
 
 //        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
 //        $config['full_tag_close']   = '</ul></nav></div>';
 //        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
 //        $config['num_tag_close']    = '</span></li>';
 //        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
 //        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
 //        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
 //        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
 //        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
 //        $config['prev_tag_close']  = '</span></li>';
 //        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
 //        $config['first_tag_close'] = '</span></li>';
 //        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
 //        $config['last_tag_close']  = '</span></li>';
 
 //        $this->pagination->initialize($config);
 
 //        $data['pagination'] = $this->pagination->create_links();
 //        $data['result'] = $users_record;
 //        $data['row'] = $rowno; 
 //        echo json_encode($data);
 //  }


}



?>