<?php
class FileModel extends CI_Model{

	public function uploadImg($arrayName){
		$data = $this->db->insert('testing',$arrayName);
		if($data)
		{
			return true;
		}

	}

	public function fetchData(){
		$this->db->order_by("name", "asc");
		$data = $this->db->get('testing');
		if($data->num_rows()>0)
		{
			return $data->result();
		}
		else
		{
			return false;
		}
	}

	public function userDeleteById($id){
		$this->db->where('id',$id);
		if($this->db->delete('testing'))
		{
			return true;
		}
	}
}



?>