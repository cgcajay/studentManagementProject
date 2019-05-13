<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class FileUpload extends CI_Controller {  
      //functions  
      function index()  
      {  
           $data['title'] = "Upload Image using Ajax JQuery in CodeIgniter";  
           $this->load->view('fileUploadView', $data);  
      }  
      function ajax_upload()  
      { 
      	$arrayName['name'] = $this->input->post("name");
      	$arrayName['mobile'] = $this->input->post("mobile");
      	$arrayName['email'] = $this->input->post("email");

    


           if(isset($_FILES["image_file"]["name"]))  
           {  
                $config['upload_path'] = './upload/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('image_file'))  
                {  
                     echo $this->upload->display_errors();  
                }  
                else  
                { 

                     $data = $this->upload->data();
                     $arrayName['file_name'] = $data['file_name'];
                     $this->load->model("FileModel");
                     if($this->FileModel->uploadImg($arrayName))
                     {
                     	echo '<img src="'.base_url().'upload/'.$data['file_name'].'" width="300" height="225" class="img-thumbnail" />'; 
                     }
                      
                      
                }  
           }  
      }  

      public function userData(){

      	$this->load->model("FileModel");
      	$data = $this->FileModel->fetchData();
      	if($data)
      	{
      		echo json_encode($data);
      	}
      }

      public function userDeleteId(){
      	if($this->input->post("del"))
      	{
      		$id = $this->input->post("del");
      		$this->load->model("FileModel");
      		$data = $this->FileModel->userDeleteById($id);
      		if($data)
      		{
      			echo "Data successfully deleted";
      		}	
      	}
      }
 }