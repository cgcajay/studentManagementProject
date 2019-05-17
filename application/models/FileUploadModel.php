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

	public function count_all()
		 {
		  $query = $this->db->get("addStudent");
		  return $query->num_rows();
		 }

	public function count_all_student_fee(){

		$query = $this->db->get("feeStructure");
		return $query->num_rows();
	}

	public function showStudentFee($limit, $start){
		$this->db->select("*");
		$this->db->from("feeStructure");
		$this->db->order_by("s_id", "ASC");
		$this->db->limit($limit, $start);
		$feeresults = $this->db->get();
		$html ='';
		$html .='<table class="table" style="background-color:blanchedalmond;margin-left:-150px;margin-top:-19PX;"><tr>
							<th>S.No</th>
							<th>StudentId</th>
							<th>Amount</th>
							<th>MobileNo</th>
						</tr>';
		foreach($feeresults->result() as $res)
		{
			$html .='<tr>
						<td>'.$res->id.'</td>
						<td>'.$res->s_id.'</td>
						<td>'.$res->amount.'</td>
						<td>'.$res->mobile.'</td>
					</tr>';
		}

		$html .='</table>';

		return $html;

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

		$insetId = $this->db->insert('feeStructure',$studentData);
		if($insetId)
		{
			$this->db->where('s_id', $studentId);
			$returnstudetnData = $this->db->get('feeStructure');
			if($returnstudetnData->num_rows()>0)
			{
				return $returnstudetnData->result();
				
			}
			else
			{
				return false;
			}
		}
		
	
}

public function finalFeeModel($ididi){

	$this->db->select('amount');
	$this->db->where('s_id', $ididi);
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

		$this->db->where('s_id',$sid);
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

	public function showStudentDetails($limit, $start){

		$html ='';
		$this->db->select("*");
		$this->db->from("addStudent");
		$this->db->where('del',0);
		$this->db->order_by("sname", "ASC");
  		$this->db->limit($limit, $start);
		$allData = $this->db->get();
		$html .='<table id="sduTab" class="table" style="background-color:blanchedalmond;margin-left:-150px;margin-top:-19PX;"><tr><th>Student&nbsp;Id</th><th>Image</th><th>Name</th><th>Class</th><th>Father&nbsp;name</th><th>Parent&nbsp;contact</th><th>Student&nbsp;contact</th><th>Address</th><th>delete</th><th>Edit</th></tr>';
		foreach($allData->result() as $result)
		{
			$html .='<tr><td>'.$result->sId.'</td><td><img src="'.base_url().'upload/'.$result->img.'" width="70" height="80"></td><td>'.$result->sname.'</td><td>'.$result->studentClass.'</td><td>'.$result->fname.'</td><td>'.$result->pcontact.'</td><td>'.$result->scontact.'</td><td>'.$result->address.'</td><td><a href="#" class="delete" id="'.$result->sId.'"><i class="fa fa-trash-o" style="font-size:24px"></i></a></td><td><a href="#" class="update" id="'.$result->sId.'"><i class="fa fa-edit" style="font-size:24px"></i></a></td></tr>';
		}
		$html .= '</table>';
		return $html;
		
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

	public function insertQuery($data){
		$this->db->insert('query',$data);
		return $this->db->insert_id();
	}

	public function resultQuery($sId){
		$this->db->where('studetnId', $sId);
		$qery = $this->db->get("query");
		if($qery->num_rows()>0)
		{
			$table = '';
			$table .='<table class="table table-bordered" style="margin-top: 46px;"><tr>
								<th>Query No.</th>
								<th>Query</th>
								<th>Admin Reply</th>
							</tr>';
			foreach($qery->result() as $results)
			{
				$table .='<tr><td>'.$results->id.'</td>
						<td>'.$results->query.'</td>
						<td></td>
						</tr>';
			}

			$table .='</table>';
			return $table;
		}
	}
	
}



?>