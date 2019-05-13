<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FileUploadModel extends CI_Model{


public function imageupload($data,$studetnIdMatch)
{
	$this->db->where('StudentId',$studetnIdMatch);
	$emailData = $this->db->get("testing");
	if($emailData->num_rows()>0)
	{
		return 1;
	}
	else
	{
		$this->db->where('sId',$studetnIdMatch);
		$selectId = $this->db->get("addStudent");
		if($selectId->num_rows()>0)
		{
			$this->db->insert('testing',$data);
			return 2;
		}
		else
		{
			return 3;
		}
		

	}
	

	
}

public function signUserId($username, $password){

	$this->db->where('email',$username);
	$this->db->where('mobile',$password);
	$data = $this->db->get('testing');
	if($data->num_rows()>0)
	{
		$userdata = $data->result(); 
		$this->load->library('session');
		$this->session->set_userdata('username',$userdata);
		return 1;
	}
	else
	{
		return false;
	}

}

public function studentFeeModel($studentId, $studentData){

		$this->db->insert('feeStructure',$studentData);
		$this->db->where('sId', $studentId);
		$returnstudetnData = $this->db->get('feeStructure');
		if($returnstudetnData->num_rows()>0)
		{
			return $aaaaa = $returnstudetnData->result();
			
		}
		else
		{
			return false;
		}
	
}

public function finalFeeModel($ididi){

	$this->db->select('amount');
	$this->db->where('sId', $ididi);
	$studentFee = $this->db->get('feeStructure');
	if($studentFee->num_rows()>0)
	{
		return $studentFee->result();
	}
	else
	{
		return false;
	}
}

	public function resetPassModel($sid,$oldpass,$password){

		$this->db->where('id',$sid);
		$reData = $this->db->get('testing');
		if($reData->num_rows()>0)
		{
			$studentResteData = $reData->result();
			if($studentResteData[0]->mobile == $oldpass)
			{
				$this->db->set('mobile', $password); //value that used to update column  
				$this->db->where('id', $sid); //which row want to upgrade  
				$this->db->update('testing');  //table name
				return 1;
			}
			else
			{
				return 2;
			}
		}
		
	}

	public function adminModelAutho($username, $password){

		$this->db->where("username", $username);
		$this->db->where("password", $password);
		$adminauth = $this->db->get("adminLogin");
		if($adminauth->num_rows()>0)
		{
			$this->load->library("session");
			$this->session->set_userdata("username", $username);
			return 1;
		}
		else
		{
			return 2;
		}


	}

	public function uploadStudent($data){
		$this->db->insert("addStudent", $data);
		return $this->db->insert_id();
	}

	public function showStudentDetails(){

		$this->db->where('del',0);
		$allData = $this->db->get("addStudent");
		return $allData->result();
	}

	public function deleteStudenId($deleStudentid){
		$this->db->where('sId',$deleStudentid);
		$this->db->set('del',1);
		$this->db->update("addStudent");
		return 1;
	}

	public function fetchSingleData($updateId){
		$this->db->where('sId',$updateId);
		$signle = $this->db->get("addStudent");
		if($signle->num_rows()>0)
		{
			return $signle->result();
		}
	}

	public function updateStudentRecord($updateuserId,$updateData){
		$this->db->where('sId',$updateuserId);
		$updated_status = $this->db->update('addStudent',$updateData);
		if($updated_status)
		{
			return "Id&nbsp;".$updateuserId."&nbsp;is updated successfully";
		}
		else
		{
			return "Data has not updated!";
		}
	}
	
}



?>