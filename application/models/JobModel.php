<?php
class JobModel extends CI_Model
{
	public function read()
	{
		$query = $this->db->query("SELECT * from todo_job, todo_nhanvien WHERE todo_job.nv_id = todo_nhanvien.nv_id");
		return $query->result_array();
	}
	public function readInfoJob($id)
	{
		$query = $this->db->query("select * from todo_job where job_id = ".$id);
		return $query->result_array();
	}
	public function readFile($id)
	{
		$query = $this->db->query("select job_files from todo_job where job_id = ".$id);
		$data = $query->result_array();
		foreach ($data as $key) 
		{
			$list = $key['job_files'];
		}
		return $list;
	}
	public function readJobId()
	{
		$query = $this->db->query("select job_id from todo_job");
		$data = $query->result_array();
		foreach ($data as $key) 
		{
			$list = $key['job_id'];
		}
		return $list;
	}
	public function readPartner($id)
	{
		$query = $this->db->query("select nv_partners from todo_job where job_id = ".$id);
		$data = $query->result_array();
		foreach ($data as $key) 
		{
			$list = $key['nv_partners'];
		}
		return json_decode($list);
	}
	public function readNvName($id)
	{
		$query = $this->db->query("select * from todo_nhanvien where nv_id = ".$id);
		$data = $query->result_array();
		$list = "";
		foreach ($data as $key) 
		{
			$list = $key['nv_firstname']." ".$key['nv_lastname'];
		}
		return $list;
	}
	public function readNhanvien()
	{
		$query = $this->db->query("select * from todo_nhanvien");
		return $query->result_array();
	}
	public function insert($job)
	{
		$this->db->insert('todo_job', $job);
	}

	public function delete($id)
	{
		$this->db->query("delete from todo_job where job_id = ".$id);
	}
	public function updateStatus($id, $status)
	{
		$this->db->query("update todo_job set job_status = ".$status." where job_id = ".$id);
	}
	public function update($id, $string, $stringVal)
	{
		$this->db->query("update todo_job set ".$string." = '".$stringVal."' where job_id = ".$id);
	}
}
?>