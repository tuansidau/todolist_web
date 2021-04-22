<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class qlnv_model extends CI_Model {
	
	private $tbname = "todo_nhanvien";
	
	public function getAll(){
		$data =  $this->db->get('todo_nhanvien');
		return $data->result_array();
	}

	public function getNv($id){
		$this->db->where('nv_id',$id);
		$data =  $this->db->get('todo_nhanvien');
		return $data->result_array();
	}

	public function themNv($data){
		$this->db->insert('todo_nhanvien',$data);
	}

	public function suaNv($data){
		$this->db->where('nv_id',$data['nv_id']);
		$this->db->update('todo_nhanvien',$data);
	}

	public function xoaNv($id){
		$this->db->where('nv_id',$id);
		$this->db->delete('todo_nhanvien');
	}

	public function search($search){
		$this->db->select("*");
		$this->db->like("nv_email",$search);
		$this->db->or_like("nv_firstname",$search);
		$this->db->or_like("nv_phone",$search);
		$this->db->or_like("nv_lastname",$search);
		$data = $this->db->get('todo_nhanvien');
		return $data->result_array();
	}
}