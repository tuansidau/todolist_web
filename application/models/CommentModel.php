<?php
class CommentModel extends CI_Model
{
	public function read($jobId)
	{
		$query = $this->db->query("SELECT * FROM `todo_comments` INNER JOIN todo_nhanvien ON todo_nhanvien.nv_id = todo_comments.nv_id WHERE job_id = ".$jobId." ORDER BY cm_date DESC");
		return $query->result_array();
	}
	public function insert($comment)
	{
		$this->db->insert('todo_comments', $comment);
	}

	public function delete($id)
	{
		$this->db->query("delete from todo_comments where cm_id = ".$id);
	}

	public function update($id, $content)
	{
		$this->db->query("update todo_comments set cm_contents = '".$content."' where cm_id = ".$id);
	}
}
?>