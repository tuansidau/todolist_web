<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class qlnhanvien extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('qlnv_model');
	}
	public function index()
	{
		$this->load->model('qlnv_model');
		$list = $this->qlnv_model->getAll();
		$data['listNV']= $list;
		$this->load->view('qlnhanvien_view',$data);

	}

	public function themNv(){
		$this->load->model('qlnv_model');
		$data = $this->input->post();
		$data['nv_password'] = md5($data['nv_phone']);
		$data['nv_level'] = "NV";
		$this->qlnv_model->themNv($data);
		redirect("index.php/qlnhanvien/index");
	}

	public function getNv(){
		$id = $this->input->post('id');
		$data =  $this->qlnv_model->getNv($id);
		echo json_encode($data[0]);
	}

	public function suaNv(){
		$this->load->model('qlnv_model');
		$data = $this->input->post();
		$data["nv_password"] = md5($data["nv_phone"]);
		$this->qlnv_model->suaNv($data);
		redirect("index.php/qlnhanvien/index");
	}

	public function xoaNv($id){
		$this->load->model('qlnv_model');
		$this->qlnv_model->xoaNv($id);
		redirect("index.php/qlnhanvien/index");
	}

	public function search(){;
		$search = $this->input->post('search');
		$list = $this->qlnv_model->search($search);
		$data['listNV'] = $list;
		$this->load->view('qlnhanvien_view',$data);
	}
}
